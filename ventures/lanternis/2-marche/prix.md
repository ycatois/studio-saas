---
venture: lanternis
phase: 2 Marché
auteur: analyste-concurrence
date: 2026-10-25
statut: brouillon
skills: analyse-prix
---

# Prix — relevé du marché et stratégie recommandée pour Lanternis

> **Règle de lecture.** Relevé effectué le **2026-10-25**. Les numéros [n] renvoient aux sources de [benchmark.md](benchmark.md) (même numérotation). « Éditeur » = prix affiché par l'éditeur ; « tiers » = comparateur, blog ou annuaire, indicatif. **(H)** = hypothèse ou calcul de l'analyste à partir d'une hypothèse. Aucune conversion de devise n'est faite (pas de taux de change sourcé) : les prix restent dans leur monnaie d'origine.

## 1. Relevé daté des grilles

### 1.1 Logiciels

| Acteur | Plan | Prix | Métrique | HT ? | Nature | Source |
|---|---|---|---|---|---|---|
| GLPI Network | Cloud public | 19 €/mois | par agent IT, dès 1 agent | HT | Éditeur | [1] |
| GLPI Network | Cloud privé | 21 €/mois | par agent, min. 25 agents | HT | Éditeur | [1] |
| GLPI Network | Auto-hébergé Basic / Standard / Advanced / Enterprise | 100 / 300 / 1 000 / 4 500 €/mois | forfait (agents et actifs plafonnés) | HT | Éditeur | [1] |
| Snipe-IT | Basic / Small Business / Dedicated (small) | 39,99 / 99,99 / 249,99 $/mois (399,99 / 999,99 / 2 499,99 $/an) | forfait, actifs illimités | non précisé | Éditeur | [2] |
| Freshservice | Starter / Growth / Pro / Enterprise | 19 / 49 / 99 $/mois / sur devis | par agent, facturation annuelle | non précisé | Éditeur | [3] |
| Lansweeper | Starter / Pro / Enterprise | « Custom » ; tiers : ≈ 199 € (Starter, 2 000 actifs, G2) ; ancien relevé « dès 219 $/mois » | par paliers d'actifs | — | Éditeur (custom) + tiers | [4] |
| JumpCloud | Gestion des licences SaaS / gestion des actifs / MDM / SSO | 3 / 3 / 9 / 11 $ par mois (annuel) ; 4 / 4 / 11 / 13 $ (mensuel) | par utilisateur | HT | Éditeur | [8] |
| Cledara | Basic / Premium / Pro | 100 £/mois (gratuit sous condition d'usage des cartes) / sur démo / sur démo ; modules IT, conformité, optimisation 150 £/mois chacun ; −16 % en annuel | forfait par palier (nombre d'applications) | non précisé | Éditeur | [15] |
| Corma | Freemium / Essential / Pro / Enterprise | gratuit (10 applis) / dès 3 €/mois, engagement annuel / sur démo / sur devis dès 1 000 utilisateurs ; jusqu'à −50 % sous 50 utilisateurs (offre startup) | par utilisateur | non précisé | Éditeur | [39] |
| Zluri | — | sur démo ; tiers 4 à 8 $/mois | par utilisateur (tiers) | — | Tiers | [9][10] |
| Torii | — | sur démo | — | — | Éditeur | [11] |
| Productiv | — | sur devis ; médiane tierce ≈ 50 k$/an (21 contrats) | par salarié (tiers) | — | Tiers | [13] |
| Vertice | — | sur devis ; tiers ≈ 30 k$/an (dépenses SaaS 250 k$ à 1 M$) | selon dépenses SaaS | — | Tiers | [14] |
| Primo | MDM, gestion SaaS, achats | non publié, « à l'usage », annuel | à l'usage | — | Éditeur | [17] |
| Fleet | Location + MDM | non publié ; tiers ≈ 750 €/mois pour 20 postes, matériel inclus | par appareil | — | Tiers | [21] |
| Pennylane | Indépendants Starter / Basique / Essentiel / Premium | 7 / 14 / 24 / 79 €/mois ; TPE et PME sur devis | forfait (1 utilisateur) | HT | Éditeur | [27] |
| Agicap | — | sur devis, 12 mois minimum ; tiers 99 à 799 €/mois | selon modules | HT (tiers) | Éditeur + tiers | [29][30] |
| Fathom | Pro / Portfolio | 450 $/mois (25 entreprises) / 67 $/mois (100 entreprises) | par entreprise suivie | hors taxes | Éditeur | [31] |

