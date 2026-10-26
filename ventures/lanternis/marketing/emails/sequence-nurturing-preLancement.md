---
venture: lanternis
phase: 2b Pré-lancement
auteur: lifecycle-emailing
date: 2026-10-26
révision: 2026-10-26 (v3) — décision du fondateur sur la cadence (voir la note ci-dessous) ; v2 : alignement sur `marketing/landing/validation.html` et `marketing/landing/conformite-prelancement.md`
statut: brouillon
skills: sequence-nurturing, copywriting-frameworks, ab-test
envoi: Mailjet — RIEN N'EST ENVOYÉ ; chaque édition est soumise à la validation explicite de l'utilisateur, après authentification du domaine
---

# Lettre « nouvelles » du pré-lancement : 4 éditions mensuelles

> **Décision du fondateur, 2026-10-26.** Le libellé de la case `nouvelles` reste : « J'accepte de recevoir les nouvelles de Lanternis par email (au plus une par mois) ». Conséquences : **un seul email de nouvelles par mois au maximum** pour chaque inscrit qui a coché la case. La séquence hebdomadaire de 5 emails (v1 et v2 de ce fichier) est abandonnée ; ses 5 contenus sont fusionnés en **4 éditions mensuelles**.
> **Ne comptent pas dans ce plafond** (selon la consigne transmise, **à confirmer par juriste-rgpd**) : les emails transactionnels de l'inscription (E0-A confirmation, E0-B bienvenue, `liste-attente-remerciement.md`) et les **réponses individuelles** du fondateur aux personnes qui ont demandé un échange (case `echange`, demande depuis l'autodiagnostic) ou qui ont répondu à une édition. Condition proposée pour que cette exclusion tienne : ces emails sont écrits un par un, répondent à une demande de la personne et ne contiennent pas de contenu de lettre.
> **Alignement marque v1.1 (2026-10-26).** Partie « pilote » de L2 réécrite selon `marque/plateforme-de-marque.md` v1.1 et les décisions du 2026-10-26 : plus de mise en place par un DSI, plus de remise fondateur de −30 % ni de frais de mise en place ; prix de la grille D (`2-marche/propositions-tarifs.md` § 11.2) ; essai gratuit d'un mois sans carte annoncé pour l'ouverture ; Lanternis décrit au futur, « conçu par un DSI », en lecture seule. Les entretiens restent des échanges de **recherche**. L1, L3, L4 et le calendrier sont inchangés.

---

## 1. Principes

