---
venture: pilotis
phase: 2 Marché
auteur: analyste-concurrence
date: 2026-10-25
statut: brouillon
skills: benchmark-concurrentiel, analyse-prix
---

# Benchmark concurrentiel — Lanternis (« DSI de poche »)

> **Règle de lecture.** Toutes les sources ont été consultées le **2026-10-25** (liste numérotée en fin de document, renvoi [n]). **(H)** = hypothèse ou jugement de l'analyste, non vérifié. Les prix sont ceux affichés par l'éditeur sauf mention « tiers » (comparateur, blog, annuaire), à considérer comme indicatifs. Le détail chiffré des prix et la recommandation tarifaire sont dans [prix.md](prix.md).
>
> **Positionnement testé :** un « DSI de poche » pour les PME et structures de l'ESS de 20 à 250 salariés **sans DSI** : référentiel SI (actifs, licences et abonnements SaaS, contrats, fournisseurs, sécurité, arrivées et départs), alertes pour un dirigeant non technicien, coût du SI ; modèle hybride logiciel + service (DSI à temps partagé). Prix pressentis 149 / 249 / 399 € HT/mois.

## 0. Ce qu'il faut retenir

1. **Personne ne vise exactement « le dirigeant non technicien d'une PME/ESS de 20 à 250 salariés ».** Les outils existants s'adressent soit à un **technicien** (GLPI, Snipe-IT, Freshservice, Lansweeper, JumpCloud), soit à une **équipe IT/achats de scale-up** (Zluri, Torii, Productiv, Vertice, Beamy), soit à un **dirigeant, mais sur la finance** (Pennylane, Agicap, Fathom).
2. **Le concurrent le plus dangereux est français et finance-tech : Primo** (MDM + gestion des SaaS + achat de matériel, pas de minimum sous 100 salariés [17]). Mais c'est un outil d'**exécution IT** (enrôler, configurer, provisionner), pas un outil de **pilotage et d'arbitrage** pour un dirigeant ; prix et hébergement non publiés.
3. **Le vrai concurrent reste le statu quo** : le prestataire informatique (infogérance) + un Excel, ou rien. Le prestataire est aussi le **meilleur canal potentiel** (H).
4. **Espace libre défendable** : registre SI + alertes en français, lisibles par un non-technicien, hébergé en France, à prix forfaitaire par structure, **adossé à un service humain** (diagnostic, DSI à temps partagé) — ce qu'aucun éditeur logiciel ne fait et que les DSI à temps partagé font sans outil.

## 1. Tableau comparatif synthétique

Légende type : **D** = direct (même tâche, même cible), **I** = indirect (même tâche, autre cible ou autre angle), **S** = substitut.

