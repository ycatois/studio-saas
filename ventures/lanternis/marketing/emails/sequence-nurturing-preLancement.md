---
venture: lanternis
phase: 2b Pré-lancement
auteur: lifecycle-emailing
date: 2026-10-26
statut: brouillon
skills: sequence-nurturing, copywriting-frameworks, ab-test
envoi: Mailjet — RIEN N'EST ENVOYÉ ; activation soumise à la validation explicite de l'utilisateur, après authentification du domaine
---

# Séquence de nurturing du pré-lancement (5 emails, 25 jours)

> **Objectif mesurable de la séquence :** transformer un inscrit confirmé en **entretien de 30 minutes**, puis en **lettre d'intention « pilote fondateur »**. Repères repris de `2-marche/acquisition.md` § 4.2 (tous H) : ≥ 40 % d'autodiagnostics complétés, 12 à 15 entretiens et ≥ 3 lettres d'intention à ≥ 149 € HT/mois en 8 semaines, tous canaux confondus. La part attribuable à cette séquence n'a pas de cible propre : elle sera mesurée.
> **Qui la reçoit :** uniquement les inscrits qui ont coché la case « conseils » **et** confirmé leur adresse (double opt-in, voir `liste-attente-remerciement.md`), segment P1 (entreprise) ou P2 (association, fondation, coopérative), effectif 20 à 249. J0 = date de confirmation.
> **Construction :** valeur pure d'abord (N1, N2), puis méthode qui appelle un échange (N3, N4), puis offre (N5) (skill sequence-nurturing). Chaque email suit **constat concret → conséquence → action simple** (plateforme § 10.1) et une trame PAS douce ou BAB, **sans agitation par la peur**. Un email = un objectif = un CTA.
> **Chiffres :** aucun chiffre de marché dans les corps, sauf deux références sourcées signalées (N3, N4). Les prix cités viennent de `2-marche/prix.md` et sont des **hypothèses en cours de validation**, présentées comme telles.
> **Pied de page, désinscription, mentions Hasteria :** pied commun défini dans `liste-attente-remerciement.md` § 4, sur chaque email.

---

## Vue d'ensemble

| # | Délai | Valeur apportée | CTA unique | Étape | Métrique principale |
|---|---|---|---|---|---|
| N1 | J+3 | La carte du SI en trois colonnes (méthode) | Télécharger le modèle de tableau | Valeur | Clics sur le modèle / reçus |
| N2 | J+7 | Départ d'un salarié : les accès à fermer (check-list) | Faire l'autodiagnostic (ou télécharger la check-list si déjà fait) | Valeur → activation | Autodiagnostics complétés |
| N3 | J+11 | P1 : préparer la passation du référent informatique ; P2 : une page SI pour le CA | Réserver un entretien de 30 min | Méthode → échange | Entretiens réservés |
| N4 | J+18 | Cinq questions à poser à votre prestataire, et ce que Lanternis fera (ou non) | Réserver un entretien de 30 min | Preuve, transparence | Entretiens réservés |
| N5 | J+25 | Le pilote fondateur : conditions écrites, sans engagement de paiement | Demander la lettre d'intention | Offre | Lettres d'intention demandées, puis signées |

