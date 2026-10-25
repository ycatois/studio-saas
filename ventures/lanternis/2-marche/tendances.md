---
venture: lanternis
phase: 2 Marché
auteur: analyste-marche
date: 2026-10-25
statut: brouillon
---

# Lanternis : tendances qui font croître (ou freinent) le marché

> Sources consultées le 2026-10-25. **(H)** = hypothèse. Effet noté : ↑ porteur, → neutre, ↓ frein.

## Synthèse
| # | Tendance | Effet | Solidité | Usage recommandé |
|---|---|---|---|---|
| 1 | Cybermenace sur les petites structures | ↑↑ | Élevée (ANSSI, Cybermalveillance) | **Argument principal de déclenchement**, à associer au coût du SI |
| 2 | Prolifération des SaaS et de l'IA hors contrôle (shadow IT) | ↑↑ | Moyenne (données surtout de grandes entreprises) | **Tendance la plus porteuse pour le produit** : c'est elle qui crée le besoin d'un inventaire et d'alertes |
| 3 | NIS2 et loi « Résilience » | ↑ incertain | Faible sur le calendrier | Contenu éditorial, **pas** promesse commerciale |
| 4 | Facturation électronique 2026-2027 | → / ↑ indirect | Élevée (calendrier officiel) | Déclencheur de revue des outils ; Lanternis n'est pas un outil de facturation |
| 5 | DSI à temps partagé et externalisation de fonctions de direction | ↑ | Moyenne (offre visible, marché non chiffré) | Valide le modèle hybride ; concurrent et partenaire possible |
| 6 | Contraintes budgétaires de l'ESS | ↓ | Moyenne à élevée | Remise ESS, ROI chiffré, financements (ESMS numérique) |

