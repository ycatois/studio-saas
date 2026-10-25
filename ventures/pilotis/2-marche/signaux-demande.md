---
venture: pilotis
phase: 2 Marché
auteur: analyste-marche
date: 2026-10-25
statut: brouillon
méthode: skill veille-signaux-demande
---

# Pilotis : signaux de demande

> Signaux réels et vérifiables, consultés le 2026-10-25. Pour chacun : ce qu'il dit, sa source, sa date, **ce qu'il prouve et ce qu'il ne prouve pas**. Force notée de 1 (faible) à 5 (forte).
> **Conclusion en tête :** **demande moyenne pour le problème, non démontrée pour la solution.** Le problème (perte de maîtrise du SI, exposition cyber, pilotage des prestataires) est documenté par des sources publiques solides. La volonté de payer un **outil** pour le résoudre, chez des structures sans DSI, n'est démontrée par aucun signal public. Seuls les entretiens et les précommandes peuvent la prouver.

## 1. Les 3 signaux les plus forts

### S1. Les dirigeants de TPE-PME se savent exposés mais ne sont pas préparés, et s'en remettent au prestataire (force 4/5)
- **Fait :** 44 % des dirigeants jugent leur structure fortement exposée (38 % un an plus tôt) ; 80 % se disent non préparées ou incertaines ; près de 6 sur 10 ne sauraient pas évaluer les conséquences d'une cyberattaque ; 39 % se tournent d'abord vers leur prestataire informatique ; budget cyber inférieur à 2 000 €/an pour les trois quarts.
- **Source :** baromètre Cybermalveillance.gouv.fr 2025 (OpinionWay, 588 entreprises de moins de 250 salariés, avec CPME, MEDEF et U2P), publié le 07/10/2025. https://tpeactu.fr/2025/10/24/cybersecurite-les-tpe-pme-gagnent-en-maturite-mais-restent-fragiles/ ; https://www.cybermalveillance.gouv.fr/medias/2025/10/CP-TPE-PME-07102025-3.pdf
- **Prouve :** douleur ressentie, en hausse, et dépendance au prestataire (jobs 1 et 3 de `jtbd.md`).
- **Ne prouve pas :** l'échantillon mêle TPE et PME ; aucune ventilation 20–249. **Le budget bas est un contre-signal sur le prix.**

### S2. Les PME paient cher un responsable informatique interne pour piloter prestataires, contrats et budget, et peinent à le recruter (force 4/5)
- **Faits (offres en ligne le 2026-10-25) :**
  - « Dans le cadre du départ à la retraite de son Responsable Informatique », une PME (services aux entreprises) recrute pour « piloter les différents prestataires informatiques : infogérance, TMA, intégrateurs, éditeurs », plus sécurité, PRA/PCA et RGPD ; 45 à 70 k€ brut/an ; publiée le 19/10/2026. https://www.hellowork.com/fr-fr/emplois/82433859.html
  - « Entreprise industrielle de 150 collaborateurs » : remplacer le responsable « qui part à la retraite », gérer « les prestataires et les contrats », suivre le budget ; 65 à 75 k€/an ; publiée le 12/10/2026. https://www.hellowork.com/fr-fr/emplois/84330801.html
  - « Entreprise industrielle française à taille humaine » : cybersécurité, continuité, coordination des « partenaires techniques », rattachement au directeur industriel ; 50 à 65 k€ ; publiée le 11/10/2026. https://www.hellowork.com/fr-fr/emplois/81222029.html
  - Volume : **4 731 offres** pour « responsable informatique » sur HelloWork le 2026-10-25 (toutes tailles et tous secteurs, doublons de cabinets inclus). https://www.hellowork.com/fr-fr/emploi/recherche.html?k=responsable+informatique
  - Recrutement : seuls 5 % des 10–49 et 16 % des 50–249 ont cherché à recruter un spécialiste TIC en 2024 ; parmi eux, 60 % et 54 % ont eu des difficultés. Insee, 14/10/2025 : https://www.insee.fr/fr/statistiques/8616805
- **Prouve :** le **job « DSI de PME »** (pilotage des prestataires, des contrats, du budget, de la sécurité) existe, est payé entre 45 et 75 k€, et devient vacant (départs en retraite). Le moment du départ est un **déclencheur d'achat** exploitable (H).
- **Ne prouve pas :** ces PME ont choisi un poste, pas un outil. Les plus petites (20–49) recrutent très peu : chez elles, le besoin reste latent ou absorbé par le prestataire.

