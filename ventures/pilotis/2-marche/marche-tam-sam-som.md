---
venture: pilotis
phase: 2 Marché
auteur: analyste-marche
date: 2026-10-25
statut: brouillon
méthode: skill etude-marche-tam-sam-som (bottom-up, contrôle top-down)
---

# Pilotis : taille de marché (TAM / SAM / SOM)

> **Règle de lecture.** Chaque chiffre externe est sourcé (URL, consultée le 2026-10-25). **(H)** = hypothèse non vérifiée. Les résultats calculés héritent du statut de leurs entrées : dès qu'une entrée est (H), le résultat est (H).
> **Positionnement mesuré :** « DSI de poche » (logiciel SI + service) pour PME et structures de l'ESS de 20 à 250 salariés **sans DSI ni directeur technique**, en France, vente directe, remise ESS.

## 1. Synthèse

| Niveau | Définition | Structures | Valeur annuelle (logiciel seul, HT) | Statut |
|---|---|---|---|---|
| **TAM** | Toutes les PME et structures ESS de 20 à 249 personnes, en France, **sans DSI** | **≈ 75 000** | **≈ 155 M€/an** | Comptage sourcé × part « sans DSI » (H) × prix (H) |
| **SAM** | Segment visé par l'offre et le canal : structures **50–249 sans DSI** (PME + ESS) + **ESS 20–49 sans DSI** | **≈ 28 000** | **≈ 77 M€/an** | (H) |
| **SOM (36 mois)** | Capacité commerciale d'un fondateur en vente directe (voir § 5) | **60 à 100 clients** (central 80) | **≈ 150 à 250 k€ d'ARR** (central ≈ 200 k€) | (H) |

**Lecture :** le marché n'est pas le problème (le SOM central représente environ 0,3 % du SAM). Les vraies inconnues sont la **part sans DSI qui ressent la douleur** et la **volonté de payer** (voir `signaux-demande.md` : les budgets cyber des TPE-PME sont bas).

## 2. Dénombrement des structures (données sourcées)

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
| **Total** | **93 558** | | **≈ 75 350** |

## 3. Panier annuel (repris de `1-analyse/modele-revenus.md`, tout en H)
- Grille : Essentiel 149 € (20–49), Pilotage 249 € (50–99), Pilotage+ 399 € (100–250) HT/mois ; annuel −20 % ; remise ESS −15 %.
- Facteur annuel : 40 % des clients en annuel → × 0,92 (H).
- Panier annuel net hors ESS : 20–49 = 149 × 12 × 0,92 ≈ **1 645 €** ; 50–99 ≈ **2 749 €** ; 100–249 ≈ **4 405 €**.
- Répartition 50–99 / 100–249 non disponible chez Eurostat → 60 % / 40 % (H) ; panier moyen 50–249 ≈ **3 411 €**.
- ESS : × 0,85.
- ARPA de référence pour le SOM : **210 €/mois, soit 2 520 €/an (H)** (`modele-revenus.md` § 3).
- **Services exclus du TAM** (mise en place 490 à 990 €, état des lieux SI 1 500 à 3 000 €, DSI à temps partagé 300 à 1 200 €/mois ; tous H). Ils sont suivis à part, comme le prévoit `modele-revenus.md` § 7.

## 4. Calcul TAM et SAM (H)
| Segment | Sans DSI | Panier (€/an) | Valeur | TAM | SAM |
|---|---|---|---|---|---|
| PME 20–49 | 47 260 | 1 645 | 77,7 M€ | oui | non |
| PME 50–249 | 16 415 | 3 411 | 56,0 M€ | oui | oui |
| ESS 20–49 | 8 351 | 1 645 × 0,85 = 1 398 | 11,7 M€ | oui | oui |
| ESS 50–249 | 3 322 | 3 411 × 0,85 = 2 899 | 9,6 M€ | oui | oui |
| **Total** | | | | **≈ 155 M€/an (75 350 structures)** | **≈ 77 M€/an (28 088 structures)** |

**Pourquoi ce SAM :**
- Les 50–249 correspondent à la cible d'origine du fondateur (`reponses-fondateur.md`) et ont un SI assez complexe pour justifier Pilotage ou Pilotage+ (H).
- Les 20–49 de l'ESS restent dans le SAM parce que le canal ESS (réseaux, fédérations, remise) est explicite et peu coûteux à activer (H).
- Les PME marchandes de 20 à 49 sortent du SAM : un panier à 1 645 €/an ne supporte pas un CAC de vente directe d'environ 1 580 € (plafond ≈ 960 € sur Essentiel, `modele-revenus.md` § 6.2). Elles restent un marché de **contenus entrants**, pas de prospection.
- Couverture géographique : France entière, la vente à distance (visio) le permet (H) ; en pratique, le réseau Tecnoo et l'ESS régionale concentreront les premiers clients.

## 5. SOM à 36 mois (H)
- La capacité commerciale est la contrainte : environ 23 h de vente par client signé et 3 h d'onboarding (`modele-revenus.md` § 6.3).
- Le fondateur déclare que le temps « n'est pas une contrainte » (STATUT, 2026-10-25), mais aucune volumétrie n'est fournie (H).
- Scénario central : **80 clients actifs à 36 mois**, soit environ 110 signatures brutes avec un churn de 2 %/mois ; cela représente environ 3 signatures par mois et environ 70 h/mois de vente en fin de période. Fourchette : 60 à 100 clients.
- **ARR à 36 mois ≈ 80 × 2 520 ≈ 202 k€ (H)** ; fourchette 151 à 252 k€. Cela représente **0,3 % du SAM** en nombre de structures.
- Revenu de services en plus, non compté : par exemple 15 % des clients en DSI à temps partagé à 1 j/mois (H, `modele-revenus.md` § 7).