## 1. Cybermenace sur les TPE, PME et ESS (↑↑)
- **ANSSI, Panorama de la cybermenace 2025** (relayé par Le Monde Informatique, 11/03/2026) : 1 366 incidents traités sur 3 586 événements de sécurité ; 128 compromissions par rançongiciel ; les PME, TPE et ETI restent les plus touchées, et **48 % des victimes sont de petites structures**. https://www.lemondeinformatique.fr/actualites/lire-un-niveau-de-menaces-toujours-tres-eleve-en-2025-selon-l-anssi-99602.html
- Pour comparaison, la part des PME, TPE et ETI parmi les victimes de rançongiciels était de 37 % en 2024 selon l'ANSSI : https://cyber.gouv.fr/actualites/panorama-de-la-cybermenace-2024-mobilisation-et-vigilance-face-aux-attaquants (chiffre relayé par la recherche, non relu sur la page).
- **Baromètre Cybermalveillance.gouv.fr 2025**, 2e édition (OpinionWay, 588 entreprises de moins de 250 salariés, avec CPME, MEDEF et U2P) : 16 % ont subi un incident dans l'année ; **44 % des dirigeants jugent leur structure fortement exposée** (38 % en 2024) ; **80 % se disent non préparées ou incertaines** ; budget cyber < 2 000 € pour les trois quarts ; **39 % s'adressent d'abord à leur prestataire informatique**. https://tpeactu.fr/2025/10/24/cybersecurite-les-tpe-pme-gagnent-en-maturite-mais-restent-fragiles/ ; communiqué : https://www.cybermalveillance.gouv.fr/medias/2025/10/CP-TPE-PME-07102025-3.pdf
- **Dispositifs publics gratuits** : MonAideCyber (diagnostic d'environ 1 h 30, 6 mesures prioritaires, point de suivi) ; dernier chiffre trouvé : environ une centaine de diagnostics par mois et près de 500 aidants (avril 2024, Campus Cyber) : https://wiki.campuscyber.fr/images/8/86/Take-Away_INSIDER_Avril.pdf. ReCyF de l'ANSSI publié le 17/03/2026 comme document de travail (https://www.myrasecurity.com/fr/savoir/nis2-loi-resilience/).
- **Lecture pour Lanternis :** la peur monte, la préparation non, le budget reste bas. Les dirigeants ne savent pas évaluer leur exposition et s'en remettent au prestataire : c'est exactement le job « prouver que nous sommes protégés » (`1-analyse/jtbd.md`, job 3). Mais un budget cyber inférieur à 2 000 €/an impose de vendre Lanternis sur **coût du SI + maîtrise**, avec la cyber comme déclencheur.

## 2. Prolifération des SaaS et de l'IA : shadow IT (↑↑, tendance la plus porteuse)
- **Zylo, 2026 SaaS Management Index** (29/01/2026, plus de 40 millions de licences et 75 Md$ de dépense analysés) : les directions métier contrôlent **81 % de la dépense SaaS**, la DSI n'en gère directement que 15 % ; les achats SaaS passés en notes de frais ont augmenté de **267 %** sur un an (ChatGPT en tête) ; **36 % des licences restent inutilisées** ; médiane de 9 455 $ de SaaS par salarié. https://zylo.com/news/2026-saas-management-index
  - **Limite :** les clients de Zylo sont surtout de grandes entreprises américaines. La tendance (achats hors DSI, licences dormantes) est transposable en direction ; les montants ne le sont pas.
- **Numeum (déc. 2025)** : éditeurs de logiciels et plateformes en France, +8,2 % en 2025, 29,1 Md€ de chiffre d'affaires ; le SaaS concerne **77 % des nouveaux projets** au second semestre 2025. https://numeum.fr/wp-content/uploads/2025/12/Numeum_Communique-de-presse-S2-2025-2026.pdf (chiffres relayés par la recherche ; PDF non lisible directement)
- **IA dans les PME** : selon le baromètre France Num 2026 (Crédoc pour la DGE), 53 % des PME utilisent au moins une solution d'IA, contre 16 % en 2024 (chiffre relayé par la recherche, page source non lue) : https://www.entreprises.gouv.fr/espace-presse/france-num-presente-la-6e-edition-de-son-barometre-annuel-sur-la-transformation
- **Signal d'offre :** Corma, start-up française de gouvernance des licences et des accès, a levé 3,5 M€ en seed (déc. 2025) pour les « petites et moyennes organisations » : https://pulse2.com/corma-3-5-million-seed-funding/ ; https://vestbee.com/blog/articles/corma-raises-3-5-m. Ses références citées (Brevo, Owkin, Skello, Brut) sont des scale-ups **avec** équipe IT : à transmettre à l'analyste-concurrence.
- **Lecture pour Lanternis :** chaque nouvel abonnement souscrit par carte bancaire, chaque outil d'IA adopté par un salarié, alimente le problème « je ne sais pas ce que nous payons ni qui a accès à quoi ». C'est le **ressort récurrent** du produit (arrivées et départs, licences inutilisées, renouvellements). C'est la tendance la plus porteuse parce qu'elle est **continue**, alors que NIS2 et la facturation électronique sont des échéances ponctuelles.

## 3. NIS2 et projet de loi « Résilience » (↑ incertain)
- **État au 11/10/2026 :** loi non adoptée. Délai de transposition échu le 17/10/2024 ; Sénat le 12/03/2025 ; texte de la commission spéciale de l'Assemblée (n° 1779) le 10/09/2025 ; **le 06/10/2026, la Conférence des présidents a retiré le texte de l'ordre du jour des 7 et 9 octobre**. Ni loi promulguée, ni décret. https://www.myrasecurity.com/fr/savoir/nis2-loi-resilience/ (mis à jour le 12/10/2026)
- **ANSSI, page officielle** (mise à jour le 19/09/2025) : texte encore en navette, susceptible d'être modifié ; entrée en vigueur après publication des décrets. https://aide.monespacenis2.cyber.gouv.fr/fr/article/avancement-de-la-transposition-de-la-directive-nis-2-1b3j1da/
- **Recours européen** : la Commission aurait saisi la CJUE le 08/07/2026 (rapporté par plusieurs sources secondaires, non vérifié sur source primaire).
- **Seuils (texte n° 1779)** : **entités importantes à partir de 50 personnes** (ou plus de 10 M€ de chiffre d'affaires et de bilan) dans les secteurs hautement critiques ou critiques ; entités essentielles à partir de 250 personnes ; 18 secteurs visés, « plusieurs milliers d'entités » selon l'ANSSI. Source : myrasecurity (ci-dessus).
- **Lecture pour Lanternis :** une partie des 50–249 de la cible pourrait devenir « entité importante » si elle relève d'un des 18 secteurs (H : la part n'est pas mesurée). Comme le recommande `pre-mortem.md` (R12), NIS2 sert de **contenu** (« êtes-vous concerné ? »), pas d'argument de vente, tant que la loi n'est pas promulguée.

## 4. Facturation électronique 2026-2027 (→ / ↑ indirect)
- **Calendrier officiel** : réception obligatoire pour **toutes** les entreprises au **1er septembre 2026** via une plateforme agréée ; émission obligatoire pour les grandes entreprises et ETI au 1er septembre 2026, pour les **PME et microentreprises au 1er septembre 2027** ; tolérance sans sanction jusqu'à fin 2026 pour les entreprises en difficulté de mise en œuvre. https://www.economie.gouv.fr/tout-savoir-sur-la-facturation-electronique-pour-les-entreprises ; https://entreprendre.service-public.gouv.fr/actualites/A18953?lang=en
- **Lecture pour Lanternis :** la réforme oblige chaque PME à **choisir une plateforme et à revoir ses outils de facturation**, c'est donc un moment de revue du SI (« qui fait quoi, quel outil, quel contrat »), un déclencheur classique du job 4 (`jtbd.md`). Lanternis n'est pas un outil de facturation, et la plupart des associations non assujetties à la TVA sont moins concernées (H, à vérifier). Effet indirect, utile pour des contenus de septembre 2027.

## 5. DSI à temps partagé et fonctions de direction externalisées (↑)
- **Prix** : 800 à 1 500 €/jour selon Le Monde Informatique (date non visible, probablement ancien) : https://www.lemondeinformatique.fr/actualites/lire-l-avenir-du-dsi-passe-t-il-par-le-temps-partage-67793.html. Aucun tarif récent n'a été trouvé.
- **Format** : de 1 à 3 jours par semaine selon la taille et les projets (IT-Connect : https://www.it-connect.fr/doit-on-externaliser-sa-dsi/) ; le DSI à temps partagé « ne remplace pas le prestataire informatique, il le supervise » (Copeps, site de prestataire : https://copeps.fr/actualites/externalisation-dsi-pme/).
- **Extension du modèle** : des offres « temps partagé » couvrent désormais DSI, RH, finance et RSE, de 1 à 3 jours par semaine et sans engagement (plaquette 2026 : https://marketplace.luccasoftware.com/wp-content/uploads/2026/02/Flyer_Groupe_2026.pdf).
- **Côté emploi** : 54 à 60 % des PME qui cherchent un spécialiste TIC ont des difficultés à recruter (Insee, 14/10/2025 : https://www.insee.fr/fr/statistiques/8616805) ; plusieurs offres d'octobre 2026 remplacent un responsable informatique **qui part à la retraite** (voir `signaux-demande.md`).
- **Lecture pour Lanternis :** l'offre existe et se structure, ce qui valide un besoin de pilotage SI sans poste à temps plein. Les cabinets travaillent à la journée et **sans outil côté client** (H) : Lanternis peut être leur outil (canal partenaire) ou leur alternative moins chère (logiciel + 0,5 j/mois).

## 6. Contraintes budgétaires de l'ESS (↓)
- L'emploi associatif recule depuis l'automne 2024 ; selon le baromètre ORA 2025, plus d'un tiers des associations employeuses jugent leur situation préoccupante (Recherches & Solidarités, oct. 2025, via Jurisassociations) : https://recherches-solidarites.org/wp-content/uploads/2025/11/JA726_vie_associative_france_mouvement.pdf
- Baisse de financements pour les associations dans le budget 2026 : https://www.maire-info.com/associations/des-financements-en-baisse-pour-les-associations-et-les-tiers-lieux-dans-le-budget-pour-2026-art26-30111
- ESS France : 10 000 emplois supprimés dans l'ESS en 2025 (Panorama 2026 via Carenews : https://www.carenews.com/carenews-info/news/268-millions-d-emplois-dans-l-ess).
- **Contrepoids (médico-social)** : programme « ESMS numérique », dernière campagne en 2026, financement forfaitaire jusqu'à 21 k€ par établissement pour le dossier usager informatisé, avec des fragilités cyber et RGPD relevées par une ARS : https://www.hauts-de-france.ars.sante.fr/programme-esms-numerique-2026-derniere-campagne-de-financement ; https://www.lareunion.ars.sante.fr/system/files/2026-07/2026%20DESI%20AAP%20ESMS%20NUM%202026.pdf
- **Lecture pour Lanternis :** l'ESS est sensible au prix ; il faut démontrer des **économies** (licences dormantes, renouvellements évités) supérieures à l'abonnement, et s'appuyer sur Solidatech (plus de 45 000 associations inscrites selon une offre d'emploi de juin 2026 : https://jobs.makesense.org/fr/jobs/solidatech-assistante-commerciale-et-relations-associations-3Qk60a6Ez8FhbbcX6oUi) comme canal ou partenaire possible (H).

## Hypothèses non vérifiées signalées
- Part de la cible concernée par NIS2 (secteurs × seuil de 50 personnes) : non mesurée.
- Chiffres Numeum et France Num 2026 : relayés par la recherche, PDF ou page source non lus.
- Panorama ANSSI 2025 : chiffre de 48 % issu d'un article de presse, PDF ANSSI non relu.
- Transposabilité des données Zylo (grandes entreprises) aux PME françaises : non démontrée.