### S3. Le médico-social associatif doit s'équiper, sous contrainte cyber et RGPD, avec des financements publics (force 3/5)
- **Faits :** programme « ESMS numérique », dernière campagne en 2026, financement forfaitaire jusqu'à 21 k€ par établissement pour un dossier usager informatisé référencé Ségur ; une ARS relève des fragilités en cybersécurité et en respect du RGPD dans les ESSMS. https://www.hauts-de-france.ars.sante.fr/programme-esms-numerique-2026-derniere-campagne-de-financement ; https://www.lareunion.ars.sante.fr/system/files/2026-07/2026%20DESI%20AAP%20ESMS%20NUM%202026.pdf
  - Exemple de structuration : l'ASEA 43 (association, 18 établissements, 480 collaborateurs) a **créé** un poste de responsable des systèmes d'information au siège (offre d'avril 2025, résultat de recherche ; page France Travail expirée au 2026-10-25 : https://candidat.francetravail.fr/offres/recherche/detail/191GCNX).
- **Prouve :** les associations médico-sociales voient leur SI grossir (logiciels métier obligatoires, données sensibles) plus vite que leur capacité à le piloter.
- **Ne prouve pas :** l'exemple ASEA 43 dépasse la cible (480 salariés). Les financements portent sur un logiciel métier, pas sur la gouvernance SI. À tester dans les entretiens ESS (R11).

## 2. Autres signaux

| # | Signal | Source (date) | Ce qu'il prouve | Force |
|---|---|---|---|---|
| S4 | 48 % des victimes de rançongiciels traitées par l'ANSSI en 2025 sont de « petites structures » ; les PME, TPE et ETI restent les plus touchées | Le Monde Informatique, 11/03/2026 : https://www.lemondeinformatique.fr/actualites/lire-un-niveau-de-menaces-toujours-tres-eleve-en-2025-selon-l-anssi-99602.html | Risque réel et croissant (37 % en 2024) ; matière à contenus | 3 |
| S5 | Les directions métier contrôlent 81 % de la dépense SaaS ; 36 % de licences inutilisées ; notes de frais SaaS +267 % sur un an | Zylo, 29/01/2026 : https://zylo.com/news/2026-saas-management-index | Le gaspillage et le shadow IT sont structurels ; **mais** mesurés sur de grandes entreprises | 2 |
| S6 | Corma (Paris) lève 3,5 M€ (déc. 2025) pour automatiser la gestion des licences et des accès des « petites et moyennes organisations » | https://pulse2.com/corma-3-5-million-seed-funding/ ; https://vestbee.com/blog/articles/corma-raises-3-5-m | Des investisseurs parient sur la catégorie en France ; **concurrent** potentiel ; ses clients ont une équipe IT | 2 |
| S7 | Cledara (gestion des abonnements SaaS) : 4,6/5 sur 249 avis G2, dont un avis d'une petite entreprise (≤ 50 salariés) sur le suivi des dépenses par carte virtuelle ; sur Capterra (11 avis), un utilisateur salue le fait d'avoir ses abonnements au même endroit (avis relayés par la recherche) | https://www.g2.com/products/cledara ; https://www.capterra.com/p/186708/Cledara/reviews/ | Des petites structures **paient** déjà pour le seul suivi des abonnements (surtout au Royaume-Uni) | 3 |
| S8 | GLPI : 4,5/5 sur 41 avis Capterra FR, mais « configuration ardue », interface jugée « vieillissante », installation « pour utilisateurs confirmés » | https://www.capterra.fr/software/126254/glpi | L'outil de référence vise des techniciens ; il laisse le **dirigeant** sans réponse (hypothèse R2 de `pre-mortem.md`) | 2 |
| S9 | Offres de DSI à temps partagé, et extension aux fonctions RH, finance et RSE « 1 à 3 jours par semaine, sans engagement » | IT-Connect : https://www.it-connect.fr/doit-on-externaliser-sa-dsi/ ; plaquette 2026 : https://marketplace.luccasoftware.com/wp-content/uploads/2026/02/Flyer_Groupe_2026.pdf | Des PME achètent du pilotage SI à temps partiel ; valide le volet service de l'hybride | 3 |
| S10 | « La majorité des PME-PMI confient la DSI à leur direction administrative et financière », avec un responsable informatique opérationnel et des prestataires | Solutions Numériques (date non visible) : https://www.solutions-numeriques.com/?p=2308 | Le RAF ou le DAF est l'acheteur probable du produit (persona 2) | 2 |
| S11 | Solidatech : plus de 45 000 associations inscrites (logiciels, matériel, formations à tarif solidaire) | Offre d'emploi Solidatech, juin 2026 : https://jobs.makesense.org/fr/jobs/solidatech-assistante-commerciale-et-relations-associations-3Qk60a6Ez8FhbbcX6oUi | Les associations cherchent activement à réduire le coût de leur SI ; **canal ou partenaire** possible | 3 |
| S12 | « Accidental IT manager » : dans beaucoup de petites entreprises, l'office manager devient l'informaticien par défaut ; un tiers y consacrerait plus de 150 h/an (Microsoft Irlande, 2013) | https://www.siliconrepublic.com/enterprise/the-sorry-tale-of-the-accidental-it-manager ; https://www.mflit.com/blog/office-manager-guide-to-it | Le persona « relais administratif » existe. **Sources anciennes, étrangères ou commerciales** | 1 |

## 3. Signaux cherchés et non trouvés (à signaler honnêtement)
| Source explorée | Résultat | Conséquence |
|---|---|---|
| Forums francophones (Reddit r/france, forums de dirigeants, communautés d'assistantes) | **Aucun fil pertinent trouvé** (recherche web ; Reddit non accessible depuis l'outil de collecte) | Pas de verbatim spontané. Le vocabulaire des personas vient des offres d'emploi et des baromètres |
| Tendances de recherche (Google Trends, volumes de mots-clés) | **Non accessible** depuis l'outil de collecte | À faire par le redacteur-blog-seo (Google Keyword Planner, Search Console de la landing) |
| Appels d'offres « audit SI », « schéma directeur SI », « DSI à temps partagé » émis par des associations ou des PME | **Aucun trouvé** ; seuls des marchés publics hospitaliers ou des appels à projets ARS | Les structures cibles n'achètent pas ce service par appel d'offres (H) ; le canal est le réseau |
| Offres « DSI à temps partagé » sur HelloWork | 19 résultats, aucun réellement à temps partagé : https://www.hellowork.com/fr-fr/emploi/recherche.html?k=DSI+temps+partag%C3%A9 | Le temps partagé s'achète en prestation, pas en emploi |
| Offres « responsable informatique » dans des associations | 3 offres sur HelloWork, aucune dans une association de la cible : https://www.hellowork.com/fr-fr/emploi/recherche.html?k=responsable+informatique+association | Les associations de 20 à 249 salariés **recrutent rarement** ce profil : le besoin y est porté par la direction ou le RAF (H) |
| Chiffre national « part des PME sans DSI » | Introuvable | Hypothèse dans `marche-tam-sam-som.md` § 2.3 |
| Tarif récent d'un DSI à temps partagé | Introuvable (seule fourchette : 800 à 1 500 €/j, article non daté) | Demander 3 devis ou interroger 3 cabinets |

## 4. Conclusion et ce qui reste à valider en entretien
**Niveau de demande : moyen pour le problème ; non démontré pour la solution « outil ».**
- **Fort :** la perte de maîtrise et l'exposition cyber sont ressenties (S1, S4) ; le pilotage des prestataires et des contrats est un vrai métier, bien payé et en tension (S2) ; le médico-social associatif est sous pression (S3).
- **Faible :** aucune trace publique de dirigeants sans DSI qui **cherchent un logiciel** pour ce job ; les solutions achetées sont un **poste** (S2), du **temps partagé** (S9) ou rien (S1 : le prestataire).
- **Contre-signal :** budget cyber inférieur à 2 000 €/an pour les trois quarts des TPE-PME (S1).

**À valider en entretien (`script-interview.md`) :**
1. Fréquence et coût des épisodes récents (incident, départ, renouvellement subi, question d'un assureur ou d'un client) : H1, R2.
2. Part des structures où le prestataire ou l'Excel « suffit » : H2.
3. Budget réel consacré au SI, et ligne budgétaire où Pilotis pourrait entrer (SI, cyber, conseil) : H3.
4. Préférence entre logiciel seul et logiciel + accompagnement : H4, R5.
5. Le départ en retraite ou la démission du « référent informatique » comme déclencheur : nouvelle hypothèse issue de S2.