### 1.2 Services

| Prestation | Prix | Nature | Source |
|---|---|---|---|
| Infogérance complète PME 20 postes (support, sauvegarde, antivirus, serveur) | 1 000 à 1 500 € HT/mois, soit 50 à 75 €/poste | Tiers (blog de prestataire) | [25] |
| Infogérance, plafond cité | « jusqu'à 50 € par salarié et par mois » | Presse (2023) | [22] |
| Intervention informatique ponctuelle | ≈ 65 € HT/h en moyenne (36 à 80 €), 2024 | Tiers | [25] |
| DSI à temps partagé | 800 à 1 500 €/jour | Presse, **2017** | [23] |
| Management de transition, confirmé / expert | 700-900 / 900-1 400 €/jour | Agrégat, mis à jour octobre 2026 | [24] |
| Consultant IT / chef de projet SI, confirmé / expert | 580-750 / 750-1 000 €/jour | idem | [24] |
| Cybersécurité, confirmé / expert | 650-850 / 850-1 200 €/jour | idem | [24] |
| Responsable informatique freelance | ≈ 404 à 553 €/jour (7 à 16 offres) | Indeed | [35] |
| Profil « DSI » individuel sur Malt | 790 €/jour | Malt (via moteur) | [36] |
| ESS : Solidatech | Inscription gratuite ; remises sur 300+ offres | Programme associatif | [32] |
| ESS : DLA numérique | Peut financer diagnostics, plans d'action, coaching (montant non trouvé) | Recherches & Solidarités | [33] |

## 2. Prix ramenés au salarié et au mois

Cas type **(H)** : structure de **50 salariés**, 50 comptes utilisateurs, aucun agent IT interne (on compte 1 agent pour les outils facturés à l'agent, joué par le prestataire ou l'office manager).

| Option | Calcul | Coût mensuel | Par salarié | Remarque |
|---|---|---|---|---|
| GLPI cloud, 1 agent | 1 × 19 € [1] | 19 € HT | ≈ 0,38 € | Suppose un technicien pour l'alimenter |
| Snipe-IT Basic | forfait [2] | 39,99 $ | ≈ 0,80 $ | Matériel seulement |
| Freshservice Starter, 1 agent | 1 × 19 $ [3] | 19 $ | ≈ 0,38 $ | ITAM avancé en supplément |
| Cledara Basic + module IT | 100 £ + 150 £ [15] | 250 £ | ≈ 5 £ | SaaS seulement, anglophone |
| Corma Essential | 50 × 3 € (prix « dès ») [39] | ≈ 150 € | ≈ 3 € | SaaS et accès seulement ; remise possible sous 50 utilisateurs |
| JumpCloud licences SaaS + actifs | 50 × (3 $ + 3 $) [8] | 300 $ | 6 $ | + 9 $/utilisateur avec MDM |
| Zluri (tiers) | 50 × 4 à 8 $ [10] | 200 à 400 $ | 4 à 8 $ | Prix non confirmé par l'éditeur |
| Infogérance complète | 50 × 50 à 75 € [25] | 2 500 à 3 750 € | 50 à 75 € | Couvre le support, pas le pilotage |
| DSI à temps partagé, 1 j/mois | 700 à 1 400 € [24] | 700 à 1 400 € | 14 à 28 € | Sans outil |
| **Lanternis Pilotage (pressenti)** | forfait | **249 € HT** | **≈ 4,98 €** | Registre SI complet + alertes |

**Grille pressentie de Lanternis, en €/salarié/mois (catalogue mensuel) :**

