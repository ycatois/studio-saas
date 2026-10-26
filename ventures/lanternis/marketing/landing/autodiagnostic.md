---
venture: lanternis
phase: 2b Pré-lancement
commande: /prelancement
auteur: cro-conversion
date: 2026-10-26
statut: brouillon
skills: lead-magnet, copywriting-frameworks
page à construire: autodiagnostic.html (dev-vitrine), appelée depuis validation.html
---

# Autodiagnostic SI gratuit en 10 questions (lead magnet)

> **Statut : brouillon.** Rien n'est publié ni envoyé sans validation explicite du fondateur.
> **Ce que c'est :** 10 questions à choix, 5 minutes, un profil et trois actions à mener ce mois-ci. Il couvre **tout le SI vu par la direction** (ce que vous avez, ce que vous payez, ce qui arrive à échéance, la continuité), pas la cybersécurité en détail : pour la cyber, il renvoie vers les dispositifs publics gratuits (MonAideCyber, Cybermalveillance.gouv.fr) au lieu de les dupliquer (`2-marche/acquisition.md`, C8).
> **Ce que ce n'est pas :** une norme, un audit ni un classement. Le barème est une **grille de lecture maison (H)** : aucune moyenne de marché n'est affichée, faute de données. Il sera recalé après les premiers résultats et les entretiens.
> **Remplace** la version « 20 questions » envisagée dans `acquisition.md` et `messages-par-persona.md` : 10 questions pour viser un taux de complétion élevé (H).
> **Alignement marque v1.1 (2026-10-26).** Appel à l'action principal : la liste d'attente, avec l'essai gratuit d'un mois sans carte annoncé pour l'ouverture (`marque/plateforme-de-marque.md` v1.1, `messages-par-persona.md` v1.1). L'échange de 30 minutes reste proposé, en lien secondaire, comme **entretien de recherche** (Mom Test), et non plus comme un point d'accompagnement avec un spécialiste (§ 5, § 6, § 8). Questions, barème et profils inchangés.

---

## 1. Principes

- **Résultat immédiat à l'écran, sans email.** Le calcul se fait dans le navigateur ; aucune réponse n'est envoyée tant que la personne ne demande pas l'échange ou l'inscription. C'est cohérent avec les valeurs de transparence et de sobriété, et cela rend l'outil partageable par les relais ESS.
- **Ton posé** : on constate, on explique, on propose une action. Aucun vocabulaire de la peur, aucune statistique de sinistre.
- **Une question par écran sur mobile**, toutes les questions sur une page longue sur ordinateur (au choix de dev-vitrine), barre de progression textuelle (« Question 3 sur 10 »).
- **Accessibilité** : chaque question est un `fieldset` avec `legend`, réponses en boutons radio étiquetés, navigation au clavier, résultat annoncé par une zone `role="status"`, aucun score porté par la couleur seule.
- Chaque réponse vaut **0 à 3 points**. Total sur **30**. La réponse « Je ne sais pas » vaut 0 : ne pas savoir est précisément le constat.

## 2. Les 10 questions

Consigne d'introduction : « Répondez pour votre structure telle qu'elle est aujourd'hui, pas telle qu'elle devrait être. Il n'y a pas de bonne note à viser : le but est de savoir par où commencer. »

