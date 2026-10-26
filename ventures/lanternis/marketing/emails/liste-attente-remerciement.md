---
venture: lanternis
phase: 2b Pré-lancement
auteur: lifecycle-emailing
date: 2026-10-26
révision: 2026-10-26 (v3) — décision du fondateur : la case « nouvelles » garde « au plus une par mois » (§ 1) ; v2 — alignement sur le formulaire réel (`marketing/landing/validation.html`, `validation.md` § 7 et § 9) et sur `marketing/landing/conformite-prelancement.md` (§ 2.3, § 4.3, § 5.3)
statut: brouillon
skills: sequence-nurturing, copywriting-frameworks, ab-test
envoi: Mailjet, en transactionnel, déclenché par `waitlist.php` et `confirm.php` (o2switch) — RIEN N'EST ENVOYÉ ; activation soumise à la validation explicite de l'utilisateur
---

# Liste d'attente : emails de confirmation et de bienvenue

> **Sources :** `marque/plateforme-de-marque.md` (vouvoiement, ton posé, pas de vente par la peur, mots interdits § 10.4) ; `marque/messages-par-persona.md` (P1, P2) ; `marketing/landing/validation.md` § 7 (formulaire, double opt-in) et § 9 (premiers brouillons de ces deux emails, repris et complétés ici) ; `marketing/landing/conformite-prelancement.md` (registre T1 à T4, pixels § 2.3, pied d'email § 4.3, données transmises à Mailjet § 5.3).
> **Signature :** la marque (« L'équipe Lanternis »), conformément à la décision du 2026-10-26 (pas de voix fondateur).
> **Chiffres :** aucun, hormis le nombre de questions de l'autodiagnostic (10) et sa durée annoncée sur la landing (5 minutes, `validation.md` § 5).

---

## 1. Formulaire réel et logique d'envoi

Champs de `validation.html` (aucun prénom) : `email`, `structure`, `type` (`entreprise` ou `ess`), `effectif` (moins de 20 / 20 à 49 / 50 à 99 / 100 à 249 / 250 et plus), `douleur` (un choix) et `douleur_autre` facultatif, puis **deux cases facultatives, décochées par défaut** :
- `nouvelles` : « J'accepte de recevoir les nouvelles de Lanternis par email (au plus une par mois). Facultatif, désinscription en un clic. »
- `echange` : « J'accepte d'être recontacté(e) pour un échange de 30 minutes sur l'informatique de ma structure. Facultatif, sans démarche commerciale. »

**Double opt-in pour tous les inscrits**, quelle que soit la case cochée (`validation.md` § 7.2 et § 7.3) : sans confirmation, rien d'autre n'est envoyé et l'inscription est supprimée au bout de 30 jours.

| Étape | Email | Destinataires | Suite |
|---|---|---|---|
| Envoi du formulaire | **E0-A Confirmation** (immédiat) | Tous | Sans clic : rien d'autre (pas de relance automatique, H : à décider ; une relance unique à J+3 est possible si le juriste la valide) |
| Clic sur le lien de confirmation | **E0-B Bienvenue** (immédiat) | Tous les confirmés | Une phrase change selon `echange` (§ 3) |
| — | Lettre mensuelle `sequence-nurturing-preLancement.md` (4 éditions à date fixe) | Uniquement `nouvelles = oui`, confirmés | **Au plus un email de nouvelles par mois** (décision du fondateur du 2026-10-26 : le libellé de la case est maintenu) |
| — | Prise de contact individuelle pour l'échange | Uniquement `echange = oui` | Email personnel du fondateur, hors Mailjet automatique ; aucun outil de prise de rendez-vous tant qu'il n'est pas choisi et ajouté aux sous-traitants |

**Plafond « au plus une par mois » :** E0-A et E0-B sont des emails liés à l'inscription et ne comptent pas comme des « nouvelles » ; les emails individuels du fondateur aux personnes qui ont demandé un échange ou répondu non plus (consigne du 2026-10-26, **à confirmer par juriste-rgpd**). En conséquence, E0-B doit rester un email de bienvenue : pas de contenu de lettre, pas d'offre.

**Segments** (seules données transmises à Mailjet, `conformite-prelancement.md` § 5.3) : `email`, `structure`, `segment` (P1 = `entreprise`, P2 = `ess`), `nouvelles`. **Ajouts proposés** pour les emails ci-dessous : `echange` (oui/non) et `qualifie` (oui/non). **À valider par juriste-rgpd** avant de les envoyer à Mailjet. Ni `douleur`, ni `douleur_autre`, ni `source` ne sont transmis.

**Hors cible** (`qualifie = non` : effectif moins de 20 ou 250 et plus, ou entreprise de 20 à 49) : mêmes emails, avec la phrase de franchise du § 3.

---

## 2. E0-A Confirmation (double opt-in)

- **Déclencheur :** formulaire valide reçu par `waitlist.php` (y compris un renvoi pour une adresse déjà inscrite, au plus une fois par 24 h, `validation.md` § 7.2).
- **Délai :** immédiat.
- **Expéditeur :** Lanternis, adresse de la marque sur le domaine authentifié (H : `bonjour@lanternis.fr`, domaine non réservé) ; réponses possibles.
- **Objet A :** Confirmez votre inscription à la liste d'attente Lanternis *(objet de `validation.md` § 9)*
- **Objet B :** Un clic pour confirmer votre inscription
- **Pré-en-tête :** Sans confirmation, nous ne conservons pas votre adresse.
- **Segment :** tous.
- **CTA unique :** bouton « Confirmer mon inscription » → `confirm.php?jeton={{jeton_confirmation}}` (jeton valable 7 jours).
- **Métrique suivie :** taux de confirmation = confirmés / formulaires reçus, lu dans le **compteur interne de `waitlist.php`** (source de vérité, `validation.md` § 7.2, point 9). Repère : ≥ 70 % (`validation.md` § 6.3, H).

**Corps**

> Bonjour,
>
> Vous avez demandé à rejoindre la liste d'attente de Lanternis pour {{structure}}.
>
> Pour confirmer, il suffit de cliquer sur ce bouton :
>
> **[Confirmer mon inscription]**
>
> Si vous n'êtes pas à l'origine de cette demande, ignorez cet email : rien ne sera conservé.
>
> L'équipe Lanternis

---

## 3. E0-B Bienvenue (après confirmation)

- **Déclencheur :** clic sur le lien de confirmation (`confirm.php` passe le statut à `confirme`).
- **Délai :** immédiat.
- **Objet A :** Votre place est réservée. Une question pour vous *(objet de `validation.md` § 9)*
- **Objet B :** Votre informatique en 10 questions : par où commencer
- **Pré-en-tête :** Une question à laquelle répondre en une ligne, et un autodiagnostic de 5 minutes.
- **Segment :** P1 et P2 (une phrase variable) ; une phrase selon `echange` ; une phrase si `qualifie = non`.
- **CTA unique :** « Faire l'autodiagnostic » → `autodiagnostic.html?src=confirmation` (paramètre de provenance déjà prévu par `validation.md`). La question ouverte appelle une simple **réponse à l'email** : ce n'est pas un second bouton.
- **Proposition d'entretien :** pas de second appel à l'action. Si `echange = oui`, l'email annonce la prise de contact ; sinon, l'autodiagnostic propose lui-même l'échange en fin de parcours (`validation.md` § 4 ; formulaire de demande avec clause § 4.2 de `conformite-prelancement.md`).
- **Métriques suivies :** réponses à la question ouverte (comptées à la main, elles alimentent `2-marche/script-interview.md`) ; demandes d'échange venant de l'autodiagnostic avec `src=confirmation` (si le formulaire de demande enregistre la provenance) ; visites de l'autodiagnostic avec `src=confirmation`, **en agrégé**, seulement si un outil d'audience exempté est installé (T7, aujourd'hui inactif). **Aucun suivi individuel des ouvertures ni des clics** (§ 5).

**Corps**

> Bonjour,
>
> Merci, votre inscription est confirmée. Nous ouvrirons Lanternis d'abord aux inscrits, par petits groupes, et nous vous préviendrons avant.
>
> En attendant, une question, à laquelle vous pouvez répondre simplement à cet email : **quel est aujourd'hui votre plus gros problème avec votre informatique ?** Une ligne suffit. Nous lisons toutes les réponses.
>
> Et si vous avez cinq minutes, notre autodiagnostic pose 10 questions sur ce que vous avez, ce que vous payez, ce qui arrive à échéance et qui détient les accès. Le résultat s'affiche à l'écran, avec trois actions simples à mener ce mois-ci. Vos réponses restent dans votre navigateur : elles ne nous sont pas transmises.
>
> *[P1]* Il est pensé pour une direction sans DSI : pas de jargon, rien à installer.
> *[P2]* Il est pensé pour une DAF qui a hérité de l'informatique : le résultat peut servir de point de départ pour votre bureau ou votre CA.
>
> **[Faire l'autodiagnostic]**
>
> *[si `echange = oui`]* Vous avez aussi accepté un échange de 30 minutes. Nous vous écrirons personnellement dans les prochains jours pour convenir d'un créneau ; vous pouvez aussi nous répondre dès maintenant avec deux ou trois disponibilités. Nous ne vendons rien pendant cet échange, et vous recevrez la synthèse anonymisée de l'étude.
>
> *[si `qualifie = non`]* Lanternis est conçu pour les structures de 50 à 249 salariés sans DSI, et pour celles de l'ESS dès 20 salariés. Si la vôtre est en dehors de ce cadre, l'autodiagnostic reste utile ; nous vous dirons franchement si Lanternis vous convient.
>
> L'équipe Lanternis

(Le cadre « 50 à 249, ESS dès 20 » reprend la règle de qualification de `validation.md` § 7.1.)

### Test A/B prévu
- **Variable :** objet (A question ouverte, B bénéfice « 10 questions »).
- **Mesure possible sans pixel :** nombre de **réponses** à la question ouverte par variante (comptées à la main) et visites agrégées de l'autodiagnostic avec `src=confirmation-a` / `src=confirmation-b` (si un outil d'audience exempté est installé). Pas de mesure d'ouverture.
- **Limite :** avec un objectif de 80 inscrits qualifiés en 8 semaines (`2-marche/acquisition.md` § 4.2), le test est **exploratoire** ; on ne conclut que sur un écart net, noté comme tel dans `marketing/rapports/`. Option sobre : ne pas tester et envoyer l'objet A.

---

## 4. Pied de page de tous les emails automatiques (liste d'attente, nouvelles)

Texte du § 4.3 de `conformite-prelancement.md`, repris à l'identique, complété du lien « Mentions légales » exigé par la check-list (§ 6, « Technique ») :

> Vous recevez cet email parce que vous vous êtes inscrit(e) à la liste d'attente de Lanternis le {{date_inscription}}. [Me désinscrire en un clic]({{lien_desinscription}}) · [Politique de confidentialité]({{lien_confidentialite}}) · [Mentions légales]({{lien_mentions_legales}})
> Lanternis est une marque d'Hasteria SASU, SASU au capital de 300 €, 99 avenue Achille Peretti, 92200 Neuilly-sur-Seine, RCS Nanterre 981 178 429. Contact : contact@hasteria.net.

- `{{lien_desinscription}}` = `desinscription.php?jeton={{jeton_desinscription}}` : supprime l'inscription en un clic, sans connexion (`validation.md` § 7.2, point 7). Doublé de l'en-tête `List-Unsubscribe` (et `List-Unsubscribe-Post` pour le désabonnement en un clic des messageries).
- Pour E0-A (adresse non confirmée), le lien de désinscription est inutile mais sans inconvénient ; le garder pour un gabarit unique.

---

## 5. Exigences techniques et RGPD avant activation

| Exigence | Détail | Statut |
|---|---|---|
| **Aucun pixel, aucun suivi** | Suivi des **ouvertures et des clics désactivé** dans Mailjet pour tous les envois Lanternis (recommandation CNIL du 12 mars 2026, `conformite-prelancement.md` § 2.3). Liens en clair, non réécrits par Mailjet. Seul un paramètre de provenance (`src=`) figure dans les liens, lu en agrégé. | À configurer dans Mailjet, à contrôler en recette (code source de l'email reçu : aucune image de suivi, aucun lien de redirection Mailjet) |
| Domaine authentifié | `lanternis.fr` non réservé. SPF, DKIM et DMARC sur la zone OVH avant tout envoi. | Bloquant |
| Désinscription | Lien `desinscription.php` + en-tête `List-Unsubscribe` dans chaque email. | À construire (dev-vitrine) |
| Données transmises à Mailjet | `email`, `structure`, `segment`, `nouvelles` ; ajouts proposés `echange`, `qualifie` à valider. | À valider par juriste-rgpd |
| DPA Mailjet | Accepté, sous-traitants ultérieurs vérifiés (`conformite-prelancement.md` T8). | Bloquant |
| Prise de rendez-vous | Aucun outil tiers tant qu'il n'est pas choisi et ajouté aux sous-traitants : prise de rendez-vous **par réponse à l'email**. | Appliqué dans ces brouillons |
| Accessibilité et sobriété | Version texte brut systématique ; HTML léger ; bouton en texte HTML (pas en image) ; en-tête image facultatif (`marque/charte/gabarits/email-entete-600.html`, `alt` renseigné) ; contraste AA. | Prévu |

## 6. Variables à remplir avant activation
`{{structure}}`, `{{jeton_confirmation}}`, `{{jeton_desinscription}}`, `{{date_inscription}}`, `{{lien_confidentialite}}`, `{{lien_mentions_legales}}`, adresse d'expédition (H). La syntaxe des variables et des blocs conditionnels est à traduire dans le langage de gabarit Mailjet (ou le script PHP choisit le bon texte avant l'appel à l'API).
