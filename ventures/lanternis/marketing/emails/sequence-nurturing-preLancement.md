---
venture: lanternis
phase: 2b Pré-lancement
auteur: lifecycle-emailing
date: 2026-10-26
révision: 2026-10-26 (v2) — alignement sur le formulaire réel (`marketing/landing/validation.html`) et sur `marketing/landing/conformite-prelancement.md` (pixels désactivés, pied § 4.3, pas d'outil de rendez-vous, autodiagnostic en 10 questions calculé dans le navigateur)
statut: brouillon
skills: sequence-nurturing, copywriting-frameworks, ab-test
envoi: Mailjet — RIEN N'EST ENVOYÉ ; activation soumise à la validation explicite de l'utilisateur, après authentification du domaine et décision sur la cadence (§ 1)
---

# Séquence de nurturing du pré-lancement (5 emails)

> **Objectif mesurable :** faire passer un inscrit d'un **entretien de 30 minutes** à une **lettre d'intention « pilote fondateur »**. Repères repris de `2-marche/acquisition.md` § 4.2 (tous H), tous canaux confondus : 12 à 15 entretiens et ≥ 3 lettres d'intention à ≥ 149 € HT/mois en 8 semaines. La part attribuable à cette séquence sera mesurée, sans cible propre.
> **Destinataires :** inscrits **confirmés** (double opt-in, `liste-attente-remerciement.md`) qui ont coché la case **`nouvelles`**. Segment P1 (`type = entreprise`) ou P2 (`type = ess`). J0 = date de confirmation.
> **Construction :** valeur d'abord (N1, N2), puis une méthode qui appelle un échange (N3, N4), puis l'offre (N5) (skill sequence-nurturing). Chaque email suit **constat concret → conséquence → action simple** (plateforme § 10.1), en BAB ou PAS doux, **sans agitation par la peur**. Un email = un objectif = un CTA.
> **Chiffres :** aucun chiffre de marché dans les corps ; une référence sourcée en note (N3). Les prix de N5 viennent de `2-marche/prix.md` et sont présentés comme **en cours de validation**.
> **Pied, désinscription, mentions Hasteria :** pied du § 4 de `liste-attente-remerciement.md` (texte du § 4.3 de `conformite-prelancement.md`), sur chaque email.
> **Aucun pixel, aucun suivi d'ouverture ni de clic** (désactivés dans Mailjet, recommandation CNIL du 12 mars 2026, `conformite-prelancement.md` § 2.3). Les métriques ci-dessous reposent sur des **réponses** et des **actions comptées côté site, en agrégé**.

---

## 1. Cadence et consentement (décision requise avant activation)

Le libellé réel de la case est : « J'accepte de recevoir les nouvelles de Lanternis par email **(au plus une par mois)** ». Une séquence de 5 emails en 25 jours **ne respecte pas ce libellé** : le consentement ne serait pas éclairé (`conformite-prelancement.md` § 4.3). Deux options :

| Option | Cadence | Ce qu'il faut faire | Effet |
|---|---|---|---|
| **1. Modifier le libellé (recommandé pour le pré-lancement)** | N1 J+3, N2 J+7, N3 J+11, N4 J+18, N5 J+25, puis au plus un email par mois | Nouveau libellé, par exemple : « J'accepte de recevoir les conseils et nouvelles de Lanternis par email : environ un par semaine pendant un mois, puis au plus un par mois. Facultatif, désinscription en un clic. » À intégrer par cro-conversion / dev-vitrine dans `validation.html`, nouvelle `version_mention`, relecture juriste-rgpd. **Ne s'applique qu'aux inscrits qui ont consenti au nouveau libellé.** | La séquence tient dans les 8 semaines du pré-lancement |
| **2. Garder le libellé actuel** | Un email par mois au plus : N1 à J+3, N2 à J+33, N3 à J+63, etc. | Rien à changer sur la landing | Seuls N1 et N2 tombent avant le 18 décembre. Les entretiens et lettres d'intention reposent alors sur la case `echange` et la prospection individuelle ; N3 à N5 deviennent des lettres mensuelles après la décision |

Les inscrits sous l'ancien libellé restent **en option 2** même si l'option 1 est retenue ensuite. E0-A (confirmation) et E0-B (bienvenue) ne sont pas comptés comme des « nouvelles » : ils découlent de l'inscription elle-même (H : à confirmer par juriste-rgpd).

---

## 2. Vue d'ensemble

| # | Délai (option 1) | Valeur apportée | CTA unique | Étape | Métrique principale (sans pixel) |
|---|---|---|---|---|---|
| N1 | J+3 | La carte du SI en trois colonnes (méthode) | Télécharger le modèle de tableau | Valeur | Téléchargements avec `src=n1` (compteur agrégé) |
| N2 | J+7 | Départ d'un salarié : les accès à fermer (check-list) | Faire l'autodiagnostic | Valeur → activation | Visites agrégées de l'autodiagnostic avec `src=n2` ; demandes d'échange issues de l'autodiagnostic |
| N3 | J+11 | P1 : préparer la passation du référent ; P2 : une page SI pour le CA | Répondre avec deux ou trois créneaux | Méthode → échange | Réponses avec créneaux / emails délivrés |
| N4 | J+18 | Cinq questions à poser à votre prestataire, et ce que Lanternis fera ou non | Répondre avec deux ou trois créneaux | Preuve, transparence | Réponses avec créneaux ; objections reçues |
| N5 | J+25 | Le pilote fondateur : conditions écrites, sans engagement de paiement | Répondre « pilote » pour recevoir la lettre d'intention | Offre | Demandes de lettre d'intention, puis lettres signées |

**Pas d'outil de prise de rendez-vous** tant qu'aucun n'est choisi et ajouté aux sous-traitants : les créneaux se fixent **par réponse à l'email**, traitée par le fondateur.

### Règles de sortie et d'exclusion
- **Désinscription** (`desinscription.php`, un clic) : suppression de l'inscription, donc sortie de tout envoi.
- **`echange = oui`** : ne reçoit **pas N3 ni N4** (le fondateur le contacte personnellement, `liste-attente-remerciement.md` § 1) ; reçoit N1, N2 et, si l'entretien n'a pas déjà abouti à une discussion de lettre d'intention, N5.
- **`qualifie = non`** (hors cible) : reçoit N1 et N2 seulement (contenus utiles), pas les propositions d'entretien ni l'offre pilote.
- **Réponse à un email** : la séquence est suspendue 7 jours pour ce contact (suspension manuelle si l'outil ne le permet pas) ; suite traitée personnellement.
- **Entretien fixé** : sortie de N3 et N4. **Lettre d'intention demandée ou signée** : sortie définitive.
- **Aucune réponse ni action** : N5 reste le dernier email de la séquence, puis plus rien que les nouvelles mensuelles éventuelles et l'annonce d'ouverture. Pas de relance de relance.
- **Calendrier** : pas d'envoi entre le 19 décembre 2026 et le 4 janvier 2027 (H, `acquisition.md` § 5) ; pas d'envoi le week-end ; mardi ou jeudi matin (H, non testé).

### Segments
- **P1** (entreprise) : « votre prestataire », « l'infogérance », « les contrats », « le budget informatique ».
- **P2** (ESS) : « votre CA », « vos financeurs », « ESMS », « RGPD », « données des personnes accompagnées ».
- Les blocs *[P1]* / *[P2]* sont des variantes de paragraphe d'un même gabarit. Aucun prénom n'est collecté : salutation « Bonjour, ».

---

## N1. La carte de votre SI en trois colonnes

- **Déclencheur :** confirmation du double opt-in avec `nouvelles = oui`.
- **Délai :** J+3.
- **Objet A :** Votre informatique en trois colonnes
- **Objet B :** Ce que vous avez, ce que vous payez, ce qui arrive à échéance
- **Pré-en-tête :** Une méthode d'une page pour dresser la carte de votre SI, avec vos propres documents.
- **Segment :** P1 et P2 (une phrase variable) ; qualifiés et hors cible.
- **CTA :** « Télécharger le modèle de tableau » → `{{site}}/ressources/carte-si.xlsx?src=n1` (fichier .xlsx et .ods hébergé sur le site, sans formulaire ni nouvelle saisie d'adresse).
- **Métrique suivie :** téléchargements avec `src=n1`, comptés en agrégé (outil d'audience exempté, ou compteur anonyme côté serveur, H : à décider avec dev-vitrine et juriste-rgpd) ; réponses reçues.

**Corps**

> Bonjour,
>
> Pour piloter votre informatique, il n'est pas nécessaire de tout comprendre. Il faut d'abord pouvoir répondre à trois questions : qu'avons-nous, que payons-nous, qu'est-ce qui arrive à échéance ?
>
> Voici la méthode que nous proposons. Une feuille, trois colonnes.
>
> 1. **Ce que vous avez** : postes, téléphones, serveur ou stockage partagé, logiciels métier, messagerie, site internet, nom de domaine.
> 2. **Ce que vous payez** : pour chaque ligne, le fournisseur, le montant et le mode de paiement (facture, prélèvement, carte bancaire).
> 3. **Ce qui arrive à échéance** : date de renouvellement, préavis de résiliation, personne qui décide.
>
> Où trouver l'information, dans cet ordre : vos relevés bancaires des douze derniers mois (les abonnements payés par carte y apparaissent), les factures de votre prestataire, vos contrats signés, puis la liste des licences dans votre console Microsoft 365 ou Google Workspace.
>
> *[P1]* Votre prestataire peut compléter le tableau avec vous : c'est souvent lui qui a le plus d'éléments sur la première colonne.
> *[P2]* Votre service comptable a déjà une bonne partie de la deuxième colonne : c'est souvent le point de départ le plus rapide.
>
> Ne cherchez pas l'exhaustivité au premier passage. Une carte incomplète vaut mieux que pas de carte.
>
> **[Télécharger le modèle de tableau]**
>
> L'équipe Lanternis

**Trame :** BAB (avant : pas de carte ; après : trois réponses ; pont : la méthode). **À produire avant activation :** le modèle de tableau (3 colonnes, un onglet d'exemple fictif).

---

## N2. Départ d'un salarié : les accès à fermer

- **Déclencheur :** N1 envoyé, contact toujours inscrit.
- **Délai :** J+7.
- **Objet A :** Le dernier jour d'un salarié, côté informatique
- **Objet B :** Départ d'un salarié : la check-list des accès
- **Pré-en-tête :** Une liste à cocher pour que rien ne reste ouvert après un départ.
- **Segment :** P1 et P2 (un point variable) ; qualifiés et hors cible.
- **CTA unique :** « Faire l'autodiagnostic » → `autodiagnostic.html?src=n2`. Les réponses de l'autodiagnostic restent dans le navigateur : on **ne sait pas** qui l'a déjà fait, donc le même CTA est envoyé à tous, avec une phrase pour ceux qui l'ont déjà fait.
- **Métrique suivie :** visites de l'autodiagnostic avec `src=n2`, en agrégé (seulement si un outil d'audience exempté est installé, T7) ; demandes d'échange envoyées depuis l'autodiagnostic dans les 7 jours (compteur du formulaire de demande).

**Corps**

> Bonjour,
>
> Quand un salarié quitte la structure, le matériel est généralement rendu. Les accès, eux, sont plus faciles à oublier, parce qu'ils ne se voient pas.
>
> Voici les points à vérifier le dernier jour :
>
> - le compte de messagerie : fermé, ou transféré à un collègue pour une durée fixée ;
> - les licences attribuées (Microsoft 365, Google Workspace, logiciels payés par utilisateur) : libérées, pour ne plus les payer ;
> - les abonnements souscrits à son nom ou avec sa carte professionnelle : repris ou résiliés ;
> - les accès partagés qu'il connaissait (Wi-Fi, comptes administrateur, site internet, banque en ligne) : mots de passe changés ;
> - le téléphone et l'ordinateur : récupérés, puis réinitialisés avant réattribution ;
> *[P1]* - les accès aux outils de vos clients ou fournisseurs (portails, extranets) : signalés et fermés.
> *[P2]* - l'accès au logiciel métier et au dossier des personnes accompagnées : fermé le jour même.
>
> Le plus simple est de faire la même liste à l'arrivée : ce qu'on ouvre le premier jour, on sait le fermer le dernier.
>
> Les accès font partie des 10 questions de notre autodiagnostic. Cinq minutes, résultat immédiat à l'écran, et vos réponses ne nous sont pas transmises. Si vous l'avez déjà fait, refaites-le après avoir rempli votre tableau : le résultat devrait changer.
>
> **[Faire l'autodiagnostic]**
>
> L'équipe Lanternis

**Trame :** constat → conséquence (licences payées pour rien, accès restés ouverts) → action. Pas d'exemple d'incident, pas de chiffre d'attaques.
**Vérifié :** l'autodiagnostic comporte une question sur les accès au départ d'un salarié (`marketing/landing/autodiagnostic.md`, question 5) et une sur les accès administrateur (question 6).

---

## N3. Préparer la passation (P1) / Une page SI pour votre CA (P2)

Deux versions du même email, une par segment.

- **Déclencheur :** N2 envoyé ; `echange = non` ; `qualifie = oui` ; aucun entretien fixé.
- **Délai :** J+11.
- **CTA unique :** « Répondez simplement à cet email avec deux ou trois créneaux » (lien `mailto:` de l'adresse d'expédition, objet prérempli « Échange de 30 minutes »).
- **Métrique suivie :** réponses avec créneaux / emails délivrés ; puis entretiens **réalisés** (absences à suivre).

### N3-P1 (entreprise)

- **Objet A :** Si votre référent informatique partait, que resterait-il ?
- **Objet B :** Départ du responsable informatique : la passation en cinq points
- **Pré-en-tête :** Ce qu'il faut écrire avant son dernier jour, et avec qui le faire.

> Bonjour,
>
> Dans beaucoup de PME, l'informatique tient grâce à une personne : un salarié « qui s'y connaît », un responsable informatique, parfois le dirigeant lui-même. Des offres d'emploi publiées en octobre 2026 en témoignent : des PME recrutent pour remplacer un responsable informatique qui part à la retraite.
>
> Un départ annoncé est une occasion : celle d'écrire ce qui n'était que dans une tête. Cinq points suffisent pour commencer :
>
> 1. la carte en trois colonnes (notre premier email) ;
> 2. la liste des comptes administrateur, et qui d'autre y a accès ;
> 3. où sont les sauvegardes, et quand elles ont été testées pour la dernière fois ;
> 4. les contacts chez chaque prestataire, avec le périmètre de chacun ;
> 5. les décisions en cours : renouvellements, achats prévus, projets.
>
> Nous menons en ce moment des entretiens de 30 minutes avec des dirigeants pour comprendre comment ils vivent cette situation. Nous ne vendons rien pendant cet échange ; vous recevrez la synthèse anonymisée de l'étude.
>
> **Si vous êtes partant, répondez simplement à cet email avec deux ou trois créneaux.**
>
> L'équipe Lanternis

*Source de la phrase sur les offres d'emploi :* `2-marche/signaux-demande.md`, S2 : offres HelloWork du 19/10/2026 (https://www.hellowork.com/fr-fr/emplois/82433859.html) et du 12/10/2026 (https://www.hellowork.com/fr-fr/emplois/84330801.html), consultées le 2026-10-25. **Avant envoi :** vérifier qu'elles sont toujours consultables, sinon retirer la phrase.

### N3-P2 (ESS)

- **Objet A :** Une page sur l'informatique pour votre prochain CA
- **Objet B :** Ce que votre CA peut vous demander sur l'informatique
- **Pré-en-tête :** Cinq rubriques pour présenter votre SI au bureau, en une page.

> Bonjour,
>
> Un jour, un administrateur, un financeur ou un commissaire aux comptes vous demandera : « Où en est-on de l'informatique ? » Une page préparée à l'avance vous épargne de la rédiger au dernier moment.
>
> Voici une trame en cinq rubriques :
>
> 1. **Ce que nous avons** : outils principaux, dont le logiciel métier ;
> 2. **Ce que cela coûte** : total annuel et principaux postes ;
> 3. **Ce qui arrive à échéance** dans les douze mois ;
> 4. **Qui a accès** aux données des personnes accompagnées, et comment les accès sont fermés aux départs ;
> 5. **Les décisions à prendre** : renouvellements, projets, budget.
>
> Nous menons en ce moment des entretiens de 30 minutes avec des DAF et des directions d'association pour comprendre comment elles gèrent leur informatique sans service dédié. Aucune démarche commerciale ; vous recevrez la synthèse anonymisée de l'étude, utilisable devant votre CA.
>
> **Si vous êtes partante ou partant, répondez simplement à cet email avec deux ou trois créneaux.**
>
> L'équipe Lanternis

---

## N4. Cinq questions à poser à votre prestataire

- **Déclencheur :** N3 envoyé ; `echange = non` ; `qualifie = oui` ; aucun entretien fixé.
- **Délai :** J+18.
- **Objet A :** Cinq questions pour votre prochain point avec votre prestataire
- **Objet B :** Votre prestataire et vous : ce qu'il est utile de lui demander
- **Pré-en-tête :** Et, en toute transparence, ce que Lanternis fera et ne fera pas.
- **Segment :** P1 et P2 (une phrase variable).
- **CTA unique :** « Répondez avec deux ou trois créneaux » (réponse à l'email).
- **Métrique suivie :** réponses avec créneaux ; objections reçues (à verser dans la matrice des objections de `marque/messages-par-persona.md`).

**Corps**

> Bonjour,
>
> Votre prestataire fait fonctionner votre informatique. C'est aussi vers lui que beaucoup de dirigeants se tournent en premier en cas de problème. Il peut donc vous aider à en garder la carte. Cinq questions utiles pour votre prochain point :
>
> 1. Pouvez-vous nous transmettre la liste de nos équipements et de nos licences, dans un format que nous pouvons ouvrir ?
> 2. Quels contrats se renouvellent dans les douze mois, et avec quel préavis ?
> 3. Qui, chez nous et chez vous, dispose d'un accès administrateur ?
> 4. Quand nos sauvegardes ont-elles été restaurées pour test la dernière fois ?
> 5. Si nous changions un jour de prestataire, que nous remettriez-vous ?
>
> Ce ne sont pas des questions de défiance : ce sont celles d'une direction qui pilote.
>
> C'est le rôle que nous préparons pour Lanternis. Ce qu'il fera : tenir le registre de tout votre SI (matériel, licences et abonnements, contrats, fournisseurs, accès), vous prévenir avant chaque échéance, et être mis en place avec vous par un DSI. Ce qu'il ne fera pas : remplacer votre prestataire, dépanner vos postes, stocker vos fichiers ou vos mots de passe.
>
> *[P1]* Nous voulons vérifier ces choix avec des dirigeants avant d'aller plus loin.
> *[P2]* Nous voulons vérifier ces choix avec des associations avant d'aller plus loin, notamment sur l'hébergement des données et le tarif associatif.
>
> **Trente minutes vous conviendraient ? Répondez avec deux ou trois créneaux.**
>
> L'équipe Lanternis

*Source de « beaucoup de dirigeants se tournent en premier vers lui » :* baromètre Cybermalveillance.gouv.fr 2025 (OpinionWay, 588 entreprises de moins de 250 salariés) : 39 % se tournent d'abord vers leur prestataire informatique (`2-marche/signaux-demande.md`, S1 ; https://www.cybermalveillance.gouv.fr/medias/2025/10/CP-TPE-PME-07102025-3.pdf, consulté le 2026-10-25). Chiffre volontairement non repris ; « beaucoup » reste en deçà de ce qu'il établit (39 % n'est pas une majorité : ne pas écrire « la plupart »).
*Périmètre « ne stocke ni fichiers ni mots de passe » :* engagement repris de `messages-par-persona.md` (P1, décision) ; à confirmer par l'architecte avant envoi.

**Trame :** BAB ; neutralité vis-à-vis du prestataire (plateforme § 6 et § 10.2) ; transparence (valeur § 7). Aucune critique du prestataire, aucun concurrent nommé.

---

## N5. Le pilote fondateur

- **Déclencheur :** N4 envoyé (ou N2 pour les contacts `echange = oui` sans discussion de lettre d'intention en cours) ; `qualifie = oui`.
- **Délai :** J+25.
- **Objet A :** Devenir structure pilote de Lanternis : les conditions
- **Objet B :** Le pilote fondateur, en clair
- **Pré-en-tête :** Une lettre d'intention, pas un contrat : ce qu'elle engage et ce qu'elle n'engage pas.
- **Segment :** P1 et P2 (paragraphe prix variable).
- **CTA unique :** « Répondez "pilote" à cet email pour recevoir la lettre d'intention » (pas de formulaire en ligne : il créerait un traitement à ajouter au registre).
- **Métrique suivie :** réponses « pilote » / emails délivrés ; puis **lettres signées** (objectif global ≥ 3, hypothèse H3 de `STATUT.md`, tous canaux).

**Corps**

> Bonjour,
>
> Lanternis est en construction. Avant de l'ouvrir, nous cherchons un petit nombre de structures pilotes pour le construire avec elles. Voici les conditions, écrites noir sur blanc.
>
> **Ce que vous obtenez**
> - la mise en place de votre registre du SI avec un DSI, à partir de vos documents ;
> - les alertes avant échéances et le suivi des arrivées et départs ;
> - un tarif fondateur : −30 % pendant douze mois sur l'abonnement.
>
> **Ce que nous vous demandons**
> - un entretien mensuel de retour d'expérience pendant le pilote ;
> - un témoignage à la fin, seulement si vous en êtes satisfait et avec votre accord écrit.
>
> **Les prix** (hors taxes, par mois, grille en cours de validation)
> *[P1]* Selon votre effectif : de 249 € (50 à 99 salariés) à 399 € ou 449 € (100 à 249 salariés), avant la remise fondateur. Mise en place : 990 €.
> *[P2]* Selon votre effectif : de 149 € (20 à 49 salariés) à 399 € ou 449 € (100 à 249 salariés), avant remise. Les structures de l'ESS bénéficient d'une remise de 15 % ; elle n'est pas cumulable avec la remise fondateur : la plus favorable s'applique. Mise en place : 490 € ou 990 € selon le palier.
>
> **Ce qu'engage la lettre d'intention** : elle indique votre intérêt et réserve une place de pilote. Elle ne vaut ni commande ni engagement de paiement. Rien ne sera facturé avant l'ouverture et la signature d'un contrat.
>
> Le nombre de places est limité à dix structures, pour que nous puissions accompagner chacune correctement. Il n'y a pas de date limite : si les places sont prises, nous vous le dirons simplement.
>
> **Si cela vous intéresse, répondez « pilote » à cet email : nous vous enverrons la lettre d'intention.**
>
> L'équipe Lanternis

(Version P1 limitée aux paliers 50 à 249 : les entreprises de 20 à 49 ne sont pas qualifiées, `validation.md` § 7.1.)

**Trame :** offre claire, conditions symétriques, objection « engagement » levée d'avance. Pas de compte à rebours, pas de « dernières places ».

**À valider avant envoi (bloquant) :**
- Grille de prix, remise fondateur −30 %, plafond de 10 places, non-cumul avec la remise ESS : **hypothèses de `2-marche/prix.md` § 4.1** ; à confirmer par l'utilisateur. Le palier 100 à 249 (399 ou 449 €) n'est pas tranché : l'email affiche les deux, ou un seul prix après le test en entretien.
- Texte de la lettre d'intention (non engageante) : à rédiger et à faire relire (juriste-rgpd ou avocat) ; pas encore produit.
- Remise ESS de 15 % et éligibilité (`prix.md` § 4.2) : à valider juridiquement.
- Aucune vente avant le GO : la lettre d'intention n'est pas une vente ; aucun acompte demandé par email.

---

## 3. Tests A/B (exploratoires, sans pixel)

Sans suivi d'ouverture ni de clic, un test d'objet ne se lit que par l'**action** qui suit. Chaque variante porte un paramètre de provenance distinct (`src=n1a` / `src=n1b`, etc.) ou, pour les CTA par réponse, est notée à la main lors du tri des réponses.

| Email | A | B | Métrique de décision |
|---|---|---|---|
| N1 | « trois colonnes » | les trois questions | Téléchargements par `src` (agrégé) |
| N2 | « le dernier jour » | « check-list » | Visites de l'autodiagnostic par `src` (agrégé, si outil d'audience) |
| N3 | Question (P1) / livrable (P2) | Méthode (P1) / attente du CA (P2) | Réponses avec créneaux |
| N4 | « Cinq questions » | « Votre prestataire et vous » | Réponses avec créneaux |
| N5 | « Les conditions » | « En clair » | Réponses « pilote » |

**Taille d'échantillon :** avec un objectif de 80 inscrits qualifiés, dont une partie seulement cochera `nouvelles`, aucun test ne sera significatif. Lecture **indicative**, consignée comme telle dans `marketing/rapports/`. **Option sobre recommandée :** ne tester que N3 (le plus proche de l'objectif) et envoyer la version A ailleurs.

## 4. Tableau de suivi (chaque quinzaine, `acquisition.md` § 4.3)

| Email | Délivrés (Mailjet) | Action comptée | Réponses | Désinscriptions | Plaintes (spam) |
|---|---|---|---|---|---|
| E0-B | | Visites autodiagnostic `src=confirmation` (agrégé) | | | |
| N1 | | Téléchargements `src=n1` | | | |
| N2 | | Visites autodiagnostic `src=n2` ; demandes d'échange | | | |
| N3 | | Créneaux proposés | | | |
| N4 | | Créneaux proposés | | | |
| N5 | | Réponses « pilote » ; lettres signées | | | |

Les délivrances, rebonds, désinscriptions et plaintes restent disponibles dans Mailjet sans pixel. Seuil d'alerte (H) : un taux de désinscription ou de plainte nettement supérieur aux autres emails → suspendre la séquence et revoir le message.

---

## 5. Points ouverts et hypothèses

1. **Cadence (§ 1) : décision bloquante** de l'utilisateur ; si option 1, modification du libellé par cro-conversion / dev-vitrine et relecture juriste-rgpd.
2. **Calendrier (option 1)** : landing prévue en S3 (9 au 13 novembre, `acquisition.md` § 5). Un inscrit après le 24 novembre atteint N5 après le 18 décembre, donc en janvier avec la pause. Option : délais compressés pour les inscrits tardifs (J+2, J+5, J+8, J+12, J+16), à trancher.
3. **Ressources à produire :** modèle de tableau (N1), lettre d'intention (N5), autodiagnostic (`autodiagnostic.md`, à construire par dev-vitrine).
4. **Mesure :** aucun outil d'audience n'est installé (T7) ; tant qu'il ne l'est pas, seules les réponses, les demandes d'échange et les compteurs serveur sont mesurables. Le compteur anonyme de téléchargements est à valider avec dev-vitrine et juriste-rgpd.
5. **Données Mailjet :** ajout de `echange` et `qualifie` aux attributs transmis, à valider par juriste-rgpd (`conformite-prelancement.md` § 5.3).
6. **Domaine :** `lanternis.fr` non réservé ; aucun envoi avant SPF, DKIM et DMARC.
7. **Ton :** les objets de N3 sont les plus proches de la ligne « pas de vente par la peur » : relecture par le brand-manager.
8. **P3 (office manager)** : pas de segment propre ; reçoit la version de sa structure. N2 lui est particulièrement adressé.
9. **Réactivation des inactifs** : non prévue en pré-lancement (liste trop petite) ; à concevoir en phase 9.