| # | Axe | Question | 0 point | 1 point | 2 points | 3 points |
|---|---|---|---|---|---|---|
| 1 | Ce que vous avez | Avez-vous une liste à jour de vos équipements (ordinateurs, téléphones, serveurs, copieurs), avec la personne qui les utilise ? | Non, ou je ne sais pas | Une liste existe, mais elle n'est plus à jour | Oui, mais c'est notre prestataire qui la tient | Oui, à jour, et nous y avons accès nous-mêmes |
| 2 | Ce que vous payez | Pourriez-vous lister tous vos abonnements logiciels et licences, avec leur coût annuel ? | Non, ou je ne sais pas | En partie : seulement les principaux | Oui, mais il faudrait plusieurs heures pour la reconstituer | Oui, en quelques minutes |
| 3 | Ce qui arrive à échéance | Connaissez-vous les dates de renouvellement et de préavis de vos contrats informatiques (maintenance, infogérance, copieurs, téléphonie, logiciels) ? | Non, ou je ne sais pas | Pour un ou deux contrats seulement | Pour la plupart, mais sans rappel organisé | Oui, toutes, avec un rappel avant chaque préavis |
| 4 | Continuité | Si la personne qui connaît le mieux votre informatique était absente trois semaines, que se passerait-il ? | Nous serions bloqués sur des sujets importants, ou je ne sais pas | Nous nous débrouillerions, avec difficulté | Notre prestataire prendrait le relais | L'essentiel est écrit : quelqu'un d'autre peut prendre le relais |
| 5 | Ce que vous avez | Quand un salarié quitte la structure, ses accès (messagerie, logiciels, partages) sont-ils fermés ? | Je ne sais pas | Parfois, quand on y pense | Oui, mais sans liste écrite | Oui, le dernier jour, avec une liste à cocher |
| 6 | Ce que vous avez | Les accès administrateur de vos outils clés (messagerie, nom de domaine, site web, sauvegardes, logiciels principaux) sont-ils consignés chez vous ? | Je ne sais pas qui les détient | Une seule personne ou le prestataire les détient, sans copie chez nous | Nous savons qui les détient, mais ils ne sont pas consignés chez nous | Ils sont consignés en lieu sûr et la direction peut y accéder en cas de besoin |
| 7 | Continuité | Une restauration de vos sauvegardes a-t-elle été testée au cours des 12 derniers mois ? | Je ne sais pas s'il existe des sauvegardes | Il existe des sauvegardes, jamais testées à ma connaissance | Notre prestataire dit les tester, sans compte rendu écrit | Oui, avec un compte rendu écrit |
| 8 | Ce que vous payez | Connaissez-vous le coût total annuel de votre informatique (matériel, logiciels, prestataires, télécoms) ? | Non, ou je ne sais pas | Seulement un ordre de grandeur approximatif | Oui, en le reconstituant depuis la comptabilité | Oui, il est suivi au moins une fois par an |
| 9 | Ce qui arrive à échéance | Votre contrat avec votre principal prestataire informatique précise-t-il ce qu'il fait, et comment récupérer vos données et la documentation si vous changez de prestataire ? | Pas de contrat écrit, ou je ne sais pas | Il y a un contrat, mais je ne sais pas ce qu'il couvre | Ce qu'il fait est clair, la sortie (réversibilité) ne l'est pas | Les deux sont écrits |
| 10 | Continuité | Si votre CA, un financeur, un assureur ou un client vous demandait demain un état de votre informatique (équipements, coûts, accès, sauvegardes), combien de temps vous faudrait-il ? | Je ne saurais pas répondre | Plusieurs semaines | Quelques jours | Moins d'une journée |

Aide affichée sous la question 9 : « Si vous n'avez pas de prestataire, répondez pour votre principal fournisseur informatique. »
Aide affichée sous la question 10, version ESS (`?public=ess`) : remplacer « un assureur ou un client » par « l'ARS ou votre commissaire aux comptes ».

**Pourquoi ces questions** (texte court affiché dans le résultat, question par question, pour chaque réponse à 0 ou 1 point) :
1. Sans liste, impossible de savoir ce qui doit être renouvelé, assuré ou rendu au départ d'un salarié.
2. Les abonnements pris par carte bancaire se cumulent sans que personne ne les voie.
3. Un préavis manqué, c'est souvent un an de plus au même prix.
4. Le savoir qui tient dans une seule tête est le premier point fragile d'une petite structure.
5. Un compte resté ouvert après un départ est un accès que plus personne ne surveille.
6. Sans ces accès, vous dépendez d'une personne pour reprendre la main sur vos propres outils.
7. Une sauvegarde jamais restaurée est une promesse, pas une garantie.
8. Sans coût total, impossible d'arbitrer ou de comparer avec un poste interne ou un autre prestataire.
9. Ce qui n'est pas écrit au départ se négocie mal à la sortie.
10. C'est la question que posent de plus en plus de CA, de financeurs, d'assureurs et de clients (H, à confirmer en entretien).

## 3. Barème

**Score global** : somme des 10 réponses, de 0 à 30.

