---
venture: lanternis
phase: 1 Analyse
auteur: analyste-finance
date: 2026-10-26
version: 2
statut: brouillon
---

# Lanternis : modèle de revenus et unit economics (v2, libre-service, grille D)

> **Note de version (v2, 2026-10-26).** Ce document remplace la v1 du 2026-10-25, qui reposait sur l'ancienne grille 149 / 249 / 399 €, la vente directe par le fondateur, une API unifiée à 30 € par client et des services humains inclus. La v1 reste consultable dans l'historique Git. La v2 applique les décisions du fondateur du 2026-10-26 (journal de `STATUT.md`) :
> - vente en libre-service, avec très peu d'interventions du fondateur ;
> - essai gratuit d'un mois sans carte ;
> - **grille D validée** (`2-marche/propositions-tarifs.md` § 11) ;
> - aucun service humain inclus, seulement des services facultatifs achetés en ligne ;
> - Cockpit DSI abandonné : MVP développé de zéro (tranche pilote de 14 à 18 semaines selon `faisabilite-v2.md`, plus le libre-service, soit environ 15 à 19 semaines, `propositions-tarifs.md` § 11.6).
>
> **Règle de lecture.** **(H)** = hypothèse non vérifiée. Quand un tableau porte la mention « (H) » dans son titre, toutes ses valeurs sont des hypothèses ou des calculs faits à partir d'hypothèses, sauf mention contraire. **Seul chiffre externe sourcé ici :** le barème Stripe France (https://stripe.com/fr/pricing, consulté le 2026-10-26, repris de `propositions-tarifs.md` § 10). Les prix de la grille D sont une **décision** du fondateur, pas une donnée de marché. Aucune donnée de conversion, de churn ni de trafic n'est disponible pour cette cible.
>
> **Cadre studio :** B2B, prix HT, mensuel sans engagement, annuel à −20 %, facturation par Hasteria SASU via son compte Stripe (métadonnée `marque=lanternis`), TVA de 20 % en sus. Les montants de ce document sont HT.

---

## 0. En bref

| Indicateur | Prudent | **Central** | Ambitieux |
|---|---|---|---|
| Revenu net moyen par client (ARPA), 1re année → 2e année (H) | 96 € → 96 € | **121 € → 132 €** | 128 € → 143 € |
| Marge brute (support valorisé) (H) | ≈ 86 % | **≈ 88 à 89 %** | ≈ 89 à 90 % |
| Essai → payant (H) | 14 % | **20 %** | 27 % |
| Churn mensuel (H) | 3 % | **2 %** | 1,5 % |
| CAC moyen de la 1re année (H) | ≈ 690 € | **≈ 330 €** | ≈ 210 € |
| Clients au mois 24 (H) | ≈ 23 | **≈ 65** | ≈ 140 |
| MRR au mois 24 (H) | ≈ 2 200 € | **≈ 8 600 €** | ≈ 20 000 € |
| Point mort « temps d'exploitation et de maintenance valorisé » (H) | non atteint en 24 mois | **mois 14 (≈ 30 clients)** | mois 7 (≈ 31 clients) |

**Lecture :** sans vendeur, l'économie unitaire est confortable (marge d'environ 88 %, CAC remboursé en 2 à 8 mois). **Le risque ne porte plus sur le CAC mais sur le volume** : il faut 20 à 30 essais par mois, sans aucun commercial, pour approcher 10 k€ de MRR en 24 mois. Aucun volume de trafic ni aucun taux de conversion n'est encore mesuré.

---

## 1. La grille D (décision du fondateur du 2026-10-26)

Détail, fonctionnalités par offre et parcours d'achat : `propositions-tarifs.md` § 11.2 à 11.4. Rappel des prix HT par mois :

| Personnes gérées | Essentiel | Pilotage | Pilotage+ (ouvre avec le multi-sites, P2) |
|---|---|---|---|
| jusqu'à 49 | 49 € | 99 € | 199 € |
| 50 à 99 | 79 € | 159 € | 289 € |
| 100 à 149 | 109 € | 219 € | 379 € |
| 150 à 199 | 139 € | 279 € | 469 € |
| 200 à 249 | 169 € | 339 € | 559 € |
| 250 à 499 | +30 € par tranche de 50 | +60 € par tranche de 50 | +90 € par tranche de 50 |
| 500 et plus | « Écrivez-nous » | | |

Règles qui pèsent sur le revenu :
- **annuel −20 %** ;
- **ESS −15 %**, non cumulable avec l'annuel (le client prend la meilleure des deux), appliquée automatiquement ;
- **bénévoles gratuits** : ils ne comptent pas dans la tranche ;
- **essai d'un mois sans carte**, prolongeable une fois de 15 jours ;
- **ouverture avec deux niveaux** (Essentiel et Pilotage) ; Pilotage+ affiché « bientôt » ;
- code « pilote fondateur » : prix garanti 24 mois pour les 10 premières souscriptions, **sans remise**, donc sans effet sur l'ARPA ;
- changement de tranche automatique : c'est un **revenu d'expansion**, non modélisé ici (gain potentiel, § 10).

