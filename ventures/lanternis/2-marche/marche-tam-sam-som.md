---
venture: lanternis
phase: 2 Marché
auteur: analyste-marche (v1) ; strategiste-marketing (v2, valorisation en euros et SAM)
date: 2026-10-26
version: 2
statut: brouillon
méthode: skill etude-marche-tam-sam-som (bottom-up, contrôle top-down)
---

> **Version 2 — 2026-10-26.** Changements :
> - Les **valeurs en euros** du TAM, du SAM et du SOM sont recalculées avec la **grille D** validée par le fondateur (revenu moyen du § 11.5 de [propositions-tarifs.md](propositions-tarifs.md)). Elles étaient calculées sur l'ancienne grille 149 / 249 / 399 €.
> - L'**exclusion des PME marchandes de 20 à 49 salariés** est rediscutée (§ 4.2) : elle reposait sur le coût de la vente directe, que le fondateur a abandonnée le 2026-10-26.
> - **Inchangé :** tous les comptages sourcés (§ 2), les parts « sans DSI » (H), le nombre de clients du SOM (§ 5) et les sources.
> - La v1 du 2026-10-25 reste consultable dans l'historique Git.

# Lanternis : taille de marché (TAM / SAM / SOM)

> **Règle de lecture.** Chaque chiffre externe est sourcé (URL, consultée le 2026-10-25). **(H)** = hypothèse non vérifiée. Les résultats calculés héritent du statut de leurs entrées : dès qu'une entrée est (H), le résultat est (H).
> **Positionnement mesuré (v2) :** registre de tout le SI pour PME et structures de l'ESS **sans DSI ni directeur technique**, en France, **vendu en libre-service** (essai d'un mois sans carte, grille D), cœur de cible de **20 à 99 personnes**, offre ouverte jusqu'à 499 ; remise ESS de 15 % ; aucun service humain inclus.

## 1. Synthèse

| Niveau | Définition | Structures | Valeur annuelle (logiciel seul, HT, grille D) | Statut |
|---|---|---|---|---|
| **TAM** | Toutes les PME et structures ESS de 20 à 249 personnes, en France, **sans DSI** | **≈ 75 350** | **≈ 96 M€/an** (≈ 79 M€ avec le mix du lancement) | Comptage sourcé × part « sans DSI » (H) × revenu grille D (H) |
| **SAM (v2, proposé)** | Le même périmètre : le libre-service rend les **PME de 20 à 49** accessibles (§ 4.2) | **≈ 75 350** | **≈ 96 M€/an** (≈ 79 M€) | (H) ; **à confirmer par le comité de décision** |
| SAM (v1, pour mémoire) | 50-249 sans DSI (PME + ESS) + ESS 20-49 sans DSI | ≈ 28 090 | ≈ 47 M€/an (≈ 39 M€) | (H) |
| **SOM (36 mois)** | Nombre de clients **inchangé** (60 à 100, central 80) ; sa base « capacité de vente directe » est devenue caduque (§ 5) | **60 à 100 clients** | **≈ 137 k€ d'ARR** (fourchette ≈ 87 à 172 k€) | (H) |

**Lecture :**
- Avec la grille D, la valeur du marché **baisse d'environ 40 %** (TAM : ≈ 155 → ≈ 96 M€) parce que le revenu par structure baisse. Le marché reste sans commune mesure avec le SOM (≈ 0,1 % du SAM v2 en nombre).
- **Signal important (H) :** si les clients ressemblaient au marché (74 % de structures de 20 à 49), le revenu net moyen serait d'environ **106 € par mois**, et non 143 € comme le suppose le § 11.5 de `propositions-tarifs.md` (qui suppose 30 % de clients de moins de 50 personnes). Sur le cœur de cible 20-99 seul, il serait d'environ **94 €**. À signaler à l'analyste-finance : les volumes d'essais nécessaires montent d'autant (`acquisition.md` § 4.3).
- Les vraies inconnues restent la **part sans DSI qui ressent la douleur** et la **volonté de payer** (voir `signaux-demande.md`).

## 2. Dénombrement des structures (données sourcées, inchangé)

