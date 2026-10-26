# Lanternis — statut
Phase actuelle : 2b Pré-lancement (supports prêts, site non déployé, mesure non démarrée)
Dernière mise à jour : 2026-10-26
Score GO/NO-GO : —
Décision : en attente

## Point de reprise (fin de session du 2026-10-26)
- Tout est sur `main`, sans branche ouverte (PR #1 à #5 fusionnées, CI verte). **Rien n'est publié, envoyé ni déployé.**
- Prochaine action côté fondateur : réserver lanternis.fr, faire relire les pages légales, créer le compte Mailjet, puis lancer `/deployer lanternis` (validation explicite requise).
- En parallèle, sans attendre la mise en ligne : commencer les entretiens de validation (`2-marche/script-interview.md`), puis consigner les résultats dans `2-marche/validation.md`.

## Fait
- Phase 0 : fiche idée, Lean Canvas, avocat du diable, réponses du fondateur (`0-idee/`).
- Phase 1 : pré-mortem, JTBD, synthèse ; **périmètre produit « tout le SI centré sur les personnes »** (`1-analyse/perimetre-produit.md` : modules M0 à M12, MVP US-01 à US-20, sauvegardes incluses) ; **faisabilité v2** (`faisabilite-v2.md` : développement de zéro, tranche pilote d'environ 15 à 19 semaines avec le libre-service) ; **modèle de revenus v2** (`modele-revenus.md`, grille D, libre-service).
- Phase 2 : TAM/SAM/SOM (recalculés), tendances, signaux, personas (cœur de cible 20 à 99), script d'entretien, benchmark, prix, **propositions de tarifs** (`propositions-tarifs.md`, grille D au § 11), **acquisition v2** (canaux automatisés), synthèse, suivi `validation.md`.
- Marque **v1.2** : promesse « Toute votre informatique, reliée à chaque personne : vous savez qui a quoi, ce que vous payez et ce qui arrive à échéance. Et Lanternis vous prévient avant. » ; 6 domaines ; « Conçu par un DSI » ; nom **Lanternis** (marque d'Hasteria SASU).
- Identité visuelle v1.0 (piste Veilleuse, logo Lanterne-arche) : `marque/charte/` (logo, tokens, charte PDF de 14 pages, image de partage v1.2, 20 icônes, 3 illustrations, gabarits avec exemples). Design system v0.1 : `5-cadrage/design-system/`.
- Pré-lancement (brouillons) :
  - landing v3 (`marketing/landing/validation.html`, titre A, 6 domaines, grille D avec simulateur, balises de partage) et sa stratégie `validation.md` ; autodiagnostic en 10 questions sur les 6 domaines ;
  - pages légales en brouillon et conformité (`mentions-legales.html`, `confidentialite.html`, `conformite-prelancement.md`) ;
  - blog : plan éditorial et 2 articles ; emails : confirmation et lettre mensuelle de 4 éditions ; Facebook : stratégie de test et 6 posts ; prospection : 30 types de structures et invitations à un entretien de recherche ;
  - site de pré-lancement pour o2switch (`produit/apps/prelancement/`) : liste d'attente avec double opt-in, champs palier et essai, cible 20 à 249, autodiagnostic dans le navigateur, SQLite, Mailjet sans suivi, CSP stricte ; 29 tests et 41 vérifications au vert, CI GitHub. **Non déployé.**

## En cours
- Rien en cours côté studio.

## Prochaines étapes
- **Bloquant avant mise en ligne ou envoi (fondateur) :**
  - réserver lanternis.fr (et .com) ; vérifier l'antériorité du nom et du logo (INPI, EUIPO, WIPO, logiciel Lantern), puis demander l'avis d'un conseil en propriété industrielle ;
  - faire relire par un avocat les pages légales et `conformite-prelancement.md`, et lever les [À CONFIRMER] (hébergeur, transferts et DPA Mailjet, outil d'audience) ;
  - créer le compte Mailjet (SPF, DKIM, DMARC) et confirmer le compte o2switch ;
  - puis `/deployer lanternis` : config.php, cron de purge, og:url et URL absolue de l'image de partage.
- **Validation de la demande :** 12 à 15 entretiens (réseau Tecnoo et ESS), relais ESS et Solidatech, puis `/bilan` une fois les résultats réunis.
- **Arbitrages encore ouverts :**
  - signature « Conçu par un DSI » et mention de l'expérience du fondateur ;
  - forme de l'avantage « pilote fondateur » en libre-service ;
  - services optionnels à 190 et 290 € (ou renvoi vers Tecnoo) ;
  - nom utilisé pour contacter le réseau Tecnoo (Hasteria ou Tecnoo) ;
  - plafond « une lettre par mois » : confirmer avec juriste-rgpd que les emails transactionnels et les réponses individuelles n'y comptent pas.
- **Petits restes :** déposer les polices Fraunces (`marque/charte/fonts/README.md`) ; aligner `strategie-facebook-v0.md` sur la v1.2 ; vérifier le contexte du chiffre de 39 % (post Facebook 5).

## Hypothèses à vérifier
1. **Douleur SI** : les dirigeants de structures de 20 à 249 personnes sans DSI ressentent assez la perte de maîtrise (contrats reconduits, licences et matériel non suivis, départs) pour payer.
2. **Pas déjà résolu** : ni le prestataire, ni Excel, ni Corma, Primo ou GLPI ne leur suffisent ; un registre de tout le SI relié aux personnes fait la différence.
3. **Volonté de payer (grille D)** : ≥ 60 % des inscrits qualifiés déclarent une intention d'essai, ≥ 3 structures pilotes s'engagent par écrit, et le prix n'est pas jugé « trop bon marché ».
4. **Cockpit vide** : sans accompagnement humain, l'import, l'onboarding guidé et les alertes suffisent à activer ≥ 50 % des essais.
5. **Acquisition en libre-service** : ≈ 18 à 28 essais par mois atteignables à terme, avec un CAC moyen ≤ 330 € la première année (H) ; ≥ 80 inscrits qualifiés en 8 semaines.
6. **Part sans DSI** (88 % des 20 à 49, 65 % des 50 à 249) : estimation sans source directe.
7. **Connecteurs** : Microsoft 365 (et Google Workspace si un pilote l'utilise), import Excel et RDAP/TLS suffisent au MVP ; droits Microsoft Graph à vérifier sur un locataire de test.

## Journal des décisions
- 2026-10-25 — Création de la venture.
- 2026-10-25 — Réponses du fondateur : périmètre SI complet pour des PME sans DSI ; vente directe aux PME et à l'ESS (remise ESS possible) ; la vente via les experts-comptables n'est pas retenue.
- 2026-10-25 — Analyse : recentrage proposé sur le volet SI.
- 2026-10-25 — Arbitrages du fondateur : (1) le temps à consacrer au projet n'est pas une contrainte ; (2) le code de Cockpit DSI appartient au fondateur / Hasteria, réutilisation possible sans cession ; (3) modèle hybride logiciel + service accepté.
- 2026-10-25 — Marché : les PME marchandes de 20 à 49 salariés sont exclues du SAM (CAC non couvert en vente directe) ; segment prioritaire : 100 à 249 salariés ; ne pas se positionner sur la seule gestion des SaaS (Corma).
- 2026-10-25 — Nom de marque : **Lanternis** retenu par le fondateur (à la place du nom de travail Pilotis ; domaines .fr et .com apparemment libres, marque à vérifier). « Cockpit DSI » est écarté comme nom de marque (trop descriptif, peu protégeable), mais reste utilisable comme accroche. Dossier et slug renommés en `lanternis` par le fondateur le 2026-10-25.
- 2026-10-26 — `SOCIETE.md` complété par le fondateur ; Lanternis ajoutée aux marques exploitées.
- 2026-10-26 — Canaux : **pas de promotion sur LinkedIn pour le moment** (C3 retiré, prospection par email et téléphone uniquement). Le blog du site vitrine (SEO) devient le canal de contenu principal, avec une page Facebook possible. Pas de voix fondateur : les contenus sont signés par la marque.
- 2026-10-26 — Piste créative **Veilleuse** retenue par le fondateur (nuit #1B2330, ambre #F2B24C, papier #FAF6EE ; Fraunces + polices système).
- 2026-10-26 — Logo **Lanterne-arche** retenu (affiné : anneau détaché, foyer agrandi, symbole compact pour 16 à 24 px). Charte v1.0, iconographie, gabarits et design system v0.1 produits.
- 2026-10-26 — Pré-lancement préparé en brouillon. Série LinkedIn remplacée par un test Facebook (6 semaines, orienté associations) ; le blog est le canal de contenu principal. Fichiers de suivi de prospection exclus du dépôt (`.gitignore`).
- 2026-10-26 — Pages légales et conformité du pré-lancement rédigées (projets, relecture d'avocat requise). Back-end de la liste d'attente développé, testé et fusionné (PR #1) ; déploiement soumis à validation.
- 2026-10-26 — Case « nouvelles » : on garde « au plus une par mois ». La séquence devient une lettre mensuelle de 4 éditions (17 nov., 17 déc., 19 janv., 18 févr.). Les entretiens viendront surtout des échanges individuels. À confirmer par juriste-rgpd : les emails transactionnels et les réponses individuelles hors plafond.
- 2026-10-26 — Le fondateur demande de gérer **tout le SI** (contrats, matériel, messagerie et accès, arrivées et départs) et fixe le cadre tarifaire : essai d'un mois à 0 €, paliers à 49 € et 99 € HT, puis un ou deux paliers supérieurs. Périmètre, faisabilité et grilles retravaillés.
- 2026-10-26 — Décisions du fondateur :
  - (1) **modèle de vente automatisé au maximum** : le fondateur intervient très peu dans la vente (libre-service, product-led) ;
  - (2) décisions D1 à D5 du périmètre validées : lecture seule sans aucun mot de passe ni secret métier stocké ; pas de téléversement de fichiers au MVP ; prix fondé sur les personnes ; Google Workspace au MVP seulement si un pilote l'utilise ; banque et compta après le MVP ;
  - (3) **essai gratuit d'un mois en libre-service** ;
  - (4) **Cockpit DSI abandonné** : le produit sera développé de zéro ;
  - (5) grille tarifaire : hésitation entre A et C, demande d'une grille mixte.
- 2026-10-26 — **Grille tarifaire D validée** : Essentiel 49 €, Pilotage 99 € HT/mois jusqu'à 49 personnes, puis +30 € et +60 € par tranche de 50 personnes. Pilotage+ (199 €, +90 €) ouvrira avec le multi-sites. Annuel −20 % ; ESS −15 % non cumulable ; bénévoles gratuits ; essai d'un mois sans carte ; libre-service jusqu'à 499 personnes, « Écrivez-nous » au-delà. Aucun service humain inclus.
- 2026-10-26 — Mises à jour après la grille D : marque v1.1 (« conçu par un DSI », arrivées et départs en bénéfice phare), modèle de revenus v2, acquisition v2 (canaux automatisés), prix et TAM/SAM recalculés, contenus marketing alignés. **Les PME de 20 à 49 personnes réintègrent la cible** (cœur de cible 20 à 99) ; la landing et la liste d'attente sont modifiées en conséquence (PR #2).
- 2026-10-26 — Retour du fondateur : la landing donnait l'impression d'un outil d'arrivées et de départs seulement. Marque v1.2 : le message phare devient **tout le SI relié aux personnes** (contrats, matériel acheté, loué ou en leasing, licences, accès, domaines et sauvegardes). Landing v3 avec les 6 domaines (PR #3). Les sauvegardes restent marquées « prévu ».
- 2026-10-26 — Titre A de la landing retenu (« Toute votre informatique, enfin lisible… »). **Sauvegardes et tests de restauration intégrés au MVP** (US-13 en Must, tranche pilote + 0,25 semaine) ; l'étiquette « prévu » est retirée de la landing.
- 2026-10-26 — Alignement sur la marque v1.2 : image de partage (« Toute votre informatique, enfin lisible »), balises Open Graph ajoutées à la landing, autodiagnostic (10 questions sur les 6 domaines), posts Facebook (un seul sur les départs) et exemples de visuels.
