---
venture: lanternis
phase: 2 Marché (révisé pour le pré-lancement 2b)
auteur: strategiste-marketing
date: 2026-10-26
version: 2
statut: brouillon
skills: messages-par-persona, landing-validation-waitlist, plan-de-lancement, rapport-marketing
---

> **Version 2 — 2026-10-26.** Réécriture après les décisions du fondateur du 2026-10-26 (journal de `STATUT.md`) :
> - vente **automatisée en libre-service**, le fondateur intervient très peu ;
> - **essai gratuit d'un mois sans carte** ;
> - **grille D** validée (§ 11 de `propositions-tarifs.md`) ;
> - **pas de LinkedIn** : blog et, éventuellement, Facebook ;
> - **cœur de cible de 20 à 99 personnes** ;
> - **aucun service humain inclus**.
>
> **Ce qui change par rapport à la v1 (2026-10-25, amendée le 26) :**
> - **retirés** : la vente directe (C1 réseau chaud comme canal de vente, C2 prospection sur déclencheurs), LinkedIn (C3), les clubs (CPME, MEDEF, CJD, BNI) et les webinaires en direct suivis de rendez-vous ;
> - la **prospection** ne sert plus qu'à obtenir des **entretiens de validation** avant le GO ;
> - les objectifs, les CAC et le calendrier sont recalculés.
>
> La v1 reste consultable dans l'historique Git.

# Lanternis : positionnement et acquisition (v2, libre-service)

> **Règle de lecture.**
> - **(H)** = hypothèse non vérifiée. **Tous les CAC, taux de conversion et volumes de ce document sont des calculs sur hypothèses** : aucune donnée de conversion n'existe pour cette cible.
> - Temps du fondateur valorisé à **60 €/h (H)** (`1-analyse/modele-revenus.md`).
> - Chiffres externes sourcés au § 10.
> - **Rien n'est publié ni envoyé.** Tout article, post, email groupé, mise en ligne ou campagne payante passe par la validation explicite de l'utilisateur (règle 2 de `CLAUDE.md`). Les demandes d'entretien individuelles relèvent du fondateur, après validation des règles de prospection par juriste-rgpd.

---

## 1. Positionnement

### 1.1 Phrase de positionnement (pour qui, contre quoi, pourquoi nous)

> **Pour les dirigeants et les DAF de PME et d'associations de 20 à 99 personnes qui n'ont pas de DSI, Lanternis est le registre de tout leur SI centré sur les personnes : qui a quoi, ce que ça coûte, ce qui expire, et des départs sans oubli. Contrairement au duo « prestataire + Excel » et aux outils qui ne gèrent que les abonnements SaaS, il est guidé pas à pas, conçu par un DSI, hébergé en France, avec un prix public dès 49 € HT par mois et un mois d'essai sans carte.**

- **Pour qui :** le dirigeant ou la DAF non technicien, de 20 à 99 personnes. L'offre reste ouverte en libre-service jusqu'à 499 personnes.
- **Contre quoi :** l'« informatique en boîte noire » (§ 1.2), c'est-à-dire le statu quo « prestataire + Excel, ou rien » (`benchmark.md` § 2.6), et la gestion des seuls SaaS (Corma, Cledara).
- **Pourquoi nous :**
  - tout le SI, et pas seulement les SaaS ;
  - un registre centré sur les personnes, avec des preuves de départ ;
  - un prix public par tranche ;
  - des bénévoles gratuits ;
  - un hébergement en France (prévu) ;
  - une conception par un DSI qui a 25 ans d'expérience (formulation à valider par le fondateur).
- **Changement de promesse :** « mis en place avec vous par un DSI » (v1) devient **« guidé pas à pas, conçu par un DSI »**, puisqu'aucun service humain n'est inclus. **À reprendre par brand-manager** (`marque/plateforme-de-marque.md`, `messages-par-persona.md`) **et par cro-conversion** (landing).

### 1.2 L'ennemi désigné : « l'informatique en boîte noire » (inchangé)

L'ennemi n'est **pas** le prestataire informatique : il devient même un **canal** (§ 2, prescripteurs). L'ennemi, c'est une informatique dont personne dans la structure n'a la carte :
- le savoir qui tient dans la tête d'une seule personne (S2 de `signaux-demande.md`) ;
- les abonnements payés par carte que personne ne voit (`tendances.md`) ;
- les comptes d'anciens salariés encore actifs (H).