### 2.1 Entreprises (hors ESS associative)
| Tranche (personnes occupées) | Nombre d'entreprises, France, 2023 | Source |
|---|---|---|
| 10 à 19 | 103 431 | Eurostat, `sbs_sc_ovw`, NACE B-S hors O et S94 |
| **20 à 49** | **53 704** | idem |
| **50 à 249** | **25 254** | idem |
| 250 et plus | 6 144 | idem |
| **Total 20 à 249** | **78 958** | calcul |

- Source : API Eurostat, https://ec.europa.eu/eurostat/api/dissemination/statistics/1.0/data/sbs_sc_ovw?format=JSON&lang=EN&geo=FR&indic_sbs=ENT_NR&nace_r2=B-S_X_O_S94&time=2023 (consultée le 2026-10-25). Valeurs 2022 très proches (53 311 et 24 998).
- **Contrôle INSEE :** l'Insee Focus n° 372 (10/12/2025) compte **174 614 PME hors microentreprises** en 2023 (champ marchand hors agriculture et finance) : https://www.insee.fr/fr/statistiques/8675639. Eurostat donne 182 389 entreprises de 10 à 249 personnes : même ordre de grandeur, l'écart vient des définitions (l'Insee combine effectif, chiffre d'affaires et bilan ; Eurostat compte les « personnes occupées », non-salariés compris).
- **Limites :** Eurostat ne sépare pas 50–99 et 100–249. Le champ exclut S94 (organisations associatives) ; la plupart des associations sont donc hors de ce comptage, mais une partie de l'ESS (coopératives, mutuelles, sociétés commerciales de l'ESS) y figure probablement **(H)**.

### 2.2 Structures employeuses de l'ESS
| Donnée | Valeur | Source |
|---|---|---|
| Entreprises employeuses de l'ESS | **146 806** (204 137 établissements) | Panorama de l'ESS 2026, Observatoire national de l'ESS / ESS France (Insee Flores 2022), relayé par Carenews le 15/09/2026 : https://www.carenews.com/carenews-info/news/268-millions-d-emplois-dans-l-ess |
| Salariés de l'ESS | 2,68 millions (13 % de l'emploi privé) ; associations : 2,1 millions (77 %) | idem |
| Associations employeuses | ≈ 153 000, 1,924 million de salariés | *La France associative en mouvement*, 23e éd., Recherches & Solidarités (oct. 2025), relayé par Jurisassociations : https://recherches-solidarites.org/wp-content/uploads/2025/11/JA726_vie_associative_france_mouvement.pdf |
| Part des associations parmi les établissements employeurs ESS | 83 % (Pays de la Loire) | Insee Analyses Pays de la Loire : https://www.insee.fr/fr/statistiques/8670614 |

**Répartition par taille : aucune donnée nationale trouvée.** Proxys régionaux (établissements, pas entreprises) :
| Territoire | < 10 salariés | 10 à 49 | 50 et plus | Source |
|---|---|---|---|---|
| Guadeloupe (Flores) | 76,3 % | 20,8 % | ≈ 2,9 % | Panorama ESS 2025 CRESS IG : https://www.rtes.fr/system/files/inline-files/Panorama%20ESS%20%282025%29%20%5BCRESS-IG%5D.pdf |
| Seine-Saint-Denis (Sirene 2024) | — | 710 / 3 297 = 21,5 % | 193 / 3 297 = 5,9 % | https://www.rtes.fr/system/files/inline-files/Chiffres%20cl%C3%A9s%20ESS%20SSD%202025.pdf |
| Nouvelle-Aquitaine (2018) | — | — | < 4 % (« plus de 96 % ont moins de 50 salariés ») | https://www.gironde.fr/sites/default/files/2018-08/panorama_2018_ESS_NA.pdf |

