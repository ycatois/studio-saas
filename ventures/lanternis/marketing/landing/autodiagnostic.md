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
> **Ce que c'est :** 10 questions à choix, 5 minutes, un profil et trois actions à mener ce mois-ci. Il couvre **tout le SI vu par la direction**, réparti sur les 6 domaines de la plateforme (§ 4.2 : contrats et fournisseurs ; matériel acheté, loué ou en leasing ; licences et abonnements ; comptes et accès ; domaines, certificats et sauvegardes ; arrivées et départs) plus le coût total, pas la cybersécurité en détail : pour la cyber, il renvoie vers les dispositifs publics gratuits (MonAideCyber, Cybermalveillance.gouv.fr) au lieu de les dupliquer (`2-marche/acquisition.md`, C8).
> **Ce que ce n'est pas :** une norme, un audit ni un classement. Le barème est une **grille de lecture maison (H)** : aucune moyenne de marché n'est affichée, faute de données. Il sera recalé après les premiers résultats et les entretiens.
> **Remplace** la version « 20 questions » envisagée dans `acquisition.md` et `messages-par-persona.md` : 10 questions pour viser un taux de complétion élevé (H).
> **Alignement marque v1.1 (2026-10-26).** Appel à l'action principal : la liste d'attente, avec l'essai gratuit d'un mois sans carte annoncé pour l'ouverture (`marque/plateforme-de-marque.md` v1.1, `messages-par-persona.md` v1.1). L'échange de 30 minutes reste proposé, en lien secondaire, comme **entretien de recherche** (Mom Test), et non plus comme un point d'accompagnement avec un spécialiste (§ 5, § 6, § 8). Questions, barème et profils inchangés.
> **Alignement marque v1.2 (2026-10-26).** Questions réécrites pour couvrir les 6 domaines de façon équilibrée (`marque/plateforme-de-marque.md` § 4.2) : chaque domaine a 1 ou 2 questions, les arrivées et les départs une seule (§ 10.7). Les questions 4 (absence du référent), 9 (contrat du prestataire) et 10 (état demandé par le CA) disparaissent sous cette forme : le référent et le prestataire sont repris en question 10, le CA et les financeurs en question 8. **Inchangés** : 10 questions notées de 0 à 3, total sur 30, les 4 axes (mêmes libellés et mêmes numéros de questions par axe, donc `lib/Autodiag.php` reste valable), les seuils et les noms des profils, la première action par axe. **Revus** : constats, deuxième et troisième actions de chaque profil, explications « pourquoi » (§ 2, § 4), appel à l'action (§ 5). Repris à l'identique dans `produit/apps/prelancement/public/autodiagnostic.html` et dans les textes de `public/assets/autodiagnostic.js`.

---

## 1. Principes

- **Résultat immédiat à l'écran, sans email.** Le calcul se fait dans le navigateur ; aucune réponse n'est envoyée tant que la personne ne demande pas l'échange ou l'inscription. C'est cohérent avec les valeurs de transparence et de sobriété, et cela rend l'outil partageable par les relais ESS.
- **Ton posé** : on constate, on explique, on propose une action. Aucun vocabulaire de la peur, aucune statistique de sinistre.
- **Une question par écran sur mobile**, toutes les questions sur une page longue sur ordinateur (au choix de dev-vitrine), barre de progression textuelle (« Question 3 sur 10 »).
- **Accessibilité** : chaque question est un `fieldset` avec `legend`, réponses en boutons radio étiquetés, navigation au clavier, résultat annoncé par une zone `role="status"`, aucun score porté par la couleur seule.
- Chaque réponse vaut **0 à 3 points**. Total sur **30**. La réponse « Je ne sais pas » vaut 0 : ne pas savoir est précisément le constat.

## 2. Les 10 questions

Consigne d'introduction : « Répondez pour votre structure telle qu'elle est aujourd'hui, pas telle qu'elle devrait être. Il n'y a pas de bonne note à viser : le but est de savoir par où commencer. »

