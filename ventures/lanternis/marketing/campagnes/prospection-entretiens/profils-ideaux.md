---
venture: lanternis
phase: 2b Pré-lancement
auteur: commercial (prospection-b2b)
date: 2026-10-26
statut: brouillon
skills: prospection-b2b, messages-par-persona
sources internes: 2-marche/personas.md, 2-marche/acquisition.md (amendement du 2026-10-26), 2-marche/signaux-demande.md, 2-marche/script-interview.md, marque/plateforme-de-marque.md
---

# Lanternis : profils de comptes idéaux pour les entretiens de découverte

> **Objet.** Trouver les structures à qui proposer un **entretien de découverte de 30 minutes** (Mom Test, `2-marche/script-interview.md`), pas une vente. Objectif du pré-lancement : 12 à 15 entretiens, dont au moins 3 par tranche d'effectif et 3 à 5 dans l'ESS (`acquisition.md` § 4.2).
> **Canaux :** **email et téléphone uniquement** (amendement du 2026-10-26 : pas de LinkedIn, pas de Sales Navigator). Les déclencheurs se repèrent dans des **sources publiques** : offres d'emploi, appels à projets, annuaires des fédérations, base SIRENE, FINESS, BODACC.
> **Ce document ne contient aucune donnée personnelle.** Il décrit des **types de structures**, pas des personnes ni des organisations nommées. Le repérage des structures réelles et des interlocuteurs se fait ensuite, au cas par cas, selon les règles RGPD de `invitation-entretien.md` § 6.
> **(H)** = hypothèse non vérifiée. Les codes NAF et de catégorie juridique sont donnés comme **filtres de départ** : à vérifier dans la nomenclature de l'Insee avant chaque extraction (H).
> **Rien n'est envoyé.** Tout contact est fait individuellement par le fondateur, après validation de l'utilisateur (règle 2 de `CLAUDE.md`).

---

## 1. Rappel du ciblage

| Critère | Retenu | Exclu |
|---|---|---|
| Effectif (PME marchandes) | **100 à 249 salariés en priorité**, puis 50 à 99 | moins de 50 (CAC non couvert en vente directe, `acquisition.md` § 3.2) ; 250 et plus |
| Effectif (ESS) | 50 à 249 en prospection individuelle ; **20 à 49 seulement via des relais** (fédérations, CRESS, webinaires) | prospection individuelle des ESS de 20 à 49 (CAC maximal ≈ 390 à 690 €, `acquisition.md` § 3.2) |
| Organisation informatique | Pas de DSI ni de directeur technique ; informatique tenue par un prestataire, un référent interne ou la direction administrative | Structure dotée d'une DSI ; filiale dont l'informatique est gérée par le groupe ; entreprise du numérique (NAF 62.xx, 63.xx) |
| Interlocuteur visé | Dirigeant (P1), DAF ou RAF (P2), directeur général d'association | Office manager (P3) : jamais ciblée seule, seulement comme relais interne |
| Déclencheurs (`acquisition.md`) | **Départ du référent informatique**, **changement de prestataire**, **projet ESMS numérique** ; secondaires : fusion, reprise, nouveau DAF, ouverture d'établissement | — |

### Codes de tranche d'effectif SIRENE utiles
| Code | Tranche |
|---|---|
| 12 | 20 à 49 salariés |
| 21 | 50 à 99 salariés |
| 22 | 100 à 199 salariés |
| 31 | 200 à 249 salariés |

Source : catalogue du stock SIRENE au CASD, https://www.casd.eu/en/source/company-and-establishment-inventory/?tab=1 ; Insee, https://www.insee.fr/fr/information/1896455 (consultés le 2026-10-26). **Attention :** la tranche SIRENE est souvent ancienne ou non renseignée (code NN ou 00) ; l'effectif se confirme à la qualification (H).

---

## 2. Où trouver les structures (sources publiques uniquement)

