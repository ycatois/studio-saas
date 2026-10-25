---
venture: pilotis
phase: 1 Analyse
auteur: analyste-finance
date: 2026-10-25
statut: brouillon
---

# Lanternis : modèle de revenus et premiers unit economics

> **Règle de lecture.** **(H)** = hypothèse non vérifiée, à tester en phase Marché. Les seuls chiffres externes repris ici viennent des sources déjà citées dans `0-idee/fiche-idee.md` (consultées le 2026-10-25). Je n'ai pas eu d'accès web pour cette analyse : aucune nouvelle source n'a été ajoutée. Les résultats calculés (ARPA, LTV, nombre de clients) héritent du statut d'hypothèse de leurs données d'entrée.
>
> **Cadre studio appliqué :** B2B, abonnement mensuel HT, option annuelle à −20 %, facturation par Hasteria SASU via son compte Stripe (métadonnée `marque=pilotis`), TVA en sus.
>
> **Cible retenue (réponses du fondateur) :** PME et structures de l'ESS d'environ 20 à 250 salariés, sans DSI, en vente directe, avec une remise possible pour l'ESS. Volets : SI (différenciateur pressenti), finance, RH.

---

## 1. Repères de prix du marché (sources de la phase 0)

| Repère | Prix public constaté | Source (consultée le 2026-10-25) |
|---|---|---|
| Databox Team Core | 199 $/mois en annuel (10 sources, 3 utilisateurs) ; Team Scale 319 $/mois | https://databox.com/pricing |
| Fathom Starter | £38/mois par entreprise | https://www.fathomhq.com/partners/acca |
| Pennylane TPE (1 à 15 salariés) | 49 / 99 / 298 €/mois (grille relayée par un tiers) ; sur devis au-delà de 15 salariés | https://meetergo.com/fr/blog/pennylane , https://www.impli.fr/post/pennylane-tarif |
| Power BI Pro | 14 $/utilisateur/mois depuis le 1er avril 2025 | https://www.theregister.com/2025/04/02/microsoft_power_bi_hikes/ |
| Agicap | pas de grille publique ; estimation tierce non vérifiée vers 200 €/mois | https://www.impli.fr/avis/agicap |
| Chift (API unifiée) | sur devis, selon le nombre de connexions actives | https://www.chift.eu/developers |

**Lecture :** les outils financiers ou KPI se situent entre quelques dizaines et environ 300 €/mois. Sur le seul volet finance, Lanternis aura du mal à dépasser cette fourchette. Un prix plus élevé ne se justifie que par **les volets SI et RH croisés** et par la **taille de la cible**, nettement plus grande que celle des grilles TPE ci-dessus **(H)**.

---

## 2. Trois structures de prix candidates

Les trois structures partagent ces règles :
- prix par **entreprise** (organisation), pas par utilisateur, pour que le dirigeant puisse partager l'accès sans frein (fiche idée, H) ;
- **annuel −20 %** (cadre studio) ;
- **remise ESS proposée : 15 % (H)**, cumulable avec l'annuel, accordée sur justificatif (statut ou agrément ESS ; critères exacts à vérifier, au regard de la loi n° 2014-856 relative à l'ESS) ; il faudra trancher entre 10 et 20 % une fois les entretiens ESS menés ;
- **pas de freemium (H)** : chaque compte coûte du temps de connexion des sources et éventuellement une licence d'API unifiée. On propose plutôt un **pilote de 30 jours** accompagné.

### Structure A : paliers selon l'effectif (recommandée)