---

## 2. Hypothèses de mix et revenu moyen par client (H)

### 2.1 Répartition des clients par taille (H)

| Personnes gérées | Central (`propositions-tarifs.md` § 6.1) | Prudent : moins de grandes structures sans vente (§ 11.5) |
|---|---|---|
| jusqu'à 49 | 30 % | 40 % |
| 50 à 99 | 35 % | 45 % |
| 100 à 149 | 20 % | 10 % |
| 150 à 199 | 8 % | 3 % |
| 200 à 249 | 7 % | 2 % |
| 250 et plus | 0 % (gain potentiel non modélisé) | 0 % |

Prix catalogue moyen par niveau (somme de la part de chaque tranche × prix de la tranche) :

| Niveau | Central | Prudent |
|---|---|---|
| Essentiel | 87,1 € | 73,6 € |
| Pilotage | 175,2 € | 148,2 € |
| Pilotage+ | 313,3 € | 272,8 € |

### 2.2 Mix des niveaux, annuel et ESS (H)

| Hypothèse | Prudent | Central | Ambitieux |
|---|---|---|---|
| Répartition par taille | prudente | centrale | centrale |
| Mix des niveaux, 1re année | Essentiel 55 % / Pilotage 45 % | 45 % / 55 % | 45 % / 55 % jusqu'au mois 6, puis 40 / 45 / 15 % |
| Ouverture de Pilotage+ | pas dans les 24 mois | mois 13 | mois 7 |
| Mix des niveaux, 2e année | inchangé | mélange des cohortes (ARPA moyen du parc ≈ 132 €) | 40 / 45 / 15 % |
| Part en annuel | 40 % | 40 % | 40 % |
| Part ESS | 30 % | 30 % | 30 % |

