---
venture: lanternis
phase: 2b Pré-lancement
auteur: dev-vitrine
date: 2026-10-26
statut: brouillon (rien n'est en ligne ; mise en ligne soumise à la validation explicite du fondateur)
---

# Lanternis · site de pré-lancement et liste d'attente (o2switch)

Landing de validation, autodiagnostic et liste d'attente avec double opt-in, pour un hébergement mutualisé o2switch (cPanel, Apache, PHP 8.2+). Sans framework ni Composer. Données dans SQLite, emails envoyés par l'API Mailjet v3.1. À la mise en production de l'application, ce script sera remplacé par l'API du VPS et les inscrits y seront migrés (`CLAUDE.md`, stack).

Spécifications suivies : `marketing/landing/validation.md` § 7 et § 9, `marketing/landing/autodiagnostic.md`, `marketing/landing/conformite-prelancement.md` (§ 2, 4.1 à 4.3, 5). Les textes du pôle marketing sont repris sans réécriture.

## 1. Arborescence

```
prelancement/
  build.php            construit les fichiers générés de public/ à partir de marketing/landing/ et marque/charte/
  config.example.php   modèle de configuration (copier en config.php : jamais versionné)
  lib/                 code PHP (hors racine web) ; lib/mentions.generated.php est généré
  bin/                 purge.php (cron), export.php (CSV), stats.php (compteurs) : CLI uniquement
  mentions/            archive des textes d'information affichés sous les formulaires (preuve du consentement)
  tests/               run.php (unitaires), smoke.php (bout en bout avec php -S)
  public/              RACINE DU SITE (seul dossier exposé au web)
    index.html, mentions-legales.html, confidentialite.html     GÉNÉRÉS (ne pas éditer)
    assets/pages/, assets/charte/                                 GÉNÉRÉS (ne pas éditer)
    autodiagnostic.html, merci.html, confirme.html, desinscrit.html, erreur.html   écrits à la main
    assets/site.css, assets/autodiagnostic.js, assets/erreur.js                    écrits à la main
    waitlist.php, confirm.php, desinscription.php                                  points d'entrée PHP
    .htaccess
  config.php, data/, var/   SUR LE SERVEUR SEULEMENT (ignorés par Git)
```

## 2. Fonctionnement

1. `waitlist.php` (POST) : contrôle d'origine, purge des données expirées, limitation de débit, champ piège, validation, enregistrement `en_attente`, email de confirmation (lien valable 7 jours). Réponse : redirection 303 vers `/?inscription=ok#liste-attente` (ou `?erreur=email|champs|technique`) si le script de la page s'exécute, sinon vers `merci.html` ou `erreur.html?code=…`.
2. `confirm.php?jeton=…` : la page affiche un bouton ; le clic (POST) confirme, calcule `qualifie` et envoie l'email de bienvenue (ou, pour une demande d'échange venue de l'autodiagnostic, l'email « Votre échange de 30 minutes », plus une notification interne si `NOTIFY_TO` est renseigné).
3. `desinscription.php?jeton=…` : bouton, puis suppression complète de l'inscription. Le POST « un clic » des messageries (RFC 8058, en-têtes `List-Unsubscribe`) supprime directement.
4. Adresse déjà inscrite : même réponse qu'une nouvelle inscription ; ajouts de consentement seulement (jamais de retrait) ; email de confirmation renvoyé au plus une fois par 24 h. Si l'inscription est déjà confirmée, un nouveau consentement n'est appliqué qu'après un nouveau clic de confirmation (sinon n'importe qui pourrait cocher « nouvelles » pour une adresse tierce).
5. `autodiagnostic.html` : 10 questions et calcul dans le navigateur, aucune transmission. Le formulaire d'échange n'envoie le résultat que si la case « Joindre mon résultat » est cochée (sinon les champs sont désactivés avant l'envoi) ; le serveur recalcule et refuse un résultat incohérent.

### Conservation et purge (`lib/Purge.php`)
| Donnée | Durée | Source |
|---|---|---|
| Inscription non confirmée | 30 jours après la création | validation.md § 7.2-8, conformite § T1 |
| Inscription confirmée | 3 ans après le dernier contact émanant de la personne (création, confirmation) | idem |
| Demande d'échange venue de l'autodiagnostic | 12 mois après la demande | clause conformite § 4.2 |
| Traces de limitation de débit (IP hachée HMAC-SHA256 avec sel secret) | 1 heure | ≤ 24 h exigé |
| Jeton de confirmation | 7 jours, stocké haché (SHA-256), à usage unique | |

La purge s'exécute à chaque envoi du formulaire et par le cron horaire (`bin/purge.php`). `PRAGMA secure_delete` écrase les données supprimées.

### Ce qui est stocké
Les champs du formulaire (§ 7.1) et les champs calculés, `version_mention` (empreinte du texte d'information affiché, calculée par `build.php`, texte archivé dans `mentions/`), horodatage et version de chaque consentement. **Aucune IP, aucun user-agent, aucun cookie** (pas de `session_start`).

## 3. Choix de sécurité
- **CSP stricte sans `'unsafe-inline'`** : `default-src 'none'`, scripts, styles, images et polices depuis le site seulement, `form-action 'self'`, `frame-ancestors 'none'`. Pour y parvenir, `build.php` déplace les blocs `<style>`/`<script>` des pages marketing dans des fichiers et convertit les attributs `style="…"` en classes.
- **CSRF** : formulaire statique sans session, donc contrôle d'origine : `Origin` (sinon `Referer`) doit être le site ; `Sec-Fetch-Site: cross-site` refusé ; requête sans aucun des deux refusée (403).
- **Débit** : 5 envois par heure et par IP (`REMOTE_ADDR` seul, IPv6 regroupée par /64), plafond global de 100 emails de confirmation par heure (protège la réputation d'envoi).
- **Pas de fuite d'information** : doublon, piège et nouvelle inscription reçoivent la même réponse ; désinscription identique que le jeton existe ou non ; aucune trace technique affichée.
- **Jetons** : `random_bytes(32)`, format vérifié (`^[a-f0-9]{64}$`) ; confirmation et désinscription par POST (les robots des messageries qui suivent les liens ne confirment ni ne désinscrivent).
- **Entrées** : valeurs non chaîne refusées, UTF-8 vérifié, balises et caractères de contrôle ou de direction retirés, listes blanches, longueurs comptées en caractères. Requêtes préparées. Sorties HTML échappées. Un nom de structure qui ressemble à un lien est omis de l'email de confirmation (anti-hameçonnage).
- **Mailjet** : suivi des ouvertures et des clics désactivé dans chaque appel (`TrackOpens`/`TrackClicks` = `disabled`, conformite § 2.3) ; ni `douleur` ni `source` ne transitent par Mailjet (conformite § 5.3).
- **Serveur** : HTTPS forcé, HSTS 1 an, `nosniff`, `X-Frame-Options`, `Referrer-Policy`, `Permissions-Policy`, pas de listage, fichiers cachés et extensions sensibles refusés, `X-Powered-By` retiré.

## 4. Construire (`build.php`)
```
php build.php              # régénère index.html, mentions-legales.html, confidentialite.html, assets/pages, assets/charte
php build.php --check      # échoue si un fichier généré n'est pas à jour (utilisé par la CI)
php build.php --indexable  # retire « noindex » : SEULEMENT pour la mise en ligne validée
```
À relancer après toute modification de `marketing/landing/*.html`, de `marque/charte/` ou du texte d'information de `public/autodiagnostic.html`, puis versionner le résultat. Sans Fraunces dans `marque/charte/fonts/`, le `@font-face` est retiré de la copie de `tokens.css` (repli sur les polices système, pas de 404).

## 5. Tester en local (Docker, image officielle)
Sous Git Bash, préfixer par `MSYS_NO_PATHCONV=1` :
```
docker run --rm -v "C:/saas-studio:/repo" -w /repo/ventures/lanternis/produit/apps/prelancement php:8.3-cli php tests/run.php
docker run --rm -v "C:/saas-studio:/repo" -w /repo/ventures/lanternis/produit/apps/prelancement php:8.3-cli php tests/smoke.php
```
Navigation manuelle (emails écrits dans `var/emails.log`) : copier `config.example.php` en `config.php` avec `BASE_URL` = `http://localhost:8080` et un `IP_SALT` d'au moins 32 caractères, puis :
```
docker run --rm -p 8080:8080 -e MAIL_MODE=log -v "C:/saas-studio:/repo" -w /repo/ventures/lanternis/produit/apps/prelancement php:8.3-cli php -S 0.0.0.0:8080 -t public
```
(`php -S` ignore le `.htaccess` : les en-têtes Apache ne sont testés que sur o2switch ou avec l'image `php:8.3-apache`.)

## 6. Installation sur o2switch (manuelle, après validation du fondateur)
1. **PHP** : cPanel > Sélecteur de version PHP : 8.2 ou plus, extensions `pdo_sqlite` et `curl` actives.
2. **Dossier** : déposer l'application dans `/home/<utilisateur>/lanternis-prelancement/` (hors `public_html`).
   ```
   php build.php --check   # en local, avant tout envoi
   rsync -az --delete --exclude config.php --exclude data/ --exclude var/ --exclude tests/ \
     ventures/lanternis/produit/apps/prelancement/ <utilisateur>@<hôte>:lanternis-prelancement/
   ```
   (`--delete` ne supprime pas les fichiers exclus : `config.php`, la base et les journaux sont préservés.)
3. **Racine du domaine** : cPanel > Domaines : racine de `lanternis.fr` = `lanternis-prelancement/public`. Ainsi `lib/`, `bin/`, `config.php` et `data/` restent hors du web. (Si la racine doit rester ailleurs, définir `SetEnv LANTERNIS_APP_DIR /home/<utilisateur>/lanternis-prelancement` dans le `.htaccess` : à vérifier sur o2switch.)
4. **Configuration** : sur le serveur, `cp config.example.php config.php && chmod 600 config.php`, puis renseigner `BASE_URL` (https), `MAIL_MODE` = `mailjet`, les clés Mailjet, l'expéditeur, `IP_SALT` (`php -r "echo bin2hex(random_bytes(32)), PHP_EOL;"`) et, au besoin, `NOTIFY_TO`. La base est créée au premier envoi dans `data/` (droits 700/600).
5. **Cron** (cPanel > Tâches cron), toutes les heures :
   `0 * * * * php /home/<utilisateur>/lanternis-prelancement/bin/purge.php > /dev/null 2>&1`
   (chemin du binaire PHP CLI à vérifier sur o2switch, par exemple `/usr/local/bin/php`.)
6. **Suivi** (SSH) : `php bin/stats.php` (compteurs par source, variante, public, qualification : source de vérité des inscriptions) et `php bin/export.php [--confirmes] > liste-attente.csv` (sans IP ni jeton ; fichier à chiffrer s'il quitte le serveur, à supprimer après usage, jamais dans Git).

## 7. Check-list de mise en ligne
- [ ] Validation explicite du fondateur (textes, prix affichés, mise en ligne) — règle 2 de `CLAUDE.md`.
- [ ] Domaine réservé ; DNS OVH vers o2switch ; AutoSSL actif ; `INFRA.md` complété (dossier cible).
- [ ] Mailjet : domaine authentifié SPF + DKIM, DMARC publié, DPA accepté, adresse d'expédition créée ; envoi réel testé vers 2 messageries (dont Outlook).
- [ ] `config.php` en `MAIL_MODE=mailjet`, droits 600 ; `IP_SALT` unique ; `var/emails.log` absent du serveur.
- [ ] `php build.php --indexable` relancé et versionné **seulement** si l'indexation est décidée ; liens sources de la landing revérifiés (offres expirables) ; lien economie.gouv.fr de l'autodiagnostic revérifié.
- [ ] Recette en production : inscription, email reçu, confirmation, email de bienvenue, désinscription, demande d'échange depuis l'autodiagnostic ; `bin/stats.php` cohérent.
- [ ] En-têtes vérifiés (`curl -I https://lanternis.fr/`) : CSP, HSTS, nosniff ; `https://lanternis.fr/config.php`, `/../lib/` et `/data/` inaccessibles ; aucun cookie, aucune requête tierce (outils du navigateur, conformite § 6).
- [ ] Cron de purge actif (sortie « purge : … » au premier lancement manuel).
- [ ] Outil d'audience sans cookie : s'il est ajouté, élargir la CSP (`script-src`, `connect-src`) et relancer les contrôles « aucun cookie ».

## 8. Points ouverts
- Textes d'interface écrits par dev-vitrine, à relire par le pôle marketing : pages `merci`, `confirme`, `desinscrit`, `erreur`, pages servies par `confirm.php`/`desinscription.php`, phrase de confidentialité de l'autodiagnostic.
- `liste-attente-remerciement.md` décrit un autre parcours (prénom, double opt-in seulement pour les « conseils », 20 questions, relance J+3, outil de rendez-vous) : non suivi ; le code applique `validation.md` § 7 et § 9 (double opt-in pour tous, sans relance) et le pied de page de conformite § 4.3.
- Email de confirmation : « rien ne sera conservé » (validation.md § 9) alors qu'une demande non confirmée est gardée 30 jours : formulation à arbitrer (marketing / juriste-rgpd).
- Demande d'échange depuis l'autodiagnostic : elle crée aussi une inscription à la liste d'attente (autodiagnostic.md § 5), mais la clause § 4.2 annonce une suppression à 12 mois : c'est la règle appliquée à ces inscriptions ; à confirmer par juriste-rgpd.
- Hypothèses non vérifiées sur o2switch : nom exact du binaire PHP CLI pour le cron, prise en compte de `SetEnv`, absence de proxy ajoutant des cookies, comportement de `Header set` avec PHP-FPM/LSAPI. Format exact des en-têtes `List-Unsubscribe` acceptés par l'API Mailjet v3.1 : à vérifier au premier envoi réel.
