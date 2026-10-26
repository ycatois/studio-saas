# Lanternis — statut
Phase actuelle : 2b Pré-lancement (supports prêts en brouillon, mesure non démarrée)
Dernière mise à jour : 2026-10-26
Score GO/NO-GO : —
Décision : en attente

## Fait
- Phase 0 : fiche idée, Lean Canvas, avocat du diable, réponses du fondateur (`0-idee/`).
- Phase 1 : pré-mortem, JTBD, faisabilité, modèle de revenus, synthèse (`1-analyse/`).
- Phase 2 : TAM/SAM/SOM, tendances, signaux de demande, personas, script d'entretien, benchmark, prix, acquisition, synthèse (`2-marche/`).
- Marque (brouillon) : `marque/plateforme-de-marque.md`, `messages-par-persona.md`, `noms-et-taglines.md`. Nom de marque retenu : **Lanternis** (« Lanternis est une marque d'Hasteria SASU »).
- Identité visuelle v1.0 (piste Veilleuse, logo Lanterne-arche) : `marque/charte/` (logo et déclinaisons, `tokens.css` et `tokens.json`, `charte-graphique.pdf` de 14 pages, image Open Graph, 20 icônes et 3 illustrations, gabarits blog, Facebook et email avec exemples). Design system v0.1 de l'application : `5-cadrage/design-system/` (design-system.md, components.css, demo.html).
- Pré-lancement (brouillons, rien de publié ni d'envoyé) :
  - landing de validation `marketing/landing/validation.html` et sa stratégie `validation.md`, avec l'autodiagnostic SI en 10 questions (`autodiagnostic.md`) ;
  - blog : `marketing/blog/plan-editorial-v0.md` et 2 articles (départ du responsable informatique ; inventaire informatique de PME sans DSI) ;
  - emails : confirmation de la liste d'attente et séquence de 5 emails (`marketing/emails/`) ;
  - Facebook : stratégie de test sur 6 semaines et 6 posts (`marketing/facebook/`) ;
  - prospection : 30 types de structures cibles et invitations à un entretien par email et téléphone (`marketing/campagnes/prospection-entretiens/`) ;
  - suivi des résultats réels : `2-marche/validation.md`.
  - pages légales en brouillon (`marketing/landing/mentions-legales.html`, `confidentialite.html`) et conformité du pré-lancement (`conformite-prelancement.md` : registre, règles de prospection tranchées) ;
  - site de pré-lancement et back-end de la liste d'attente pour o2switch : `produit/apps/prelancement/` (double opt-in, désinscription, autodiagnostic dans le navigateur, SQLite, Mailjet sans suivi). Tests : 25 tests et 37 vérifications de bout en bout au vert ; CI GitHub verte ; fusionné (PR #1). **Non déployé.**
- Positionnement : un « DSI de poche » pour les PME (50 à 249 salariés) et l'ESS (20 à 249) sans DSI. Logiciel et service (modèle hybride).

## En cours
- **Refonte du périmètre et des prix (2026-10-26), en attente des choix du fondateur :**
  - `1-analyse/perimetre-produit.md` : tout le SI centré sur les personnes (modules M0 à M12, MVP US-01 à US-20) ; remplace le § 6 de `faisabilite.md` ;
  - `1-analyse/faisabilite-v2.md` : effort révisé (P1 complet 19 à 26 sem., tranche pilote 14 à 18 sem., pilote concierge 9,5 à 12,5 sem.), droits Microsoft Graph et Google, RLS ;
  - `2-marche/propositions-tarifs.md` : 3 grilles (A forfait par tranche, B modules, C prix par personne avec minimum), essai d'un mois sans carte ;
  - décisions à prendre : choix de la grille, décisions D1 à D5 du périmètre, essai gratuit en libre-service (contredit `prix.md`), accès au code de Cockpit DSI ;
  - documents à mettre à jour après choix : `prix.md`, `modele-revenus.md`, TAM/SAM en euros, plafonds de CAC (`acquisition.md`), bloc tarifs de la landing, hypothèses 3, 5 et 7 ci-dessous.
- Déposer les polices Fraunces (woff2, OFL) dans `marque/charte/fonts/` (voir `fonts/README.md`) ; d'ici là, les visuels utilisent une police de repli.
- Recherche d'antériorité du logo et du nom (INPI, EUIPO, WIPO, logiciel Lantern) avant dépôt.
- Sécuriser le nom Lanternis : réserver lanternis.fr et lanternis.com, rechercher l'antériorité INPI/EUIPO (classes 9, 35, 42), puis demander l'avis d'un conseil en propriété industrielle avant le dépôt (skill nouvelle-marque-hasteria).

## Prochaines étapes
- **Avant toute mise en ligne ou tout envoi (bloquant) :**
  - réserver le domaine lanternis.fr ;
  - vérifier l'antériorité du nom ;
  - faire relire les pages légales par un avocat et lever les [À CONFIRMER] (hébergeur, transferts et DPA Mailjet, outil d'audience) ;
  - préparer o2switch (dossier, config.php, cron de purge) avant le déploiement validé par le fondateur ;
  - configurer Mailjet (SPF, DKIM, DMARC).
- **Arbitrages du fondateur :**
  - demander la fonction de l'inscrit dans le formulaire ?
  - valider le tarif fondateur (−30 % pendant 12 mois, 10 places) et la formulation « 25 ans d'expérience du SI » ;
  - prospecter le réseau Tecnoo au nom d'Hasteria ou de Tecnoo ?
- **Ensuite :** lancer les entretiens (réseau Tecnoo et ESS) et consigner les résultats dans `2-marche/validation.md`.
- 12 à 15 entretiens Mom Test (script `2-marche/script-interview.md`), en commençant par le réseau Tecnoo et l'ESS.
- Faire valider par juriste-rgpd les règles de prospection B2B avant les premiers envois.
- Devis : Chift, Kombo, Bridge, Powens ; demander à ESS France les données Flores par taille.

## Hypothèses à vérifier
1. **Douleur SI** : les dirigeants sans DSI ressentent assez la perte de maîtrise de leur informatique pour payer. Déclencheur à tester : le départ du référent informatique.
2. **Pas déjà résolu** : ni le prestataire, ni Excel, ni Corma ou Primo ne leur suffisent ; un écran pour le dirigeant et un service humain font la différence.
3. **Volonté de payer** : ≥ 3 lettres d'intention à 149 € HT/mois ou plus ; tester 399 € contre 449 € pour les 100 à 249 salariés, et l'écart de prix face à Corma.
4. **Cockpit vide** : la mise en place assistée et les alertes suffisent à garder les données à jour.
5. **Acquisition** : CAC ≤ 1 500 à 1 700 € ; ≥ 80 inscrits qualifiés et ≥ 12 entretiens en 8 semaines.
6. **Part sans DSI** (88 % des 20 à 49, 65 % des 50 à 249) : estimation sans source directe.
7. **Connecteurs** : Microsoft 365, Google Workspace, Qonto et Pennylane suffisent au MVP.

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