**Score par axe** (affiché en barres avec la valeur en texte, par exemple « 4 sur 9 ») :

| Axe | Questions | Maximum |
|---|---|---|
| Ce que vous avez | 1, 5, 6 | 9 |
| Ce que vous payez | 2, 8 | 6 |
| Ce qui arrive à échéance | 3, 9 | 6 |
| Continuité | 4, 7, 10 | 9 |

**Axe prioritaire** : l'axe au plus faible pourcentage (score / maximum). En cas d'égalité, ordre de priorité : Continuité, puis Ce qui arrive à échéance, puis Ce que vous payez, puis Ce que vous avez (H : la continuité est le déclencheur n° 1 de P1).

**Profil** selon le score global :

| Score | Profil |
|---|---|
| 0 à 9 | **Informatique en boîte noire** |
| 10 à 17 | **Pénombre** |
| 18 à 24 | **Carte à compléter** |
| 25 à 30 | **Bien éclairé** |

Les seuils sont des **hypothèses** de lecture, à recaler après les 50 premiers résultats (distribution observée) et les entretiens.

## 4. Résultats par profil

Structure de l'écran de résultat : profil et score, phrase de constat, barres par axe, **trois actions à mener ce mois-ci** (la première dépend de l'axe prioritaire), les explications des réponses à 0 ou 1 point, puis l'appel à l'action (§ 5). Un bouton « Imprimer ou enregistrer en PDF » (impression du navigateur) permet de garder le résultat sans donner son email.