- **Objectif mesurable :** faire passer un inscrit à un **entretien de 30 minutes**, puis à une **lettre d'intention « pilote fondateur »**. Repères repris de `2-marche/acquisition.md` § 4.2 (tous H), tous canaux confondus : 12 à 15 entretiens et ≥ 3 lettres d'intention avant le bilan (le seuil de « 149 € HT/mois ou plus » de l'hypothèse 3 de `STATUT.md` date d'avant la grille D : à recaler par le stratégiste). La part attribuable à la lettre sera mesurée, sans cible propre.
- **Destinataires :** inscrits confirmés (double opt-in) avec `nouvelles = oui`. Segments P1 (`type = entreprise`) et P2 (`type = ess`) ; variantes selon `qualifie`, `echange` et l'état de la relation (§ 3).
- **Rythme :** **éditions à date fixe**, espacées d'au moins 30 jours. Un inscrit reçoit l'édition suivant sa confirmation, jamais deux éditions à moins de 30 jours (interprétation prudente de « au plus une par mois » : 30 jours glissants plutôt que mois civil). Pas de rattrapage des éditions passées par email ; elles sont republiées sur le blog et citées par un lien dans le corps si utile.
- **Pourquoi fusionner en 4 éditions plutôt que 5 :** avec la landing en ligne vers le 9 au 13 novembre (`acquisition.md` § 5) et la fin du pré-lancement au 18 décembre, **seules deux éditions** peuvent partir avant le bilan. Ce sont elles qui portent la progression **entretien → lettre d'intention** ; les contenus purement utiles (check-list des départs, questions au prestataire) passent après, et la dernière édition dépend de la décision GO / NO-GO.
- **Chaque édition :** une valeur utile (méthode ou check-list) dans le corps, **un seul CTA**, constat concret → conséquence → action simple (plateforme § 10.1), sans vente par la peur ni fausse urgence. Signature de la marque. Aucun prénom (non collecté).
- **Aucun pixel, aucun suivi d'ouverture ni de clic** (désactivés dans Mailjet, `conformite-prelancement.md` § 2.3). Les CTA d'entretien et de lettre d'intention se font **par réponse à l'email** (pas d'outil de rendez-vous tant qu'il n'est pas choisi). Les autres liens portent un paramètre de provenance `src=`, lu en agrégé.
- **Pied de page :** celui du § 4 de `liste-attente-remerciement.md` (texte du § 4.3 de `conformite-prelancement.md`, lien de désinscription en un clic, mentions Hasteria).

## 2. Calendrier (dates H, à confirmer par l'utilisateur)

| Édition | Date d'envoi proposée | Reprend | Valeur | CTA principal (qualifiés) | Étape |
|---|---|---|---|---|---|
| **L1** | mardi 17 novembre 2026 | N1 + invitation de N3 | La carte de votre SI en trois colonnes | Répondre avec deux ou trois créneaux pour un entretien de 30 min | Entretien |
| **L2** | jeudi 17 décembre 2026 (30 jours après L1) | N3 + N5 (et la transparence de N4) | P1 : la passation du référent ; P2 : une page SI pour le CA ; puis le pilote fondateur | Répondre « pilote » pour recevoir la lettre d'intention | Lettre d'intention |
| **L3** | mardi 19 janvier 2027 | N2 + nouvelles du projet | Départ d'un salarié : les accès à fermer | Faire l'autodiagnostic | Valeur, réactivation |
| **L4** | jeudi 18 février 2027 | N4 + nouvelles selon la décision | Cinq questions à poser à votre prestataire | Selon la décision : répondre « pilote » (GO) ou aucun CTA commercial (NO-GO / PIVOT) | Offre ou clôture |

- L2 part le 17 décembre, la veille de la fin du pré-lancement : les réponses « pilote » arrivent pendant la pause de fin d'année (H : période peu propice, `acquisition.md` § 5). **Alternative :** avancer L1 au 10 novembre si la landing est en ligne à temps, ce qui permet L2 le 10 décembre. À trancher selon la date réelle de mise en ligne.
- Aucun envoi entre le 19 décembre 2026 et le 4 janvier 2027, ni le week-end.
- **Inscrit après L1** : sa première édition est L2 ; elle se suffit à elle-même (rappel de la carte en trois colonnes avec lien vers l'article du blog).
- Au-delà de L4 : lettre mensuelle de la phase suivante, ou arrêt si NO-GO (§ L4).

## 3. Variantes par destinataire

| Situation | L1 | L2 | L3 | L4 |
|---|---|---|---|---|
| Qualifié, `echange = non`, pas d'entretien | CTA entretien | CTA « pilote » | CTA autodiagnostic | Selon décision |
| Qualifié, `echange = oui` ou entretien fixé / fait | CTA « Télécharger le modèle de tableau » (l'entretien est traité individuellement) | CTA « pilote », sauf si la lettre d'intention est déjà discutée en individuel : alors CTA autodiagnostic et paragraphe pilote retiré | CTA autodiagnostic | Selon décision |
| Lettre d'intention signée | Modèle de tableau | Paragraphe pilote retiré, CTA autodiagnostic | Autodiagnostic | Nouvelles du pilote, sans CTA commercial |
| Hors cible (`qualifie = non`) | Modèle de tableau | Paragraphe pilote retiré, CTA autodiagnostic | Autodiagnostic | Nouvelles, sans CTA commercial |

Les attributs `echange`, `qualifie` et l'état de la relation (`entretien`, `LI`) sont tenus à la main avant chaque édition (liste de quelques dizaines de contacts) ; leur transmission à Mailjet est **à valider par juriste-rgpd** (`conformite-prelancement.md` § 5.3).

---

## L1. La carte de votre SI en trois colonnes — mardi 17 novembre 2026

- **Déclencheur :** édition mensuelle ; destinataires confirmés avec `nouvelles = oui` à la veille de l'envoi.
- **Délai :** date fixe ; au moins 3 jours après la confirmation (sinon, l'inscrit attend L2).
- **Objet A :** Votre informatique en trois colonnes
- **Objet B :** Ce que vous avez, ce que vous payez, ce qui arrive à échéance
- **Pré-en-tête :** Une méthode d'une page pour dresser la carte de votre SI, avec vos propres documents.
- **Segment :** P1 et P2 (une phrase variable).
- **CTA unique :** qualifiés sans échange prévu : « Répondez avec deux ou trois créneaux » (réponse à l'email, objet prérempli « Échange de 30 minutes ») ; autres : « Télécharger le modèle de tableau » → `{{site}}/ressources/carte-si.xlsx?src=l1`.
- **Métriques suivies :** réponses avec créneaux / délivrés (qualifiés) ; entretiens réalisés issus de L1 ; téléchargements `src=l1` (agrégé, autres destinataires).

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
> *[Qualifiés sans échange prévu]* Nous menons en ce moment des entretiens de 30 minutes avec des *[P1]* dirigeants *[P2]* DAF et directions d'association pour comprendre comment ils gèrent leur informatique sans service dédié. Nous ne vendons rien pendant cet échange ; vous recevrez la synthèse anonymisée de l'étude.
> **Si vous êtes partant, répondez simplement à cet email avec deux ou trois créneaux.**
>
> *[Autres destinataires]* **[Télécharger le modèle de tableau]**
>
> L'équipe Lanternis

**Trame :** BAB (avant : pas de carte ; après : trois réponses ; pont : la méthode), puis l'invitation. La méthode tient entière dans le corps : le CTA d'entretien ne retient pas la valeur en otage.

---

## L2. Passation ou page pour le CA, puis le pilote fondateur — jeudi 17 décembre 2026

Deux versions (P1, P2) pour la partie méthode ; partie pilote commune avec un paragraphe de prix variable.

- **Déclencheur :** édition mensuelle ; au moins 30 jours après L1 pour chaque destinataire.
- **Délai :** date fixe.
- **Objet A (P1) :** Si votre référent informatique partait, que resterait-il ?
- **Objet B (P1) :** Passation informatique en cinq points, et une proposition
- **Objet A (P2) :** Une page sur l'informatique pour votre prochain CA
- **Objet B (P2) :** Ce que votre CA peut vous demander sur l'informatique, et une proposition
- **Pré-en-tête :** Une méthode en cinq points, puis les conditions de notre pilote, écrites noir sur blanc.
- **CTA unique :** qualifiés sans lettre d'intention en cours : « Répondez "pilote" pour recevoir la lettre d'intention » ; autres : « Faire l'autodiagnostic » → `autodiagnostic.html?src=l2`, paragraphe pilote retiré.
- **Métriques suivies :** réponses « pilote » / délivrés ; réponses demandant d'abord un entretien ; lettres d'intention signées (objectif global ≥ 3, hypothèse H3 de `STATUT.md`, tous canaux).

**Corps, partie méthode, version P1**

> Bonjour,
>
> Dans beaucoup de PME, l'informatique tient grâce à une personne : un salarié « qui s'y connaît », un responsable informatique, parfois le dirigeant lui-même. Des offres d'emploi publiées en octobre 2026 en témoignent : des PME recrutent pour remplacer un responsable informatique qui part à la retraite.
>
> Un départ annoncé est une occasion : celle d'écrire ce qui n'était que dans une tête. Cinq points suffisent pour commencer :
>
> 1. la carte en trois colonnes ([la méthode est ici]({{lien_article_carte}})) ;
> 2. la liste des comptes administrateur, et qui d'autre y a accès ;
> 3. où sont les sauvegardes, et quand elles ont été testées pour la dernière fois ;
> 4. les contacts chez chaque prestataire, avec le périmètre de chacun ;
> 5. les décisions en cours : renouvellements, achats prévus, projets.

*Source de la phrase sur les offres d'emploi :* `2-marche/signaux-demande.md`, S2 : offres HelloWork du 19/10/2026 (https://www.hellowork.com/fr-fr/emplois/82433859.html) et du 12/10/2026 (https://www.hellowork.com/fr-fr/emplois/84330801.html), consultées le 2026-10-25. **Avant envoi :** vérifier qu'elles sont toujours consultables, sinon retirer la phrase.

**Corps, partie méthode, version P2**

> Bonjour,
>
> Un jour, un administrateur, un financeur ou un commissaire aux comptes vous demandera : « Où en est-on de l'informatique ? » Une page préparée à l'avance vous épargne de la rédiger au dernier moment. Cinq rubriques suffisent :
>
> 1. **Ce que nous avons** : outils principaux, dont le logiciel métier ;
> 2. **Ce que cela coûte** : total annuel et principaux postes ;
> 3. **Ce qui arrive à échéance** dans les douze mois ;
> 4. **Qui a accès** aux données des personnes accompagnées, et comment les accès sont fermés aux départs ;
> 5. **Les décisions à prendre** : renouvellements, projets, budget.

**Corps, partie pilote (commune, qualifiés sans lettre d'intention en cours)**

> C'est ce travail que Lanternis veut rendre simple. Ce qu'il fera : tenir le registre de tout votre SI, centré sur les personnes (matériel, comptes et licences, abonnements, contrats, accès), préparer chaque arrivée et chaque départ avec une check-list, et vous prévenir avant chaque échéance. Il est conçu par un DSI, pour être pris en main seul, sans rendez-vous. Ce qu'il ne fera pas : remplacer votre prestataire, dépanner vos postes, modifier vos comptes (il les lira en lecture seule), stocker vos fichiers ou vos mots de passe.
>
> Lanternis est en construction. À l'ouverture, chaque structure pourra l'essayer un mois, gratuitement et sans carte bancaire. D'ici là, nous cherchons un petit nombre de structures pilotes pour nous aider à le construire.
>
> **Ce que vous obtenez** : un accès parmi les premiers, à l'ouverture{{si validé par le fondateur : , et le prix de votre offre garanti pendant 24 mois}}.
> **Ce que nous vous demandons** : un entretien mensuel de retour d'expérience, où nous vous posons des questions, et un témoignage à la fin, seulement si vous en êtes satisfait et avec votre accord écrit.
>
> **Les prix** (publics, hors taxes, par mois)
> *[P1]* Essentiel 49 € et Pilotage 99 € jusqu'à 49 personnes ; 79 € et 159 € de 50 à 99 personnes. Au-delà, Pilotage de 219 € (100 à 149) à 339 € (200 à 249). Paiement annuel : −20 %.
> *[P2]* Mêmes prix, avec une remise de 15 % pour les structures de l'ESS (non cumulable avec le paiement annuel). Les bénévoles ne sont pas comptés.
>
> **La lettre d'intention** indique votre intérêt et réserve une place de pilote. Elle ne vaut ni commande ni engagement de paiement ; rien ne sera facturé avant l'ouverture et la fin de votre mois d'essai gratuit. Les places sont limitées à dix structures, pour pouvoir écouter chacune. Il n'y a pas de date limite : si les places sont prises, nous vous le dirons simplement.
>
> **Si cela vous intéresse, répondez « pilote » à cet email.** Si vous préférez d'abord en parler 30 minutes, dites-le dans votre réponse.
>
> L'équipe Lanternis

*Périmètre « lecture seule, ni fichiers ni mots de passe » :* décisions D1 et D2 du 2026-10-26 (`1-analyse/perimetre-produit.md`, `STATUT.md`). *Prix :* grille D validée le 2026-10-26 (`2-marche/propositions-tarifs.md` § 11.2 ; Pilotage+ non cité, il ouvrira avec le multi-sites).

**À valider avant envoi (bloquant) :** avantage « pilote fondateur » : la remise de −30 % pendant 12 mois (`prix.md`, arbitrage encore listé dans `STATUT.md`) n'est plus proposée ici ; seule la garantie de prix 24 mois pour les 10 premières souscriptions, évoquée au § 11.4 de `propositions-tarifs.md`, est reprise **entre accolades**, à retirer si le fondateur ne la valide pas ; plafond de 10 places ; intérêt de la lettre d'intention dans un modèle en libre-service avec essai gratuit (à trancher par le fondateur) ; texte de la lettre d'intention (non engageante) à rédiger et à faire relire ; aucune vente ni acompte avant le GO.

---

## L3. Départ d'un salarié : les accès à fermer — mardi 19 janvier 2027

- **Déclencheur :** édition mensuelle ; au moins 30 jours après L2.
- **Délai :** date fixe.
- **Objet A :** Le dernier jour d'un salarié, côté informatique
- **Objet B :** Départ d'un salarié : la check-list des accès
- **Pré-en-tête :** Une liste à cocher pour que rien ne reste ouvert après un départ. Et où en est Lanternis.
- **Segment :** P1 et P2 (un point variable) ; tous les destinataires.
- **CTA unique :** « Faire l'autodiagnostic » → `autodiagnostic.html?src=l3` (les réponses restent dans le navigateur : on ne sait pas qui l'a déjà fait, d'où la phrase pour eux).
- **Métriques suivies :** visites de l'autodiagnostic `src=l3` (agrégé, si un outil d'audience exempté est installé) ; demandes d'échange envoyées depuis l'autodiagnostic dans les 7 jours ; désinscriptions (première édition après la pause : mesure de l'usure de la liste).

**Corps**

> Bonjour,
>
> Quand un salarié quitte la structure, le matériel est généralement rendu. Les accès, eux, sont plus faciles à oublier, parce qu'ils ne se voient pas. Voici les points à vérifier le dernier jour :
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
> **Où en est Lanternis.** {{nouvelles_projet : deux ou trois phrases factuelles, rédigées au moment de l'envoi : nombre d'entretiens menés, ce que nous avons appris, prochaine étape. Aucune annonce de date non décidée.}}
>
> Les accès font partie des 10 questions de notre autodiagnostic. Cinq minutes, résultat immédiat à l'écran, et vos réponses ne nous sont pas transmises. Si vous l'avez déjà fait, refaites-le après avoir rempli votre tableau : le résultat devrait changer.
>
> **[Faire l'autodiagnostic]**
>
> L'équipe Lanternis

*Vérifié :* l'autodiagnostic comporte une question sur les accès au départ d'un salarié (`marketing/landing/autodiagnostic.md`, question 5) et une sur les accès administrateur (question 6).

---

## L4. Cinq questions à poser à votre prestataire — jeudi 18 février 2027

Le contenu utile est fixe ; la fin dépend de la décision du comité (`4-decision/memo.md`), **à réécrire au moment de l'envoi**.

- **Déclencheur :** édition mensuelle ; au moins 30 jours après L3.
- **Délai :** date fixe.
- **Objet A :** Cinq questions pour votre prochain point avec votre prestataire
- **Objet B :** Votre prestataire et vous : ce qu'il est utile de lui demander
- **Pré-en-tête :** Des questions de pilotage, pas de défiance. Et les nouvelles de Lanternis.
- **Segment :** P1 et P2.
- **CTA unique :** si GO et places pilote disponibles : « Répondez "pilote" » (qualifiés sans lettre d'intention) ; sinon : aucun CTA commercial, lien vers l'article du blog `?src=l4`.
- **Métriques suivies :** réponses « pilote » (si GO) ; objections reçues (versées dans la matrice de `marque/messages-par-persona.md`) ; désinscriptions.

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
> *[Si GO]* **Où en est Lanternis.** {{état du projet et date d'ouverture aux pilotes, si décidée}}. Il reste {{n}} places de structure pilote, aux conditions décrites en décembre. **Si cela vous intéresse, répondez « pilote ».**
> *[Si PIVOT]* **Où en est Lanternis.** {{ce qui change et pourquoi, en deux phrases}}. Nous continuerons de vous écrire au plus une fois par mois.
> *[Si NO-GO]* **Où en est Lanternis.** Nous avons décidé de ne pas lancer Lanternis. Merci pour votre intérêt et vos réponses. Ceci est notre dernier email : vos données seront supprimées dans les trois mois, sans action de votre part.
>
> L'équipe Lanternis

*Source de « beaucoup de dirigeants se tournent en premier vers lui » :* baromètre Cybermalveillance.gouv.fr 2025 (OpinionWay, 588 entreprises de moins de 250 salariés) : 39 % se tournent d'abord vers leur prestataire informatique (`2-marche/signaux-demande.md`, S1 ; https://www.cybermalveillance.gouv.fr/medias/2025/10/CP-TPE-PME-07102025-3.pdf, consulté le 2026-10-25). Chiffre volontairement non repris ; ne pas écrire « la plupart » (39 % n'est pas une majorité).
*Suppression en cas de NO-GO dans les 3 mois :* durée proposée dans `conformite-prelancement.md` (T1), à confirmer par l'avocat.

---

## 4. Ce qui sort de la lettre : le suivi individuel

L'essentiel de la conversion vers l'entretien et la lettre d'intention se fait **hors lettre**, par des emails écrits un par un par le fondateur :
- aux inscrits qui ont coché `echange` (prise de contact dans les jours qui suivent la confirmation, `liste-attente-remerciement.md` § 1) ;
- aux personnes qui demandent un échange depuis l'autodiagnostic ;
- aux personnes qui répondent à une édition (créneaux, « pilote », question).

Après un entretien avec douleur avérée, la lettre d'intention est proposée **dans l'email de remerciement individuel**, conformément au bloc E de `2-marche/script-interview.md`. Ces emails **ne comptent pas** dans le plafond mensuel (décision du 2026-10-26, **à confirmer par juriste-rgpd**) et ne sont pas envoyés par Mailjet en masse.

## 5. Tests A/B (exploratoires, sans pixel)

Sans suivi d'ouverture ni de clic, un objet ne se juge que sur l'**action** qui suit : réponses (notées à la main par variante) ou visites agrégées par `src` (`src=l1a` / `src=l1b`, etc.).

| Édition | A | B | Métrique de décision |
|---|---|---|---|
| L1 | « trois colonnes » | les trois questions | Réponses avec créneaux |
| L2 | Question (P1) / livrable (P2) | Méthode + « une proposition » | Réponses « pilote » |
| L3 | « le dernier jour » | « check-list » | Visites de l'autodiagnostic (agrégé) |
| L4 | « Cinq questions » | « Votre prestataire et vous » | Réponses (si GO) |

Avec quelques dizaines de destinataires par édition, aucun test ne sera significatif. **Recommandation :** ne tester que L1 et L2 (les deux éditions qui comptent pour la décision), lire le résultat comme indicatif, et le consigner comme tel dans `marketing/rapports/`.

## 6. Tableau de suivi (par édition)

| Édition | Destinataires | Délivrés (Mailjet) | Action comptée | Réponses | Entretiens issus | Lettres d'intention issues | Désinscriptions | Plaintes |
|---|---|---|---|---|---|---|---|---|
| L1 | | | Créneaux proposés ; téléchargements `src=l1` | | | | | |
| L2 | | | Réponses « pilote » | | | | | |
| L3 | | | Autodiagnostic `src=l3` ; demandes d'échange | | | | | |
| L4 | | | Réponses « pilote » (si GO) | | | | | |

Délivrances, rebonds, désinscriptions et plaintes restent disponibles dans Mailjet sans pixel. À reporter dans la revue de quinzaine (`acquisition.md` § 4.3) et dans le dossier `/bilan` : part des entretiens et des lettres d'intention venant de la lettre, contre le suivi individuel et la prospection.
**Seuil d'alerte (H) :** un taux de désinscription ou de plainte nettement plus élevé sur une édition → revoir le contenu avant la suivante.

## 7. Points ouverts et hypothèses

1. **Exclusion du plafond** des emails transactionnels et des réponses individuelles : à confirmer par juriste-rgpd.
2. **Interprétation de « au plus une par mois »** : 30 jours glissants retenus (prudent) ; si le juriste valide le mois civil, L1 et L2 peuvent se rapprocher.
3. **Dates des éditions** : hypothèses calées sur la mise en ligne de la landing en S3 ; à ajuster à la date réelle (alternative : L1 le 10 novembre, L2 le 10 décembre).
4. **Effet de la décision sur l'acquisition** : avec deux éditions avant le bilan, la lettre ne peut porter qu'une petite partie des 12 à 15 entretiens ; l'essentiel reste le réseau chaud, la prospection individuelle et la case `echange` (`acquisition.md` § 4.1). À signaler au comité de décision.
5. **Ressources à produire :** modèle de tableau (L1), article de blog « la carte en trois colonnes » (rattrapage, L2), texte de la lettre d'intention (L2).
6. **Attributs et suivi manuel :** `echange`, `qualifie`, `entretien`, `LI` ; transmission à Mailjet à valider par juriste-rgpd.
7. **Mesure :** aucun outil d'audience installé (T7) ; seuls les réponses, les demandes d'échange et les compteurs serveur sont mesurables tant qu'il ne l'est pas.
8. **Domaine :** `lanternis.fr` non réservé ; aucun envoi avant SPF, DKIM et DMARC.
9. **Ton :** objets de L2 (« Si votre référent informatique partait… », « Ce que votre CA peut vous demander… ») à relire par le brand-manager (ligne « pas de vente par la peur »).
10. **Nom du fichier** conservé (`sequence-nurturing-preLancement.md`) pour ne pas casser les renvois ; le contenu est désormais une lettre mensuelle.
11. **Alignement v1.1 :** la partie méthode de L2 (P1) parle encore du départ du « responsable informatique », déclencheur surtout du segment secondaire (100 à 249) ; pour le cœur de cible (20 à 99), un angle « arrivées et départs de salariés » serait plus juste (H, à décider avec le brand-manager).
