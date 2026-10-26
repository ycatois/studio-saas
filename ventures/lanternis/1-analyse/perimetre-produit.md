---
venture: lanternis
phase: 1 Analyse (révision du périmètre, préalable au cadrage)
auteur: product-owner
date: 2026-10-26
statut: brouillon
skills: perimetre-mvp, user-story, parcours-utilisateur
remplace: faisabilite.md § 6 (volet fonctionnel seulement ; l'architecture des § 2 à 5 reste la référence technique, sauf les points listés au § 0.2)
---

# Lanternis : périmètre produit (tout le SI, centré sur les personnes)

> **Origine.** Demande du fondateur du 2026-10-26 : Lanternis gère **tout le SI**, pas seulement les contrats : contrats, matériel, comptes de messagerie et accès (« qui fait quoi, qui a quoi »), arrivées et départs. La finance n'entre que par le **coût du SI**. Les tableaux de bord trésorerie, chiffre d'affaires et RH généralistes sont retirés.
> **Règle de lecture.** Aucun entretien client n'a encore eu lieu. Les priorités, les estimations (S, M, L, semaines) et les limites d'offre sont des **hypothèses (H)** du product-owner, à confirmer en entretien (§ 8) et par l'architecte lors du cadrage. Aucun chiffre de marché n'est introduit ici ; les prix cités viennent de `2-marche/prix.md` (H).

---

## 0. Ce qui change

### 0.1 Le recentrage en une phrase
L'idée de départ suivait des **objets** (contrats, licences, actifs). Le produit suit désormais des **personnes** : chaque matériel, compte, licence, accès et ligne est rattaché à quelqu'un (ou à un site, ou à un responsable s'il est partagé). C'est ce qui permet de répondre à la question du dirigeant, « qui a quoi ? », et de traiter correctement une arrivée ou un départ.

### 0.2 Conséquences sur les documents existants (à reprendre par leurs auteurs, non modifiés ici)
| Document | Point devenu obsolète | Ce que propose ce document |
|---|---|---|
| `faisabilite.md` § 6 | MVP avec Pennylane et Qonto en P1, 3 tableaux de bord (Finance, RH, SI), indicateurs de trésorerie, de CA, de masse salariale | MVP sans connecteur financier ; un seul tableau de bord (le SI, dont son coût) ; connecteurs P1 : import CSV/Excel, Microsoft 365, Google Workspace, RDAP/TLS (§ 4) |
| `faisabilite.md` § 4.2 et R4 | « Agrégats RH uniquement, jamais de donnée nominative » | Le registre est **nominatif** par nature (nom, email professionnel, fonction, matériel affecté). Les données de paie, de santé et de motif de départ restent **exclues**. Nouvelle analyse RGPD nécessaire (§ 1.5) |
| `faisabilite.md` § 4.3 | Google Workspace en P2 | Google Workspace monte en P1 (« Should », P1 ferme si un pilote l'utilise) |
| `synthese.md` (MVP pressenti) et `STATUT.md`, hypothèse 7 | « Microsoft 365, Google Workspace, Qonto et Pennylane suffisent au MVP » | Qonto et Pennylane passent en P2, uniquement pour détecter des abonnements |
| `marketing/landing/validation.md` § 5.4, étape 2, et FAQ 2 | « votre banque ou votre logiciel comptable » cités parmi les connecteurs | À nuancer : ces connecteurs ne viendront pas à l'ouverture (à arbitrer par cro-conversion ; la page n'est pas publiée) |
| `2-marche/prix.md` § 4.1 | Contenu des offres Essentiel, Pilotage, Pilotage+ | Modules et limites candidates au § 5, à répartir par la stratégie de prix |

### 0.3 Ce que Lanternis n'est pas (garde-fous du périmètre)
- **Pas un outil d'administration.** Lanternis **ne crée, ne modifie et ne supprime aucun compte** chez Microsoft, Google ou ailleurs. Il ordonne les tâches, les assigne et **constate** le résultat grâce aux connecteurs en lecture seule. Proposition de décision : elle réduit le risque sécurité (scopes en lecture seule, `faisabilite.md` R3) et nous tient à l'écart du terrain de Primo (provisionnement, MDM).
- **Pas un coffre de mots de passe.** On enregistre le **fait** qu'une personne a accès à un coffre ou à une collection, jamais un mot de passe, une clé ou un code (cohérent avec la promesse de la landing : « ni fichiers, ni mots de passe »).
- **Pas un outil de tickets** (§ 2.5).
- **Pas un SIRH** : ni salaire, ni contrat de travail, ni absence, ni évaluation, ni motif de départ.
- **Pas un outil financier** : le seul chiffre financier est le coût du SI.

---

## 1. Modèle métier centré sur les personnes

### 1.1 Vue d'ensemble

```
                         ┌────────────── Organisation (client) ──────────────┐
                         │      Sites · Services · Utilisateurs Lanternis     │
                         └───────────────────────┬───────────────────────────┘
                                                 │
     Processus (arrivée,          ┌──────────────▼──────────────┐         Documents
     changement, départ) ───────► │           PERSONNE          │ ◄────── (procédures,
     Tâches · Preuves             │ salarié · bénévole ·        │          passation)
                                  │ prestataire · stagiaire …   │
                                  └──┬──────┬───────┬──────┬────┘
                    affectation      │      │       │      │  responsable de
              ┌──────────────────────┘      │       │      └──────────────────────┐
              ▼                             ▼       ▼                             ▼
          MATÉRIEL                       COMPTE    ACCÈS                  Contrats, abonnements,
   (poste, téléphone, imprimante,   (messagerie, (application, partage,   domaines, sauvegardes,
    réseau…) + cycle de vie          annuaire)    coffre, boîte partagée)  applications (« propriétaire »)
              │                         │           │
              │ couvert par             │ consomme  │ porte sur
              ▼                         ▼           ▼
          CONTRAT ◄────────────── LICENCE / ABONNEMENT ──► APPLICATION
   (location, maintenance,          (sièges achetés,         (M365, Google, SaaS,
    hébergement, télécom…)           attribués, coût)          logiciel métier)
              │
              ▼
         FOURNISSEUR ──► Domaines et certificats · Sauvegardes · Lignes téléphoniques

   Transversal : Coût (calculé) · Alertes · Journal (historique de chaque objet)
```

### 1.2 Les entités

| Entité | Ce qu'elle représente | Attributs essentiels (H) | Ce qu'on ne stocke jamais |
|---|---|---|---|
| **Organisation** | La structure cliente (le locataire) | Nom, type (entreprise, ESS), tranche d'effectif, sites, services | — |
| **Site** | Établissement, agence, ESMS | Nom, adresse courte, responsable | — |
| **Personne** | Toute personne qui utilise ou a utilisé le SI | Nom, prénom, email professionnel, **type** (salarié, bénévole, stagiaire ou alternant, intérimaire, prestataire externe), fonction, service, site, responsable hiérarchique, **statut** (à venir, présente, partie), date d'arrivée, date de départ | Salaire, contrat de travail, motif de départ, absences, santé, adresse et téléphone personnels, évaluation |
| **Utilisateur Lanternis** | Une personne qui se connecte à Lanternis (≠ Personne du registre) | Email, rôle (§ 5.3), MFA | — |
| **Matériel** | Poste fixe ou portable, écran, téléphone mobile, tablette, imprimante ou copieur, équipement réseau (box, routeur, borne wifi, pare-feu), serveur ou NAS, autre objet remis (clé, badge : H, à confirmer en entretien) | Catégorie, marque et modèle, numéro de série, **mode d'acquisition** (achat, location, leasing → contrat), date et prix d'achat, fin de garantie, date de renouvellement prévue, site, **statut de cycle de vie**, affectation (personne, site ou « partagé » avec un responsable) | Contenu des appareils |
| **Compte** | Une identité dans un annuaire ou une messagerie (Microsoft 365, Google Workspace, autre) | Adresse, source (connecteur ou saisie), état (actif, bloqué, supprimé), **personne rapprochée** ou nature (compte partagé, compte de service, compte d'administration) avec un responsable, date de dernière synchronisation | Mot de passe, contenu de la messagerie |
| **Application** | Un logiciel utilisé (suite bureautique, SaaS, logiciel métier, ERP, site web) | Nom, éditeur (fournisseur), catégorie, criticité (essentielle, utile, accessoire), propriétaire interne | — |
| **Licence / abonnement** | Ce qu'on paie pour une application | Offre (ex. « Microsoft 365 Business Standard »), **sièges achetés** et **attribués**, coût unitaire HT, périodicité, mode de paiement (facture, prélèvement, carte bancaire), date de renouvellement, contrat et fournisseur | Numéro de carte bancaire |
| **Accès** | Le **fait** qu'une personne (ou un compte) peut utiliser une ressource | Personne, ressource (application, partage de fichiers, boîte partagée, coffre ou collection de mots de passe, VPN, compte d'administration d'un service), niveau (utilisateur, administrateur), date d'octroi, octroyé par, date de retrait, source (déclaré ou constaté par connecteur) | **Mots de passe, secrets, clés, codes** |
| **Contrat** | Engagement avec un fournisseur : hébergement web, maintenance ou infogérance, location de matériel, télécom, licences, support | Fournisseur, objet, dates de début et de fin, durée, **reconduction tacite**, **préavis**, **date limite de résiliation** (calculée), montant HT et périodicité, responsable interne, emplacement du document (lien) | — |
| **Fournisseur** | Prestataire informatique, éditeur, opérateur, revendeur, bureau d'enregistrement | Nom, rôle, contacts professionnels (nom, email, téléphone), contrats, prestataire invité (lien vers un utilisateur Lanternis) | — |
| **Domaine** | Nom de domaine de la structure | Nom, bureau d'enregistrement, date d'expiration (RDAP), renouvellement automatique (déclaré), contrat | — |
| **Certificat** | Certificat TLS d'un site ou service exposé | Hôte, émetteur, date d'expiration (lue par connexion TLS), application liée | Clé privée |
| **Sauvegarde** | Un dispositif de sauvegarde | Périmètre (ce qui est sauvegardé), solution et fournisseur, fréquence, emplacement (sur site, externe, cloud), responsable, **date et résultat du dernier test de restauration**, preuve (commentaire, lien) | Les données sauvegardées |
| **Ligne téléphonique** | Ligne mobile, ligne fixe, numéro direct, standard | Numéro, type, opérateur et contrat, affectation (personne ou site), forfait et coût | Relevés d'appels |
| **Document** | Procédure, fiche de passation, plan (réseau, sauvegardes), note de décision | Titre, type, **texte rédigé dans Lanternis** ou **lien** vers l'emplacement (SharePoint, Drive, serveur), objets liés, date de prochaine revue | Fichiers téléversés au MVP (voir § 1.4) |
| **Modèle de processus** | Check-list type : arrivée, changement de poste, départ | Type, nom, conditions d'application (type de personne, service, site), tâches modèles | — |
| **Processus** | Une arrivée, un changement ou un départ en cours | Personne, modèle utilisé, date de référence (jour d'arrivée ou de départ), statut, date de clôture | — |
| **Tâche** | Une action à faire | Libellé, objet lié (matériel, compte, accès, licence), rôle ou personne responsable, échéance, statut, **preuve** | — |
| **Alerte** | Un constat qui appelle une décision | Règle, objet, date de déclenchement, échéance, statut (nouvelle, vue, traitée, ignorée avec motif) | — |
| **Événement (journal)** | L'historique de chaque objet, et les incidents ou demandes consignés | Date, auteur (utilisateur, connecteur, système), objet, nature, commentaire | — |

### 1.3 Les relations clés
1. **Personne → Matériel, Compte, Accès, Licence, Ligne** : par une **affectation datée** (début, fin). L'historique des affectations répond à « qui avait ce portable en mars ? » et nourrit la check-list de départ.
2. **Compte → Personne** : rapprochement (automatique par email ou nom, puis confirmé). Un compte sans personne est soit un compte partagé ou de service (avec un responsable), soit une **anomalie** à traiter.
3. **Licence → Compte** : attribution (constatée par connecteur pour Microsoft 365 et Google Workspace, déclarée ailleurs). Sièges achetés moins sièges attribués = sièges libres.
4. **Matériel, Licence, Domaine, Ligne → Contrat → Fournisseur** : ce qui permet de calculer le coût et de déclencher les échéances.
5. **Application → Licence, Accès, Document, Propriétaire** : une application est le point d'entrée de « qui a accès à cet outil ».
6. **Personne → responsable de** : chaque contrat, application, sauvegarde, compte partagé et domaine a un responsable interne. Au départ de ce responsable, ces responsabilités deviennent des tâches de **passation**.
7. **Processus → Tâches → Objets** : une tâche pointe vers l'objet qu'elle modifie ; la clôturer met à jour l'objet (le portable passe « en stock », l'accès reçoit une date de retrait).

### 1.4 Le cycle de vie du matériel
`commandé` → `en stock` → `affecté` → (`en réparation` ↔ `affecté`) → `à restituer` (départ ou renouvellement) → `en stock` (réaffectation) ou `sorti`.
Motifs de sortie : vendu, donné (fréquent dans l'ESS, H), rendu au loueur, recyclé (filière DEEE), perdu, volé. Une sortie demande la **preuve d'effacement des données** (case + commentaire au MVP).
Échéances portées par le matériel : fin de garantie, fin de location, date de renouvellement prévue (par défaut : achat + durée de vie par catégorie, paramétrable ; H : 4 à 5 ans pour un poste, à confirmer).

**Point ouvert, fichiers.** La landing promet « ni fichiers » et la souveraineté plaide pour la collecte minimale. Proposition : au MVP, **aucun téléversement** (documents rédigés dans Lanternis ou liens vers l'emplacement du client) ; en P2, pièces jointes facultatives (contrats PDF, bons de restitution signés) **si** les entretiens le demandent, avec mise à jour de la promesse publique.

### 1.5 Données personnelles : ce que change le modèle centré sur les personnes
- Hasteria agit en **sous-traitant** (article 28 du RGPD) du client pour les données des personnes du registre ; le client est responsable de traitement. Contrat de sous-traitance, registre, liste des sous-traitants à prévoir (H, **juriste-rgpd**).
- Données traitées : identité professionnelle, rattachement, dates d'arrivée et de départ, équipements, comptes et accès. Pas de catégorie particulière (article 9).
- **Durée de conservation après départ (H)** : fiche conservée 12 mois après la clôture du processus de départ (preuve que les accès ont été fermés), puis anonymisée (« Ancien salarié n° 42 ») en gardant l'historique du matériel. Durée paramétrable dans une fourchette fixée par le juriste.
- Bénévoles : souvent sans compte ni matériel ; ils restent facultatifs dans le registre.
- Les personnes du registre doivent être informées par leur employeur ; fournir un **modèle de mention d'information** aux clients (P1, livrable du juriste-rgpd).
- Connecteurs Microsoft et Google : seuls les attributs nécessaires sont lus et stockés (nom, email, état, licences, dernière connexion si disponible). Scopes exacts à fixer par l'architecte.

---

## 2. Les processus

### 2.1 Principes communs
- **Modèles personnalisables** : Lanternis livre des modèles par défaut (arrivée, changement de poste, départ), rédigés pour une PME et pour une association. Le client les copie et les adapte : ajouter, retirer, réordonner des tâches ; conditions (« seulement pour les salariés », « seulement pour le site de Lyon », « seulement si la personne a un téléphone »).
- **Tâches générées depuis le registre** : au lieu d'une liste générique, la check-list de départ **contient le matériel, les comptes, les licences et les accès réels de la personne**. C'est le cœur de la valeur.
- **Responsable par rôle** : chaque tâche modèle désigne un rôle (dirigeant, office manager ou relais administratif, responsable hiérarchique, prestataire informatique) ; à l'instanciation, le rôle devient une personne nommée. Le prestataire peut recevoir ses tâches par email sans compte complet (rôle « prestataire invité », § 5.3).
- **Échéances relatives** à la date de référence : J−10, J−1, J0, J+1, J+30.
- **Preuve de fait**, par ordre de force : (1) **constat automatique** par connecteur (« compte bloqué constaté le 26/11/2026 à 02:10 par la synchronisation Microsoft 365 ») ; (2) **déclaration horodatée** (qui, quand, commentaire obligatoire pour certaines tâches) ; (3) en P2, pièce jointe (bon de restitution signé). Une tâche « constatable » ne se clôt pas seule : elle est marquée « constaté », l'humain valide.
- **Rappels** : un email au responsable la veille de l'échéance et le jour du retard ; les retards remontent au tableau de bord. Pas de relance en boucle (sobriété).
- **Clôture** : un processus se clôt quand toutes les tâches obligatoires sont faites ou explicitement écartées (« sans objet », avec motif). Le récapitulatif daté sert de **preuve** (attestation PDF en P2).

### 2.2 Arrivée
Déclencheur : création d'une personne au statut « à venir » avec une date d'arrivée (saisie, import ; SIRH en P3).

Tâches types du modèle par défaut (H) :
| Tâche | Rôle | Échéance | Preuve |
|---|---|---|---|
| Choisir le matériel à remettre (stock ou commande) | Office manager | J−10 | Matériel affecté dans Lanternis |
| Créer le compte de messagerie | Prestataire | J−2 | **Constat** : compte apparu et rapproché (connecteur) |
| Attribuer les licences (M365, Google, logiciel métier) | Prestataire | J−2 | Constat pour M365 et Google ; déclaration sinon |
| Ouvrir les accès selon la fonction (applications, partages, boîtes partagées, coffre) | Prestataire ou responsable de l'application | J−1 | Déclaration (accès créés dans le registre) |
| Préparer la ligne et le téléphone | Office manager | J−1 | Ligne affectée |
| Remettre le matériel et faire signer la remise | Office manager | J0 | Déclaration (+ document en P2) |
| Présenter les règles d'usage (charte informatique, mots de passe) | Responsable hiérarchique | J+1 | Déclaration |
| Vérifier que tout fonctionne | Responsable hiérarchique | J+7 | Déclaration |

**Profils d'accès (P2)** : « une assistante du siège a besoin de X, Y, Z » ; le modèle d'arrivée pré-remplit les accès selon la fonction ou le service.

### 2.3 Changement de poste ou de service (P2)
Déclencheur : modification de la fonction, du service ou du site d'une personne présente.
Tâches générées : accès à ouvrir pour la nouvelle fonction ; **accès de l'ancienne fonction à revoir** (liste réelle, case « garder » ou « retirer » pour chacun) ; matériel à échanger ; responsabilités à transférer. C'est la principale cause d'accumulation de droits (H, à vérifier en entretien).

### 2.4 Départ
Déclencheur : date de départ saisie sur une personne présente (tous types, y compris prestataires externes et fins de mission).

Tâches **générées depuis ce que la personne a** (H) :
| Tâche | Une tâche par… | Rôle | Échéance | Preuve |
|---|---|---|---|---|
| Récupérer le matériel | Matériel affecté | Office manager | J0 | Matériel passé « en stock » ou « sorti » |
| Bloquer puis supprimer le compte de messagerie ; décider du sort de la boîte (transfert, conservation, archivage) | Compte | Prestataire | J0 (blocage), J+30 (suppression, H) | **Constat** par connecteur |
| Libérer ou réattribuer les licences | Licence attribuée | Prestataire | J+1 | Constat (siège libéré) |
| Retirer les accès | Accès déclaré | Responsable de l'application ou prestataire | J0 | Déclaration (date de retrait) |
| **Changer les mots de passe partagés** connus de la personne | Coffre ou collection auquel elle avait accès, compte partagé | Prestataire | J0 | Déclaration |
| Transférer ou résilier la ligne | Ligne affectée | Office manager | J0 | Ligne réaffectée ou résiliée |
| **Passer ses responsabilités** (contrats, applications, sauvegardes, domaines dont elle est responsable) | Objet dont elle est responsable | Dirigeant | J−5 | Nouveau responsable désigné |
| Rédiger ou compléter la fiche de passation (si référent informatique) | — | La personne qui part | J−10 | Document lié (P2) |

Cas du **départ du référent informatique** (déclencheur d'achat n° 1, `personas.md` P1) : le modèle « départ d'un référent » ajoute la passation des comptes d'administration, des contrats et des procédures. C'est le scénario de démonstration à privilégier.

### 2.5 Renouvellements (P2 pour le circuit de décision, P1 pour l'alerte)
- P1 : alerte avant la date limite de résiliation (contrat), l'expiration (domaine, certificat), la fin de garantie ou de location (matériel), le renouvellement (abonnement).
- P2 : l'alerte ouvre une **décision** : renouveler, renégocier, résilier, remplacer. La décision est consignée (qui, quand, pourquoi) et génère ses tâches (envoyer la lettre de résiliation avant le JJ/MM, demander un devis à un autre fournisseur). L'historique des décisions répond au job 4 de `jtbd.md`.

### 2.6 Incidents et demandes simples : cadrage
Lanternis **n'est pas un outil de tickets**. Le prestataire a déjà le sien ; le concurrencer serait coûteux (`benchmark.md` § 5) et brouillerait la cible (le dirigeant, pas le technicien).

| Dans le périmètre | Hors périmètre |
|---|---|
| **Consigner un événement qui change le registre** : perte ou vol d'un appareil, compte compromis, panne ou échec de sauvegarde, résiliation subie, incident chez un fournisseur. L'événement est lié aux objets concernés et peut déclencher une check-list (vol d'un portable → appareil « sorti : volé », retrait des accès de l'appareil, déclaration à l'assureur, changement des mots de passe partagés) | File d'attente de techniciens, niveaux de service (SLA), temps passé |
| **Demande ponctuelle** à suivre : « commander un écran pour Nadia », « ouvrir l'accès au logiciel de paie à Marc ». C'est une tâche isolée, avec responsable, échéance et preuve, liée à un objet | Portail en libre-service pour tous les salariés, création de demandes par email entrant |
| Champ « référence chez le prestataire » pour retrouver le ticket correspondant | Base de connaissances de dépannage, diagnostic technique |

Priorité : P2. Au MVP, une **tâche libre** liée à un objet suffit pour les demandes ; le journal des incidents arrive en P2.

---

## 3. Alertes et indicateurs

### 3.1 Règles d'alerte
Principe du design system : **une alerte = une action**, en ambre (jamais en rouge), avec « Pourquoi vous voyez ceci ». Seuils d'échéance proposés : ≤ 30 j proche, 31 à 90 j à venir (`design-system.md` § 3.7).

| # | Alerte | Règle de déclenchement (H) | Source | Délai par défaut (H) | Action unique | Priorité |
|---|---|---|---|---|---|---|
| A1 | Contrat à échéance | Date limite de résiliation (fin − préavis) approche ; reconduction tacite signalée | Saisie, import | 90 j puis 30 j avant la date limite | « Décider » | **P1** |
| A2 | Abonnement à renouveler | Date de renouvellement approche | Saisie, import, connecteurs | 60 j puis 15 j | « Décider » | **P1** |
| A3 | Fin de garantie ou de location | Matériel encore « affecté » ou « en stock » | Saisie, import | 60 j | « Voir le matériel » | **P1** |
| A4 | Matériel à renouveler | Âge > durée de vie de sa catégorie | Calcul | Au mois | « Voir les 6 postes » | P2 |
| A5 | Nom de domaine | Expiration lue par RDAP | Connecteur RDAP | 60 j puis 15 j ; quotidien sous 7 j | « Prévenir le responsable » | **P1** |
| A6 | Certificat | Expiration lue par connexion TLS | Connecteur TLS | 30 j puis 7 j | « Prévenir le responsable » | **P1** |
| A7 | **Compte actif après un départ** | Personne au statut « partie » (date passée) et compte rapproché encore actif | Connecteurs M365 et Google ; déclaratif sinon | J+1 | « Fermer les accès » | **P1** |
| A8 | **Licence payée sans utilisateur** | (a) Sièges achetés > sièges attribués ; (b) licence attribuée à une personne partie ou à un compte bloqué ; (c) en P2, sans connexion depuis 90 j (Microsoft : exige Entra ID P1 ou P2, `faisabilite.md` F6) | Connecteurs, saisie | Au constat, regroupée dans le digest | « Voir les 7 licences » | **P1** (a, b), P2 (c) |
| A9 | **Matériel non restitué** | Matériel encore affecté à une personne partie, ou tâche de restitution en retard | Registre, processus | J+1 | « Voir le matériel » | **P1** |
| A10 | Compte sans propriétaire | Compte non rapproché d'une personne et non qualifié (partagé, service) | Connecteurs | À chaque synchronisation, regroupé | « Rapprocher » | **P1** |
| A11 | **Sauvegarde non vérifiée** | Aucun test de restauration enregistré depuis N jours (H : 90 j) | Déclaratif | Au dépassement | « Enregistrer un test » | **P1** |
| A12 | Tâche de processus en retard | Échéance dépassée | Processus | J+1, puis dans le digest | « Voir la tâche » | **P1** |
| A13 | Responsable parti | Un contrat, une application, une sauvegarde ou un domaine a pour responsable une personne partie | Registre | J0 | « Désigner un responsable » | **P1** |
| A14 | Revue des accès à faire | Dernière revue d'une application critique > N mois (H : 6) | Registre | Au dépassement | « Faire la revue » | P2 |
| A15 | Abonnement découvert | Paiement récurrent vers un éditeur absent du registre | Qonto, Pennylane | Au constat | « Ajouter au registre » | P2 |
| A16 | Connexion interrompue | Synchronisation en échec depuis > 48 h | Moteur de connecteurs | 48 h | « Reconnecter » | **P1** |

**Anti-bruit (P1)** : un **digest hebdomadaire** par email (lundi matin, H) regroupe tout ; email immédiat seulement pour A7, A16 et une échéance à moins de 7 jours. Une alerte peut être « ignorée » avec un motif (« ce compte est l'accueil, il est partagé ») et ne revient pas.

### 3.2 Indicateurs du tableau de bord de la direction (12 au plus)
| # | Indicateur | Définition (H) | Priorité |
|---|---|---|---|
| I1 | **Coût annuel du SI** | Somme annualisée HT des contrats, abonnements et licences + matériel acheté amorti sur sa durée de vie + loyers de matériel. Le matériel sans prix est signalé, pas estimé | **P1** |
| I2 | **Coût du SI par personne** | I1 ÷ personnes présentes de type salarié (option : inclure les prestataires équipés ; bénévoles exclus par défaut, H). À afficher aussi par mois | **P1** |
| I3 | Échéances à 90 jours | Nombre et montant annuel concerné | **P1** |
| I4 | Comptes actifs de personnes parties | A7 en nombre | **P1** |
| I5 | Licences payées sans utilisateur | Nombre et coût annuel évitable | **P1** |
| I6 | Matériel non restitué | Nombre et valeur d'achat | **P1** |
| I7 | Arrivées et départs en cours | Processus ouverts, dont en retard | **P1** |
| I8 | Sauvegardes vérifiées | Part des sauvegardes testées depuis moins de 90 j | **P1** |
| I9 | Couverture du registre | Part des comptes rapprochés d'une personne ; part du matériel avec un prix et une garantie (mesure du « cockpit vide », `pre-mortem.md` R1) | **P1** |
| I10 | Domaines et certificats sous 60 j | Nombre | **P1** |
| I11 | Âge du parc | Part des postes au-delà de leur durée de vie | P2 |
| I12 | Comptes d'administration | Nombre de personnes ayant un accès administrateur, par service | P2 |

Répartition du coût par catégorie (matériel, licences, prestations, télécom, hébergement) et par service ou site : P2. Les montants sont HT, avec la date de fraîcheur de chaque source.

---

## 4. Connecteurs, par priorité

Principe : lecture seule ; l'import et la saisie sont des modes d'alimentation de premier rang (`faisabilite.md` § 1) ; chaque donnée affiche sa source et sa fraîcheur.

| Priorité | Connecteur | Ce qu'il apporte au périmètre | Remarques (H sauf source) |
|---|---|---|---|
| **P1** | **Import CSV/Excel** (gabarits : personnes, matériel, contrats et fournisseurs, abonnements, accès, lignes) | Démarrage depuis l'Excel existant ; le prestataire peut exporter son inventaire | Correspondance des colonnes, validation ligne à ligne, annulation d'un import (`faisabilite.md` § 2.2). Valeur la plus sûre pour lutter contre le cockpit vide |
| **P1** | **Microsoft 365** (Microsoft Graph) | Utilisateurs (état actif ou bloqué), licences achetées et attribuées ; rapprochement comptes ↔ personnes ; constat automatique des tâches d'arrivée et de départ | Consentement administrateur du client ; dernière connexion seulement avec Entra ID P1 ou P2 (`faisabilite.md` § 4.3) |
| **P1** (Should) | **Google Workspace** (Directory API, License Manager) | Idem, avec `lastLoginTime` sur chaque utilisateur | Validation des applications Google pour les scopes d'administration : délai à anticiper. P1 ferme si au moins un pilote est sous Google, sinon début de P2 |
| **P1** | **RDAP et TLS** | Expiration des domaines et des certificats | Données publiques, sans authentification |
| P2 | Microsoft 365 (suite) : boîtes partagées, groupes, comptes administrateurs | Accès constatés plutôt que déclarés ; I12 | Permissions supplémentaires à justifier |
| P2 | **Qonto, Pennylane** (lecture des paiements) | **Détection des abonnements** payés hors registre (A15) ; rien d'autre | La finance n'entre que par là. Jetons fournis par le client (`faisabilite.md` § 4.1) |
| P2 | Intune, gestion des appareils Google | Matériel constaté (postes enrôlés, dernier contact) | Seulement pour les clients licenciés (`faisabilite.md` § 4.3) |
| P2 | Export des échéances en calendrier (ICS) | Échéances dans l'agenda du dirigeant | Peu coûteux |
| P3 | Agrégateur bancaire DSP2 (Bridge, Powens) | Détection des abonnements pour les autres banques | Sur devis (`faisabilite.md` F5) |
| P3 | SIRH (Lucca, PayFit) | Déclenchement automatique des arrivées et départs (nom, dates, service : rien d'autre) | Minimisation stricte ; intérêt à valider en entretien |
| P3 | Coffres de mots de passe (Bitwarden, 1Password, Dashlane : à vérifier) | Constat des membres de coffres ou collections, **jamais les secrets** | Existence et contenu des API à vérifier |
| P3 | GLPI (import ou API) | Reprise de l'inventaire tenu par le prestataire | API REST v2 (`faisabilite.md` § 4.3) |
| P3 | Import du FEC | Détection des abonnements par les écritures | `faisabilite.md` F8 |

---

## 5. Modules (familles de fonctionnalités)

### 5.1 Les modules
Complexité en semaines-développeur à temps plein (H, assisté par IA), hors socle. « Reprise » = réduction possible si le code de Cockpit DSI est réutilisable (`faisabilite.md` § 7, F7).

| Module | Contenu | Valeur pour le client | Complexité (H) | Limites quantifiables candidates |
|---|---|---|---|---|
| **M0 Socle** | Comptes, MFA, multi-tenant, rôles, abonnement Stripe, journal | Sécurité, confiance | 2 sem. | — |
| **M1 Personnes** | Annuaire (tous types), fiche « qui a quoi », services, sites, historique des affectations | Répondre en 10 secondes à « qu'a cette personne ? » | 1 sem. | **Nombre de personnes** (présentes), types de personnes (bénévoles inclus ou non) |
| **M2 Matériel** | Registre, cycle de vie, garanties, renouvellement, sortie (DEEE, effacement) | Savoir ce qu'on possède, où et chez qui ; ne rien perdre au départ | 1 sem. (0,5 si reprise) | **Nombre d'actifs** |
| **M3 Comptes, licences et abonnements** | Comptes, rapprochement, sièges achetés et attribués, coût, renouvellements | Arrêter de payer des licences vides ; voir les comptes orphelins | 1,5 sem. (hors connecteurs) | Nombre d'abonnements suivis |
| **M4 Accès** | Accès déclarés (applications, partages, coffres, boîtes partagées), niveaux, retraits ; revue périodique (P2) | Répondre à « qui a accès à quoi ? » devant un assureur, un client ou un CA | 1 sem. ; revue + 1 sem. (P2) | Revue des accès (offre haute), nombre d'applications suivies |
| **M5 Contrats, fournisseurs et coût** | Contrats, préavis, date limite de résiliation, fournisseurs, lignes téléphoniques, coût du SI | Ne plus subir de reconduction tacite ; connaître le coût par personne | 1 sem. (0,5 si reprise) ; décision de renouvellement + 0,5 (P2) | Historique du coût (12 mois, 36 mois) |
| **M6 Continuité** | Domaines, certificats, sauvegardes et tests de restauration ; check-list sécurité (P2) | Éviter le site coupé, la sauvegarde qui n'a jamais été testée | 0,5 sem. (+ 0,5 RDAP/TLS) | Nombre de domaines et d'hôtes surveillés |
| **M7 Arrivées, changements et départs** | Modèles personnalisables, génération depuis le registre, tâches, rôles, échéances, preuves, rappels, clôture | **Rien d'oublié** à l'arrivée ni au départ ; preuve que c'est fait | 2,5 sem. ; changement de poste + 1 (P2) | **Nombre de modèles de processus** ; processus par mois (déconseillé, voir § 5.2) |
| **M8 Échéances, alertes et tableau de bord** | Règles A1 à A16, digest, centre d'alertes, tableau de bord I1 à I12 | « C'est Lanternis qui vous écrit » ; écran lisible en 5 minutes | 1,5 sem. | Règles personnalisables (délais, destinataires) en offre haute |
| **M9 Documentation et journal** | Procédures, fiche de passation, plans ; journal des incidents et demandes simples | La connaissance reste quand le référent part | 1 sem. (P2) | Nombre de documents ; pièces jointes (si P2) |
| **M10 Connecteurs et import** | CSV/Excel, M365, Google, RDAP/TLS ; puis Qonto, Pennylane, Intune, ICS, SIRH… | Registre à jour sans ressaisie | Import 1,5 ; M365 1 ; Google 1 ; RDAP/TLS 0,5 ; chaque connecteur P2 0,5 à 1 | **Nombre de connecteurs** ; fréquence de synchronisation (quotidienne, ou à la demande) |
| **M11 Collaboration** | Rôles, **prestataire invité**, responsable de site, **multi-sites** | Faire contribuer le prestataire ; déléguer par établissement (ESMS) | Rôles 0,5 ; prestataire invité 0,5 ; multi-sites 1 (P2) | **Utilisateurs Lanternis** ; **prestataire invité** ; **nombre de sites** |
| **M12 Exports, rapports et API** | Export CSV complet ; synthèse mensuelle et attestation de départ en PDF (P2) ; API en lecture (P3) | Réversibilité ; pièces à présenter au CA, à l'assureur, au financeur | CSV 0,25 ; PDF 1 (P2) ; API 1,5 (P3) | **Rapports PDF** ; **API** ; profondeur d'**historique** |

### 5.2 Limites candidates pour différencier les offres
Avis du product-owner, à trancher par la stratégie de prix (`2-marche/prix.md`) :

| Limite | Pertinence | Risque | Avis (H) |
|---|---|---|---|
| **Nombre de personnes** (présentes, hors bénévoles) | Forte : c'est déjà la métrique de prix (tranche d'effectif) et elle suit la valeur | Les associations ont des bénévoles et des intérimaires : compter seulement salariés et prestataires équipés | **Métrique principale** (forfait par tranche, sans facturation par utilisateur, comme annoncé sur la landing) |
| Nombre d'actifs | Moyenne : corrélé aux personnes | Pousse à ne pas tout saisir, contraire au registre complet | Plafond large seulement (anti-abus), pas de différenciation |
| Utilisateurs Lanternis | Faible | Contraire à « utilisateurs illimités » de Pilotage (`prix.md`) et à l'adoption par l'office manager | 3 dans l'entrée, illimités au-delà, ou illimités partout |
| Nombre de connecteurs | Moyenne | Brider M365 ou Google prive l'entrée de la valeur principale (A7, A8) | M365 **ou** Google + import + RDAP/TLS partout ; connecteurs P2 (Qonto, Pennylane, Intune) dans les offres hautes |
| Historique | Moyenne | L'export ne doit jamais être bridé (souveraineté) | 12 mois d'historique consultable en entrée, illimité au-delà ; **export CSV complet dans toutes les offres** |
| Modèles de processus | **Forte** pour la différenciation | — | 1 modèle d'arrivée + 1 de départ en entrée ; modèles illimités, conditions et changement de poste au-dessus |
| Prestataire invité | Forte (anti-cockpit vide, canal prescripteur) | Le retirer de l'entrée freine l'alimentation du registre | 1 prestataire invité partout (levier d'adoption) ; plusieurs prestataires dans les offres hautes |
| Exports PDF (synthèse, attestation) | Forte pour P2 (CA, financeurs) | — | Offres médiane et haute |
| API | Faible pour la cible | — | Offre haute, P3 |
| Multi-sites | Forte pour l'ESS (plusieurs ESMS) et le segment 100 à 249 | — | Offre haute (cohérent avec Pilotage+ de `prix.md`) |
| Revue des accès, check-list sécurité | Moyenne à forte (job 3) | — | Offres médiane et haute |

**Répartition indicative (H)** : *Essentiel* = M1 à M6, M8, import, un connecteur annuaire, RDAP/TLS, modèles par défaut, export CSV ; *Pilotage* = + modèles illimités, changement de poste, accès complets et revue, coût détaillé, synthèse PDF, connecteurs P2 ; *Pilotage+* = + multi-sites, plusieurs prestataires, API, règles d'alerte personnalisées, revue trimestrielle avec un DSI (service).

### 5.3 Rôles des utilisateurs Lanternis (M11)
| Rôle | Peut |
|---|---|
| Propriétaire | Tout, y compris abonnement, connecteurs, suppression de l'organisation |
| Administrateur | Tout le registre, modèles, connecteurs, utilisateurs |
| Contributeur | Créer et modifier le registre, mener les processus |
| Lecteur | Consulter le tableau de bord et le registre (dirigeant, trésorier d'association) |
| **Prestataire invité** | Voir et modifier le matériel, les comptes, les licences et les accès ; recevoir et clore ses tâches ; **ne voit pas** les montants des contrats ni le coût du SI (par défaut, réglable) |
| Responsable de site (P2) | Contributeur limité à un site |

---

## 6. MVP (P1) et versions suivantes

### 6.1 Définition du MVP
**Le plus petit périmètre qui prouve la valeur :** à partir de l'Excel existant et de Microsoft 365 (ou Google Workspace), la direction voit **qui a quoi, ce que cela coûte et ce qui arrive à échéance**, et **un départ est traité sans rien oublier, preuve à l'appui**.

**Critères de succès du MVP en pilote (H)** : registre initial monté en moins d'une demi-journée de mise en place accompagnée ; au moins 80 % des comptes rapprochés d'une personne (I9) ; au moins un processus de départ ou d'arrivée mené jusqu'à la clôture par pilote dans les 30 jours ; le dirigeant ou la DAF ouvre le digest ou le tableau de bord au moins 3 semaines sur 4.

**Effort (H)** : environ **13 à 16 semaines** à temps plein pour tout le P1 (socle 2 ; M1 à M6 environ 6 ; M7 2,5 ; M8 1,5 ; connecteurs et import 4 ; sécurité, RGPD, tests et recette 1,5 ; moins 1 à 2 si reprise de Cockpit DSI). C'est plus que les 8 à 10 semaines de l'ancien § 6, car le registre des personnes, des accès et le moteur de processus remplacent des connecteurs financiers. Deux façons de réduire :
- **Tranche 1 « pilote » (H : 9 à 11 semaines)** : sans Google Workspace (sauf pilote concerné), sans sauvegardes (US-13), tableau de bord limité à I1 à I7 ; le reste en tranche 2.
- **Pilote « concierge » (H : 6 à 8 semaines)** : sans aucun connecteur ; le fondateur fait les imports et constate lui-même les comptes. Utile si les entretiens laissent un doute sur la douleur (`faisabilite.md` § 6.3).

### 6.2 User stories prioritaires (format court)
Personas : **Marc** (dirigeant, P1), **Nadia** (DAF d'association, P2), **Sophie** (office manager, P3), **le prestataire** (invité). Priorité MoSCoW ; estimation S (≤ 2 j), M (3 à 5 j), L (> 5 j). L'impact marketing est indiqué pour transmission au pôle marketing.

#### P1 : MVP

**US-01 Ouvrir l'espace de la structure et inviter l'équipe** (M0, M11)
En tant que Marc, je veux créer l'espace de ma structure et inviter Sophie et Nadia avec un rôle, afin de répartir le travail sans partager mon mot de passe.
Must · M · Critère clé : étant donné un compte propriétaire avec MFA activée, quand j'invite sophie@… comme contributrice, alors elle reçoit un email, crée son mot de passe, et ne voit ni les réglages d'abonnement ni la page des utilisateurs.
Marketing : non (socle).

**US-02 Inviter le prestataire informatique** (M11)
En tant que Sophie, je veux inviter notre prestataire avec des droits limités, afin qu'il complète le matériel et les comptes et qu'il clôture ses tâches.
Must · S · Critère clé : étant donné un prestataire invité, quand il ouvre la fiche d'un contrat, alors le montant est masqué et il ne peut pas modifier les utilisateurs.
Marketing : **oui**, argument de neutralité (« votre prestataire complète le registre avec vous ») ; page « Pour les prestataires » à prévoir (canal prescripteur, `benchmark.md` angle 5).

**US-03 Importer les personnes depuis un fichier Excel** (M1, M10)
En tant que Sophie, je veux importer notre liste du personnel (nom, email professionnel, fonction, service, site, type, date d'arrivée), afin de ne pas tout ressaisir.
Must · M · Critère clé : étant donné un fichier de 120 lignes dont 3 sans email, quand je l'importe, alors 117 personnes sont créées, les 3 lignes en erreur sont listées avec la raison, et l'import peut être annulé en un clic.
Marketing : **oui**, preuve de « pas livré vide » ; gabarit Excel téléchargeable comme aimant à prospects (lien avec l'article de blog sur l'inventaire).

**US-04 Relier Microsoft 365 en lecture seule** (M10, M3)
En tant que Marc, je veux connecter notre Microsoft 365 sans donner de droit d'écriture, afin que les comptes et les licences se mettent à jour seuls.
Must · L · Critère clé : étant donné le consentement administrateur accordé, quand la première synchronisation se termine, alors chaque compte apparaît avec son état (actif ou bloqué) et ses licences, l'écran indique « dernière synchronisation il y a X min », et aucune permission d'écriture n'a été demandée.
Marketing : **oui**, annonce et page « Microsoft 365 », mention « lecture seule » centrale (rassure sur la sécurité).

**US-05 Relier Google Workspace en lecture seule** (M10, M3)
En tant que Nadia, je veux connecter notre Google Workspace, afin d'avoir le même suivi que les structures sous Microsoft.
Should (Must si un pilote est sous Google) · M · Critère clé : étant donné le consentement d'un super-administrateur, quand la synchronisation se termine, alors les comptes, leur état, leurs licences et leur dernière connexion sont affichés.
Marketing : **oui**, important pour l'ESS (Google pour les associations, H) ; page dédiée.

**US-06 Rapprocher comptes et personnes** (M3)
En tant que Sophie, je veux que Lanternis rapproche chaque compte de la bonne personne et me montre ceux qui restent sans propriétaire, afin de repérer les comptes orphelins.
Must · M · Critère clé : étant donné 130 comptes synchronisés et 117 personnes, quand le rapprochement automatique s'exécute, alors les correspondances exactes par email sont proposées, les comptes restants sont listés avec le choix « personne », « compte partagé » ou « compte de service » (responsable obligatoire), et l'indicateur I9 se met à jour.
Marketing : **oui**, « combien de comptes sans propriétaire chez vous ? » : excellent sujet d'article et de démonstration.

**US-07 Voir tout ce qu'a une personne** (M1)
En tant que Marc, je veux ouvrir la fiche d'une personne et voir son matériel, ses comptes, ses licences, ses accès, ses lignes et ce dont elle est responsable, afin de savoir « qui a quoi » en un écran.
Must · M · Critère clé : étant donné une personne avec 2 matériels, 1 compte, 2 licences et 4 accès, quand j'ouvre sa fiche, alors ces éléments sont listés par rubrique avec leur date d'affectation et l'historique des affectations passées est consultable.
Marketing : **oui**, écran vedette de la page d'accueil et des captures (« qui a quoi »).

**US-08 Tenir le registre du matériel et son cycle de vie** (M2)
En tant que Sophie, je veux enregistrer ou importer le matériel (postes, téléphones, imprimantes, réseau…), l'affecter et suivre sa garantie jusqu'à sa sortie, afin de savoir ce que nous possédons et où il se trouve.
Must · M · Critère clé : étant donné un portable affecté à Marc, quand je le passe à « sorti : recyclé », alors Lanternis exige la confirmation de l'effacement des données, clôt l'affectation à la date du jour et l'appareil disparaît du coût courant.
Marketing : **oui**, contenu sur la sobriété (durée de vie, réemploi, DEEE), cohérent avec la valeur Sobriété.

**US-09 Suivre licences et abonnements** (M3)
En tant que Nadia, je veux voir, pour chaque abonnement, les sièges achetés, attribués et libres, le coût annuel et la date de renouvellement, afin de supprimer ce qui ne sert pas.
Must · M · Critère clé : étant donné 40 licences Microsoft 365 achetées et 33 attribuées, quand j'ouvre l'abonnement, alors je lis « 7 licences libres, soit X € HT par an » avec le lien vers ces sièges.
Marketing : **oui**, message chiffrable (« ce que vous payez pour rien ») ; ne pas se positionner sur la seule gestion des SaaS (Corma).

**US-10 Déclarer les accès, jamais les mots de passe** (M4)
En tant que Sophie, je veux enregistrer qu'une personne a accès à une application, un partage, une boîte partagée ou un coffre de mots de passe, avec son niveau, afin de savoir qui a accès à quoi.
Must · M · Critère clé : étant donné le formulaire d'accès, quand je l'enregistre, alors aucun champ ne permet de saisir un mot de passe ou un secret, et l'accès apparaît sur la fiche de la personne et sur celle de l'application.
Marketing : **oui**, engagement public « nous ne stockons aucun mot de passe » (FAQ, page sécurité).

**US-11 Enregistrer contrats et fournisseurs avec la date limite de résiliation** (M5)
En tant que Marc, je veux enregistrer un contrat avec sa durée, sa reconduction tacite et son préavis, afin de connaître la dernière date à laquelle je peux résilier.
Must · M · Critère clé : étant donné un contrat de maintenance qui se termine le 31/03/2027, avec reconduction tacite et préavis de 3 mois, quand je l'enregistre, alors Lanternis affiche « résiliable jusqu'au 31/12/2026 » et programme l'alerte A1.
Marketing : **oui**, exemple phare de la landing (copieurs) ; article « reconduction tacite » à prévoir.

**US-12 Surveiller domaines et certificats automatiquement** (M6, M10)
En tant que Marc, je veux saisir nos noms de domaine et nos adresses de site, afin d'être prévenu avant leur expiration sans rien vérifier moi-même.
Must · S · Critère clé : étant donné le domaine structure.fr, quand je l'ajoute, alors sa date d'expiration est lue par RDAP en moins d'une minute, et un certificat qui expire dans 25 jours produit une alerte A6.
Marketing : **oui**, outil gratuit possible sur le site (« vérifiez l'expiration de votre domaine »), à étudier comme aimant à prospects.

**US-13 Déclarer les sauvegardes et leurs tests** (M6)
En tant que Nadia, je veux décrire nos sauvegardes et enregistrer chaque test de restauration, afin de prouver qu'elles fonctionnent.
Should · S · Critère clé : étant donné une sauvegarde sans test depuis 91 jours, quand le digest est généré, alors l'alerte « sauvegarde non vérifiée » y figure avec l'action « Enregistrer un test ».
Marketing : **oui**, sujet de contenu (assureur, financeurs, job 3) ; sans vocabulaire de la peur.

**US-14 Personnaliser les modèles d'arrivée et de départ** (M7)
En tant que Sophie, je veux partir des modèles fournis et les adapter (tâches, rôle responsable, échéance relative, preuve exigée, conditions), afin que la check-list corresponde à notre façon de faire.
Must · M · Critère clé : étant donné le modèle « Départ » par défaut, quand j'ajoute la tâche « Récupérer le badge » à J0 pour le rôle office manager, alors tout départ lancé ensuite la contient, et les départs déjà en cours ne changent pas.
Marketing : **oui**, modèles de check-list publiables en contenu gratuit (arrivée, départ, départ du référent informatique).

**US-15 Lancer un départ généré depuis ce que la personne a** (M7)
En tant que Sophie, je veux saisir une date de départ et obtenir une check-list qui contient le matériel, les comptes, les licences, les accès et les responsabilités réels de la personne, afin de ne rien oublier.
Must · L · Critère clé : étant donné Paul avec 1 portable, 1 téléphone, 1 compte, 2 licences, 3 accès dont un coffre de mots de passe, et responsable d'un contrat, quand je lance son départ au 30/11/2026, alors la check-list contient une tâche par élément (dont « changer les mots de passe partagés du coffre » et « désigner un nouveau responsable du contrat »), chacune avec un responsable et une échéance.
Marketing : **oui, fonctionnalité vedette** : message principal P1 (« Quand votre référent part, votre SI reste ») ; annonce, page dédiée, édition de la lettre mensuelle, démonstration.

**US-16 Lancer une arrivée** (M7)
En tant que Sophie, je veux préparer l'arrivée d'une personne (matériel, compte, licences, accès, ligne), afin qu'elle soit opérationnelle le premier jour.
Must · M · Critère clé : étant donné une arrivée le 02/12/2026, quand le compte de la personne apparaît dans Microsoft 365, alors la tâche « Créer le compte de messagerie » passe à « constaté » avec la date et la source, en attente de validation.
Marketing : **oui**, message pour P3 (office manager) ; page « Arrivées et départs ».

**US-17 Suivre les tâches : responsable, échéance, preuve** (M7)
En tant que le prestataire, je veux recevoir mes tâches par email, les clore avec un commentaire et voir ce qui est constaté automatiquement, afin que la structure ait la preuve de ce que j'ai fait.
Must · M · Critère clé : étant donné une tâche à preuve « déclaration avec commentaire », quand je la clos sans commentaire, alors la clôture est refusée avec un message clair ; une fois close, elle affiche qui, quand et le commentaire, et ne peut plus être modifiée (seulement rouverte, avec trace).
Marketing : **oui**, notion de « preuve » à valoriser auprès de P2 (CA, financeurs) et de l'assureur.

**US-18 Recevoir les alertes et le digest hebdomadaire** (M8)
En tant que Marc, je veux recevoir chaque lundi un email court qui liste ce qui demande une décision, et un email immédiat seulement pour l'urgent, afin d'être prévenu sans être submergé.
Must · M · Critère clé : étant donné un compte resté actif après le départ de Paul le 30/11, quand la synchronisation du 01/12 le constate, alors je reçois un email immédiat « Le compte de Paul Martin est encore actif depuis son départ le 30 novembre » avec l'action « Fermer les accès » et « Pourquoi vous voyez ceci ».
Marketing : **oui**, promesse « c'est Lanternis qui vous écrit » ; capture du digest pour la landing et les emails.

**US-19 Lire le tableau de bord de la direction et le coût du SI par personne** (M8, M5)
En tant que Nadia, je veux un écran de 12 indicateurs au plus, dont le coût annuel du SI et le coût par personne, afin de répondre à mon CA en 5 minutes.
Must · M · Critère clé : étant donné des contrats, abonnements et matériels saisis, quand j'ouvre le tableau de bord, alors le coût annuel HT et le coût par personne sont affichés avec leur mode de calcul (« Pourquoi ce chiffre »), et les éléments sans montant sont signalés au lieu d'être estimés.
Marketing : **oui**, chiffre phare (« combien coûte votre informatique par salarié ? ») ; sujet d'article et question de l'autodiagnostic.

**US-20 Exporter tout le registre** (M12)
En tant que Marc, je veux exporter l'ensemble du registre en CSV à tout moment, afin que la carte de mon SI m'appartienne.
Must · S · Critère clé : étant donné n'importe quelle offre, quand je demande l'export, alors je reçois une archive avec un fichier CSV par entité (personnes, matériel, comptes, licences, accès, contrats, fournisseurs, domaines, sauvegardes, processus, tâches) en UTF-8.
Marketing : **oui**, tient la promesse « exportable à tout moment » de la landing (passe de « prévu » à « déjà vrai »).

#### P2 : version suivante

**US-21 Changement de poste ou de service** (M7) — En tant que Sophie, je veux qu'un changement de fonction génère la revue des anciens accès et l'ouverture des nouveaux, afin d'éviter l'accumulation de droits. Should · M · Critère clé : étant donné Léa passée de la comptabilité à l'accueil, quand j'enregistre le changement, alors chaque accès lié à l'ancienne fonction apparaît avec le choix « garder » ou « retirer », et aucun n'est conservé sans décision. Marketing : oui, contenu « qui a accès à quoi ».

**US-22 Décider d'un renouvellement** (M5, M8) — En tant que Marc, je veux répondre à une alerte d'échéance par une décision (renouveler, renégocier, résilier, remplacer) et ses tâches, afin de garder la trace des arbitrages. Should · M · Critère clé : étant donné l'alerte A1 sur le contrat des copieurs, quand je choisis « résilier », alors la tâche « envoyer la lettre de résiliation avant le 31/12/2026 » est créée et la décision (qui, quand, motif) est consignée sur le contrat. Marketing : oui, angle « décider avant, pas subir ».

**US-23 Consigner un incident ou une demande simple** (M9) — En tant que Sophie, je veux consigner le vol d'un portable ou une demande ponctuelle liée à un objet, afin que le registre reste juste et que l'action soit suivie, sans outil de tickets. Should · M · Critère clé : étant donné un portable déclaré volé, quand j'enregistre l'incident, alors l'appareil passe à « sorti : volé » et une check-list (retrait des accès, changement des mots de passe partagés, déclaration à l'assureur) est proposée. Marketing : non (fonction de fond), sauf cas client.

**US-24 Rédiger procédures et dossier de passation** (M9) — En tant que Marc, je veux que mon référent informatique rédige dans Lanternis les procédures et sa fiche de passation, liées aux objets concernés, afin que son savoir reste dans la structure. Should · M · Critère clé : étant donné un modèle « Départ d'un référent », quand le départ est lancé, alors une tâche « compléter la fiche de passation » est assignée à la personne qui part, avec un plan type à remplir. Marketing : **oui**, prolonge le message de continuité ; modèle de fiche de passation en contenu gratuit.

**US-25 Synthèse mensuelle et attestation de départ en PDF** (M12) — En tant que Nadia, je veux une synthèse mensuelle d'une page et une attestation de départ datée, afin de les présenter au CA, au financeur ou à l'assureur. Should · M · Critère clé : étant donné un départ clos, quand je génère l'attestation, alors elle liste chaque tâche, sa preuve, son auteur et sa date, avec la mention « Lanternis est une marque d'Hasteria SASU ». Marketing : **oui**, argument ESS (message 7 de la plateforme de marque).

**US-26 Détecter les abonnements payés hors registre** (M10, M3) — En tant que Nadia, je veux relier Qonto ou Pennylane pour repérer les paiements récurrents vers des éditeurs absents du registre, afin de découvrir les abonnements pris par carte. Could · L · Critère clé : étant donné trois paiements mensuels consécutifs au même éditeur, quand il n'existe aucun abonnement correspondant, alors l'alerte A15 propose « Ajouter au registre » ou « Ignorer ». Marketing : oui, « les abonnements pris sans que personne ne le sache ».

**US-27 Suivre les lignes téléphoniques** (M5) — En tant que Sophie, je veux enregistrer les lignes (numéro, opérateur, forfait, coût) et leur affectation, afin de les transférer ou de les résilier au départ. Should · S · Critère clé : étant donné une ligne mobile affectée à Paul, quand son départ est lancé, alors la tâche « transférer ou résilier la ligne » figure dans la check-list. Marketing : non (inclus dans « tout le SI »).

**US-28 Revue périodique des accès** (M4) — En tant que Nadia, je veux qu'une revue des accès aux applications critiques me soit proposée tous les 6 mois, afin de prouver que les droits sont à jour. Should · M · Critère clé : étant donné une application critique sans revue depuis 6 mois, quand je lance la revue, alors chaque accès est à confirmer ou à retirer par son responsable, et la revue close est datée. Marketing : oui, argument assureur et données des personnes accompagnées (ESS).

**US-29 Gérer plusieurs sites** (M11) — En tant que Nadia, je veux rattacher personnes, matériel et contrats à nos établissements et donner à chaque directeur de site un accès limité à son site, afin de déléguer sans tout ouvrir. Could · L · Critère clé : étant donné un responsable du site de Lyon, quand il ouvre le registre, alors il ne voit que les éléments de ce site, et le tableau de bord de la direction se filtre par site. Marketing : oui, offre haute et ESMS.

#### P3

**US-30 Interroger Lanternis par une API en lecture** (M12) — En tant que le prestataire, je veux lire le registre d'un client par une API documentée (OpenAPI), afin de l'intégrer à mes outils sans ressaisie. Could · L · Critère clé : étant donné une clé d'API créée par l'administrateur du client avec la portée « matériel en lecture », quand j'appelle l'API, alors je ne reçois que le matériel de cette organisation et l'appel est journalisé. Marketing : oui, page partenaires prestataires.

**Autres éléments P2–P3 sans story à ce stade** : profils d'accès par fonction (P2), check-list sécurité compatible avec les mesures MonAideCyber (P2), connecteurs Intune et appareils Google (P2), export ICS des échéances (P2), pièces jointes (P2, sous condition), connecteurs SIRH, coffres de mots de passe, GLPI, agrégateur bancaire et FEC (P3), signature électronique des bons de remise (P3), responsable de site sur les processus (P3).

### 6.3 Impact marketing par module (à transmettre au pôle marketing)
| Module | Annonce | Page du site | Email (lettre mensuelle) | Remarque |
|---|---|---|---|---|
| M7 Arrivées et départs | **Oui, lancement** | Page dédiée | Édition dédiée | Fonctionnalité vedette ; démonstration « départ du référent » |
| M1 + M3 + M4 « Qui a quoi » | Oui | Page « Qui a quoi » | Oui | Écran vedette des captures |
| M8 Alertes et coût du SI | Oui | Section de la page d'accueil | Oui (capture du digest) | Chiffre « coût par salarié » |
| M10 Microsoft 365, Google | Oui | Une page par connecteur | Mention | Insister sur la lecture seule |
| M5 Contrats | Non (déjà annoncé) | Section | Article « reconduction tacite » | Exemple des copieurs |
| M6 Continuité | Non | Section | Article sauvegardes | Outil gratuit domaine/certificat à étudier |
| M11 Prestataire invité | Oui (canal) | Page « Pour les prestataires » | Non | Levier de prescription |
| M12 Export | Non | FAQ, page sécurité | Non | Passe de « prévu » à « déjà vrai » |

**À signaler au pôle marketing** : la landing (non publiée) cite « votre banque ou votre logiciel comptable » parmi les connecteurs de mise à jour ; ils arrivent en P2. Et la promesse publique doit maintenant nommer **les comptes, les accès et les arrivées et départs** autant que les contrats.

---

## 7. Différenciation et validation

### 7.1 Face à Primo, Corma et GLPI
Sources : `2-marche/benchmark.md` (consulté le 2026-10-25) ; les jugements sur les concurrents restent **(H)**.

| | **Primo** | **Corma** | **GLPI** | **Lanternis** (proposé) |
|---|---|---|---|---|
| Pour qui | Responsable IT ou « office manager tech » de scale-up | Responsable IT ou office manager ; gouvernance des SaaS | Technicien, service informatique, prestataire | **Dirigeant et DAF non techniciens**, avec l'office manager et le prestataire comme contributeurs |
| Objet central | L'appareil (MDM) et l'application SaaS | L'application SaaS et ses accès | Le ticket et l'élément de parc | **La personne** : qui a quoi, ce que cela coûte, ce qui expire |
| Agit sur le SI ? | Oui : enrôle, configure, provisionne | Oui en offre Pro : provisioning | Oui (inventaire par agent, tickets) | **Non, lecture seule** : ordonne, assigne, constate, prouve |
| Contrats non SaaS (copieurs, maintenance, hébergement, télécom), fournisseurs | Non (H) | Non (H) | Contrats présents mais orientés technicien (H) | **Oui**, avec date limite de résiliation |
| Arrivées et départs | Via SIRH, orientés provisioning | Provisioning (Pro) | Non natif (H) | **Check-list générée depuis le registre réel, avec preuves**, y compris passation des responsabilités |
| Domaines, certificats, sauvegardes | Non (H) | Non (H) | Partiel (H) | **Oui** |
| Coût du SI | Partiel (SaaS) | SaaS seulement | Non | **Tout le SI**, par personne |
| Prix | Non publié | Dès 3 € par utilisateur et par mois | 19 € HT par agent et par mois | **Forfait public par structure** (H) |
| Hébergement | Non indiqué | « EU Data Residency » | France (OVHcloud) | France (prévu) |
| Service humain | Non | Non | Non (éditeur) ; prestataires | **Mise en place et DSI à temps partagé** |

**Phrase de différenciation proposée (H)** : « Primo et Corma gèrent vos outils ; GLPI sert votre technicien. Lanternis donne à la direction la carte de tout le SI, personne par personne, et la preuve que chaque arrivée et chaque départ a été traité. »

**Risques de positionnement** : (1) Corma ajoute les contrats non SaaS : notre défense est la personne, la preuve et le service humain ; (2) le choix « lecture seule » peut paraître moins puissant : il faut le vendre comme neutralité et sécurité ; (3) un registre plus large demande plus de saisie : la mise en place accompagnée et l'import restent indispensables (`pre-mortem.md` R1).

### 7.2 Questions à poser en entretien pour valider ce périmètre
À intégrer à `2-marche/script-interview.md` par l'analyste-marche (méthode Mom Test : faits passés, pas d'avis sur le produit).

| # | Question | Ce qu'elle valide | Signal positif (H) |
|---|---|---|---|
| Q1 | « Racontez-moi le dernier départ d'un salarié : qu'est-il arrivé à son ordinateur, sa messagerie, ses accès ? Qui s'en est occupé ? » | Douleur du départ, rôles | Oubli constaté ou incertitude ; plusieurs intervenants |
| Q2 | « Et la dernière arrivée : le nouveau avait-il tout le premier jour ? » | Valeur de l'arrivée | Retard, bricolage, prêt de compte |
| Q3 | « Aujourd'hui, si je vous demande qui a accès à votre logiciel de paie ou à votre coffre de mots de passe, comment trouvez-vous la réponse ? » | Valeur du module Accès | « Il faut demander au prestataire » |
| Q4 | « Existe-t-il une liste du matériel ? Qui la tient ? Quand a-t-elle été mise à jour ? Puis-je la voir ? » | Point de départ de l'import ; cockpit vide | Liste existante mais obsolète |
| Q5 | « Microsoft 365, Google Workspace, autre ? Qui en est administrateur ? Avez-vous Entra ID P1 (Business Premium) ? » | Priorité M365 contre Google ; F6 | Administrateur joignable ; part de Google dans l'ESS |
| Q6 | « Combien de comptes de messagerie avez-vous, et combien de salariés ? » | Comptes orphelins (A7, A10) | Écart non expliqué |
| Q7 | « Combien de contrats informatiques avez-vous (maintenance, copieurs, hébergement, télécom) ? Le dernier reconduit sans le vouloir ? » | Module Contrats | Reconduction subie citée |
| Q8 | « Vos sauvegardes : quand ont-elles été testées pour la dernière fois ? Comment le savez-vous ? » | Module Continuité | « Je ne sais pas » |
| Q9 | « Votre prestataire accepterait-il de cocher ses tâches dans un outil à vous ? Que facture-t-il pour un départ ? » | Rôle prestataire invité ; frein R8 | Accepte ou indifférent |
| Q10 | « Avez-vous des bénévoles ou des prestataires qui utilisent votre informatique ? Combien ? » | Métrique de prix « personnes » | Effectif à compter clarifié |
| Q11 | « Quand un incident arrive (vol, panne), où est-il noté ? » | Cadrage incidents (pas de tickets) | Rien n'est noté côté structure |
| Q12 | « Accepteriez-vous de confier à un outil en ligne la liste nominative de votre personnel et de leurs accès ? À quelles conditions ? » | Acceptabilité RGPD et confiance | Oui si hébergé en France et sans mots de passe |
| Q13 | (fin d'entretien) « Si un outil faisait la check-list de départ à partir de ce que la personne a réellement, et vous en donnait la preuve, qu'est-ce que ça remplacerait chez vous ? » | Concurrent réel | Remplace un Excel, des emails, un oubli |
| Q14 | Tri de cartes : classer 8 fonctions (qui a quoi, départs, arrivées, contrats, coût, domaines, sauvegardes, accès) de la plus à la moins utile | Ordre de priorité du MVP | Départs et qui a quoi dans le top 3 |

---

## 8. Hypothèses à vérifier et décisions à prendre

**Hypothèses (H)**
1. Le processus de départ, généré depuis le registre, est la fonction qui déclenche l'achat et l'usage récurrent (Q1, Q13, Q14).
2. Microsoft 365 domine dans les PME de la cible et Google Workspace pèse dans l'ESS (Q5) ; aucune donnée sourcée à ce jour.
3. Le choix « lecture seule, sans provisionnement » est accepté, voire préféré (Q9, Q12).
4. Les clients acceptent un registre nominatif du personnel hébergé chez Hasteria (Q12) ; conditions à fixer par juriste-rgpd.
5. Le prestataire accepte de contribuer (Q9 ; `pre-mortem.md` R8).
6. L'effort P1 de 13 à 16 semaines est une estimation du product-owner, à reprendre par l'architecte au cadrage ; il dépend de la reprise de Cockpit DSI (F7) et du temps du fondateur (F9).
7. Durées par défaut (délais d'alerte, 90 j pour les tests de sauvegarde, 12 mois de conservation après départ, durée de vie du matériel) : propositions à valider.

**Décisions proposées au fondateur**
- D1 : Lanternis ne provisionne rien (lecture seule) et ne stocke aucun secret.
- D2 : pas de téléversement de fichiers au MVP.
- D3 : métrique de prix = personnes présentes hors bénévoles, par tranche ; export CSV complet dans toutes les offres ; un prestataire invité dans toutes les offres.
- D4 : Google Workspace en P1 seulement si un pilote l'utilise.
- D5 : retrait des connecteurs financiers du MVP (Qonto et Pennylane en P2, pour la détection d'abonnements uniquement).

**Pour les autres agents** : architecte (révision de `faisabilite.md` §§ 4 et 6, scopes Graph et Google, effort) ; juriste-rgpd (§ 1.5, mention d'information modèle, durée de conservation) ; strategiste-marketing et cro-conversion (§ 6.3, promesse publique) ; analyste-finance (prix par modules, § 5.2) ; analyste-marche (questions du § 7.2) ; ux (parcours « départ » et « fiche personne » en priorité pour les maquettes).