**Estimation ESS 20–249 (H) :**
- Part des 20–49 dans les 10–49 : 34 % dans l'économie marchande (53 704 / 157 135, Eurostat) → appliquée à l'ESS (H) : ≈ 21 % × 34 % ≈ 7 % des structures ; 50–249 : 3 à 6 % → **10 à 14 % des entreprises employeuses de l'ESS ont 20 à 249 salariés (H), central 12 %**.
- 146 806 × 12 % ≈ **17 600 structures ESS de 20 à 249 salariés (H)** (fourchette 14 700 à 20 500).
- **Dédoublonnage (H) :** pour ne pas recompter les coopératives et mutuelles déjà dans Eurostat, on ne garde que la part associative et fondations, soit 83 % (proxy Pays de la Loire) : **≈ 14 600 structures ESS « non marchandes » de 20 à 249 salariés (H)**.
- Contrôle de cohérence (H) : 17 600 structures × environ 60 salariés en moyenne (H) ≈ 1,06 million de salariés, soit environ 40 % de l'emploi de l'ESS. C'est compatible avec la Normandie, où 68 % des salariés de l'ESS travaillent dans des structures de 10 à 249 postes (https://evenements.normandie.fr/sites/default/files/2025-01/chiffres_ESS_conference_regionale_publication.pdf).
- Répartition ESS 20–49 / 50–249 : 65 % / 35 % (H, calquée sur le ratio marchand 68 / 32).

### 2.3 Part « sans DSI » (aucune source directe : hypothèse encadrée)
Aucune étude publique ne mesure la part des PME françaises **sans DSI ni directeur technique**. Proxys sourcés :
| Proxy | Valeur | Source |
|---|---|---|
| Sociétés de 20 à 249 personnes employant au moins un spécialiste TIC (2012) | **21 %** (10–19 : 8 % ; 250+ : 71 %) | Insee Résultats, enquête TIC 2012 : https://www.insee.fr/fr/statistiques/2016048 |
| Entreprises ayant recruté ou cherché à recruter un spécialiste TIC en 2024 | 10–49 : **5 %** ; 50–249 : **16 %** ; 250+ : 52 % | Insee, « Recrutements dans les métiers du numérique », 14/10/2025 : https://www.insee.fr/fr/statistiques/8616805 |
| Difficultés de recrutement parmi celles qui ont cherché | 10–49 : 60 % ; 50–249 : 54 % | idem |
| La majorité des PME-PMI confie la DSI à la direction administrative et financière, avec un responsable informatique opérationnel et des prestataires | qualitatif | Solutions Numériques (date non visible) : https://www.solutions-numeriques.com/?p=2308 |

**Hypothèses retenues :** sans DSI ni directeur technique = **88 % des 20–49** et **65 % des 50–249 (H)**. Raisonnement : 79 % des 20–249 n'employaient aucun spécialiste TIC en 2012 ; « avoir un technicien » ≠ « avoir un DSI », donc la part sans DSI est au moins aussi élevée ; elle baisse avec la taille (les offres d'emploi de responsable informatique viennent surtout des 50+, voir `signaux-demande.md`). **À mesurer en entretien** (grille de qualification, `script-interview.md`).

### 2.4 Structures cibles sans DSI (H)
| Segment | Structures | Part sans DSI (H) | Sans DSI (H) |
|---|---|---|---|
| PME 20–49 | 53 704 | 88 % | 47 260 |
| PME 50–249 | 25 254 | 65 % | 16 415 |
| ESS 20–49 | 9 490 | 88 % | 8 351 |
| ESS 50–249 | 5 110 | 65 % | 3 322 |
| **Total** | **93 558** | | **≈ 75 350** (75 348) |

## 3. Revenu annuel par structure avec la grille D (v2, tout en H)

### 3.1 Entrées reprises de `propositions-tarifs.md` § 11.2 et § 11.5
- **Grille D** (HT/mois, Essentiel / Pilotage / Pilotage+) : ≤ 49 : 49 / 99 / 199 € ; 50-99 : 79 / 159 / 289 € ; 100-149 : 109 / 219 / 379 € ; 150-199 : 139 / 279 / 469 € ; 200-249 : 169 / 339 / 559 €.
- **Mix des niveaux** : « cible » (Pilotage+ ouvert) 40 / 45 / 15 % ; « lancement » (deux niveaux) Essentiel 45 %, Pilotage 55 %.
- **Revenu net moyen par client du § 11.5** : **≈ 143 €/mois** (cible) et **≈ 121 €/mois** (lancement). Facteur net 0,893 : 40 % en annuel (−20 %), 30 % de clients ESS, remise ESS de 15 % non cumulable.
- Ce revenu moyen suppose une **répartition des clients par taille** de 30 % (≤ 49), 35 % (50-99), 20 % (100-149), 8 % (150-199), 7 % (200-249). Or le marché compte **74 % de structures de 20 à 49** (§ 2.4). D'où deux méthodes.

