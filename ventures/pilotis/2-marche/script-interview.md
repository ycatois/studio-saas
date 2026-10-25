---
venture: pilotis
phase: 2 Marché
auteur: analyste-marche
date: 2026-10-25
statut: brouillon
méthode: skill script-interview-client (Mom Test)
---

# Lanternis : guide d'entretien de découverte (30 minutes, Mom Test)

## 1. Objectif et règles
**Objectif :** établir, à partir de **faits passés**, si les dirigeants et les RAF de structures de 20 à 249 salariés sans DSI ressentent assez la perte de maîtrise de leur SI pour payer, et sous quelle forme (logiciel, accompagnement, les deux).

**Règles du Mom Test**
- Parler de **leur vie**, pas de notre idée. Ne présenter Lanternis qu'en toute fin d'entretien, et seulement si c'est utile.
- Demander des **faits passés et précis** (« la dernière fois que… »), jamais des intentions (« est-ce que vous achèteriez… »).
- Chercher des **chiffres** : euros, heures, dates, nombre d'outils.
- Les compliments ne valent rien ; seul un **engagement** (temps, rendez-vous, données, argent) compte.
- Écouter plus de 70 % du temps. Noter les **mots exacts**.

**Cible :** 10 à 15 entretiens, dont au moins **3 par tranche** (20–49, 50–149, 150–249 ; R7) et **3 à 5 dans l'ESS** (R11), plus 3 prestataires informatiques (R8, guide à part, § 8).
**Personas visés :** P1 (dirigeant), P2 (DAF d'association), P3 (office manager) ; voir `personas.md`.

## 2. Hypothèses testées et critères de décision
Hypothèses reprises de `STATUT.md` (H1 à H6) et de `pre-mortem.md` (R1 à R13). Seuils proposés par le challenger et l'analyste-finance (H) : à ajuster par l'utilisateur.

| Hypothèse | Questions | **Validée si** | **Invalidée si** |
|---|---|---|---|
| **H1 Douleur SI** (R2) | Q3 à Q7 | ≥ 6/10 citent un épisode des 12 derniers mois **avec un coût estimable** (euros, jours, risque) | ≤ 3/10 citent un épisode, ou uniquement des épisodes sans conséquence |
| **H2 Pas déjà résolu** | Q8, Q9 | ≥ 5/10 disent que leur prestataire ou leur Excel ne leur permet **pas** de répondre à Q4 ou Q6 **et** ont tenté autre chose (outil, recrutement, conseil) | ≥ 7/10 jugent leur prestataire suffisant et n'ont rien tenté |
| **H3 Volonté de payer** | Q14, Q15, engagement final | **≥ 3/10 s'engagent** (lettre d'intention, acompte ou pilote payant) entre 149 et 249 € HT/mois ; le budget informatique ou cyber connu est ≥ 3 000 €/an (H) | 0 ou 1 engagement ; ou budget cyber < 2 000 €/an et aucune autre ligne mobilisable (contre-signal du baromètre Cybermalveillance 2025) |
| **H4 Cockpit vide** (R1, R5) | Q10, Q11, Q15 | ≥ 3/5 ne peuvent pas lister plus de la moitié de leurs contrats et abonnements **et** veulent qu'on le fasse avec eux ; la mise en place payante est acceptée par ≥ 50 % des intéressés | Personne ne peut identifier qui tiendrait l'outil, et la mise en place payante est refusée |
| **H5 Acquisition** (R4) | Mesuré sur l'entonnoir, pas en entretien | ≥ 10 entretiens obtenus sur 20 demandes au vivier Tecnoo ; ≥ 1 relais (CRESS, fédération, prestataire) prêt à diffuser | < 30 % de réponses positives ; aucun relais |
| **H6 Connecteurs** | Q12 | ≥ 70 % utilisent Microsoft 365 ou Google Workspace **et** Qonto, Pennylane ou une banque compatible | Outils très hétérogènes, ou refus de connecter la banque ou la comptabilité |
| R6 Fréquence d'usage | Q5, Q13 | ≥ 1 événement actionnable par mois en moyenne (arrivée, départ, renouvellement, incident) | < 1 événement par trimestre |
| R7 Segment | Qualification | Une tranche montre nettement plus de douleur et de budget : elle devient la cible du MVP | Douleur uniforme et faible |
| R11 ESS | Q14 (version ESS) | ≥ 3/5 ont une ligne budgétaire identifiable et décident en moins de 3 mois | Décision soumise au CA sans budget, cycle > 6 mois |
| Nouveau : déclencheur « départ du référent » (S2 de `signaux-demande.md`) | Q7 | ≥ 3/10 ont vécu ou anticipent un départ de la personne « qui sait » | Personne |

