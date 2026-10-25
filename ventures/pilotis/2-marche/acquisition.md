---
venture: pilotis
phase: 2 Marché
auteur: strategiste-marketing
date: 2026-10-25
statut: brouillon
skills: messages-par-persona, landing-validation-waitlist, plan-de-lancement
---

# Lanternis : positionnement et acquisition (premier jet)

> **Règle de lecture.** Les chiffres externes sont sourcés (URL, consultée le **2026-10-25**, liste en § 8). **(H)** = hypothèse non vérifiée. Tous les coûts d'acquisition sont des **calculs sur hypothèses** : ils héritent du statut (H). Le temps du fondateur est valorisé à **60 €/h (H)**, comme dans `1-analyse/modele-revenus.md` § 4.
> **Rien n'est publié ni envoyé.** Les messages et contenus cités sont des brouillons ; toute publication, tout envoi groupé ou toute campagne passe par la validation explicite de l'utilisateur (règle 2 de `CLAUDE.md`).
> **Prérequis manquant :** `marque/plateforme-de-marque.md` et `marque/voix-fondateur.md` sont vides. Le positionnement ci-dessous est un **premier jet de stratégie**, pas une plateforme de marque. Il faut lancer `/marque` avant de rédiger la landing et les posts.

---

## 1. Premier positionnement

### 1.1 Phrase de positionnement (pour qui, contre quoi, pourquoi nous)

> **Pour les dirigeants et les DAF de PME et d'associations de 20 à 250 salariés qui n'ont pas de DSI, Lanternis est un DSI de poche : un registre de tout le SI qui alerte avant les mauvaises surprises, mis en place avec eux par un DSI, pour qu'ils gardent la carte de leur informatique même quand la personne qui savait s'en va.**

Pourquoi c'est défendable (renvois aux études de la phase 2) :
- **Pour qui :** le dirigeant non technicien, à qui aucun outil ne s'adresse aujourd'hui (`benchmark.md` § 0 et § 3, carte de positionnement).
- **Contre quoi :** le statu quo « prestataire + Excel, ou rien » (`benchmark.md` § 2.6), et non un autre logiciel.
- **Pourquoi nous :** logiciel + humain (25 ans de SI, cofondateur de Tecnoo), prix forfaitaire publié, hébergement en France, remise ESS (`benchmark.md` § 4, angles 1 à 5).

### 1.2 L'ennemi désigné : « l'informatique en boîte noire »

L'ennemi n'est **pas** le prestataire informatique : il est aussi un prescripteur possible (`benchmark.md` § 0, point 3 ; `script-interview.md` § 5 : « ne pas critiquer le prestataire »). L'ennemi, c'est **une informatique dont personne dans la structure n'a la carte** :
- le savoir qui tient dans la tête d'une seule personne (le départ en retraite du responsable informatique est un vrai déclencheur : S2 de `signaux-demande.md`) ;
- les abonnements souscrits par carte bancaire sans que personne ne les voie (shadow IT, tendance 2 de `tendances.md`) ;
- les contrats reconduits sans décision, les comptes d'anciens salariés encore actifs (H, à confirmer en entretien).

Formulation de travail : **« Votre informatique ne doit pas être une boîte noire, ni pour vous, ni pour votre CA, ni pour votre assureur. »** (H, à tester)

### 1.3 Face aux concurrents clés

| Alternative | Ce qu'elle fait | Notre différence (une ligne) | Source |
|---|---|---|---|
| Statu quo : prestataire + Excel | Dépannage, sauvegardes, inventaire dans l'outil du prestataire | La carte du SI appartient à la structure ; le prestataire peut y contribuer | `benchmark.md` § 2.6 |
| Primo (FR) | MDM, gestion des SaaS, achat de matériel ; offre aussi pour MSP | Lanternis ne configure pas les postes : il aide le dirigeant à décider (contrats, fournisseurs, coûts, alertes) | `benchmark.md` [17] |
| Cledara (UK) | Abonnements SaaS et cartes virtuelles, 100 £/mois en entrée | En français, tout le SI (pas seulement les SaaS), hébergé en France | `benchmark.md` [15] |
| Corma (FR) | Gouvernance des licences et des accès ; revendique 45 entreprises clientes dont Skello ; offre dédiée aux MSP | Pensé pour une structure **sans** équipe IT, avec un service humain ; prix public | https://corma.io/fr/company/about-us ; https://www.corma.io/fr/automated-saas-management-for-msps |
| DSI à temps partagé | Conseil à 700 à 1 400 €/jour, sans outil | Le même pilotage pour une fraction du prix, et le registre reste quand l'intervenant part | `prix.md` § 1.2 [24] |