Formulation de travail : **« Votre informatique ne doit pas être une boîte noire, ni pour vous, ni pour votre CA, ni pour votre assureur. »** (H, à tester)

### 1.3 Face aux alternatives

| Alternative | Notre différence (une ligne) | Prix de référence (`prix.md`) |
|---|---|---|
| Prestataire + Excel | La carte du SI appartient à la structure ; le prestataire y contribue comme invité | Infogérance 50 à 75 €/poste/mois [25] |
| Corma | Tout le SI, pas seulement les SaaS ; pensé pour une structure sans équipe IT | Dès 3 €/utilisateur/mois [39] ; Lanternis Pilotage : 1,36 à 4,95 €/personne selon la taille, sous 3 € à partir d'environ 55 personnes (H) |
| Cledara | En français, tout le SI, hébergé en France | 100 £/mois en entrée [15] |
| Primo | Lanternis ne configure pas les postes : il aide la direction à décider | Non publié [17] |
| DSI à temps partagé | Le registre reste quand l'intervenant part ; « moins d'une heure de DSI par mois » | 700 à 1 400 €/jour [24] |

**Point d'attention :** Primo et Corma ont une offre pour les prestataires informatiques (MSP). Le canal « prescripteurs » est déjà travaillé par deux concurrents mieux financés.

### 1.4 Une promesse par persona (recentrée sur 20-99)

| Persona | Promesse (H, à tester) | Offre d'entrée |
|---|---|---|
| **P1 Marc**, dirigeant de PME (cœur : 20 à 99 personnes) | « Quand votre référent informatique part, votre SI reste. Vous savez ce que vous avez, ce que vous payez et ce qui expire, sans recruter. » | Autodiagnostic, puis essai d'un mois ; Pilotage de 99 à 159 € HT/mois |
| **P2 Nadia**, DAF d'association (cœur : 20 à 99 salariés) | « Présentez à votre CA un SI maîtrisé et chiffré, données hébergées en France, bénévoles gratuits, tarif associatif. » | Contenus relayés par les réseaux ESS, puis essai ; remise ESS de 15 % |
| P3 Sophie, office manager | « Plus d'accès oublié au départ d'un salarié. » | Pas de canal propre : c'est souvent **elle qui fera l'essai**. L'onboarding doit lui parler, les emails de conversion doivent parler au dirigeant (H) |

Les fiches de `personas.md` (P1 sur 50-150, P2 sur 60-200) sont à recentrer par l'analyste-marche ; elles ne sont pas modifiées ici.

---

## 2. Canaux d'acquisition : 3 prioritaires, 1 en test, 1 marginal

### 2.1 Choix

