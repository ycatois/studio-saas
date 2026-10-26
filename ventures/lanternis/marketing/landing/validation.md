---
venture: lanternis
phase: 2b Pré-lancement
commande: /prelancement
auteur: cro-conversion
date: 2026-10-26
version: 3 (plateforme de marque v1.2 : tout le SI d'abord, 6 domaines, arrivées et départs en preuve ; grille D, libre-service)
statut: brouillon
skills: landing-validation-waitlist, landing-page, page-tarifs, copywriting-frameworks, ab-test
fichiers: validation.html (page), autodiagnostic.md (lead magnet)
---

# Landing de validation : stratégie, textes, mesure

> **Statut : brouillon. Rien n'est publié.** La mise en ligne, l'envoi des emails et la diffusion des liens passent par la validation explicite du fondateur (règle 2 de `CLAUDE.md`).
> **Toujours en pré-lancement** : le produit n'existe pas. La page collecte des inscriptions à une **liste d'attente**, pas des inscriptions à l'essai. L'essai gratuit d'un mois sans carte est annoncé « à l'ouverture ».
> **Ce qui change dans la v2 (décisions du fondateur du 2026-10-26, `STATUT.md`)** : vente en libre-service ; essai gratuit d'un mois sans carte ; **grille D validée** (`2-marche/propositions-tarifs.md` § 11) ; aucun service humain inclus ; périmètre « tout le SI centré sur les personnes » (`1-analyse/perimetre-produit.md`) ; connecteurs banque et compta retirés du MVP ; aucun téléversement de fichiers. Les promesses « mis en place avec vous » et « un DSI vous accompagne » sont supprimées et remplacées par **« conçu par un DSI »** (méthodes et check-lists de DSI intégrées).
> **Ce qui change dans la v3 (retour du fondateur du 2026-10-26 : « on a l'impression que c'est juste un truc d'entrées et de départs »)** : la page suit la logique de la plateforme de marque v1.2 (§ 4) : **1. tout le SI → 2. relié aux personnes → 3. alertes, coût lisible, et arrivées et départs en preuve**. Nouveau titre A et sous-titre (§ 4.1), section « Tout ce que Lanternis suit pour vous » avec les 6 domaines repris tels quels (§ 4.2), aperçu du hero montrant plusieurs types d'échéances, section arrivées et départs raccourcie et placée après, FAQ « Gérez-vous le matériel loué ? ». Phrases réductrices de la v2 retirées (§ 10.7). Tarifs, formulaire et texte `.mention-form` inchangés.
> **Sources internes :** `marque/plateforme-de-marque.md` (v1.2 : § 4, 4.1, 4.2, 10.6, 10.7), `marque/messages-par-persona.md`, `marque/charte/`, `1-analyse/perimetre-produit.md` (§ 0.3, 2, 3, 4, 6.3), `2-marche/propositions-tarifs.md` (§ 1.1, 1.3, 11), `2-marche/personas.md`, `acquisition.md`, `signaux-demande.md`.
> **(H)** = hypothèse non vérifiée. Les seuls chiffres externes affichés sur la page sont sourcés (S2 : offres HelloWork et Insee, § 5.13). Les prix sont ceux de la grille D, affichés comme « tarifs de lancement envisagés ».

---

## 1. Ce que la page doit prouver

**But unique :** mesurer la demande réelle avant de coder, en convertissant un visiteur en **inscrit qualifié** sur la liste d'attente. Dans un modèle en libre-service, la valeur mesurée n'est plus « accepter un rendez-vous » mais **l'intention d'essayer** et **l'intérêt pour un palier de prix**, déclarés après avoir vu les prix.

**Hypothèses testées par la page**

| Hypothèse (`STATUT.md`) | Ce que la page mesure | Limite |
|---|---|---|
| **H5 Acquisition** (en libre-service : volume d'essais, `propositions-tarifs.md` § 11.6) | Inscrits qualifiés par source ; part qui déclare vouloir essayer dès l'ouverture | La page ne crée pas le trafic. Une intention déclarée n'est pas un essai |
| **H1 Douleur SI** (contrats reconduits, licences et matériel non maîtrisés, départ du référent, arrivées et départs) | Répartition de « ce qui vous préoccupe le plus » ; taux d'inscription selon le titre A ou B | Déclaratif ; à recouper en entretien |
| **H3 Volonté de payer** (grille D) | Indirect : les prix sont affichés **avant** le formulaire ; palier choisi (Essentiel, Pilotage, Pilotage+) ; usage du simulateur ; clics « Rejoindre la liste d'attente pour… » sur chaque offre | Une inscription n'est pas un achat. La preuve reste l'essai converti en abonnement, après l'ouverture |
| **H4 Cockpit vide** (en libre-service) | Part des inscrits qui choisissent Pilotage (modèles illimités, prestataires) ; questions ouvertes dans la FAQ « Qui m'aide à démarrer ? » | Très indirect ; se mesure vraiment pendant l'essai (activation) |
| **H2 Pas déjà résolu** | Part de « Autre chose » ; réponses à la question ouverte de l'email de bienvenue | Faible ; surtout qualitatif |

**Ce que la page ne prouve pas :** l'achat, l'activation sans aide humaine, la rétention, la faisabilité des connecteurs. Elle ne remplace pas les 12 à 15 entretiens (`propositions-tarifs.md` § 11.6, point 6).

## 2. Cibles

- **P1 (principal), Marc, dirigeant d'une PME sans DSI.** Version par défaut. Message phare : **toute l'informatique lisible, chaque élément relié à une personne** (plateforme v1.2, message 1) ; les échéances ensuite ; les arrivées et départs en preuve. Le départ du référent informatique (S2) reste un argument de continuité.
- **P2 (variante ESS), Nadia, DAF d'une association de 20 à 249 salariés.** Même page avec `?public=ess` : titre et sous-titre propres, type « ESS » présélectionné dans le formulaire **et dans le simulateur**. Arguments propres : tarif associatif, bénévoles non facturés, preuves pour le CA et les financeurs.
- **P3 (office manager)** : pas de version dédiée. Elle suit souvent le matériel, les locations et les arrivées et départs : les 6 domaines et la section de preuve lui parlent directement ; elle peut transmettre la page à sa direction.
- **Tranché le 2026-10-26** : avec la grille D validée et le libre-service, les PME de 20 à 49 personnes entrent dans la cible (cœur de cible 20 à 99). La page, la carte « Pour qui » et la règle `qualifie` (§ 7.1) visent désormais les **entreprises et structures de l'ESS de 20 à 249 personnes**.

## 3. Promesse et test des 5 secondes

**Promesse (plateforme de marque v1.2, § 4) :** « Toute votre informatique, reliée à chaque personne : vous savez qui a quoi, ce que vous payez et ce qui arrive à échéance. Et Lanternis vous prévient avant. »

| En 5 secondes, le visiteur doit comprendre | Où sur la page |
|---|---|
| **Quoi** : toute l'informatique (contrats, matériel, licences, accès), chaque élément relié à une personne, avec les échéances | Titre + sous-titre + aperçu (contrat avec préavis, fin de location d'un copieur, licences sans utilisateur, garantie, un départ) |
| **Pour qui** : PME et associations sans DSI | Ligne « Conçu par un DSI, pour les PME et les associations qui n'en ont pas » + ligne sous les boutons |
| **Où en est le produit** : en préparation, liste d'attente, essai d'un mois sans carte à l'ouverture | Étiquette au-dessus du titre + ligne sous les boutons |
| **Quoi faire** : rejoindre la liste d'attente | Bouton principal (un seul objectif de conversion) |

Test à faire avant la mise en ligne : montrer la page 5 secondes à 5 personnes de la cible (réseau Tecnoo), leur demander « c'est quoi, pour qui, que feriez-vous ? ». Seuil : 4 sur 5 répondent juste sur les trois points (H). Question ajoutée en v3 : « Citez trois choses que l'outil suit. » Seuil (H) : 4 sur 5 citent au moins deux éléments parmi contrats, matériel et licences. Si la réponse dominante est « les arrivées et départs », la hiérarchie de la page reste à revoir (retour du fondateur).

## 4. Structure (cadre PAS puis AIDA)

| # | Section | Rôle | Cadre |
|---|---|---|---|
| 1 | En-tête (logo nuit, ancres : ce que Lanternis suit, comment ça marche, tarifs, questions) | Repère, navigation interne | — |
| 2 | Hero : étiquette « En préparation », titre, sous-titre, « Conçu par un DSI… », bouton principal, bouton « tarifs », ligne essai sans carte, aperçu du tableau de bord avec plusieurs types d'échéances (exemple fictif, légendé) | Attention, test des 5 secondes | AIDA : A |
| 3 | Problème : « Votre informatique tient-elle dans la tête d'une seule personne ? » (contrats reconduits, dépenses inutiles, une seule personne sait) | Nommer l'ennemi, pas le prestataire | PAS : P + A |
| 4 | **Tout ce que Lanternis suit pour vous** : les 6 domaines en cartes avec icônes de la charte, ligne « Et le coût de votre SI, par an et par personne. » | Montrer l'étendue : tout le SI | PAS : S ; AIDA : I |
| 5 | Arrivées et départs, **en preuve** : « chaque départ a sa check-list », version courte | Montrer que tout est relié aux personnes | AIDA : I |
| 6 | Comment ça marche, en libre-service (4 étapes) | Lever « encore un outil à remplir » et « personne pour m'aider » | AIDA : I |
| 7 | Et votre prestataire ? | Objection n° 1, neutralité ; prestataire invité | AIDA : D |
| 8 | Autodiagnostic (lead magnet) | Second point d'entrée, sans email obligatoire | AIDA : D |
| 9 | Pour qui / pas pour qui | Qualifier ; dire ce que Lanternis ne fait pas (administration des comptes, trésorerie) | AIDA : D |
| 10 | Ce que nous pouvons promettre aujourd'hui (déjà vrai / prévu) | Preuves honnêtes, **aucun témoignage ni logo** | AIDA : D |
| 11 | **Tarifs envisagés (grille D)** : 3 cartes (Essentiel, Pilotage mis en avant, Pilotage+ « bientôt »), tableau par tranche, simulateur (JS progressif), règles annuel / ESS / bénévoles | Transparence, qualification, mesure de l'intérêt par palier | AIDA : D |
| 12 | FAQ (12 questions) | Objections, dont aide en libre-service, services facultatifs, sécurité | AIDA : D |
| 13 | Formulaire de liste d'attente (CTA final), avec palier et intention d'essai facultatifs | Conversion et mesure | AIDA : A |
| 14 | Sources des chiffres cités | Zéro chiffre non sourcé | — |
| 15 | Pied de page (mentions Hasteria, liens légaux) | Légal | — |

Un seul objectif de conversion (l'inscription). Les liens des cartes d'offre mènent au même formulaire et présélectionnent le palier.

## 5. Textes complets (version P1, titre A)

Les textes ci-dessous sont ceux de `validation.html`. Ton : vouvoiement, posé, sans vocabulaire de la peur (plateforme § 10). Aucune mention « mis en place avec vous », « accompagnement » ou « un DSI vous accompagne ».

### 5.1 Hero
- Étiquette : **En préparation · liste d'attente ouverte**
- Titre (A) : **Toute votre informatique, enfin lisible : qui a quoi, ce que vous payez, ce qui arrive à échéance.** (plateforme v1.2, § 4.1, titre A)
- Sous-titre (A) : « Contrats, matériel, licences, accès : chaque élément de votre SI relié à une personne. Lanternis est conçu pour vous prévenir avant chaque échéance, pas après. » (§ 4.1, titre B en sous-titre, complété par une phrase en « conçu pour », règle du § 10.6)
- Signature : **Conçu par un DSI, pour les PME et les associations qui n'en ont pas.**
- Bouton principal : **Rejoindre la liste d'attente** · bouton secondaire : **Voir les tarifs envisagés**
- Sous les boutons : « Inscription gratuite et sans engagement. À l'ouverture : essai gratuit d'un mois, sans carte bancaire. Pour les PME de 20 à 249 salariés et les associations de 20 à 249 salariés. »
- Aperçu « Votre informatique ce mois-ci » : coût du SI par an 38 420 € HT ; coût par personne et par an 1 011 € HT (38 420 ÷ 38 personnes, cohérent avec l'exemple) ; 5 échéances à 90 jours « à décider ». Liste « Échéances des 90 prochains jours » : contrat de maintenance informatique, préavis dans 21 j, 4 800 € HT/an (A1) ; location du copieur de l'accueil, fin dans 45 j, 2 160 € HT/an (A3) ; 3 licences Microsoft 365 sans utilisateur, « à libérer », 540 € HT/an (A8) ; garantie de 6 postes portables, fin dans 70 j (A3) ; départ de Claire M. vendredi : portable, compte, 2 licences (A9, M7). « Pourquoi vous voyez ceci : le contrat de maintenance se reconduit tacitement pour un an s'il n'est pas résilié dans les 21 jours. » Légende : « Maquette de principe du tableau de bord prévu. Exemple fictif : ces éléments, ces personnes et ces montants ne viennent d'aucun client. »
- Variante B (`?v=b`) : titre « Contrats, matériel, licences, accès : chaque élément de votre SI relié à une personne. » ; sous-titre « Vous savez qui a quoi, ce que vous payez et ce qui arrive à échéance. Lanternis est conçu pour vous prévenir avant, pas après. » (attribut `data-sous-titre-b`, échangé par le script).

### 5.2 Problème
**Votre informatique tient-elle dans la tête d'une seule personne ?**
« Sans DSI, personne n'a la vue d'ensemble de votre système d'information (le SI, c'est-à-dire toute votre informatique) : quels contrats, quel matériel, quelles licences, qui a accès à quoi, et ce que tout cela coûte. »
1. **Des contrats se reconduisent sans décision.** Maintenance, location du copieur, hébergement : la date de préavis passe, et le contrat repart pour un an.
2. **On paie des choses que personne n'utilise.** Licences sans utilisateur, abonnements pris par carte bancaire, matériel dont on ne sait plus qui l'a.
3. **Une seule personne sait.** Si votre référent informatique partait demain, qui saurait ce que vous possédez, qui a accès à quoi et ce qui se renouvelle le mois prochain ? Et quand un salarié part, qui vérifie que son compte est fermé et son portable rendu ?

Ces situations sont des formulations d'expérience, pas des statistiques : à confirmer en entretien (H).

### 5.3 Tout ce que Lanternis suit pour vous (6 domaines)
Chapeau : « Un seul registre de toute votre informatique, écrit pour la direction et pas pour des techniciens. Chaque élément y est relié à une personne, ou à un responsable s'il est partagé. »

Six cartes (liste `ul`), textes repris **tels quels** de la plateforme v1.2 § 4.2, avec une icône de `marque/charte/iconographie/icones/` (fichier SVG en `<img alt="">`, décoratif, sur pastille ambre pâle fixe pour rester lisible en thème sombre) :

| Carte | Icône | Texte |
|---|---|---|
| Contrats et fournisseurs | `contrat.svg` | Préavis, reconduction tacite, date limite de résiliation calculée et rappelée à temps. |
| Matériel acheté, loué ou en leasing | `poste.svg` | Qui l'a, fin de garantie ou de location, renouvellement prévu, restitution. |
| Licences et abonnements logiciels | `licence.svg` | Qui a quoi, licences payées sans utilisateur, date de renouvellement. |
| Comptes et accès | `acces.svg` | Qui a accès à quoi, comptes encore actifs après un départ, aucun mot de passe stocké. |
| Domaines, certificats et sauvegardes | `sauvegarde.svg` | **Écart volontaire avec le § 4.2** : « Expirations des domaines et des certificats surveillées ; sauvegardes (vérifications consignées) » + étiquette **prévu**, car les sauvegardes (US-13) peuvent glisser en tranche 2 (plateforme § 4.2, points de vigilance ; demande du coordinateur). |
| Arrivées et départs | `arrivee.svg` | Une check-list tirée de ce que la personne a vraiment, preuve à l'appui. |

Ligne de synthèse : **« Et le coût de votre SI, par an et par personne. »** Puis : « Le produit est en préparation : ces domaines décrivent ce qui est prévu à l'ouverture. Lanternis est conçu pour vous prévenir avant chaque échéance, avec un récapitulatif chaque semaine plutôt qu'un flux de notifications. » Aucune donnée de trésorerie ni de banque : seul le coût du SI est suivi (`perimetre-produit.md` § 0.3).

### 5.4 Arrivées et départs, la preuve que tout est relié
**La preuve que tout est relié : chaque départ a sa check-list** — « Parce que chaque contrat, matériel, licence et accès est relié à une personne, la liste des tâches d'un départ n'est pas un modèle générique : c'est ce que la personne a vraiment. »
- Récupérer son portable et son téléphone, ou rendre le matériel loué au loueur ;
- bloquer son compte, libérer ses licences, retirer ses accès (constat automatique prévu pour les comptes et licences Microsoft 365) ;
- confier à quelqu'un les contrats et les applications dont elle était responsable.
Puis : « Même principe à l'arrivée : poste, compte, licences et accès prêts à temps. Chaque tâche a un responsable et une date ; vous gardez la preuve datée que tout a été fait. **Lanternis ne crée ni ne supprime aucun compte à votre place** : il vous dit quoi faire et constate que c'est fait. » (garde-fou du § 0.3 de `perimetre-produit.md`). Cette section cite toujours contrats, matériel et licences avec les départs (§ 10.7).

### 5.5 Comment ça marche (libre-service)
« Vous vous lancez seul, guidé pas à pas. Lanternis est conçu par un DSI : les méthodes et les check-lists d'un DSI sont déjà dans l'outil. »
1. **Partez de votre Excel** (gabarit fourni ; liste du prestataire possible).
2. **Reliez Microsoft 365**, en lecture seule. « Google Workspace viendra ensuite » (décision D4 : Google au MVP seulement si un pilote l'utilise).
3. **Invitez votre prestataire.**
4. **Lanternis vous prévient** (alertes, récapitulatif hebdomadaire).
Mention : « Le produit est en préparation : ces étapes décrivent le fonctionnement prévu à l'ouverture. » La banque et la comptabilité ne sont plus citées (connecteurs retirés du MVP).

### 5.6 Et votre prestataire ?
« Il fait marcher vos postes, vos sauvegardes et votre réseau : il continue. Lanternis ne le remplace pas, il vous donne la carte pour piloter avec lui. Invité dans Lanternis, il complète le registre et traite ses tâches d'arrivée et de départ ; il ne voit pas vos montants. **Si votre référent part, votre SI reste.** » (rôle « prestataire invité », `perimetre-produit.md` § 5.3 : montants masqués par défaut)

### 5.7 Autodiagnostic
Inchangé : **Autodiagnostic SI gratuit : 10 questions, 5 minutes**, résultat à l'écran sans email (→ `autodiagnostic.html`). À revoir par son auteur : ajouter une question sur les arrivées et départs si l'autodiagnostic est mis à jour.

### 5.8 Pour qui, et pour qui ce n'est pas
- Fait pour vous si : PME ou association de 20 à 249 salariés ; pas de DSI ; envie de savoir quels contrats, quel matériel (acheté ou loué) et quelles licences vous avez, et qui les utilise ; envie de connaître le coût du SI et de décider avant les renouvellements ; que rien ne soit oublié quand quelqu'un arrive ou part ; préférence pour démarrer seul, sans rendez-vous commercial.
- Pas pour vous si : DSI ou équipe interne ; besoin de dépannage, d'infogérance ou d'antivirus ; besoin d'un outil qui **crée et supprime les comptes** (provisionnement) ; besoin d'un outil de **trésorerie ou de comptabilité**.

### 5.9 Ce que nous pouvons vous promettre aujourd'hui
- **Déjà vrai** : tarifs publics HT, sans « contactez-nous » en dessous de 500 personnes ; **conçu par un DSI** (méthodes et check-lists de DSI intégrées) ; aucun cookie ni traceur sur la page ; réponses ni revendues ni utilisées à des fins publicitaires.
- **Prévu à l'ouverture** (étiquette « prévu ») : essai gratuit d'un mois sans carte ; Microsoft 365 en lecture seule, aucun mot de passe demandé ni stocké (D1) ; aucun fichier à téléverser (D2) ; hébergement en France ; export complet à tout moment.

> À valider par le fondateur : « Conçu par un DSI » est une preuve déclarative (`0-idee/reponses-fondateur.md`), sans nom ni voix fondateur. La mention « 25 ans d'expérience » de la v1 est retirée tant que sa formulation n'est pas validée (`STATUT.md`, arbitrages). Si l'outil de mesure d'audience retenu dépose un cookie, retirer « aucun cookie ».

### 5.10 Tarifs de lancement envisagés (grille D)

Source : `2-marche/propositions-tarifs.md` § 11.2 et § 11.3, grille validée par le fondateur le 2026-10-26. Les prix restent des **hypothèses de lancement (H)** et sont affichés comme « envisagés ».

- Phrase phare : **Dès 49 € HT par mois**
- Texte : « Un prix par structure, selon le nombre de personnes gérées, et non par utilisateur. Ces tarifs de lancement sont envisagés et peuvent encore évoluer : les inscrits en seront informés avant l'ouverture. À l'ouverture, chaque offre pourra être essayée gratuitement pendant un mois, sans carte bancaire. »

**Cartes d'offre**

| | Essentiel | **Pilotage** (mis en avant : « Le plus complet à l'ouverture ») | Pilotage+ (« Bientôt ») |
|---|---|---|---|
| Prix affiché | 49 € HT/mois jusqu'à 49 personnes | 99 € HT/mois jusqu'à 49 personnes | 199 € HT/mois **envisagés** jusqu'à 49 personnes |
| Accroche | Pour tenir le registre et ne rien oublier | Pour piloter et rendre des comptes | Pour les structures à plusieurs sites |
| Contenu affiché (v3 : domaines nommés) | Contrats et fournisseurs, avec préavis et date limite de résiliation ; matériel acheté, loué ou en leasing (affectation, garantie, fin de location) ; licences et abonnements logiciels, comptes et accès, reliés aux personnes ; domaines et certificats surveillés, sauvegardes (vérifications consignées) **« prévu »** ; coût du SI par an et par personne ; arrivées et départs (1 modèle d'arrivée, 1 de départ) ; import Excel, Microsoft 365 en lecture seule ; alertes, récapitulatif, tableau de bord ; 3 utilisateurs, 1 prestataire invité, 12 mois d'historique ; export complet ; aide en ligne et par email | Tout Essentiel + modèles illimités avec conditions ; utilisateurs illimités, 3 prestataires invités ; historique illimité ; réponse plus rapide par email ; **« après l'ouverture »** : changement de poste, revue des accès, décisions de renouvellement, passation et procédures, synthèse mensuelle et attestations PDF | Tout Pilotage + multi-sites avec responsables de site ; prestataires illimités ; règles d'alerte personnalisées ; API en lecture. « Ouvrira avec le multi-sites, après le lancement. » |
| Lien | « Rejoindre la liste d'attente pour Essentiel » | « … pour Pilotage » | « Être prévenu de l'ouverture de Pilotage+ » |

Choix de rédaction : les fonctions classées P2 au § 11.3 sont étiquetées « après l'ouverture » pour ne rien promettre au lancement. Les délais de support (2 jours ouvrés, 1 jour ouvré, H) ne sont pas chiffrés sur la page (« réponse plus rapide ») tant qu'ils ne sont pas tenables. Les connecteurs P2 (Qonto, Pennylane) ne sont pas cités.

**Tableau (lisible sans JavaScript)** : « Prix envisagés selon le nombre de personnes gérées, en € HT par mois »

| Personnes gérées | Essentiel, au mois | Essentiel, à l'année (par mois) | Pilotage, au mois | Pilotage, à l'année (par mois) |
|---|---|---|---|---|
| Jusqu'à 49 | 49 € | 39,20 € | 99 € | 79,20 € |
| 50 à 99 | 79 € | 63,20 € | 159 € | 127,20 € |
| 100 à 149 | 109 € | 87,20 € | 219 € | 175,20 € |
| 150 à 199 | 139 € | 111,20 € | 279 € | 223,20 € |
| 200 à 249 | 169 € | 135,20 € | 339 € | 271,20 € |
| 250 à 499 | + 30 € par tranche de 50 (199 à 319 €) | 159,20 à 255,20 € | + 60 € par tranche de 50 (399 à 639 €) | 319,20 à 511,20 € |
| 500 et plus | « Écrivez-nous à contact@hasteria.net : la même règle de prix s'applique. » | | | |

Contrôle : valeurs identiques au § 11.2 (annuel = mensuel × 0,8 ; 250 à 499 = 199 + 30 × k et 399 + 60 × k, k de 0 à 4).

**Simulateur (amélioration progressive)** : bloc `#simulateur` avec l'attribut `hidden`, affiché par le script seulement. Champs : nombre de personnes gérées (aide : « Salariés, stagiaires, alternants, intérimaires et prestataires équipés. Les bénévoles ne comptent pas. »), type de structure (entreprise ou ESS ; ESS présélectionné avec `?public=ess`), facturation (mensuelle ou annuelle −20 %). Résultat annoncé en `aria-live="polite"` : prix Essentiel et Pilotage par mois, prix catalogue barré en texte (« au lieu de »), total annuel si annuel, équivalent par personne et par mois, tranche, règle de non-cumul. Règles de calcul :
- tranche : jusqu'à 49 = indice 0 ; sinon indice = ⌊(n − 50) ÷ 50⌋ + 1 ; prix = base + pas × indice (Essentiel 49 + 30 ; Pilotage 99 + 60) ;
- annuel : × 0,8 ; ESS au mois : × 0,85 ; ESS + annuel : × 0,8 seulement (option b du § 1.3 : la meilleure des deux) ;
- 500 personnes et plus : « Écrivez-nous » ;
- Pilotage+ n'est pas simulé (« bientôt »).
Sans JavaScript, le tableau donne toute l'information. Le devis PDF du § 11.4 relève du produit, pas de la landing.

**Règles (3 encadrés)**
- Engagement annuel : « 20 % de moins que le tarif mensuel, facturé à l'année. »
- Associations et ESS : « −15 % sur le tarif mensuel, sans engagement. Non cumulable avec l'engagement annuel : la remise la plus avantageuse s'applique. Exemple : Pilotage jusqu'à 49 personnes à 84,15 € HT par mois. Conditions d'éligibilité précisées à l'ouverture. »
- Bénévoles gratuits : « Les bénévoles peuvent figurer dans le registre sans être comptés dans le prix. Le nombre d'utilisateurs de Lanternis ne change pas le prix non plus. »
- Ligne finale : « Prix hors taxes ; TVA en sus. Aucun service humain n'est inclus dans l'abonnement : l'aide se fait en ligne et par email. Aucun paiement n'est demandé pour rejoindre la liste d'attente. »

Non affichés volontairement : le prix des services facultatifs (190 € et 290 € HT, H, § 11.3) et l'offre « pilote fondateur » (arbitrage en attente, `STATUT.md`).

### 5.11 FAQ
1. **Mon prestataire s'en occupe déjà. Pourquoi Lanternis ?** — Il fait marcher votre informatique ; mais la liste de ce que chaque personne a, de vos contrats et de vos accès, avec leurs échéances, l'avez-vous ? Et qui vérifie que tout est fermé quand quelqu'un part ? Votre prestataire peut y contribuer.
1 bis. **Gérez-vous le matériel loué ?** *(nouvelle en v3, placée en 3e position sur la page)* — « Oui, c'est prévu dès l'ouverture. Chaque matériel indique s'il est acheté, loué ou en leasing, et le contrat qui le couvre (copieur, postes, téléphones). Lanternis est conçu pour vous rappeler la fin de location ou de garantie avant l'échéance, pour savoir à qui le matériel est affecté et pour l'inscrire dans la check-list de restitution quand la personne part. Les loyers entrent dans le coût de votre SI. » (`perimetre-produit.md` § 1.2 mode d'acquisition, § 1.4, A3, I1)
2. **Encore un outil à remplir : qui va le tenir à jour ?** — Excel ou liste du prestataire au départ ; Microsoft 365 met à jour comptes et licences ; le prestataire invité complète ; chaque arrivée ou départ fait vivre le registre ; les alertes font le reste.
3. **Qui m'aide à démarrer si personne ne m'accompagne ?** *(aide en libre-service)* — Liste de démarrage, gabarit Excel, structure d'exemple, courtes vidéos, aide en ligne, réponse par email. Aucun rendez-vous nécessaire pour essayer ni pour s'abonner.
4. **Proposez-vous des services, par exemple une aide à la mise en place ?** *(services facultatifs)* — L'abonnement n'inclut aucun service humain. Quelques services facultatifs (ex. séance d'aide au démarrage en visio) pourront être réservés et payés en ligne, en nombre limité chaque mois ; jamais nécessaires ; tarifs publiés à l'ouverture.
5. **Est-ce sûr de relier Lanternis à notre Microsoft 365 ?** *(sécurité)* — Connexion prévue en lecture seule : Lanternis ne crée, ne modifie et ne supprime rien. Aucun mot de passe demandé ni stocké : il note qu'une personne a accès à un outil ou à un coffre, jamais le mot de passe. Autorisation révocable à tout moment depuis l'administration Microsoft.
6. **Quelles données stockez-vous, et où ?** — Hébergement prévu en France ; identité professionnelle des personnes, service, dates d'arrivée et de départ, matériel, comptes, accès, contrats, fournisseurs. Aucun fichier, aucun mot de passe, ni salaire, ni motif de départ, ni donnée des personnes accompagnées. Sous-traitants listés avant l'ouverture.
7. **Comment le prix est-il calculé ?** — Personnes gérées (salariés, stagiaires, alternants, intérimaires, prestataires équipés présents) ; bénévoles et personnes parties non comptés ; utilisateurs sans effet ; changement de tranche après préavis par email (`propositions-tarifs.md` § 1.1 et § 11.1).
8. **Je préfère recruter un responsable informatique.** — Inchangé, sources [1] et [2] (§ 5.13).
9. **Et si Lanternis s'arrête un jour ?** — Export complet prévu dès l'ouverture.
10. **Quand Lanternis sera-t-il disponible ?** — En préparation ; les inscrits seront prévenus les premiers de l'ouverture de l'essai gratuit d'un mois sans carte ; pas de date tant qu'elle n'est pas sûre. (La v1 disait « par petits groupes, pour faire la mise en place avec chacun » : supprimé.)
11. **Qui est derrière Lanternis ?** — Marque d'Hasteria SASU, Neuilly-sur-Seine ; Hasteria facture selon ses CGV.

À faire valider par securite ou l'architecte : la phrase « vous pouvez retirer l'autorisation à tout moment depuis votre administration Microsoft » (principe du consentement administrateur, `perimetre-produit.md` § 4) et la liste exacte des données lues (§ 1.5).

### 5.12 Formulaire (CTA final)
**Rejoindre la liste d'attente** — « Soyez prévenu parmi les premiers de l'ouverture de l'essai gratuit. Cela prend une minute. » Champs : § 7.1. Le texte d'information sous le bouton (`.mention-form`) est **inchangé** par rapport à la v1 (il couvre « mesurer l'intérêt pour le projet ») ; son empreinte reste celle calculée par `build.php`.
- Nouveaux champs facultatifs : « Quelle offre vous intéresserait ? » (Essentiel dès 49 €, Pilotage dès 99 €, Pilotage+ quand il ouvrira, Je ne sais pas encore) et la case « Je compte essayer Lanternis dès l'ouverture de l'essai gratuit d'un mois. Facultatif, sans engagement. »
- Libellés de « Ce qui vous préoccupe le plus » réécrits autour des personnes, **valeurs inchangées** : `acces` devient « Les arrivées et les départs : comptes encore actifs, matériel non rendu, accès jamais retirés » et passe en tête ; `couts` couvre aussi le matériel.
- Message de succès inchangé.

### 5.13 Sources affichées
1. Offres HelloWork de responsable informatique (45 à 70 k€ et 65 à 75 k€ brut/an), consultées le 25/10/2026 : https://www.hellowork.com/fr-fr/emplois/82433859.html ; https://www.hellowork.com/fr-fr/emplois/84330801.html (S2). Les offres expirent : **revérifier les liens le jour de la mise en ligne**.
2. Insee, publication du 14/10/2025, consultée le 25/10/2026 : https://www.insee.fr/fr/statistiques/8616805 (S2). Titre exact à recopier depuis la page Insee avant la mise en ligne.

### 5.14 Pied de page
Inchangé : « Lanternis est une marque d'Hasteria SASU. » et coordonnées légales de `SOCIETE.md`.

## 6. Objectifs et critères de succès ou d'échec

### 6.1 Définitions
- **Inscrit** : formulaire envoyé et email confirmé (double opt-in, § 7.3).
- **Inscrit qualifié** : **entreprise ou structure de l'ESS de 20 à 249 personnes** (décision du 2026-10-26, grille D ; remplace la règle du 2026-10-25 qui excluait les entreprises de 20 à 49).
- **Intention d'essai** : case « Je compte essayer Lanternis dès l'ouverture » cochée.
- **Intérêt pour un palier** : réponse à « Quelle offre vous intéresserait ? » (hors « Je ne sais pas encore »).
- **Taux de conversion** : inscriptions envoyées / visiteurs uniques de la page, par source et par variante.

### 6.2 Objectifs (8 semaines, 26 oct. – 18 déc. 2026)

L'objectif de 80 inscrits qualifiés est maintenu comme repère de volume. En libre-service, les canaux C1 et C2 ne servent plus à vendre (`propositions-tarifs.md` § 11.6) : ils restent utiles pour la **recherche** (entretiens) et pour amorcer la liste. `acquisition.md` doit être revu par son auteur ; la répartition ci-dessous est provisoire. **Répartition (H) :**

| Source (paramètre `src`) | Canal | Inscrits qualifiés visés (H) | Conversion visée (H) | Visiteurs nécessaires (H) |
|---|---|---|---|---|
| `reseau` | C1 réseau Tecnoo et réseau personnel (envois individuels, recherche) | 15 | ≥ 25 % (trafic chaud) | ≈ 60 |
| `prospection` | C2 invitations à un entretien, email et téléphone (recherche, pas vente) | 10 | ≥ 15 % | ≈ 70 |
| `ess-relais`, `webinaire` | C4 relais ESS (lettre d'information, webinaire enregistré) | 40 | ≥ 8 % | ≈ 500 |
| `autodiag` | Inscriptions venues de l'autodiagnostic | 10 | ≥ 10 % des diagnostics terminés | ≈ 100 diagnostics |
| `blog`, `facebook`, `direct` | Blog, page Facebook éventuelle, accès direct | 5 | ≥ 3 % | ≈ 170 |
| **Total** | | **80** | **≥ 5 % global** | **≈ 800 à 1 000** |

Hypothèse de taux de qualification : ≥ 70 % des inscrits (H), soit environ 115 inscrits pour 80 qualifiés.

**Lien avec l'objectif après l'ouverture** : le libre-service demande ≈ 18 essais par mois pour 10 k€ de MRR en 24 mois (`propositions-tarifs.md` § 11.5, H). La liste d'attente en est le premier réservoir : **48 inscrits qualifiés avec intention d'essai** (60 % de 80) représenteraient environ 2,5 mois d'essais au rythme visé (H), à condition qu'une part suffisante essaie vraiment à l'ouverture (taux de passage à mesurer, aucune référence).

**Risque principal :** la moitié de l'objectif repose sur **au moins un relais ESS** qui accepte de diffuser d'ici la semaine 6 (point d'arrêt C4 de `acquisition.md`). Sinon, prolonger ou juger la demande sur les entretiens.

### 6.3 Critères (à reporter dans `STATUT.md` et dans le scoring de `/bilan`)

| Indicateur | Succès | Zone grise (approfondir) | Échec | Hypothèse liée |
|---|---|---|---|---|
| Inscrits qualifiés à 8 semaines | **≥ 80** | 40 à 79 | **< 40** | H5 ; éliminatoire « aucun signal de demande vérifiable » |
| **Intention d'essai** (part des inscrits qualifiés qui cochent la case) | **≥ 60 %** | 40 à 60 % | **< 40 %** | H5 en libre-service : la liste d'attente alimentera-t-elle les essais ? |
| **Intérêt pour un palier** (part des qualifiés qui choisissent un palier, hors « je ne sais pas ») | ≥ 70 % | 50 à 70 % | < 50 % | H3 : les prix sont-ils compris et acceptables ? |
| **Part Pilotage + Pilotage+** parmi les paliers choisis | **≥ 55 %** (objectif « part en Pilotage » du § 11.4) | 35 à 55 % | < 35 % | H3 et revenu moyen : sous 35 %, le revenu moyen de lancement (≈ 121 €, H, § 11.5) est surestimé |
| Conversion visiteur → inscription (global) | **≥ 5 %** | 2 à 5 % | **< 2 % après ≥ 500 visiteurs** | Qualité du message |
| Part d'inscrits qualifiés | ≥ 70 % | 50 à 70 % | < 50 % | Ciblage des canaux |
| Confirmation du double opt-in | ≥ 70 % | 50 à 70 % | < 50 % | Délivrabilité |
| Répartition des préoccupations (`couts`, `renouvellements`, `acces`, `depart-referent`, `rendre-compte`) | Indicateur d'ordre des messages, sans seuil | | | H1 : quel domaine porte la douleur ? Sert à ordonner les 6 domaines et les messages |
| Visiteurs de la section tarifs qui utilisent le simulateur | Indicateur de lecture, sans seuil | | | Compréhension de la grille |
| Inscrits qui acceptent l'échange de 30 min | ≥ 15 % | 8 à 15 % | < 8 % | Alimentation des entretiens (moins central qu'en vente directe) |

Seuils de la v1 retirés : « lettres d'intention à ≥ 149 € HT/mois » (prix caduc depuis la grille D) et « autodiagnostics terminés ≥ 40 % » (déplacé en indicateur secondaire de l'autodiagnostic).

**Précision statistique** : avec 80 qualifiés, une proportion mesurée autour de 50 % a une marge d'environ ± 11 points (intervalle de confiance à 95 %, 1,96 × √(0,25 ÷ 80)). Les seuils ci-dessus sont donc des ordres de grandeur, pas des tests fins ; une valeur proche d'un seuil se lit « zone grise ».

**Lecture :**
- Conversion < 2 % avec un bon trafic : **problème de message** ; réécrire le hero (variante C, § 8) avant de conclure à l'absence de demande.
- Volume < 40 avec une bonne conversion : **problème de trafic** (canaux), à lire avec `acquisition.md` § 4.1.
- Beaucoup d'inscrits mais intention d'essai < 40 % : la promesse attire mais l'effort perçu (libre-service, outil à remplir) freine ; tester une FAQ « démarrer seul » plus visible et vérifier en entretien.
- Essentiel très majoritaire (Pilotage < 35 %) : revoir ce qui distingue Pilotage à l'ouverture (beaucoup de ses fonctions sont « après l'ouverture ») avant de toucher aux prix.
- Rien de tout cela ne remplace les entretiens ni, après l'ouverture, le taux de conversion essai → payant (≥ 20 %, H, § 11.4).

## 7. Formulaire et script `waitlist.php` (pour dev-vitrine)

### 7.1 Champs envoyés (POST, UTF-8, `action="waitlist.php"`)

| Nom | Type HTML | Obligatoire | Valeurs / validation serveur | Conservé |
|---|---|---|---|---|
| `email` | email | oui | Inchangé (v1) | oui |
| `structure` | text | oui | Inchangé | oui |
| `type` | radio | oui | `entreprise` \| `ess` | oui |
| `effectif` | select | oui | `moins-20` \| `20-49` \| `50-99` \| `100-249` \| `250-plus` (libellé devenu « Effectif salarié ») | oui |
| `douleur` | radio | oui | **Valeurs inchangées** : `depart-referent` \| `couts` \| `renouvellements` \| `acces` \| `rendre-compte` \| `autre` ; seuls les libellés changent (`acces` = arrivées et départs) | oui |
| `douleur_autre` | text | non | Inchangé | oui |
| **`palier`** (nouveau) | radio | non | `essentiel` \| `pilotage` \| `pilotage-plus` \| `ne-sait-pas` ; absent ou autre valeur → `null` (ne pas rejeter le formulaire) | oui |
| **`essai`** (nouveau) | checkbox | non | `oui` ou absent ; toute autre valeur → refus `champs` (même règle que `nouvelles`) | oui (booléen) |
| `nouvelles` | checkbox | non | Inchangé, consentement distinct | oui + horodatage + version du texte |
| `echange` | checkbox | non | Inchangé | oui + horodatage |
| `variante`, `public`, `source`, `site_web` | hidden / piège | — | Inchangés | Inchangé |

**Modification nécessaire côté produit (non faite ici, à confier à dev-vitrine) :** `produit/apps/prelancement/lib/Formulaire.php` ignore aujourd'hui tout champ inattendu. Tant qu'il n'est pas mis à jour, **`palier` et `essai` sont envoyés mais perdus** (sans erreur pour l'utilisateur). Il faut : ajouter `palier` et `essai` à la lecture des champs, une constante `PALIERS`, deux colonnes dans la base (migration), les deux champs dans l'export CSV et dans `bin/stats.php` (répartition par palier et part d'intention d'essai, par variante et par source), et des tests. **Bloquant pour mesurer les indicateurs du § 6.3** ; à faire avant la mise en ligne.

Champs calculés : `qualifie` = entreprise ou ESS de 20-49, 50-99 ou 100-249 (décision du 2026-10-26).

**Non retenu (friction)** : « Votre outil de messagerie : Microsoft 365, Google Workspace, autre ». Utile pour la décision D4 (Google au MVP), mais un champ de plus. À ajouter si le fondateur le demande, ou à poser dans l'email de bienvenue.

### 7.2 Comportement attendu
Inchangé par rapport à la v1 (implémenté et testé, PR #1) : POST seul, contrôle d'origine, limite de 5 envois par heure et par IP hachée ; redirections 303 `?erreur=<code>#liste-attente` ou `?inscription=ok#liste-attente` ; email existant non révélé ; double opt-in par Mailjet ; `confirm.php`, `desinscription.php` ; conservation 30 jours (non confirmés) et 3 ans après le dernier contact (H, juriste-rgpd) ; export et compteur protégés, **source de vérité** des inscriptions ; migration vers l'API du VPS à la mise en production.

### 7.3 Pourquoi un double opt-in
Il rend le compte des inscrits **vérifiable** (critère éliminatoire « signal de demande vérifiable »). Contrepartie : une part des inscriptions se perd à la confirmation (H), d'où l'indicateur du § 6.3.

## 8. Test A/B du titre

| | Titre | Sous-titre | Angle | Usage |
|---|---|---|---|---|
| **A** (contrôle) | Toute votre informatique, enfin lisible : qui a quoi, ce que vous payez, ce qui arrive à échéance. | « Contrats, matériel, licences, accès : chaque élément de votre SI relié à une personne. Lanternis est conçu pour vous prévenir avant chaque échéance, pas après. » | Promesse de la plateforme v1.2 (§ 4.1 A) : bénéfice d'abord | P1, par défaut |
| **B** | Contrats, matériel, licences, accès : chaque élément de votre SI relié à une personne. | « Vous savez qui a quoi, ce que vous payez et ce qui arrive à échéance. Lanternis est conçu pour vous prévenir avant, pas après. » | Le plus explicite (§ 4.1 B) : ce que Lanternis gère, d'abord | P1, `?v=b` |
| **C** (réserve) | La carte de tout votre SI, personne par personne. | Celui de A | § 4.1 C : court, mémorisable | Si A et B convertissent < 2 % ; sinon réservé aux formats courts (Open Graph, Facebook, objets d'email) |
| **ESS** | Toute l'informatique de votre association, enfin lisible : qui a quoi, ce que vous payez, ce qui arrive à échéance. | « Contrats, matériel acheté ou loué, licences, accès : chaque élément relié à une personne, salariée ou bénévole. De quoi rendre compte à votre CA et à vos financeurs, avec un tarif associatif et des bénévoles non facturés. » | Même promesse, rendre compte, tarif associatif | P2, `?public=ess`, hors test A/B |

Le titre « Quand votre référent informatique part, votre informatique reste » (B de la v2) sort du test : il reste un message de continuité (plateforme, message 5) pour le blog et les entretiens.

**Hypothèse :** pour P1, un titre qui nomme concrètement ce que Lanternis gère (B) convertit mieux qu'un titre centré sur le bénéfice (A), parce que le lecteur pressé comprend tout de suite que l'outil couvre tout le SI (retour du fondateur). Si B gagne nettement, il devient le titre principal et A passe en sous-titre.

**Métrique principale :** taux de conversion visiteur unique → inscription envoyée, par variante. Secondaires : part d'intention d'essai, part Pilotage + Pilotage+, début de formulaire, part d'inscrits qualifiés.

**Affectation sans cookie :** variante portée par le lien (`?v=a` ou `?v=b`). Liens individuels : alternance A/B dans l'ordre de la liste ; liens publics : alternance par publication. Le trafic ESS n'entre pas dans le test.

**Taille d'échantillon (test bilatéral, α = 5 %, puissance 80 %, base 5 %) :**
- détecter un doublement (5 % → 10 %) : **≈ 435 visiteurs par variante**, ≈ 870 au total ;
- détecter + 50 % (5 % → 7,5 %) : **≈ 1 470 par variante**, ≈ 2 940 au total.

**Réalisme :** le trafic P1 attendu en 8 semaines (≈ 300 visiteurs, H, § 6.2) **ne suffit pas** à conclure. Test **exploratoire**, règle fixée à l'avance : on garde B seulement si son taux est au moins le double de celui de A sur ≥ 150 visiteurs par variante **et** si les entretiens confirment que le départ du référent est le déclencheur le plus cité ; sinon on garde A. Le test continue après le pré-lancement si le trafic augmente.

**Second test possible (après le titre, H)** : ordre des cartes de prix (Pilotage au centre et mis en avant, contre Essentiel en premier sans mise en avant). Métrique : part Pilotage parmi les paliers choisis. Même contrainte de volume : exploratoire uniquement.

## 9. Après l'inscription (brouillons, envoi soumis à validation)

**Email 1 : confirmation (transactionnel, immédiat)** — inchangé.

**Email 2 : bienvenue (après confirmation)** — à ajuster par l'auteur des emails : retirer toute mention de mise en place avec l'équipe ; annoncer que les inscrits seront prévenus les premiers de l'ouverture de l'**essai gratuit d'un mois sans carte** ; garder la question ouverte (« quel est aujourd'hui votre plus gros problème avec votre informatique ? ») et, si le champ n'est pas ajouté au formulaire, demander l'outil de messagerie (Microsoft 365, Google Workspace, autre). Les réponses alimentent `2-marche/script-interview.md` et la décision D4.

La lettre mensuelle (4 éditions, décision du 2026-10-26) relève de `marketing/emails/`.

## 10. Événements à mesurer (outil sans cookie, hypothèse)

Outil : Matomo sans cookie ou Plausible (H, à trancher avec devops et juriste-rgpd). **Aujourd'hui, `validation.html` ne charge aucun outil** ; le script appelle `window.plausible` ou `window._paq` seulement s'ils existent.

| Événement | Déclencheur dans la page | Propriétés (jamais de donnée personnelle) | Sert à |
|---|---|---|---|
| Page vue | Chargement (natif) | variante, source (URL) | Dénominateur |
| `CTA hero` | Clic « Rejoindre la liste d'attente » du hero | variante, source | Force du hero |
| `Voir tarifs` | Clic « Voir les tarifs envisagés » | variante, source | Intérêt prix |
| **`Simulateur`** (nouveau) | Première modification du simulateur | tranche, type (entreprise ou ess), période | Lecture de la grille, tailles réelles des visiteurs |
| **`Intérêt palier`** (nouveau) | Clic sur le lien d'une carte d'offre | palier | Intérêt par palier avant le formulaire |
| `Clic autodiagnostic` | Clic « Faire l'autodiagnostic » | variante, source | Lead magnet |
| `Ouverture FAQ` | Ouverture d'une question | question (60 premiers caractères) | Objections qui comptent (surveiller « Qui m'aide à démarrer ? » et « Est-ce sûr… ») |
| `Début formulaire` | Premier focus dans le formulaire | variante, source | Friction |
| `Envoi formulaire` | Soumission | effectif, type, douleur, **palier**, **essai** (oui/non), variante, source | Conversion, qualification, palier, intention d'essai par variante |
| `Inscription` | Retour `?inscription=ok` | variante, source | Contrôle croisé avec le compteur de `waitlist.php` |
| Profondeur de défilement | Natif ou suivi de contenu | — | Sections lues avant l'abandon |

Le compteur de `waitlist.php` reste la source de vérité ; les événements ne servent qu'aux taux. Revue chaque quinzaine, consignée dans `marketing/rapports/`.

## 11. Conformité, accessibilité, sobriété (contrôles faits sur le brouillon)

- **Aucun chiffre non sourcé** : S2 (HelloWork, Insee) et la grille D marquée « tarifs de lancement envisagés » ; l'aperçu est légendé « exemple fictif » (personnes et montants).
- **Aucun faux témoignage, logo client ni compteur d'inscrits.**
- **Promesses retirées** : « mis en place avec vous », « par un spécialiste du SI », revue trimestrielle avec un DSI, frais de mise en place (490 à 990 €), connecteurs banque et compta, « à partir de 149 € ». **Ajoutées** : « conçu par un DSI », essai d'un mois sans carte à l'ouverture, lecture seule, aucun mot de passe, aucun fichier.
- **Plateforme v1.2, § 10.7 (v3)** : aucun titre ni accroche centré sur les arrivées et départs ; partout où les départs sont cités (hero, preuve, FAQ), les contrats, le matériel et les licences le sont aussi. § 10.6 : fonctions à venir en « conçu pour », « prévu » ou « après l'ouverture » ; les sauvegardes portent « prévu ».
- **Icônes des 6 domaines** : fichiers `marque/charte/iconographie/icones/{contrat,poste,licence,acces,sauvegarde,arrivee}.svg` en `<img>` (≈ 0,4 Ko chacun). `build.php` réécrit tout chemin `../../marque/charte/…` d'un attribut `src`/`href` en `assets/charte/…` et copie le fichier (étape 5 de `transformerPage`, puis copie des ressources) : **l'iconographie est donc copiée sans adaptation du build** (vérifié à la lecture du code, build non lancé). Les SVG fixent `color="#1B2330"` : posés sur une pastille ambre pâle fixe, ils restent lisibles en thème sombre.
- **Aucune ressource externe ni traceur** : CSS `../../marque/charte/tokens.css`, logos SVG locaux, icônes SVG intégrées.
- **CSP** : CSS et JS en ligne extraits par `build.php` ; attributs `style` convertis en classes ; aucun gestionnaire `on…` en ligne.
- **Sans JavaScript** : titre A, tableau de prix complet, formulaire classique ; le simulateur est masqué (`hidden`, et règle `[hidden]{display:none!important}`). Les liens des cartes d'offre restent des ancres vers le formulaire.
- **Poids** : HTML ≈ 55 Ko (estimation, + 15 Ko par rapport à la v1), `tokens.css` ≈ 9 Ko, SVG ≈ 1 à 2 Ko chacun : sous le budget de 200 Ko (à mesurer à la recette).
- **RGAA (visé, à auditer par accessibilite-ecoconception)** : v1 conservée (repères, un seul `h1`, focus visible, champs étiquetés, `fieldset`/`legend`, `role="status"`/`role="alert"`, FAQ en `details`, cibles de 44 px, `prefers-reduced-motion`) ; ajouts v2 : tableau de prix avec `caption` et `th scope`, simulateur étiqueté avec aide associée (`aria-describedby`) et résultat en `aria-live="polite"`, cases décoratives des check-lists en `aria-hidden`. À vérifier : lisibilité du tableau à 5 colonnes sur mobile (défilement horizontal) et annonce du résultat du simulateur à chaque frappe (bavard ? passer à l'événement `change` si oui).
- `noindex` posé tant que la page est un brouillon : **à retirer à la mise en ligne** (`build.php --indexable`).

## 12. À faire avant la mise en ligne (bloquants)

1. Validation explicite du fondateur sur les textes, les prix affichés (y compris Pilotage+ à 199 € « envisagés ») et la mise en ligne.
2. **dev-vitrine : prise en compte de `palier` et `essai` dans `waitlist.php`** (§ 7.1), sinon les indicateurs clés du § 6.3 ne sont pas mesurables. Puis `php build.php` et tests.
3. Recherche d'antériorité du nom et du logo, réservation de lanternis.fr.
4. Pages légales relues ; `confidentialite.html` à compléter si `palier` et `essai` sont conservés (finalité « mesurer l'intérêt » déjà couverte, à confirmer par juriste-rgpd).
5. Mailjet (SPF, DKIM, DMARC), outil d'audience sans cookie (sinon retirer « aucun cookie »).
6. Revérifier les liens sources, police Fraunces, image Open Graph, retrait du `noindex`.
7. Test des 5 secondes auprès de 5 personnes de la cible (§ 3), avec la question « outil RH ? ».
8. Alignement avec la plateforme de marque v1.1 (brand-manager) : promesse, signature « conçu par un DSI ».

## 13. Hypothèses non vérifiées signalées
- Tous les taux de conversion, la répartition par source, le taux de qualification et les seuils d'intention d'essai et de palier (§ 6) sont des hypothèses, sans donnée de référence pour cette cible.
- La grille D est validée par le fondateur mais reste une hypothèse de marché (aucun client n'a payé) ; l'éligibilité ESS et la remise automatique sont à valider juridiquement.
- Le contenu des offres affiché suit le § 11.3 de `propositions-tarifs.md` ; les fonctions P2 sont étiquetées « après l'ouverture » ; le calendrier réel dépend de l'architecte (P1 ≈ 15 à 19 semaines avec le libre-service, H).
- Les promesses produit (lecture seule, constat automatique, structure d'exemple, vidéos, hébergement en France, export, essai d'un mois sans carte) sont des cibles, marquées « prévu ».
- « Conçu par un DSI » est une preuve déclarative à valider par le fondateur.
- « On oublie toujours quelque chose » au départ d'une personne : formulation d'expérience à confirmer en entretien.
- Cible : entreprises et ESS de 20 à 249 salariés (tranché le 2026-10-26, § 2).
- Sauvegardes : affichées « prévu » faute de confirmation de leur présence en tranche 1 ; à confirmer au cadrage (plateforme § 4.2).
- Titres A et B de la v3 : à choisir ou tester par le fondateur (plateforme § 4.1) ; aucune donnée ne départage aujourd'hui « bénéfice d'abord » et « liste d'abord ».