**Facteur net « annuel + ESS non cumulables »** : avec 40 % d'annuel et 30 % d'ESS supposés indépendants, on a 12 % de clients annuels ESS (payant 0,80), 28 % d'annuels non ESS (0,80), 18 % d'ESS mensuels (0,85) et 42 % de mensuels hors ESS (1,00). Le facteur vaut 0,12 × 0,8 + 0,28 × 0,8 + 0,18 × 0,85 + 0,42 = **0,893** (H). Plage plausible : 0,87 (60 % d'ESS) à 0,93 (10 % d'ESS, 30 % d'annuel).

### 2.3 ARPA net (H)

| Cas | Calcul du prix catalogue | Catalogue | **ARPA net (× 0,893)** |
|---|---|---|---|
| Prudent | 0,55 × 73,6 + 0,45 × 148,2 | 107,2 € | **≈ 96 €** |
| Lancement (central, 1re année) | 0,45 × 87,1 + 0,55 × 175,2 | 135,6 € | **≈ 121 €** |
| Ambitieux, 1re année (moyenne du parc) | — | — | **≈ 128 €** (H : 121 € puis 143 € à partir du mois 7) |
| Central, 2e année (moyenne du parc) | — | — | **≈ 132 €** (H : anciens clients à 121 €, nouveaux à 143 €, quelques montées de niveau) |
| Cible (Pilotage+ ouvert) | 0,40 × 87,1 + 0,45 × 175,2 + 0,15 × 313,3 | 160,7 € | **≈ 143 €** |

Le paiement annuel encaisse 12 mois d'avance : la trésorerie est meilleure que ne l'indique le MRR (effet non modélisé).

---

## 3. Coûts variables et marge brute

### 3.1 Coûts variables par client et par mois

| Poste | Hypothèse | Statut |
|---|---|---|
| **Stripe, carte de l'EEE** (cas prudent retenu) | 1,5 % + 0,25 € par paiement, + Stripe Billing 0,7 % du volume, soit **≈ 2,2 % + 0,25 €** | **Sourcé** : https://stripe.com/fr/pricing, consulté le 2026-10-26 |
| Stripe, prélèvement SEPA (à privilégier en B2B) | 0,35 € par prélèvement + Billing 0,7 %, soit ≈ 1,20 € sur 121 € | **Sourcé**, même page. Le calcul (1,20 €) est le mien |
| Hébergement : quote-part du VPS OVH, base PostgreSQL, sauvegardes | 1,50 € | (H) ; `INFRA.md` ne donne pas encore le prix du VPS |
| Emails transactionnels Mailjet (digest hebdomadaire, alertes, cycle de vie) | 0,50 € | (H) ; volume estimé à 20 à 50 emails par client et par mois |
| Facturation électronique (plateforme agréée, émission obligatoire pour Hasteria au 1er septembre 2027 selon `CLAUDE.md`) | 0,50 € | (H) ; dépend de la plateforme choisie |
| API unifiée, agrégateur bancaire, LLM | 0 € | (H) : aucun au MVP (D5 ; connecteurs P2 utilisant les jetons du client) |
| **Support par email** (temps du fondateur, 0,15 h à 60 €/h) | **9 €** | (H) : 60 €/h est un coût d'opportunité supposé ; 0,15 h est l'hypothèse la plus sensible de ce tableau |

Annuel : les frais fixes de Stripe ne sont payés qu'une fois par an. Le cas « carte, mensuel » est donc un majorant.

### 3.2 Marge brute selon l'ARPA (H)

Deux lectures :
- **trésorerie** : le temps du fondateur n'est pas payé, donc le support n'est pas un décaissement ;
- **économique** : le support est valorisé à 60 €/h.

| ARPA net | Stripe (carte) | Coûts décaissés | Coûts avec support valorisé | Marge brute (trésorerie) | **Marge brute (économique)** | **Contribution économique / mois** |
|---|---|---|---|---|---|---|
| 96 € (prudent) | 2,36 € | 4,86 € | 13,86 € | 94,9 % | **85,6 %** | **82,1 €** |
| 121 € (lancement) | 2,91 € | 5,41 € | 14,41 € | 95,5 % | **88,1 %** | **106,6 €** |
| 128 € (ambitieux, 1re année) | 3,07 € | 5,57 € | 14,57 € | 95,6 % | **88,6 %** | **113,4 €** |
| 132 € (central, 2e année) | 3,15 € | 5,65 € | 14,65 € | 95,7 % | **88,9 %** | **117,4 €** |
| 143 € (cible) | 3,40 € | 5,90 € | 14,90 € | 95,9 % | **89,6 %** | **128,1 €** |
| 49 € (Essentiel, 1re tranche, mensuel) | 1,33 € | 3,83 € | 12,83 € | 92,2 % | 73,8 % | 36,2 € |

Sensibilité au support : à 0,5 h par client et par mois (comme dans la v1), le coût passe à 35,4 € sur l'ARPA de 121 €. La marge tombe à **≈ 71 %**, la contribution à **≈ 86 €**.

### 3.3 Services facultatifs (hors MRR) (H)

Séance d'aide au démarrage (190 €) et revue annuelle du SI (290 €), achetées en ligne, **plafonnées à 4 créneaux par mois** (`propositions-tarifs.md` § 11.3). Le revenu maximal est d'environ 760 à 1 160 €/mois, avec 4 à 8 h de temps. Je ne les compte **pas** dans le MRR ni dans la trajectoire. La question de l'entité qui les facture (Hasteria ou Tecnoo) reste ouverte.

---

## 4. L'entonnoir : visiteurs → essais → activés → payants (H)

« Visiteur » = visiteur unique qualifié arrivant sur la page de tarifs ou sur la page d'essai (pas le trafic total du blog). « Activé » = définition de `propositions-tarifs.md` § 5.5 : sous 14 jours, au moins 80 % des personnes importées, un annuaire connecté (ou le matériel importé) et 3 contrats avec une échéance.

| Étape | Prudent | **Central** | Ambitieux | Objectif interne (§ 11.4) |
|---|---|---|---|---|
| Visiteur → essai | 2 % | **3 %** | 4 % | ≥ 3 % |
| Essai → activé | 40 % | **50 %** | 60 % | ≥ 50 % |
| Activé → payant | 35 % | **40 %** | 45 % | ≥ 35 % |
| Non activé → payant | ≈ 0 % | ≈ 0 % | ≈ 0 % | — |
| **Essai → payant** | **14 %** | **20 %** | **27 %** | ≥ 20 % |
| Essais par client payant | ≈ 7,1 | **5** | ≈ 3,7 | — |
| Visiteurs par client payant | ≈ 357 | **≈ 167** | ≈ 93 | — |
| Délai entre l'essai et le paiement | 1 mois | 1 mois | 1 mois | — |

Coût d'un essai (H) : 0,1 h de questions au support (6 €) + hébergement pendant l'essai (0,50 €) = **6,50 €**. Par client payant, cela fait 46 € (prudent), **33 €** (central) ou 24 € (ambitieux).

Aucun de ces taux n'est un repère de marché. Ce sont des objectifs à recaler après les 20 premiers essais. Point faible connu : une structure sous Google Workspace ne peut pas connecter son annuaire au MVP (D4), ce qui risque de faire baisser l'activation.

---

## 5. Unit economics : CAC par canal, LTV, ratio et remboursement

### 5.1 CAC par canal automatisé (H, scénario central, ARPA de 121 €)

Le temps du fondateur est valorisé à 60 €/h. Chaque CAC inclut le coût des essais (5 essais × 6,50 € ≈ 33 €).

| Canal | Mécanisme | Calcul (H) | CAC 1re année | CAC à maturité | Incertitude |
|---|---|---|---|---|---|
| **Essai direct, bouche-à-oreille** | Trafic direct vers l'essai | Coût des essais seulement | **≈ 35 €** | ≈ 35 € | Volume inconnu |
| **Liste d'attente du pré-lancement** | Lettre mensuelle (4 éditions × 2 h = 480 €), puis invitation à l'essai à l'ouverture | 480 € ÷ 5 clients (25 essais × 20 %) + 33 € | **≈ 130 €** | — (une fois) | Taille de la liste non mesurée (objectif : ≥ 80 inscrits qualifiés) |
| **Blog SEO et autodiagnostic** | 2 articles par mois produits par les agents, 2 h de validation par article (240 €/mois) | 1re année : 240 € ÷ 0,4 client (2 essais/mois) + 33 € ; maturité : 240 € ÷ 2 clients (10 essais/mois) + 33 € | **≈ 630 €** | ≈ 150 € | **Forte** : volumes de recherche non mesurés (`signaux-demande.md` § 3) |
| **Réseaux ESS en one-to-many** | Une action par mois (tribune, lettre de fédération, webinaire enregistré), ≈ 4 h (240 €) | 240 € ÷ 0,6 client (3 essais) + 33 € | **≈ 430 €** (300 à 750 €) | 200 à 400 € | Accès aux relais non vérifié (`acquisition.md` § 7) |
| **Prestataires prescripteurs** | Lien de recommandation, commission automatique de 20 % pendant 12 mois | 20 % × 12 × 121 € = 290 € + 33 € + animation (2 h/mois ≈ 120 €, réparties sur 1 à 3 clients) | **≈ 440 €** | ≈ 360 € | Coût de l'outil de commission non sourcé (Stripe Connect ou plateforme d'affiliation) |
| **Parrainage client** | Un mois offert au parrain et au filleul | 2 × 121 € (revenu abandonné) + 33 € | **≈ 275 €** | ≈ 275 € | Faible volume au début |
| Page Facebook (organique, test de 6 semaines) | Posts orientés associations, ≈ 1 h par semaine (240 €/mois) | Si 1 essai/mois : 240 € ÷ 0,2 client | ≈ 1 200 € | inconnu | À arrêter si moins de 2 essais/mois après le test (H) |
| Solidatech | Référencement auprès des associations | Conditions non trouvées (`prix.md` [32]) | inconnu | inconnu | À demander |

