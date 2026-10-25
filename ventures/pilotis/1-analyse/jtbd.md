---
venture: pilotis
phase: 1 Analyse
auteur: challenger
date: 2026-10-25
statut: brouillon
méthode: skill jobs-to-be-done
---

# Pilotis : Jobs-to-be-Done du dirigeant de PME ou d'ESS sans DSI

> **Statut de ce document :** hypothèses de travail **(H)** construites à partir de la fiche idée, des réponses du fondateur et de recherches documentaires. Aucun job n'a encore été confirmé en entretien. Ce document sert à écrire le script des 10 à 15 entretiens (tests R1, R2, R6, R7 de `pre-mortem.md`) et sera réécrit avec leurs verbatims.

## 1. Qui « embauche » Pilotis ?
| Rôle | Description (H) | Place dans la décision |
|---|---|---|
| **Dirigeant** (gérant, DG de PME ; directeur ou directrice d'association, de coopérative) | 20 à 250 salariés, pas de DSI ni de directeur technique, n'est pas technicien ; porte seul le risque SI sans le maîtriser | Acheteur et sponsor |
| **Relais administratif** (RAF, office manager, responsable administratif, assistante de direction) | Gère de fait contrats, abonnements, arrivées et départs, relation avec le prestataire informatique | Utilisateur principal probable, celui qui remplit l'outil |
| **Instance de gouvernance** (associés, banquier ; pour l'ESS : bureau, conseil d'administration, trésorier, financeurs) | Demande des comptes sur les coûts, les risques et la conformité | Prescripteur indirect ; source du job social |
| **Prestataire informatique** (infogéreur, « le prestataire », parfois un salarié bricoleur) | Détient la connaissance technique et souvent l'inventaire | Allié ou frein (voir `pre-mortem.md`, R8) |

## 2. Les jobs
Formule : « Quand [situation], je veux [motivation], pour que [résultat attendu]. »

### Job 1 (principal pressenti) : reprendre la main sur un SI que je ne maîtrise pas
**« Quand je réalise que je ne sais pas vraiment ce que contient mon informatique, ce qu'elle coûte et qui la maîtrise (à l'occasion d'un incident, d'un départ ou d'une facture surprise), je veux en avoir une vue claire et tenue à jour, pour que l'entreprise ne dépende plus d'une seule personne ni d'un prestataire et que je puisse décider en connaissance de cause. »**
- **Fonctionnel :** savoir quels actifs, logiciels, abonnements, contrats, fournisseurs, noms de domaine et comptes d'administration existent ; qui en est responsable ; quand ils expirent ; combien ils coûtent.
- **Émotionnel :** ne plus se sentir « à la merci » du prestataire ou du salarié qui sait ; dormir tranquille ; ne pas avoir honte de ne pas savoir.
- **Social :** apparaître comme un dirigeant qui maîtrise ses risques face aux associés, au conseil d'administration, au banquier ou à l'assureur.
- **Solutions embauchées aujourd'hui :** la mémoire du prestataire ; un Excel ou un dossier partagé tenu par le relais administratif ; les factures dans la compta ; parfois GLPI côté prestataire ; souvent **rien**.
- **Frustrations (H) :** l'information est dispersée entre factures, boîtes mail et prestataire ; on découvre les contrats au renouvellement tacite ; au départ d'un salarié, des accès et abonnements restent orphelins.

### Job 2 : arrêter de payer pour rien et justifier le budget informatique
**« Quand je prépare le budget, que je regarde mes charges ou qu'un financeur ou associé me demande pourquoi l'informatique coûte autant, je veux savoir précisément ce que je paie, pour quoi et pour combien d'utilisateurs, pour que je supprime le superflu et défende le reste. »**
- **Fonctionnel :** liste consolidée des dépenses SI (abonnements SaaS, licences, contrats d'infogérance, matériel), coût par salarié, échéances de résiliation, doublons, licences inutilisées.
- **Émotionnel :** fin du sentiment d'empilement incontrôlé ; satisfaction de « faire le ménage ».
- **Social :** présenter un budget clair au CA, aux associés ou au banquier ; pour l'ESS, rendre compte du bon usage des fonds (H).
- **Solutions embauchées :** le grand livre de l'expert-comptable (compte de charges global, rarement détaillé par outil, H) ; Excel ; relevés bancaires ; rien.
- **Frustrations (H) :** la compta classe les dépenses par nature, pas par outil ni par usage ; les abonnements par carte bancaire échappent à tout suivi ; les renouvellements tacites passent.
- **Note :** c'est le **pont naturel vers la finance** (coût du SI), et le job le plus facile à chiffrer en euros, donc à vendre.

### Job 3 : prouver que nous sommes protégés
**« Quand un assureur, un client grand compte, un financeur ou une nouvelle réglementation me demande comment je protège mes données et mon activité, je veux pouvoir répondre vite et de façon crédible, pour que je ne perde ni le contrat, ni l'assurance, ni la confiance, et que je réduise réellement le risque. »**
- **Fonctionnel :** état des sauvegardes (existent-elles, sont-elles testées ?), droits d'accès, mises à jour, plan de réponse à incident, suivi d'un plan d'actions (par exemple les 6 mesures issues d'un diagnostic MonAideCyber) ; réponses prêtes aux questionnaires de sécurité.
- **Émotionnel :** peur de la cyberattaque qui paralyse l'activité ; anxiété face à des questionnaires incompréhensibles ; soulagement d'avoir un plan.
- **Social :** responsabilité du dirigeant ; crédibilité face aux donneurs d'ordre ; pour l'ESS, protection des données des bénéficiaires (H).
- **Solutions embauchées :** le prestataire (« c'est sauvegardé, je crois ») ; diagnostic gratuit MonAideCyber de l'ANSSI (1 h 30, 6 mesures, point de suivi à 6 mois, selon les relais consultés) ; cabinet cyber ponctuel ; rien.
- **Frustrations (H) :** le diagnostic donne un plan mais personne ne suit son exécution ; jargon ; impossible de vérifier ce que dit le prestataire.
- **Déclencheur temporel incertain :** la transposition de NIS2 n'était pas promulguée selon les sources consultées (voir `pre-mortem.md`, R12) ; le périmètre réel pour la cible est à vérifier.

### Job 4 : décider d'un projet ou d'un fournisseur informatique sans me faire avoir
**« Quand je dois choisir un logiciel, changer de prestataire ou lancer un projet informatique, je veux un cadre et un avis structuré, comme celui d'un DSI, pour que je ne signe pas un contrat inadapté ni trop cher et que le projet aboutisse. »**
- **Fonctionnel :** carte des dépendances (« si je change d'outil, qu'est-ce qui casse ? »), historique des contrats, jalons de projet, grille de décision.
- **Émotionnel :** peur de l'asymétrie d'information face aux vendeurs ; besoin d'un regard de confiance.
- **Social :** décision défendable devant les associés ou le CA.
- **Solutions embauchées :** le prestataire actuel (juge et partie) ; un ami du réseau ; un DSI à temps partagé, 800 à 1 500 €/jour selon un article du Monde Informatique (date non visible) ; un ESN comme Tecnoo.
- **Frustrations (H) :** conseil coûteux et ponctuel ; aucune mémoire des décisions passées.
- **Note :** ce job est le plus proche du **service** (accompagnement) que du logiciel ; il alimente le scénario 4 du pré-mortem (modèle hybride).

### Job 5 (secondaire) : savoir chaque mois si l'entreprise va bien
**« Quand je fais le point mensuel ou prépare un comité, je veux voir trésorerie, activité et masse salariale au même endroit, pour que je décide à temps (recrutement, relance, dépense). »**
- **Fonctionnel / émotionnel / social :** voir `0-idee/fiche-idee.md` (job initial de la phase 0).
- **Solutions embauchées :** situation de l'expert-comptable, Pennylane, Agicap, Excel, relevé bancaire.
- **Note :** job réel mais **déjà largement servi** par des acteurs financés, et sans avantage particulier du fondateur. À tester (R13), pas à construire en MVP.

### Job 6 (transversal) : ne rien perdre quand quelqu'un part ou arrive
**« Quand un salarié arrive ou part, je veux que ses accès, son matériel et ses abonnements soient ouverts ou fermés proprement, pour que je ne laisse ni faille ni dépense orpheline. »**
- **Fonctionnel :** check-list d'arrivée/départ reliée à l'inventaire (comptes, licences, matériel).
- **Émotionnel :** éviter le « on a oublié de couper son accès ».
- **Social :** obligations de l'employeur, image auprès des nouveaux arrivants.
- **Solutions embauchées :** mail au prestataire, check-list papier, SIRH (Lucca, PayFit) pour la partie RH seulement, rien.
- **Note :** pont naturel vers le **volet RH** (effectif, mouvements) sans manipuler de données de paie ; et source d'**usage récurrent** (contrecarre le risque R6 de fréquence d'usage).

## 3. Job principal retenu (hypothèse à confirmer)
**Job 1, « reprendre la main sur un SI que je ne maîtrise pas »**, monétisé par le **Job 2** (le coût du SI, chiffrable en euros) et rendu récurrent par les **Jobs 3 et 6** (plan de sécurité suivi, arrivées et départs).
Le Job 5 (pilotage financier) reste hors du cœur du MVP.

## 4. Ce que le dirigeant « embauche » aujourd'hui (synthèse)
| Solution actuelle | Jobs servis | Ce qu'elle fait bien | Pourquoi elle pourrait être « licenciée » (H) |
|---|---|---|---|
| **Rien** (mémoire, instinct) | Tous | Gratuit, sans effort | Un incident, un départ, une facture surprise ou une demande d'assureur révèle le trou |
| **Excel / dossier partagé** | 1, 2, 6 | Souple, connu, déjà payé | Jamais à jour, dépend d'une personne, aucune alerte |
| **Prestataire informatique** | 1, 3, 4, 6 | Compétent, disponible, connaît le parc | Juge et partie, connaissance non transmise, coûts opaques, dépendance |
| **Expert-comptable** | 2, 5 | Fiable sur les chiffres, déjà payé | Vue par nature de charge, en retard, rien sur les risques SI |
| **Pennylane / Agicap / outils financiers** | 5 (et un peu 2) | Temps réel financier, connecteurs | Ne disent rien des contrats, actifs, sécurité |
| **GLPI ou outil de parc** (souvent chez le prestataire) | 1, 6 | Inventaire technique complet ; GLPI Network Cloud à 19 € HT/agent IT/mois (glpi-project.org) | Conçu pour des techniciens, pas pour le dirigeant ; pas de vue coût ni gouvernance (H) |
| **MonAideCyber / dispositifs publics** | 3 | Gratuit, crédible (ANSSI) | Diagnostic ponctuel, suivi léger ; pas d'outil de pilotage continu (H) |
| **DSI à temps partagé / ESN** | 1, 3, 4 | Expertise humaine | Coût à la journée, ponctuel, non outillé côté client (H) |

**Lecture :** le concurrent le plus fréquent est probablement « rien + le prestataire ». Pilotis doit être **plus simple que rien** à démarrer et **plus neutre que le prestataire**.

## 5. Forces de progrès (pour changer) et freins (pour ne pas changer)
| Force | Contenu (H) | Implication produit / marketing |
|---|---|---|
| **Push (pression du problème)** | Incident vécu ou évité de peu (ransomware chez un voisin, panne, perte de données) ; départ d'un salarié ou d'un prestataire « qui savait » ; renouvellement tacite coûteux ; questionnaire de sécurité d'un client ou d'un assureur ; demande du CA ou d'un financeur (ESS) ; actualité réglementaire (NIS2, facturation électronique qui impose de revoir les outils de facturation d'ici septembre 2027 selon le cadre du studio) | Le marketing doit parler d'**épisodes**, pas de fonctionnalités ; cibler les moments déclencheurs (changement de prestataire, croissance, départ, renouvellement d'assurance) |
| **Pull (attrait de la solution)** | Un « DSI de poche » conçu par un DSI de 25 ans d'expérience ; une vue claire en une session ; des alertes avant les échéances ; un chiffre « coût du SI par salarié » ; hébergement en France et sobriété ; prix accessible avec remise ESS | Promesse de résultat rapide (« en une demi-journée, votre SI sur une page ») ; démo à partir des données du prospect |
| **Anxiété (peur du nouveau)** | « Encore un outil à remplir » ; « je n'y connais rien, je vais mal le renseigner » ; « mon prestataire va le prendre mal » ; « confier la carte de mon SI à un tiers, c'est risqué » ; « une petite structure, sera-t-elle encore là dans 2 ans ? » | Onboarding assisté ou fait pour vous ; aucun secret stocké, sécurité affichée ; inviter le prestataire comme contributeur ; réversibilité (export complet) ; adossement à Hasteria SASU et au parcours du fondateur |
| **Habitude (attachement à l'existant)** | « Mon prestataire s'en occupe » ; l'Excel de l'assistante ; « on n'a jamais eu de problème » ; décisions collégiales lentes dans l'ESS | Importer l'Excel existant plutôt que le remplacer ; essai sur un périmètre limité (contrats et abonnements seulement) ; supports prêts pour présenter au CA ou au bureau |

**Équilibre pressenti :** push fort mais **épisodique** (déclencheurs), anxiété « encore un outil à remplir » probablement le frein principal. Conséquence : le premier contact doit produire de la valeur **sans** effort de saisie du client.

## 6. Conséquences pour le MVP et les entretiens
**Pour le MVP (avis du challenger, à confirmer en entretiens) :**
1. Cœur = Job 1 + Job 2 : inventaire minimal (contrats, abonnements, fournisseurs, domaines, actifs clés, responsables) avec import d'un Excel et détection des abonnements à partir de factures ou de relevés (faisabilité à étudier par l'architecte), coût du SI par poste et par salarié, alertes d'échéance.
2. Récurrence = Job 3 + Job 6 : plan d'actions sécurité suivi (compatible avec les 6 mesures MonAideCyber), check-lists arrivée/départ.
3. Hors MVP : tableau de bord financier complet (Job 5), connecteurs paie, indicateurs RH détaillés.
4. Point de décision ouvert : le Job 4 appelle de l'accompagnement humain. Offre hybride ou pas ?