### 3.2 Méthode 1 : revenu moyen du § 11.5 appliqué à toutes les structures
- Cible : 143 € × 12 = **1 716 €/an** ; lancement : 121 € × 12 = **1 452 €/an**.
- Simple, mais **surestime** le marché : elle applique à des structures surtout petites un revenu calculé sur une clientèle plus grande.

### 3.3 Méthode 2 (retenue) : mêmes hypothèses du § 11.5, appliquées tranche par tranche
Revenu catalogue mensuel par tranche, pondéré par le mix des niveaux (calcul H) :

| Tranche | Cible (40/45/15) | Lancement (45/55) |
|---|---|---|
| 20-49 | 0,40 × 49 + 0,45 × 99 + 0,15 × 199 = **94,0 €** | 0,45 × 49 + 0,55 × 99 = **76,5 €** |
| 50-99 | **146,5 €** | **123,0 €** |
| 100-249 (pondéré 20 / 8 / 7 comme au § 11.5) | **232,0 €** | **198,7 €** |
| 50-249 (60 % de 50-99, 40 % de 100-249, H repris de la v1) | **180,7 €** | **153,3 €** |

Contrôle : avec la répartition par taille du § 11.5, on retrouve 160,7 € (cible) et 135,6 € (lancement), soit exactement les revenus catalogue du § 11.5.

Facteurs nets (H) : **PME 0,92** (40 % en annuel à −20 %) ; **ESS 0,83** (le meilleur entre −15 % ESS et −20 % annuel, non cumulables ; valeur qui redonne le facteur moyen de 0,893 avec 30 % de clients ESS).

| Segment | Revenu annuel net, cible | Revenu annuel net, lancement |
|---|---|---|
| PME 20-49 | 94,0 × 0,92 × 12 ≈ **1 038 €** | ≈ **845 €** |
| PME 50-249 | 180,7 × 0,92 × 12 ≈ **1 995 €** | ≈ **1 692 €** |
| ESS 20-49 | 94,0 × 0,83 × 12 ≈ **936 €** | ≈ **762 €** |
| ESS 50-249 | 180,7 × 0,83 × 12 ≈ **1 800 €** | ≈ **1 527 €** |
| Pour mémoire, v1 (grille 149 / 249 / 399 €) | 1 645 / 3 411 / 1 398 / 2 899 € | — |

- **Services exclus du TAM** : aucun service humain n'est inclus dans l'offre ; les éventuels services facultatifs (séance de démarrage, revue annuelle, plafonnés à 4 créneaux par mois, non tranchés) sont négligeables et non comptés.
- Les structures de 250 à 499 personnes, désormais servies en libre-service, **ne sont pas comptées** (hors du périmètre mesuré en v1 ; à ajouter si le comité le souhaite, comptage Eurostat « 250 et plus » non ventilé).

## 4. Calcul du TAM et du SAM (H)

### 4.1 Valorisation

| Segment | Sans DSI | Méthode 2, cible | Méthode 2, lancement | Méthode 1, cible (1 716 €) | SAM v1 | **SAM v2 (proposé)** |
|---|---|---|---|---|---|---|
| PME 20–49 | 47 260 | **49,1 M€** | 39,9 M€ | 81,1 M€ | non | **oui** |
| PME 50–249 | 16 415 | **32,7 M€** | 27,8 M€ | 28,2 M€ | oui | oui |
| ESS 20–49 | 8 351 | **7,8 M€** | 6,4 M€ | 14,3 M€ | oui | oui |
| ESS 50–249 | 3 322 | **6,0 M€** | 5,1 M€ | 5,7 M€ | oui | oui |
| **TAM** (75 348 structures) | | **≈ 95,6 M€** | **≈ 79,1 M€** | ≈ 129,3 M€ (lancement : ≈ 109,4 M€) | | |
| **SAM v1** (28 088 structures) | | ≈ 46,6 M€ | ≈ 39,2 M€ | ≈ 48,2 M€ | | |
| **SAM v2** (75 348 structures) | | **≈ 95,6 M€** | **≈ 79,1 M€** | ≈ 129,3 M€ | | |
| Pour mémoire, v1 | | TAM ≈ 155 M€ ; SAM ≈ 77 M€ | | | | |

