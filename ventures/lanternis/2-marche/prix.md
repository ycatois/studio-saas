---
venture: lanternis
phase: 2 Marché
auteur: analyste-concurrence (v1) ; strategiste-marketing (v2, § 2 à 5)
date: 2026-10-26
version: 2
statut: brouillon
skills: analyse-prix, page-tarifs
---

> **Version 2 — 2026-10-26.** La recommandation de prix (ancienne grille 149 / 249 / 399 € avec services d'accompagnement) est **remplacée par la grille D validée par le fondateur le 2026-10-26** (§ 11 de [propositions-tarifs.md](propositions-tarifs.md)).
> - **Inchangé :** le relevé daté des concurrents (§ 1) et les lignes concurrentes du § 2.
> - **Modifié :** les lignes Lanternis du § 2, la métrique (§ 3), la stratégie (§ 4, réécrite) et les questions d'entretien (§ 5, complétées par l'intention d'essai, le palier choisi et le « trop bon marché »).
> - **Décisions du fondateur appliquées :** vente en libre-service ; essai gratuit d'un mois sans carte ; aucun service humain inclus ; cœur de cible de 20 à 99 personnes.
> - La v1 du 2026-10-25 reste consultable dans l'historique Git.

# Prix — relevé du marché et grille retenue pour Lanternis

> **Règle de lecture.** Relevé effectué le **2026-10-25**. Les numéros [n] renvoient aux sources de [benchmark.md](benchmark.md) (même numérotation). « Éditeur » = prix affiché par l'éditeur ; « tiers » = comparateur, blog ou annuaire, indicatif. **(H)** = hypothèse ou calcul de l'analyste à partir d'une hypothèse. Aucune conversion de devise n'est faite (pas de taux de change sourcé) : les prix restent dans leur monnaie d'origine.
> **Grille D :** les prix sont **décidés** par le fondateur (2026-10-26). Leur acceptation par la cible reste **une hypothèse** tant qu'aucun entretien n'a eu lieu.

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
| **Lanternis Essentiel (grille D, tranche 50-99)** | prix fixe de la tranche | **79 € HT** | **≈ 1,58 €** | Registre SI complet, alertes, arrivées et départs (modèles fournis) |
| **Lanternis Pilotage (grille D, tranche 50-99)** | prix fixe de la tranche | **159 € HT** | **≈ 3,18 €** | + modèles illimités, connecteurs P2, PDF (P2) |

**Grille D en € par personne gérée et par mois (catalogue mensuel HT, calcul H aux bornes de chaque tranche ; la première tranche est lue à partir de 20 personnes, bas du cœur de cible) :**

| Personnes gérées | Essentiel | €/pers. (bas → haut) | Pilotage | €/pers. (bas → haut) | Pilotage+ (bientôt) | €/pers. (bas → haut) |
|---|---|---|---|---|---|---|
| 20 à 49 | 49 € | 2,45 → 1,00 | 99 € | 4,95 → 2,02 | 199 € | 9,95 → 4,06 |
| 50 à 99 | 79 € | 1,58 → 0,80 | 159 € | 3,18 → 1,61 | 289 € | 5,78 → 2,92 |
| 100 à 149 | 109 € | 1,09 → 0,73 | 219 € | 2,19 → 1,47 | 379 € | 3,79 → 2,54 |
| 150 à 199 | 139 € | 0,93 → 0,70 | 279 € | 1,86 → 1,40 | 469 € | 3,13 → 2,36 |
| 200 à 249 | 169 € | 0,85 → 0,68 | 339 € | 1,70 → 1,36 | 559 € | 2,80 → 2,25 |

**Lecture (H) :**
- Lanternis reste **au-dessus des outils pour technicien** (GLPI, Snipe-IT, Freshservice à 1 agent : moins de 1 € par salarié), ce qui est cohérent : c'est un outil pour la direction, sans technicien.
- **Face à Corma** (≈ 150 € à 50 utilisateurs en prix « dès » [39]) : Pilotage est **au même niveau** à 50 personnes (159 €), puis **moins cher par personne** à partir d'environ 55 personnes (jusqu'à 1,36 € contre « dès 3 € » ; sous 50 personnes, Pilotage coûte 2 à 5 € par personne, mais Corma annonce jusqu'à −50 % sous 50 utilisateurs), avec un périmètre plus large (matériel, contrats non SaaS, domaines, sauvegardes, arrivées et départs). Essentiel est 2 à 4 fois moins cher que Corma à taille égale. Revers possible : un prix perçu comme **trop bas** pour un outil qui contient des données nominatives (question 4 du § 5, à tester). Prix Corma à revérifier avant toute comparaison publique (« dès », HT non précisé, remises sous 50 utilisateurs).
- **Ancre de prix** : 99 € ≈ 1/7 à 1/14 d'une journée de DSI à temps partagé (700 à 1 400 € [24]), soit « moins d'une heure de DSI par mois » (700 € ÷ 7 h ≈ 100 €/h, calcul H). Face à l'infogérance (50 à 75 €/poste [25]), Lanternis coûte moins de 5 % de ce budget, mais ne couvre pas le même besoin : il ne dépanne pas, il donne la carte du SI.
- L'ancienne faiblesse (haut de tranche sous-valorisé, 1,60 €/salarié à 250) est **atténuée** : les tranches de 50 font croître le prix avec la taille (revenu d'expansion).