| # | Axe | Domaine (§ 4.2) | Question | 0 point | 1 point | 2 points | 3 points |
|---|---|---|---|---|---|---|---|
| 1 | Ce que vous avez | 2. Matériel | Avez-vous une liste à jour de votre matériel, acheté, loué ou en leasing (ordinateurs, téléphones, serveurs, copieurs), avec la personne qui utilise chaque appareil ? | Non, ou je ne sais pas | Une liste existe, mais elle n'est plus à jour ou oublie le matériel loué | Oui, mais c'est notre prestataire qui la tient | Oui, à jour, matériel loué compris, et nous y avons accès nous-mêmes |
| 2 | Ce que vous payez | 3. Licences et abonnements | Pourriez-vous lister vos licences et abonnements logiciels, avec leur coût annuel et la personne qui utilise chacun ? | Non, ou je ne sais pas | En partie : les principaux, sans savoir qui les utilise | Oui, mais il faudrait plusieurs heures pour reconstituer la liste | Oui, en quelques minutes, avec l'utilisateur de chaque licence |
| 3 | Ce qui arrive à échéance | 1. Contrats et fournisseurs | Connaissez-vous, pour chacun de vos contrats informatiques (maintenance, infogérance, copieurs, téléphonie, hébergement, logiciels), la date limite pour le résilier avant qu'il ne se reconduise ? | Non, ou je ne sais pas | Pour un ou deux contrats seulement | Pour la plupart, mais sans rappel organisé | Oui, pour tous, avec un rappel avant chaque date limite |
| 4 | Continuité | 6. Arrivées et départs | Quand une personne arrive ou part, savez-vous en une fois ce qu'elle a ou doit avoir : son matériel, ses comptes, ses licences et ses accès ? | Non, ou je ne sais pas | Nous le reconstituons de mémoire, au cas par cas | Nous suivons une liste générique, la même pour tout le monde | Oui : une liste propre à la personne, avec qui fait quoi, cochée et datée |
| 5 | Ce que vous avez | 4. Comptes et accès | Savez-vous qui a accès à quoi (messagerie, logiciels, dossiers partagés, comptes administrateur), et qu'aucun compte d'une personne partie n'est resté actif ? | Je ne sais pas | En partie : nous le découvrons quand un problème se pose | Oui pour les comptes courants, pas pour les comptes administrateur | Oui : c'est écrit, et vérifié au moins à chaque départ |
| 6 | Ce que vous avez | 5. Domaines et certificats | Savez-vous quand expirent vos noms de domaine et les certificats de votre site, à quel compte ils sont rattachés et qui en détient l'accès administrateur ? | Je ne sais pas | Seul notre prestataire ou une personne le sait, sans trace chez nous | Nous savons qui s'en occupe, mais les dates et les accès ne sont pas notés chez nous | Oui : dates, compte et accès notés chez nous, avec un rappel avant chaque expiration |
| 7 | Continuité | 5. Sauvegardes | Une restauration de vos sauvegardes a-t-elle été testée au cours des 12 derniers mois ? | Je ne sais pas s'il existe des sauvegardes | Il existe des sauvegardes, jamais testées à ma connaissance | Notre prestataire dit les tester, sans compte rendu écrit | Oui, avec un compte rendu écrit |
| 8 | Ce que vous payez | Synthèse : coût du SI | Si votre CA, un financeur, un assureur ou un client vous demandait demain le coût annuel de votre informatique (matériel acheté ou loué, licences, prestataires, télécoms), combien de temps vous faudrait-il pour répondre ? | Je ne saurais pas répondre | Plusieurs semaines, pour un ordre de grandeur | Quelques jours, en reconstituant depuis la comptabilité | Moins d'une journée : il est suivi au moins une fois par an |
| 9 | Ce qui arrive à échéance | 2. Matériel | Connaissez-vous les dates de fin de garantie de votre matériel et, pour le matériel loué ou en leasing, la date de fin de location et ce qu'il faudra rendre ? | Non, ou je ne sais pas | Pour un ou deux appareils ou contrats de location seulement | Pour la plupart, mais sans rappel organisé | Oui, avec un rappel avant chaque fin de garantie ou de location |
| 10 | Continuité | 1. Contrats et fournisseurs | Si votre prestataire ou votre référent informatique s'arrêtait demain, sauriez-vous récupérer vos données, vos accès et la documentation de votre informatique ? | Non, ou je ne sais pas | Difficilement : tout est chez lui ou dans sa tête | En partie : le contrat prévoit la sortie, mais la documentation n'est pas chez nous | Oui : la documentation et les accès sont chez nous, et la sortie est écrite dans le contrat |