**Valeurs retenues : méthode 2.** TAM et SAM v2 ≈ **96 M€/an** (cible), ≈ **79 M€/an** au lancement. La méthode 1 est un plafond.

Revenu net moyen implicite par structure (méthode 2, cible) :
- **20 à 249 personnes** : 95,6 M€ ÷ 75 348 ÷ 12 ≈ **106 €/mois** ;
- **cœur de cible 20-99** (≈ 67 450 structures, en prenant 60 % des 50-249 en 50-99, H) : ≈ 75,7 M€, soit ≈ **94 €/mois**.

### 4.2 L'exclusion des PME de 20 à 49 salariés ne tient plus

**Rappel de la v1 (décision du 2026-10-25).** Les PME marchandes de 20 à 49 sortaient du SAM : un panier de 1 645 €/an ne supportait pas un CAC de vente directe d'environ 1 580 € (plafond ≈ 960 €). Elles n'étaient qu'un marché de contenus entrants.

**Ce qui a changé le 2026-10-26 (décisions du fondateur) :**
1. **Il n'y a plus de vente directe.** Le CAC de référence n'est plus celui de la prospection (≈ 1 450 à 1 730 €), mais celui des canaux automatisés : ≈ 700 à 900 € la 1re année, ≈ 250 à 450 € à maturité (`propositions-tarifs.md` § 11.5, H).
2. **Le canal « contenus entrants » de la v1 est devenu le canal principal** (blog SEO, autodiagnostic, essai), précisément celui qui convenait aux 20-49.
3. **Le fondateur fixe le cœur de cible à 20-99 personnes.** Exclure les 20-49 marchandes du SAM contredirait directement cette cible.

**L'économie unitaire sur ce segment (H)** :
- revenu net ≈ 86 €/mois (94,0 × 0,92) ;
- coûts variables ≈ 13 € (hébergement, facturation, Stripe, 0,15 h de support) ;
- contribution ≈ 73 €, donc CAC maximal ≈ **880 €** pour un remboursement en 12 mois ;
- en Essentiel à 49 € seul : ≈ **430 €**.

Le CAC automatisé à maturité (250 à 450 €) passe sous ces deux plafonds. Celui de la 1re année (700 à 900 €) est **juste** pour le mix et **trop élevé** pour Essentiel seul.

**Proposition (H, à confirmer par le comité de décision) :**
- **réintégrer les PME de 20 à 49 dans le SAM**. Le SAM v2 couvre alors tout le TAM en nombre : ≈ 75 350 structures, ≈ 96 M€/an ;
- **conditions** : activation sans aucun humain (risque du « cockpit vide », R1) ; un CAC de 1re année tenu sous ≈ 900 € ; aucun rendez-vous individuel pour ce segment.