| Source | Ce qu'on y trouve | Usage | Remarque |
|---|---|---|---|
| **Annuaire des entreprises** (https://annuaire-entreprises.data.gouv.fr) et API Recherche d'entreprises (https://recherche-entreprises.api.gouv.fr) | Raison sociale, SIREN, code NAF, tranche d'effectif, nature juridique, appartenance à l'ESS | Filtrer par NAF, tranche (21, 22, 31) et département ; vérifier le statut d'une structure repérée ailleurs | Filtres exacts de l'interface et de l'API à vérifier (H) ; ne pas extraire les noms des dirigeants |
| **FINESS** (fichier national des établissements sanitaires et sociaux ; extraction CSV sur data.gouv.fr) | Établissements sociaux et médico-sociaux et leur **entité juridique gestionnaire** | Trouver les associations gestionnaires de plusieurs ESMS | DREES : https://drees.solidarites-sante.gouv.fr/sources-outils-et-enquetes/le-fichier-national-des-etablissements-sanitaires-et-sociaux-finess (consulté le 2026-10-26) ; fréquence de mise à jour du fichier ouvert à vérifier |
| **Annuaires et listes d'adhérents des fédérations** : Nexem, Fehap, Uniopss et ses URIOPSS | Associations et fondations du secteur social et médico-social | Repérer les gestionnaires de 50 à 249 salariés ; repérer aussi les **relais** (canal C4) | Existence et accès public de chaque annuaire à vérifier (H) ; respecter les conditions d'utilisation de chaque site |
| **CRESS** (chambres régionales de l'ESS) | Annuaires ou observatoires régionaux de l'ESS | Coopératives, associations employeuses, mutuelles | Contenu variable selon les régions (H) |
| **Offres d'emploi publiques** : France Travail, HelloWork, Apec, sites carrières des structures | « Responsable informatique », « technicien informatique », « RAF » ou « DAF » avec l'informatique dans les missions ; mentions « départ en retraite », « création de poste » | **Déclencheur n° 1** (S2 de `signaux-demande.md`) | Noter la **structure** et l'extrait de l'offre, jamais le nom de la personne qui part ; beaucoup d'offres passent par des cabinets et sont anonymes |
| **Appels à projets des ARS** (ESMS numérique) et listes de lauréats publiées | Structures engagées dans un projet de dossier usager informatisé | **Déclencheur ESMS numérique** (S3) | Dernière campagne en 2026 (S3) ; vérifier ce que chaque ARS publie |
| **BODACC** (https://www.bodacc.fr) | Cessions, fusions, changements de dirigeant, transmissions universelles de patrimoine | Déclencheurs secondaires : reprise ou fusion | Usage limité à la structure ; pas de constitution de fichier de dirigeants |
| **Avis de marché publics** (BOAMP, profils d'acheteurs) | Rarement utiles : `signaux-demande.md` § 3 n'a trouvé aucun appel d'offres « audit SI » de structures cibles | Veille secondaire sur « infogérance » émis par des structures parapubliques ou associatives (H) | — |
| **Site web de la structure** | Organigramme, rapport d'activité, mentions légales, standard téléphonique, adresse générique | Confirmer l'effectif, l'absence de DSI, la fonction à contacter | Préférer le **standard** ou l'**adresse générique** pour le premier contact (voir `invitation-entretien.md` § 6) |

**Interdits (rappel, à faire valider par juriste-rgpd) :** achat de fichiers d'emails nominatifs, extraction automatisée de profils de réseaux sociaux, outils d'enrichissement qui devinent des adresses nominatives, conservation de données sur des personnes qui ne sont pas l'interlocuteur visé.

---

## 3. Les 30 profils de comptes idéaux

Légende : **Priorité** A = à contacter en premier (100 à 249 avec déclencheur), B = second rang, C = relais seulement. **Persona** : P1 dirigeant, P2 DAF ou RAF. Les codes NAF sont indicatifs (H).

### 3.1 PME marchandes de 100 à 249 salariés (segment prioritaire, P1)

| # | Type de structure | Secteur et NAF indicatif | Effectif (tranche) | Statut | Déclencheur observable | Où la trouver | Interlocuteur | Prio. |
|---|---|---|---|---|---|---|---|---|
| 1 | Industriel de la mécanique ou de la métallurgie, un ou deux sites | Fabrication de produits métalliques, machines (25.xx, 28.xx) | 100 à 249 (22, 31) | SAS ou SA indépendante | Offre « responsable informatique » mentionnant un **départ en retraite** (cas réel en S2) | Offres d'emploi ; SIRENE par NAF et tranche | Dirigeant ; directeur industriel en relais | A |
| 2 | Industriel de l'agroalimentaire | Industries alimentaires (10.xx) | 100 à 249 | SAS familiale | Offre « technicien » ou « responsable informatique » ; **création de poste** | Offres d'emploi ; SIRENE | Dirigeant, DAF | A |
| 3 | Plasturgie, emballage, transformation | 22.2x, 17.2x | 100 à 249 | SAS | Offre « responsable informatique » liée à un départ ; offre « RAF » avec la mention « suivi des prestataires informatiques » | Offres d'emploi ; SIRENE | Dirigeant | A |
| 4 | Transporteur routier ou logisticien multi-sites | 49.41A, 52.10B, 52.29A (H) | 100 à 249 | SAS | Offre « responsable informatique » ; ouverture d'une plateforme ou d'une agence | Offres d'emploi ; presse économique régionale | Dirigeant, DAF | A |
| 5 | Négociant ou grossiste B2B (fournitures industrielles, matériaux, équipements) | Commerce de gros (46.xx) | 100 à 249 | SAS | Changement d'ERP ou offre « RAF / responsable informatique » | Offres d'emploi ; SIRENE | Dirigeant, DAF | A |
| 6 | Entreprise générale du bâtiment ou de travaux publics | 41.20A/B, 42.xx | 100 à 249 | SAS | Offre « responsable informatique » ; forte rotation des effectifs sur chantier (arrivées et départs) | Offres d'emploi ; annuaires professionnels publics du BTP (H) | Dirigeant | A |
| 7 | Entreprise d'installation électrique, de génie climatique ou de maintenance multitechnique | 43.21A, 43.22B (H) | 100 à 249 | SAS | Offre « responsable informatique » ; flotte de smartphones et tablettes des techniciens | Offres d'emploi ; SIRENE | Dirigeant | A |
| 8 | Bureau d'études ou société d'ingénierie (hors numérique) | 71.12B | 100 à 249 | SAS | Offre « responsable informatique » ; questionnaire de sécurité d'un client grand compte (H, rarement visible) | Offres d'emploi ; SIRENE | Dirigeant, DAF | A |
| 9 | Groupe de concessions automobiles ou d'engins | 45.11Z, 45.20A (H) | 100 à 249 | SAS, holding familiale | Offre « responsable informatique » ; rachat d'une concession | Offres d'emploi ; BODACC | Dirigeant, DAF | A |
| 10 | Imprimerie ou industrie graphique | 18.12Z | 100 à 249 | SAS | Offre « responsable informatique » ; renouvellement du parc d'équipements de production (H) | Offres d'emploi ; SIRENE | Dirigeant | B |
| 11 | Entreprise de propreté ou de services aux bâtiments multi-agences | 81.21Z | 100 à 249 | SAS | Offre « RAF » avec l'informatique dans les missions ; nombreuses arrivées et départs | Offres d'emploi ; SIRENE | DAF ou RAF | B (peu de postes par salarié, budget SI à vérifier, H) |
| 12 | Entreprise de sécurité privée multi-sites | 80.10Z | 100 à 249 | SAS | Offre « RAF » ou « responsable informatique » ; forte rotation des effectifs | Offres d'emploi ; SIRENE | Dirigeant, DAF | B |
| 13 | Groupe hôtelier ou de restauration régional | 55.10Z, 56.10A (H) | 100 à 249 | SAS, holding | Ouverture d'un établissement ; offre « contrôleur de gestion » ou « RAF » avec l'informatique dans les missions | Offres d'emploi ; BODACC | Dirigeant, DAF | B |
| 14 | Réseau de magasins régional (distribution spécialisée) | 47.xx | 100 à 249 | SAS | Changement de logiciel de caisse ou d'ERP (H, visible dans une offre) | Offres d'emploi | Dirigeant, DAF | B |
| 15 | PME reprise ou transmise (tous secteurs hors numérique) | Tous | 100 à 249 | SAS | **Changement de dirigeant** ou cession publié au BODACC : le repreneur découvre un SI sans carte (H) | BODACC ; presse économique régionale | Nouveau dirigeant | A (déclencheur à tester) |
| 16 | PME qui recrute un **nouveau DAF ou RAF** dont l'informatique fait partie du périmètre | Tous | 100 à 249 | SAS | Offre de DAF ou RAF mentionnant « informatique », « prestataires informatiques » ou « systèmes d'information » (S10) | Offres d'emploi | Dirigeant (avant l'arrivée) ou nouveau DAF | A |
| 17 | PME issue d'une croissance externe (rachat d'une ou plusieurs sociétés) | Tous | 100 à 249 | Holding et filiales | Fusion ou transmission publiée au BODACC ; deux SI à rapprocher | BODACC ; presse régionale | Dirigeant, DAF | B |
| 18 | PME qui change de prestataire d'infogérance | Tous | 100 à 249 | SAS | Rarement observable de l'extérieur (`signaux-demande.md` § 3) : à repérer **en entretien** et par recommandation, ou par une offre mentionnant « reprise de l'infogérance » (H) | Offres d'emploi ; recommandations des premiers entretiens | Dirigeant | B |

### 3.2 PME marchandes de 50 à 99 salariés (second rang, P1)

| # | Type de structure | Secteur et NAF indicatif | Effectif | Statut | Déclencheur observable | Où la trouver | Interlocuteur | Prio. |
|---|---|---|---|---|---|---|---|---|
| 19 | Industriel de petite taille (sous-traitance, transformation) | 25.xx, 28.xx, 22.xx | 50 à 99 (21) | SAS | **Premier recrutement** d'un technicien informatique (création de poste) | Offres d'emploi ; SIRENE | Dirigeant | B |
| 20 | Société de services B2B (ingénierie, contrôle technique, études) | 71.xx | 50 à 99 | SAS | Offre « RAF » ou « assistant(e) de direction » avec « gestion du parc informatique » dans les missions | Offres d'emploi | Dirigeant | B |
| 21 | Transporteur, logisticien ou négociant de taille moyenne | 49.41A, 46.xx | 50 à 99 | SAS | Départ du référent ; changement d'ERP | Offres d'emploi | Dirigeant | B |

### 3.3 ESS : social et médico-social (P2)

| # | Type de structure | Secteur et NAF indicatif | Effectif | Statut | Déclencheur observable | Où la trouver | Interlocuteur | Prio. |
|---|---|---|---|---|---|---|---|---|
| 22 | Association gestionnaire de plusieurs établissements du handicap (IME, foyers, ESAT) | 87.20A, 88.10C, 85.xx (H) | 100 à 249 | Association déclarée (catégorie juridique 9220, H) | **Projet ESMS numérique** (dossier usager informatisé) ; offre « RAF » ou « DAF » | FINESS (entité juridique gestionnaire) ; annuaires Nexem, Fehap ; appels à projets ARS | DAF ou RAF ; directeur général | A |
| 23 | Association de protection de l'enfance (maisons d'enfants, services éducatifs) | 87.90A, 88.99B (H) | 50 à 249 | Association | ESMS numérique ; offre de DAF ; regroupement de services | FINESS ; annuaires Nexem, URIOPSS | DAF ; directeur général | A |
| 24 | Association ou service d'aide et d'accompagnement à domicile | 88.10A | 100 à 249 | Association | Nombreuses arrivées et départs ; flotte de smartphones des intervenants ; changement de logiciel de télégestion (H) | FINESS ; annuaires des fédérations de l'aide à domicile (H) ; offres d'emploi | DAF ou RAF ; directeur | A |
| 25 | EHPAD ou résidence associative ou de fondation | 87.10A | 50 à 249 | Association, fondation | ESMS numérique ; offre « responsable administratif » ; questions RGPD sur les données des résidents | FINESS ; annuaire Fehap | Directeur, DAF | B |
| 26 | Association d'insertion ou d'hébergement social (ateliers et chantiers d'insertion, CHRS) | 88.99B, 87.90B (H) | 50 à 249 | Association | Offre « RAF » ; regroupement d'associations ; demande d'un financeur | Annuaires des réseaux de l'insertion (H) ; FINESS pour l'hébergement ; CRESS | DAF ; directeur général | B |
| 27 | Association ou fondation issue d'une **fusion** de plusieurs associations | Social, médico-social | 100 à 249 | Association, fondation | Fusion annoncée (presse spécialisée, rapport d'activité) : SI à harmoniser | Annuaires des fédérations ; publications des URIOPSS (H) | DAF ; directeur général | A |

### 3.4 ESS hors médico-social

| # | Type de structure | Secteur et NAF indicatif | Effectif | Statut | Déclencheur observable | Où la trouver | Interlocuteur | Prio. |
|---|---|---|---|---|---|---|---|---|
| 28 | Coopérative de production ou d'intérêt collectif (SCOP, SCIC) dans l'industrie, le BTP ou les services | Selon l'activité | 50 à 249 | SCOP ou SCIC (catégorie juridique à vérifier, H) | Offre « RAF » ou « responsable informatique » ; transmission de l'entreprise aux salariés | Annuaire des coopératives de la confédération des SCOP (H) ; CRESS ; SIRENE (appartenance à l'ESS) | Gérant ou directeur général ; DAF | B |
| 29 | Association d'éducation populaire, de formation ou de centres sociaux | 85.59A, 88.99B, 94.99Z (H) | 50 à 249 | Association | Offre « RAF » avec l'informatique dans les missions ; demande d'un financeur public | CRESS ; annuaires des réseaux de centres sociaux (H) ; offres d'emploi | DAF ; directeur | B |
| 30 | Association employeuse de 20 à 49 salariés, tous secteurs | Tous | 20 à 49 (12) | Association | Tout déclencheur | **Uniquement via des relais** : CRESS, fédérations, Solidatech (canal C4) ; aucune prospection individuelle | Directeur, trésorier, RAF | C (relais) |

**Répartition visée pour 100 contacts (H, à ajuster) :** environ 50 % de PME de 100 à 249 (profils 1 à 18), 20 % de PME de 50 à 99 (19 à 21), 30 % d'ESS de 50 à 249 (22 à 29). Le profil 30 n'entre pas dans les 100 contacts.

---

## 4. Grille de qualification (score sur 100)

À remplir **avant** le premier contact, à partir des seules informations publiques sur la structure. Les pondérations sont des hypothèses, à recalibrer après 30 contacts.

| Critère | Poids | Barème |
|---|---|---|
| **Effectif** | 25 | 100 à 249 : 25 · 50 à 99 : 15 · ESS de 20 à 49 : 0 (relais seulement) · inconnu : 5 |
| **Déclencheur observable** | 25 | Départ du référent ou projet ESMS numérique, constaté depuis moins de 3 mois : 25 · autre déclencheur (nouveau DAF, reprise, fusion, changement de prestataire ou d'ERP) depuis moins de 3 mois : 18 · déclencheur de plus de 3 mois : 8 · aucun : 0 |
| **Absence de DSI** | 15 | Aucun DSI visible et informatique confiée au DAF, à un référent ou à un prestataire : 15 · incertain : 7 · DSI ou directeur technique visible : **éliminatoire** |
| **Sensibilité du SI** | 10 | Données sensibles (personnes accompagnées, santé) ou exigences de clients grands comptes : 10 · multi-sites : 7 · autre : 3 |
| **Accès à l'interlocuteur** | 10 | Recommandation ou réseau Tecnoo : 10 · standard ou adresse générique avec fonction identifiable : 6 · aucun point d'entrée : 0 |
| **Adéquation avec le segment prioritaire** | 10 | Profil A : 10 · B : 5 · C : 0 |
| **Proximité géographique** (pour un atelier sur place éventuel) | 5 | Même région que le fondateur : 5 · autre : 2 |

**Seuils (H) :** ≥ 70 : contacter cette semaine · 50 à 69 : liste d'attente, contacter si le volume manque · < 50 : ne pas contacter.

**Éliminatoires :** DSI ou directeur technique en poste ; structure de 250 salariés ou plus ; filiale dont le SI est géré par le groupe ; entreprise du numérique (NAF 62, 63) ; organisme public ; structure déjà contactée et qui s'est opposée (liste d'opposition) ; client ou prospect en cours de Tecnoo sans accord préalable sur la relation Tecnoo / Hasteria (`acquisition.md` § 7, point 5).

---

## 5. Modèle de tableau de suivi (colonnes seulement)

**Où le tenir :** le tableau rempli contient des données personnelles (nom et coordonnées professionnelles de l'interlocuteur). **Il ne doit pas être commité dans le dépôt Git.** Le tenir hors du dépôt (tableur sur un espace de stockage hébergé dans l'UE, accès limité au fondateur) ou dans un fichier exclu par `.gitignore` (selon juriste-rgpd, une exclusion existe déjà pour la prospection : vérifier le motif exact avant de créer le fichier). Les adresses reconstituées sont interdites par défaut (exception encadrée : `invitation-entretien.md` § 6.5). Durée de conservation : voir `invitation-entretien.md` § 6.4.

### 5.1 Onglet « Comptes » (aucune donnée personnelle)

| ID compte | Profil n° (1 à 30) | Structure (raison sociale) | SIREN | Secteur (NAF) | Tranche d'effectif | Statut juridique | Département | Déclencheur observé | Source du déclencheur (URL) | Date de constat | Score de qualification (/100) | Priorité (A, B, C) | DSI visible (oui, non, incertain) |
|---|---|---|---|---|---|---|---|---|---|---|---|---|---|
| | | | | | | | | | | | | | |

### 5.2 Onglet « Contacts et suivi » (données personnelles minimales)

| ID compte | Fonction de l'interlocuteur | Nom de l'interlocuteur | Canal du premier contact (email, téléphone, recommandation) | Coordonnée professionnelle utilisée | **Source de la coordonnée** (site de la structure, standard, recommandation de…) | Information RGPD donnée (date, canal) | Variante de message (P1-D, P1, P2) | Date du 1er contact | Date de la relance 1 | Date de la relance 2 | Réponse (aucune, oui, non, plus tard, opposition) | **Opposition enregistrée** (date) | Étape (à contacter, contacté, relancé, entretien fixé, entretien fait, clos) | Date de l'entretien | Engagement obtenu (aucun, atelier, lettre d'intention, acompte) | Objection entendue (mots exacts) | Prochaine action | Date de la prochaine action | Date de suppression prévue |
|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|---|
| | | | | | | | | | | | | | | | | | | | |

### 5.3 Onglet « Liste d'opposition »
| Coordonnée (email ou numéro professionnel) | Structure | Date de l'opposition | Canal |
|---|---|---|---|
| | | | |

À consulter **avant chaque envoi ou appel**. **Liste unique pour Hasteria** (tranché par juriste-rgpd, `marketing/landing/conformite-prelancement.md` § 3.6) : une opposition vaut pour tous les canaux et pour toutes les marques d'Hasteria. Stocker des empreintes hachées, conservées 3 ans minimum, pour cette seule finalité.

### 5.4 Indicateurs à calculer chaque quinzaine (`acquisition.md` § 4.3)
Contacts envoyés · taux de réponse (objectif ≥ 10 %, arrêt si < 5 % après 60 contacts et 2 variantes) · entretiens obtenus · entretiens réalisés · engagements · temps passé par contact (chronométré) · taux de réponse par profil, par déclencheur et par variante de message · objections les plus fréquentes (à remonter au marketing et au produit).

---

## 6. Hypothèses à vérifier
1. Le **départ du référent informatique** ouvre une fenêtre de réponse plus élevée que les autres déclencheurs (S2 ne parle que de recrutements, pas d'acheteurs).
2. Les **codes NAF** proposés recouvrent bien les structures sans DSI ; ils sont indicatifs et à vérifier dans la nomenclature de l'Insee.
3. La **tranche d'effectif SIRENE** est assez fiable pour filtrer (souvent ancienne ou non renseignée).
4. Les **annuaires des fédérations** (Nexem, Fehap, URIOPSS, aide à domicile, insertion) et des coopératives sont publics et autorisent ce type de consultation : à vérifier site par site.
5. Le profil 15 (repreneur) et le profil 27 (fusion d'associations) sont des déclencheurs inventés par analogie, sans signal public : à tester.
6. Les **filtres** de l'Annuaire des entreprises et de l'API Recherche d'entreprises (NAF, tranche, appartenance à l'ESS) n'ont pas pu être vérifiés depuis l'outil de collecte.
7. La pondération de la grille et les seuils (70, 50) sont arbitraires : à recalibrer après les 30 premiers contacts.
