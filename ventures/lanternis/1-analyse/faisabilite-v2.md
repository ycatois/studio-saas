---
venture: lanternis
phase: 1 Analyse (révision, préalable au cadrage)
auteur: architecte
date: 2026-10-26
statut: brouillon
skills: auth-multi-tenant, spec-openapi, adr
remplace: faisabilite.md § 6 (effort) et § 4.2 (RH en agrégats) ; complète § 4.3 (SI) et § 7 (Cockpit DSI). Les §§ 2, 3, 5 et 8 de faisabilite.md restent valables sauf mention contraire ci-dessous.
entrées: 1-analyse/perimetre-produit.md (2026-10-26), 1-analyse/faisabilite.md (2026-10-25), CLAUDE.md, INFRA.md, 5-cadrage/design-system/design-system.md, 2-marche/prix.md
---

# Lanternis : faisabilité technique v2 (tout le SI, centré sur les personnes)

> **Règle de lecture.** Toutes les sources ont été consultées le **2026-10-26** (liste en fin de document). Ce qui n'est pas sourcé est marqué **(H)** : hypothèse non vérifiée ou estimation de l'architecte. Aucun entretien client n'a encore eu lieu : les priorités viennent de `perimetre-produit.md` et restent elles-mêmes des hypothèses.
> **Stack** : celle de `CLAUDE.md` et `INFRA.md` (Symfony / PHP 8.3+, PostgreSQL dédié à la venture, Symfony UX, Docker sur le VPS OVH, Stripe Hasteria, Mailjet). **Aucune dérogation proposée.** Le code de Cockpit DSI n'a pas été lu (aucun chemin fourni) : le § 4 est fondé sur sa description seule.

---

## 0. Verdict et ce qui change depuis la v1

**Toujours faisable par un développeur seul, mais le nouveau périmètre est plus gros que ne le dit l'estimation du product-owner.** Le recentrage sur les personnes supprime le risque le plus lourd de la v1 (connecteurs financiers et RH à accès payant ou partenarial) et le remplace par du **code métier maison** (registre, affectations datées, moteur de processus), plus prévisible mais plus volumineux.

| Sujet | v1 (2026-10-25) | v2 (ce document) |
|---|---|---|
| Connecteurs du MVP | Pennylane, Qonto, Microsoft 365, RDAP/TLS | **Import Excel, Microsoft 365, Google Workspace (si pilote), RDAP/TLS**. Tous gratuits côté API (§ 2) |
| Données personnelles | Agrégats RH seulement | **Registre nominatif** (identité professionnelle, matériel, comptes, accès) ; ni paie, ni santé, ni motif de départ (§ 1.5) |
| Secrets des clients | Jetons Pennylane, Qonto, PayFit chiffrés | **Aucun secret par client pour Microsoft 365** ; Google selon la méthode retenue (§ 2.2). Le chiffrement enveloppe de la v1 reste utile en P2 (Qonto, Pennylane) |
| Cœur de l'effort | Connecteurs et indicateurs | **Registre + moteur de processus + rapprochement comptes ↔ personnes** |
| Effort P1 complet (H) | 8 à 10 sem. (MVP minimal) | **19 à 26 sem.**, point central 22 ; 17 à 25 avec reprise de Cockpit DSI (§ 3) |

**Les trois décisions D1, D2, D5 du product-owner sont techniquement saines** et réduisent le risque. Une nuance sur D1 (§ 2.6) : « aucun secret stocké » est tenable au MVP pour Microsoft 365 et pour Google avec délégation au niveau du domaine, **pas** pour les connecteurs P2 (Qonto, Pennylane), qui exigent de conserver un jeton d'API du client. Il faut formuler la promesse publique comme « aucun mot de passe, aucun secret métier » plutôt que « aucun secret ».

---

## 1. Modèle de données PostgreSQL (haut niveau)

### 1.1 Principes

1. **Une base PostgreSQL dédiée à la venture** (`INFRA.md`), un schéma `public`, **base partagée entre clients**, colonne `organisation_id` sur toute table métier, **Row Level Security** en plus d'un filtre Doctrine (décision v1 § 2.2, confirmée).
2. **Identifiants UUID** (v7, ordonnés dans le temps, H : générés côté PHP par `symfony/uid`) : pas d'identifiant séquentiel devinable dans les URL, fusion de données facilitée.
3. **Clés étrangères composites `(organisation_id, id)`** entre tables métier : une affectation ne peut pas pointer vers le matériel d'une autre organisation, même en cas de bug applicatif. C'est la deuxième barrière, sous la RLS.
4. **Le temps est une donnée** : toute relation « qui a quoi » est une **affectation datée** (`debut`, `fin` nullable) ; on ne remplace jamais une affectation, on la clôt et on en ouvre une autre. L'état courant est une vue (`fin IS NULL`).
5. **Montants en centimes HT** (`bigint`) + devise (`char(3)`, `EUR` par défaut) + périodicité ; jamais de flottant.
6. **Pas de fichier stocké au MVP** (D2) : les documents sont du texte (Markdown limité) ou un lien. Les fichiers importés sont lus puis supprimés (§ 2.4).
7. **Source et fraîcheur** sur toute donnée alimentable par connecteur : `source` (`saisie`, `import`, `m365`, `google`, `rdap`, `tls`), `source_maj_le`, et pour l'import `import_lot_id`.

### 1.2 Les tables, par domaine

**A. Plateforme (hors registre du client)**