**Questions clés du script d'entretien (à formaliser avec la skill script-interview-client) :**
- « Racontez-moi la dernière fois qu'un sujet informatique vous a coûté du temps, de l'argent ou du sommeil. » (Jobs 1, 3)
- « Si votre prestataire disparaissait demain, que se passerait-il ? Qui saurait quoi ? » (Job 1)
- « Combien vous coûte votre informatique par an ? Comment le savez-vous ? » (Job 2)
- « La dernière fois qu'on vous a demandé de prouver votre niveau de sécurité, comment avez-vous répondu ? » (Job 3)
- « Que s'est-il passé au dernier départ d'un salarié côté accès et abonnements ? » (Job 6)
- « Qui, chez vous, mettrait à jour un tel outil ? Combien de temps par mois ? » (anxiété, R1)
- « Qui décide d'un tel achat, et en combien de temps ? » (R11 pour l'ESS)

## Sources (consultées le 2026-10-25)
- GLPI Network Cloud, tarifs : https://glpi-project.org/pricing ; https://help.glpi-project.org/faq/fr/glpi/cloud_vs_self-hosted
- MonAideCyber, relais : https://www.economie.gouv.fr/entreprises/cybersecurite-des-dispositifs-publics-gratuits-pour-vous-accompagner ; https://www.fiducial.fr/Articles-et-dossiers/MonAideCyber-Diagnostic-gratuit-pour-proteger-les-TPE-PME
- DSI à temps partagé : https://www.lemondeinformatique.fr/actualites/lire-l-avenir-du-dsi-passe-t-il-par-le-temps-partage-67793.html (date non visible)
- NIS2 (statut de transposition) : voir `pre-mortem.md`
- Concurrents financiers et calendrier de la facturation électronique : voir `0-idee/fiche-idee.md` et `CLAUDE.md`