## 3. Qualification (2 minutes, avant l'entretien ou en ouverture)
- Effectif salarié : 20–49 / 50–149 / 150–249. Statut : société / association / coopérative / fondation. Secteur.
- Rôle de l'interlocuteur : dirigeant / DAF ou RAF / office manager / autre.
- Qui s'occupe de l'informatique : prestataire seul / salarié dédié / salarié à temps partiel / dirigeant / personne.
- **DSI ou directeur technique : oui ou non** (mesure directe de l'hypothèse « part sans DSI » de `marche-tam-sam-som.md`).
- Nombre approximatif de postes de travail ; outils de bureautique (Microsoft 365, Google Workspace, autre).

## 4. Déroulé (30 minutes)

### Ouverture (2 min)
« Merci de m'accorder ce temps. Je ne vends rien aujourd'hui. Je travaille depuis 25 ans dans l'informatique d'entreprise et j'essaie de comprendre comment les structures sans service informatique gèrent leur informatique au quotidien. Il n'y a pas de bonne réponse ; ce qui m'aide le plus, ce sont des exemples concrets. Je peux prendre des notes ? »

### Bloc A : le contexte (4 min)
- **Q1.** « Pouvez-vous me décrire comment l'informatique est organisée chez vous aujourd'hui ? Qui fait quoi ? »
- **Q2.** « Depuis combien de temps fonctionne-t-elle comme ça ? Qu'est-ce qui a changé ces deux dernières années ? »

### Bloc B : les épisodes récents (10 min) : H1, R2, R6
- **Q3.** « Racontez-moi la dernière fois qu'un sujet informatique vous a coûté du temps, de l'argent ou du sommeil. » → Relances : « Quand était-ce ? Qu'avez-vous fait ? Combien cela a-t-il coûté, en euros ou en jours ? Qui s'en est occupé ? »
- **Q4.** « Si votre prestataire, ou la personne qui s'occupe de l'informatique, disparaissait demain, que se passerait-il ? Qui saurait où sont les accès administrateur, les contrats, les sauvegardes ? »
- **Q5.** « Que s'est-il passé au dernier départ d'un salarié, côté accès, matériel et abonnements ? Et à la dernière arrivée ? » → « Combien d'arrivées et de départs avez-vous eu cette année ? »
- **Q6.** « La dernière fois qu'on vous a demandé de prouver votre niveau de sécurité (assureur, client, financeur, CA), comment avez-vous répondu ? Combien de temps cela a-t-il pris ? »
- **Q7.** « La personne qui connaît le mieux votre informatique est-elle déjà partie, ou va-t-elle partir (retraite, démission, fin de contrat) ? Comment cela s'est-il passé, ou comment l'anticipez-vous ? »

### Bloc C : les solutions actuelles (6 min) : H2, H4, H6
- **Q8.** « Aujourd'hui, comment savez-vous ce que vous payez en informatique ? Montrez-moi, si c'est possible. » (Excel, compta, prestataire, rien)
- **Q9.** « Avez-vous déjà essayé de mieux organiser cela : un outil, un recrutement, un consultant, un diagnostic comme MonAideCyber ? Qu'est-ce qui a marché ou non ? Combien cela a-t-il coûté ? »
- **Q10.** « Pourriez-vous me citer, de tête ou avec vos documents, vos principaux contrats et abonnements informatiques et leurs dates d'échéance ? » (**Exercice d'inventaire en direct, 3 minutes chrono : compter les éléments cités et noter où se trouvent les informations.**)
- **Q11.** « Si un outil existait pour tenir cette liste, qui chez vous le mettrait à jour ? Combien de temps par mois cette personne pourrait-elle y consacrer ? »
- **Q12.** « Quels outils utilisez-vous pour la messagerie, la banque et la comptabilité ? »

### Bloc D : les priorités et l'argent (5 min) : H3, R6, R11
- **Q13.** « Sur une année, quels sont les moments où l'informatique vous demande une décision : renouvellements, achats de matériel, changements d'outil ? Combien par an ? »
- **Q14.** « Combien vous coûte votre informatique sur une année : prestataire, licences, matériel, cybersécurité ? Comment le savez-vous ? Sur quelle ligne budgétaire passerait une nouvelle dépense de ce type, et qui la valide ? En combien de temps ? » (version ESS : « faut-il passer par le bureau ou le CA ? »)

### Bloc E : test de l'offre et engagement (3 min, seulement si les blocs B et C ont révélé une douleur) : H3, H4, R5
- Présenter en 30 secondes : « un outil qui tient l'inventaire de votre SI (contrats, abonnements, accès, sécurité) et vous alerte avant les échéances, avec une mise en place faite avec vous ».
- **Q15.** Montrer **deux offres chiffrées (H)** et demander laquelle correspond le mieux à leur situation, et pourquoi :
  - A. **Logiciel seul** : 149 à 399 € HT/mois selon l'effectif, mise en place guidée 490 à 990 €.
  - B. **Logiciel + accompagnement** : logiciel + 0,5 jour par mois d'un DSI à temps partagé (H : environ 300 €/mois de plus, TJM de 600 € à remplacer par le TJM réel de Tecnoo).
  - Relance de prix (Van Westendorp simplifié) : « À quel prix ce serait trop cher pour que vous l'envisagiez ? À quel prix ce serait si bon marché que vous douteriez de la qualité ? »