**Répartition par domaine** : contrats et fournisseurs 2 (q. 3, 10) ; matériel acheté ou loué 2 (q. 1, 9) ; licences et abonnements 1 (q. 2) ; comptes et accès 1 (q. 5) ; domaines, certificats et sauvegardes 2 (q. 6, 7) ; arrivées et départs 1 (q. 4) ; coût total, ligne de synthèse de la plateforme, 1 (q. 8, qui couvre aussi les licences et le matériel loué). Aucune fonction P2 n'est évoquée (lignes téléphoniques, revue des accès, décision de renouvellement).

Aide affichée sous la question 9 : « Si vous n'avez aucun matériel loué, répondez pour les fins de garantie. »
Version ESS (`?public=ess`), question 8 : remplacer « un assureur ou un client » par « l'ARS ou votre commissaire aux comptes ».

**Pourquoi ces questions** (texte court affiché dans le résultat, question par question, pour chaque réponse à 0 ou 1 point) :
1. Sans liste, impossible de savoir ce qui doit être renouvelé, assuré ou rendu, au départ d'un salarié comme à la fin d'une location.
2. Les abonnements pris par carte bancaire se cumulent sans que personne ne les voie, et une licence sans utilisateur continue d'être payée.
3. Un préavis manqué, c'est un contrat reconduit sans que personne l'ait décidé.
4. Si rien n'est relié à la personne, chaque arrivée et chaque départ se refait de mémoire : c'est là que se glissent les oublis.
5. Un compte resté ouvert après un départ est un accès que plus personne ne surveille.
6. Un nom de domaine qui expire peut arrêter votre site et votre messagerie ; sans ses accès, vous dépendez d'une personne pour reprendre la main.
7. Une sauvegarde jamais restaurée est une promesse, pas une garantie.
8. Sans coût total, impossible d'arbitrer, de comparer avec un poste interne ou un autre prestataire, ni de répondre à votre CA ou à vos financeurs.
9. Une fin de location qui passe inaperçue, c'est une location qui se prolonge sans décision, ou un appareil à retrouver au dernier moment pour le rendre.
10. Ce qui n'est pas écrit chez vous part avec la personne ou le prestataire qui le détenait.

## 3. Barème

**Score global** : somme des 10 réponses, de 0 à 30.

**Score par axe** (affiché en barres avec la valeur en texte, par exemple « 4 sur 9 ») :

| Axe | Questions (v1.2) | Maximum |
|---|---|---|
| Ce que vous avez | 1 matériel, 5 comptes et accès, 6 domaines et certificats | 9 |
| Ce que vous payez | 2 licences et abonnements, 8 coût total | 6 |
| Ce qui arrive à échéance | 3 contrats, 9 fins de garantie et de location | 6 |
| Continuité | 4 arrivées et départs, 7 sauvegardes, 10 prestataire ou référent | 9 |

Numéros de questions par axe inchangés depuis la v1.0 : le calcul (`assets/autodiagnostic.js`, `lib/Autodiag.php`) n'a pas à changer.

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

Noms et seuils des profils inchangés ; constats et actions 2 et 3 revus en v1.2 pour parcourir les 6 domaines (chaque domaine apparaît au moins une fois dans les actions des quatre profils réunis).