| Palier | Effectif | Prix | Bas de tranche | Haut de tranche |
|---|---|---|---|---|
| Essentiel | 20-49 | 149 € | 7,45 € | 3,04 € |
| Pilotage | 50-99 | 249 € | 4,98 € | 2,52 € |
| Pilotage+ | 100-250 | 399 € | 3,99 € | **1,60 €** |

**Lecture :**
- Lanternis se place **au-dessus des outils pour technicien** (GLPI, Snipe-IT, Freshservice à 1 agent : moins de 1 €/salarié) et **au niveau des outils SaaS PME** (Cledara, JumpCloud, Zluri : ≈ 4 à 8 par salarié dans leur monnaie). C'est cohérent : on vend un outil utilisable sans technicien, pas une licence technique.
- **Corma fixe un plancher visible sur le volet SaaS** : ≈ 150 €/mois à 50 utilisateurs, soit 100 € de moins que Pilotage [39]. Lanternis ne doit donc **pas se vendre sur la seule gestion des abonnements**. L'écart de prix se justifie par le matériel, les contrats et fournisseurs non SaaS, les alertes pour le dirigeant et le service humain (H, à tester en entretien face à Corma).
- Lanternis reste **un ordre de grandeur sous le service** : 149 € ≈ 1/5 d'une journée de DSI à temps partagé (700 € en bas de fourchette [24]) ; 249 € ≈ 7 à 10 % d'une infogérance complète pour 50 salariés [25]. **C'est l'ancre de prix à utiliser en vente** (« le prix de deux heures de DSI par mois ») (H).
- Faiblesse de la grille : à **250 salariés, Pilotage+ tombe à 1,60 €/salarié**, moins que n'importe quel outil SaaS PME au salarié. Le haut de tranche est sous-valorisé (H).

## 3. Métrique de valeur

| Métrique candidate | Alignement avec la valeur | Pour un dirigeant non technicien | Verdict |
|---|---|---|---|
| Par agent IT (GLPI, Freshservice) | Faible : la PME n'a pas d'agent | Incompréhensible | Non |
| Par utilisateur (JumpCloud, Zluri) | Moyen | Freine le partage, devis variable chaque mois | Non |
| Par actif ou par connecteur (Lansweeper, structure C de la phase 1) | Aligné sur le coût, pas sur la valeur | Incite à moins déclarer ; technique | Non |
| Selon les dépenses SaaS (Vertice) | Aligné sur l'économie réalisée | Le client ne connaît pas ses dépenses avant d'avoir l'outil | Non pour l'entrée |
| **Forfait par structure, en tranches d'effectif** | Bon : comptes, licences, postes, arrivées et départs croissent avec l'effectif (H) | Simple, vérifiable, devis immédiat | **Oui (confirmé)** |