### 0 à 9 : Informatique en boîte noire
**Constat :** « Aujourd'hui, la carte de votre informatique n'est pas entre vos mains : elle tient dans une tête, chez un prestataire, ou nulle part. C'est très courant dans une structure sans DSI, et cela se corrige par étapes. »
**Trois actions ce mois-ci :**
1. *(selon l'axe prioritaire, voir ci-dessous)*
2. Demandez à votre prestataire, ou à votre référent, la liste écrite de ce qu'il gère pour vous : équipements, logiciels, contrats.
3. Ouvrez un tableau en trois colonnes : ce que vous avez, ce que vous payez, ce qui arrive à échéance. Remplissez-le avec vos dix plus grosses dépenses informatiques.

### 10 à 17 : Pénombre
**Constat :** « Vous avez des morceaux de la carte, mais ils sont dispersés ou dépendent d'une personne. Le plus gros du travail est de les rassembler au même endroit, chez vous. »
**Trois actions ce mois-ci :**
1. *(selon l'axe prioritaire)*
2. Rassemblez vos contrats informatiques dans un seul dossier et notez, pour chacun, sa date de préavis.
3. Écrivez la liste des accès à fermer au départ d'un salarié, et utilisez-la au prochain départ.

### 18 à 24 : Carte à compléter
**Constat :** « L'essentiel est connu. Ce qui manque, c'est surtout la mise à jour dans le temps et des rappels avant les échéances. »
**Trois actions ce mois-ci :**
1. *(selon l'axe prioritaire)*
2. Mettez un rappel deux mois avant chaque préavis de contrat.
3. Fixez une revue annuelle du coût total de votre informatique, avec votre prestataire.

### 25 à 30 : Bien éclairé
**Constat :** « Votre informatique est lisible et documentée. L'enjeu est de le rester : quand les personnes changent, quand les outils s'ajoutent. »
**Trois actions ce mois-ci :**
1. *(selon l'axe prioritaire, s'il reste un axe sous 70 %)* ; sinon : vérifiez que la documentation ne dépend pas d'une seule personne.
2. Testez une restauration de sauvegarde et gardez le compte rendu.
3. Pour aller plus loin sur la sécurité, faites le diagnostic gratuit MonAideCyber.

### Première action selon l'axe prioritaire
- **Ce que vous avez** : « Faites la liste de vos comptes administrateur (messagerie, nom de domaine, site, sauvegardes) et de qui les détient. Rangez-la en lieu sûr, accessible à la direction. »
- **Ce que vous payez** : « Exportez de votre comptabilité les dépenses informatiques des 12 derniers mois et classez-les : matériel, logiciels, prestataires, télécoms. »
- **Ce qui arrive à échéance** : « Listez vos cinq plus gros contrats informatiques avec leur date de préavis, et mettez un rappel deux mois avant chacune. »
- **Continuité** : « Bloquez une heure avec votre référent ou votre prestataire pour écrire ensemble ce que vous avez, ce que vous payez et ce qui arrive à échéance. »

### Renvoi cyber (affiché pour tous les profils)
« Cet autodiagnostic ne remplace pas un diagnostic de cybersécurité. Pour cela, des dispositifs publics gratuits existent, dont MonAideCyber et Cybermalveillance.gouv.fr. » Lien de référence : https://www.economie.gouv.fr/entreprises/cybersecurite-des-dispositifs-publics-gratuits-pour-vous-accompagner (cité dans `1-analyse/jtbd.md` ; **revérifier le lien avant publication**).

## 5. Appel à l'action : la liste d'attente, puis l'essai à l'ouverture

Affiché sous le résultat, pour tous les profils (texte adapté au profil dans la première phrase). Avant l'ouverture, toute fonction s'écrit au futur ou avec « conçu pour » (plateforme v1.1, § 5 et § 10.6).

- Titre : **Passez du diagnostic à la carte**
- Texte (profils boîte noire et pénombre) : « Lanternis est conçu pour tenir le registre de tout votre SI : qui a quoi, ce que vous payez, ce qui arrive à échéance, et une check-list à chaque arrivée et à chaque départ. Il est en construction. Rejoignez la liste d'attente : à l'ouverture, vous pourrez l'essayer un mois, gratuitement et sans carte bancaire. »
- Texte (profils carte à compléter et bien éclairé) : « Vous avez déjà une bonne carte. Le plus difficile est de la garder à jour quand les personnes et les outils changent. Lanternis est conçu pour cela : il vous préviendra avant les échéances et préparera chaque départ. Rejoignez la liste d'attente : à l'ouverture, un mois d'essai gratuit, sans carte bancaire. »
- Bouton : **Rejoindre la liste d'attente** (→ `validation.html?src=autodiag#liste-attente`).
- Lien secondaire (étude) : « Vous acceptez de nous raconter comment cela se passe chez vous ? **Proposer un échange de 30 minutes pour notre étude.** » Texte affiché à l'ouverture du formulaire : « Nous menons une étude auprès de structures sans DSI. Pendant 30 minutes, par téléphone ou en visio, nous vous posons des questions sur votre situation. Nous ne présentons pas de produit et nous ne vendons rien. Vous recevrez la synthèse anonymisée de l'étude. »

**Formulaire de demande d'échange (entretien de recherche)** (même script `waitlist.php`, pour ne pas multiplier les traitements) : email professionnel, nom de la structure, type, effectif (obligatoires) ; case facultative « Joindre mon résultat à ma demande » (envoie `score`, `profil` et les 10 réponses codées 0 à 3, rien d'autre) ; case facultative « Recevoir les nouvelles de Lanternis ». Champs techniques : `echange=oui`, `source=autodiag`, `douleur` déduite de l'axe prioritaire (`continuite` → `depart-referent`, `payez` → `couts`, `echeance` → `renouvellements`, `avez` → `acces`).
- Champs supplémentaires à accepter par `waitlist.php` : `score` (0 à 30), `profil` (`boite-noire` | `penombre` | `carte-a-completer` | `bien-eclaire`), `reponses` (10 chiffres de 0 à 3), seulement si la case « Joindre mon résultat » est cochée.
- **Pas d'outil de prise de rendez-vous tiers** en pré-lancement : Lanternis répond par email sous 2 jours ouvrés (H, engagement à confirmer par le fondateur) avec trois créneaux.
- Les entretiens obtenus suivent `2-marche/script-interview.md` (Mom Test) : l'échange commence par l'exploration de la situation, pas par Lanternis.

## 6. Livraison et suite (brouillons, envoi soumis à validation)

**Email de confirmation de la demande d'échange (transactionnel)**
- Objet : « Votre échange de 30 minutes : nous revenons vers vous sous 2 jours ouvrés »
- Corps : « Bonjour, merci pour votre demande. Nous vous proposerons trois créneaux par retour d'email sous 2 jours ouvrés. Cet échange est un entretien d'étude : nous vous poserons des questions sur votre situation, sans présentation commerciale. [Si résultat joint :] Votre résultat : [profil], [score] sur 30 ; votre axe prioritaire : [axe]. D'ici là, votre première action : [action de l'axe]. — Lanternis est une marque d'Hasteria SASU. [Me désinscrire] »

**Suite pour les inscrits venus de l'autodiagnostic (3 emails, uniquement si la case « nouvelles » est cochée)**
1. J+3 : « Votre premier pas : le tableau en trois colonnes » (comment remplir ce que vous avez, ce que vous payez, ce qui arrive à échéance, avec un exemple fictif).
2. J+10 : « Préavis : la date qui coûte un an » (repérer les dates de préavis de ses contrats ; renvoi vers l'article du blog quand il existera).
3. J+21 : « Quand votre référent part : la liste à faire avant son dernier jour » (contenu du futur article pilier) + rappel de la liste d'attente (essai d'un mois sans carte annoncé pour l'ouverture).

**Promotion (3 contenus, sans LinkedIn, décision du 2026-10-26)**
1. **Article du blog** (redacteur-blog-seo) : « Votre référent informatique part : la liste en trois colonnes à faire avant son départ », avec l'autodiagnostic en appel à l'action (sujet déjà maquetté page 13 de la charte).
2. **Post Facebook** (page de la marque, si elle est ouverte) : visuel carré « Votre responsable informatique part en juin. Qui sait quand se renouvelle le contrat du serveur ? » (gabarit de la charte), légende qui renvoie vers l'autodiagnostic `?src=facebook`.
3. **Texte pour les relais ESS** (lettre d'information d'une CRESS ou d'une fédération, C4) : « Associations de 20 à 249 salariés : savez-vous ce que vous avez, ce que vous payez et ce qui arrive à échéance ? Un autodiagnostic gratuit en 10 questions, résultat immédiat, sans inscription obligatoire. » Lien `autodiagnostic.html?public=ess&src=ess-relais`.

## 7. Mesure (sans cookie, mêmes règles que `validation.md` § 10)

| Événement | Propriétés | Sert à |
|---|---|---|
| `Début autodiagnostic` | source, public | Attrait |
| `Fin autodiagnostic` | profil, axe prioritaire, source, public (jamais les réponses détaillées) | Taux de complétion, distribution des profils (recalage des seuils) |
| `Clic échange` | profil | Intérêt pour l'échange |
| `Demande échange` | profil, source | Conversion en entretien |
| `Clic liste d'attente` | profil | Conversion en inscrit |

**Objectifs (H)** : ≥ 60 % de complétion parmi ceux qui commencent ; **≥ 40 % des inscrits** de la liste d'attente terminent l'autodiagnostic (lien de l'email de bienvenue, `src=confirmation` ; objectif de `2-marche/synthese.md`) ; ≥ 10 % des diagnostics terminés aboutissent à une demande d'échange ou à une inscription.

## 8. Points ouverts
1. Seuils de profils et pondération égale des questions : hypothèses, à recaler sur les premiers résultats.
2. Délai de réponse de 2 jours ouvrés pour l'échange : à confirmer par le fondateur (temps disponible, `acquisition.md` : ≤ 12 h/semaine d'acquisition).
3. Formulation « spécialiste du SI » retirée (v1.1) : l'échange est présenté comme un entretien d'étude, signé par la marque.
4. Lien vers les dispositifs publics cyber : à revérifier le jour de la publication.
5. Base légale et durée de conservation des résultats joints à une demande d'échange : à valider par juriste-rgpd.
6. Les 3 emails de suite (J+3, J+10, J+21, § 6) ne respectent pas le plafond « au plus une par mois » de la case `nouvelles` (décision du 2026-10-26, `emails/sequence-nurturing-preLancement.md`) : à fusionner dans la lettre mensuelle ou à supprimer (lifecycle-emailing).
7. Ordre des appels à l'action (liste d'attente en principal, échange d'étude en secondaire) : à suivre avec les événements `Clic liste d'attente` et `Demande échange` ; les entretiens restent nécessaires avant le GO (`propositions-tarifs.md` § 11.6, point 6).