**Plafonds de CAC (H)** : le plus serré entre un remboursement en 12 mois et un ratio LTV/CAC ≥ 3 avec 3 % de churn.

| ARPA | Plafond par le remboursement en 12 mois | Plafond par LTV/CAC ≥ 3 (churn de 3 %) | **CAC maximal** |
|---|---|---|---|
| 49 € (Essentiel, 1re tranche) | 434 € | 402 € | **≈ 400 €** |
| 96 € | 985 € | 912 € | **≈ 910 €** |
| 121 € | 1 279 € | 1 184 € | **≈ 1 180 €** |
| 143 € | 1 537 € | 1 423 € | **≈ 1 420 €** |

Tous les canaux sont sous le plafond moyen. Seul Facebook dépasse le plafond d'Essentiel s'il rend peu d'essais.

### 5.2 CAC moyen par scénario, 1re année (H)

Dépenses d'acquisition de la 1re année :
- temps d'acquisition fixe de 8 h par mois (contenus 4 h, partenaires et relais ESS 4 h) × 60 € × 12 = **5 760 €** ;
- coûts de lancement : vidéos d'onboarding (16 h) et lettre mensuelle (8 h) = **1 440 €** ;
- coût des essais ;
- commissions des prescripteurs (10 % des clients, 15 % en ambitieux) ;
- parrainage (5 % des clients).

| | Prudent | **Central** | Ambitieux |
|---|---|---|---|
| Essais sur 12 mois | 93 | **157** | 241 |
| Nouveaux clients payants sur 12 mois | 11,9 | **28,6** | 59,1 |
| Dépenses d'acquisition | ≈ 8 190 € | **≈ 9 400 €** | ≈ 12 250 € |
| **CAC moyen** | **≈ 690 €** | **≈ 330 €** | **≈ 210 €** |
| CAC moyen, 2e année (temps de 10 h/mois, plus de commissions) | non calculé | ≈ 290 € | non calculé |

Le CAC baisse quand le volume monte, car l'essentiel du coût est du temps fixe. **Ce CAC n'inclut pas le développement du parcours en libre-service** : il est compté dans l'investissement MVP (§ 8).

### 5.3 LTV, ratio LTV/CAC et remboursement (H)

LTV = contribution économique mensuelle ÷ churn (formule du skill unit-economics). Comme une durée de vie de 33 à 67 mois n'est pas démontrable pour un produit neuf, j'indique aussi une **LTV plafonnée à 36 mois** : contribution × (1 − (1 − churn)^36) ÷ churn.