| # | Acteur | Famille | Type | Cible réelle | Prix d'entrée relevé | Langue FR | Hébergement / origine | Faiblesse exploitable |
|---|---|---|---|---|---|---|---|---|
| 1 | GLPI Network (Teclib') | Parc / ITSM | I | Services informatiques, techniciens | 19 € HT/agent/mois (cloud public) [1] | Oui | France, OVHcloud [1] | Interface datée, configuration difficile [5] ; rien pour un dirigeant |
| 2 | Snipe-IT (Grokability) | Parc | I | Admin IT, inventaire matériel | 39,99 $/mois (hébergé Basic) [2] | Partielle (H) | Éditeur US ; région d'hébergement non indiquée [2] | Installation et mises à jour lourdes en auto-hébergé [6] ; pas de SaaS ni contrats orientés coûts (H) |
| 3 | Freshservice (Freshworks) | ITSM / ITAM | I | Équipes IT de PME-ETI | 19 $/agent/mois en annuel (Starter) [3] | Oui (H) | US (Freshworks) ; région UE possible (H, non vérifié) | Prix jugé trop élevé par des petites structures, rapports faibles [7] |
| 4 | Lansweeper | Découverte / inventaire | I | DSI, parcs ≥ 2 000 actifs | Prix « Custom » ; tiers : ≈ 199 €/an (G2) à ≈ 219 $/mois (ancien) [4] | Non (H) | Belgique (H) | Pensé pour des parcs volumineux et des techniciens (H) |
| 5 | JumpCloud | Plateforme IT PME | I | PME avec un admin IT | 3 $/utilisateur/mois (gestion des licences SaaS) ; 3 $ (gestion des actifs) ; 9 $ (MDM), annuel, HT [8] | Partielle (H) | US | Facturé par utilisateur ; suppose un administrateur (H) |
| 6 | Zluri | Gestion SaaS | I | Scale-ups, ETI | Sur démonstration [9] ; tiers : 4 à 8 $/utilisateur/mois [10] | Non (H) | US/Inde (siège à Milpitas, CA) [9] | Orienté identité/gouvernance (IGA) ; aucun prix public |
| 7 | Torii | Gestion SaaS | I | Entreprises ≥ 50-200 salariés aux dépenses SaaS élevées | Sur démonstration [11] | Non (H) | US / Israël (H) | Raisonne en dépenses SaaS > 500 k$ [12] ; hors budget PME (H) |
| 8 | Productiv | Gestion SaaS | I | Grands comptes (500 à 7 000+ salariés) | Sur devis ; tiers : médiane ≈ 50 k$/an [13] | Non | US | Totalement hors cible |
| 9 | Vertice | Achats SaaS / négociation | I | Finance et achats, dépenses SaaS ≥ 250 k$ | Sur devis ; tiers : ≈ 30 k$/an au premier palier [14] | Non | Royaume-Uni (H) | Hors budget PME |
| 10 | Cledara | Gestion SaaS + cartes | **D partiel** | PME 25 à 150+ salariés | Basic 100 £/mois (gratuit si 10 applis payées via ses cartes) [15] | Non (H) | Royaume-Uni | Anglophone, centré dépenses/cartes ; modules IT et conformité à 150 £/mois chacun [15] |
| 10b | **Corma** | Gestion SaaS + accès (FR) | **D partiel** | PME (cible déclarée de la levée) [38] | Essential dès 3 € par utilisateur/mois, engagement annuel ; freemium jusqu'à 10 applis ; jusqu'à −50 % pour les moins de 50 utilisateurs [39] | Oui (site FR) [39] | Paris ; « EU Data Residency » affichée [39] | Périmètre SaaS et droits d'accès seulement : ni matériel, ni contrats et fournisseurs hors SaaS, ni service humain (H) ; facturé par utilisateur |
| 11 | Beamy | Gouvernance du portefeuille applicatif | I | Grands groupes (Veolia, BNP Paribas…) [16] | Sur démonstration [16] | Site en anglais [16] | France (siège) ; hébergement non indiqué [16] | Hors cible PME |
| 12 | LicenceOne / Saasdesk / Substly | Gestion SaaS PME | **D partiel** | PME | Non publié [18][19] | LicenceOne, Saasdesk : FR (H) | Non vérifié | Notoriété faible ; périmètre limité aux SaaS (H) |
| 13 | **Primo** | Plateforme IT PME (FR) | **D** | PME/scale-ups, MSP ; pas de minimum < 100 salariés [17] | « Tarification à l'usage, facturation annuelle », non publiée [17] | Oui | France (siège) ; pays d'hébergement non indiqué ; SOC 2 Type II [17] | Outil d'exécution IT (MDM, provisioning), pas de pilotage dirigeant ni de contrats et fournisseurs hors SaaS (H) ; profil startup tech, pas ESS (H) |
| 14 | Fleet | Matériel en location + MDM (FR) | I | Startups, scale-ups, agences [20] | Non publié ; tiers : ≈ 750 €/mois pour 20 postes, matériel inclus [21] | Oui | France (siège) ; hébergement non indiqué [20] | Matériel uniquement, pas de SaaS ni de contrats [20] |
| 15 | DSI à temps partagé (cabinets, freelances) | Service | **D (service)** | PME sans DSI | 700 à 1 400 €/jour selon séniorité [24] ; 800 à 1 500 €/jour (2017) [23] | Oui | — | Pas d'outil : le savoir part avec la personne (H) ; prix élevé rapporté à 1 j/mois |
| 16 | Pennylane | Pilotage financier | S (finance) | TPE/PME | Grilles indépendants 7 à 79 € HT/mois ; TPE et PME sur devis [27] | Oui | France | Ne couvre pas le SI ; tableaux de bord avancés sur offre haute [28] |
| 17 | Agicap | Trésorerie | S (finance) | PME, ETI | Sur devis, engagement 12 mois [29] ; tiers : 99 à 799 € HT/mois [30] | Oui | France | Trésorerie seule ; pas de SI |
| 18 | Fathom | Reporting financier | S (finance) | Cabinets comptables (portefeuilles) | 450 $/mois pour 25 entreprises (Pro) [31] | Non | Australie (H) | Connecteurs Xero/QuickBooks/MYOB, pas d'écosystème FR [31] |
| 19 | Prestataire informatique / infogérance | Statu quo | S | Toutes PME | 50 à 75 €/poste/mois en couverture complète (estimation tierce) [25] ; jusqu'à 50 €/salarié/mois [22] | Oui | Local | Juge et partie (vend ce qu'il conseille) (H) ; pas de vue de pilotage pour le dirigeant (H) |
| 20 | Excel / Google Sheets / rien | Statu quo | S | Toutes | 0 € de licence | Oui | — | Pas d'alerte, dépend d'une personne, obsolète au premier départ (H) |
| — | Solidatech (ESS) | Programme associatif | Partenaire / substitut partiel | Associations | Inscription gratuite ; 300+ offres logiciels/matériels à prix réduits [32][33] | Oui | France | Diagnostic et remises, pas d'outil de suivi continu (H) |

