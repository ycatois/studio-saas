---
venture: lanternis
phase: 2 Marché (révision de la stratégie de prix)
auteur: strategiste-marketing
date: 2026-10-26
statut: brouillon
skills: page-tarifs, analyse-prix, unit-economics
complète: prix.md § 4 (grille 149 / 249 / 399 €, à remplacer si le fondateur retient une des propositions ci-dessous), modele-revenus.md §§ 3 à 6
---

# Lanternis : trois propositions de grille tarifaire (cadre du fondateur du 2026-10-26)

> **Règle de lecture.**
> - **(H)** = hypothèse ou calcul fait à partir d'hypothèses. **Tous les prix proposés, les mix, les taux de conversion, les durées de support, les churns et les CAC de ce document sont des hypothèses (H)** : aucun entretien n'a encore eu lieu.
> - Les prix concurrents viennent de `prix.md` (relevé du 2026-10-25, sources de `benchmark.md`). Seule source nouvelle : le barème Stripe France (consulté le 2026-10-26, § 6.2).
> - Les fonctionnalités reprennent les modules **M0 à M12** et les priorités P1, P2 et P3 de `1-analyse/perimetre-produit.md`. Une fonctionnalité P2 ou P3 n'est **pas disponible à l'ouverture** : sur une future page de tarifs, elle doit être marquée « bientôt » ou ne pas figurer.
> - Le document **propose, il ne décide pas.** Le choix de la grille revient au fondateur.

**Cadre imposé par le fondateur (2026-10-26)** : essai gratuit d'un mois à 0 € ; un premier palier à **49 € HT/mois** ; un deuxième à **99 € HT/mois** ; éventuellement un troisième et un quatrième palier plus chers.
**Cadre studio** : B2B, prix HT, mensuel sans engagement, annuel à −20 %, facturation par Hasteria SASU via Stripe (métadonnée `marque=lanternis`).

---

## 0. En bref

| | **A. Forfait par taille** | **B. Modules** | **C. Prix par personne gérée** |
|---|---|---|---|
| Principe | Tout est inclus ; seul le nombre de personnes gérées fait le prix | On achète des briques : Registre, puis Arrivées et départs, puis Collaboration ; prix majoré à partir de 100 personnes | Un prix par personne gérée, avec un minimum, et trois niveaux de fonctionnalités |
| Prix | 49 / 99 / 179 / 279 € | 49 / 99 / 179 € (≤ 99 personnes) ; 79 / 159 / 279 € (100 à 249) | 1 / 2 / 3 € par personne et par mois, minimum 49 / 99 / 299 € |
| Revenu moyen net par client (H) | ≈ 113 € | ≈ 105 € | ≈ 171 € |
| CAC tolérable (H, remboursement en 12 mois) | ≈ 1 100 € | ≈ 1 020 € | ≈ 1 750 € |
| Clients pour 10 k€ de MRR (H) | ≈ 89 | ≈ 96 | ≈ 59 |
| Tient avec la vente directe (CAC ≈ 1 450 €) ? | **Non** (remboursement ≈ 16 mois) | **Non** (≈ 17 mois) | **Oui, de justesse** (≈ 10 mois) |

**Constat principal :** à 49 et 99 €, le revenu moyen par client est divisé par deux par rapport à l'ancienne grille (≈ 210 €, `modele-revenus.md`). **La vente directe du fondateur (CAC estimé ≈ 1 450 €) ne peut plus être le canal principal** ; elle doit être réservée aux structures de 100 à 249 personnes. Le reste doit venir de l'essai en libre-service, du blog, des réseaux ESS et des prestataires prescripteurs (§ 6.5).

---

## 1. Règles communes aux trois grilles

### 1.1 La métrique : la « personne gérée »
Reprise de la décision proposée D3 (`perimetre-produit.md` § 8) :
- **personne gérée** = personne au statut « présente » dans le registre, de type salarié, stagiaire ou alternant, intérimaire, prestataire externe équipé ;
- **les bénévoles sont gratuits** (souvent sans compte ni matériel, `perimetre-produit.md` § 1.5) : argument fort pour l'ESS ;
- les personnes parties ne comptent plus (leur fiche reste pour la preuve, puis est anonymisée) ;
- **ce n'est pas une facturation par utilisateur** : le nombre d'utilisateurs Lanternis (dirigeant, DAF, office manager, prestataire) ne change pas le prix, sauf mention contraire dans une offre d'entrée.

Comptage (H) : relevé automatique le 1er du mois, arrondi à la dizaine supérieure, visible en permanence dans l'écran « Abonnement ». En annuel, prix fixé à la souscription et régularisé à la date anniversaire.

### 1.2 Ce qui est dans toutes les offres, quelle que soit la grille
Garde-fous du périmètre et de la marque (`perimetre-produit.md` § 5.2) :
- **export CSV complet du registre** (M12, US-20) : jamais bridé (souveraineté, promesse de la landing) ;
- **import CSV et Excel** (M10) et **un connecteur d'annuaire** (Microsoft 365 **ou** Google Workspace, lecture seule) : sans eux, pas d'alerte A7 ni A8, donc pas de valeur ;
- **surveillance des domaines et certificats** (RDAP et TLS) ;
- **un prestataire invité** (M11) : levier contre le « cockpit vide » et canal de prescription ;
- MFA, hébergement en France (prévu), aucune donnée de mot de passe, aucun traceur publicitaire.

### 1.3 Remise ESS : proposition
Avec des prix d'entrée à 49 €, une remise de 15 % cumulée à l'annuel donne 33,32 €/mois en équivalent (49 × 0,8 × 0,85), soit une contribution d'environ 21 € par mois (H, § 6.2), qui ne paie aucun canal d'acquisition.

| Option | Effet sur 99 € en annuel | Avis (H) |
|---|---|---|
| a. Garder 15 %, cumulable avec l'annuel (règle actuelle de `prix.md` § 4.2) | 67,32 €/mois | Généreux, lisible, mais ronge la marge des petits paliers |
| **b. Garder 15 %, non cumulable avec l'annuel** (le client prend la meilleure des deux) | 79,20 €/mois (annuel) ou 84,15 € (mensuel ESS) | **Recommandé** : l'ESS garde un « tarif associatif » sans engagement, et le prix de 49 € reste lui-même un prix accessible |
| c. Supprimer la remise sur l'abonnement, la reporter sur la mise en place et les services (−15 %) | 79,20 €/mois | Cohérent avec l'idée que le vrai frein ESS est le temps de mise en place et le financement (DLA, `prix.md` § 4.2) ; à tester |

L'effet sur le revenu moyen est faible : avec 30 % de clients ESS et 40 % en annuel (H, `modele-revenus.md` § 3), le facteur net passe de 0,879 (option a) à 0,893 (option b). **Les calculs du § 6 utilisent l'option b (facteur 0,893).** Éligibilité ESS à valider juridiquement (loi n° 2014-856, `prix.md` § 4.2).