→ **On confirme la structure A de la phase 1** (paliers selon l'effectif), sans facturation par utilisateur.

## 4. Stratégie recommandée

### 4.1 Abonnement logiciel (B2B, HT, mensuel, annuel −20 %)

| Palier | Effectif | Contenu (H) | Mensuel HT | Annuel HT (équivalent mensuel) | ESS −15 %, annuel (équivalent mensuel) |
|---|---|---|---|---|---|
| **Essentiel** (entrée) | 20-49 | Registre SI (actifs, licences et abonnements, contrats, fournisseurs), import Excel, 2 connecteurs (M365 ou Google Workspace + Qonto ou Pennylane), alertes de renouvellement et de départ | **149 €** | 1 430,40 €/an (119,20 €) | 1 215,84 €/an (101,32 €) |
| **Pilotage** (cœur) | 50-99 | Essentiel + connecteurs illimités (*fair use*), coût du SI par salarié, check-list sécurité, procédure arrivées et départs, synthèse mensuelle dirigeant, utilisateurs illimités | **249 €** | 2 390,40 €/an (199,20 €) | 2 031,84 €/an (169,32 €) |
| **Pilotage+** (premium) | 100-250 | Pilotage + multi-établissements, revue trimestrielle d'1 h avec un DSI, export pour le CA/bureau ou l'assureur cyber | **399 € → tester 449 €** | 399 € : 3 830,40 €/an (319,20 €) ; 449 € : 4 310,40 €/an (359,20 €) | 399 € : 3 255,84 €/an (271,32 €) ; 449 € : 3 663,84 €/an (305,32 €) |

**Recommandations :**
1. **Confirmer 149 € et 249 €.** Ils sont dans la fourchette des outils SaaS PME par salarié, publics alors que la plupart des concurrents sont sur devis (angle différenciant n° 2 de benchmark.md), et très en dessous du service.
2. **Pilotage+ : tester 449 € en entretien** contre 399 €. Argument : à 250 salariés, 449 € ≈ 1,80 €/salarié, toujours sous Cledara ou JumpCloud au salarié ; la revue trimestrielle d'1 h a une valeur de marché d'environ 100 à 200 € par revue, soit ≈ 33 à 67 € par mois (700-1 400 €/jour de 7 h, calcul H à partir de [24]), ce qui couvre à peu près l'écart de 50 €. Garder 399 € si les entretiens 100-250 ne valident pas.
3. **Pas de freemium**, pas d'essai gratuit en libre-service. À la place : **pilote de 30 jours accompagné**, facturé par les frais de mise en place (déduits si le client s'engage à l'année) (H).
4. **Offre « pilote fondateur »** (phase 1) : −30 % pendant 12 mois pour les 10 premiers clients, en échange d'un témoignage et d'un entretien mensuel. Recommandation : **non cumulable** avec la remise ESS (plafond de remise total à 30 % hors annuel) pour préserver la contribution d'Essentiel, déjà faible (≈ 80 € selon la phase 1) (H).

### 4.2 Remise ESS

- **Confirmer 15 %**, cumulable avec l'annuel (soit −32 % au total : 149 € → 101,32 €/mois en équivalent).
- Justification : l'écosystème associatif est habitué aux tarifs solidaires (Solidatech : inscription gratuite, 300+ offres réduites [32]) ; une remise nulle serait un frein, une remise de 30 % ou plus détruirait la marge d'Essentiel (H).
- Éligibilité à définir (statut ESS au sens de la loi n° 2014-856 : associations, coopératives, mutuelles, fondations, sociétés commerciales agréées ESUS) — **à valider juridiquement (H)**.
- À tester : la remise compte-t-elle moins que la **possibilité de financement** (DLA numérique [33]) pour le diagnostic ? Si oui, viser le référencement comme prestataire DLA plutôt qu'une remise plus forte.

### 4.3 Prestations d'accompagnement

Repères : TJM du marché 700-900 €/jour (management de transition confirmé) et 580-750 €/jour (consultant IT confirmé) [24] ; responsable informatique freelance ≈ 404-553 €/jour [35]. **TJM implicite retenu pour Lanternis : ≈ 650 à 780 € HT (H)**, à remplacer par le TJM réel de Tecnoo si c'est Tecnoo qui délivre.

| Prestation | Contenu (H) | Prix recommandé HT (H) | Temps (H) | TJM implicite |
|---|---|---|---|---|
| **Mise en place** | Import de l'Excel, connexion des sources, paramétrage des alertes, formation 1 h | **490 €** (Essentiel) / **990 €** (Pilotage, Pilotage+) — confirmé | 4 à 8 h | ≈ 860 €/j (marge pour imprévus) |
| **Diagnostic SI** (porte d'entrée) | Inventaire des actifs, contrats et licences ; check-list sécurité ; restitution au dirigeant ; registre Lanternis prérempli ; 1er mois de Lanternis inclus | **1 490 €** (20-49) / **2 490 €** (50-250) | 2 / 3,5 j | ≈ 640-670 €/j (déduction faite du mois d'abonnement inclus) |
| **DSI à temps partagé outillé ½ j/mois** | Revue des alertes, arbitrages fournisseurs, sécurité, feuille de route ; en supplément de l'abonnement | **+ 390 €/mois**, engagement 6 mois | ½ j/mois | 780 €/j |
| **DSI à temps partagé outillé 1 j/mois** | Idem + pilotage de projets (changement de prestataire, migration) | **+ 690 €/mois**, engagement 6 mois | 1 j/mois | 690 €/j |

**Exemple de bundle (H) :** structure de 60 salariés → Pilotage 249 € + ½ j/mois 390 € = **639 € HT/mois**, soit moins que le bas de fourchette d'une seule journée mensuelle de DSI à temps partagé sans outil (700 à 1 400 € [24]), et 4 à 7 fois moins qu'une infogérance complète au poste pour 60 salariés (3 000 à 4 500 €, d'après [25]), qui ne couvre d'ailleurs pas le même besoin.

**Points de vigilance :**
- Le service n'entre pas dans le MRR SaaS (suivi à part, cf. phase 1).
- Chaque demi-journée mensuelle vendue consomme du temps fondateur : plafonner (ex. 8 clients en temps partagé tant que le fondateur est seul) ou faire délivrer par Tecnoo (décision d'entité ouverte).
- Le prix de 390 €/mois pour ½ j n'est tenable que si l'outil réduit réellement le temps de préparation (registre à jour, alertes) : **à mesurer sur les pilotes**.

## 5. Disposition à payer : questions Van Westendorp à poser en entretien

À poser **après** l'exploration de la douleur (méthode Mom Test), en montrant la grille sans prix puis avec prix, adaptée à la tranche d'effectif de l'interlocuteur. Montants en € HT par mois, pour toute la structure.

1. **Trop cher :** « À partir de quel prix mensuel trouveriez-vous cet outil tellement cher que vous ne l'envisageriez même pas ? »
2. **Cher mais acceptable :** « À partir de quel prix commenceriez-vous à le trouver cher, tout en l'envisageant quand même ? »
3. **Bonne affaire :** « À quel prix le trouveriez-vous avantageux, une bonne affaire ? »
4. **Trop bon marché :** « En dessous de quel prix douteriez-vous de son sérieux ou de sa fiabilité ? »

Questions complémentaires :
- « Combien payez-vous aujourd'hui votre prestataire informatique par mois ? Qu'est-ce qui est inclus ? » (ancre réelle, à comparer à [25]).
- « Avez-vous déjà payé un consultant ou un DSI à temps partagé ? Combien par jour ? » (vérifie [24]).
- « Entre 249 € seul et 639 € avec une demi-journée de DSI par mois, lequel choisiriez-vous ? Pourquoi ? »
- ESS : « Qui valide une dépense de ce montant (directeur, bureau, CA) ? Un financement DLA ou d'une fondation est-il envisageable ? »
- Pilotage+ : montrer 449 € à la moitié des interlocuteurs de 100 à 250 salariés et 399 € à l'autre moitié ; comparer les taux de « je signerais ».

**Critères de validation (repris de la phase 1, H) :** ≥ 3 lettres d'intention sur 10 à ≥ 149 € ; palier médian choisi ≥ Pilotage chez les 50 salariés et plus ; ≥ 2 sur 10 intéressés par le temps partagé à ≥ 390 €/mois.

## 6. Hypothèses et limites de ce relevé

- La plupart des concurrents directs (Primo, Fleet, Zluri, Torii, Agicap, PME Pennylane) **ne publient pas leurs prix** : la comparaison repose sur des estimations tierces, à recouper par des demandes de devis.
- Les fourchettes d'infogérance [25] viennent d'un blog de prestataire ; le chiffre 2017 du DSI à temps partagé [23] est ancien.
- Les pages Lansweeper et Malt étaient bloquées (403) : chiffres issus de résumés de moteur de recherche.
- Les calculs par salarié supposent 50 utilisateurs et 1 agent IT (H).
- Aucune donnée de disposition à payer de la cible n'existe à ce stade : **toute la grille reste une hypothèse** jusqu'aux entretiens.