## 3. Métrique de valeur

| Métrique candidate | Alignement avec la valeur | Pour un dirigeant non technicien | Verdict |
|---|---|---|---|
| Par agent IT (GLPI, Freshservice) | Faible : la PME n'a pas d'agent | Incompréhensible | Non |
| Par utilisateur (JumpCloud, Zluri) | Moyen | Freine le partage, devis variable chaque mois | Non |
| Par actif ou par connecteur (Lansweeper, structure C de la phase 1) | Aligné sur le coût, pas sur la valeur | Incite à moins déclarer ; technique | Non |
| Selon les dépenses SaaS (Vertice) | Aligné sur l'économie réalisée | Le client ne connaît pas ses dépenses avant d'avoir l'outil | Non pour l'entrée |
| Forfait par structure en 3 tranches d'effectif (v1) | Bon, mais haut de tranche sous-valorisé | Simple | Remplacé |
| **Personne gérée, prix fixe par tranche de 50 (grille D)** | Bon : comptes, licences, postes, arrivées et départs croissent avec le nombre de personnes (H) | Prix lu dans un tableau, prévisible pour un budget voté ; **pas de facturation par utilisateur** | **Oui (validé le 2026-10-26)** |

Définition (`propositions-tarifs.md` § 1.1) : **personne gérée** = personne « présente » dans le registre (salarié, stagiaire ou alternant, intérimaire, prestataire externe équipé). **Les bénévoles sont gratuits.** Les utilisateurs de Lanternis (dirigeant, DAF, office manager, prestataire invité) ne changent pas le prix.

## 4. Grille retenue : grille D (validée par le fondateur le 2026-10-26)

### 4.1 Abonnement (B2B, prix HT, mensuel sans engagement, annuel −20 %)

| Personnes gérées | **Essentiel** | **Pilotage** (mise en avant) | **Pilotage+** (ouvert avec le multi-sites, P2) |
|---|---|---|---|
| jusqu'à 49 | **49 €** | **99 €** | 199 € |
| 50 à 99 | 79 € | 159 € | 289 € |
| 100 à 149 | 109 € | 219 € | 379 € |
| 150 à 199 | 139 € | 279 € | 469 € |
| 200 à 249 | 169 € | 339 € | 559 € |
| 250 à 499 | + 30 € par tranche de 50 (199 à 319 €) | + 60 € par tranche de 50 (399 à 639 €) | + 90 € par tranche de 50 (649 à 1 009 €) |
| 500 et plus | « Écrivez-nous » : réponse automatique avec la même règle, sans négociation | | |

**Règle affichée :** chaque niveau a un prix pour 49 personnes au plus, puis un montant fixe par tranche de 50 personnes en plus (+30, +60 ou +90 €).

| Règle | Contenu | Statut |
|---|---|---|
| Annuel | −20 % (Pilotage 50-99 : 1 526,40 €/an, soit 127,20 €/mois) | Validé |
| Remise ESS | −15 %, **non cumulable** avec l'annuel ; accordée automatiquement d'après l'API Recherche d'entreprises (`propositions-tarifs.md` § 11.4, étape 7) | Validé ; éligibilité à confirmer juridiquement (loi n° 2014-856) |
| Bénévoles | Gratuits | Validé |
| Essai | **1 mois gratuit, sans carte bancaire**, toutes les fonctions de Pilotage ; prolongation de 15 jours en libre-service (une fois) | Validé |
| Libre-service | Inscription, essai, paiement (carte ou prélèvement SEPA), changement d'offre et résiliation en ligne, jusqu'à 499 personnes | Validé |
| Lancement | **Deux niveaux** (Essentiel, Pilotage) ; Pilotage+ affiché « bientôt » | Validé |
| Changement de tranche | Automatique après 2 relevés mensuels consécutifs au-dessus de la tranche, email 15 jours avant ; en annuel, tranche fixée pour l'année | Proposé (`propositions-tarifs.md` § 11.1), à confirmer |
| TVA | 20 % en sus (ex. Pilotage 50-99 : 159 € HT → 190,80 € TTC) | Règle légale (Hasteria assujettie) |