| | Prudent | **Central** | Ambitieux |
|---|---|---|---|
| Contribution, 1re année | 82,1 € | **106,6 €** | 113,4 € |
| Churn mensuel | 3 % | **2 %** | 1,5 % |
| Durée de vie moyenne | 33 mois | **50 mois** | 67 mois |
| **LTV** | **≈ 2 740 €** | **≈ 5 330 €** | **≈ 7 560 €** |
| LTV plafonnée à 36 mois | ≈ 1 820 € | ≈ 2 760 € | ≈ 3 170 € |
| CAC moyen de la 1re année | ≈ 690 € | ≈ 330 € | ≈ 210 € |
| **LTV/CAC** (plafonnée à 36 mois) | **4,0** (2,6) | **16** (8,4) | **36** (15) |
| **Remboursement du CAC** | **≈ 8,4 mois** | **≈ 3,1 mois** | **≈ 1,8 mois** |

Ces ratios sont très élevés parce que le CAC ne paie que du temps et des commissions. Ils ne disent rien du **volume** atteignable : un CAC de 330 € ne sert à rien si le canal ne produit que 2 essais par mois. C'est pourquoi la trajectoire (§ 9) compte plus que le ratio.

Sensibilité de la LTV au churn (contribution de 106,6 €) : 1,5 % → 7 110 € ; **2 % → 5 330 €** ; 3 % → 3 550 € ; 4 % → 2 670 €.

---

## 6. Clients et essais nécessaires pour 3, 10 et 20 k€ de MRR (H)

### 6.1 Clients nécessaires (MRR ÷ ARPA, arrondi au-dessus)

| Objectif de MRR | ARPA de 96 € (prudent) | **ARPA de 121 € (lancement)** | ARPA de 143 € (cible) |
|---|---|---|---|
| 3 k€ | 32 | **25** | 21 |
| 10 k€ | 105 | **83** | 70 |
| 20 k€ | 209 | **166** | 140 |

### 6.2 Essais et visiteurs par mois, à rythme constant

Délais visés (H) : 3 k€ en 12 mois, 10 k€ en 24 mois, 20 k€ en 36 mois après l'ouverture. Nombre de souscriptions mensuelles constant N tel que clients = N × (1 − (1 − churn)^T) ÷ churn ; essais = N ÷ taux de conversion ; visiteurs = essais ÷ taux visiteur → essai.

| Objectif | Prudent (96 €, churn 3 %, 14 %, 2 %) | **Central (121 €, churn 2 %, 20 %, 3 %)** | Ambitieux (143 €, churn 1,5 %, 27 %, 4 %) |
|---|---|---|---|
| 3 k€ en 12 mois | 3,1 souscriptions/mois → **22 essais** → 1 120 visiteurs | 2,3 → **12 essais** → 390 visiteurs | 1,9 → **7 essais** → 180 visiteurs |
| 10 k€ en 24 mois | 6,1 → **43 essais** → 2 170 visiteurs | 4,3 → **22 essais** → 720 visiteurs | 3,5 → **13 essais** → 320 visiteurs |
| 20 k€ en 36 mois | 9,4 → **67 essais** → 3 360 visiteurs | 6,4 → **32 essais** → 1 070 visiteurs | 5,0 → **19 essais** → 460 visiteurs |

Avec l'ARPA cible de 143 € et les taux du scénario central, on retrouve les ordres de grandeur du § 11.5 : environ 18 essais par mois pour 10 k€ en 24 mois et environ 27 pour 20 k€ en 36 mois.

**Remplacement seul (H)** : à 83 clients et 2 % de churn, on perd environ 1,7 client par mois. Il faut donc **environ 8 essais par mois rien que pour ne pas reculer**.

---

## 7. Temps du fondateur (H)

Par mois, en régime établi, scénario central :

| Poste | 3 k€ (25 clients, ≈ 12 essais/mois) | 10 k€ (83 clients, ≈ 22 essais/mois) | 20 k€ (166 clients, ≈ 32 essais/mois) |
|---|---|---|---|
| Support par email (0,15 h par client) | 3,8 h | 12,5 h | 24,9 h |
| Questions pendant l'essai (0,1 h par essai) | 1,2 h | 2,2 h | 3,2 h |
| Validation des contenus (blog, lettre, réseaux) | 4 h | 4 h | 4 h |
| Partenaires, relais ESS, Solidatech | 4 h | 6 h | 8 h |
| Exceptions (cas ESS manuels, impayés, plus de 500 personnes) | 1 h | 1,5 h | 3 h |
| Rapport mensuel et réallocation | 2 h | 3 h | 4 h |
| **Sous-total exploitation et acquisition** | **≈ 16 h** | **≈ 29 h** | **≈ 47 h** |
| Services facultatifs (au plus 4 créneaux, préparation comprise) | ≤ 8 h | ≤ 8 h | ≤ 8 h |
| **Maintenance, sécurité, mises à jour et évolutions** (Pilotage+, multi-sites, Google, connecteurs P2) | ≈ 40 h | ≈ 40 h | ≈ 40 h ou plus |
| **Total** | **≈ 56 à 64 h** (≈ 2 j/semaine) | **≈ 69 à 77 h** (≈ 2,5 j/semaine) | **≈ 87 à 95 h** (≈ 3 j/semaine) |

