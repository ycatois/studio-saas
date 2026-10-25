---
venture: pilotis
phase: 0 Idée
auteur: challenger
date: 2026-10-25
statut: brouillon
---

# Fiche idée — Pilotis

> Sources consultées le 2026-10-25 (liste en fin de document). Tout ce qui n'est pas sourcé est marqué **(H)** = hypothèse non vérifiée.

## 1. Nom de travail
- **Nom :** Pilotis (nom de travail, disponibilité marque/domaine non vérifiée)
- **Slug :** `pilotis`
- **Idée brute (verbatim utilisateur) :** « un saas qui va permettre à une PME d'avoir un tableau de bord global de son activité. SI, Financier, RH, et autre. Avec la possibilité d'avoir des connecteurs avec différents produits via leurs api. »

**En une phrase :** pour le dirigeant d'une société de services B2B de 15 à 100 salariés sans DAF à temps plein, qui passe ses fins de mois à consolider à la main des chiffres éparpillés entre compta, paie, CRM et banque, Pilotis livre chaque lundi matin une vue unique et fiable de la santé de l'entreprise (trésorerie, marge, masse salariale, carnet de commandes), sans projet BI.

## 2. Le problème (point de vue client)
« Pour savoir où en est ma boîte, je dois ouvrir 5 outils et attendre que mon comptable me sorte une situation avec 6 semaines de retard ; je décide à l'instinct. »
- **Fréquence :** hebdomadaire (trésorerie) à mensuelle (comité de direction, reporting banquier/associés) **(H)**.
- **Coût :** temps du dirigeant ou de l'assistante de direction pour consolider sous Excel ; décisions tardives (recrutement, relance clients, prix) **(H — à chiffrer en entretien)**.
- **Urgence :** faible au quotidien, forte ponctuellement (tension de trésorerie, levée de fonds, demande du banquier, croissance rapide). **C'est le point faible de l'idée** : la douleur est diffuse, souvent « nice to have » (voir `avocat-du-diable.md`).

## 3. Pour qui — cible recommandée
« Toutes les PME » est trop large : environ 158 566 PME hors microentreprises en France en 2021 (INSEE), de métiers et de maturités numériques très différents. Je recommande de resserrer sur :

**Cible principale proposée :** dirigeants (et leur office manager / RAF à temps partiel) de **sociétés de services B2B françaises de 15 à 100 salariés** — agences, ESN, cabinets de conseil, bureaux d'études — **déjà équipées d'outils SaaS dotés d'API** (ex. Pennylane, Qonto, PayFit ou Lucca, HubSpot/Pipedrive).