### 1.4 Offre « pilote fondateur » à revoir
La remise de −30 % pendant 12 mois sur 10 places (`STATUT.md`, arbitrage en attente) a été pensée pour 149 €. À 49 €, elle ramène le prix à 34,30 €. **Proposition (H)** : la remplacer par un **prix garanti 24 mois** et la **mise en place offerte**, contre un témoignage et un entretien mensuel. Non cumulable avec la remise ESS.

### 1.5 Services (modèle hybride, hors MRR)
Repris de `prix.md` § 4.3, sans changement de prix (H) :
- **Mise en place accompagnée** : 490 € HT (jusqu'à 99 personnes), 990 € HT (100 à 249) ; facultative, sauf indication contraire dans une offre.
- **DSI à temps partagé outillé** : + 390 €/mois (½ jour) ou + 690 €/mois (1 jour), engagement 6 mois.
- Point d'attention : à 49 €/mois, une mise en place à 490 € représente **10 mois d'abonnement**. Pour les petits paliers, elle ne sera achetée que rarement (H) ; l'essai doit donc fonctionner sans elle (§ 5).

---

## 2. Proposition A : forfait par tranche de personnes gérées (« tout inclus »)

### 2.1 Grille

| Offre | Personnes gérées | Mensuel HT | Annuel HT (équivalent mensuel) | ESS −15 %, mensuel (option b) |
|---|---|---|---|---|
| **Lanternis 49** | jusqu'à 49 | **49 €** | 470,40 €/an (39,20 €) | 41,65 € |
| **Lanternis 99** (mise en avant) | 50 à 99 | **99 €** | 950,40 €/an (79,20 €) | 84,15 € |
| **Lanternis 149** | 100 à 149 | **179 €** | 1 718,40 €/an (143,20 €) | 152,15 € |
| **Lanternis 249** | 150 à 249 | **279 €** | 2 678,40 €/an (223,20 €) | 237,15 € |
| Au-delà | 250 et plus | Sur devis | — | — |

Le nom de l'offre est le nombre maximal de personnes gérées : le client sait immédiatement laquelle le concerne.

### 2.2 Fonctionnalités par offre

| Module (`perimetre-produit.md` § 5.1) | Priorité | 49 | 99 | 149 | 249 |
|---|---|---|---|---|---|
| M0 Socle (comptes, MFA, rôles, journal) | P1 | ✓ | ✓ | ✓ | ✓ |
| M1 Personnes, fiche « qui a quoi » | P1 | ✓ | ✓ | ✓ | ✓ |
| M2 Matériel et cycle de vie | P1 | ✓ | ✓ | ✓ | ✓ |
| M3 Comptes, licences, abonnements | P1 | ✓ | ✓ | ✓ | ✓ |
| M4 Accès déclarés | P1 | ✓ | ✓ | ✓ | ✓ |
| M4 Revue périodique des accès | P2 | ✓ | ✓ | ✓ | ✓ |
| M5 Contrats, fournisseurs, coût du SI | P1 | ✓ | ✓ | ✓ | ✓ |
| M6 Domaines, certificats, sauvegardes | P1 | ✓ | ✓ | ✓ | ✓ |
| M7 Arrivées et départs, modèles personnalisables | P1 | ✓ | ✓ | ✓ | ✓ |
| M7 Changement de poste | P2 | ✓ | ✓ | ✓ | ✓ |
| M8 Alertes A1 à A16, digest, tableau de bord | P1 | ✓ | ✓ | ✓ | ✓ |
| M9 Documentation, passation, journal des incidents | P2 | ✓ | ✓ | ✓ | ✓ |
| M10 Import, M365 ou Google, RDAP/TLS | P1 | ✓ | ✓ | ✓ | ✓ |
| M10 Les deux annuaires (M365 **et** Google) | P1 | — | ✓ | ✓ | ✓ |
| M10 Connecteurs P2 (Qonto, Pennylane, Intune, ICS) | P2 | — | ✓ | ✓ | ✓ |
| M11 Utilisateurs Lanternis | P1 | illimités | illimités | illimités | illimités |
| M11 Prestataires invités | P1 | 1 | 2 | 3 | 5 |
| M11 Multi-sites, responsables de site | P2 | — | — | ✓ | ✓ |
| M12 Export CSV complet | P1 | ✓ | ✓ | ✓ | ✓ |
| M12 Synthèse mensuelle et attestations PDF | P2 | ✓ | ✓ | ✓ | ✓ |
| M12 API en lecture | P3 | — | — | — | ✓ |
| Service : revue annuelle d'1 h avec un DSI | — | — | — | ✓ | ✓ |

### 2.3 Limites, montée de gamme, mise en place
- **Limites** : nombre de personnes gérées (seule vraie limite) ; plafond large d'actifs anti-abus (H : 20 actifs par personne gérée), non affiché.
- **Ce qui pousse à monter** : uniquement la croissance de l'effectif, le multi-sites (dès 100) et la revue annuelle. **Peu de revenu d'expansion** : un client de 60 personnes paiera 99 € pendant des années.
- **Mise en place** : facultative et payante (§ 1.5). Pendant l'essai, une séance de démarrage collective gratuite (§ 5).

### 2.4 Points forts et faibles
| Points forts | Points faibles |
|---|---|
| La plus simple à comprendre et à vendre en libre-service : une ligne, un prix | Revenu moyen le plus bas avec B (≈ 113 €) ; CAC tolérable ≈ 1 100 € |
| Cohérente avec la landing actuelle (« un forfait par structure selon l'effectif, sans facturation par utilisateur ») | Aucun levier de montée de gamme par la valeur : la fonction vedette (départs) est donnée dès 49 € |
| Montre tout le produit à tous : bon pour l'activation pendant l'essai | Effet de seuil : à 99 puis 100 personnes, le prix passe de 99 à 179 € (+81 %) |
| Pas de comptabilité de modules à maintenir dans Stripe | À 249 personnes, 279 € ≈ 1,12 €/personne : le haut de tranche reste sous-valorisé (même faiblesse que l'ancienne grille, `prix.md` § 2) |

---

## 3. Proposition B : modules (SI de base, puis arrivées et départs, puis collaboration), avec une tranche de personnes

### 3.1 Grille

| Offre | Pour qui | Jusqu'à 99 personnes : mensuel HT | Annuel (équiv. mensuel) | 100 à 249 personnes : mensuel HT | Annuel (équiv. mensuel) |
|---|---|---|---|---|---|
| **Registre** | Savoir ce qu'on a, ce qu'on paie, ce qui expire | **49 €** | 470,40 €/an (39,20 €) | **79 €** | 758,40 €/an (63,20 €) |
| **Arrivées et départs** (mise en avant) | + ne rien oublier à l'arrivée et au départ, preuves à l'appui | **99 €** | 950,40 €/an (79,20 €) | **159 €** | 1 526,40 €/an (127,20 €) |
| **Collaboration** | + plusieurs intervenants, plusieurs sites, rapports pour le CA | **179 €** | 1 718,40 €/an (143,20 €) | **279 €** | 2 678,40 €/an (223,20 €) |
| Au-delà de 249 | | Sur devis | | | |

Remise ESS (option b) : −15 % en mensuel, non cumulable ; proposée **seulement à partir d'Arrivées et départs** (H) : le Registre à 49 € sert déjà de porte d'entrée accessible. À trancher par le fondateur.

### 3.2 Fonctionnalités par offre

| Module | Priorité | Registre | Arrivées et départs | Collaboration |
|---|---|---|---|---|
| M0 Socle | P1 | ✓ | ✓ | ✓ |
| M1 Personnes, fiche « qui a quoi » | P1 | ✓ | ✓ | ✓ |
| M2 Matériel et cycle de vie | P1 | ✓ | ✓ | ✓ |
| M3 Comptes, licences, abonnements | P1 | ✓ | ✓ | ✓ |
| M5 Contrats, fournisseurs, coût du SI | P1 | ✓ | ✓ | ✓ |
| M6 Domaines, certificats, sauvegardes | P1 | ✓ | ✓ | ✓ |
| M8 Alertes d'échéance et d'anomalie (A1 à A8, A10, A11, A16), digest, tableau de bord I1 à I6, I8 à I10 | P1 | ✓ | ✓ | ✓ |
| M10 Import, M365 ou Google, RDAP/TLS | P1 | ✓ | ✓ | ✓ |
| M4 Accès déclarés (applications, partages, coffres, boîtes partagées) | P1 | consultation seule (H) | ✓ | ✓ |
| M7 Arrivées et départs générés depuis le registre, tâches, preuves, rappels ; alertes A9, A12, A13 ; indicateur I7 | P1 | — | ✓ | ✓ |
| M7 Changement de poste | P2 | — | ✓ | ✓ |
| M4 Revue périodique des accès | P2 | — | ✓ | ✓ |
| M9 Fiche de passation, procédures | P2 | — | ✓ | ✓ |
| M9 Journal des incidents et demandes simples | P2 | — | — | ✓ |
| M11 Utilisateurs Lanternis | P1 | 3 | illimités | illimités |
| M11 Prestataires invités | P1 | 1 | 1 | illimités |
| M11 Multi-sites, responsables de site | P2 | — | — | ✓ |
| M12 Export CSV complet | P1 | ✓ | ✓ | ✓ |
| M12 Synthèse mensuelle et attestations de départ en PDF | P2 | — | attestations seulement | ✓ |
| M10 Connecteurs P2 (Qonto, Pennylane, Intune, ICS) | P2 | — | — | ✓ |
| M8 Règles d'alerte personnalisées (délais, destinataires) | P2 (H) | — | — | ✓ |
| M12 API en lecture | P3 | — | — | ✓ |

Point de vigilance : **A7 (compte encore actif après un départ) reste dans le Registre**. C'est l'alerte qui fait sentir le besoin de la check-list de départ, donc l'argument de montée vers « Arrivées et départs ».

### 3.3 Limites, montée de gamme, mise en place
- **Limites** : modules ; tranche de personnes (≤ 99 ou 100 à 249) ; 3 utilisateurs dans le Registre.
- **Ce qui pousse à monter** : le premier départ ou la première arrivée (déclencheur n° 1 de `personas.md`) ; la demande d'un CA ou d'un financeur (rapports PDF) ; l'ouverture d'un deuxième site ; un deuxième prestataire. Montée de gamme proposée **depuis l'alerte A7** (« Lancer la check-list de départ : disponible dans Arrivées et départs »).
- **Mise en place** : facultative et payante ; **incluse dans Collaboration en engagement annuel** (H).

### 3.4 Points forts et faibles
| Points forts | Points faibles |
|---|---|
| Fait payer la fonction vedette (M7) : le premier départ déclenche la montée de gamme | Revenu moyen le plus bas (≈ 105 €) ; CAC tolérable ≈ 1 020 € |
| Registre à 49 € pour 99 personnes : prix d'entrée très bas, bon pour le libre-service et l'ESS | Six prix à afficher (3 offres × 2 tranches) : la page de tarifs est la plus chargée |
| Lisible pour un dirigeant : chaque offre répond à une question (« qu'avons-nous ? », « rien n'est oublié ? », « à plusieurs ? ») | Risque que beaucoup de clients restent sur le Registre, qui ressemble à Corma ou GLPI : on perd la différenciation « personnes et preuves » à l'entrée |
| Proche de l'idée de la structure B de la phase 1 (« volet SI vendable seul en entrée ») | Pendant l'essai, il faut montrer M7 pour qu'il soit acheté : l'essai doit inclure Collaboration, puis le client redescend (frustration possible) |

---

## 4. Proposition C : prix par personne gérée, avec un minimum et trois niveaux de fonctionnalités

### 4.1 Grille

| Offre | Prix par personne gérée et par mois | Minimum mensuel HT | Annuel −20 % (par personne / minimum) | ESS −15 %, mensuel (option b) | Exemples : 40 / 75 / 125 / 200 personnes (mensuel) |
|---|---|---|---|---|---|
| **Essentiel** | **1,00 €** | **49 €** | 0,80 € / 39,20 € | 0,85 € / 41,65 € | 49 / 75 / 125 / 200 € |
| **Pilotage** (mise en avant) | **2,00 €** | **99 €** | 1,60 € / 79,20 € | 1,70 € / 84,15 € | 99 / 150 / 250 / 400 € |
| **Pilotage+** | **3,00 €** | **299 €** | 2,40 € / 239,20 € | 2,55 € / 254,15 € | 299 / 299 / 375 / 600 € |
| Au-delà de 249 personnes | Sur devis | | | | |

Comptage : § 1.1 (dizaine supérieure, relevé le 1er du mois, bénévoles gratuits).
**À noter pour le fondateur** : dans cette grille, **49 € et 99 € sont des minimums** (« dès 49 € », « dès 99 € »), pas des prix fixes. Une structure de 120 personnes paie 120 € en Essentiel et 240 € en Pilotage. Il faut vérifier que cette lecture respecte le cadre fixé.

### 4.2 Fonctionnalités par offre

| Module | Priorité | Essentiel | Pilotage | Pilotage+ |
|---|---|---|---|---|
| M0 Socle | P1 | ✓ | ✓ | ✓ |
| M1, M2, M3 Personnes, matériel, comptes et licences | P1 | ✓ | ✓ | ✓ |
| M4 Accès déclarés | P1 | ✓ | ✓ | ✓ |
| M4 Revue périodique des accès | P2 | — | ✓ | ✓ |
| M5 Contrats, fournisseurs, coût du SI | P1 | ✓ | ✓ | ✓ |
| M5 Décision de renouvellement tracée | P2 | — | ✓ | ✓ |
| M6 Domaines, certificats, sauvegardes | P1 | ✓ | ✓ | ✓ |
| M7 Arrivées et départs générés depuis le registre | P1 | ✓ (1 modèle d'arrivée + 1 de départ, ceux fournis) | ✓ modèles illimités, conditions | ✓ |
| M7 Changement de poste | P2 | — | ✓ | ✓ |
| M8 Alertes A1 à A16, digest, tableau de bord | P1 | ✓ | ✓ | ✓ |
| M8 Règles d'alerte personnalisées | P2 (H) | — | — | ✓ |
| M9 Passation, procédures, journal des incidents | P2 | — | ✓ | ✓ |
| M10 Import, M365 ou Google, RDAP/TLS | P1 | ✓ | ✓ | ✓ |
| M10 Connecteurs P2 (Qonto, Pennylane, Intune, ICS) | P2 | — | ✓ | ✓ |
| M11 Utilisateurs Lanternis | P1 | 3 | illimités | illimités |
| M11 Prestataires invités | P1 | 1 | 3 | illimités |
| M11 Multi-sites, responsables de site | P2 | — | — | ✓ |
| M12 Export CSV complet | P1 | ✓ | ✓ | ✓ |
| M12 Synthèse mensuelle et attestations PDF | P2 | — | ✓ | ✓ |
| M12 Historique consultable | — | 12 mois | illimité | illimité |
| M12 API en lecture | P3 | — | — | ✓ |
| Service : revue trimestrielle d'1 h avec un DSI | — | — | — | ✓ |
| Service : mise en place accompagnée | — | payante | payante | **incluse en annuel** |

### 4.3 Limites, montée de gamme, mise en place
- **Limites** : modèles de processus (forte différenciation, avis du product-owner § 5.2), utilisateurs, prestataires, historique, multi-sites.
- **Ce qui pousse à monter** : adapter les check-lists à sa façon de faire (Essentiel → Pilotage) ; présenter un rapport au CA ou à l'assureur ; plusieurs établissements ; le besoin d'un regard humain régulier (Pilotage+). Et, mécaniquement, **la croissance de l'effectif** augmente le prix sans changement d'offre (revenu d'expansion).
- **Mise en place** : payante, sauf en Pilotage+ annuel.

### 4.4 Points forts et faibles
| Points forts | Points faibles |
|---|---|
| **Meilleure économie** : revenu moyen ≈ 171 €, CAC tolérable ≈ 1 750 €, seule grille compatible avec un peu de vente directe | La facture varie avec l'effectif : moins prévisible pour une DAF d'association au budget voté (atténué par l'arrondi à la dizaine et le prix annuel fixe) |
| Le prix suit la valeur : une structure de 200 personnes a plus de comptes, de matériel et de départs qu'une de 60 | Contredit la phrase actuelle de la landing (« un forfait par structure selon l'effectif ») : il faut expliquer « par personne gérée, pas par utilisateur » |
| Comparaison directe et favorable avec Corma (dès 3 € par utilisateur) : « 1 € par personne, pour tout le SI » (H, § 7) | Incitation à ne pas enregistrer tout le monde ; parade : l'écart entre comptes actifs (connecteur) et personnes gérées est signalé au client (anomalie A10), pas sanctionné |
| Revenu d'expansion naturel quand le client grandit | Pilotage+ à 3 € = le prix d'entrée de Corma : la revue trimestrielle humaine doit le justifier |

---

## 5. L'essai gratuit d'un mois (commun aux trois grilles)

### 5.1 Avec ou sans carte bancaire
**Recommandation (H) : sans carte bancaire, mais avec qualification à l'inscription.**
- Pour : en B2B, beaucoup de structures paient par prélèvement SEPA ou virement sur facture ; dans l'ESS, la carte de l'association est rarement entre les mains de la DAF au moment de l'essai (H, à vérifier en entretien) ; une carte exigée bloque l'essai pendant qu'on attend la validation interne.
- Contre : sans carte, il y aura plus d'essais peu sérieux, et chaque essai coûte du temps d'accompagnement (§ 5.3).
- Parade : à l'inscription, demander le SIREN ou le RNA, la tranche d'effectif et la fonction ; vérifier l'existence de la structure (API publique de recherche d'entreprises, à confirmer par l'architecte) ; email professionnel obligatoire. Les essais hors cible (moins de 20 personnes, particuliers) restent possibles mais **sans accompagnement humain**.
- Aucun taux de conversion comparé « avec carte / sans carte » n'a été sourcé : **à mesurer**, éventuellement par un test sur deux cohortes après l'ouverture.

### 5.2 Ce qui est inclus
- **Toutes les fonctionnalités P1 du niveau le plus complet hors service** (A : tout ; B : Collaboration ; C : Pilotage), pour que le client voie la check-list de départ et le tableau de bord. À la fin, il choisit son offre ; le passage à une offre inférieure lui montre ce qu'il perd.
- Limites pendant l'essai (H) : un seul connecteur d'annuaire ; pas d'API ; services non inclus (sauf la séance de démarrage).
- **Aucune action sur le SI du client** : lecture seule, comme en production.

### 5.3 L'accompagnement contre le « cockpit vide » (`pre-mortem.md` R1)
Le risque : un essai qui commence par un écran vide et se termine sans avoir rien montré. Le parcours vise un **premier constat utile en moins de 48 heures** (un compte orphelin, des licences payées sans utilisateur, une échéance proche).

| Moment | Action | Qui | Coût en temps (H) |
|---|---|---|---|
| J0 | Assistant de démarrage dans l'application : 1. importer la liste du personnel (gabarit Excel) ; 2. connecter Microsoft 365 ou Google ; 3. ajouter ses domaines ; 4. inviter son prestataire | Produit | 0 |
| J0 | Email de bienvenue avec le gabarit Excel et le lien vers la séance de démarrage | Automatique (brouillon à valider) | 0 |
| J1 à J7 | **Séance de démarrage collective en visio de 45 min, chaque semaine** (plusieurs structures) | Fondateur ou Tecnoo | ≈ 0,15 h par essai |
| J2 à J5 | **Séance individuelle de 30 min**, proposée seulement aux structures de 100 personnes et plus, ou au niveau 99 € et au-dessus | Fondateur | 0,5 h |
| J3 | Si l'import n'est pas fait : email « envoyez-nous votre fichier, nous l'importons pour vous » | Fondateur | 0,25 h si accepté |
| J7 | Premier digest hebdomadaire réel | Automatique | 0 |
| J14 | Bilan de mi-parcours : écran « Ce que Lanternis a déjà trouvé » (comptes orphelins, licences libres, échéances à 90 j, sauvegardes non testées) | Produit | 0 |
| J21 | Proposition de la mise en place accompagnée à ceux qui n'ont pas activé | Fondateur | 0,25 h |
| J25 | Rappel de fin d'essai, choix de l'offre, possibilité de **prolonger de 15 jours** pour une validation en bureau ou en CA (cycle ESS, `pre-mortem.md` R11) | Automatique + fondateur | 0 |

**Règle d'économie (H)** : l'accompagnement individuel coûte environ 1 h par essai, soit 60 € (`modele-revenus.md`, 60 €/h). Si 1 essai sur 5 devient client, cela fait **≈ 300 € de CAC rien que pour l'essai**, plus que ce que tolère le palier à 49 € (§ 6.2). D'où : **séances collectives pour les petites structures, séance individuelle seulement pour les 100 personnes et plus**.

### 5.4 Ce qui se passe à la fin
- **Sans souscription** : l'espace passe en **lecture seule pendant 30 jours**, avec l'export CSV complet disponible. Les **jetons des connecteurs sont révoqués le jour de la fin de l'essai** (sécurité). Emails à J+0, J+23 et J+29.
- **Suppression définitive à J+30** après la fin de l'essai, sauf demande de suppression immédiate (bouton « Supprimer maintenant »). Durée proposée, **à valider par juriste-rgpd** (Hasteria est sous-traitante pour les données des personnes du registre, `perimetre-produit.md` § 1.5).
- **Avec souscription** : rien ne change, les données sont conservées ; la première facture part le jour de la souscription.

### 5.5 Indicateurs de l'essai (objectifs H, à mesurer dès les premières cohortes)
| Indicateur | Définition | Objectif (H) |
|---|---|---|
| **Taux d'activation** | Part des essais qui, sous 14 jours, ont : importé ou créé au moins 80 % de leurs personnes, connecté un annuaire (ou importé le matériel), saisi au moins 3 contrats ou abonnements avec une échéance | ≥ 50 % |
| Délai du premier constat | Temps entre l'inscription et la première alerte réelle | ≤ 48 h |
| Couverture du registre (I9) | Part des comptes rapprochés d'une personne à J14 | ≥ 80 % (critère MVP du product-owner) |
| **Conversion essai → payant** | Essais devenus clients payants dans les 15 jours qui suivent la fin | ≥ 20 % des essais qualifiés ; ≥ 35 % des essais activés |
| Part de l'annuel à la conversion | | ≥ 30 % |
| Offre choisie | Répartition par offre | A : ≥ 50 % au-dessus de 49 € ; B : ≥ 60 % en Arrivées et départs ou plus ; C : ≥ 60 % en Pilotage ou plus |
| Coût d'accompagnement par essai | Heures × 60 € | ≤ 25 € en moyenne |

Aucune de ces valeurs n'est un repère de marché : ce sont des objectifs internes à recaler après les 20 premiers essais.

---

## 6. Unit economics comparées (toutes les valeurs sont des hypothèses)

### 6.1 Hypothèses communes

| Hypothèse | Valeur (H) | Origine |
|---|---|---|
| Répartition des clients par taille | 30 % jusqu'à 49 personnes ; 35 % de 50 à 99 ; 20 % de 100 à 149 ; 15 % de 150 à 249 | H. Les ESS de 20 à 49 pèsent environ 30 % du SAM en nombre (8 351 sur ≈ 28 000, `marche-tam-sam-som.md`, lui-même en partie H) |
| Effectif moyen par tranche (pour C) | 40 (minimum appliqué) / 75 / 125 / 200 | H |
| Part en annuel / part ESS | 40 % / 30 % ; remise ESS non cumulable (option b) → facteur net 0,893 | `modele-revenus.md` § 3 (H) |
| Mix des offres | B : Registre 35 %, Arrivées et départs 45 %, Collaboration 20 % ; tranche ≤ 99 : 65 %, 100 à 249 : 35 %. C : Essentiel 35 %, Pilotage 45 %, Pilotage+ 20 % (indépendant de la taille, simplification) | H |
| Churn mensuel | 2 % (central), 3 % (prudent, plus probable sur les petits paliers en libre-service) | `modele-revenus.md` § 6 (H) |
| Temps du fondateur | 60 €/h | `modele-revenus.md` (H) |

### 6.2 Coûts variables revus (sans API unifiée)
Le nouveau périmètre ne prévoit **aucun connecteur financier au MVP** ; Qonto et Pennylane arrivent en P2 avec les jetons du client ; les agrégateurs bancaires (Bridge, Powens) seulement en P3, sur devis (`perimetre-produit.md` § 4). Le poste « API unifiée » de 30 € disparaît donc ; le coût de maintenance des connecteurs devient une **charge fixe** (temps du fondateur), non comptée ici.

| Poste | Hypothèse par client et par mois | Commentaire |
|---|---|---|
| API unifiée | **0 €** | Était 30 € dans `modele-revenus.md` § 4. À réintroduire si un agrégateur DSP2 est retenu en P3 |
| Hébergement (quote-part du VPS, sauvegardes) et emails Mailjet | 2 € | `modele-revenus.md` (H) |
| Facturation électronique | 0,50 € | `modele-revenus.md` (H) |
| Paiement Stripe | **≈ 2,2 % du prix + 0,25 €** (cas prudent : carte) | **Sourcé** : cartes de l'EEE 1,5 % + 0,25 € ; prélèvement SEPA 0,35 € ; Stripe Billing 0,7 % du volume (https://stripe.com/fr/pricing, consulté le 2026-10-26). En SEPA, le coût tombe à ≈ 0,35 € + 0,7 % |
| LLM | 0 € | Aucune fonction de rédaction automatique dans le périmètre P1 (H) |
| **Support (temps fondateur)** | **0,15 h (9 €)** pour les offres à 49-79 € ; **0,25 h (15 €)** à 99-159 € ; **0,4 h (24 €)** au-dessus ; + **0,33 h (20 €)** pour la revue trimestrielle de Pilotage+ (C) | Était 0,5 h pour tous. **Hypothèse la plus sensible** : à 49 €, une demi-heure de support par mois (30 €) laisserait ≈ 15 € de contribution |

Contribution mensuelle par offre (prix catalogue mensuel, hors ESS, H) :

| Offre | Prix | Coûts variables | **Contribution** | CAC max. pour un remboursement en 12 mois |
|---|---|---|---|---|
| 49 € (A, B Registre ≤ 99, C Essentiel au minimum) | 49 € | ≈ 12,8 € | **≈ 36 €** | **≈ 430 €** |
| 49 € en annuel ESS (option a, cumul) | 33,32 € | ≈ 12,5 € | ≈ 21 € | ≈ 250 € |
| B Registre 100-249 | 79 € | ≈ 13,5 € | ≈ 65 € | ≈ 790 € |
| 99 € (A, B, C Pilotage au minimum) | 99 € | ≈ 19,9 € | **≈ 79 €** | **≈ 950 €** |
| B Arrivées et départs 100-249 | 159 € | ≈ 21,3 € | ≈ 138 € | ≈ 1 650 € |
| A 149 ou B Collaboration ≤ 99 | 179 € | ≈ 30,7 € | ≈ 148 € | ≈ 1 780 € |
| A 249 ou B Collaboration 100-249 | 279 € | ≈ 32,9 € | ≈ 246 € | ≈ 2 950 € |
| C Pilotage, 125 personnes | 250 € | ≈ 23,3 € | ≈ 227 € | ≈ 2 720 € |
| C Pilotage+, 125 personnes | 375 € | ≈ 55 € | ≈ 320 € | ≈ 3 840 € |

### 6.3 Comparaison des trois grilles

| | **A** | **B** | **C** | Rappel : ancienne grille (149/249/399) |
|---|---|---|---|---|
| Revenu moyen catalogue | 0,30 × 49 + 0,35 × 99 + 0,20 × 179 + 0,15 × 279 = **127,0 €** | 0,65 × 97,5 + 0,35 × 155,0 = **117,6 €** | 0,35 × 96,0 + 0,45 × 192,2 + 0,20 × 359,4 = **191,9 €** | 239 € |
| **Revenu moyen net par client (× 0,893)** | **≈ 113 €** | **≈ 105 €** | **≈ 171 €** | ≈ 210 € |
| Coûts variables moyens | ≈ 21,6 € | ≈ 19,8 € | ≈ 25,2 € | ≈ 69 € (avec API et 0,5 h de support) |
| **Marge brute** | **≈ 81 %** | **≈ 81 %** | **≈ 85 %** | ≈ 67 % |
| Contribution par client et par mois | ≈ 92 € | ≈ 85 € | ≈ 146 € | ≈ 141 € |
| **Clients pour 3 k€ de MRR** | 27 | 29 | 18 | 15 |
| **Clients pour 10 k€** | 89 | 96 | 59 | 48 |
| **Clients pour 20 k€** | 177 | 191 | 117 | 96 |
| LTV (churn 2 % / 3 %) | ≈ 4 590 € / 3 060 € | ≈ 4 260 € / 2 840 € | ≈ 7 310 € / 4 870 € | ≈ 7 060 € / 4 710 € |
| CAC max. pour LTV/CAC ≥ 3 (churn 2 % / 3 %) | ≈ 1 530 € / 1 020 € | ≈ 1 420 € / 950 € | ≈ 2 440 € / 1 620 € | ≈ 2 350 € / 1 570 € |
| CAC max. pour un remboursement ≤ 12 mois | ≈ 1 100 € | ≈ 1 020 € | ≈ 1 750 € | ≈ 1 700 € |
| **CAC tolérable** (le plus serré des deux, churn 2 %) | **≈ 1 100 €** | **≈ 1 020 €** | **≈ 1 750 €** | ≈ 1 700 € |
| Remboursement d'un CAC de 1 450 € | **≈ 16 mois** | **≈ 17 mois** | **≈ 10 mois** | ≈ 10 mois |
| LTV/CAC à 1 450 € (churn 2 % / 3 %) | 3,2 / 2,1 | 2,9 / 2,0 | 5,0 / 3,4 | 4,9 / 3,2 |
| Signatures brutes pour 10 k€ en 24 mois (≈ 1,24 × le nombre de clients, churn 2 %) | ≈ 110, soit 4,6 par mois | ≈ 119, soit 5,0 par mois | ≈ 73, soit 3,0 par mois | ≈ 60, soit 2,5 par mois |
| Temps de vente si tout passe par la vente directe (23 h par signature, `modele-revenus.md` § 6.3) | ≈ 106 h/mois | ≈ 114 h/mois | ≈ 70 h/mois | ≈ 57 h/mois |

Lecture :
1. **La marge brute s'améliore** (≈ 81 à 85 %) parce que l'API unifiée disparaît et que le support est supposé plus léger. Le problème n'est pas la marge, c'est **le montant absolu de la contribution** face au coût d'acquisition.
2. **C est la seule grille dont l'économie est comparable à l'ancienne** : la facturation par personne fait payer davantage les 100 à 249 personnes, segment prioritaire.
3. A et B demandent **50 à 60 % de clients de plus** que C pour le même MRR. Pour 20 k€, il faut 177 à 191 clients, **au-delà du SOM à 36 mois** (60 à 100 clients, `marche-tam-sam-som.md`, calculé sur la capacité de vente directe d'un fondateur). Le SOM n'est atteignable avec A ou B qu'avec des canaux qui ne consomment pas le temps du fondateur.
4. Sensibilités (H) : le levier le plus fort est **le mix vers les grandes structures et les offres hautes** (en C, +10 points de Pilotage+ au détriment d'Essentiel ajoutent ≈ 23 € de revenu moyen catalogue) ; ensuite **le churn** (2 → 3 % retire un tiers de la LTV) ; ensuite **le temps de support** (+0,25 h par client = −15 € de contribution, soit −16 % pour A).

### 6.4 La tension : des prix bas contre un CAC de vente directe d'environ 1 450 €

> **À 49 €, un client met environ 40 mois à rembourser un CAC de 1 450 € ; à 99 €, environ 18 mois.** La vente directe du fondateur (prospection, rendez-vous, démonstration) n'est rentable que pour les offres à partir d'environ 159 à 179 € par mois, c'est-à-dire les structures de 100 personnes et plus.

Conséquences proposées (H) :
- **Vente directe (prospection par email et téléphone, C2 d'`acquisition.md`) : réservée aux 100 à 249 personnes** et aux offres hautes. C'était déjà la priorité ; cela devient une règle.
- **Aucun rendez-vous commercial individuel pour une structure de moins de 50 personnes** : essai en libre-service, séance collective, contenus.
- **La mise en place payante** (490 à 990 €) réduit le CAC net seulement là où elle se vend : surtout au-dessus de 100 personnes (H).
- **Les 10 places « pilote fondateur » et le réseau Tecnoo** (C1, CAC ≈ 950 €) restent utiles pour les premiers clients et les témoignages, pas pour la croissance.

### 6.5 Canaux à moindre coût qu'il faudrait alors
Plafonds à respecter (H) : ≈ 430 € pour une offre à 49 €, ≈ 950 € à 99 €, ≈ 1 100 € en moyenne pour A, ≈ 1 750 € pour C.

| Canal | Pour quelle cible | CAC possible (H) | Condition | Statut |
|---|---|---|---|---|
| **Essai en libre-service** (inscription, assistant, séance collective) | Toutes, surtout jusqu'à 99 personnes | ≈ 250 à 450 € : coût du trafic + ≈ 15 à 60 € d'accompagnement par essai × 5 essais par client (conversion de 20 %) | Activation sans humain ; produit prêt au premier jour | À construire (produit) |
| **Blog SEO et autodiagnostic SI** (déjà canal principal de contenu) | P1 et P2, petites structures | ≈ 2 000 € la première année puis moins (`acquisition.md` C7, très fragile) ; ≈ 180 € par client si 10 essais par mois à maturité pour 360 € de contenu (H) | Volumes de recherche **non mesurés** (`signaux-demande.md` § 3) | En cours (2 articles en brouillon) |
| **Réseaux ESS et fédérations** en *one-to-many* (CRESS, Nexem, Fehap, Uniopss) ; référencement **Solidatech** (`prix.md` [32]) | P2, ESS de 20 à 249 | ≈ 1 300 à 1 700 € par webinaire converti en vente individuelle (`acquisition.md` C4) ; **beaucoup moins si le webinaire renvoie vers l'essai au lieu d'un rendez-vous** (H) | Un relais qui diffuse ; conditions de Solidatech à vérifier | À tester (pré-lancement) |
| **Prestataires informatiques prescripteurs** (et Tecnoo) | P1 et P2 | ≈ 800 à 1 050 € (`acquisition.md` C6, commission de 20 % la 1re année) ; la commission baisse avec le prix (≈ 270 € la 1re année sur 113 €) | Le prestataire invité découvre l'outil chez un client et le recommande à d'autres (boucle virale, `perimetre-produit.md` US-02) ; concurrence de Primo et Corma sur les MSP | Sondé par 3 entretiens |
| Page Facebook (associations) | P2 | Inconnu | Test de 6 semaines déjà préparé | Brouillon |
| Prospection directe sur déclencheurs | P1, **100 à 249 seulement** | ≈ 1 400 à 2 200 € (`acquisition.md` C2) | Offres ≥ 159 € | Préparée |

Exemple de mix à 18 mois (H) : 40 % libre-service à ≈ 300 €, 20 % réseaux ESS à ≈ 1 300 €, 20 % prescripteurs à ≈ 820 €, 20 % vente directe à ≈ 1 450 € → **CAC moyen ≈ 830 €**, sous le plafond de A (≈ 1 100 €) et de C (≈ 1 750 €), au-dessus de celui des offres à 49 € (≈ 430 €), qui doivent donc venir presque uniquement du libre-service.

---

## 7. Positionnement face aux concurrents

Prix repris de `prix.md` § 1 (relevé du 2026-10-25). Les calculs à 50, 100 et 200 personnes sont des **calculs de l'analyste (H)** : 1 personne = 1 utilisateur pour Corma ; prix « dès », sans remise.

| Acteur | Prix public | Métrique | Source | 50 personnes | 100 personnes | 200 personnes |
|---|---|---|---|---|---|---|
| **Corma** Essential | dès 3 €/mois, engagement annuel ; freemium 10 applis ; jusqu'à −50 % sous 50 utilisateurs | par utilisateur ; HT non précisé | https://www.corma.io/pricing [39] | ≈ 150 € | ≈ 300 € | ≈ 600 € |
| **Cledara** Basic | 100 £/mois (gratuit sous condition d'usage des cartes) ; modules IT, conformité, optimisation 150 £/mois chacun ; −16 % en annuel | forfait par palier | https://www.cledara.com/pricing [15] | 100 £ ; 250 £ avec le module IT | idem | Premium sur démo |
| **GLPI Network** Cloud | 19 € HT/mois par agent IT ; auto-hébergé avec support 100 à 4 500 €/mois | par agent | https://www.glpi-project.org/tarifs [1] | 19 € (1 agent) | 19 € | 19 € |
| **DSI à temps partagé** | 700 à 1 400 €/jour (management de transition, oct. 2026) ; 800 à 1 500 €/jour (2017) | par jour | https://www.freelance-solution.fr/tarif-freelance/tjm-consultant/ [24] ; Le Monde Informatique 2017 [23] | 700 à 1 400 € pour 1 j/mois | idem | idem |
| **Lanternis A** | | forfait par tranche | ce document (H) | 99 € | 179 € | 279 € |
| **Lanternis B** (Arrivées et départs) | | module + tranche | (H) | 99 € | 159 € | 159 € |
| **Lanternis C** (Pilotage / Pilotage+) | | par personne gérée | (H) | 100 € / 299 € | 200 € / 300 € | 400 € / 600 € |

Lecture (H) :
- **Face à Corma** : avec A et B, Lanternis devient **moins cher que Corma** à taille égale, avec un périmètre plus large (matériel, contrats non SaaS, domaines, sauvegardes, arrivées et départs prouvés). C'est un argument fort mais à double tranchant : un prix trop bas peut faire douter du sérieux (question Van Westendorp « trop bon marché », `prix.md` § 5). Avec C, Pilotage est à 2 € contre « dès 3 € » : on garde l'écart favorable sans brader. Message possible : « Corma gère vos SaaS ; Lanternis tout votre SI, pour moins cher par personne. » À ne pas publier avant vérification du prix Corma le jour de la mise en ligne (prix « dès », HT non précisé).
- **Face à Cledara** : anglophone, centré sur les cartes et les SaaS ; 100 £ en entrée. Lanternis 49 ou 99 € se place au même niveau ou en dessous, en français et hébergé en France.
- **Face à GLPI** : GLPI reste bien moins cher par agent, mais suppose un technicien pour l'alimenter. Lanternis ne joue pas sur le prix face à GLPI : il s'adresse à la direction. Un prestataire qui utilise GLPI peut être prescripteur (import GLPI en P3).
- **Face au DSI à temps partagé** : 99 € par mois ≈ 1/7 à 1/14 d'une journée (700 à 1 400 €). **Ancre de prix à utiliser** : « moins qu'une heure de DSI par mois » (700 € ÷ 7 h ≈ 100 €/h, calcul H). La revue trimestrielle de Pilotage+ (C) et le DSI à temps partagé outillé (+ 390 €) font le pont entre outil et service.

---

## 8. Recommandation (le fondateur décide)

**Proposition : retenir C (prix par personne gérée, dès 49 €), avec des aménagements empruntés à A et B.**
1. **Pourquoi C** : c'est la seule grille qui respecte le cadre (49 €, 99 €, puis plus cher) **sans casser l'économie** : revenu moyen ≈ 171 € contre ≈ 105 à 113 €, CAC tolérable ≈ 1 750 €, remboursement d'un CAC de vente directe en ≈ 10 mois. Elle fait payer davantage le segment prioritaire (100 à 249 personnes) et se compare favorablement à Corma.
2. **Aménagement de A (simplicité)** : afficher sur la page de tarifs un **simulateur** (« 120 personnes → 120 € / 240 € / 360 € par mois ») et des **exemples par taille**, avec facturation arrondie à la dizaine et prix fixe sur l'année en annuel. Le client doit lire un prix, pas une formule.
3. **Aménagement de B (montée de gamme par la valeur)** : garder la check-list de départ dans Essentiel (modèles fournis), mais réserver la **personnalisation des modèles, le changement de poste et les attestations PDF** à Pilotage. La montée de gamme part de l'alerte A7 et du premier départ.
4. **Remise ESS** : garder 15 %, **non cumulable** avec l'annuel (option b) ; bénévoles gratuits. **Pilote fondateur** : prix garanti 24 mois et mise en place offerte plutôt que −30 %.
5. **Essai** : un mois sans carte, toutes les fonctions de Pilotage, séance collective hebdomadaire, séance individuelle seulement à partir de 100 personnes ; lecture seule et export 30 jours après la fin, puis suppression.

**Si le fondateur tient à des prix fixes** (49 € et 99 € comme prix et non comme minimums) : **A** est la meilleure alternative (la plus simple, la plus proche de la landing actuelle), à condition d'accepter que **la vente directe ne serve qu'aux 100 à 249 personnes** et que la croissance repose sur le libre-service. **B** n'est à préférer que si les entretiens montrent que le départ d'un salarié est un déclencheur d'achat assez fort pour faire monter de gamme (Q1, Q13, Q14 de `perimetre-produit.md` § 7.2).

### 8.1 Questions à tester en entretien
À ajouter à `script-interview.md` par l'analyste-marche, **après** l'exploration de la douleur (Mom Test) :
1. « Combien de personnes utilisent votre informatique : salariés, intérimaires, prestataires, bénévoles ? Qui faudrait-il compter ? » (métrique « personne gérée »).
2. Montrer A et C pour sa taille : « Laquelle vous paraît la plus juste ? Laquelle passerait le plus facilement chez votre DAF, votre bureau ou votre CA ? »
3. « Une facture qui suit votre effectif chaque mois, est-ce un problème ? Préférez-vous un prix fixe à l'année ? »
4. Van Westendorp sur l'offre centrale (`prix.md` § 5), en ajoutant la question « en dessous de quel prix douteriez-vous du sérieux ? » : **vérifier que 49 € et 99 € ne sont pas perçus comme trop bas** pour un outil qui contient des données nominatives.
5. « Pour essayer un mois, accepteriez-vous de donner une carte bancaire ? Qui, chez vous, a la carte ? Qui doit valider un essai ? »
6. « Si l'outil est vide le premier jour, combien de temps acceptez-vous d'y passer pour le remplir ? Paieriez-vous 490 € pour qu'on le fasse avec vous ? »
7. « Entre 99 € seul et 99 € + une revue trimestrielle d'une heure avec un DSI pour 299 €, que choisiriez-vous ? »
8. ESS : « Une remise de 15 % change-t-elle la décision ? Préférez-vous une remise sur l'abonnement ou sur la mise en place ? Un financement DLA est-il envisageable ? »
9. « Votre prestataire informatique recommanderait-il cet outil à ses autres clients ? Que faudrait-il pour qu'il le fasse ? » (canal prescripteur).
10. Lettre d'intention : la recalibrer sur la nouvelle grille (voir ci-dessous).

**Critères de validation à revoir** (aujourd'hui « ≥ 3 lettres d'intention à ≥ 149 € HT/mois », hypothèse 3 de `STATUT.md`) : proposition (H) **≥ 3 lettres d'intention à ≥ 99 € HT/mois, dont au moins 1 structure de 100 personnes et plus à ≥ 200 €**. À arbitrer par le fondateur et le comité de décision.

### 8.2 Incidence sur la landing (à mettre à jour par cro-conversion et brand-manager ; non modifiée ici)
Fichiers : `marketing/landing/validation.html` (section `#tarifs`) et `marketing/landing/validation.md` (§ 5, bloc 10, et FAQ).
- Phrase phare : « À partir de 149 € HT par mois » → **« À partir de 49 € HT par mois. Un mois d'essai gratuit. »**
- Ligne de métrique : A garde « un forfait par structure selon l'effectif, sans facturation par utilisateur » ; C impose **« par personne gérée, pas par utilisateur ; bénévoles gratuits »**.
- Tableau des 3 tranches (149 / 249 / « à partir de 399 € ») à remplacer par la grille retenue, avec des exemples par taille ; marquer « bientôt » les fonctions P2.
- Mise en place : « 490 à 990 € HT envisagés » reste valable, mais devient **facultative** (l'essai gratuit est la porte d'entrée).
- Remise ESS : préciser « non cumulable avec l'engagement annuel » si l'option b est retenue.
- Bouton secondaire et FAQ : ajouter l'essai d'un mois (sans carte si retenu) et le sort des données à la fin de l'essai.
- Le prix affiché servait de **filtre de qualification** (`validation.md`, H3) : à 49 €, ce filtre s'affaiblit ; la qualification repose alors sur les champs « type » et « effectif » du formulaire, déjà prévus.
- Rappel : la page n'est pas publiée ; toute mise en ligne demande la validation du fondateur.

---

## 9. Points ouverts et hypothèses à vérifier

1. **Lecture du cadre** : en C, 49 € et 99 € sont des minimums. Le fondateur doit confirmer que c'est acceptable.
2. **Temps de support** de 0,15 à 0,4 h par client et par mois : hypothèse la plus sensible pour les petits paliers. À mesurer sur les pilotes.
3. **Taux d'activation et de conversion de l'essai** : aucune donnée ; objectifs internes seulement.
4. **Effet des prix bas sur la perception de sérieux** (données nominatives, sécurité) : à tester (question Van Westendorp « trop bon marché »).
5. **Documents devenus incohérents (à reprendre par leurs auteurs, non modifiés ici)** :
   - `prix.md` § 4 et `modele-revenus.md` §§ 2 à 6 : grille 149 / 249 / 399 €, ARPA ≈ 210 €, coût d'API unifiée de 30 € ;
   - `marche-tam-sam-som.md` : les valeurs en euros du TAM et du SAM reposent sur des paniers de 1 645 et 3 411 €/an ; avec les nouvelles grilles, elles baissent d'environ moitié (H) ; le SOM en nombre de clients doit être relu au regard des 89 à 191 clients nécessaires ;
   - `acquisition.md` § 3.2 : plafonds de CAC par segment calculés sur l'ancienne grille ; les ESS de 20 à 49 n'ont plus que ≈ 250 à 430 € de CAC tolérable ;
   - `STATUT.md`, hypothèses 3 et 5 : seuil de 149 € et CAC ≤ 1 500 à 1 700 € ;
   - décision du 2026-10-25 excluant les PME marchandes de 20 à 49 du SAM « faute de CAC couvert en vente directe » : avec un essai en libre-service à 49 €, elles pourraient venir sans prospection. **À signaler au comité de décision, sans changer le SAM ici.**
6. **Prix Corma** : « dès 3 € », HT non précisé, remises possibles : à revérifier avant toute comparaison publique.
7. **Durée de conservation après l'essai** (30 jours) et **comptage des personnes** (données nominatives) : à valider par juriste-rgpd.
8. **Vérification du SIREN ou du RNA à l'inscription** : faisabilité à confirmer par l'architecte.

## 10. Sources

| Donnée | Source | Consultée le |
|---|---|---|
| Stripe France : cartes de l'EEE 1,5 % + 0,25 € ; prélèvement SEPA 0,35 € ; Billing 0,7 % du volume | https://stripe.com/fr/pricing | 2026-10-26 |
| Corma : dès 3 €/utilisateur/mois, freemium, remise sous 50 utilisateurs | https://www.corma.io/pricing (via `prix.md` [39]) | 2026-10-25 |
| Cledara : 100 £/mois, modules 150 £/mois, −16 % en annuel | https://www.cledara.com/pricing (via `prix.md` [15]) | 2026-10-25 |
| GLPI Network : 19 € HT/agent/mois en cloud ; 100 à 4 500 €/mois en auto-hébergé | https://www.glpi-project.org/tarifs (via `prix.md` [1]) | 2026-10-25 |
| DSI à temps partagé et management de transition : 700 à 1 400 €/jour | https://www.freelance-solution.fr/tarif-freelance/tjm-consultant/ (via `prix.md` [24]) | 2026-10-25 |
| DSI à temps partagé : 800 à 1 500 €/jour (2017) | https://www.lemondeinformatique.fr/actualites/lire-l-avenir-du-dsi-passe-t-il-par-le-temps-partage-67793.html (via `prix.md` [23]) | 2026-10-25 |
| Nombre de structures sans DSI par segment, SOM | `marche-tam-sam-som.md` (comptages sourcés × parts « sans DSI » en H) | 2026-10-25 |
| Coûts variables, churn, temps de vente, CAC | `1-analyse/modele-revenus.md`, `2-marche/acquisition.md` (H) | — |
| Modules, priorités, limites candidates | `1-analyse/perimetre-produit.md` (H) | 2026-10-26 |

*Prix exprimés hors taxes. Lanternis est une marque d'Hasteria SASU.*