- **Engagement (la seule preuve qui compte) :** proposer, selon l'intérêt manifesté :
  1. un **atelier d'inventaire de 2 h** avec leurs documents (engagement de temps) ;
  2. une **lettre d'intention** pour un pilote fondateur (−30 % pendant 12 mois, `modele-revenus.md`) ;
  3. un **acompte** pour la mise en place.
  Noter la réponse exacte. « On verra plus tard » ou « envoyez-moi une plaquette » = **pas d'engagement**.

### Clôture (1 min)
- « Qui d'autre, dans votre réseau, vit la même situation ? Pourriez-vous me présenter à cette personne ? » (mesure du canal)
- Remercier ; proposer d'envoyer la synthèse anonymisée des entretiens.

## 5. Pièges à éviter
- Ne pas demander « est-ce que ce serait utile ? » ni « est-ce que vous paieriez ? ».
- Ne pas parler de NIS2 en premier : demander seulement en fin d'entretien « Avez-vous entendu parler de NIS2 ? Vous sentez-vous concerné ? » (R12).
- Ne pas critiquer le prestataire informatique de l'interlocuteur.
- Ne pas faire de démo avant le bloc E.

## 6. Grille de synthèse (une ligne par entretien)
| Champ | Contenu |
|---|---|
| Date, interlocuteur, rôle, structure, tranche, statut (société ou ESS), DSI oui ou non | |
| Citations exactes (3 maximum) | |
| Épisode le plus récent (Q3) : date, nature, coût estimé | |
| **Douleur (1 à 5)** : 1 = aucune ; 3 = épisode sans coût chiffré ; 5 = épisode récent et coûteux, et action déjà tentée | |
| Solution actuelle (prestataire, Excel, rien, outil, recrutement) et satisfaction | |
| Inventaire en direct (Q10) : nombre d'éléments cités en 3 minutes ; sources identifiées | |
| Qui tiendrait l'outil (Q11), temps par mois | |
| Événements SI par an (Q5, Q13) | |
| Budget informatique connu (Q14) : montant, ligne budgétaire, valideur, délai | |
| Offre préférée (A ou B) et fourchette de prix acceptable | |
| **Engagement obtenu** : aucun / atelier / lettre d'intention / acompte | |
| Recommandations obtenues (noms) | |
| Hypothèses touchées : H1 à H6 (validée, invalidée, neutre) | |
| Prochaine étape et date | |

**Tableau de décision après 10 entretiens :** compter les lignes par critère du § 2. Résultat à reporter dans `STATUT.md` (Hypothèses à vérifier) et à transmettre au comite-decision pour le score GO / NO-GO.

## 7. Messages de demande d'entretien

**Version réseau Tecnoo (email ou LinkedIn, personnalisé)**
> Objet : 20 minutes de votre expérience ?
>
> Bonjour {Prénom},
>
> Nous avons travaillé ensemble sur {projet Dolibarr}. Je mène actuellement une étude sur la façon dont les structures comme {Nom de la structure}, sans service informatique interne, s'organisent pour suivre leurs contrats, leurs abonnements et leur sécurité informatique.
>
> Je ne vends rien : j'ai besoin d'exemples concrets. Accepteriez-vous un échange de 30 minutes, en visio ou par téléphone, dans les deux prochaines semaines ? Je vous enverrai en retour la synthèse anonymisée de l'étude.
>
> Merci d'avance,
> {Signature du fondateur}

**Version ESS (DAF ou direction d'association)**
> Objet : Étude sur l'informatique des associations employeuses
>
> Bonjour {Prénom},
>
> J'accompagne depuis 25 ans des organisations sur leurs systèmes d'information. Je mène une étude auprès d'associations de 20 à 250 salariés pour comprendre comment elles gèrent leur informatique (contrats, abonnements, sécurité des données) sans service dédié.
>
> Auriez-vous 30 minutes pour me raconter votre expérience ? Aucune démarche commerciale : la synthèse anonymisée vous sera envoyée, et pourra servir à votre CA.
>
> Bien cordialement,
> {Signature du fondateur}

> **Rappel :** ces messages sont des **brouillons**. Tout envoi groupé ou publication passe par la validation de l'utilisateur (règle 2 de `CLAUDE.md`). Les envois individuels du fondateur à son réseau relèvent de sa décision.

## 8. Variante courte : entretien prestataire informatique (15 minutes, R8)
1. « Combien de clients de 20 à 250 salariés avez-vous ? Lesquels n'ont personne en interne pour l'informatique ? »
2. « La dernière fois qu'un client vous a demandé la liste de ses contrats, licences ou accès, comment l'avez-vous produite ? Combien de temps cela a-t-il pris ? »
3. « Quel outil utilisez-vous pour l'inventaire (GLPI, RMM, autre) ? Vos clients y ont-ils accès ? »
4. « Un client qui aurait sa propre vue de son SI, serait-ce pour vous une aide, une menace, ou un service à revendre ? » (question d'opinion assumée : à interpréter avec prudence)
5. Engagement : « Accepteriez-vous de tester avec un de vos clients ? »
Critère de validation : ≥ 1 sur 3 prêt à tester ; aucun ne le juge bloquant par nature.