Pourquoi ce segment **(H, à valider)** :
- la masse salariale y est le premier poste de coût, donc croiser **RH + finance + activité** (CA par collaborateur, taux d'occupation, marge par projet) y a un sens fort, ce que ni l'outil compta ni l'outil paie ne font seuls ;
- stack SaaS moderne = API disponibles, connecteurs moins coûteux qu'avec des logiciels installés ;
- pas de DAF à temps plein, donc pas de BI maison ;
- joignables sur LinkedIn et via les experts-comptables.

**Early adopters :** dirigeants de 20 à 50 salariés en croissance, déjà clients Pennylane, qui tiennent aujourd'hui un « Excel de pilotage » maison **(H)**.

**Segment alternatif à garder en tête :** les **cabinets d'expertise comptable** comme distributeurs (un abonnement, N dossiers clients), sur le modèle de Fathom, tarifé par entreprise connectée (Fathom).

## 4. Comment ils font aujourd'hui
| Alternative | Ce que ça fait | Coût public constaté | Limite pour la cible |
|---|---|---|---|
| **Excel / Google Sheets** maison | Consolidation manuelle, tableau sur mesure | Licence déjà payée ; coût caché = temps **(H)** | Manuel, en retard, fragile, dépend d'une personne |
| **Situation de l'expert-comptable** | Situation intermédiaire, bilan | Inclus dans honoraires **(H)** | Retard, vue financière seule, pas RH/activité |
| **Pennylane** (compta + tableau de bord financier) | Tableau de bord financier temps réel ; un partenaire revendique 300+ connecteurs (PayFit, Silae, Lucca, HubSpot…) | Grille TPE 1–15 salariés relayée par un tiers : 49 / 99 / 298 €/mois ; au-delà de 15 salariés, sur devis (meetergo, impli) | Centré compta ; pas conçu pour la paie ni le pilotage projet (impli). **Menace principale : peut étendre ses tableaux de bord.** |
| **Agicap, Fygr, TurboPilot** (trésorerie) | Prévision et suivi de trésorerie, scénarios | Agicap : pas de grille publique, estimation tierce non vérifiée vers 200 €/mois (impli) ; Fygr/TurboPilot : pas de grille trouvée | Trésorerie seule |
| **Fathom** (reporting financier) | Reporting et analyse financière, vendu largement via les comptables | Starter £38/mois par entreprise ; paliers multi-entreprises (pages partenaires Fathom) | Financier, anglophone, connecteurs surtout Xero/QuickBooks **(H — connecteurs FR à vérifier)** |
| **Databox** (dashboards KPI multi-sources) | Tableaux de bord KPI multi-sources | Gratuit (3 sources) ; Analyst 71 $/mois ; Team Core 199 $/mois en annuel (10 sources, 3 utilisateurs) ; Team Scale 319 $/mois (databox.com) | Orienté marketing/ventes, connecteurs paie/compta FR absents ou faibles **(H)** ; à configurer soi-même |
| **Power BI / Looker Studio** | BI généraliste | Power BI Pro 14 $/utilisateur/mois depuis le 1er avril 2025 (The Register) ; Looker Studio gratuit mais connecteurs partenaires souvent payants, ex. Supermetrics dès 29 $/mois (Supermetrics) | Nécessite un intégrateur ou un profil data ; projet de plusieurs semaines **(H)** |
| **Rien** | Pilotage « au relevé bancaire » | 0 € | Probablement l'alternative la plus fréquente **(H)** — et la plus dure à battre |

## 5. La promesse (résultat, pas fonctionnalités)
**« Chaque lundi, en 5 minutes, savoir si votre entreprise va bien — trésorerie, marge, équipe, commandes — sans ressaisir un chiffre ni monter de projet BI. »**

Résultats visés **(H)** :
- un comité de direction mensuel préparé en minutes au lieu d'une demi-journée ;
- des alertes avant le problème (trésorerie à 8 semaines, client qui paie en retard, marge projet qui dérape) ;
- un reporting banquier/associés propre, prêt à envoyer.

**Différenciation possible (à prouver) :**
1. **Indicateurs croisés prêts à l'emploi pour les sociétés de services** (CA et marge par ETP, coût réel de la masse salariale rapporté au CA, carnet de commandes en mois de salaires) plutôt qu'un outil BI vide à configurer.
2. **Connecteurs de l'écosystème français** (Pennylane, Qonto, PayFit, Lucca, Silae…) quand les outils américains (Databox, Fathom) visent d'abord Xero/QuickBooks/HubSpot **(H)**.
3. **Souveraineté et sobriété** : hébergement en France (VPS OVH), données minimales, pas de revente de données — argument qui compte pour des données de paie **(H sur le poids d'achat)**.
4. Option à étudier : passer par une **API unifiée** (Chift, Apideck) pour la compta/paie, afin de ne pas maintenir soi-même chaque connecteur (Chift couvre Sage, Cegid, Pennylane ; tarif sur devis, selon le nombre de connexions actives).

**Ce n'est PAS une différenciation :** « tout en un », « temps réel », « tableau de bord personnalisable » — tout le monde le dit déjà.

## 6. Pourquoi maintenant / pourquoi nous
**Pourquoi maintenant (H sauf mention) :**
- Facturation électronique : réception obligatoire depuis le 1er septembre 2026, émission obligatoire pour les PME au 1er septembre 2027 (cadre CLAUDE.md). Les données de facturation deviennent structurées et accessibles par les plateformes agréées, d'où plus de données propres disponibles par API.
- Les éditeurs français ouvrent leurs API : PayFit propose une clé API client et un programme partenaire OAuth2 (developers.payfit.io) ; des API unifiées couvrent désormais les logiciels comptables français (TechCrunch, Chift).
- Hausse des prix de la BI généraliste (Power BI Pro +40 % en 2025, The Register), qui rend un outil vertical prêt à l'emploi plus compétitif.
- Les LLM permettent de produire un commentaire en langage naturel (« ce mois-ci, votre marge baisse parce que… ») **(H — intérêt réel à tester, risque de gadget)**.

**Pourquoi nous :** **non renseigné** — à préciser par l'utilisateur (expérience DAF/contrôle de gestion ? réseau d'experts-comptables ou de dirigeants de PME ? compétences en intégration d'API ?). C'est un critère décisif sur un marché encombré.

## 7. Modèle de revenus pressenti
- B2B, abonnement mensuel, option annuelle −20 %, prix HT, facturé par Hasteria SASU (cadre studio).
- **Prix (H, à tester) :** palier unique autour de 149 € HT/mois par entreprise (connecteurs standards inclus), palier à environ 299 € HT/mois avec multi-entités, alertes et reporting banquier. Repères marché : Databox Team Core 199 $/mois en annuel, Fathom £38/mois par entreprise, Pennylane TPE jusqu'à 298 €/mois.
- **Variante distribution :** offre cabinet comptable tarifée par dossier client connecté (modèle Fathom) **(H)**.
- Pas d'unité de facturation par utilisateur (le dirigeant doit pouvoir partager sans freiner) **(H)**.

## 8. Hypothèses les plus risquées et comment les tester
| # | Hypothèse (testable) | Test rapide | Critère de réussite |
|---|---|---|---|
| H1 | **Douleur** : au moins 6 dirigeants sur 10 de la cible consacrent au moins 3 h/mois à consolider leurs chiffres ET citent un épisode récent où un chiffre tardif leur a coûté (trésorerie, recrutement, client) | 10 entretiens (script-interview-client), sans montrer de solution | ≥ 6/10 avec épisode concret et coût estimé |
| H2 | **Pas déjà résolu** : moins de la moitié de la cible déjà sous Pennylane juge son tableau de bord Pennylane (ou celui de son comptable) « suffisant » | Même entretiens + capture d'écran de leur outil actuel | < 50 % « suffisant » |
| H3 | **Volonté de payer** : au moins 3 dirigeants sur 10 acceptent un pré-engagement (lettre d'intention ou acompte) à environ 149 € HT/mois | Offre « pilote fondateur » en fin d'entretien ; landing avec prix affiché | ≥ 3 LOI ou ≥ 5 % d'inscrits sur la landing parmi les visiteurs qualifiés |
| H4 | **Connecteurs** : les 5 outils les plus cités par la cible ont une API accessible à un éditeur tiers, sans frais prohibitifs, et donnent les données utiles (Silae notamment, dont l'accès API peut passer par le cabinet de paie et lui être facturé, selon Lucca) | Recenser la stack des 10 interviewés ; tester les API Pennylane, Qonto, PayFit (clé client) ; demander un devis Chift/Apideck | ≥ 80 % des stacks couvertes par 5 connecteurs ; coût API unifiée < 15 % du prix de vente |
| H5 | **Acquisition** : un canal atteint la cible à un coût compatible (ex. experts-comptables prescripteurs, LinkedIn du fondateur) | 5 rendez-vous avec des cabinets ; 4 semaines de posts LinkedIn + landing | ≥ 1 cabinet prêt à tester sur 3 dossiers ; ≥ 50 inscrits qualifiés en liste d'attente |

## Premiers signaux de demande
**Aucun signal vérifiable à ce stade.** Éléments indirects seulement :
- la DGE a financé en 2019 une étude sur un « tableau de bord 4.0 » pour dirigeants de PME (83 indicateurs dont 18 obligatoires) et souligne que le dirigeant a besoin d'accompagnement, pas seulement d'un outil (entreprises.gouv.fr) — preuve d'intérêt institutionnel, **pas** de demande payante ;
- l'existence d'une offre abondante et financée (Agicap, Pennylane, Databox, Fathom) montre un marché réel mais encombré.

Éliminatoire du studio : « aucun signal de demande vérifiable », donc le signal doit être produit en phase 2 (entretiens + liste d'attente).

## Questions à poser à l'utilisateur
1. **Pourquoi toi ?** Quel est ton avantage concret : métier (finance, DAF, contrôle de gestion, ESN), réseau (dirigeants, experts-comptables), ou compétence technique ? Y a-t-il un premier client potentiel identifié ?
2. **Que mets-tu derrière « SI » et « autre » ?** (coûts et licences SaaS, parc informatique, sécurité, tickets support ? commercial, production ?) Cela change la cible et les connecteurs.
3. **Cible et canal** : es-tu d'accord pour resserrer sur les sociétés de services B2B de 15 à 100 salariés vendues en direct, ou préfères-tu explorer la distribution par les experts-comptables (B2B2B) ?

## Sources (consultées le 2026-10-25)
- INSEE, PME hors microentreprises : https://www.insee.fr/fr/statistiques/7678534
- Databox, tarifs : https://databox.com/pricing
- Fathom, tarifs (page partenaire ACCA) : https://www.fathomhq.com/partners/acca
- The Register, hausse Power BI : https://www.theregister.com/2025/04/02/microsoft_power_bi_hikes/
- Supermetrics, tarifs Looker Studio : https://supermetrics.com/blog/google-data-studio-pricing
- Pennylane, tarifs : https://www.pennylane.com/fr/tarifs ; relais tiers : https://meetergo.com/fr/blog/pennylane , https://www.impli.fr/post/pennylane-tarif , https://www.impli.fr/avis/pennylane
- Pennylane, connecteurs (relais d'un cabinet partenaire) : https://www.nexco-expertise.com/expert-comptable-pennylane
- Agicap, estimation tierce : https://www.impli.fr/avis/agicap
- Fygr : https://www.leblogdudirigeant.com/test-du-logiciel-fygr/ ; TurboPilot : https://tool-advisor.fr/logiciel-tresorerie/turbopilot/
- Chift : https://www.chift.eu/developers ; TechCrunch : https://techcrunch.com/2024/06/25/chift-lets-saas-companies-integrate-with-dozens-of-financial-tools-with-a-unified-api
- Apideck, intégrations France / Silae : https://www.apideck.com/integrations/country/france/accounting.md , https://www.apideck.com/integrations/silae-fr.md
- Lucca, accès API Silae : https://support.lucca.fr/hc/fr/article_attachments/16792303498012
- PayFit, API : https://developers.payfit.io/docs/start-with-payfit-api ; Nango : https://nango.dev/docs/integrations/all/payfit.md
- DGE, tableau de bord 4.0 : https://www.entreprises.gouv.fr/la-dge/publications/elaboration-du-cahier-des-charges-dun-tableau-de-suivi-dactivite-dentreprise