| Palier | Effectif | Contenu (H) | Mensuel HT | Annuel HT (équivalent mensuel) | ESS mensuel | ESS annuel (équivalent mensuel) |
|---|---|---|---|---|---|---|
| **Essentiel** (prix d'appel) | 20 à 49 | 3 volets (SI, finance, RH), connecteurs standards jusqu'à 6, 10 indicateurs clés, alertes de base, 5 utilisateurs | **149 €** | 1 430,40 €/an (119,20 €) | 126,65 € | 1 215,84 €/an (101,32 €) |
| **Pilotage** | 50 à 99 | Tout Essentiel + connecteurs illimités (*fair use*), indicateurs croisés, synthèse mensuelle CODIR/banquier, utilisateurs illimités | **249 €** | 2 390,40 €/an (199,20 €) | 211,65 € | 2 031,84 €/an (169,32 €) |
| **Pilotage+** | 100 à 250 | Tout Pilotage + multi-entités ou établissements, registre SI complet (contrats, licences, échéances), revue trimestrielle de 1 h incluse | **399 €** | 3 830,40 €/an (319,20 €) | 339,15 € | 3 255,84 €/an (271,32 €) |

- **Pour :** l'effectif est un indicateur simple, vérifiable et corrélé à la valeur (plus de salariés, donc plus de SaaS, de postes et de masse salariale à piloter) et à la capacité de payer. Le devis est immédiat, sans négocier sur un nombre de connecteurs.
- **Contre :** une structure de 30 salariés peut avoir un SI plus complexe qu'une autre de 120. On garde une limite de connecteurs sur Essentiel pour borner le coût.
- **Prix d'appel de lancement (H) :** offre « pilote fondateur » réservée aux **10 premiers clients** : −30 % pendant 12 mois en échange d'un entretien mensuel de retour d'usage et d'un témoignage. Elle n'est pas intégrée au calcul d'ARPA ci-dessous : l'effet sur 10 clients reste marginal à 10 k€ de MRR.

### Structure B : modulaire par volet

| Offre | Contenu (H) | Mensuel HT (20 à 99 salariés) | Mensuel HT (100 à 250 salariés) |
|---|---|---|---|
| **1 volet** (SI *ou* finance *ou* RH) | 1 volet, connecteurs de ce volet | 99 € | 149 € |
| **2 volets** | 2 volets + 3 indicateurs croisés | 179 € | 269 € |
| **Lanternis complet** | 3 volets + tous les indicateurs croisés + synthèse CODIR | 249 € | 379 € |

- **Pour :** prix d'appel bas (99 €), ce qui permet d'entrer par le volet SI, terrain du fondateur, puis de vendre les autres volets en montée de gamme.
- **Contre :** le produit est vendu en morceaux alors que la promesse est la **vue croisée**. Les clients risquent de rester sur 1 volet (ARPA bas), et la grille est plus complexe à expliquer. Le volet finance seul se retrouve en concurrence directe avec Pennylane et Fathom, moins chers.

### Structure C : paliers selon le nombre de connecteurs

| Palier | Contenu (H) | Mensuel HT |
|---|---|---|
| **Découverte** | 3 connecteurs, 1 entité | 99 € |
| **Standard** | 10 connecteurs, alertes, synthèse mensuelle | 229 € |
| **Avancé** | connecteurs illimités, multi-entités, revue trimestrielle | 399 € |

- **Pour :** aligné sur le **coût réel** si une API unifiée facture à la connexion active (modèle Chift, sur devis).
- **Contre :** le client est incité à connecter *moins* de sources, à l'inverse de la valeur recherchée. L'unité est technique et peu parlante pour un dirigeant d'association ou de PME sans DSI. Ce modèle ressemble à Databox (10 sources pour 199 $/mois), donc la comparaison directe se fait sur le prix.

### Recommandation
**Structure A (paliers selon l'effectif)**, avec deux garde-fous :
1. une limite de connecteurs sur Essentiel pour protéger la marge si l'API unifiée est facturée à la connexion ;
2. un **volet SI vendable seul en entrée** (proche de la structure B), à tester en entretien comme porte d'entrée si le prix de 149 € bloque les 20 à 49 salariés.

À tester en phase Marché : montrer les grilles A et B (test de préférence et de prix de type Van Westendorp en entretien) ; voir § 8.

---

## 3. Mix attendu et ARPA (revenu moyen par compte)

| Hypothèse | Valeur centrale | Statut |
|---|---|---|
| Mix des paliers Essentiel / Pilotage / Pilotage+ | 40 % / 40 % / 20 % | (H). Le fondateur vise surtout 50 à 250 salariés, mais les 20 à 49 seront les plus faciles à signer |
| Part des clients en annuel | 40 % | (H) |
| Part des clients ESS (remise 15 %) | 30 % | (H). Dépend du vivier réel (clients Tecnoo, établissements d'enseignement) |

Calcul :
- ARPA catalogue = 0,4 × 149 + 0,4 × 249 + 0,2 × 399 = **239,00 €**
- facteur annuel = 0,6 × 1 + 0,4 × 0,8 = 0,92
- facteur ESS = 0,7 × 1 + 0,3 × 0,85 = 0,955
- **ARPA net ≈ 239 × 0,92 × 0,955 ≈ 210 € HT/mois (H)**

---

## 4. Coûts variables par client (hypothèses explicites)

| Poste | Hypothèse centrale / client / mois | Fourchette | Commentaire |
|---|---|---|---|
| **API unifiée** (Chift / Apideck) pour compta et paie | 30 € | 0 à 50 € | (H). Tarif sur devis, selon le nombre de connexions actives (Chift). 0 € si les connecteurs sont développés en interne, mais le coût part alors en maintenance fixe (temps fondateur). **Devis à obtenir en phase 1/2.** Seuil d'alerte du studio : < 15 % du prix de vente (fiche idée H4), soit < 22 € sur Essentiel |
| Hébergement (quote-part VPS OVH, PostgreSQL, sauvegardes, stockage) | 2 € | 1 à 5 € | (H). VPS mutualisé entre ventures (INFRA studio) ; à recalculer quand le prix du VPS figurera dans `INFRA.md` |
| Emails transactionnels (Mailjet) | inclus ci-dessus | — | (H) volume faible (alertes, synthèse hebdomadaire) |
| Frais Stripe (paiement + Billing) | 2,5 % de l'ARPA, soit ≈ 5,25 € | 1 à 3 % | (H). **Barème non sourcé** : vérifier la page tarifs de Stripe France. Le prélèvement SEPA, en général moins cher que la carte, est à privilégier en B2B |
| LLM (commentaire mensuel en langage naturel) | 1 € | 0 à 3 € | (H). Fonction optionnelle, peu d'appels par mois |
| Facturation électronique (plateforme agréée, émission obligatoire au 1er septembre 2027) | 0,50 € | 0 à 1 € | (H). 1 facture/mois/client ; dépend de la plateforme choisie par Hasteria |
| **Support** (temps fondateur valorisé) | 0,5 h × 60 €/h = 30 € | 0,25 à 1 h | (H). 60 €/h = coût d'opportunité supposé du fondateur (H). C'est le premier poste : réautorisations de connecteurs (cf. PayFit sans refresh token, selon Nango), questions sur les données |
| **Total coûts variables** | **≈ 69 €** | 30 à 110 € | |

**Marge brute (H) :**
- scénario central (API unifiée + support) : (210 − 69) / 210 ≈ **67 %**, soit une contribution d'environ **141 €/client/mois** ;
- connecteurs internes (sans API unifiée) : coûts ≈ 39 €, marge ≈ **81 %**, mais avec une charge fixe de maintenance non comptée ici ;
- pessimiste (API 50 €, support 1 h) : coûts ≈ 119 €, marge ≈ **43 %**. Ce niveau est insuffisant pour un SaaS et oblige à revoir les prix ou le périmètre.

**Coût ponctuel d'onboarding (H) :** environ 3 h de fondateur par client (connexions, paramétrage, atelier indicateurs), soit ≈ 180 €. Il peut être couvert par des frais de mise en place (§ 7).

**Charges fixes hors temps fondateur (H) :** outils, quote-part VPS, minimum de facturation éventuel de l'API unifiée, assurance RC pro, domaine : ordre de grandeur supposé **300 €/mois (H)**, à remplacer par des devis. Avec une contribution de 141 €, **3 clients** couvrent ces charges de trésorerie. Le vrai point mort dépend de la rémunération du fondateur (à traiter dans le prévisionnel de la phase 3).

---

## 5. Clients nécessaires pour 3, 10 et 20 k€ de MRR

| Objectif de MRR | ARPA bas 150 € (H : mix tiré vers Essentiel, beaucoup d'ESS/annuel) | **ARPA central 210 € (H)** | ARPA haut 300 € (H : mix tiré vers 100 à 250 salariés) |
|---|---|---|---|
| 3 k€ | 20 | **15** | 10 |
| **10 k€** | 67 | **48** | 34 |
| 20 k€ | 134 | **96** | 67 |

Pour un **taux de churn mensuel de 2 % (H)**, garder 48 clients impose d'en remplacer environ 1 par mois, en plus de la croissance.

---

## 6. LTV, CAC tolérable et temps commercial d'un fondateur seul

### 6.1 LTV (formule du skill : ARPA × marge brute / churn)

| Churn mensuel (H) | Durée de vie moyenne | LTV (contribution 141 €/mois) |
|---|---|---|
| 1,5 % (bon : outil installé et branché sur un rituel CODIR) | ≈ 67 mois | ≈ 9 400 € |
| **2 % (central)** | **50 mois** | **≈ 7 060 €** |
| 3 % (outil « nice to have » abandonné, objection n° 1) | ≈ 33 mois | ≈ 4 710 € |

Aucun churn n'a été observé ni sourcé pour cette cible. Une durée de vie de plus de 4 ans est optimiste pour un produit neuf. Le churn est une **hypothèse sensible** : on le mesurera sur les clients pilotes.

### 6.2 CAC tolérable

| Contrainte | Calcul | CAC maximal |
|---|---|---|
| LTV/CAC ≥ 3 (churn 2 %) | 7 060 / 3 | ≈ 2 350 € |
| LTV/CAC ≥ 3 (churn 3 %) | 4 710 / 3 | ≈ 1 570 € |
| **Remboursement du CAC ≤ 12 mois** | 12 × 141 € | **≈ 1 700 €** |

**CAC tolérable en vente directe ≈ 1 500 à 1 700 € par client (H)**. La contrainte la plus serrée est le délai de remboursement de 12 mois. Sur Essentiel seul (contribution ≈ 149 − 69 = 80 €), le plafond tombe à **≈ 960 €** : un petit client ne supporte pas un cycle de vente long.

### 6.3 Temps commercial par client (vente directe, fondateur seul)

Entonnoir supposé pour un client signé **(H, aucune donnée de conversion disponible)** :

| Étape | Volume | Temps unitaire (H) | Temps total |
|---|---|---|---|
| Contacts qualifiés (réseau Tecnoo, LinkedIn, ESS) | 25 | 15 min | 6,25 h |
| Rendez-vous de découverte | 8 | 1 h (préparation comprise) | 8 h |
| Démonstrations sur les données du prospect | 4 | 1 h 30 | 6 h |
| Propositions | 2 | 1 h | 2 h |
| Signature et contrat | 1 | 1 h | 1 h |
| **Total** | | | **≈ 23 h par client** |

- CAC en temps : 23 h × 60 €/h ≈ **1 380 €**, plus environ 200 € de dépenses (outils, déplacements, événements ESS) (H), soit **≈ 1 580 €**. C'est **à la limite** du plafond de 1 700 €. Le modèle tient si le réseau du fondateur convertit mieux que cet entonnoir ; il casse si le cycle s'allonge (comités, conseils d'administration dans l'ESS).
- **Ratio LTV/CAC central ≈ 7 060 / 1 580 ≈ 4,5 ; remboursement ≈ 11 mois (H).**

### 6.4 Charge mensuelle du fondateur selon l'objectif

| Objectif | Clients | Délai visé (H) | Signatures brutes nécessaires (croissance + churn 2 %) | Signatures/mois | Commercial (23 h/signature) | Onboarding (3 h) | Support en fin de période (0,5 h/client) | **Total h/mois en fin de période** |
|---|---|---|---|---|---|---|---|---|
| 3 k€ | 15 | 12 mois | ≈ 17 | ≈ 1,4 | ≈ 33 h | ≈ 4 h | ≈ 8 h | **≈ 45 h** (≈ 1,5 j/semaine) |
| 10 k€ | 48 | 24 mois | ≈ 60 | ≈ 2,5 | ≈ 57 h | ≈ 8 h | ≈ 24 h | **≈ 89 h** (≈ 3 j/semaine) |
| 20 k€ | 96 | 36 mois | ≈ 131 | ≈ 3,6 | ≈ 84 h | ≈ 11 h | ≈ 48 h | **≈ 143 h** (temps plein) |

Ces totaux n'incluent **ni le développement ni la maintenance des connecteurs**.

**Lecture :**
- **3 k€ de MRR** est compatible avec un fondateur qui dirige déjà une ESN, en y consacrant environ 1,5 jour par semaine.
- **10 k€** demande environ 3 jours par semaine en vente, onboarding et support. C'est déjà difficile avec Tecnoo en parallèle. Il faudra réduire le temps commercial (contenus, entrants, démos de groupe) ou déléguer le support de niveau 1 (Tecnoo ?).
- **20 k€** n'est **pas atteignable seul** en vente directe pure : il faut un commercial ou un relais (Tecnoo, réseaux ESS, partenaires), ou bien un ARPA plus élevé.

---

## 7. Revenus complémentaires : services d'accompagnement (H)

| Service | Contenu (H) | Prix (H) | Temps (H) |
|---|---|---|---|
| **Mise en place** (forfait) | Connexion des sources, paramétrage, atelier indicateurs de 2 h, formation | 490 € (Essentiel) / 990 € (Pilotage, Pilotage+) | 4 à 8 h |
| **État des lieux SI** (porte d'entrée) | Cartographie des actifs, contrats, licences et risques ; restitution ; registre SI prérempli dans Lanternis | 1 500 à 3 000 € (2,5 à 5 j) | 2,5 à 5 j |
| **« DSI à temps partagé »** | 0,5 à 2 j/mois : arbitrages fournisseurs, sécurité, sauvegardes, feuille de route SI, appuyés sur Lanternis | 300 à 1 200 €/mois (TJM supposé 600 € HT) | 0,5 à 2 j/mois |

Le TJM de 600 € n'est pas sourcé : il faut le **remplacer par le TJM réel pratiqué par Tecnoo**.

**Ordre de grandeur à 48 clients (H) :**
- mise en place : 2,5 signatures/mois × ≈ 800 € en moyenne ≈ **2 000 €/mois** (non récurrent). Ce forfait couvre l'onboarding et réduit le CAC net ;
- DSI à temps partagé : 15 % des clients × 1 j/mois × 600 € ≈ 7 clients, soit **≈ 4 200 €/mois récurrents de service**, mais **7 jours/mois** de temps de prestation.

**Points d'attention :**
- Ce revenu de service ne doit **pas** être compté dans le MRR SaaS : à suivre à part.
- Il consomme le même temps fondateur que la vente. Un fondateur seul ne peut pas faire à la fois 10 k€ de MRR et 7 jours de DSI à temps partagé par mois.
- **Question d'entité, à trancher en ADR ou avec l'utilisateur** : le service est-il facturé par Hasteria (marque Lanternis) ou réalisé par Tecnoo SAS (ESN, consultants disponibles) avec un partenariat ? La deuxième option lève la contrainte de capacité et fait de Tecnoo un **canal de distribution**, mais crée une relation entre deux sociétés à encadrer (prix de transfert, conflit d'intérêts).
- Effet probable sur le churn : un client accompagné résilie moins **(H)**.

---

## 8. Hypothèses financières les plus sensibles, à tester en phase Marché

| Rang | Hypothèse | Valeur centrale | Effet d'un écart | Test en phase 2 | Critère |
|---|---|---|---|---|---|
| **1** | **Volonté de payer et ARPA net** (prix A acceptés, mix tiré vers 50 à 250 salariés) | 210 €/mois | ARPA à 150 € : 67 clients au lieu de 48 pour 10 k€ (+40 %) ; contribution d'Essentiel déjà faible | Grilles A et B montrées en fin d'entretien (Van Westendorp + choix de palier) ; landing avec prix affiché ; LOI ou acompte « pilote fondateur » | ≥ 3 LOI sur 10 à ≥ 149 € ; palier médian choisi ≥ Pilotage chez les 50 salariés et plus |
| **2** | **Temps commercial par client (CAC en vente directe)** | 23 h, CAC ≈ 1 580 € | À 35 h/client, le CAC ≈ 2 300 € dépasse le plafond de remboursement à 12 mois (≈ 1 700 €), et 10 k€ deviennent irréalisables par un fondateur seul | Chronométrer l'entonnoir réel sur 20 à 30 contacts (réseau Tecnoo, ESS) : taux de RDV, de démo, de proposition ; durée du cycle (CA ou bureau dans l'ESS) | ≥ 1 signature (ou LOI) pour 25 contacts ; cycle ≤ 60 jours |
| 3 | Churn mensuel | 2 % | À 3 %, la LTV baisse d'un tiers (≈ 4 710 €) | Pas mesurable avant les clients pilotes ; mesurer en entretien la présence d'un rituel (CODIR, bureau) qui ancre l'usage | ≥ 60 % des interviewés ont un rituel mensuel de pilotage |
| 4 | Coût de l'API unifiée par client | 30 € | À 50 € et plus, la marge descend sous 60 % et Essentiel devient non rentable | Devis Chift et Apideck sur 3 connecteurs × 50 comptes | < 15 % du prix de vente (< 22 € sur Essentiel) |
| 5 | Temps de support par client | 0,5 h/mois | À 1 h, + 30 €/client, marge ≈ 53 % | Prototype sur 3 pilotes ; journal des tickets | ≤ 0,5 h/mois après le 2e mois |
| 6 | Part de l'ESS et taux de remise | 30 % à −15 % | À 60 % d'ESS, l'ARPA baisse d'environ 4 % ; effet modéré | Compter les structures ESS dans le vivier ; demander leur budget et leur processus d'achat | Remise acceptée sans exigence de gratuité ou de subvention |
| 7 | Adoption du service DSI à temps partagé | 15 % des clients | Fort effet sur le revenu total et sur la capacité du fondateur | Question en entretien : « payeriez-vous 1 jour par mois de DSI ? à quel prix ? » | ≥ 2 sur 10 intéressés à ≥ 500 €/mois |

**Les deux hypothèses les plus sensibles sont n° 1 (ARPA / volonté de payer) et n° 2 (temps commercial / CAC en vente directe)**. Ensemble, elles déterminent si 10 k€ de MRR sont atteignables par un fondateur seul qui dirige déjà une ESN.

---

## 9. Ce que ce document ne couvre pas (renvois)
- Prévisionnel sur 36 mois en 3 scénarios et point mort avec la rémunération du fondateur : phase 3 (`3-bilan/business-model.md`, `3-bilan/previsionnel.csv`).
- Prix de l'API unifiée, barème Stripe, prix du VPS : chiffres à sourcer (devis, pages tarifs, `INFRA.md`).
- Benchmark détaillé des prix concurrents sur la tranche 20 à 250 salariés (Pennylane sur devis au-delà de 15 salariés) : analyste-concurrence, phase 2.