**Point d'attention :** Primo et Corma ont tous deux une offre pour les MSP. Le canal « prestataires informatiques » (§ 2, C6) est donc **déjà travaillé par deux concurrents mieux financés**.

### 1.4 Une promesse par persona

| Persona | Promesse (H, à tester en entretien et sur la landing) | Preuve à apporter | Offre d'entrée |
|---|---|---|---|
| **P1 Marc**, dirigeant de PME de 50 à 150 salariés | « Quand votre référent informatique part, votre SI reste. Vous savez ce que vous avez, ce que vous payez et ce qui arrive à échéance, sans recruter un poste à 45-75 k€. » | Coût d'un responsable informatique : 45 à 75 k€ brut/an (S2) ; Pilotage 249 € HT/mois | Diagnostic SI (2 490 €) ou Pilotage + mise en place |
| **P2 Nadia**, DAF d'une association médico-sociale de 60 à 200 salariés | « Présentez à votre CA et à vos financeurs un SI maîtrisé et chiffré, avec des données hébergées en France, à tarif associatif. » | Fragilités cyber et RGPD relevées par une ARS dans les ESSMS (S3) ; remise ESS de 15 % | Diagnostic SI présenté comme un livrable pour le CA |
| **P3 Sophie**, office manager (conservée comme **utilisatrice relais**, pas comme cible d'acquisition) | « Plus d'accès oublié au départ d'un salarié, plus de renouvellement surprise : Lanternis vous prévient. » | Check-list arrivées et départs, alertes | Aucune offre propre : elle est la championne interne de P1 ou P2 |

**Recommandation sur P3 :** ne pas lui consacrer de canal. Elle n'a pas le pouvoir d'achat (`personas.md`) et ses signaux sont faibles (S12). On la touche à travers le compte de P1 ou P2 (contenus « procédure de départ d'un salarié », pièce jointe que le dirigeant lui transmet). À supprimer comme persona si les entretiens le confirment.

---

## 2. Canaux d'acquisition plausibles, classés

### 2.1 Barème de calcul (H)

- Temps fondateur : 60 €/h (H, `modele-revenus.md`).
- Temps unitaires de vente repris de `modele-revenus.md` § 6.3 : contact 15 min, rendez-vous 1 h, démonstration 1 h 30, proposition 1 h, signature 1 h.
- **CAC = (heures × 60 €) + dépenses directes**, pour un client signé. Les entonnoirs de chaque canal sont des **hypothèses** : aucune donnée de conversion n'existe pour cette cible.
- Le CAC tolérable n'est **pas le même partout** (voir § 3.2) : environ 1 500 à 1 700 € en moyenne, mais beaucoup moins pour les petites structures de l'ESS.

### 2.2 Tableau de classement

| Rang | Canal | Coût estimé | Délai avant 1er client (H) | Volume plausible (H) | CAC estimé (H) | P1 | P2 | P3 |
|---|---|---|---|---|---|---|---|---|
| **1** | **C1. Base clients Tecnoo et réseau personnel du fondateur** | Temps seul (+ ≈ 50 €/client de frais) | 1 à 2 mois | **Limité** : la taille du vivier n'est pas connue (à compter) ; 1 à 5 clients sur 12 mois (H) | **≈ 950 €** | Fort | Moyen (établissements d'enseignement, H) | Faible |
| **2** | **C2. Prospection directe sur déclencheurs** (LinkedIn + email, ciblage des structures de 50 à 249 salariés qui vivent un départ de référent, un changement de prestataire, un projet ESMS numérique) | Temps + Sales Navigator Core ≈ 121 € HT/mois (tiers) + outillage ≈ 50 €/mois (H) | 2 à 3 mois | Moyen et pilotable : 1 client/mois à environ 50 contacts/mois (H) | **≈ 1 730 €** (fourchette 1 400 à 2 200 €) | Fort | Moyen | Nul |
| **3** | **C4. Réseaux ESS et fédérations du médico-social** (CRESS, UDES, ESS France, Nexem, Fehap, Uniopss) en *one-to-many* : webinaire co-organisé, article dans une lettre d'information, atelier lors d'une journée régionale | Temps (≈ 15 h par webinaire) + éventuels frais d'adhésion ou de stand (montants non trouvés, H) | 3 à 6 mois (calendriers des fédérations, décision du bureau ou du CA) | Moyen à fort si un relais diffuse : Nexem revendique environ 10 000 à 11 000 établissements et plus de 300 000 salariés (2018-2021) ; la Fehap 368 000 collaborateurs et plus de 5 700 établissements (juin 2025) | **≈ 1 300 à 1 700 €** (1 à 2 clients par webinaire, H) | Faible | **Fort** | Moyen |
| 4 | C6. Partenariats avec des prestataires informatiques, MSP et DSI à temps partagé (prescription ou revente) | Temps de recrutement ≈ 5 h par partenaire + commission de 20 % la 1re année (H) ≈ 500 € | 4 à 9 mois | Potentiellement le plus fort à terme, mais incertain (Primo et Corma occupent déjà ce terrain, voir § 1.3) | **≈ 1 050 €** | Fort | Moyen | Moyen |
| 5 | C3. LinkedIn du fondateur (contenu organique, 2 posts par semaine) | ≈ 10 h/mois, soit 600 €/mois (H) | 3 à 6 mois | Faible au début, croissant ; surtout un **amplificateur** de C2 et C4 | ≈ 1 750 € au démarrage, ≈ 1 150 € à maturité (H) | Fort | Moyen | Moyen |
| 6 | C5a. CPME (unions territoriales) et MEDEF locaux : intervention sur la cybersécurité ou le départ du référent informatique | Cotisation territoriale selon l'effectif (ex. CPME 64 : 350 € pour 0 à 10 salariés, 2026-2027) + ≈ 8 h par événement (H) | 3 à 6 mois | Faible à moyen ; la CPME co-signe le baromètre Cybermalveillance (S1) | ≈ 1 700 € (1 client pour 2 interventions, H) | Fort | Faible | Faible |
| 7 | C8. Lead magnet : autodiagnostic SI (20 questions, score et rapport) | ≈ 20 h de conception, soit 1 200 € une fois (H) | — (outil de conversion) | **Pas un canal** : il convertit le trafic de C2 à C7 en inscrits qualifiés | Non attribuable seul (coût fixe réparti) | Fort | Fort | Fort |
| 8 | C9. Webinaires organisés en propre | ≈ 10 h par webinaire (H) | 6 mois et plus (il faut d'abord une audience) | Faible tant que la liste est petite | Non estimable avant 6 mois ; à faire **avec** C4 ou C5a, pas seul | Moyen | Fort | Moyen |
| 9 | C7. SEO (cybersécurité des PME, shadow IT, recrutement d'un responsable informatique, NIS2 « suis-je concerné ? », prix d'un DSI à temps partagé) | ≈ 6 h par article, 1 article/mois, soit 360 €/mois (H) | 6 à 12 mois | **Inconnu** : les volumes de recherche n'ont pas pu être mesurés (`signaux-demande.md` § 3) | ≈ 2 000 € sur les 12 premiers mois, moins ensuite (H, très fragile) | Moyen | Moyen | Fort |
| 10 | C5b. CJD | Cotisation non trouvée (H) | 6 mois et plus | Faible ; lieu d'échange entre dirigeants plus que d'achat (H) | Non estimé | Moyen | Faible | Nul |
| 11 | C5c. BNI | 775 à 1 000 €/an selon les sources (tiers, dates non vérifiées) + petit-déjeuner hebdomadaire ≈ 10 € + ≈ 2 h par semaine de présence (H) | 6 mois et plus | Faible pour la cible : membres surtout TPE et indépendants (H) | **≈ 4 500 € et plus** (1 client en 6 mois, H) | Faible | Nul | Nul |

### 2.3 Détail des calculs par canal (H)

**C1. Base Tecnoo et réseau du fondateur (réseau chaud)**
- Entonnoir (H) : 10 contacts → 5 rendez-vous → 3 démonstrations → 2 propositions → 1 signature.
- Temps : 2,5 + 5 + 4,5 + 2 + 1 = **15 h**, soit 900 € + 50 € de frais = **≈ 950 €**.
- Limites : le nombre de clients Tecnoo qui sont dans le SAM (50 à 249 salariés sans DSI, ou ESS de 20 à 249) n'est pas connu ; il faut le compter. Les clients Tecnoo ont déjà un ERP piloté par Tecnoo, ce qui facilite la confiance, mais il faudra **encadrer la relation Tecnoo / Hasteria** (qui démarche, qui facture, commission éventuelle ; question ouverte dans `modele-revenus.md` § 7).
- Rôle : **source n° 1 des entretiens et des lettres d'intention**, pas canal de croissance.

**C2. Prospection directe sur déclencheurs**
- Ciblage : structures de 50 à 249 salariés ayant un déclencheur visible (offre d'emploi « responsable informatique » liée à un départ en retraite, voir S2 ; changement de prestataire ; projet ESMS numérique, voir S3 ; fusion ou ouverture d'établissement). Pas de prospection froide des 20 à 49 (CAC tolérable trop bas, § 3.2).
- Entonnoir (H) : 50 contacts → 6 rendez-vous → 3 démonstrations → 2 propositions → 1 signature.
- Temps : 12,5 + 6 + 4,5 + 2 + 1 = **26 h**, soit 1 560 € + ≈ 171 € d'outils par mois (Sales Navigator ≈ 121 € HT/mois en mensuel, tiers ; outillage email ≈ 50 €, H) = **≈ 1 730 €**.
- Sensibilité : si le déclencheur double le taux de réponse (25 contacts par client), le CAC tombe à ≈ 1 400 € ; s'il faut 80 contacts, il monte à ≈ 2 200 €, au-dessus du plafond moyen.
- Règles : messages manuels, sans automatisation LinkedIn ; en email B2B, objet lié à la fonction du destinataire et lien de désinscription (**règle à faire valider par juriste-rgpd**).

**C3. LinkedIn fondateur**
- Effort (H) : 2 posts par semaine + commentaires et messages ≈ 10 h/mois, soit 600 €/mois.
- Un lead entrant est plus chaud : 4 rendez-vous → 2 démonstrations → 1 proposition → 1 signature ≈ 9 h, soit 540 €.
- Démarrage (1 client tous les 2 mois) : 1 200 + 540 ≈ **1 740 €** ; à maturité (1 client par mois) : 600 + 540 ≈ **1 140 €**.
- Prérequis : `marque/voix-fondateur.md` (vide aujourd'hui).

**C4. Réseaux ESS et fédérations**
- Format type : webinaire co-organisé avec une CRESS ou une délégation régionale de fédération, sur un sujet utile au secteur (« cybersécurité et RGPD dans les ESMS : ce que le CA doit savoir »), sans démonstration commerciale.
- Entonnoir (H) : 40 inscrits → 15 présents → 5 rendez-vous → 2 démonstrations → 1 à 2 signatures.
- Temps : 15 h de préparation et de relance (900 €) + ≈ 13 h de vente, dont 3 h de plus pour un passage en bureau ou en CA (780 €) ≈ **1 700 €** pour 1 signature ; ≈ **1 300 €** par client pour 2 signatures.
- Limites : les fédérations ont leurs propres partenaires et calendriers (H) ; le cycle de décision peut dépasser 6 mois (R11) ; l'appartenance de Nexem et de la Fehap à l'UDES n'a pas été vérifiée.

**C6. Prestataires informatiques, MSP, DSI à temps partagé**
- Modèle (H) : le partenaire recommande Lanternis à ses clients sans DSI, ou l'utilise pour sa revue mensuelle ; commission de 20 % la première année (≈ 500 € sur un ARPA de 210 €).
- Temps : 5 h de recrutement par partenaire (amorti sur 2 clients, 150 €) + 6 h de démonstration conjointe (360 €) ≈ **1 050 €**.
- Risques : conflit d'intérêts (le prestataire vend ce qu'il conseille) ; concurrence de Primo et Corma sur les MSP ; Tecnoo elle-même est un partenaire naturel, mais lié au fondateur.
- Test déjà prévu : 3 entretiens prestataires (`script-interview.md` § 8). Pas de budget dédié en pré-lancement.

**C5a. CPME et MEDEF locaux**
- Hasteria est une SASU ; la cotisation dépend de l'union territoriale et de l'effectif (ex. CPME 64 : 350 € pour 0 à 10 salariés sur 2026-2027).
- Entonnoir (H) : 2 interventions de 8 h (préparation et présence) → 1 signature + 10 h de vente : 26 h, soit 1 560 € + ≈ 175 € de cotisation au prorata ≈ **1 700 €**.

**C7. SEO** : 360 €/mois pendant 12 mois = 4 320 € pour peut-être 3 clients la première année (H), plus 9 h de vente chacun ≈ **2 000 €**. Le seul canal adapté aux **PME de 20 à 49 salariés**, hors SAM en prospection (`marche-tam-sam-som.md` § 4). À lancer en croissance ; en pré-lancement, seulement 2 ou 3 contenus piliers qui servent aussi la landing et les entretiens.

**C8. Autodiagnostic SI** : le diagnostic public MonAideCyber existe déjà sur le volet cyber (`tendances.md` § 1). L'autodiagnostic Lanternis doit couvrir **tout le SI** (contrats, abonnements, accès, dépendance à une personne) et renvoyer vers MonAideCyber pour la cyber, sans le dupliquer. Données minimales, consentement explicite (RGPD by design).

---

## 3. CAC global estimé et comparaison avec le CAC tolérable

### 3.1 CAC moyen pondéré pour les 15 premiers clients (≈ 3 k€ de MRR, H)

| Canal | Clients (H) | CAC unitaire (H) | Total |
|---|---|---|---|
| C1 Réseau chaud | 5 | 950 € | 4 750 € |
| C2 Prospection sur déclencheurs | 3 | 1 730 € | 5 190 € |
| C3 LinkedIn fondateur | 2 | 1 740 € | 3 480 € |
| C4 Réseaux ESS | 3 | 1 500 € | 4 500 € |
| C6 Partenaires | 2 | 1 050 € | 2 100 € |
| **Sous-total** | **15** | | **20 020 €** |
| Coûts fixes du pré-lancement non attribués : autodiagnostic (20 h), landing et contenus (≈ 10 h) | | | ≈ 1 800 € |
| **CAC moyen « tout compris »** | | | **≈ 1 450 € par client (H)** |

- **Temps commercial moyen :** ≈ 21 h par client, cohérent avec les 23 h de `modele-revenus.md` § 6.3.
- **Après épuisement du réseau chaud** (clients 16 et suivants) : sans C1, le mix C2, C3 à maturité, C4, C6 et C7 donne un CAC de **≈ 1 350 à 1 750 € (H)**. On est **à la limite** du plafond.
- **Effet des frais de mise en place :** si 60 % des clients paient la mise en place (H) et que le forfait de 990 € laisse ≈ 510 € après 8 h de travail, le CAC net baisse d'environ 300 €. C'est un levier important, à garder hors du MRR (`modele-revenus.md` § 7).

### 3.2 Comparaison avec le CAC tolérable, par segment

Le plafond de 1 500 à 1 700 € (`modele-revenus.md` § 6.2) vaut pour un ARPA central de 210 €. Avec le même coût variable de 69 €/client/mois (H) et un remboursement en 12 mois :

| Segment et palier | Prix mensuel net (H) | Contribution/mois | **CAC maximal (12 mois)** | Canaux compatibles |
|---|---|---|---|---|
| PME 100-249, Pilotage+ mensuel | 399 € | 330 € | **≈ 3 960 €** | Tous, y compris C2 |
| PME 50-99, Pilotage mensuel | 249 € | 180 € | **≈ 2 160 €** | C1, C2, C3, C5a, C6 |
| ESS 50-99, Pilotage, remise ESS, mensuel | 211,65 € | 142,65 € | **≈ 1 710 €** | C1, C3, C4, C6 |
| ESS 50-99, Pilotage, ESS + annuel | 169,32 € | 100,32 € | **≈ 1 200 €** | C4, C6 (et C1) |
| ESS 20-49, Essentiel, remise ESS, mensuel | 126,65 € | 57,65 € | **≈ 690 €** | C4 en *one-to-many* seulement |
| ESS 20-49, Essentiel, ESS + annuel | 101,32 € | 32,32 € | **≈ 390 €** | Aucun canal de vente directe ; contenus et prescription seulement |

**Lecture :**
1. **Le CAC global estimé (≈ 1 450 €) tient dans le plafond moyen**, mais avec peu de marge, et seulement si le réseau chaud fournit un tiers des premiers clients.
2. **Les structures de 100 à 249 salariés sont le segment le plus rentable à prospecter** (plafond ≈ 4 000 €). La prospection directe (C2) doit viser d'abord les 100-249, puis les 50-99.
3. **Les ESS de 20 à 49 salariés ne supportent aucune vente individuelle.** Elles ne peuvent être servies que par des canaux *one-to-many* (fédération, webinaire, autodiagnostic) et un onboarding très léger. Le maintien de ce segment dans le SAM (`marche-tam-sam-som.md` § 4) suppose ce mode d'acquisition : **à signaler au comité de décision**.
4. Le coût variable de 69 € est supposé identique pour tous les paliers (H) ; s'il est plus faible sur Essentiel (moins de support), les plafonds des petits paliers remontent un peu.

---

## 4. Les 3 canaux à tester en pré-lancement (8 semaines)

**Choix :** C1 (réseau chaud), C2 + C3 (prospection sur déclencheurs, appuyée par LinkedIn), C4 (réseaux ESS). Le canal partenaires (C6) est seulement **sondé** par les 3 entretiens prestataires déjà prévus, sans budget. SEO, clubs et webinaires propres attendent la phase de lancement.

**Pourquoi ceux-là :** ils produisent vite les **preuves demandées par la décision** (entretiens, lettres d'intention, inscrits qualifiés), ils couvrent les deux personas acheteurs (P1 et P2), et ils mesurent directement l'hypothèse n° 5 (« la vente directe tient avec un CAC d'environ 1 600 € »).

### 4.1 Objectifs chiffrés (H, à valider par l'utilisateur)

| Canal | Persona | Indicateurs et objectifs à 8 semaines | Critère d'arrêt (ou de bascule) |
|---|---|---|---|
| **C1 Réseau chaud** | P1, P2 | 20 demandes → **≥ 10 entretiens** (50 %, seuil H5 de `script-interview.md`) → **≥ 2 lettres d'intention** ou acomptes « pilote fondateur » ; ≥ 5 recommandations obtenues ; ≥ 15 inscrits sur la liste d'attente | **< 6 entretiens sur 20 demandes à la fin de la semaine 4** : le vivier est trop petit ou trop froid → basculer le temps sur C2. Si les entretiens ont lieu mais **0 lettre d'intention après 8 entretiens avec douleur avérée**, le problème n'est pas le canal mais l'offre : remonter au comité |
| **C2 + C3 Prospection sur déclencheurs + LinkedIn** | P1 | 100 contacts ciblés (50-249, dont la moitié en 100-249) → taux de réponse **≥ 10 %** → **≥ 5 rendez-vous** → **≥ 1 lettre d'intention** ; 8 posts LinkedIn → **≥ 30 inscrits** sur la liste d'attente depuis LinkedIn ; temps réel par contact chronométré | **Taux de réponse < 5 % après 60 contacts et 2 variantes de message**, ou CAC projeté **> 2 200 €** (≈ 35 h par client) → arrêter la prospection froide, garder LinkedIn comme simple amplificateur |
| **C4 Réseaux ESS** | P2 | 6 relais sollicités (2 CRESS, Nexem, Fehap, Uniopss, Solidatech) → **≥ 1 relais** qui accepte un webinaire, un article ou une diffusion d'ici la semaine 6 → **≥ 30 inscrits** au webinaire → **≥ 4 entretiens ESS** → **≥ 1 lettre d'intention ESS** ; ≥ 3 structures sur 5 déclarent un cycle de décision ≤ 3 mois (R11) | **Aucun relais après 6 sollicitations**, ou **< 15 inscrits** au webinaire → l'ESS passe en canal secondaire (contenus seulement) et le SAM doit être revu |

### 4.2 Objectifs globaux du pré-lancement (H)

| Indicateur | Objectif à 8 semaines | Lien avec la décision |
|---|---|---|
| Entretiens Mom Test réalisés | **12 à 15**, dont ≥ 3 par tranche et 3 à 5 dans l'ESS | `script-interview.md` § 1 |
| Lettres d'intention ou acomptes à ≥ 149 € HT/mois | **≥ 3** (sur 10 entretiens qualifiés) | Seuil H3 de `STATUT.md` |
| Inscrits qualifiés sur la liste d'attente (structure de 20 à 249, rôle de décideur ou de prescripteur) | **≥ 80** | Signal de demande vérifiable (éliminatoire de la grille GO/NO-GO) |
| Taux d'activation de la liste d'attente (autodiagnostic complété) | **≥ 40 %** des inscrits | Mesure l'intérêt réel, au-delà de l'inscription |
| Taux de conversion de la landing (visiteur → inscrit) | **≥ 5 %** (H, à affiner avec cro-conversion) | Qualité du message |
| Temps fondateur consacré à l'acquisition | ≤ 12 h/semaine, journalisé | Hypothèse n° 5 (capacité du fondateur) |
| MRR | 0 € (pas de vente avant le GO) ; **objectif post-lancement repris de `modele-revenus.md` : 3 k€ de MRR à 12 mois, soit ≈ 15 clients** | Phase 9 |

### 4.3 Règle de réallocation

Chaque fin de quinzaine (puis chaque mois après le lancement), on calcule pour chaque canal : heures passées, euros dépensés, entretiens, lettres d'intention, inscrits, et **CAC projeté** (heures × 60 € + dépenses, divisé par les signatures ou lettres d'intention). Le canal au meilleur CAC projeté reçoit le temps libéré par les canaux arrêtés. Les résultats sont consignés dans `marketing/rapports/` (skill rapport-marketing) une fois la phase de lancement ouverte.

---

## 5. Calendrier d'acquisition sur 8 semaines (du lundi 26 octobre au vendredi 18 décembre 2026)

| Semaine | Dates | C1 Réseau chaud | C2 + C3 Prospection + LinkedIn | C4 Réseaux ESS | Socle commun (autres agents) |
|---|---|---|---|---|---|
| S1 | 26 oct. – 30 oct. | Lister et qualifier le vivier Tecnoo et le réseau du fondateur (taille, tranche, ESS ou non, DSI ou non) ; choisir 20 cibles | Constituer la liste de 100 structures à déclencheur (offres d'emploi, ESMS numérique) | Cartographier les relais : CRESS de la région du fondateur, délégations Nexem, Fehap, Uniopss ; Solidatech | `/marque` (plateforme, voix du fondateur) ; vérification du nom Lanternis (skill nouvelle-marque-hasteria) |
| S2 | 2 nov. – 6 nov. | Envoyer les 10 premières demandes d'entretien (brouillons de `script-interview.md` § 7, envoi individuel par le fondateur) | Rédiger 2 variantes de message ; premiers posts LinkedIn (brouillons, validation requise) | Premiers contacts avec 3 relais (appel ou email individuel) | Landing de validation et liste d'attente (brand-manager, cro-conversion) ; conception de l'autodiagnostic |
| S3 | 9 nov. – 13 nov. | 10 demandes de plus ; premiers entretiens | 30 premiers contacts (variante A / B) | 3 relais de plus ; proposer un sujet de webinaire | Mise en ligne de la landing **après validation** de l'utilisateur ; Search Console |
| S4 | 16 nov. – 20 nov. | Entretiens ; **point d'arrêt C1** (≥ 6 entretiens obtenus ?) | 30 contacts de plus ; **point de mesure** du taux de réponse | Relances ; 1er entretien ESS issu du réseau | Autodiagnostic en ligne (après validation) ; **revue de quinzaine 1** |
| S5 | 23 nov. – 27 nov. | Entretiens ; proposer l'atelier d'inventaire de 2 h aux plus intéressés | 40 contacts restants ; **point d'arrêt C2** (taux de réponse ≥ 5 % après 60 contacts ?) | Préparer le webinaire avec le relais qui a accepté | 1 ou 2 contenus piliers (redacteur-blog-seo), en brouillon |
| S6 | 30 nov. – 4 déc. | Proposer les lettres d'intention « pilote fondateur » | Rendez-vous et démonstrations sur maquette | **Point d'arrêt C4** (≥ 1 relais ?) ; diffusion de l'invitation par le relais | **Revue de quinzaine 2** : réallocation du temps |
| S7 | 7 déc. – 11 déc. | Relances des lettres d'intention ; 3 entretiens prestataires (sonde C6) | Rendez-vous ; lettre d'intention éventuelle | **Webinaire** ; entretiens ESS dans la foulée | Lettre aux inscrits de la liste d'attente (brouillon, validation requise) |
| S8 | 14 déc. – 18 déc. | Bilan des entretiens (grille de `script-interview.md` § 6) | Bilan : CAC projeté par canal | Bilan : cycle de décision ESS (R11) | Synthèse pour `/bilan` et le comité de décision ; mise à jour de `STATUT.md` |

**Remarques sur le calendrier :**
- La seconde quinzaine de décembre est peu propice aux décisions (H) ; tout doit être bouclé au 18 décembre.
- Dans l'ESS, les bureaux et CA se réunissent à un rythme propre : une lettre d'intention ESS signée avant fin décembre serait un signal fort, son absence n'est pas en soi un échec.
- Les demandes individuelles du fondateur à son réseau relèvent de sa décision ; tout envoi groupé, post ou mise en ligne exige la validation explicite de l'utilisateur.

---

## 6. Au-delà du pré-lancement (esquisse, à détailler en phase 9)

| Phase | Canaux prioritaires (H) | Objectif mesurable (H) |
|---|---|---|
| Validation (pré-lancement, ce document) | C1, C2 + C3, C4 | ≥ 3 lettres d'intention, ≥ 80 inscrits qualifiés, 12 à 15 entretiens |
| Lancement (après le GO et la mise en ligne) | Le meilleur canal du pré-lancement + C6 si la sonde est positive ; conversion des lettres d'intention en pilotes payants | 10 clients « pilote fondateur » ; activation : ≥ 70 % ont leur registre rempli à 30 jours (H) |
| Croissance | C6, C3 à maturité, C7 (SEO, y compris pour les PME de 20 à 49), webinaires propres (C9) | 3 k€ de MRR à 12 mois ; CAC ≤ 1 700 € ; part des clients entrants (non prospectés) ≥ 40 % à 18 mois |

---

## 7. Hypothèses à vérifier (par ordre d'impact)

1. **Taille du vivier Tecnoo dans le SAM** : combien de clients Tecnoo ont 50 à 249 salariés (ou sont des ESS de 20 à 249) et pas de DSI ? Sans ce chiffre, le poids de C1 dans le CAC global est une supposition.
2. **Entonnoirs de conversion** de tous les canaux (aucune donnée) : à mesurer pendant les 8 semaines.
3. **Taux de réponse de la prospection sur déclencheurs** : l'idée que le départ d'un référent informatique ouvre une fenêtre d'achat vient d'offres d'emploi (S2), pas d'acheteurs.
4. **Accès aux fédérations** (Nexem, Fehap, Uniopss) et conditions (programme partenaires payant ou non, frais de stand) : non trouvés ; les chiffres de Nexem datent de 2018 à 2021.
5. **Relation Tecnoo / Hasteria** pour le démarchage et le service : à trancher (qui contacte, qui facture, commission).
6. **Commission partenaire de 20 %** : non comparée aux pratiques du marché ; concurrence de Primo et Corma sur les MSP.
7. **Règles de prospection B2B par email et sur LinkedIn** : à faire valider par juriste-rgpd avant le premier envoi.
8. **Coût de Sales Navigator** : prix relevé par des tiers (≈ 121 € HT/mois en mensuel), à vérifier sur la page de LinkedIn.
9. **Cotisations** CPME (selon l'union territoriale), CJD (non trouvée), BNI (sources tierces, dates non vérifiées).
10. **Volumes de recherche SEO** : non mesurés (`signaux-demande.md` § 3).
11. **Disponibilité du nom « Lanternis »** (marque, domaine) : non vérifiée dans ce document.

---

## 8. Sources (consultées le 2026-10-25)

| Donnée | Valeur | Source | Fiabilité |
|---|---|---|---|
| LinkedIn Sales Navigator Core | 120,99 € HT/siège/mois en mensuel, ≈ 90,74 €/mois en annuel (relevé tiers du 19/09/2026) | https://www.hublead.io/fr/sales-navigator-cost-calculator ; https://www.kanbox.io/fr/blog/linkedin-sales-navigator-prix | Moyenne (tiers, à vérifier chez LinkedIn) |
| BNI, cotisation | 775 à 1 000 €/an selon les sources, droit d'entrée variable, petits-déjeuners ≈ 10 € | https://www.creerentreprise.fr/reseau-affaires-bni-avis-et-conseils/ ; https://www.lagazettefrance.fr/article/avec-bni-bethune-le-reseau-bni-debarque-dans-le-pas-de-calais | Faible (tiers, dates non vérifiées, variations locales) |
| CPME, cotisation territoriale | Selon l'union et l'effectif ; CPME 64 : 350 € (0 à 10 salariés), 455 € (11 à 20), période 2026-2027 | https://www.helloasso.com/associations/cpme-64/adhesions/nouvelle-adhesion-cpme-64 | Moyenne (une seule union) |
| CJD, cotisation | Non trouvée | — | — |
| Nexem | ≈ 10 000 à 11 000 établissements et services, plus de 300 000 à 330 000 salariés ; 95 % d'associations | https://nexem.fr/app/uploads/Unorganized/Livre-Vert-Europeen-sur-le-Vieillissement-Contribution-Una-Nexem-19.04.21.pdf ; https://nexem.fr/sites/default/files/uploads/prive/Courriers-Nexem/Courrier-Ministres-Exonération-prime-de-fin-dannée-défiscalisée-_-003.pdf | Moyenne (documents de 2018 à 2021) |
| Fehap | 368 000 collaborateurs, plus de 5 700 établissements (juin 2025) | https://www.lemediasocial.fr/hulkStatic/EL/ELI/2025/06/f9ceb9a16-5de4-4d6f-a684-5da32c6fa069/sharp_/ANX/cp-fehap-mgen-vdef-juin-2025.pdf | Moyenne à élevée |
| Corma | Fondée en juillet 2023 ; 45 entreprises clientes dont Skello (déclaratif) ; levée seed de 3,5 M€ ; offre pour MSP ; pas de prix public trouvé | https://corma.io/fr/company/about-us ; https://www.corma.io/fr/automated-saas-management-for-msps ; https://www.frenchweb.fr/pourquoi-lia-fait-de-la-gouvernance-logicielle-un-veritable-casse-tete/459073 | Moyenne (déclaratif éditeur) |
| Autres données citées | Signaux S1 à S12, prix, concurrents, CAC tolérable | `signaux-demande.md`, `tendances.md`, `benchmark.md`, `prix.md`, `marche-tam-sam-som.md`, `1-analyse/modele-revenus.md` | Voir ces documents |