À cela s'ajoute **le MVP** : environ 15 à 19 semaines à temps plein (tranche pilote de 14 à 18 semaines + libre-service, H architecte et stratège), soit environ 30 à 38 semaines à mi-temps (`faisabilite-v2.md` § 3 : « à mi-temps, doubler »).

**Lecture :** en vente directe, la v1 demandait environ 89 h/mois pour 10 k€, rien que pour la vente, l'onboarding et le support. En libre-service, ce poste tombe à environ 29 h. **Le développement continu devient le premier consommateur de temps.** À 20 k€, le support approche 25 h/mois : il faudra une base d'aide en ligne riche ou un support de niveau 1 délégué (Tecnoo ?).

---

## 8. Coûts fixes et point mort

### 8.1 Coûts fixes décaissés (tous H, à remplacer par des devis et des factures)

| Poste | Par mois (H) | Remarque |
|---|---|---|
| Hébergement fixe : quote-part du VPS OVH partagé entre ventures, snapshots, stockage des sauvegardes (o2switch, NAS) | 30 € | Prix du VPS absent d'`INFRA.md` |
| Domaines lanternis.fr et lanternis.com | 3 € (≈ 35 €/an) | À vérifier chez OVH lors de la réservation |
| Mailjet : offre payante si le volume dépasse l'offre gratuite | 20 € | Barème Mailjet non consulté |
| Outils : base d'aide et support, prise de rendez-vous, supervision, programme de recommandation | 80 € | Choix d'outils non faits |
| Expert-comptable : surcoût pour Hasteria (écritures, TVA, ventilation par marque) | 100 € | À demander au comptable d'Hasteria |
| Assurance RC pro et cyber (quote-part) | 60 € | Devis à obtenir |
| Plateforme de facturation électronique (abonnement fixe) | 10 € | Plateforme non choisie |
| **Total des coûts fixes décaissés** | **≈ 300 €/mois** | |

**Coûts ponctuels de lancement (H) :** relecture par un avocat des CGV, du contrat de sous-traitance (DPA) et des pages légales, de 1 500 à 3 000 € ; dépôt de la marque et avis d'un conseil en propriété industrielle, de 500 à 1 500 € ; soit **≈ 3 000 € en valeur centrale**.

**Investissement MVP valorisé (H) :** 15 à 19 semaines × 5 jours × 7 h × 60 €/h = **31 500 à 39 900 €**, soit 35 700 € au point central (17 semaines). Le taux de 60 €/h est un coût d'opportunité supposé. Au TJM supposé de 600 € de la v1, ce serait 45 000 à 57 000 €.

### 8.2 Point mort selon la façon de compter le temps du fondateur (H)

Point mort = coûts fixes ÷ contribution par client. Dans les options 1 et 5, tout le temps du fondateur est dans les coûts fixes : on utilise donc la contribution « trésorerie » (support non valorisé). Dans les options 2 à 4, on utilise la contribution économique (support valorisé).

| Option | Coûts fixes mensuels | Prudent (96 €) | **Central (121 € ; 132 € en 2e année)** | Ambitieux (128 € ; 143 € en 2e année) |
|---|---|---|---|---|
| **1. Trésorerie : temps non valorisé** | 300 € | 4 clients (≈ 380 € de MRR) | **3 clients** (≈ 360 €) | 3 clients (≈ 380 €) |
| **2. Temps d'exploitation et d'acquisition valorisé** (12 h fixes = 720 €), sans développement | 1 020 € | 13 clients (≈ 1 250 €) | **10 clients** (≈ 1 210 €) | 9 clients (≈ 1 150 €) |
| **3. Option 2 + maintenance et évolutions valorisées** (40 h = 2 400 €) | 3 420 € | 42 clients (≈ 4 030 €) | **33 clients en 1re année, 30 en 2e** (≈ 4 000 €) | 31 clients, puis 27 (≈ 3 900 €) |
| **4. Option 3 + amortissement du MVP sur 36 mois** (35 700 € ÷ 36 = 992 €) | 4 412 € | 54 clients (≈ 5 180 €) | **42 clients, puis 38** (≈ 5 000 €) | 39 clients, puis 35 (≈ 5 000 €) |
| 5. Fondateur à temps plein valorisé (151,67 h × 60 € = 9 100 €, tout compris) | 9 400 € | 104 clients (≈ 10 000 €) | **82 clients, puis 75** (≈ 9 900 €) | 77 clients, puis 69 (≈ 9 860 €) |

Mois où le point mort est atteint dans la trajectoire du § 9 (H) :

| Option | Prudent | **Central** | Ambitieux |
|---|---|---|---|
| 1. Trésorerie | mois 3 | **mois 2** | mois 2 |
| 2. Exploitation valorisée | mois 15 | **mois 5** | mois 2 |
| 3. + maintenance valorisée | non atteint en 24 mois | **mois 14** | mois 7 |
| 4. + amortissement du MVP | non atteint | **mois 17** | mois 9 |
| 5. Temps plein valorisé | non atteint | **non atteint** (65 clients au mois 24) | mois 15 |