### Règles de sortie et d'exclusion (à paramétrer dans Mailjet)
- **Désinscription** : sortie immédiate de la séquence (et de toute communication autre que l'annonce d'ouverture, si la personne reste sur la liste d'attente).
- **Entretien réservé** (via `{{lien_prise_rdv}}` ou par réponse) : sortie de N3 et N4 ; la suite est **personnelle** (email individuel après l'entretien). N5 n'est envoyé que si l'entretien n'a pas déjà abouti à une discussion de lettre d'intention.
- **Réponse à un email** : pause automatique de la séquence de 7 jours, traitement manuel (H : réglage possible selon l'outil d'automatisation ; sinon pause manuelle).
- **Lettre d'intention signée** : sortie définitive de la séquence.
- **Aucun clic sur N1 à N4** : N5 est envoyé quand même (dernier email), puis plus rien jusqu'à l'annonce d'ouverture. Pas de relance de relance.
- **Calendrier** : pas d'envoi entre le 19 décembre 2026 et le 4 janvier 2027 (H : période peu propice, `acquisition.md` § 5) ; la séquence reprend là où elle s'est arrêtée. Pas d'envoi le week-end ; envoi le mardi ou le jeudi matin (H, à tester).

### Segments
- **P1** (entreprise, 20 à 249 ; priorité 100 à 249) : vocabulaire « votre prestataire », « l'infogérance », « les contrats », « le budget informatique ».
- **P2** (association, fondation, coopérative) : « votre CA », « vos financeurs », « ESMS », « RGPD », « données des personnes accompagnées ».
- Les blocs *[P1]* / *[P2]* sont des variantes de paragraphe dans un même gabarit ; le reste est commun.

---

## N1. La carte de votre SI en trois colonnes

- **Déclencheur :** confirmation du double opt-in (J0) ; contact actif dans la séquence.
- **Délai :** J+3.
- **Objet A :** Votre informatique en trois colonnes
- **Objet B :** Ce que vous avez, ce que vous payez, ce qui arrive à échéance
- **Pré-en-tête :** Une méthode d'une page pour dresser la carte de votre SI, avec vos propres documents.
- **Segment :** P1 et P2 (une phrase variable).
- **CTA :** « Télécharger le modèle de tableau » → `{{lien_modele_tableau}}` (fichier .xlsx et .ods, sans formulaire ni nouvelle saisie d'email).
- **Métrique suivie :** taux de clic sur le modèle (clics uniques / emails délivrés). Secondaire : réponses reçues.

**Corps**

> Bonjour{{var:prenom:""}},
>
> Pour piloter votre informatique, il n'est pas nécessaire de tout comprendre. Il faut d'abord pouvoir répondre à trois questions : qu'avons-nous, que payons-nous, qu'est-ce qui arrive à échéance ?
>
> Voici la méthode que nous proposons. Une feuille, trois colonnes.
>
> 1. **Ce que vous avez** : postes, téléphones, serveur ou stockage partagé, logiciels métier, messagerie, site internet, nom de domaine.
> 2. **Ce que vous payez** : pour chaque ligne, le fournisseur, le montant et le mode de paiement (facture, prélèvement, carte bancaire).
> 3. **Ce qui arrive à échéance** : date de renouvellement, préavis de résiliation, personne qui décide.
>
> Où trouver l'information, dans cet ordre : vos relevés bancaires des douze derniers mois (les abonnements payés par carte y apparaissent), les factures de votre prestataire, vos contrats signés, puis la liste des licences dans votre console Microsoft 365 ou Google Workspace.
>
> *[P1]* Votre prestataire peut compléter le tableau avec vous : c'est souvent lui qui a le plus d'éléments sur la première colonne.
> *[P2]* Votre service comptable a déjà une bonne partie de la deuxième colonne : c'est souvent le point de départ le plus rapide.
>
> Ne cherchez pas l'exhaustivité au premier passage. Une carte incomplète vaut mieux que pas de carte.
>
> **[Télécharger le modèle de tableau]**
>
> L'équipe Lanternis

**Trame :** BAB (avant : pas de carte ; après : trois réponses ; pont : la méthode). **Valeur livrable à produire :** le modèle de tableau (3 colonnes, 1 onglet d'exemple fictif), à créer avant activation.

---

## N2. Départ d'un salarié : les accès à fermer

- **Déclencheur :** N1 envoyé, contact toujours actif.
- **Délai :** J+7.
- **Objet A :** Le dernier jour d'un salarié, côté informatique
- **Objet B :** Départ d'un salarié : la check-list des accès
- **Pré-en-tête :** Une liste à cocher pour que rien ne reste ouvert après un départ.
- **Segment :** P1 et P2 (un point variable dans la liste).
- **CTA :**
  - si l'autodiagnostic **n'est pas** complété : « Faire l'autodiagnostic » → `{{lien_autodiagnostic}}` ;
  - si l'autodiagnostic **est** complété : « Télécharger la check-list complète » → `{{lien_checklist_departs}}`.
  (Un seul CTA par destinataire ; la règle repose sur un attribut Mailjet `autodiag_fait` alimenté par l'outil d'autodiagnostic, H : intégration à construire.)
- **Métrique suivie :** autodiagnostics complétés dans les 7 jours suivant N2 (cumul vers l'objectif ≥ 40 %, H) ; à défaut, clics sur la check-list.

**Corps**

> Bonjour{{var:prenom:""}},
>
> Quand un salarié quitte la structure, le matériel est généralement rendu. Les accès, eux, sont plus faciles à oublier, parce qu'ils ne se voient pas.
>
> Voici les points à vérifier le dernier jour :
>
> - le compte de messagerie : fermé, ou transféré à un collègue pour une durée fixée ;
> - les licences attribuées (Microsoft 365, Google Workspace, logiciels payés par utilisateur) : libérées, pour ne plus les payer ;
> - les abonnements souscrits à son nom ou avec sa carte professionnelle : repris ou résiliés ;
> - les accès partagés qu'il connaissait (Wi-Fi, comptes administrateur, site internet, banque en ligne) : mots de passe changés ;
> - le téléphone et l'ordinateur : récupérés, puis réinitialisés avant réattribution ;
> *[P1]* - les accès aux outils de vos clients ou fournisseurs (portails, extranets) : signalés et fermés ;
> *[P2]* - l'accès au logiciel métier et au dossier des personnes accompagnées : fermé le jour même.
>
> Le plus simple est de faire la même liste à l'arrivée : ce qu'on ouvre le premier jour, on sait le fermer le dernier.
>
> Pour voir où vous en êtes sur ce point et sur les autres, l'autodiagnostic prend une dizaine de minutes (H : durée à mesurer sur l'outil réel).
>
> **[Faire l'autodiagnostic]** *(ou [Télécharger la check-list complète] si déjà fait)*
>
> L'équipe Lanternis

**Trame :** constat → conséquence (on paie des licences inutilisées, des accès restent ouverts) → action. Pas d'exemple d'incident, pas de chiffre d'attaques.

---

## N3. Préparer la passation (P1) / Une page SI pour votre CA (P2)

Deux versions du même email, une par segment.

- **Déclencheur :** N2 envoyé ; aucun entretien réservé.
- **Délai :** J+11.
- **CTA unique :** « Choisir un créneau de 30 minutes » → `{{lien_prise_rdv}}?utm_content=n3`.
- **Métrique suivie :** entretiens réservés depuis N3 (réservations / délivrés), puis entretiens **réalisés** (no-show à suivre).

### N3-P1 (entreprise)

- **Objet A :** Si votre référent informatique partait, que resterait-il ?
- **Objet B :** Départ du responsable informatique : la passation en cinq points
- **Pré-en-tête :** Ce qu'il faut écrire avant son dernier jour, et avec qui le faire.

> Bonjour{{var:prenom:""}},
>
> Dans beaucoup de PME, l'informatique tient grâce à une personne : un salarié « qui s'y connaît », un responsable informatique, parfois le dirigeant lui-même. Des offres d'emploi publiées ce mois-ci en témoignent : des PME recrutent pour remplacer un responsable informatique qui part à la retraite.
>
> Un départ annoncé est une occasion : celle d'écrire ce qui n'était que dans une tête. Cinq points suffisent pour commencer :
>
> 1. la carte en trois colonnes (notre premier email) ;
> 2. la liste des comptes administrateur, et qui d'autre y a accès ;
> 3. où sont les sauvegardes, et quand ont-elles été testées pour la dernière fois ;
> 4. les contacts chez chaque prestataire, avec le périmètre de chacun ;
> 5. les décisions en cours : renouvellements, achats prévus, projets.
>
> Nous menons en ce moment des entretiens de 30 minutes avec des dirigeants pour comprendre comment ils vivent cette situation. Nous ne vendons rien pendant cet échange ; vous recevrez la synthèse anonymisée de l'étude, avec les pratiques des autres structures.
>
> **[Choisir un créneau de 30 minutes]**
>
> L'équipe Lanternis

*Source de la phrase sur les offres d'emploi :* `2-marche/signaux-demande.md`, S2 : offres HelloWork du 19/10/2026 (https://www.hellowork.com/fr-fr/emplois/82433859.html) et du 12/10/2026 (https://www.hellowork.com/fr-fr/emplois/84330801.html), consultées le 2026-10-25. **Avant envoi :** vérifier qu'elles sont toujours en ligne et adapter « ce mois-ci » à la date réelle d'envoi (sinon : « des offres d'emploi publiées en octobre 2026 »).

### N3-P2 (association)

- **Objet A :** Une page sur l'informatique pour votre prochain CA
- **Objet B :** Ce que votre CA peut vous demander sur l'informatique
- **Pré-en-tête :** Cinq rubriques pour présenter votre SI au bureau, en une page.

> Bonjour{{var:prenom:""}},
>
> Un jour, un administrateur, un financeur ou un commissaire aux comptes vous demandera : « Où en est-on de l'informatique ? » Mieux vaut avoir une page prête que de la rédiger dans l'urgence.
>
> Voici une trame en cinq rubriques :
>
> 1. **Ce que nous avons** : outils principaux, dont le logiciel métier ;
> 2. **Ce que cela coûte** : total annuel et principaux postes ;
> 3. **Ce qui arrive à échéance** dans les douze mois ;
> 4. **Qui a accès** aux données des personnes accompagnées, et comment les accès sont fermés aux départs ;
> 5. **Les décisions à prendre** : renouvellements, projets, budget.
>
> Nous menons en ce moment des entretiens de 30 minutes avec des DAF et des directions d'association pour comprendre comment elles gèrent leur informatique sans service dédié. Aucune démarche commerciale ; vous recevrez la synthèse anonymisée de l'étude, utilisable devant votre CA.
>
> **[Choisir un créneau de 30 minutes]**
>
> L'équipe Lanternis

---

## N4. Cinq questions à poser à votre prestataire

- **Déclencheur :** N3 envoyé ; aucun entretien réservé.
- **Délai :** J+18.
- **Objet A :** Cinq questions pour votre prochain point avec votre prestataire
- **Objet B :** Votre prestataire et vous : ce qu'il est utile de lui demander
- **Pré-en-tête :** Et, en toute transparence, ce que Lanternis fera et ne fera pas.
- **Segment :** P1 et P2 (une phrase variable).
- **CTA unique :** « Choisir un créneau de 30 minutes » → `{{lien_prise_rdv}}?utm_content=n4`.
- **Métrique suivie :** entretiens réservés depuis N4 ; secondaire : réponses reçues (questions, objections, à verser dans la matrice des objections).

**Corps**

> Bonjour{{var:prenom:""}},
>
> Votre prestataire fait fonctionner votre informatique. C'est aussi vers lui que beaucoup de dirigeants se tournent en premier en cas de problème. Il peut donc vous aider à en garder la carte. Cinq questions utiles pour votre prochain point :
>
> 1. Pouvez-vous nous transmettre la liste de nos équipements et de nos licences, dans un format que nous pouvons ouvrir ?
> 2. Quels contrats se renouvellent dans les douze mois, et avec quel préavis ?
> 3. Qui, chez nous et chez vous, dispose d'un accès administrateur ?
> 4. Quand nos sauvegardes ont-elles été restaurées pour test la dernière fois ?
> 5. Si nous changions un jour de prestataire, que nous remettriez-vous ?
>
> Ce ne sont pas des questions de défiance : ce sont celles d'une direction qui pilote.
>
> C'est le rôle que nous préparons pour Lanternis. Ce qu'il fera : tenir le registre de tout votre SI (matériel, licences et abonnements, contrats, fournisseurs, accès), vous prévenir avant chaque échéance, et être mis en place avec vous par un DSI. Ce qu'il ne fera pas : remplacer votre prestataire, dépanner vos postes, stocker vos fichiers ou vos mots de passe.
>
> *[P1]* Nous voulons vérifier ces choix avec des dirigeants avant d'aller plus loin.
> *[P2]* Nous voulons vérifier ces choix avec des associations avant d'aller plus loin, notamment sur l'hébergement des données et le tarif associatif.
>
> **[Choisir un créneau de 30 minutes]**
>
> L'équipe Lanternis

*Source de « beaucoup de dirigeants se tournent en premier vers lui » :* baromètre Cybermalveillance.gouv.fr 2025 (OpinionWay, 588 entreprises de moins de 250 salariés) : 39 % se tournent d'abord vers leur prestataire informatique (`2-marche/signaux-demande.md`, S1 ; https://www.cybermalveillance.gouv.fr/medias/2025/10/CP-TPE-PME-07102025-3.pdf, consulté le 2026-10-25). Le chiffre n'est volontairement pas repris dans l'email ; la formulation « beaucoup » reste en deçà de ce qu'il établit (39 % n'est pas une majorité : ne pas écrire « la plupart »).
*Périmètre « ne stocke ni fichiers ni mots de passe » :* engagement repris de `messages-par-persona.md` (P1, décision) ; à confirmer par l'architecte avant envoi.

**Trame :** BAB ; neutralité vis-à-vis du prestataire (plateforme § 6 et § 10.2) ; transparence (valeur § 7). Aucune critique du prestataire, aucun concurrent nommé.

---

## N5. Le pilote fondateur

- **Déclencheur :** N4 envoyé ; aucune lettre d'intention en cours.
- **Délai :** J+25.
- **Objet A :** Devenir structure pilote de Lanternis : les conditions
- **Objet B :** Le pilote fondateur, en clair
- **Pré-en-tête :** Une lettre d'intention, pas un contrat : ce qu'elle engage et ce qu'elle n'engage pas.
- **Segment :** P1 et P2 (paragraphe prix variable).
- **CTA unique :** « Recevoir la lettre d'intention » → `{{lien_demande_LI}}` (formulaire court : nom de la structure, effectif, fonction ; ou réponse directe à l'email, H : à choisir).
- **Métrique suivie :** demandes de lettre d'intention (demandes / délivrés) ; puis **lettres signées** (objectif global ≥ 3, `STATUT.md` H3, tous canaux).

**Corps**

> Bonjour{{var:prenom:""}},
>
> Lanternis est en construction. Avant de l'ouvrir, nous cherchons un petit nombre de structures pilotes pour le construire avec elles. Voici les conditions, écrites noir sur blanc.
>
> **Ce que vous obtenez**
> - la mise en place de votre registre du SI avec un DSI, à partir de vos documents ;
> - les alertes avant échéances et le suivi des arrivées et départs ;
> - un tarif fondateur : −30 % pendant douze mois sur l'abonnement.
>
> **Ce que nous vous demandons**
> - un entretien mensuel de retour d'expérience pendant le pilote ;
> - un témoignage à la fin, seulement si vous en êtes satisfait et avec votre accord écrit.
>
> **Les prix** (hors taxes, par mois, grille en cours de validation)
> *[P1]* Selon votre effectif : de 149 € (20 à 49 salariés) à 399 € ou 449 € (100 à 249 salariés), avant la remise fondateur. Mise en place : 490 € ou 990 € selon le palier.
> *[P2]* Selon votre effectif : de 149 € (20 à 49 salariés) à 399 € ou 449 € (100 à 249 salariés), avant la remise. Les associations bénéficient d'une remise de 15 % ; elle n'est pas cumulable avec la remise fondateur : la plus favorable s'applique. Mise en place : 490 € ou 990 € selon le palier.
>
> **Ce qu'engage la lettre d'intention** : elle indique votre intérêt et réserve une place de pilote. Elle ne vaut ni commande ni engagement de paiement. Rien ne sera facturé avant l'ouverture et la signature d'un contrat.
>
> Le nombre de places est limité à dix structures, pour que nous puissions accompagner chacune correctement. Il n'y a pas de date limite : si les places sont prises, nous vous le dirons simplement.
>
> **[Recevoir la lettre d'intention]**
>
> L'équipe Lanternis

**Trame :** offre claire, conditions symétriques (ce que vous obtenez / ce que nous demandons), objection « engagement » levée d'avance. Pas de compte à rebours, pas de « dernières places ».

**À valider avant envoi (bloquant) :**
- Grille de prix, remise fondateur −30 %, plafond de 10 places et non-cumul avec la remise ESS : **hypothèses de `2-marche/prix.md` § 4.1** (point 4) ; à confirmer par l'utilisateur. Le palier 100 à 249 (399 ou 449 €) n'est pas tranché : l'email affiche les deux, ce qui est cohérent avec « grille en cours de validation » mais peut être remplacé par un seul prix après le test en entretien.
- Mention « hors taxes » : prix HT + TVA (Hasteria assujettie, `CLAUDE.md`).
- Texte de la lettre d'intention (non engageante, sans prix ferme ou avec prix indicatif) : à rédiger et à faire relire (juriste-rgpd ou conseil) ; pas encore produit.
- La remise ESS de 15 % et son éligibilité (`prix.md` § 4.2) sont à valider juridiquement.
- Aucune vente avant le GO (`acquisition.md` § 4.2) : la lettre d'intention n'est pas une vente ; pas d'acompte demandé par email.

---

## Tests A/B

| Email | Variable testée | A | B | Métrique de décision |
|---|---|---|---|---|
| N1 | Objet | Formule courte (« trois colonnes ») | Bénéfice explicite (les trois questions) | Clics sur le modèle |
| N2 | Objet | Situation (« le dernier jour ») | Utilité (« check-list ») | Autodiagnostics complétés |
| N3 | Objet | Question (P1) / livrable (P2) | Méthode (P1) / attente du CA (P2) | Entretiens réservés |
| N4 | Objet | « Cinq questions » | « Votre prestataire et vous » | Entretiens réservés |
| N5 | Objet | « Les conditions » | « En clair » | Demandes de lettre d'intention |

- **On ne juge pas sur l'ouverture** (faussée par le préchargement des messageries) mais sur le clic ou l'action.
- **Taille d'échantillon :** avec un objectif de 80 inscrits qualifiés, dont seule une partie cochera la case « conseils », aucun test ne sera statistiquement significatif. Lecture **indicative**, consignée comme telle dans `marketing/rapports/` ; on conserve la variante gagnante uniquement si l'écart est net et cohérent sur plusieurs envois. Alternative : ne tester qu'un seul email (N3, le plus proche de l'objectif) et envoyer les autres en version A.

## Tableau de suivi (à tenir chaque quinzaine, `acquisition.md` § 4.3)

| Email | Délivrés | Clics uniques | Action cible | Désinscriptions | Plaintes (spam) | Réponses |
|---|---|---|---|---|---|---|
| E0 | | | Autodiagnostic | | | |
| N1 | | | Modèle téléchargé | | | |
| N2 | | | Autodiagnostic | | | |
| N3 | | | Entretien réservé | | | |
| N4 | | | Entretien réservé | | | |
| N5 | | | Lettre d'intention demandée | | | |

**Seuils d'alerte (H, à ajuster) :** un taux de désinscription ou de plainte nettement supérieur aux autres emails de la séquence signale un problème de contenu ou de fréquence : suspendre la séquence et revoir le message avant l'envoi suivant.

---

## Points ouverts et hypothèses

1. **Calendrier :** la landing est prévue en S3 (9 au 13 novembre, `acquisition.md` § 5). Un inscrit du 10 novembre reçoit N5 vers le 5 décembre ; un inscrit après le 24 novembre atteint N5 après le 18 décembre, donc en janvier avec la pause. Option à trancher par l'utilisateur : **compresser** les délais pour les inscrits tardifs (J+2, J+5, J+8, J+12, J+16) ou accepter le report en janvier.
2. **Ressources à produire avant activation :** modèle de tableau (N1), check-list des départs (N2), autodiagnostic (E0, N2), outil de prise de rendez-vous, formulaire de demande et texte de la lettre d'intention (N5), politique de confidentialité.
3. **Intégrations Mailjet :** attributs `segment` (P1/P2), `effectif`, `autodiag_fait`, `entretien_reserve`, `LI_statut` ; la mise à jour de ces attributs par le script PHP et l'outil de rendez-vous est à construire. La syntaxe des variables (`{{var:prenom:""}}`) et des blocs conditionnels est à vérifier dans le langage de gabarit Mailjet.
4. **Domaine :** `lanternis.fr` non réservé ; aucun envoi avant SPF, DKIM et DMARC configurés.
5. **RGPD :** base légale, preuve du consentement, durée de conservation et pixel de suivi d'ouverture à valider par juriste-rgpd (déjà prévu dans `STATUT.md`).
6. **Ton :** les objets « Si votre référent informatique partait, que resterait-il ? » (N3-P1) et « Ce que votre CA peut vous demander » (N3-P2) sont les plus proches de la ligne de crête « pas de vente par la peur » : à relire par le brand-manager.
7. **Réactivation :** pas de séquence de réactivation des inactifs en pré-lancement (liste trop petite) ; à concevoir en phase 9.
8. **Persona P3** (office manager) : pas de segment propre ; si elle s'inscrit, elle reçoit la version de sa structure (P1 ou P2). N2 lui est particulièrement adressé.