**Acteurs cités dans la commande mais non retenus :** « Hiboo » est une plateforme de données pour engins de chantier (BTP), sans rapport avec l'informatique des PME [34] ; « Stack » et « Wizz » n'ont pas pu être identifiés comme plateformes IT pour PME (la recherche renvoie vers Wiz, sécurité cloud des grands comptes). **À préciser par le fondateur** s'il pensait à d'autres noms.

---

## 2. Détail par famille

### 2.1 Gestion de parc et ITSM (GLPI, Snipe-IT, Freshservice, Lansweeper, JumpCloud)

| | GLPI Network | Snipe-IT | Freshservice | Lansweeper | JumpCloud |
|---|---|---|---|---|---|
| **Cible** | Services informatiques ; logiciel libre très répandu en France (H) | Admin IT qui veut un inventaire matériel | Équipes IT de PME-ETI (seuls ≈ 18 % des avis G2 viennent de structures ≤ 50 salariés [7]) | DSI, parcs de plusieurs milliers d'actifs (paliers de 1 000 à 2 000 actifs) [4] | PME avec un admin IT (identité, appareils) |
| **Fonctionnalités clés** | Inventaire, tickets, contrats, licences, fournisseurs, CMDB (H) | Actifs, licences, affectations, étiquettes | Tickets, ITAM (100 unités d'actifs dans l'offre Growth), catalogue [3] | Découverte réseau, inventaire automatique, risques (H) | MDM, SSO/MFA, gestion des licences SaaS, gestion des actifs [8] |
| **Prix** | Cloud public 19 € HT/agent/mois, dès 1 agent ; cloud privé 21 €, min. 25 agents ; auto-hébergé avec support : 100 à 4 500 €/mois [1] | Hébergé 39,99 $ / 99,99 $ / 249,99 $ par mois [2] | 19 / 49 / 99 $ par agent/mois en annuel ; Enterprise sur devis [3] | « Custom » officiel ; tiers contradictoires [4] | 3 à 13 $ par utilisateur/mois selon module, HT [8] |
| **Langue / hébergement** | FR ; OVHcloud, sauvegardes Acronis (Strasbourg), archives Scaleway (Paris) [1] | Anglais ; région non indiquée [2] | Multilingue (H) ; paiement possible en EUR [3] | Anglais (H) | Anglais (H), US |
| **Avis : forces** | Gratuit, riche, simple côté utilisateur final [5] | Gratuit en auto-hébergé, peu de maintenance une fois installé [6] | Note 4,6/5 (1 342 avis G2), prise en main rapide [7] | — (pages d'avis inaccessibles) | — (non relevé) |
| **Avis : plaintes** | Interface « datée », réglages durs à trouver, personnalisation qui demande du PHP [5] | Installation difficile, mises à jour lourdes, compétences serveur requises [6] | Prix hors budget pour une petite structure, rapports natifs faibles, champs d'actifs peu personnalisables [7] | — | — |
| **Faiblesse exploitable par Lanternis** | Aucun écran pour un dirigeant ; il faut un technicien pour l'alimenter (H) | Matériel seulement, pas de coûts ni de contrats (H) | Tarif par agent IT : sans service IT interne, la métrique n'a pas de sens (H) | Surdimensionné | Suppose un administrateur et facture par utilisateur |

**Lecture :** ces outils sont **bon marché par licence** (19 €/agent) mais exigent quelqu'un qui sache s'en servir. Pour une PME sans DSI, ils sont l'outil **du prestataire**, pas du dirigeant. **GLPI est un allié possible** (import/export, connecteur) plutôt qu'un concurrent frontal (H).

### 2.2 Gestion des SaaS et des licences (Zluri, Torii, Productiv, Vertice, Cledara, acteurs français)

| | Zluri | Torii | Productiv | Vertice | Cledara | Beamy | LicenceOne / Saasdesk / Substly |
|---|---|---|---|---|---|---|---|
| **Cible** | Scale-ups/ETI (clients cités : Tripledot, Guesty) [9] | Seuils évoqués de 50, 100, 200 salariés ; alerte quand les dépenses SaaS dépassent 500 k$ [12] | 500 à 7 000+ salariés [13] | Finance, achats, IT [14] | 25-50 salariés (Basic), 51-150 (Premium), 151+ (Pro) [15] | Grands groupes [16] | PME (déclaratif) [18][19] |
| **Fonctionnalités** | Découverte SaaS, IGA, revues d'accès [9] | Découverte, renouvellements, licences, IA [11] | Usage, optimisation | Négociation et achats SaaS, économies garanties [14] | Cartes virtuelles par appli, renouvellements, modules IT et conformité [15] | Cartographie du portefeuille, scores d'usage [16] | Alertes de renouvellement, détection de factures SaaS via Google/Microsoft (Saasdesk) [18] |
| **Prix** | Sur démo [9] ; tiers 4-8 $/utilisateur/mois [10] | Sur démo [11] | Médiane tierce ≈ 50 k$/an [13] | Tiers ≈ 30 k$/an au premier palier [14] | 100 £/mois (Basic) ; modules 150 £/mois chacun ; membres actifs supplémentaires 5 £/mois [15] | Sur démo [16] | Non publiés |
| **Langue / hébergement** | Anglais, US [9] | Anglais | Anglais, US | Anglais | Anglais, UK | Anglais (site) [16] ; société française | Non vérifié |
| **Avis** | — | — | — | — | 4,6/5 (249 avis G2) ; reproche : manque de transparence sur les paliers [26] | — | Substly 5,0 (160 avis Appvizer) [19] |
| **Faiblesse exploitable** | Prix et complexité grands comptes | Hors budget PME (H) | Hors cible | Hors cible | Ne couvre ni matériel, ni contrats non-SaaS, ni arrivées/départs complets (H) ; anglophone | Hors cible | Périmètre SaaS seul ; notoriété faible (H) |

**Corma (ajout du 2026-10-25)** : société parisienne fondée en 2023, 3,5 M€ levés en amorçage en décembre 2025 (XTX Ventures, Kima Ventures…), fonds destinés notamment à l'expansion commerciale auprès des PME [38]. Produit : visibilité sur l'usage des logiciels, termes de licence et droits d'accès via des agents de navigateur ; intégrations Google Workspace et Microsoft Entra ID ; détection du shadow IT, saisie des données financières (Essential) ; revues d'accès, provisioning, catalogue d'applis, 200+ intégrations (Pro) [38][39]. Prix : Essential **dès 3 € par utilisateur/mois** en annuel ; Pro sur démo ; Enterprise sur devis dès 1 000 utilisateurs ; freemium limité à 10 applis ; administrateurs illimités [39]. Économies revendiquées « jusqu'à 20 % » (déclaratif éditeur) [38]. Avis : 4,8/5 sur Gartner revendiqué par l'éditeur [38], non vérifié. **Faiblesse exploitable** : outil de gouvernance SaaS pour un responsable IT ou un office manager, qui ne couvre ni le matériel, ni les contrats télécom, imprimantes ou maintenance, ni les fournisseurs non SaaS, ni l'accompagnement (H).

**Lecture :** la gestion des SaaS est un marché **grands comptes** (ticket 30 à 50 k$/an), sauf **Corma** (français, PME, prix public dès 3 €/utilisateur, données en UE) et **Cledara** (100 £/mois, cible 25-150 salariés) qui est le **seul concurrent direct de prix et de cible** sur le volet « abonnements » — mais anglophone, orienté cartes de paiement, sans matériel ni contrats. Les acteurs français PME (LicenceOne, Saasdesk) existent mais restent peu visibles ; **à creuser en entretiens** (sont-ils cités ?).

### 2.3 Plateformes informatiques pour PME (Primo, Fleet, MSP)

| | Primo | Fleet | MSP / infogérance |
|---|---|---|---|
| **Cible** | PME et scale-ups ; aucun minimum sous 100 salariés ; offre aussi pour MSP [17] ; ≈ 300 clients en 2023 [22] | Startups, scale-ups, agences ; « 2 000+ équipes IT » revendiquées [20] | Toutes PME |
| **Fonctionnalités** | MDM multi-OS, gestion des SaaS (provisioning, SSO, licences inutilisées, alertes de renouvellement), achat/leasing, IA pour tickets [17] | Location ou achat (200+ produits), MDM, arrivées/départs via SIRH (HiBob, Personio, BambooHR), support Slack [20] | Support, sauvegarde, antivirus, serveurs |
| **Prix** | Non publié, « à l'usage », annuel [17] | Non publié ; tiers ≈ 750 €/mois pour 20 postes, matériel inclus [21] | 50 à 75 €/poste/mois, couverture complète (tiers) [25] ; « jusqu'à 50 €/salarié/mois » [22] |
| **Hébergement** | Non indiqué ; SOC 2 Type II, DPA [17] | Non indiqué ; ISO 27001 et SOC 2 revendiqués [20] | — |
| **Avis** | Témoignages éditeur seulement (Skello, Faume) [22] ; pas d'avis indépendants trouvés | Aucun avis sur Secret [21] | — |
| **Faiblesse exploitable** | Outil d'exécution pour un responsable IT ou un « office manager tech » (H) ; pas de registre des contrats, fournisseurs, coûts globaux ; culture startup (SIRH HiBob/Personio), pas ESS (H) | Matériel seulement | Juge et partie ; pas de tableau de bord pour le dirigeant ; information détenue par le prestataire (H) |

**Lecture :** Primo est **la menace n° 1** : française, financée (3,2 M€ en série A [22]), qui vise les PME et pourrait ajouter une vue « dirigeant ». Mais ses clients cités (Skello 380 salariés, Dalma, Innovafeed) sont des scale-ups tech, pas des PME traditionnelles ni l'ESS (H). Lanternis doit rester **à côté** : pilotage, contrats, fournisseurs, coûts et service humain, pas MDM.

### 2.4 DSI à temps partagé (cabinets et freelances)

| Repère | Valeur | Source |
|---|---|---|
| DSI à temps partagé, fourchette journalière | 800 à 1 500 €/jour | Le Monde Informatique, **30 mars 2017** (ancien, non sourcé par l'auteur) [23] |
| Management de transition, confirmé (4-8 ans) | 700 à 900 €/jour | Freelance-Solution, mise à jour octobre 2026 (agrégat de Malt, Free-Work, IndepNet…) [24] |
| Management de transition, expert (9 ans et +) | 900 à 1 400 €/jour | idem [24] |
| Consultant IT / chef de projet SI, expert | 750 à 1 000 €/jour | idem [24] |
| Cybersécurité (proche RSSI), confirmé / expert | 650-850 / 850-1 200 €/jour | idem [24] |
| Responsable informatique freelance (estimations Indeed, 7 à 16 offres) | ≈ 404 à 553 €/jour | Indeed via recherche [35] |
| Exemple individuel : profil « DSI » sur Malt | 790 €/jour | Malt (via moteur de recherche ; page inaccessible directement) [36] |
| Format | de plusieurs jours par semaine à 1 jour par mois, sans terme fixé | [23] |

- **Cible :** PME sans DSI, souvent où le rôle informatique est tenu par le dirigeant ou le RAF [37].
- **Forces :** conseil indépendant, arbitrages, feuille de route, relation de confiance (H).
- **Faiblesses exploitables :** **pas d'outil** (chaque DSI à temps partagé arrive avec ses tableurs) ; à 700 €/jour et plus, une journée par mois coûte 700 à 1 400 €/mois, hors de portée d'une structure de 20 à 50 salariés (H) ; la connaissance part avec l'intervenant (H).
- **Lecture :** c'est **le service que Lanternis peut industrialiser** : l'outil réduit le temps de l'intervenant (registre prérempli, alertes), donc permet une demi-journée par mois là où il en faudrait une à deux. Les DSI à temps partagé indépendants sont **aussi un canal** (revendeurs ou utilisateurs de Lanternis) (H).

### 2.5 Tableaux de bord financiers (Pennylane, Agicap, Fathom)

| | Pennylane | Agicap | Fathom |
|---|---|---|---|
| **Cible** | Indépendants, TPE, PME [27] | PME, ETI, multi-sociétés [29] | Cabinets comptables (portefeuilles de 25 à 100+ entreprises) [31] |
| **Fonctionnalités** | Compta, facturation, prévisionnel de trésorerie, tableaux de bord personnalisés (offre haute) [27][28] | Trésorerie, connectivité bancaire, dépenses, poste client [29] | Reporting et analyse financière [31] |
| **Prix** | Indépendants 7 / 14 / 24 / 79 € HT/mois ; TPE et PME sur devis [27] | Sur devis, engagement 12 mois [29] ; tiers 99 à 799 € HT/mois [30] | Pro 450 $/mois pour 25 entreprises ; Portfolio 67 $/mois pour 100 [31] |
| **Langue / hébergement** | FR, éditeur français | FR, éditeur français | Anglais ; connecteurs Xero, QuickBooks, MYOB, FreeAgent, Excel [31] |
| **Avis** | 4,4/5 sur Trustpilot (654 avis) ; bugs ponctuels, support perfectible sur les cas complexes, dépendance à l'expert-comptable [28] | — | — |
| **Faiblesse exploitable** | Ne voit le SI que comme des lignes de dépenses (H) | Idem | Idem, et pas d'écosystème FR |

**Lecture :** **substituts, pas concurrents**, depuis le recentrage SI. Ils sont surtout des **sources de données** : Pennylane/Qonto permettent de détecter les abonnements SaaS payés (connecteurs MVP). Risque à surveiller : Pennylane ajoute une catégorisation « logiciels » à ses tableaux de bord (H).

### 2.6 Statu quo (Excel, prestataire informatique, rien)

| Alternative | Ce que ça fait | Coût | Pourquoi ça « suffit » (H) | Pourquoi ça casse (H) |
|---|---|---|---|---|
| **Excel / Google Sheets** | Liste du matériel et des abonnements | 0 € de licence | Rien à acheter, rien à apprendre | Jamais à jour ; aucune alerte ; illisible au premier départ de la personne qui le tenait |
| **Prestataire informatique** | Dépannage, sauvegardes, parfois inventaire dans son propre outil (souvent GLPI ou un RMM) | 50 à 75 €/poste/mois en couverture complète (tiers) [25] ; taux horaire ≈ 65 € HT (2024, tiers) [25] | « C'est son métier » | Les données appartiennent de fait au prestataire ; pas de vue coûts/contrats ; conflit d'intérêts sur les recommandations d'achat |
| **Rien** | — | 0 € | Pas de problème visible tant qu'il n'y a pas d'incident | Facture surprise, compte d'ancien salarié actif, renouvellement tacite raté |
| **ESS : programmes associatifs** (Solidatech, DLA numérique) | Autodiagnostic, accompagnement de 6 mois, remises logiciels/matériels [32][33] | Inscription gratuite [32] ; DLA peut financer des diagnostics [33] | Gratuit ou subventionné | Ponctuel, pas de suivi continu (H) |

**Lecture :** c'est **l'alternative à battre**. Le déclencheur d'achat sera un **incident** (départ, cyberattaque, facture), une **obligation** (NIS2, assurance cyber, audit du financeur dans l'ESS) ou un **changement de prestataire** (H, à tester en entretien).

---

## 3. Carte de positionnement

**Axe horizontal : à qui parle l'outil ?** de « technicien IT » (gauche) à « dirigeant non technicien » (droite).
**Axe vertical : quelle couverture ?** de « un seul objet » (bas : matériel seul, SaaS seuls, finance seule) à « tout le SI + service humain » (haut).

```
                        Couverture SI complète + service humain
                                        ▲
   DSI à temps partagé ·                |              ┌──────────────────────┐
   (service, sans outil)                |              │   ESPACE LIBRE       │
                                        |              │   >>> PILOTIS <<<    │
        Prestataire / MSP ·             |              │ registre SI + alertes│
                                        |              │ + DSI temps partagé  │
   GLPI ·   Freshservice ·              |              └──────────────────────┘
   Lansweeper ·                Primo ·  |
   JumpCloud ·                          |
 Technicien IT ◄────────────────────────┼──────────────────────────► Dirigeant non technicien
                                        |
   Snipe-IT ·    Zluri · Torii ·        |   Corma · Cledara ·
   Fleet ·       Productiv · Vertice ·  |   LicenceOne / Saasdesk ·      Pennylane ·
                 Beamy ·                |                                Agicap · Fathom ·
                                        |   Excel / rien ·              (finance seule)
                                        ▼
                         Un seul objet (matériel, SaaS ou finance)
```

Placement qualitatif de l'analyste **(H)**, fondé sur les cibles et fonctionnalités relevées en § 2.

**Seconde lecture (souveraineté × prix pour une PME de 50 salariés) :**

| | Hébergement France démontré | Hébergement non indiqué / hors UE |
|---|---|---|
| **< 300 €/mois** | GLPI cloud [1] (mais pour technicien) — Corma (« EU Data Residency », pays non précisé ; ≈ 150 €/mois à 50 utilisateurs [39]) — **Lanternis (cible)** | Snipe-IT [2], Cledara [15], JumpCloud (≈ 300 $/mois pour licences SaaS + actifs à 50 utilisateurs [8]) |
| **> 300 €/mois ou sur devis** | — | Primo [17], Fleet [20], Zluri, Torii, Productiv, Vertice, Freshservice avec ITAM (H) |

Le carré « hébergé en France + prix forfaitaire < 300 €/mois + écran pour dirigeant » reste **vide** : GLPI y figure pour un autre utilisateur, et Corma s'en approche (données en UE, prix bas) mais en facturant à l'utilisateur et sur les seuls SaaS.

### Top 3 des concurrents menaçants (réévalué après l'ajout de Corma)
1. **Primo** : plateforme IT pour PME la plus large (MDM, SaaS, matériel) [17].
2. **Corma** : remplace Cledara dans le top 3. Il est français, financé, vise explicitement les PME, publie un prix bas (dès 3 €/utilisateur/mois) et met en avant des données en UE [38][39]. Il prend le volet « licences et abonnements » de Lanternis et pourrait s'étendre aux arrivées et départs (déjà provisioning en Pro).
3. **Le prestataire informatique** (statu quo + Excel/GLPI) [25].

Cledara passe en 4e : même périmètre que Corma, mais anglophone et plus cher.

---

## 4. Angles différenciants défendables

Chaque angle est relié à une plainte ou une limite **relevée** (source) ; sa valeur d'achat reste à tester en entretien.

| # | Angle | Plainte / limite constatée | Pourquoi c'est défendable | Statut |
|---|---|---|---|---|
| 1 | **Écrit pour un dirigeant, pas pour un technicien** : vocabulaire métier, 12-15 indicateurs, alertes en clair (« 3 comptes d'anciens salariés encore actifs », « contrat X reconduit dans 45 jours ») | GLPI : interface datée, réglages introuvables [5] ; Freshservice : rapports faibles [7] ; Snipe-IT : compétences serveur requises [6] | Les outils IT s'adressent à des agents IT et facturent par agent [1][3] ; changer de cible leur coûterait leur base (H) | Douleur à confirmer (H) |
| 2 | **Prix forfaitaire par structure, publié** | Cledara : manque de transparence des paliers [26] ; Zluri, Torii, Productiv, Vertice, Primo, Fleet, Agicap : prix non publiés [9][11][13][14][17][20][29] ; Freshservice trop cher pour les petits [7] | Grille publique HT + remise ESS = argument de confiance et de cycle de vente court (H) | À tester (Van Westendorp, cf. prix.md) |
| 3 | **Logiciel + humain** : diagnostic SI, puis DSI à temps partagé outillé (½ à 1 j/mois) | DSI à temps partagé sans outil, 700 à 1 400 €/j [24] ; éditeurs sans service ; « cockpit vide » identifié en phase 1 | Combinaison difficile à copier pour un éditeur financé (marges de service faibles) comme pour un freelance (pas de logiciel) ; atout Tecnoo (H) | Organisation à trancher (Hasteria ou Tecnoo) |
| 4 | **Souveraineté et ESS** : hébergement OVH France, données minimales, interface et contrats en français, remise ESS | Hébergement non indiqué chez Primo, Fleet, Snipe-IT, Beamy [17][20][2][16] ; outils SaaS anglophones [9][15][16] | Argument d'achat crédible pour les associations et les financeurs publics (H) ; cohérent avec les valeurs du studio | Poids réel à mesurer (H) |
| 5 | **Neutralité vis-à-vis du prestataire** : le registre appartient à la structure ; le prestataire peut y contribuer | Prestataire juge et partie (H) ; données détenues par le MSP (H) | Peut devenir un canal : outil de reporting que le prestataire offre à ses clients (H) | À tester avec 3 prestataires |

## 5. Ce qu'il ne faut PAS essayer de battre

- **Le MDM et le déploiement de postes** (Primo, Fleet, JumpCloud, Intune) : se connecter à eux, pas les refaire.
- **Le ticketing / ITSM** (GLPI, Freshservice) : c'est l'outil du technicien ; prévoir un import GLPI plutôt qu'un helpdesk.
- **La découverte réseau automatique** (Lansweeper) : coûteuse à construire, utile surtout aux grands parcs.
- **L'optimisation SaaS grands comptes** (Zluri, Torii, Productiv, Vertice) : la PME n'a pas 500 k$ de dépenses SaaS [12].
- **Le pilotage financier** (Pennylane, Agicap) : les utiliser comme sources (détection des abonnements), pas comme cible.

## 6. Points ouverts et hypothèses à vérifier

1. **Primo** : prix réel, hébergement, présence dans les PME traditionnelles et l'ESS → demande de démo sous un profil neutre, ou question en entretien (« connaissez-vous Primo ? »).
2. **LicenceOne, Saasdesk** : pages tarifs inaccessibles ou vides lors du relevé ; à revérifier.
3. **Lansweeper, Malt** : pages bloquées (403) ; chiffres repris de résumés de moteur de recherche, à confirmer.
4. **Prestataires informatiques** : les fourchettes [25] viennent d'un blog de prestataire ; obtenir 2-3 devis réels via le réseau Tecnoo.
5. **Hiboo, Stack, Wizz** : non identifiés comme concurrents ; le fondateur pensait-il à d'autres acteurs ?
6. Aucun **avis client indépendant** n'a été trouvé sur Primo et Fleet : leur satisfaction réelle est inconnue.

---

## Sources (toutes consultées le 2026-10-25)

1. GLPI Network, tarifs : https://www.glpi-project.org/tarifs ; FAQ cloud : https://help.glpi-project.org/faq/fr/glpi/cloud_vs_self-hosted
2. Snipe-IT, tarifs : https://snipeitapp.com/pricing
3. Freshservice, tarifs : https://www.freshworks.com/freshservice/pricing/
4. Lansweeper, tarifs : https://www.lansweeper.com/pricing/ (403 lors du relevé, contenu via moteur de recherche) ; G2 : https://g2crowd.com/products/lansweeper/pricing ; Capterra : https://www.capterra.com/p/126334/Lansweeper/reviews/3842802/
5. Capterra, avis GLPI : https://www.capterra.com/reviews/126254/GLPi
6. Capterra, avis Snipe-IT : https://www.capterra.com/p/150016/Snipe-IT/reviews/
7. G2, Freshservice : https://g2.com/products/freshservice/pricing ; Capterra : https://capterra.com/p/132997/Freshservice/reviews/ ; GetApp : https://www.getapp.com/it-management-software/a/freshservice/reviews/
8. JumpCloud, tarifs : https://jumpcloud.com/pricing
9. Zluri, tarifs : https://www.zluri.com/pricing
10. Spendbase, Zluri (tiers) : https://www.spendbase.co/vendors/zluri/
11. Torii, tarifs : https://www.toriihq.com/pricing
12. Torii, blog « minimum employees » : https://www.toriihq.com/articles/blog/minimum-employees-saas-management.txt
13. CostBench, Productiv (tiers, données Vendr) : https://www.costbench.com/software/vendor-management/productiv/
14. Vertice : https://www.vertice.one/pricing ; tiers : https://zoftwarehub.com/ar-ae/products/vertice/pricing , https://www.techimply.com/profile/vertice
15. Cledara, tarifs : https://www.cledara.com/pricing
16. Beamy : https://beamy.xyz/ ; Capterra : https://www.capterra.fr/software/211834/beamy
17. Primo, tarifs : https://www.getprimo.com/fr/tarifs
18. Tool-advisor, SaaS management FR : https://tool-advisor.fr/blog/saas-management ; Appvizer, Saasdesk : https://www.appvizer.fr/finance-comptabilite/gestion-abonnements/saasdesk ; GetApp, LicenceOne : https://www.getapp.fr/software/2067682/licenceone
19. Appvizer, Substly : https://www.appvizer.fr/services-informatiques/saas-management/substly
20. Fleet : https://www.fleet.co/fr/
21. Secret, Fleet : https://www.joinsecret.com/fr/fleet ; avis : https://www.joinsecret.com/fr/fleet/reviews
22. Le Monde Informatique, levée de Primo (2023) : https://www.lemondeinformatique.fr/actualites/lire-gestion-informatique-la-start-up-primo-leve-3-2-meteuro-90212.html ; cas client Skello : https://www.getprimo.com/customers/skello ; Faume : https://getprimo.com/customer-stories/faume
23. Le Monde Informatique, « L'avenir du DSI passe-t-il par le temps partagé ? » (30/03/2017) : https://www.lemondeinformatique.fr/actualites/lire-l-avenir-du-dsi-passe-t-il-par-le-temps-partage-67793.html
24. Freelance-Solution, TJM consultant 2026 (mise à jour octobre 2026) : https://www.freelance-solution.fr/tarif-freelance/tjm-consultant/
25. Copeps, tarifs maintenance informatique PME : https://copeps.fr/actualites/tarif-maintenance-informatique-pme/
26. G2, Cledara : https://www.g2.com/products/cledara ; Toolradar : https://toolradar.com/tools/cledara
27. Pennylane, tarifs : https://www.pennylane.com/fr/tarifs
28. Formalive, avis Pennylane : https://www.formalive.fr/avis-pennylane/ ; Clubic : https://www.clubic.com/avis-603655-avis-pennylane-2026.html
29. Agicap, tarifs : https://agicap.com/fr/tarifs/
30. Tool-advisor, Agicap : https://tool-advisor.fr/logiciel-tresorerie/agicap/ ; Impli : https://www.impli.fr/avis/agicap ; Comparateur e-facturation : https://comparateur-efacturation.fr/plateforme/agicap
31. Fathom, tarifs : https://www.fathomhq.com/pricing
32. AssoConnect, Solidatech : https://www.assoconnect.com/blog/articles/6803-solidatech-des-solutions-numeriques-a-tarifs-reduits ; Carenews : https://www.carenews.com/annuaire/solidatech
33. Recherches & Solidarités, interview DLA numérique : https://recherches-solidarites.org/wp-content/uploads/2026/07/JA741_dossier_transition-numerique_interview-BU.pdf
34. Frenchweb, Hiboo : https://www.frenchweb.fr/scale-hiboo-veut-optimiser-lusage-dengins-de-chantier-afin-de-reduire-les-emissions-inutiles-de-co2/446597
35. Indeed, salaires responsable informatique freelance : https://fr.indeed.com/cmp/Freelance.com-1/salaries/Responsable-Informatique , https://fr.indeed.com/cmp/Lehibou/salaries/Responsable-Informatique , https://fr.indeed.com/cmp/Emagine-Consulting/salaries/Responsable-Informatique
36. Malt, profil « DSI » : https://www.malt.fr/profile/dsi (403 lors du relevé, chiffre issu du moteur de recherche)
37. Journal du Net, responsable informatique à temps partagé : https://www.journaldunet.com/solutions/dsi/1123626-responsable-informatique-a-temps-partage-une-solution-encore-mal-connue/
38. Corma, levée de 3,5 M€ : https://tech.eu/2025/12/08/corma-raises-eur35m-to-advance-software-license-and-access-governance/ ; https://pulse2.com/corma-3-5-million-seed-funding/ ; https://vestbee.com/insights/articles/corma-raises-3-5-m
39. Corma, tarifs : https://www.corma.io/pricing