| Table | Rôle | RLS | Nominatif |
|---|---|---|---|
| `organisation` | Le locataire : nom, type (entreprise, ESS), SIREN facultatif, statut (essai, active, lecture seule, résiliée), date de fin d'essai, durée de conservation après départ | Non (lue par le planificateur pour itérer sur les organisations) ; accès applicatif filtré | Non |
| `utilisateur` | Identité de connexion à Lanternis : email, hash du mot de passe, secret TOTP chiffré, dernière connexion | Non (un utilisateur peut appartenir à plusieurs organisations, ex. prestataire) | **Oui** |
| `membre` | Lien utilisateur ↔ organisation, **rôle** (propriétaire, administrateur, contributeur, lecteur, prestataire invité, responsable de site en P2), `personne_id` facultatif (si l'utilisateur figure aussi au registre) | Oui | Oui (indirect) |
| `invitation` | Jeton d'invitation haché, expiration | Oui | Oui (email) |
| `abonnement` | Miroir local de l'abonnement Stripe : offre, tranche, périodicité, statut, `stripe_customer_id`, `stripe_subscription_id`, fin d'essai | Oui | Non |
| `droit_override` | Dérogation ponctuelle à une limite (geste commercial, pilote fondateur) avec motif et date de fin | Oui | Non |

**B. Registre**

| Table | Champs clés (au-delà de `id`, `organisation_id`, horodatages) | Nominatif |
|---|---|---|
| `site`, `service` | nom, adresse courte, `responsable_id` | Non (sauf responsable) |
| `personne` | nom, prénom, email professionnel, type (salarié, bénévole, stagiaire, intérimaire, prestataire externe), fonction, `service_id`, `site_id`, `manager_id`, statut (à venir, présente, partie, **anonymisée**), dates d'arrivée et de départ | **Oui, au cœur** |
| `materiel` | catégorie, marque, modèle, n° de série, mode d'acquisition, `contrat_id`, date et prix d'achat, fin de garantie, renouvellement prévu, `site_id`, **statut de cycle de vie**, motif de sortie, preuve d'effacement (booléen + commentaire + auteur + date) | Non en soi ; devient indirect via l'affectation |
| `affectation_materiel` | `materiel_id`, cible : `personne_id` **ou** `site_id` **ou** partagé avec `responsable_id` (contrainte `num_nonnulls(...) = 1`), `periode tstzrange`, remis par, commentaire | **Oui** |
| `application` | nom, `fournisseur_id`, catégorie, criticité, `responsable_id` | Non |
| `compte` | adresse, fournisseur d'identité (`m365`, `google`, autre), `id_externe`, état (actif, bloqué, supprimé), nature (personnel, partagé, service, administration), `personne_id` rapprochée, statut de rapprochement (proposé, confirmé, écarté), `responsable_id`, **dernière connexion** (date seule, facultative), `source_maj_le` | **Oui** |
| `licence` (abonnement) | `application_id`, offre (libellé, `sku_externe`), sièges achetés, sièges attribués (calculés ou saisis), coût unitaire HT, périodicité, mode de paiement, date de renouvellement, `contrat_id` | Non |
| `attribution_licence` | `licence_id`, `compte_id` (ou `personne_id` si déclaratif), période, source | **Oui** |
| `acces` | `personne_id` ou `compte_id`, ressource (`application_id` ou ressource libre typée : partage, boîte partagée, coffre ou collection, VPN, compte d'administration), niveau, période, octroyé par, retiré par, source. **Aucune colonne de secret** (contrainte de revue de code et test automatisé sur le schéma, H) | **Oui** |
| `contrat` | `fournisseur_id`, objet, catégorie, début, fin, durée, reconduction tacite, préavis (en mois ou jours), **date limite de résiliation calculée** (colonne générée ou calculée à l'écriture), montant HT, périodicité, `responsable_id`, lien vers le document | Non |
| `fournisseur`, `contact_fournisseur` | nom, rôle ; contacts : nom, email, téléphone professionnels | **Oui** pour les contacts (personnes physiques chez le fournisseur) |
| `domaine`, `certificat` | nom ou hôte et port, bureau d'enregistrement ou émetteur, expiration lue, date de lecture, `responsable_id` | Non |
| `sauvegarde`, `test_restauration` | périmètre, solution, fréquence, emplacement, `responsable_id` ; tests : date, résultat, auteur, commentaire | Non (sauf auteur) |
| `ligne` + `affectation_ligne` | numéro, type, opérateur, `contrat_id`, forfait, coût ; affectation datée comme le matériel | **Oui** (numéro professionnel rattaché à une personne) |
| `document` | titre, type, texte ou lien, objets liés (table de liaison), prochaine revue | Possible (contenu libre, H) |

**C. Processus**

| Table | Rôle |
|---|---|
| `modele_processus` | type (arrivée, changement, départ), nom, **version**, actif |
| `modele_tache` | libellé, rôle responsable, échéance relative (jours, signée), preuve exigée (constat, déclaration, déclaration commentée), **générateur** (`aucun`, `par_materiel`, `par_compte`, `par_licence`, `par_acces`, `par_coffre`, `par_ligne`, `par_responsabilite`), conditions (JSONB validé par schéma : type de personne, site, service) |
| `processus` | `personne_id`, `modele_processus_id` + **version figée**, date de référence, statut, clôture (date, auteur) |
| `tache` | `processus_id` (nullable : tâche libre au MVP), libellé **copié** du modèle (les processus en cours ne changent pas quand le modèle change, US-14), responsable (`membre_id` ou `personne_id`), échéance absolue, statut (à faire, constatée, faite, sans objet), **objet visé** par colonnes typées nullables (`materiel_id`, `compte_id`, `attribution_licence_id`, `acces_id`, `ligne_id`, `objet_responsabilite`) avec `CHECK num_nonnulls(...) <= 1` ; preuve : type, auteur, horodatage, commentaire, `synchronisation_id` du constat ; verrouillage après clôture (réouverture tracée) |

Choix de conception : **colonnes typées plutôt qu'un couple polymorphe `(objet_type, objet_id)`** pour garder de vraies clés étrangères ; le polymorphisme n'est utilisé que dans le journal, en lecture seule.

**D. Connecteurs et import**

| Table | Rôle |
|---|---|
| `connexion` | type (`m365`, `google`, `rdap`, `tls`), identifiant externe du locataire (ID de locataire Entra, domaine Google, email de l'administrateur à emprunter pour Google), permissions accordées, état, dernière synchronisation réussie, compteur d'échecs |
| `synchronisation` | journal d'exécution : début, fin, résultat, nombre d'objets lus, créés, modifiés, erreurs (texte sans donnée personnelle) |
| `objet_externe` | correspondance `source + id_externe → id local` (idempotence, rapprochement stable) |
| `charge_brute` | JSONB de la réponse brute, **rétention 7 jours (H, réduite par rapport aux 30 jours de la v1** car elle contient désormais des données nominatives), uniquement pour le diagnostic |
| `import_lot`, `import_ligne` | gabarit, correspondance des colonnes, compteurs, statut (validé, appliqué, annulé), lignes rejetées avec motif. **Le fichier n'est pas conservé.** Chaque ligne créée porte `import_lot_id` : l'annulation supprime ce qui n'a pas été modifié depuis et signale le reste |

**E. Alertes, coût, journal**

| Table | Rôle |
|---|---|
| `regle_alerte` | catalogue A1 à A16 défini **dans le code** (versionné) ; la table ne contient que les paramètres par organisation (délais, destinataires, activée) |
| `alerte` | règle, objet visé, **clé de déduplication unique** (`regle + objet + échéance`), statut (nouvelle, vue, traitée, ignorée + motif), dates. Une alerte ignorée ne revient pas tant que la clé ne change pas |
| `envoi_notification` | email envoyé (digest ou immédiat) : date, destinataire (`membre_id`), identifiant Mailjet ; jamais le corps |
| `cout_mensuel` | **instantané** mensuel du coût annualisé par catégorie (I1, I2, historique 12 ou 36 mois selon l'offre) ; le coût courant est calculé à la volée |
| `evenement` | **journal append-only** (voir § 1.4) |

### 1.3 Vue d'ensemble des relations

```
organisation ─┬─ membre ── utilisateur
              ├─ abonnement
              └─ (toutes les tables métier, FK composite (organisation_id, id))

personne ─┬─< affectation_materiel >── materiel ── contrat ── fournisseur ─< contact_fournisseur
          ├─< affectation_ligne    >── ligne ───── contrat
          ├─< compte (rapprochement) ─< attribution_licence >── licence ── application ── fournisseur
          ├─< acces >── application | ressource libre
          ├─< processus ─< tache ──> (materiel | compte | attribution_licence | acces | ligne | responsabilité)
          └─ responsable_id de : contrat, application, sauvegarde, domaine, certificat, compte partagé, site
connexion ─< synchronisation ─< objet_externe ──> compte, licence, attribution_licence
domaine, certificat, sauvegarde ─< test_restauration
alerte ──> (n'importe quel objet, clé de déduplication) ; evenement ──> (n'importe quel objet, journal)
```

Une **vue `v_possessions_personne`** (UNION des affectations, attributions, accès, lignes et responsabilités ouvertes) alimente la fiche « qui a quoi » (US-07) **et** le générateur de la check-list de départ (US-15) : une seule définition de « ce que la personne a », donc pas d'écart possible entre l'écran et la check-list.

Contrainte utile : `EXCLUDE USING gist (organisation_id WITH =, materiel_id WITH =, periode WITH &&)` (extension `btree_gist`) interdit qu'un même matériel soit affecté à deux personnes sur des périodes qui se chevauchent. Même principe pour les lignes.

### 1.4 Multi-tenant : RLS et journal d'audit

**RLS, mise en œuvre (proposée pour l'ADR « multi-tenant »)**

- Trois rôles PostgreSQL : `lanternis_owner` (propriétaire des tables, utilisé **uniquement** par les migrations), `lanternis_app` (application web et workers, **sans** `BYPASSRLS`), `lanternis_ops` (tâches transverses rares : purge, statistiques d'exploitation ; usage journalisé).
- Point d'attention sourcé : « *Superusers and roles with the BYPASSRLS attribute always bypass the row security system* » et les propriétaires de table aussi, sauf `FORCE ROW LEVEL SECURITY` (documentation PostgreSQL 18). Donc : l'application ne se connecte **jamais** avec le rôle propriétaire, et toutes les tables métier ont `ENABLE` **et** `FORCE ROW LEVEL SECURITY`.
- Politique type, identique sur toutes les tables métier :

```sql
CREATE POLICY isolation ON <table>
  USING (organisation_id = current_setting('app.current_org', true)::uuid)
  WITH CHECK (organisation_id = current_setting('app.current_org', true)::uuid);
```

- Le contexte est posé par `SET LOCAL app.current_org = ...` **au début de chaque transaction** (middleware Doctrine côté web ; middleware Messenger côté worker, l'identifiant de l'organisation voyageant dans chaque message). `SET LOCAL` évite la fuite de contexte entre requêtes si les connexions sont réutilisées. Sans contexte, `current_setting(..., true)` renvoie NULL et **aucune ligne n'est visible** : l'échec est sûr.
- Le planificateur lit `organisation` (hors RLS) pour lister les organisations actives, puis envoie un message par organisation.
- **Tests d'isolation automatisés** en CI : deux organisations de test, chaque dépôt Doctrine et chaque route interrogés depuis l'autre organisation doivent renvoyer 0 ligne ou une 404 (H : 1 jour de mise en place, puis un test par nouvelle entité).

**Journal (`evenement`)**

- Append-only : `lanternis_app` n'a que `INSERT` et `SELECT` sur la table (`REVOKE UPDATE, DELETE`). Seul `lanternis_ops` purge, selon la durée de conservation.
- Contenu : horodatage, acteur (`membre`, `connecteur`, `systeme`, `support_hasteria`), objet (type + id), action, **différences en JSONB limitées aux champs modifiés**, adresse IP pour les actions de sécurité seulement.
- **On journalise des identifiants, pas des noms** : la fiche affiche « Paul Martin a rendu le portable » en résolvant l'identifiant au moment de l'affichage. Conséquence : anonymiser la ligne `personne` anonymise aussi tout l'historique, sans réécrire le journal.
- Deux usages : (1) l'**historique métier** visible par le client sur chaque fiche ; (2) le **journal de sécurité** : connexions, échecs MFA, invitations, changements de rôle, connexions de connecteurs, **exports**, et tout accès du support Hasteria à un espace client (accès soumis à un consentement explicite du propriétaire, limité dans le temps, H).
- Partitionnement mensuel : inutile au MVP (H : moins de quelques millions de lignes avant plusieurs centaines de clients).

### 1.5 Ce qui est nominatif, au regard du RGPD (Hasteria sous-traitant)

**Qualification proposée (H, à valider par juriste-rgpd)**

| Traitement | Rôle d'Hasteria | Données nominatives |
|---|---|---|
| Registre du SI du client (personnes, affectations, comptes, accès, processus, journal métier) | **Sous-traitant** (article 28) ; le client est responsable de traitement | Identité professionnelle, rattachement, dates d'arrivée et de départ, équipements, comptes, accès, licences, lignes ; contacts des fournisseurs |
| Données lues par connecteur (Microsoft 365, Google) | Sous-traitant, pour le compte du client | Nom, adresse, état du compte, licences, **dernière connexion** (facultative) |
| Comptes des utilisateurs de Lanternis, sécurité, facturation, support | **Responsable de traitement** (Hasteria) | Email, journal de sécurité, données de facturation chez Stripe |

**Minimisation appliquée aux connecteurs.** On demande à Microsoft Graph et à Google **uniquement** les attributs utiles (`$select` pour Graph, `fields` pour Google) : identifiant, nom affiché, adresse principale, état, licences, date de dernière connexion. Pas de téléphone, pas de photo, pas d'adresse personnelle, pas de groupes au MVP, pas de journaux de connexion détaillés (seulement la dernière date).

**Point de vigilance : la dernière connexion.** C'est une donnée d'activité individuelle de salariés. Son usage doit être limité à la finalité « licence payée sans utilisateur » (A8c, P2) : on conserve **la dernière date seulement, sans historique**, on n'affiche pas de classement par personne, et l'option est **désactivée par défaut** (H : position à valider par juriste-rgpd au regard de la surveillance des salariés).

**Fonctions RGPD à construire (comptées dans l'effort, § 3)**
- Anonymisation automatique d'une personne partie après la durée choisie par le client dans la fourchette fixée par le juriste (H : 12 mois par défaut) : nom, prénom, email remplacés ; fonction et rattachement conservés ; comptes rapprochés détachés et adresses tronquées.
- Export de tout ce qui concerne une personne (droit d'accès exercé auprès du client).
- Effacement d'une organisation à la résiliation ou à la fin d'essai non converti, avec délai de grâce (H : 60 jours), puis disparition des sauvegardes au terme de leur rotation (à documenter : la rotation des 3 copies de `INFRA.md` fixe le délai réel d'effacement).
- `charge_brute` purgée à 7 jours (H).

**Sous-traitants ultérieurs à lister (H, à confirmer)** : OVH (hébergement du VPS, France), Mailjet (emails : adresses des destinataires), Stripe (facturation, Hasteria responsable de traitement), o2switch (copie chiffrée des sauvegardes). **La copie de sauvegarde sur le NAS du domicile (`INFRA.md`)** contient désormais des données nominatives de salariés des clients : la sauvegarde doit être chiffrée de bout en bout avant de quitter le VPS, et ce lieu de stockage doit apparaître dans la documentation de sécurité remise aux clients (point à arbitrer par juriste-rgpd et securite).

**Hors périmètre, garanti par le schéma** : aucune colonne pour salaire, contrat de travail, absence, santé, motif de départ, adresse ou téléphone personnels, mot de passe ou secret. Les champs libres (commentaires, documents) restent un risque : avertissement dans l'interface et dans la mention d'information modèle.

---

## 2. Connecteurs du MVP : droits exacts et coût

### 2.1 Microsoft 365 (Microsoft Graph)

**Architecture d'authentification proposée**
- Une **application Entra ID multi-locataire** enregistrée par Hasteria, en **flux client credentials** (permissions d'application, sans utilisateur connecté), authentifiée par **certificat** détenu par Lanternis (secret Docker, hors base et hors dépôt).
- Chez le client, on ne stocke que **l'identifiant du locataire** reçu après consentement. **Aucun secret propre au client** : D1 est respectée pour Microsoft 365. Contrepartie : le certificat de Lanternis donne accès en lecture aux annuaires de **tous** les clients connectés (risque R2, § 6).
- Consentement : redirection vers `https://login.microsoftonline.com/{tenant}/v2.0/adminconsent?client_id=...&scope=https://graph.microsoft.com/.default&redirect_uri=...&state=...`. La documentation précise : « *In order to request app permissions, you must use the /.default value* » et un administrateur du locataire doit se connecter pour approuver. La réponse renvoie `admin_consent=True` et l'identifiant du locataire, **qu'il ne faut pas utiliser pour authentifier** (avertissement Microsoft) : on le relie à l'organisation via le paramètre `state` signé.
- Rôle Entra requis pour consentir à des permissions d'application Microsoft Graph : **administrateur général ou administrateur de rôle privilégié (H, à vérifier)**. Dans la cible, ce rôle est souvent détenu par le **prestataire** : le parcours doit prévoir l'envoi du lien de consentement au prestataire (H : friction principale de l'activation).
- **Vérification de l'éditeur** (badge bleu) : gratuite, exige un compte Microsoft AI Cloud Partner Program vérifié et un domaine d'éditeur (`lanternis.fr`, pas `*.onmicrosoft.com`). Sans elle, les utilisateurs ordinaires ne peuvent pas consentir aux applications multi-locataires récentes si le consentement renforcé par le risque est actif ; le consentement administrateur reste possible. **À faire avant les pilotes** (rassure le client, coût nul).

**Permissions d'application à demander (toutes en lecture)**

| Besoin | Appel | Permission minimale | Exige | Priorité |
|---|---|---|---|---|
| Comptes, état actif ou bloqué (`accountEnabled`), licences attribuées (`assignedLicenses`) | `GET /users?$select=id,displayName,userPrincipalName,mail,accountEnabled,assignedLicenses` | **`User.Read.All`** (application) | Consentement administrateur | **P1** |
| Sièges achetés et attribués par offre | `GET /subscribedSkus` (`prepaidUnits.enabled`, `consumedUnits`, `skuPartNumber`) | **`LicenseAssignment.Read.All`** | Consentement administrateur | **P1** |
| Dernière connexion (`signInActivity`) | `GET /users?$select=...,signInActivity` | **`AuditLog.Read.All`** en plus | « *Details for the signInActivity property require a Microsoft Entra ID P1 or P2 license and the AuditLog.Read.All permission* » | P2 (A8c), **optionnelle**, demandée séparément (consentement dynamique) |
| Repli sans P1 : dernière activité par service | `GET /reports/getOffice365ActiveUserDetail(period='D90')` (CSV : `Exchange Last Activity Date`, `Teams Last Activity Date`…, `Assigned Products`) | **`Reports.Read.All`** | Aucune licence Entra mentionnée ; **mais** « *By default, all reports hide user information* » : le client doit décocher « Conceal user, group, and site names in all reports » (administrateur général), réglage qui « *also applies to the Microsoft 365 usage reports in Microsoft Graph* ». Données disponibles sous 24 à 72 h | P2, optionnelle |

Remarques :
- `User.Read.All` donne accès à tout le profil ; la minimisation repose sur `$select` côté Lanternis (H : à documenter dans la page sécurité).
- La lecture de `assignedLicenses` avec `User.Read.All` seule est **à vérifier sur un locataire de test (H)** ; à défaut, `Directory.Read.All` (plus large) serait nécessaire, ce qu'on préfère éviter.
- Tout ce qui est P2 (boîtes partagées, groupes, rôles d'administration, Intune) ajoutera des permissions : on les demande **plus tard, par consentement incrémental**, pour que l'écran de consentement du MVP reste court (trois lignes au plus).
- Lecture seule réelle : aucune permission `*.ReadWrite.*` n'est demandée. On ne peut donc techniquement ni bloquer un compte ni retirer une licence, ce qui est conforme à D1.

**Volumétrie et quotas** : pages de 999 utilisateurs (500 avec `signInActivity`) ; limite d'annuaire en lecture de 3 500 unités de ressource par 10 secondes pour un locataire de moins de 50 utilisateurs, 5 000 de 50 à 500 ; service de rapports : 5 requêtes par 10 secondes, `signInActivity` 10 requêtes par minute. Pour des structures de 20 à 250 personnes, une synchronisation tient en **quelques appels** (H) : aucun risque de quota au rythme quotidien. Incrémental via `users/delta` : optimisation possible, pas nécessaire au MVP (H).

**Coût** : 0 € d'accès API pour ces lectures (H : aucun tarif trouvé pour ces points d'accès ; Microsoft facture certaines API « mesurées », pas celles-ci à notre connaissance). Coûts annexes : temps de mise en place de la vérification de l'éditeur (H : une demi-journée) ; un locataire Microsoft 365 de test (H : quelques euros par mois pour une licence Business Basic, ou locataire de développement si disponible).

**Effort (H)** : 1 à 1,5 semaine (consentement, certificat, synchronisation, rapprochement, constat des tâches, tests sur réponses enregistrées, essai sur un vrai locataire).

### 2.2 Google Workspace (Admin SDK)

**Droits nécessaires**

| Besoin | API | Portée OAuth | Remarque |
|---|---|---|---|
| Comptes, `suspended`, `archived`, `lastLoginTime`, `isAdmin`, `isEnrolledIn2Sv`, `orgUnitPath` | Directory API, `users.list` | **`https://www.googleapis.com/auth/admin.directory.user.readonly`** | `lastLoginTime` est un champ du profil : la dernière connexion est disponible **sans édition particulière** (H : aucune condition d'édition mentionnée), à l'inverse de Microsoft |
| Licences attribuées par produit et SKU | Enterprise License Manager API, `licenseAssignments.listForProduct` | **`https://www.googleapis.com/auth/apps.licensing`** | **Aucune portée en lecture seule documentée** : cette portée permettrait techniquement d'attribuer ou de retirer des licences. Lanternis n'appelle que des `GET`, mais la promesse « lecture seule » doit le dire honnêtement (« nous n'utilisons que la lecture ») |
| Sièges achetés | Pas d'API simple identifiée pour les sièges achetés côté client (H : l'API Reseller ne concerne que les revendeurs) | — | **Saisie ou import** du nombre de sièges achetés ; les sièges attribués viennent de l'API |

L'API de licences couvre Business Starter, Standard, Plus, les éditions Enterprise et Frontline ; « *Google Workspace for Nonprofits editions use the same SKU IDs as the corresponding general Google Workspace editions* » : bonne nouvelle pour l'ESS. L'édition gratuite pour associations n'apparaît pas dans la liste (H : sans licence payante, il n'y a de toute façon pas de coût à suivre).

**Trois méthodes possibles**

| Méthode | Ce que fait le client | Ce que stocke Lanternis | Vérification de l'application par Google | Avis |
|---|---|---|---|---|
| **A. Compte de service avec délégation au niveau du domaine** | Un **super-administrateur** colle l'identifiant client du compte de service de Lanternis et les deux portées dans Console d'administration > Sécurité > Accès et contrôle des données > Commandes des API > Gérer la délégation au niveau du domaine (effet « *up to 24 hours but typically happen more quickly* ») ; il indique l'adresse d'un administrateur que Lanternis empruntera | Domaine et adresse de l'administrateur emprunté ; **aucun secret par client** (la clé du compte de service est celle de Lanternis) | Pas d'écran de consentement OAuth : la vérification ne s'applique pas à ce flux (H, à confirmer) | **Recommandée au MVP** : cohérente avec D1, révocable par le client en supprimant l'entrée, pas d'attente de vérification Google |
| B. OAuth 2.0 « Se connecter avec Google » par un super-administrateur, accès hors ligne | Clique « Autoriser » | **Jeton de rafraîchissement chiffré par client** (contraire à la lettre de D1) | Portées sensibles : vérification nécessaire en production, **sauf** si « *An administrator can add a third-party app to the list of trusted apps in the Google Admin console* » (exemption documentée) ; une demande de vérification en attente depuis mars 2026 pour ces mêmes portées est rapportée sur le forum Google (source tierce, un seul cas) | Parcours plus familier, mais délai de vérification imprévisible et jeton à stocker |
| C. Application Google Workspace Marketplace installée par l'administrateur | Installe l'application depuis la Marketplace | Selon l'implémentation | « *administrators can perform an admin install of an unverified app that's published in the Google Workspace Marketplace* » | P2 ou plus tard : publication et fiche Marketplace à maintenir, mais meilleure expérience à grande échelle |

**Recommandation : méthode A pour le MVP**, avec un guide pas à pas illustré (une capture par étape) et, à défaut d'un super-administrateur côté client, l'envoi du guide au prestataire. Risque principal : la clé du compte de service de Lanternis est un **secret maître** qui ouvre la lecture des annuaires de tous les clients Google ; elle se gère comme la clé maîtresse de la v1 (secret Docker, rotation planifiée, jamais dans le dépôt ni dans les sauvegardes de la base). La clé téléchargée est « *the only copy of this key* » : prévoir sa conservation dans le coffre de l'exploitant.

**Coût** : 0 € d'accès (H : Admin SDK sans tarif publié pour ces lectures). Un compte Google Cloud (projet) est nécessaire pour créer le compte de service, sans frais pour cet usage (H). Un domaine Google Workspace de test : H, quelques euros par mois.

**Effort (H)** : 1 à 1,5 semaine, dont le guide de mise en place et un test chez un vrai client.

### 2.3 RDAP et TLS

- **RDAP** : on lit le fichier d'amorçage de l'IANA (`https://data.iana.org/rdap/dns.json`, publié le 2026-10-22) pour trouver le serveur de chaque extension, puis on interroge `domain/<nom>` et on lit l'événement `expiration`. Serveurs constatés : `.fr` → `https://rdap.nic.fr/`, `.com` → `https://rdap.verisign.com/com/v1/`, `.org` → `https://rdap.publicinterestregistry.org/rdap/`. **`.eu` n'est pas listé** dans le fichier d'amorçage : repli sur WHOIS (port 43) ou saisie manuelle de la date (H, à tester). Le fichier d'amorçage est mis en cache (une lecture par semaine).
- **TLS** : connexion `ssl://hote:port` avec SNI et `capture_peer_cert` (extension OpenSSL de PHP), lecture de `validTo` ; aucune authentification, aucune donnée personnelle. Prévoir les erreurs (hôte injoignable, certificat auto-signé, chaîne incomplète) comme des états affichés, pas comme des alertes d'expiration.
- **Anti-bruit (H)** : les certificats émis par ACME (Let's Encrypt) se renouvellent seuls et ont des durées courtes ; une alerte à 30 jours serait du bruit. Règle proposée : si l'émetteur est un émetteur ACME connu, alerter seulement à moins de 10 jours (signe d'un renouvellement en échec). La réduction progressive des durées maximales de validité des certificats publics, annoncée par le CA/Browser Forum, renforce ce besoin (H, à sourcer au cadrage).
- **Fréquence** : quotidienne pour ce qui expire sous 30 jours, hebdomadaire sinon ; requêtes étalées pour respecter les serveurs RDAP (limites non publiées, H).
- **Coût** : 0 €. **Effort (H)** : 0,5 semaine (incluse dans le lot « moteur de connecteurs » du § 3).

### 2.4 Import Excel et CSV

- Bibliothèque **PhpSpreadsheet** (licence MIT) pour `.xlsx` et `.csv` ; OpenSpout en repli si un fichier dépasse la mémoire (H : improbable pour 250 personnes).
- **Le fichier n'est pas conservé** (cohérent avec D2) : téléversé dans un répertoire temporaire du conteneur, lu, transformé en lignes `import_ligne`, puis supprimé immédiatement ; taille maximale (H : 5 Mo, 5 000 lignes).
- Pièges propres aux fichiers français, à traiter dès le départ : séparateur `;`, encodage Windows-1252 des CSV exportés par Excel, dates en numéro de série Excel ou en `JJ/MM/AAAA`, montants avec virgule décimale et espace insécable, cellules fusionnées.
- Six gabarits (personnes, matériel, contrats et fournisseurs, abonnements et licences, accès, lignes), un écran de correspondance des colonnes mémorisée par organisation, validation ligne à ligne, aperçu avant application, **annulation**.
- Sécurité : à l'export CSV (US-20), neutraliser les cellules commençant par `=`, `+`, `-`, `@` (injection de formules) ; à l'import, aucune formule n'est évaluée.
- **Coût** : 0 €. **Effort (H)** : 1,5 à 2 semaines pour les six gabarits (le product-owner compte 1,5).

### 2.5 Moteur commun et rapprochement

Le moteur de la v1 (interface `Connector`, Symfony Scheduler + Messenger avec transport Doctrine, un conteneur `worker`, RateLimiter, reprises exponentielles, journal de synchronisation visible) est conservé tel quel. Deux ajouts propres au nouveau périmètre :

1. **Rapprochement comptes ↔ personnes** : exact sur l'email professionnel, puis proposition sur nom + prénom normalisés (accents, casse, tirets) ; **jamais de confirmation automatique** d'une proposition approximative. Un rapprochement faux produirait une fausse alerte A7 (« compte actif après départ ») : c'est le premier risque de perte de confiance (R5).
2. **Constat des tâches** : après chaque synchronisation, un service compare l'état lu aux tâches ouvertes (compte apparu, compte bloqué, licence libérée) et les passe à « constatée » avec l'identifiant de la synchronisation. L'humain valide.

### 2.6 Synthèse des connecteurs du MVP

| Connecteur | Droits demandés | Secret par client stocké | Coût d'accès | Effort (H) |
|---|---|---|---|---|
| Import Excel/CSV | — | Non | 0 € | 1,5 à 2 sem. |
| Microsoft 365 | `User.Read.All`, `LicenseAssignment.Read.All` ; plus tard `AuditLog.Read.All` (P1 ou P2 requis) ou `Reports.Read.All` | **Non** (identifiant de locataire seulement) | 0 € (H) | 1 à 1,5 sem. |
| Google Workspace | `admin.directory.user.readonly`, `apps.licensing` (pas de variante en lecture seule) | **Non** avec la méthode A ; oui (jeton de rafraîchissement) avec la méthode B | 0 € (H) | 1 à 1,5 sem. |
| RDAP / TLS | Aucun | Non | 0 € | 0,5 sem. |

**Nuance à intégrer à D1** : formulation proposée « Lanternis ne modifie rien dans vos outils et ne stocke aucun mot de passe. Il ne conserve aucun identifiant secret de votre organisation pour Microsoft 365 et Google Workspace. » Les connecteurs P2 (Qonto, Pennylane) imposeront de stocker des jetons chiffrés : la promesse publique devra être ajustée à ce moment.

---

## 3. Effort révisé par lot

### 3.1 Hypothèses

Un développeur seul, **à temps plein**, assisté par IA, semaines de 5 jours ; durées en semaines, **toutes (H)**. Le fondateur a indiqué que le temps n'est pas une contrainte (`STATUT.md`, 2026-10-25), mais sa disponibilité effective en parallèle de Tecnoo reste à mesurer (F9) : à mi-temps, doubler. Les trois scénarios sont **emboîtés** : le pilote concierge est un sous-ensemble de la tranche pilote, elle-même sous-ensemble du P1. Rien n'est jeté d'un scénario à l'autre.

### 3.2 Estimation par lot

| # | Lot | MVP P1 complet | Tranche « pilote » | Pilote concierge |
|---|---|---|---|---|
| L0 | Socle : monorepo, Docker, CI, intégration du design system en composants Twig, authentification, MFA TOTP, invitations, rôles, RLS + tests d'isolation, journal | 2 à 2,5 | 2 à 2,5 | 1,5 à 2 |
| L1 | Abonnement Stripe, essai, droits et limites par offre (§ 5) | 0,75 à 1 | 0,25 (abonnement créé à la main, limites non appliquées) | 0 (facturation hors application) |
| L2 | Personnes, sites, services, affectations datées, fiche « qui a quoi » (M1) | 1 à 1,5 | 1 à 1,25 | 0,75 à 1 |
| L3 | Matériel et cycle de vie (M2) | 0,75 à 1 | 0,75 | 0,5 à 0,75 |
| L4 | Comptes, licences, abonnements, rapprochement (M3) | 1,5 à 2 | 1,25 à 1,5 | 0,75 (déclaratif, rapprochement par import) |
| L5 | Accès déclarés (M4) | 0,5 à 0,75 | 0,5 | 0,5 |
| L6 | Contrats, fournisseurs, lignes, coût du SI (M5) | 1 à 1,5 | 0,75 à 1 (sans lignes) | 0,75 |
| L7 | Domaines, certificats, sauvegardes (M6, hors connecteur) | 0,5 | 0,25 (sans sauvegardes) | 0,25 |
| L8 | Arrivées et départs : modèles versionnés, conditions, générateurs, rôles, échéances, preuves, constats, rappels, clôture (M7) | 3 à 4 | 2 à 2,5 (modèles éditables sans conditions) | 1,5 à 2 (départ seul, preuve déclarative) |
| L9 | Alertes A1 à A16 (P1), digest, centre d'alertes, tableau de bord I1 à I10 (M8) | 1,5 à 2 | 1 à 1,5 (I1 à I7) | 0,75 à 1 |
| L10 | Import Excel/CSV (M10) | 1,5 à 2 (6 gabarits) | 1 à 1,5 (3 gabarits) | 0,75 à 1 (le fondateur importe) |
| L11 | Moteur de connecteurs + RDAP/TLS | 0,75 à 1 | 0,75 | 0,25 (RDAP seul, sans moteur générique) |
| L12 | Microsoft 365 | 1 à 1,5 | 1 à 1,5 | 0 |
| L13 | Google Workspace | 1 à 1,5 | 0 (sauf pilote sous Google : + 1 à 1,5) | 0 |
| L14 | Export CSV complet + fonctions RGPD (anonymisation, export par personne, effacement) (M12) | 0,5 à 0,75 | 0,25 à 0,5 | 0,25 à 0,5 |
| L15 | Exploitation : déploiement, sauvegardes, supervision, accès support tracé | 0,75 à 1 | 0,5 à 0,75 | 0,5 |
| L16 | Sécurité, accessibilité, tests de bout en bout, recette avec les pilotes | 1,5 à 2 | 1 à 1,5 | 0,75 à 1 |
| | **Total** | **19,5 à 26,5** → **19 à 26** | **14 à 18** | **9,5 à 12,5** |
| | **Avec reprise de Cockpit DSI (§ 4)** | **−1 à −2** | **−0,5 à −1,5** | **−0,5 à −1** |

Lecture : point central du P1 complet ≈ 22 semaines (≈ 5 mois de travail effectif) ; tranche pilote ≈ 16 ; concierge ≈ 11. Avec une reprise réussie de Cockpit DSI : 17 à 25, 12,5 à 17,5, 8,5 à 12.

### 3.3 Critique de l'estimation du product-owner (13 à 16 semaines)

L'ordre de grandeur des modules métier est juste ; **le total est sous-estimé d'environ 5 à 10 semaines** (H), pour quatre raisons :

1. **Des lots manquent** : abonnement Stripe, essai et application des limites (≈ 1 sem.) ; fonctions RGPD rendues nécessaires par le registre nominatif (anonymisation, export par personne, effacement : ≈ 0,5) ; exploitation et accès support tracé (≈ 1) ; intégration du design system en composants Twig accessibles (comptée dans L0, ≈ 0,5 de plus que le socle de la v1). Total manquant ≈ 3 semaines.
2. **Le moteur de processus est le lot le plus risqué et il est compté au plus bas** (2,5 sem.). Modèles versionnés avec copie à l'instanciation, conditions, sept générateurs « une tâche par… », rôles résolus en personnes nommées, échéances relatives, trois niveaux de preuve, constat par connecteur, rappels, clôture verrouillée, réouverture tracée : 3 à 4 semaines est plus réaliste, et c'est là que l'imprévu se concentre.
3. **L'import est compté comme un connecteur** (1,5 sem.) alors qu'il comprend six gabarits, la correspondance des colonnes, la validation, l'aperçu et l'annulation, plus les pièges des fichiers Excel français : 1,5 à 2.
4. **La reprise de Cockpit DSI est surévaluée** (−1 à −2 sur le total) : ses entités ont été pensées pour un seul utilisateur et autour des objets, alors que le nouveau modèle est centré sur les personnes, avec affectations datées et multi-tenant. On reprendra surtout des attributs, des règles d'échéance et des gabarits d'écran ; le gain réaliste est de 0,5 à 1,5 semaine sur L3 et L6, **sous réserve de lecture du code**.

Les deux scénarios réduits du product-owner (9 à 11 et 6 à 8 semaines) sont donc également optimistes. Ils restent **la bonne stratégie** : je recommande de **viser d'abord la tranche pilote (14 à 18 semaines)**, et de commencer par le pilote concierge si les entretiens laissent un doute sur la douleur, en les traitant comme des étapes du même produit et non comme des prototypes jetables. Un point de contrôle est à placer à la fin de L8 (moteur de processus) : si ce lot dépasse 4 semaines, retirer les conditions des modèles et le changement de poste du P1.

### 3.4 Ce qui peut faire gagner du temps sans dette

- Construire les écrans du registre sur **un seul gabarit générique** (liste filtrable + fiche + formulaire + historique) décliné par entité, au lieu d'écrans faits main.
- Un seul **catalogue déclaratif** pour les alertes et les indicateurs (déjà prévu en v1).
- **Pas de SPA, pas d'API publique** au MVP : `openapi.yaml` ne décrit au départ que les points d'entrée non HTML (webhook Stripe, export, santé), et grandit avec l'API P3.
- Reporter en P2 : conditions des modèles, changement de poste, multi-sites, PDF.

---

## 4. Reprise de Cockpit DSI

> **Aucun chemin n'a été fourni : le code n'a pas été lu.** Avis fondé sur la description de `0-idee/reponses-fondateur.md` (« actifs, contrats, fournisseurs, jalons ; Symfony 7, PostgreSQL 18 ») et sur la décision du 2026-10-25 (`STATUT.md`) : le code appartient au fondateur / Hasteria, réutilisation possible sans cession.

### 4.1 Ce qui est réutilisable, selon toute probabilité (H)

| Élément de Cockpit DSI | Destination dans Lanternis | Réutilisation probable | Ce qu'il faudra changer |
|---|---|---|---|
| **Actifs** | `materiel` (M2) | Attributs (catégorie, modèle, n° de série, garantie, prix), listes de valeurs, formulaires | Ajouter `organisation_id` et RLS ; remplacer un éventuel champ « utilisateur » par des **affectations datées** ; ajouter le cycle de vie et la sortie avec preuve d'effacement |
| **Contrats** | `contrat` (M5) | Attributs et, s'il existe, le **calcul des échéances** (fin, préavis, reconduction) : c'est le morceau de logique le plus précieux | Date limite de résiliation, responsable interne, lien vers le document au lieu d'un fichier (D2) |
| **Fournisseurs** | `fournisseur`, `contact_fournisseur` | Presque tel quel | Contacts traités comme données personnelles |
| **Jalons** | Échéances et alertes (M8) | Le concept (« une date qui appelle une action ») et d'éventuels rappels | Remplacé par le catalogue de règles A1 à A16 et la table `alerte` dédupliquée |
| Gabarits Twig, si Symfony UX | Écrans du registre | Structure des pages | Réhabillage avec le design system Lanternis et contrôle RGAA |
| Fixtures, jeux de démonstration | Démonstration commerciale | Possible après nettoyage | Aucune donnée réelle de Tecnoo ou de ses clients |

À ne pas reprendre (H) : l'authentification et la gestion des utilisateurs (Lanternis exige MFA, invitations, rôles par organisation), toute hypothèse mono-organisation dans les requêtes, et la base de données elle-même (on réimplante les entités dans le nouveau schéma plutôt que de migrer celui de Cockpit DSI).

### 4.2 Les 5 questions prioritaires au fondateur

1. **Accès et propreté** : où se trouve le dépôt (chemin ou URL) et peut-on en verser une copie hors de `produit/` ? Contient-il, y compris dans l'historique Git, des données réelles de Tecnoo ou de ses clients (fixtures, dumps, captures, `.env`) ? Et pouvez-vous confirmer **par écrit** (une ligne dans `STATUT.md` suffit) que ce code appartient à Hasteria ou à vous-même, et non à Tecnoo SAS ?
2. **Modèle des actifs et des contrats** : un actif est-il rattaché à une personne, et l'historique de ce rattachement est-il conservé ? Les contrats portent-ils déjà reconduction tacite, préavis et calcul d'une date limite ? Existe-t-il des entités pour les licences, les domaines ou les sauvegardes ?
3. **Mono ou multi-organisation** : existe-t-il une notion d'organisation, de client ou d'entité ? Combien d'entités et de dépôts Doctrine faudrait-il toucher pour ajouter `organisation_id` ?
4. **État technique** : version exacte de Symfony et de PHP, résultat de `composer audit`, présence de tests et de PHPStan (niveau), migrations Doctrine rejouables depuis zéro, interface en Twig / Symfony UX ou en SPA ?
5. **Usage réel** : Cockpit DSI est-il utilisé en production chez Tecnoo ? Quels écrans servent vraiment, lesquels ont été abandonnés, et qu'est-ce qui a fait défaut ? (Retour d'expérience directement utile aux entretiens et au tri des priorités.)

**Procédure** : dès réception, revue d'une demi-journée (H), puis ADR « Reprise de Cockpit DSI » (reprise d'éléments, référence fonctionnelle seulement, ou abandon).

---

## 5. Incidences techniques des offres tarifaires

> Rappel de contexte : `2-marche/prix.md` lie chaque offre à une tranche d'effectif (Essentiel 20-49, Pilotage 50-99, Pilotage+ 100-250) et recommande « **pas d'essai gratuit en libre-service** » mais un pilote de 30 jours accompagné. La demande d'un **essai gratuit d'un mois sans carte bancaire** contredit cette recommandation : **arbitrage à faire** par le fondateur avec strategiste-marketing. L'architecture ci-dessous supporte les deux, et supporte aussi une grille où offre et tranche sont indépendantes (`perimetre-produit.md` § 5.2).

### 5.1 Un modèle de droits unique

- **Catalogue des offres dans le code** (fichier de configuration versionné, ex. `config/offres.yaml`) : pour chaque offre, des **fonctionnalités** (drapeaux : `modeles_illimites`, `changement_de_poste`, `revue_acces`, `multi_sites`, `pdf`, `connecteurs_p2`, `api`, `alertes_personnalisees`) et des **limites** (entiers : `personnes_max`, `prestataires_invites_max`, `connecteurs_annuaire_max`, `connecteurs_p2_max`, `modeles_max`, `sites_max`, `historique_mois`). Le catalogue est versionné : un client garde les droits de la version souscrite (H : grand-père des anciennes offres).
- **Un service `Droits`** et un **Voter Symfony** : `is_granted('FONCTION_MULTI_SITES')` dans Twig et les contrôleurs, `$droits->limite($org, 'prestataires_invites_max')` dans les services. Aucune vérification d'offre dispersée dans le code.
- **`droit_override`** pour les exceptions (pilote fondateur, geste commercial) avec date de fin.
- Les drapeaux du catalogue sont la seule source de vérité ; Stripe ne fait que facturer (le `price` porte en métadonnées `marque=lanternis`, `offre`, `tranche`, `periodicite`, utilisées seulement pour retrouver l'offre).

### 5.2 Limites par type

| Limite | Comptage | Application | Raison |
|---|---|---|---|
| **Tranche de personnes** | Personnes au statut « présente » de type salarié, stagiaire, intérimaire, et prestataire externe **ayant au moins une affectation ou un compte** ; bénévoles exclus (H, définition à valider par analyste-finance). Requête simple, indexée | **Souple** : on n'empêche **jamais** d'ajouter une personne ni d'importer (ce serait contraire au registre complet). Au-delà de la tranche, bandeau au propriétaire, tolérance (H : 10 % ou 30 jours), puis proposition de changement de tranche ; l'export et la consultation ne sont jamais bloqués | Facturer la valeur sans dégrader la qualité du registre |
| **Modules** | Drapeaux | **Masquage** des écrans et des actions ; **rétrogradation sans perte** : les données d'un module retiré restent en base, visibles en lecture et exportables (ex. sites conservés, filtres par site masqués) | Réversibilité, pas de prise d'otage des données |
| **Connecteurs** | Lignes `connexion` actives par catégorie ; l'annuaire (Microsoft **ou** Google) compte pour 1 ; RDAP/TLS et l'import ne comptent pas | **Bloquant** à la création d'une connexion, avec explication et proposition | Point de contrôle naturel, rare |
| **Prestataires invités** | Membres au rôle prestataire invité, actifs **ou invités en attente** | **Bloquant** à l'invitation | Idem |
| Modèles de processus, sites, historique | Comptage ou filtre de date | Bloquant à la création ; l'historique au-delà de la limite reste en base et **dans l'export**, seulement masqué à l'écran | L'export n'est jamais bridé (D3) |

Détail d'implémentation : la vérification d'une limite bloquante et la création se font **dans la même transaction**, avec un verrou consultatif par organisation (`pg_advisory_xact_lock`) pour éviter de dépasser la limite par deux clics simultanés (H : cas rare, coût nul).

**Changement de tranche** : une tranche = un `price` Stripe par couple offre × tranche × périodicité (mensuelle, annuelle à −20 %) ; changer de tranche = changer de `price` sur l'abonnement, avec prorata Stripe. La grille de `prix.md` (3 offres, 2 périodicités, plus la remise ESS de 15 % en coupon) représente moins de 10 prix et 2 coupons : gérable à la main dans Stripe, mais **à créer par script** (idempotent, métadonnées incluses) pour éviter les erreurs (H).

**Instantané mensuel du nombre de personnes facturables** dans le journal : preuve en cas de contestation d'une tranche.

### 5.3 Essai gratuit d'un mois sans carte bancaire (Stripe Hasteria, `marque=lanternis`)

Stripe le permet nativement : un abonnement avec période d'essai n'exige pas de moyen de paiement ; avec Checkout, `subscription_data[trial_period_days]=30`, `payment_method_collection=if_required` et `subscription_data[trial_settings][end_behavior][missing_payment_method]=cancel` (ou `pause`, ou `create_invoice`). L'événement `customer.subscription.trial_will_end` arrive « quelques jours » avant la fin de l'essai. Stripe signale toutefois que ce chemin `trial_end` est désormais qualifié d'« ancien » au profit des « offres d'essai » sur abonnements, et met en garde contre les inscriptions de robots quand aucun moyen de paiement n'est demandé.

**Deux options**

| | A. Essai porté par Stripe dès l'inscription | **B. Essai porté par Lanternis, Stripe à la conversion (recommandé, H)** |
|---|---|---|
| Inscription | Création d'un client et d'un abonnement Stripe en essai, sans carte | Création de l'organisation avec `statut=essai`, `essai_fin = +30 j` ; **aucun objet Stripe** |
| Conversion | Le client ajoute un moyen de paiement via le portail client Stripe | Le client choisit offre, tranche et périodicité → **Checkout Stripe** classique (carte ou prélèvement SEPA, collecte du n° de TVA intracommunautaire) |
| Fin d'essai sans conversion | Webhook `customer.subscription.deleted` ou `paused` → Lanternis passe l'organisation en lecture seule | Tâche planifiée → lecture seule |
| Avantages | Rappels et conversion gérés par Stripe | **Pas de clients fantômes dans le compte Stripe partagé** des marques d'Hasteria ; moins de données transmises à Stripe ; aucune dépendance aux webhooks pendant l'essai ; logique identique pour le pilote accompagné facturé de `prix.md` |
| Inconvénients | Spam d'essais visible dans le Stripe commun à toutes les marques ; filtrage des webhooks par marque dès l'inscription | Rappels de fin d'essai à envoyer par Lanternis (Mailjet) |

**Dans les deux cas** :
- Métadonnée `marque=lanternis` sur `Customer`, `Subscription`, `Product` et `Price`, plus `organisation_id` sur `Customer`. **Un point de terminaison webhook propre à Lanternis** reçoit des événements de tout le compte Hasteria : il vérifie la signature, **ignore immédiatement** (réponse 200) tout événement dont l'objet ne porte pas `marque=lanternis`, et traite les autres de façon idempotente (table des identifiants d'événements déjà traités).
- **Fin d'essai** : lecture seule (consultation et **export toujours possibles**), synchronisations et alertes arrêtées ; effacement après le délai de grâce (H : 60 jours) avec deux rappels. Les consentements Microsoft et Google ne sont pas révocables par Lanternis dans le locataire du client : on arrête les appels et on envoie au client la marche à suivre pour retirer l'application (Entra : applications d'entreprise ; Google : supprimer l'entrée de délégation).
- **Garde-fous anti-abus** (le registre étant nominatif, un faux compte d'essai n'est pas anodin) : email vérifié avant tout import, un essai par domaine de messagerie professionnelle (H), captcha respectueux de la vie privée et sans tiers si possible (H : solution à choisir au cadrage), connecteurs disponibles pendant l'essai (sinon l'essai ne montre pas la valeur).
- **Facturation électronique** : Stripe émet la facture ; l'obligation d'émission via une plateforme agréée au 1er septembre 2027 (`CLAUDE.md`) se traite au niveau d'Hasteria pour toutes les marques, pas dans Lanternis (H : export des factures Stripe vers la plateforme retenue).

**Coût Stripe** (tarifs France constatés) : carte standard de l'EEE 1,5 % + 0,25 € ; prélèvement SEPA 0,35 € ; Stripe Billing 0,7 % du volume traité via Billing. Exemple sur Pilotage à 249 € HT, soit 298,80 € TTC (H : assiette TTC pour les frais) : par carte ≈ 4,73 € + 2,09 € ≈ **6,82 € par mois (≈ 2,7 % du HT)** ; par prélèvement SEPA ≈ 0,35 € + 2,09 € ≈ **2,44 € par mois (≈ 1 % du HT)**. Recommandation : proposer le **prélèvement SEPA par défaut** en B2B (H : sous réserve du délai de confirmation des prélèvements, à vérifier). Stripe Tax n'est pas nécessaire au MVP (ventes B2B en France, TVA à 20 %, autoliquidation intracommunautaire hors cible, H).

---

## 6. Risques techniques principaux

| # | Risque | Probabilité (H) | Impact | Parade |
|---|---|---|---|---|
| R1 | **Fuite entre organisations** du registre nominatif (filtrage oublié, rôle propriétaire utilisé par l'application, contexte RLS non posé dans un worker) | Faible | **Fatal** (violation de données personnelles de salariés de plusieurs clients) | RLS `FORCE` + rôle applicatif sans `BYPASSRLS` + FK composites + `SET LOCAL` par transaction + tests d'isolation en CI + revue securite avant production |
| R2 | **Secrets maîtres des connecteurs** : le certificat Entra et la clé du compte de service Google de Lanternis ouvrent la lecture des annuaires de **tous** les clients | Faible à moyenne | **Fatal** | Hors base, hors dépôt, hors sauvegardes de la base ; rotation planifiée ; accès au conteneur `worker` seul ; journal des appels ; plan de révocation (nouveau certificat, nouvelle clé) testé une fois avant production ; permissions en lecture seulement |
| R3 | **Friction d'activation des connecteurs** : le consentement Microsoft exige un rôle d'administrateur privilégié, la délégation Google un super-administrateur ; dans la cible, c'est souvent le prestataire | Forte | Élevé (cockpit vide, essai qui ne montre rien) | Lien de consentement à transmettre au prestataire, guide illustré, vérification de l'éditeur Microsoft, l'import Excel comme premier pas ; mesurer le taux d'activation en pilote |
| R4 | **Moteur de processus plus complexe que prévu** (versions, conditions, générateurs, constats) | Moyenne à forte | Élevé (retard du MVP) | Point de contrôle à la fin de L8 ; conditions et changement de poste reportables en P2 ; tests de scénarios (départ de Paul, US-15) écrits en premier |
| R5 | **Faux constats et fausses alertes** : rapprochement erroné (homonymes, adresses génériques), compte bloqué mais toujours sous licence, alertes de certificats renouvelés automatiquement | Moyenne | Élevé (perte de confiance du dirigeant) | Jamais de confirmation automatique d'un rapprochement approximatif ; « constaté » ≠ « fait » ; « Pourquoi vous voyez ceci » ; règle ACME ; alerte ignorable avec motif |
| R6 | **Dépendance à Entra ID P1 pour la dernière connexion** et masquage par défaut des rapports d'usage | Forte (pour la part de la cible sans Business Premium, H) | Moyen (A8c indisponible ou partielle) | A8 (a) et (b) ne dépendent pas de la dernière connexion ; repli `Reports.Read.All` si le client accepte de lever le masquage ; transparence dans l'interface |
| R7 | **Portée Google `apps.licensing` en écriture** et vérification Google imprévisible (méthode B) | Moyenne | Moyen (promesse « lecture seule » à nuancer ; retard) | Méthode A (délégation) au MVP ; n'appeler que des `GET` ; formulation honnête dans la page sécurité |
| R8 | **Données nominatives hors de l'application** : charge brute, journaux applicatifs, sauvegardes (dont la copie sur NAS à domicile), emails | Moyenne | Élevé (RGPD) | Charge brute 7 jours ; journaux applicatifs sans nom ni email (identifiants seulement) ; sauvegardes chiffrées avant envoi ; emails de notification minimaux, sans liste nominative longue |
| R9 | **Webhooks Stripe partagés entre marques** : événement d'une autre marque traité par erreur, ou essai sans carte qui encombre le compte commun | Moyenne | Moyen | Filtrage par `marque` dès la réception, idempotence ; option B de l'essai |
| R10 | **Maintenance des connecteurs** (changements d'API Graph ou Google, retrait de permissions, quotas) | Moyenne | Moyen (moins qu'en v1 : deux éditeurs stables au lieu de cinq) | Tests de contrat sur réponses enregistrées, supervision des synchronisations (A16), budget de maintenance (H : 10 à 15 % du temps) |
| R11 | **Point unique de défaillance** : un VPS partagé entre ventures, un développeur | Moyenne | Moyen | Sauvegardes 3 copies testées (`INFRA.md`), restauration documentée ; le produit n'est pas critique à la minute (digest hebdomadaire) ; documentation d'architecture tenue à jour (ADR) |
| R12 | **Dérive du périmètre** (pièces jointes, tickets, provisionnement demandés en pilote) | Forte | Élevé (effort) | D1, D2 et le cadrage « pas d'outil de tickets » consignés en ADR ; toute exception passe par une décision écrite du fondateur |

---

## 7. Décisions à acter en ADR (en plus de la liste de la v1 § 8)

1. Modèle centré sur les personnes : affectations datées (`tstzrange` + contrainte d'exclusion), colonnes typées pour les objets des tâches, journal par identifiants.
2. RLS : trois rôles PostgreSQL, `FORCE ROW LEVEL SECURITY`, `SET LOCAL` par transaction, FK composites.
3. Microsoft 365 : application multi-locataire en client credentials par certificat, permissions `User.Read.All` et `LicenseAssignment.Read.All` au MVP, consentement incrémental ensuite.
4. Google Workspace : délégation au niveau du domaine au MVP (méthode A), Marketplace à réévaluer.
5. Données nominatives : liste des attributs lus par connecteur, conservation, anonymisation, dernière connexion désactivée par défaut (avec juriste-rgpd).
6. Droits et limites : catalogue d'offres dans le code, limite de personnes souple, rétrogradation sans perte.
7. Essai : porté par Lanternis, Stripe à la conversion (si l'essai libre est retenu contre l'avis de `prix.md`).
8. Reprise de Cockpit DSI (après lecture du code).
La décision v1 n° 6 (« minimisation des données RH : agrégats uniquement ») est **remplacée** par la n° 5.

## 8. Hypothèses à vérifier (à reporter dans `STATUT.md`)

| # | Hypothèse | Comment la vérifier | Quand |
|---|---|---|---|
| F11 | `User.Read.All` suffit pour lire `assignedLicenses` ; le rôle Entra nécessaire au consentement est bien administrateur général ou administrateur de rôle privilégié | Locataire Microsoft 365 de test | Avant le cadrage technique |
| F12 | La délégation au niveau du domaine échappe à la vérification d'application Google, et la mise en place par un super-administrateur prend moins de 15 minutes avec un guide | Domaine Google de test, puis un pilote | Avant d'ouvrir Google en P1 |
| F13 | Les administrateurs des locataires de la cible sont joignables (dirigeant ou prestataire) et acceptent de consentir | Question Q5 de `perimetre-produit.md` § 7.2 | Entretiens |
| F14 | L'effort P1 complet est de 19 à 26 semaines (H architecte) | Mesurer la vélocité réelle sur L0 à L2 et réestimer | Après 4 semaines de construction |
| F15 | Le gain de la reprise de Cockpit DSI est de 0,5 à 1,5 semaine | Revue du code (§ 4.2) | Avant la phase 5 |
| F16 | Le RDAP de `.eu` nécessite un repli WHOIS | Test sur 3 domaines `.eu` | Construction (L11) |
| F17 | Le prélèvement SEPA est acceptable pour la cible et réduit les frais de moitié | Entretiens, puis taux de choix au paiement | Lancement |
| F7, F9 | (v1) Cockpit DSI réutilisable ; temps plein du fondateur | Inchangées | — |

Hypothèses v1 devenues sans objet pour le MVP : F1 (Pennylane, Qonto), F2 (paie), F3 (gratuité Pennylane, Qonto, PayFit, Lucca), F4 (Chift, Kombo), F5 (agrégateur DSP2), F8 (FEC). Elles reviennent seulement si les connecteurs P2 et P3 sont lancés.

---

## Sources (consultées le 2026-10-26)

**Microsoft**
- Graph, lister les utilisateurs (permissions, `signInActivity` exige Entra ID P1 ou P2 et `AuditLog.Read.All`, tailles de page) : https://learn.microsoft.com/en-us/graph/api/user-list
- Graph, `subscribedSkus` (permission minimale `LicenseAssignment.Read.All`, `prepaidUnits`, `consumedUnits`) : https://learn.microsoft.com/en-us/graph/api/subscribedsku-list
- Graph, rapport `getOffice365ActiveUserDetail` (`Reports.Read.All`, colonnes, périodes D7 à D180) : https://learn.microsoft.com/en-us/graph/api/reportroot-getoffice365activeuserdetail
- Rapports d'usage Microsoft 365, masquage des noms par défaut et effet sur Graph : https://learn.microsoft.com/en-us/microsoft-365/admin/activity-reports/activity-reports
- Protocole de consentement administrateur (point d'accès `adminconsent`, `/.default`) : https://learn.microsoft.com/en-us/entra/identity-platform/v2-admin-consent
- Vérification de l'éditeur (prérequis, gratuité, effet sur le consentement) : https://learn.microsoft.com/en-us/entra/identity-platform/publisher-verification-overview
- Limites de limitation de débit de Graph (annuaire, rapports) : https://learn.microsoft.com/en-us/graph/throttling-limits

**Google**
- Directory API, `users.list` (portée `admin.directory.user.readonly`) : https://developers.google.com/workspace/admin/directory/v1/reference/users/list
- Directory API, ressource `users` (`suspended`, `archived`, `lastLoginTime`, `isAdmin`, `isEnrolledIn2Sv`, `orgUnitPath`) : https://developers.google.com/workspace/admin/directory/reference/rest/v1/users
- License Manager API, `licenseAssignments.listForProduct` (portée `apps.licensing`) : https://developers.google.com/workspace/admin/licensing/v1/reference/licenseAssignments/listForProduct
- License Manager API, produits et SKU (éditions pour associations) : https://developers.google.com/workspace/admin/licensing/v1/how-tos/products
- Délégation au niveau du domaine pour un compte de service : https://developers.google.com/workspace/guides/create-credentials#optional_set_up_domain-wide_delegation_for_a_service_account
- Vérification des applications OAuth : https://support.google.com/cloud/answer/13464321 ; cas où elle n'est pas nécessaire : https://support.google.com/cloud/answer/13464323
- Cas rapporté d'une vérification en attente depuis mars 2026 pour `admin.directory.user.readonly` (source tierce, forum) : https://discuss.google.dev/t/oauth-app-verification-pending-since-march-2026-request-for-status-review/380713
- Classement de `directory.readonly` en portée sensible (source tierce) : https://developer.nylas.com/docs/provider-guides/google/google-verification-security-assessment-guide/

**RDAP, import, base de données**
- IANA, fichier d'amorçage RDAP des domaines (publié le 2026-10-22) : https://data.iana.org/rdap/dns.json
- PhpSpreadsheet, licence MIT : https://github.com/PHPOffice/PhpSpreadsheet/blob/master/LICENSE
- PostgreSQL 18, Row Security Policies (`BYPASSRLS`, propriétaires, `FORCE ROW LEVEL SECURITY`) : https://www.postgresql.org/docs/18/ddl-rowsecurity.html

**Stripe**
- Périodes d'essai sans moyen de paiement (`payment_method_collection=if_required`, `trial_settings.end_behavior.missing_payment_method`, `trial_will_end`, mise en garde anti-spam) : https://docs.stripe.com/billing/subscriptions/trials/free-trials
- Tarifs France (carte EEE, SEPA, Billing, Tax) : https://stripe.com/fr/pricing