## 6. Contrôles top-down (fiabilité faible : à lire comme des ordres de grandeur)
| Contrôle | Donnée | Source | Lecture |
|---|---|---|---|
| Marché mondial du SaaS management | 4,58 Md$ en 2025 → 9,37 Md$ en 2030 (TCAC 15,4 %) | MarketsandMarkets : https://www.marketsandmarkets.com/Market-Reports/saas-management-market-215635254.html | Marché en croissance, mais toutes tailles d'entreprises confondues et surtout l'Amérique du Nord |
| Royaume-Uni, SaaS management | 310,4 M$ en 2025 → 597,7 M$ en 2030 | MarketsandMarkets UK : https://www.marketsandmarkets.com/Market-Reports/geography/saas-management-market/UK | Pour une économie de taille comparable à la France, notre TAM d'environ 155 M€ sur une niche (PME sans DSI, gouvernance SI + coût) reste d'un ordre de grandeur plausible (H) |
| Budget cybersécurité des TPE-PME | < 2 000 €/an pour les trois quarts | Baromètre Cybermalveillance.gouv.fr 2025 (OpinionWay, 588 entreprises de moins de 250 salariés), relayé par TPE Actu le 24/10/2025 : https://tpeactu.fr/2025/10/24/cybersecurite-les-tpe-pme-gagnent-en-maturite-mais-restent-fragiles/ | **Signal d'alerte :** Essentiel (1 645 €/an) équivaut au budget cyber total de la plupart des TPE-PME. Le prix doit se justifier par le coût du SI économisé, pas par la cyber seule |
| Coût d'un responsable informatique interne en PME | 45 à 75 k€ brut/an (offres d'octobre 2026) | HelloWork : https://www.hellowork.com/fr-fr/emplois/82433859.html ; https://www.hellowork.com/fr-fr/emplois/84330801.html | Pilotage+ (≈ 4 405 €/an) ≈ 6 à 10 % d'un poste ; argument de valeur pour les 50–249 |
| DSI à temps partagé | 800 à 1 500 €/jour | Le Monde Informatique (date non visible, probablement ancien) : https://www.lemondeinformatique.fr/actualites/lire-l-avenir-du-dsi-passe-t-il-par-le-temps-partage-67793.html | 1 j/mois ≈ 9,6 à 18 k€/an : l'offre hybride Pilotis se situe nettement en dessous |
| Dépenses IT des PME | ≈ 300 €/salarié (Idate, date inconnue) ; 4,7 % du CA (attribué à Gartner, non retrouvé) | https://www.lemondeinformatique.fr/actualites/lire-enquete-les-tpe-et-les-pme-poursuivent-leurs-efforts-d-investissement-dans-l-informatique-13336.html ; https://digitiz.fr/budget-it-pme/ | **Non fiable, non utilisé dans le calcul.** Aucune source récente sur les dépenses IT et SaaS des PME françaises n'a été trouvée |
| Dépense SaaS par salarié | médiane 9 455 $/salarié ; 36 % de licences inutilisées | Zylo, 2026 SaaS Management Index (29/01/2026) : https://zylo.com/news/2026-saas-management-index | Clients Zylo = grandes entreprises surtout américaines : **non transposable** aux PME françaises, mais montre l'ampleur du gaspillage de licences |

**Écart à expliquer :** les rapports top-down mesurent des outils de SaaS management achetés par des DSI ; Pilotis vise des structures **sans** DSI, un segment que ces rapports ne mesurent pas. Le contrôle valide l'existence d'une catégorie qui croît ; il ne valide pas la demande sur notre segment.

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
| Paniers et ARPA | 1 645 à 4 405 €/an ; 210 €/mois | **Hypothèse** (`modele-revenus.md`) | — | À tester |
| SaaS management, monde et Royaume-Uni | 4,58 Md$ ; 310 M$ | MarketsandMarkets | 2026-10-25 | Faible (cabinet commercial) |
| Budget cyber TPE-PME | < 2 000 € pour les 3/4 | Cybermalveillance 2025 via TPE Actu | 2026-10-25 | Moyenne à élevée |

## 8. Hypothèses à vérifier (par ordre d'impact)
1. **Part sans DSI par tranche** (88 % / 65 %) : grille de qualification de chaque entretien, et comptage sur 30 structures du vivier Tecnoo et de l'ESS.
2. **Répartition ESS par taille** : acheter ou demander à l'Observatoire national de l'ESS (ESS France) le tableau Flores national par tranche × famille juridique ; à défaut, requête Sirene (catégorie juridique 92xx × tranche d'effectif).
3. **Répartition 50–99 / 100–249** : fichier Insee Flores 2024 (https://www.insee.fr/fr/statistiques/8266010), tranches détaillées.
4. **Paniers** : tests de prix en entretien (voir `script-interview.md`) ; si l'ARPA tombe à 150 €, le SAM baisse d'environ 30 % et le SOM en euros d'autant.
5. **Chevauchement Eurostat / ESS** : vérifier dans Sirene la part des coopératives et mutuelles de 20 à 249 salariés.