**Ce qui pourrait encore distinguer le SAM du TAM** (non quantifiable aujourd'hui, aucune source) :
- **la part des structures sous Google Workspace**, tant que D4 reporte le connecteur Google. Elles peuvent essayer avec l'import, mais sans alerte de compte orphelin automatique. À mesurer pendant les entretiens (`prix.md` § 5, question 8), puis pendant les essais ;
- l'**appétence pour le libre-service** des dirigeants de 20 à 49 (H).

**Conséquence pour `STATUT.md`** (à reporter par le directeur du studio) : la décision du 2026-10-25 (« PME marchandes de 20 à 49 exclues du SAM ») doit être revue au journal des décisions.

## 5. SOM à 36 mois (H)

- **Nombre de clients inchangé** (consigne de cette révision) : 60 à 100 clients actifs, central 80.
- **Attention :** ce nombre avait été dérivé de la **capacité de vente directe d'un fondateur** (≈ 23 h de vente par client, ≈ 3 signatures par mois). Cette base est **caduque** depuis le passage au libre-service. La contrainte devient le **volume d'essais** (≈ 18 essais par mois pour 10 k€ de MRR en 24 mois, `propositions-tarifs.md` § 11.5). Le nombre de clients du SOM est **à réestimer** par l'analyste-marche et l'analyste-finance.
- Repère : les objectifs du § 11.5 (70 clients pour 10 k€ de MRR à 24 mois ; 140 clients pour 20 k€ à 36 mois) dépassent la borne haute de ce SOM.

| | Revenu net par client et par an | ARR à 36 mois |
|---|---|---|
| **Central** : 80 clients, revenu moyen « cible » du § 11.5 (143 €/mois) | 1 716 € | **≈ 137 k€** |
| Bas : 60 clients, revenu « lancement » (121 €/mois) | 1 452 € | ≈ 87 k€ |
| Haut : 100 clients, revenu « cible » | 1 716 € | ≈ 172 k€ |
| Sensibilité : 80 clients ayant la même répartition par taille que le marché (≈ 106 €/mois, § 4.1) | ≈ 1 272 € | ≈ 102 k€ |
| Pour mémoire, v1 (ARPA 210 €/mois) | 2 520 € | ≈ 202 k€ |

- Part du SAM v2 : 80 / 75 348 ≈ **0,1 %** des structures.
- Revenu de services : aucun service inclus ; négligeable, non compté.

## 6. Contrôles top-down (fiabilité faible : à lire comme des ordres de grandeur)
| Contrôle | Donnée | Source | Lecture |
|---|---|---|---|
| Marché mondial du SaaS management | 4,58 Md$ en 2025 → 9,37 Md$ en 2030 (TCAC 15,4 %) | MarketsandMarkets : https://www.marketsandmarkets.com/Market-Reports/saas-management-market-215635254.html | Marché en croissance, mais toutes tailles d'entreprises confondues et surtout l'Amérique du Nord |
| Royaume-Uni, SaaS management | 310,4 M$ en 2025 → 597,7 M$ en 2030 | MarketsandMarkets UK : https://www.marketsandmarkets.com/Market-Reports/geography/saas-management-market/UK | Pour une économie de taille comparable à la France, notre TAM d'environ 96 M€ (v2) sur une niche (PME sans DSI, gouvernance SI + coût) reste d'un ordre de grandeur plausible (H) |
| Budget cybersécurité des TPE-PME | < 2 000 €/an pour les trois quarts | Baromètre Cybermalveillance.gouv.fr 2025 (OpinionWay, 588 entreprises de moins de 250 salariés), relayé par TPE Actu le 24/10/2025 : https://tpeactu.fr/2025/10/24/cybersecurite-les-tpe-pme-gagnent-en-maturite-mais-restent-fragiles/ | **v2 :** Essentiel ≤ 49 (588 €/an au catalogue) et Pilotage ≤ 49 (1 188 €/an) passent **sous** ce budget ; le signal d'alerte de la v1 (Essentiel à 1 645 €/an) est levé. Le risque inverse apparaît : un prix jugé trop bas (`prix.md` § 5.4) |
| Coût d'un responsable informatique interne en PME | 45 à 75 k€ brut/an (offres d'octobre 2026) | HelloWork : https://www.hellowork.com/fr-fr/emplois/82433859.html ; https://www.hellowork.com/fr-fr/emplois/84330801.html | **v2 :** Pilotage de 100 à 249 personnes (2 628 à 4 068 €/an au catalogue) ≈ 3,5 à 9 % d'un poste |
| DSI à temps partagé | 800 à 1 500 €/jour | Le Monde Informatique (date non visible, probablement ancien) : https://www.lemondeinformatique.fr/actualites/lire-l-avenir-du-dsi-passe-t-il-par-le-temps-partage-67793.html | 1 j/mois ≈ 9,6 à 18 k€/an : l'abonnement Lanternis se situe nettement en dessous |
| Dépenses IT des PME | ≈ 300 €/salarié (Idate, date inconnue) ; 4,7 % du CA (attribué à Gartner, non retrouvé) | https://www.lemondeinformatique.fr/actualites/lire-enquete-les-tpe-et-les-pme-poursuivent-leurs-efforts-d-investissement-dans-l-informatique-13336.html ; https://digitiz.fr/budget-it-pme/ | **Non fiable, non utilisé dans le calcul.** Aucune source récente sur les dépenses IT et SaaS des PME françaises n'a été trouvée |
| Dépense SaaS par salarié | médiane 9 455 $/salarié ; 36 % de licences inutilisées | Zylo, 2026 SaaS Management Index (29/01/2026) : https://zylo.com/news/2026-saas-management-index | Clients Zylo = grandes entreprises surtout américaines : **non transposable** aux PME françaises, mais montre l'ampleur du gaspillage de licences |