| Rôle | Canal | Pourquoi |
|---|---|---|
| **Prioritaire 1** | **Blog SEO et autodiagnostic SI → essai** | Seul canal qui touche le cœur 20-99 à grande échelle sans temps du fondateur ; décision de canal du 2026-10-26 ; contenus produits par les agents |
| **Prioritaire 2** | **Réseaux ESS en *one-to-many*** (CRESS, fédérations, Le Mouvement associatif) **+ Solidatech** | P2 est concentrée dans des réseaux qui diffusent ; Solidatech revendique plus de 45 000 associations inscrites (S11, offre d'emploi de juin 2026) ; aucune vente individuelle |
| **Prioritaire 3** | **Prestataires prescripteurs** avec **commission automatique** | Le prestataire voit l'outil chez un client (prestataire invité, M11) et le recommande à d'autres : boucle d'invitation ; aucun vendeur |
| En test | **Facebook** (page, puis éventuellement publicité ciblée associations) | Pertinence ESS plausible, non démontrée ; stratégie de test de 6 semaines déjà prête (`marketing/facebook/strategie-facebook-v0.md`) |
| Mécanisme de conversion (pas un canal) | **Essai d'un mois sans carte** + parrainage après le lancement | Convertit le trafic de tous les canaux ; parcours décrit au § 11.4 de `propositions-tarifs.md` |
| **Marginal** | **Prospection directe** (email et téléphone, individuels) | Sert **uniquement** à obtenir 12 à 15 **entretiens de validation** avant le GO. Aucune démonstration ni proposition commerciale |

**Retirés :**
- C1 comme canal de vente : le réseau Tecnoo et le réseau du fondateur restent une **source d'entretiens** et, après le lancement, de prescription ;
- C2 prospection sur déclencheurs ;
- C3 LinkedIn ;
- C5 clubs (CPME, MEDEF, CJD, BNI) : pas de vente en salle sans rendez-vous derrière ;
- C9 webinaires propres en direct : remplacés par des **webinaires enregistrés** diffusés par les relais ESS.

### 2.2 Fiche par canal (H)

| Canal | Mécanisme | Cible | Coût récurrent (H) | Délai avant effet (H) | CAC 1re année (H) | CAC à maturité (H) | Principal risque |
|---|---|---|---|---|---|---|---|
| **SEO et autodiagnostic** | 2 articles par mois produits par les agents, ≈ 2 h de validation chacun ; autodiagnostic en 10 questions qui renvoie vers l'essai | P1, P2 | ≈ 240 €/mois | 6 à 12 mois (domaine neuf) | 400 à 800 € | 100 à 200 € | Volumes de recherche **non mesurés** (`signaux-demande.md` § 3) |
| **Réseaux ESS + Solidatech** | Tribune ou article dans la lettre d'un relais (≈ 3 h), webinaire de 30 min **enregistré** et rediffusé, lien `?public=ess` vers l'essai ; référencement Solidatech | P2 | ≈ 6 h/mois, soit 360 € | 3 à 6 mois (calendriers des relais) | 300 à 750 € | 200 à 400 € | Accès aux relais non vérifié ; conditions Solidatech inconnues (coût probable : remise ou commission) |
| **Prestataires prescripteurs** | Programme en libre-service : lien de recommandation, **commission automatique de 20 % pendant 12 mois** (≈ 340 € sur 143 €/mois ; ≈ 120 € sur 49 €) ; le prestataire invité découvre l'outil chez un client | P1, P2 | Commission seule + ≈ 2 h/mois | 4 à 9 mois | 350 à 450 € | ≈ 350 € | Outil de commission non choisi (Stripe Connect ou plateforme d'affiliation, **coût non sourcé**) ; conflit d'intérêts ; Primo et Corma |
| **Facebook** (test) | 2 posts par semaine pendant 6 semaines, puis 1 par semaine au rythme du blog ; publicité ciblée seulement après le lancement, **sur validation** | P2 surtout | ≈ 1 à 2 h/semaine, soit 260 à 520 €/mois | 1 à 3 mois | Inconnu | Inconnu | Les DAF ne lisent peut-être pas de contenus de gestion sur Facebook |
| Essai d'un mois | Onboarding guidé, 7 emails de cycle de vie au plus, prolongation de 15 jours | Toutes | ≈ 6 € de support par essai | Dès l'ouverture | ≈ 30 € (5 essais par client) + coût du trafic | idem | Le « cockpit vide » (R1) sans aide humaine |
| Parrainage | Un mois offert au parrain et au filleul | Clients | 1 mois de revenu de part et d'autre | Après 20 clients | 150 à 290 € | idem | Faible volume au début |
| Prospection pour entretiens | ≈ 30 demandes individuelles pour 12 à 15 entretiens | Validation | ≈ 20 h une fois, soit ≈ 1 200 € | Immédiat | **Coût de validation**, hors CAC | — | Recrutement lent hors réseau du fondateur |

Sources des CAC : § 11.5 de `propositions-tarifs.md` (même jeu d'hypothèses : conversion d'un essai en client de 20 %, 0,1 h de support par essai).

---

## 3. CAC tolérable et CAC estimé

### 3.1 Plafonds par offre (remboursement en 12 mois ; H)

Coûts variables par client et par mois : 2 € d'hébergement et d'emails, 0,50 € de facturation électronique, Stripe ≈ 2,2 % + 0,25 € (cas carte, barème sourcé au § 10), 0,15 h de support (9 €).

| Offre et tranche | Prix net (H) | Contribution | **CAC maximal en 12 mois** | Canaux compatibles |
|---|---|---|---|---|
| Essentiel ≤ 49, mensuel | 49 € | ≈ 36 € | **≈ 430 €** | SEO à maturité, ESS à maturité, parrainage, prescripteurs (commission proportionnelle) |
| Essentiel ≤ 49, annuel ou ESS | 39,20 à 41,65 € | ≈ 27 à 29 € | **≈ 320 à 350 €** | SEO et parrainage à maturité seulement |
| Essentiel 50-99 | 79 € | ≈ 65 € | ≈ 790 € | Tous les canaux automatisés |
| Pilotage ≤ 49 | 99 € | ≈ 85 € | **≈ 1 020 €** | Tous |
| Pilotage 50-99 | 159 € | ≈ 144 € | ≈ 1 725 € | Tous |
| **Moyenne, lancement** (121 € net) | | ≈ 107 € | **≈ 1 190 €** | (le plus serré entre 12 mois et LTV/CAC ≥ 3 à 3 % de churn, § 11.5) |
| **Moyenne, cible** (143 € net) | | ≈ 129 € | **≈ 1 430 €** | idem |