Contenu des niveaux : `propositions-tarifs.md` § 11.3 (Essentiel : registre complet, alertes, arrivées et départs avec modèles fournis, 3 utilisateurs, 1 prestataire invité, 12 mois d'historique ; Pilotage : modèles illimités, connecteurs P2, PDF, utilisateurs illimités, 3 prestataires). **Les fonctions P2 et P3 doivent être marquées « bientôt »** sur la page de tarifs tant qu'elles ne sont pas livrées.

### 4.2 Ce qui n'est plus dans l'offre

- **Aucun service humain inclus** (décision du fondateur). Disparaissent : la mise en place à 490 / 990 €, le diagnostic SI à 1 490 / 2 490 €, la revue trimestrielle, le DSI à temps partagé outillé (+390 / +690 €/mois) de la v1. Le DSI à temps partagé peut être proposé par un prestataire partenaire (Tecnoo par exemple), avec ses propres prix, hors offre Lanternis.
- **Pas de freemium** (inchangé). L'essai d'un mois remplace le « pilote de 30 jours accompagné » de la v1.
- **Pas de « Nous contacter » sous 500 personnes** : tous les prix sont publics.

### 4.3 Points encore ouverts (à faire trancher par le fondateur)

1. **Services facultatifs payants** (séance d'aide au démarrage 190 €, revue annuelle 290 €, plafonnés à 4 créneaux par mois, `propositions-tarifs.md` § 11.3) : compatibles avec « aucun service inclus », mais **non tranchés**.
2. **Offre « pilote fondateur »** : −30 % pendant 12 mois (v1) ou prix garanti 24 mois (`propositions-tarifs.md` § 1.4) ; 10 places ; non cumulable avec la remise ESS. **Non tranchée.**
3. Libellé exact de la remise ESS sur la page de tarifs et cas des structures ESS non reconnues par l'API (traitement par email, sans justificatif téléversé, D2).

## 5. Questions de prix à poser en entretien

À poser **après** l'exploration de la douleur (méthode Mom Test, `script-interview.md`), **sans vendre** : ces entretiens servent à valider la demande avant le GO, pas à signer. Ordre recommandé : (A) Van Westendorp **sans montrer la grille** pour ne pas ancrer, puis (B) intention d'essai, puis (C) grille de sa tranche et palier choisi, puis (D) « trop bon marché » relu à la lumière de la grille. Montants en € HT par mois, pour toute la structure. Résultats à consigner dans `validation.md` (tableau « Prix »).

### 5.1 (A) Disposition à payer : Van Westendorp (inchangé)

1. **Trop cher :** « À partir de quel prix mensuel trouveriez-vous cet outil tellement cher que vous ne l'envisageriez même pas ? »
2. **Cher mais acceptable :** « À partir de quel prix commenceriez-vous à le trouver cher, tout en l'envisageant quand même ? »
3. **Bonne affaire :** « À quel prix le trouveriez-vous avantageux, une bonne affaire ? »
4. **Trop bon marché :** « En dessous de quel prix douteriez-vous de son sérieux ou de sa fiabilité ? »

Ancres réelles (inchangées) : « Combien payez-vous aujourd'hui votre prestataire informatique par mois ? Qu'est-ce qui est inclus ? » (à comparer à [25]) ; « Avez-vous déjà payé un consultant ou un DSI à temps partagé ? Combien par jour ? » (vérifie [24]).

### 5.2 (B) Intention d'essai (nouveau)

5. « Si l'essai d'un mois, gratuit et sans carte, ouvrait la semaine prochaine, le démarreriez-vous ? **Quand**, et **qui**, chez vous, s'en occuperait ? »
6. « Combien de temps cette personne pourrait-elle y consacrer la première semaine pour remplir le registre (liste du personnel, Microsoft 365, domaines, 3 contrats) ? » (risque du « cockpit vide », sans aide humaine).
7. « Qui doit être d'accord pour lancer un essai ? Et pour payer ensuite (directeur, DAF, bureau, CA) ? En combien de temps ? » (cycle ESS, R11 ; utilité de la prolongation de 15 jours).
8. « Votre messagerie est-elle sur Microsoft 365, Google Workspace ou autre chose ? » (D4 : Google reporté ; mesure du risque d'essai bloqué).
9. **Engagement concret (Mom Test)** : « Voulez-vous qu'on vous ouvre l'essai dès qu'il est prêt ? » → si oui, inscription sur la liste d'attente pendant l'entretien. Pour les plus intéressés : « Accepteriez-vous d'être l'une des 10 structures pilotes, en démarrant l'essai le jour de l'ouverture et en nous disant franchement ce qui manque ? » (engagement écrit, sans paiement).

### 5.3 (C) Palier choisi (nouveau)

Montrer la grille D **de sa tranche seulement** (Essentiel et Pilotage, Pilotage+ « bientôt »), avec le contenu des niveaux.
10. « Lequel prendriez-vous ? Pourquoi celui-là ? » puis « Qu'est-ce qui vous ferait passer à Pilotage ? » (ou « … vous ferait redescendre à Essentiel ? »).
11. « Mensuel ou annuel à −20 % ? Qui décide ? »
12. « Combien de personnes faudrait-il compter chez vous : salariés, intérimaires, prestataires équipés ? Et combien de bénévoles ? » (vérifie la métrique « personne gérée » et l'argument des bénévoles gratuits).
13. « Un prix fixe par tranche de 50 personnes, qui change quand vous changez de tranche, vous convient-il pour votre budget ? »
14. ESS : « Une remise de 15 % change-t-elle la décision ? Un financement (DLA, fondation) est-il envisageable ? »
15. Sans service inclus : « Si vous bloquez, préférez-vous une vidéo, une réponse par email sous 1 jour, ou une séance payante d'une heure à 190 € ? » (éclaire le point ouvert n° 1 du § 4.3, sans le proposer comme une vente).

### 5.4 (D) « Trop bon marché » relu face à la grille (nouveau)

16. « À **[prix de sa tranche : 49, 79 ou 99 €…]**, qu'en pensez-vous ? Ce prix vous paraît-il cohérent avec un outil qui contient les noms de vos salariés, leurs accès et vos contrats ? »
17. « Ce prix vous ferait-il douter de la sécurité ou de la pérennité de l'éditeur ? Qu'est-ce qui vous rassurerait (hébergement en France, éditeur français, export complet, contrat de sous-traitance RGPD) ? »
18. Comparer la réponse à la question 4 : **noter si le seuil « trop bon marché » déclaré est supérieur au prix de sa tranche.**

### 5.5 Critères de validation proposés (H, à arbitrer par le fondateur et le comité de décision)

Ils remplacent « ≥ 3 lettres d'intention à ≥ 149 € HT/mois » (hypothèse 3 de `STATUT.md`, à mettre à jour par le directeur du studio).

| Critère | Seuil proposé (H) |
|---|---|
| Intention d'essai **ferme** (une date ou une personne désignée), parmi les entretiens où la douleur est avérée | ≥ 60 % |
| Engagements écrits « structure pilote » (démarrer l'essai à l'ouverture et souscrire à ≥ 99 € HT/mois si le registre tient ses promesses) | ≥ 3 |
| Palier médian choisi | ≥ Pilotage |
| Part des interviewés dont le seuil « trop bon marché » dépasse le prix de leur tranche | ≤ 30 % (au-delà : remonter les prix de la 1re tranche ou renforcer les preuves de sérieux) |
| Part des interviewés dont le seuil « trop cher » est sous le prix de leur tranche | ≤ 30 % |
| Part des structures sous Google Workspace | à mesurer ; si > 25 % (H), réexaminer D4 |

## 6. Hypothèses et limites de ce relevé

- La plupart des concurrents directs (Primo, Fleet, Zluri, Torii, Agicap, PME Pennylane) **ne publient pas leurs prix** : la comparaison repose sur des estimations tierces, à recouper par des demandes de devis.
- Les fourchettes d'infogérance [25] viennent d'un blog de prestataire ; le chiffre 2017 du DSI à temps partagé [23] est ancien.
- Les pages Lansweeper et Malt étaient bloquées (403) : chiffres issus de résumés de moteur de recherche.
- Les calculs par salarié supposent 50 utilisateurs et 1 agent IT (H) ; ceux de la grille D supposent 1 personne gérée = 1 salarié (H).
- Aucune donnée de disposition à payer de la cible n'existe à ce stade : **la grille D est décidée, mais son acceptation reste une hypothèse** jusqu'aux entretiens (§ 5).
- Prix Corma : « dès 3 € », HT non précisé, remises possibles ; à revérifier avant toute comparaison publique.