**Écart à expliquer :** les rapports top-down mesurent des outils de SaaS management achetés par des DSI ; Lanternis vise des structures **sans** DSI, un segment que ces rapports ne mesurent pas. Le contrôle valide l'existence d'une catégorie qui croît ; il ne valide pas la demande sur notre segment.

## 7. Tableau des sources
| Donnée | Valeur | Source | Date | Fiabilité |
|---|---|---|---|---|
| Entreprises 20–49 / 50–249, France, 2023 | 53 704 / 25 254 | Eurostat sbs_sc_ovw (API) | consultée 2026-10-25 | Élevée (champ marchand, personnes occupées) |
| PME hors MIC 2023 | 174 614 | Insee Focus 372, 10/12/2025 | 2026-10-25 | Élevée |
| Entreprises employeuses ESS | 146 806 | Panorama ESS 2026 via Carenews 15/09/2026 | 2026-10-25 | Moyenne (source secondaire d'une publication officielle) |
| Associations employeuses | ≈ 153 000 | Recherches & Solidarités, oct. 2025 | 2026-10-25 | Moyenne (extrait relayé) |
| Répartition ESS par taille | proxys régionaux | CRESS IG 2025, Sirene SSD 2024, Panorama NA 2018 | 2026-10-25 | **Faible (régional, établissements)** |
| Spécialistes TIC 20–249 | 21 % | Insee TIC 2012 | 2026-10-25 | Moyenne (ancien) |
| Recrutements TIC 2024 par taille | 5 % / 16 % / 52 % | Insee, 14/10/2025 | 2026-10-25 | Élevée |
| Part sans DSI | 88 % / 65 % | **Hypothèse** | — | À mesurer |
| Prix et revenu moyen (v2) | Grille D ; 121 à 143 €/mois net ; 845 à 1 995 €/an selon le segment | **Prix décidés** par le fondateur le 2026-10-26 ; mix, annuel, part ESS : **hypothèses** (`propositions-tarifs.md` § 11.2 et § 11.5) | 2026-10-26 | À tester |
| SaaS management, monde et Royaume-Uni | 4,58 Md$ ; 310 M$ | MarketsandMarkets | 2026-10-25 | Faible (cabinet commercial) |
| Budget cyber TPE-PME | < 2 000 € pour les 3/4 | Cybermalveillance 2025 via TPE Actu | 2026-10-25 | Moyenne à élevée |

## 8. Hypothèses à vérifier (par ordre d'impact)
1. **Part sans DSI par tranche** (88 % / 65 %) : grille de qualification de chaque entretien, et comptage sur 30 structures du vivier Tecnoo et de l'ESS.
2. **Répartition des clients par taille** (nouveau) : 30 % de moins de 50 personnes (§ 11.5) contre 74 % dans le marché. À mesurer sur les inscrits de la liste d'attente (champ « effectif »), puis sur les essais. Selon le résultat, le revenu moyen est de 106 ou de 143 €/mois, et le volume d'essais nécessaire varie d'environ un tiers.
3. **Répartition ESS par taille** : acheter ou demander à l'Observatoire national de l'ESS (ESS France) le tableau Flores national par tranche × famille juridique ; à défaut, requête Sirene (catégorie juridique 92xx × tranche d'effectif).
4. **Répartition 50–99 / 100–249** : fichier Insee Flores 2024 (https://www.insee.fr/fr/statistiques/8266010), tranches détaillées. Elle pèse davantage depuis que le cœur de cible est 20-99.
5. **Mix des niveaux et part en annuel** : à mesurer en entretien (palier choisi, `prix.md` § 5.3), puis sur les conversions.
6. **Part des structures sous Google Workspace** (D4) : seul filtre identifié entre TAM et SAM v2.
7. **Chevauchement Eurostat / ESS** : vérifier dans Sirene la part des coopératives et mutuelles de 20 à 249 salariés.
8. **SOM en nombre de clients** : à réestimer sur la base des volumes d'essais et non plus de la capacité de vente directe.