**Lecture :** en trésorerie, Lanternis couvre ses frais dès quelques clients : le projet ne « brûle » presque pas d'argent, il consomme du **temps**. La vraie question est de savoir si ce temps est payé. Dans le scénario central, il l'est au taux de 60 €/h, hors MVP, à partir du mois 14 environ. Le MVP lui-même n'est pas remboursé en 24 mois.

---

## 9. Trajectoire sur 24 mois en 3 scénarios (H)

### 9.1 Paramètres (modifiables)

Le mois 1 est le **mois d'ouverture commerciale**. Il intervient environ 4 à 5 mois après le début du développement à temps plein, ou 7 à 9 mois à mi-temps (H). Le développement ne peut commencer qu'après un GO écrit du fondateur.

| Paramètre | Prudent | **Central** | Ambitieux |
|---|---|---|---|
| Essais venus de la liste d'attente (mois 1) | 15 | **25** | 40 |
| Essais organiques par mois, T1 / T2 / T3 / T4 | 5 / 6 / 7 / 8 | **8 / 10 / 12 / 14** | 12 / 15 / 18 / 22 |
| Essais organiques par mois, T5 / T6 / T7 / T8 | 10 / 11 / 12 / 14 | **17 / 20 / 23 / 26** | 26 / 30 / 35 / 40 |
| Visiteurs qualifiés par mois nécessaires au mois 24 | ≈ 700 | **≈ 870** | ≈ 1 000 |
| Essai → payant (avec un mois de décalage) | 14 % | **20 %** | 27 % |
| Churn mensuel | 3 % | **2 %** | 1,5 % |
| ARPA, 1re année / 2e année | 96 € / 96 € | **121 € / 132 €** | 128 € / 143 € |

**Formules (reproductibles dans un tableur) :**
- nouveaux clients du mois t = essais du mois t−1 × taux essai → payant ;
- clients(t) = clients(t−1) × (1 − churn) + nouveaux clients(t) ;
- MRR(t) = clients(t) × ARPA de l'année.

Les clients sont gardés en décimales (ce sont des espérances), puis arrondis à l'affichage.

### 9.2 Résultats en fin de trimestre

| Mois | Prudent : clients | Prudent : MRR | **Central : clients** | **Central : MRR** | Ambitieux : clients | Ambitieux : MRR |
|---|---|---|---|---|---|---|
| 3 | 3,4 | 330 € | **8,1** | **980 €** | 17,1 | 2 180 € |
| 6 | 5,4 | 520 € | **13,1** | **1 580 €** | 27,5 | 3 520 € |
| 9 | 7,7 | 740 € | **19,0** | **2 300 €** | 39,9 | 5 100 € |
| 12 | 10,1 | 970 € | **25,7** | **3 110 €** | 54,6 | 6 990 € |
| 15 | 13,1 | 1 250 € | **33,6** | **4 440 €** | 71,9 | 10 280 € |
| 18 | 16,3 | 1 560 € | **42,8** | **5 660 €** | 91,6 | 13 090 € |
| 21 | 19,6 | 1 880 € | **53,3** | **7 030 €** | 114,1 | 16 320 € |
| 24 | **23,3** | **2 240 €** | **64,9** | **8 560 €** | **139,7** | **19 970 €** |

### 9.3 Cumuls sur 24 mois

| | Prudent | **Central** | Ambitieux |
|---|---|---|---|
| Essais | 234 | **415** | 634 |
| Souscriptions | 30,8 | **77,8** | 160,4 |
| Clients perdus (churn) | 7,5 | **13,0** | 20,7 |
| Chiffre d'affaires récurrent, 1re année | ≈ 6 600 € | **≈ 20 500 €** | ≈ 45 700 € |
| Chiffre d'affaires récurrent, 2e année | ≈ 19 500 € | **≈ 71 600 €** | ≈ 166 300 € |
| ARR au mois 24 (MRR × 12) | ≈ 26 900 € | **≈ 102 700 €** | ≈ 239 700 € |
| Résultat cumulé en **trésorerie** (option 1, après 3 000 € de coûts ponctuels, hors commissions et parrainage, avant toute rémunération du fondateur) | ≈ +14 600 € | **≈ +78 000 €** | ≈ +192 900 € |
| Résultat cumulé **économique** (option 3 : exploitation, acquisition et maintenance valorisées, hors MVP) | ≈ −59 700 € | **≈ 0 €** | ≈ +107 400 € |
| MVP (≈ 35 700 € valorisés) remboursé dans les 24 mois ? | non | **non** | oui, au cours de la 2e année |

**Lecture :**
- **Central** : 3 k€ de MRR vers le mois 12 ; environ 8,6 k€ au mois 24 ; 10 k€ vers le mois 27 (extrapolation, H).
- **Prudent** : le scénario de l'échec lent. Le produit vit et ne coûte presque rien en trésorerie, mais ne paie ni le temps de maintenance ni le MVP. Il faudrait décider à 12 mois de continuer ou d'arrêter (seuil proposé, H : moins de 15 clients au mois 12).
- **Ambitieux** : environ 20 k€ au mois 24 ; il suppose des volumes d'essais et une conversion que rien ne prouve encore.