### 0 à 9 : Informatique en boîte noire
**Constat :** « Aujourd'hui, la carte de votre informatique n'est pas entre vos mains : elle tient dans une tête, chez un prestataire, ou nulle part. Cela se corrige par étapes, en commençant par une seule liste. »
**Trois actions ce mois-ci :**
1. *(selon l'axe prioritaire, voir ci-dessous)*
2. Demandez à votre prestataire, ou à votre référent, la liste écrite de ce qu'il gère pour vous : contrats, matériel acheté ou loué, licences, comptes, noms de domaine et sauvegardes.
3. Ouvrez un tableau avec une ligne par personne : son matériel, ses comptes, ses licences. Ajoutez un onglet pour vos contrats, avec leur date limite de résiliation.

### 10 à 17 : Pénombre
**Constat :** « Vous avez des morceaux de la carte, mais ils sont dispersés ou dépendent d'une personne. Le plus gros du travail est de les rassembler au même endroit, chez vous, et de relier chaque élément à quelqu'un. »
**Trois actions ce mois-ci :**
1. *(selon l'axe prioritaire)*
2. Rassemblez vos contrats informatiques et vos contrats de location de matériel dans un seul dossier, et notez pour chacun sa date limite de résiliation ou de fin de location.
3. Comparez la liste de vos licences à celle de votre personnel : repérez les licences qui n'ont plus d'utilisateur.

### 18 à 24 : Carte à compléter
**Constat :** « L'essentiel est connu. Ce qui manque, c'est surtout la mise à jour dans le temps et des rappels avant les échéances : fins de contrat, de location et de garantie, expirations de noms de domaine. »
**Trois actions ce mois-ci :**
1. *(selon l'axe prioritaire)*
2. Mettez un rappel deux mois avant chaque date limite de résiliation, chaque fin de location et chaque expiration de nom de domaine.
3. Avant la prochaine arrivée ou le prochain départ, préparez la liste à partir de ce que la personne a réellement : matériel, comptes, licences, accès.

### 25 à 30 : Bien éclairé
**Constat :** « Votre informatique est lisible et documentée. L'enjeu est de le rester : quand les personnes changent, quand les outils s'ajoutent, quand les contrats arrivent à échéance. »
**Trois actions ce mois-ci :**
1. *(selon l'axe prioritaire, s'il reste un axe sous 70 %)* ; sinon : vérifiez que la documentation ne dépend pas d'une seule personne.
2. Testez une restauration de sauvegarde, gardez le compte rendu, et vérifiez les dates d'expiration de vos noms de domaine et certificats.
3. Pour aller plus loin sur la sécurité, faites le diagnostic gratuit MonAideCyber.

« Deux mois avant » est un conseil de bon sens, pas une donnée.

### Première action selon l'axe prioritaire
Inchangée (texte aussi utilisé par `lib/Autodiag.php` pour l'email de suite) :
- **Ce que vous avez** : « Faites la liste de vos comptes administrateur (messagerie, nom de domaine, site, sauvegardes) et de qui les détient. Rangez-la en lieu sûr, accessible à la direction. »
- **Ce que vous payez** : « Exportez de votre comptabilité les dépenses informatiques des 12 derniers mois et classez-les : matériel, logiciels, prestataires, télécoms. »
- **Ce qui arrive à échéance** : « Listez vos cinq plus gros contrats informatiques avec leur date de préavis, et mettez un rappel deux mois avant chacune. »
- **Continuité** : « Bloquez une heure avec votre référent ou votre prestataire pour écrire ensemble ce que vous avez, ce que vous payez et ce qui arrive à échéance. »

### Renvoi cyber (affiché pour tous les profils)
« Cet autodiagnostic ne remplace pas un diagnostic de cybersécurité. Pour cela, des dispositifs publics gratuits existent, dont MonAideCyber et Cybermalveillance.gouv.fr. » Lien de référence : https://www.economie.gouv.fr/entreprises/cybersecurite-des-dispositifs-publics-gratuits-pour-vous-accompagner (cité dans `1-analyse/jtbd.md` ; **revérifier le lien avant publication**).

## 5. Appel à l'action : la liste d'attente, puis l'essai à l'ouverture

Affiché sous le résultat, pour tous les profils (texte adapté au profil dans la première phrase). Avant l'ouverture, toute fonction s'écrit au futur ou avec « conçu pour » (plateforme v1.1, § 5 et § 10.6).

- Titre : **Passez du diagnostic à la carte**
- Texte (profils boîte noire et pénombre, v1.2) : « Lanternis est conçu pour tenir le registre de toute votre informatique, chaque élément relié à une personne : contrats et fournisseurs, matériel acheté ou loué, licences et abonnements, comptes et accès, domaines, certificats et sauvegardes. Vous saurez qui a quoi, ce que vous payez et ce qui arrive à échéance, et Lanternis vous préviendra avant. Il est en construction. Rejoignez la liste d'attente : à l'ouverture, vous pourrez l'essayer un mois, gratuitement et sans carte bancaire. »
- Texte (profils carte à compléter et bien éclairé, v1.2) : « Vous avez déjà une bonne carte. Le plus difficile est de la garder à jour quand les personnes, le matériel, les licences et les contrats changent. Lanternis est conçu pour cela : il vous préviendra avant les échéances et, parce que tout est relié aux personnes, préparera chaque arrivée et chaque départ. Rejoignez la liste d'attente : à l'ouverture, un mois d'essai gratuit, sans carte bancaire. »
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
1. J+3 : « Votre premier pas : une ligne par personne » (v1.2 : matériel, comptes et licences de chaque personne, puis l'onglet des contrats avec leur date limite de résiliation, avec un exemple fictif).
2. J+10 : « Préavis : la date qui coûte un an » (repérer les dates de préavis de ses contrats ; renvoi vers l'article du blog quand il existera).
3. J+21 : « Quand votre référent part : la liste à faire avant son dernier jour » (contenu du futur article pilier) + rappel de la liste d'attente (essai d'un mois sans carte annoncé pour l'ouverture).

**Promotion (3 contenus, sans LinkedIn, décision du 2026-10-26)**
1. **Article du blog** (redacteur-blog-seo) : « Votre référent informatique part : la liste en trois colonnes à faire avant son départ », avec l'autodiagnostic en appel à l'action (sujet déjà maquetté page 13 de la charte).
2. **Posts Facebook** (page de la marque, si elle est ouverte) : posts 2, 3 et 4 de `marketing/facebook/posts-prelancement.md` (contrat reconduit, matériel loué, licences payées sans utilisateur, v1.2), légende qui renvoie vers l'autodiagnostic avec les paramètres UTM du post. (v1.2 : remplace le visuel « Votre responsable informatique part en juin », trop centré sur un départ, § 10.7.)
3. **Texte pour les relais ESS** (lettre d'information d'une CRESS ou d'une fédération, C4) : « Associations de 20 à 249 salariés : savez-vous qui a quoi, ce que vous payez et ce qui arrive à échéance ? Contrats, matériel acheté ou loué, licences, accès, sauvegardes : un autodiagnostic gratuit en 10 questions, résultat immédiat, sans inscription obligatoire. » Lien `autodiagnostic.html?public=ess&src=ess-relais`.

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
8. (v1.2) Libellés d'axes conservés pour ne pas toucher au calcul ni à `lib/Autodiag.php` ; « Ce que vous avez » pourrait devenir « Qui a quoi » (promesse § 4) : changement à faire en même temps dans le JS, le PHP et ce fichier. La valeur `douleur` déduite de l'axe `continuite` reste `depart-referent`, alors que l'axe couvre désormais aussi arrivées et départs et sauvegardes : à revoir avec cro-conversion si l'analyse des inscrits en dépend.
9. (v1.2) Page servie : le titre et le texte du bloc d'échange (« Faites le point en 30 minutes avec un spécialiste du SI », textes du JS) datent d'avant la v1.1 et ne suivent pas encore le § 5 (entretien d'étude) : non modifiés ici, à aligner.
10. (v1.2) Les résultats déjà enregistrés avant cette version (champ `reponses`) ne sont pas comparables question par question avec les nouveaux.