### 3.2 CAC moyen estimé (H)

Pondération par la répartition des essais du § 4.2 (40 % SEO, 28 % ESS, 17 % prescripteurs, 5 % Facebook plafonné à 430 €, 10 % parrainage et direct) :
- **1re année, coûts variables seuls** : (7 × 600 + 5 × 525 + 3 × 400 + 1 × 430 + 2 × 220) ÷ 18 ≈ **≈ 495 €** ; **avec les coûts fixes de lancement** répartis sur peu de clients (contenus, vidéos d'onboarding, autodiagnostic) : **≈ 700 à 900 €** (§ 11.5) ;
- **à maturité** : (7 × 150 + 5 × 300 + 3 × 350 + 1 × 430 + 2 × 220) ÷ 18 ≈ **≈ 250 €**, dans la fourchette de 250 à 450 € du § 11.5.

**Lecture :**
1. **Le CAC moyen tient largement sous le plafond moyen** (≈ 1 190 à 1 430 €), même la 1re année. Remboursement ≈ 7 à 8 mois la 1re année, ≈ 2 à 4 mois à maturité.
2. **Les clients Essentiel ≤ 49 (≈ 320 à 430 €) ne sont rentables qu'à maturité des canaux.** La 1re année, ils sont subventionnés par les clients Pilotage. Il ne faut **aucune dépense payante ciblée sur ce seul segment** avant que le SEO ait pris.
3. **Le risque n'est plus le CAC, c'est le volume** (§ 4).

---

## 4. Volumes nécessaires

### 4.1 Entonnoir inversé pour 10 k€ de MRR en 24 mois (H, scénario « cible » du § 11.5)

| Étape | Volume | Hypothèse |
|---|---|---|
| Clients actifs | **70** | 143 € net par client |
| Souscriptions brutes sur 24 mois | ≈ 87, soit **≈ 3,6 par mois** | Churn de 2 % par mois |
| Essais | **≈ 18 par mois** | Conversion essai → payant de 20 % |
| Essais activés | ≈ 9 par mois | Activation ≥ 50 % sous 14 jours |
| Visiteurs qualifiés de la page de tarifs | **≈ 600 par mois** | Visiteur → essai de 3 % |

**Profil dans le temps (H) :**
- **1re année** : ≈ 14 essais par mois en moyenne, liste d'attente comprise (≈ 33 souscriptions, ≈ 30 clients) ;
- **2e année** : ≈ 22 essais par mois (≈ 52 souscriptions, pour atteindre 70 clients). Les deux années font ≈ 18 essais par mois en moyenne.

### 4.2 Répartition des 18 essais par mois, en régime (2e année, H)

| Canal | Essais par mois | Ce qu'il faut en amont (H) |
|---|---|---|
| SEO et autodiagnostic | 7 | ≈ 230 visiteurs de la page de tarifs venant du blog, soit ≈ 2 300 visites organiques par mois si 10 % du blog passe par la page de tarifs (H) ; ou ≈ 70 autodiagnostics complétés si 10 % passent à l'essai (H) |
| Réseaux ESS + Solidatech | 5 | ≈ 1 parution ou rediffusion par mois chez un relais ; fiche Solidatech active |
| Prestataires prescripteurs | 3 | ≈ 12 prestataires actifs qui recommandent chacun ≈ 3 essais par an |
| Facebook | 1 | Page active ; publicité éventuelle si son CAC reste ≤ 430 € |
| Parrainage, bouche-à-oreille, accès direct | 2 | ≥ 30 clients |
| **Total** | **18** | |

### 4.3 Sensibilités (H)

| Si… | Alors… |
|---|---|
| Les clients ressemblent au marché (74 % de 20-49), revenu ≈ 106 € net (`marche-tam-sam-som.md` § 4.1) | ≈ 95 clients pour 10 k€, ≈ 118 souscriptions, **≈ 25 essais par mois** |
| Le cœur 20-99 domine (≈ 94 € net) | ≈ 107 clients, **≈ 28 essais par mois** |
| La conversion de l'essai tombe à 10 % | **≈ 36 essais par mois** (à 143 €) |
| Le churn monte à 3 % | ≈ 100 souscriptions sur 24 mois, ≈ 21 essais par mois |

**Conséquence :** l'objectif réaliste se situe entre **18 et 28 essais par mois**. Pour le tenir, le SEO doit apporter au moins 40 % du volume ; c'est le pari principal. Il faut le vérifier au plus tôt avec la Search Console (§ 6).

---

## 5. Plan par phase et objectifs mesurables

| Phase | Période (H) | Canaux actifs | Objectifs (H, à valider par l'utilisateur) |
|---|---|---|---|
| **Validation** (pré-lancement) | 26 oct. → 18 déc. 2026 (8 semaines), puis entretien de la liste d'attente jusqu'à l'ouverture | Entretiens (prospection marginale), SEO et autodiagnostic, relais ESS et Solidatech, prestataires, Facebook en test | § 6 : 12 à 15 entretiens ; ≥ 80 inscrits qualifiés ; ≥ 3 structures pilotes engagées par écrit |
| **Lancement** (ouverture de l'essai) | Après le GO et ≈ 15 à 19 semaines de développement (`propositions-tarifs.md` § 11.6) ; vers le printemps 2027 si le GO est donné en janvier (H) | Liste d'attente, SEO, relais ESS, programme prescripteurs ouvert, Facebook si le test est concluant | M1 : ≥ 20 essais (≥ 25 % de la liste d'attente) ; activation ≥ 50 % sous 14 jours ; conversion ≥ 20 % ; **M3 : ≥ 10 clients payants, MRR ≥ 1,2 k€** ; part Pilotage ≥ 55 % ; ≤ 1 demande de support pour 4 essais |
| **Croissance** | M4 à M24 après l'ouverture | Réallocation mensuelle vers le meilleur CAC ; parrainage dès 20 clients ; publicité Facebook ciblée **seulement sur validation** et si CAC ≤ 430 € | **M12 : ≥ 30 clients, MRR ≥ 4 k€** ; **M24 : 70 clients, MRR ≥ 10 k€** ; 18 à 28 essais par mois ; CAC moyen ≤ 900 € (1re année) puis ≤ 450 € ; churn ≤ 2 % par mois ; temps du fondateur hors développement ≤ 27 h par mois à 10 k€ |

---

## 6. Pré-lancement : objectifs revus (8 semaines, du 26 octobre au 18 décembre 2026)

**Ce que le pré-lancement doit prouver avant le GO :**
1. un **signal de demande vérifiable** (éliminatoire de la grille GO/NO-GO) : des entretiens, des inscrits qualifiés et des engagements ;
2. que **les canaux automatisés répondent** (au moins un relais ESS, au moins quelques prestataires) ;
3. que **la liste d'attente suffira à lancer** : avec 80 inscrits qualifiés et 25 % de passage à l'essai (H), on obtient ≈ 20 essais le premier mois, soit le volume cible.

**Prérequis bloquants** (`STATUT.md`) : réserver le domaine, vérifier l'antériorité du nom, faire relire les pages légales par un avocat, configurer les DNS de Mailjet, et faire valider le déploiement o2switch par le fondateur. **Si la landing n'est pas en ligne au début de S3 (9 novembre), les objectifs « en ligne » sont décalés d'autant** ; les entretiens n'en dépendent pas.

### 6.1 Objectifs par canal et critères d'arrêt

| Canal | Objectifs à 8 semaines (H) | Critère d'arrêt ou de bascule |
|---|---|---|
| **Entretiens de validation** (prospection marginale) | ≈ 30 demandes individuelles (réseau du fondateur et Tecnoo, relais ESS, prestataires, inscrits volontaires) → **12 à 15 entretiens** (≥ 8 dans le cœur 20-99, ≥ 3 ESS, ≥ 2 de 100 à 249) **+ 3 entretiens de prestataires** ; questions de prix de `prix.md` § 5 ; **≥ 60 % d'intention d'essai ferme** parmi les douleurs avérées ; **≥ 3 structures pilotes engagées par écrit** (essai dès l'ouverture, souscription à ≥ 99 € si le registre tient ses promesses) | **< 6 entretiens fin S4** : recruter via les inscrits de la liste et les relais ESS. **0 engagement après 8 entretiens à douleur avérée** : le problème est l'offre, pas le canal → remonter au comité |
| **SEO et autodiagnostic** | Plan éditorial v1 (cœur 20-99, sans LinkedIn) ; **6 articles validés** (2 existants + 4) et publiés après validation ; autodiagnostic en ligne en S3 ; Search Console active ; **≥ 40 % des inscrits complètent l'autodiagnostic** ; ≥ 10 inscrits venus des contenus ou en accès direct | Pas d'arrêt à 8 semaines (canal lent). **Point de décision à 6 mois après la mise en ligne** : < 500 visites organiques par mois (H) → passer à 1 article par mois et réallouer vers ESS et prescripteurs |
| **Réseaux ESS + Solidatech** | **8 relais sollicités** (2 CRESS, Nexem, Fehap, Uniopss, Le Mouvement associatif, Associathèque, Solidatech) → **≥ 1 diffusion d'ici S6** (article, lettre, webinaire enregistré) → **≥ 30 inscrits ESS** ; conditions de référencement Solidatech **obtenues par écrit** (coût, remise, commission) | **0 relais après 8 sollicitations** : l'ESS passe par le SEO et Facebook seulement, et la part de clients ESS (30 %, H) est revue |
| **Prestataires prescripteurs** | 10 prestataires contactés ; 3 entretiens ; **≥ 3 prestataires partagent l'autodiagnostic** avec leurs clients (lien `?ref=`) → **≥ 10 inscrits** ; ≥ 2 acceptent d'être prestataires invités chez une structure pilote | **0 prestataire prêt à recommander sur 5 entretiens** : programme de commission reporté après le MVP ; le canal reste la boucle d'invitation seule |
| **Facebook** (test de 6 semaines, S3 à S8) | Règle de `strategie-facebook-v0.md` § 5 : **≥ 8 inscrits qualifiés** venus de Facebook, ou ≥ 2 conversations menant à un entretien, ou ≥ 1 relais ; temps ≤ 2,5 h par semaine | ≤ 2 inscrits qualifiés, aucune conversation et aucun relais, ou temps > 3 h par semaine → page en vitrine minimale |

### 6.2 Objectifs globaux du pré-lancement

| Indicateur | Objectif à 8 semaines (H) | Lien avec la décision |
|---|---|---|
| Entretiens de validation | **12 à 15** + 3 prestataires | `script-interview.md` § 1 |
| Intention d'essai ferme (date ou personne désignée) | **≥ 60 %** des entretiens à douleur avérée | Remplace les lettres d'intention à ≥ 149 € (hypothèse 3 de `STATUT.md`, à mettre à jour) |
| Structures pilotes engagées par écrit | **≥ 3**, souscription envisagée à ≥ 99 € | Signal de demande vérifiable |
| Palier médian choisi en entretien | **≥ Pilotage** | Valide le mix « cible » (`prix.md` § 5.5) |
| « Trop bon marché » au-dessus du prix de la tranche | **≤ 30 %** des interviewés | Risque de prix bas |
| **Inscrits qualifiés** (20 à 499 personnes, rôle de décideur ou de prescripteur) | **≥ 80**, dont **≥ 50 % dans le cœur 20-99** | Volume du premier mois d'essai |
| Répartition indicative des 80 inscrits (H) | ESS et Solidatech 30 ; entretiens et réseau du fondateur 15 ; prestataires 10 ; Facebook 10 ; SEO et accès direct 15 | Mesure l'apport de chaque canal (paramètre `utm_source` ou `?ref=`) |
| Autodiagnostic complété | **≥ 40 %** des inscrits | Intérêt réel au-delà de l'inscription |
| Conversion de la landing (visiteur → inscrit) | **≥ 5 %** (H, à affiner avec cro-conversion) | Qualité du message |
| Part des inscrits sous Google Workspace | À mesurer (champ du formulaire, si le fondateur l'accepte) | Réexamen de D4 au-delà de 25 % (H) |
| Temps du fondateur | **≤ 8 h par semaine**, journalisé (entretiens ≈ 20 h au total, validation des contenus, relais) | Hypothèse « intervient très peu » |
| MRR | **0 €** (aucune vente avant le GO) | — |

`2-marche/validation.md` (journal des résultats réels) devra reprendre ces objectifs : sa ligne « Lettres d'intention à ≥ 149 € » est caduque. Ce fichier n'est pas modifié ici.

---

## 7. Calendrier de 8 semaines (26 octobre → 18 décembre 2026)

| Sem. | Dates | Entretiens de validation | SEO et autodiagnostic | Réseaux ESS + Solidatech | Prestataires prescripteurs | Facebook (test) | Prérequis, décisions, revues |
|---|---|---|---|---|---|---|---|
| S1 | 26 – 30 oct. | Liste de 30 structures à solliciter (réseau Tecnoo et personnel, ESS) ; ajout des questions de prix au script (analyste-marche) | Plan éditorial v1 (content-strategist) ; articles 3 et 4 en brouillon (redacteur-blog-seo) | Cartographie des 8 relais et des contacts | Liste de 10 prestataires (Tecnoo compris ?) | — | Réserver lanternis.fr ; antériorité du nom ; trancher Hasteria ou Tecnoo pour les demandes ; juriste-rgpd valide les règles de prospection ; brand-manager : promesse « guidé pas à pas » ; cro-conversion : bloc tarifs D et bouton « Être prévenu de l'ouverture de l'essai » |
| S2 | 2 – 6 nov. | 15 premières demandes individuelles | Validation des articles 1 à 4 par le fondateur | 4 premiers relais contactés, dont Solidatech | 3 demandes d'entretien | Liste des groupes et pages à suivre (brouillon) | Relecture des pages légales par l'avocat ; DNS Mailjet ; **validation du déploiement o2switch** |
| S3 | 9 – 13 nov. | 15 demandes de plus ; premiers entretiens | **Landing et autodiagnostic en ligne** (après validation) ; Search Console ; 2 articles publiés (après validation) | 4 relais de plus ; proposer une tribune ou un webinaire enregistré | Entretiens de prestataires | Semaine 1 du test (posts validés) | — |
| S4 | 16 – 20 nov. | Entretiens ; **point d'arrêt : ≥ 6 entretiens ?** | Article 3 publié ; **lettre mensuelle n° 1 (17 nov.)** | Relances | Lien `?ref=` proposé aux prestataires intéressés | Semaine 2 | **Revue de quinzaine 1** |
| S5 | 23 – 27 nov. | Entretiens ; proposition « structure pilote » aux plus engagés | Article 4 publié | Rédaction de la tribune ou enregistrement du webinaire de 30 min | ≥ 3 prestataires partagent l'autodiagnostic ? | Semaine 3 | — |
| S6 | 30 nov. – 4 déc. | Entretiens ; relance des engagements écrits | Article 5 en brouillon | **Point d'arrêt : ≥ 1 relais ?** ; réponse de Solidatech | **Point d'arrêt prescripteurs** | Semaine 4 | **Revue de quinzaine 2 : réallocation du temps** |
| S7 | 7 – 11 déc. | Derniers entretiens | Article 5 publié | Diffusion par le relais | Prestataires invités chez les structures pilotes (à préparer) | Semaine 5 | — |
| S8 | 14 – 18 déc. | Synthèse (grille de `script-interview.md` § 6, critères de `prix.md` § 5.5) | Bilan de la Search Console (impressions, requêtes) ; article 6 | Bilan : relais, inscrits ESS, cycle de décision (R11) | Bilan : inscrits par prestataire | **Décision : continuer, ajuster ou arrêter** | **Lettre mensuelle n° 2 (17 déc.)** ; synthèse pour `/bilan` et le comité de décision |

**Remarques :**
- La seconde quinzaine de décembre se prête mal aux décisions (H) : tout est bouclé au 18 décembre.
- Après S8, et jusqu'à l'ouverture de l'essai, la **lettre mensuelle** (19 janvier, 18 février) et le blog entretiennent la liste d'attente. L'ouverture de l'essai est annoncée d'abord aux inscrits et aux structures pilotes.

---

## 8. Coordination, mesure et réallocation

### 8.1 Qui fait quoi (pôle marketing)

| Agent | Contribution au pré-lancement |
|---|---|
| brand-manager | Promesse sans service humain ; messages par persona recentrés sur 20-99 |
| cro-conversion | Landing : bloc tarifs D, essai sans carte, formulaire (effectif, type, outil de messagerie) ; objectif de conversion |
| content-strategist, redacteur-blog-seo | Plan éditorial v1 ; 6 articles ; requêtes cibles du cœur 20-99 |
| emailing | Lettre mensuelle ; plus tard, les 7 emails de cycle de vie de l'essai (brouillons) |
| growth | Paramètres `utm` et `?ref=` ; tableau de suivi par canal ; plus tard, programme de parrainage et de commission |
| presse et relations | Tribunes et articles pour les relais ESS ; dossier Solidatech |
| prospection | **Seulement** les demandes d'entretien (`marketing/campagnes/prospection-entretiens/`), sans démarche de vente |

### 8.2 Règle de réallocation

- **Toutes les deux semaines** pendant le pré-lancement, **chaque mois** après l'ouverture (skill rapport-marketing, `marketing/rapports/`), on calcule pour chaque canal :
  - les heures passées et les euros dépensés ;
  - les inscrits qualifiés, puis les essais, les activations et les souscriptions ;
  - le **coût par inscrit qualifié** (pré-lancement), puis le **CAC projeté** (heures × 60 € + dépenses, divisé par les souscriptions).
- **Le canal au meilleur coût reçoit le temps libéré** par les canaux arrêtés.
- **Aucune dépense payante sans validation** de l'utilisateur.

---

## 9. Hypothèses à vérifier (par ordre d'impact)

1. **Volume d'essais atteignable sans vendeur** (18 à 28 par mois) : c'est le nouveau risque principal. Il dépend surtout du SEO, dont les volumes de recherche ne sont pas mesurés.
2. **Conversion essai → payant de 20 %** et **activation de 50 %** sans aide humaine : aucune donnée de référence pour cette cible.
3. **Répartition des clients par taille** : 30 % de moins de 50 personnes (§ 11.5) contre 74 % dans le marché ; elle fait varier le revenu moyen de 106 à 143 € (`marche-tam-sam-som.md` § 4.1).
4. **Accès aux relais ESS** et **conditions de Solidatech** : non trouvés.
5. **Commission prescripteur de 20 % pendant 12 mois** : non comparée aux pratiques du marché ; outil et coût de gestion non sourcés ; contrat type à faire rédiger.
6. **Facebook comme canal ESS** : non démontré.
7. **Taux de passage de la liste d'attente à l'essai** (25 %) au bout de plusieurs mois d'attente.
8. **Règles de prospection pour les demandes d'entretien** : à valider par juriste-rgpd avant le premier envoi.
9. **Relation Tecnoo / Hasteria** : au nom de qui sont faites les demandes d'entretien ; Tecnoo comme prescripteur commissionné ou non.
10. **Part des structures sous Google Workspace** (D4 reporte le connecteur Google).
11. **Disponibilité du nom « Lanternis »** (marque, domaine) : non vérifiée.

---

## 10. Sources

| Donnée | Valeur | Source | Consultée le | Fiabilité |
|---|---|---|---|---|
| Solidatech | Plus de 45 000 associations inscrites ; inscription gratuite, 300+ offres réduites | Offre d'emploi Solidatech, juin 2026 : https://jobs.makesense.org/fr/jobs/solidatech-assistante-commerciale-et-relations-associations-3Qk60a6Ez8FhbbcX6oUi (S11 de `signaux-demande.md`) ; `benchmark.md` [32] | 2026-10-25 | Moyenne (déclaratif, source indirecte) |
| Nexem | ≈ 10 000 à 11 000 établissements et services, plus de 300 000 à 330 000 salariés | https://nexem.fr/app/uploads/Unorganized/Livre-Vert-Europeen-sur-le-Vieillissement-Contribution-Una-Nexem-19.04.21.pdf | 2026-10-25 | Moyenne (documents de 2018 à 2021) |
| Fehap | 368 000 collaborateurs, plus de 5 700 établissements (juin 2025) | https://www.lemediasocial.fr/hulkStatic/EL/ELI/2025/06/f9ceb9a16-5de4-4d6f-a684-5da32c6fa069/sharp_/ANX/cp-fehap-mgen-vdef-juin-2025.pdf | 2026-10-25 | Moyenne à élevée |
| Corma | Offre pour MSP ; dès 3 €/utilisateur/mois | https://www.corma.io/fr/automated-saas-management-for-msps ; https://www.corma.io/pricing (`prix.md` [39]) | 2026-10-25 | Moyenne (déclaratif éditeur) |
| Stripe France | Cartes de l'EEE 1,5 % + 0,25 € ; SEPA 0,35 € ; Billing 0,7 % du volume | https://stripe.com/fr/pricing (`propositions-tarifs.md` § 10) | 2026-10-26 | Élevée |
| Grille D, revenu moyen, CAC des canaux, volumes | Voir § 11 | `propositions-tarifs.md` (H) | 2026-10-26 | Hypothèses |
| Concurrents, prix | Voir § 1 et 2 | `prix.md`, `benchmark.md` | 2026-10-25 | Voir ces documents |