---

## 10. Hypothèses les plus sensibles (classées)

| Rang | Hypothèse (H) | Valeur centrale | Effet d'un écart (calculé sur la trajectoire centrale) | Test | Critère |
|---|---|---|---|---|---|
| **1** | **Volume d'essais sans vendeur** (trafic qualifié, SEO, relais ESS, prescripteurs) | 8 essais/mois au début, 26 au mois 24, + 25 venus de la liste d'attente | −30 % d'essais → **≈ 6 000 € de MRR au mois 24** au lieu de 8 560 € (effet proportionnel) | Pré-lancement : inscrits sur la liste d'attente, trafic du blog, volumes de recherche (Search Console), retours des relais ESS | ≥ 80 inscrits qualifiés en 8 semaines (`STATUT.md`, hyp. 5) ; ≥ 18 essais/mois au 6e mois après l'ouverture |
| **2** | **Activation et conversion sans humain** (« cockpit vide », Google reporté par D4) | 50 % activés ; 20 % essai → payant | 15 % au lieu de 20 % → **≈ 6 400 €** au mois 24 (−25 %) | 20 premiers essais : chronométrer la mise en route, mesurer la part sous Google Workspace | Activation ≥ 50 % ; conversion ≥ 20 % ; Google < 25 % des essais |
| **3** | **Mix des tailles et des niveaux sans vente** (part des 100 à 249, part de Pilotage, ouverture de Pilotage+) | ARPA 121 € puis 132 € | ARPA prudent (96 €) → **≈ 6 200 €** au mois 24 (−27 %) | Choix faits dans le simulateur de prix, clics sur les offres de la landing, entretiens | ≥ 55 % en Pilotage ; ≥ 30 % de structures de 100 personnes et plus |
| **4** | **Churn** | 2 %/mois | 3 % → ≈ 7 860 € au mois 24 (−8 % seulement), mais **LTV −33 %** : l'effet joue surtout au-delà de 24 mois | Cohortes mensuelles dès le 3e mois ; part des clients qui ouvrent le digest | ≤ 2 % après le 6e mois |
| **5** | **Délai du MVP et disponibilité du fondateur** | 15 à 19 semaines à temps plein ; 40 h/mois de maintenance ensuite | À mi-temps, l'ouverture recule de 4 à 5 mois ; la maintenance concurrence Tecnoo | Vélocité réelle sur les lots L0 à L2 (`faisabilite-v2.md`, F14) | Écart ≤ 20 % après 4 semaines |
| 6 | **Temps de support** | 0,15 h par client et par mois | 0,5 h → marge ≈ 71 %, point mort de l'option 3 à 40 clients au lieu de 33 | Journal des tickets, base d'aide | ≤ 0,15 h après le 2e mois du client |
| 7 | Part de l'ESS et de l'annuel | Facteur 0,893 | Plage de 0,87 à 0,93 → ARPA ±3 à 4 % | Statistiques de Stripe et du contrôle ESS automatique | — |
| 8 | Coûts fixes et coûts d'outils | ≈ 300 €/mois ; 3 000 € ponctuels | Effet faible sur le point mort (± 1 client par tranche de 100 €) | Devis : VPS, Mailjet, assurance, comptable, outil de commission | — |
| 9 | Revenu d'expansion (changement de tranche, structures de 250 à 499 personnes) | Non modélisé (0) | Gain potentiel seulement | Suivre le revenu d'expansion net dans Stripe | — |

**Les trois hypothèses qui décident de tout sont le volume d'essais (n° 1), l'activation sans humain (n° 2) et l'ARPA sans vente (n° 3).** Elles jouent à peu près autant chacune (−25 à −30 % de MRR au mois 24 pour un écart plausible) et se multiplient entre elles. Si les trois sont défavorables, le scénario prudent devient le scénario probable.

---

## 11. Renvois et documents à mettre à jour par leurs auteurs

- `STATUT.md`, hypothèses 3 et 5 : remplacer « ≥ 3 lettres d'intention à 149 € » et « CAC ≤ 1 500 à 1 700 € » par les critères des rangs 1 à 3 du § 10.
- `2-marche/acquisition.md` : plafonds de CAC du § 5.1 et objectifs exprimés en essais, en activation et en conversion.
- `2-marche/prix.md` et TAM/SAM en euros : à recalculer avec l'ARPA de 121 à 143 €.
- Phase 3 (`3-bilan/business-model.md`, `3-bilan/previsionnel.csv`) : prolonger la trajectoire à 36 mois avec les paramètres du § 9.1 et une rémunération explicite du fondateur.
- À sourcer : prix du VPS (`INFRA.md`), barème Mailjet, devis d'assurance et de comptable, coût de l'outil de commission, conditions de Solidatech, plateforme de facturation électronique.

*Prix exprimés hors taxes. Lanternis est une marque d'Hasteria SASU.*
