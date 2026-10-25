# Mode d'emploi du SaaS Studio

Ce document explique, simplement, comment utiliser ton studio au quotidien. Garde-le sous la main les premières semaines ; ensuite, l'aide-mémoire de la fin suffira.

---

## 1. Le principe en 30 secondes

Imagine une **agence** complète installée dans un dossier de ton ordinateur :

- **Toi**, tu es le client et le décideur.
- **Claude** est le **directeur de l'agence**. C'est le seul à qui tu parles.
- Derrière lui, **37 spécialistes** (les *agents*) : analyste marché, juriste, directeur artistique, développeurs, rédacteur LinkedIn, expert SEO… Le directeur leur confie le travail. Tu ne leur parles jamais directement.
- Chaque spécialiste a des **fiches méthode** (les *skills*) : « comment on écrit un article SEO », « comment on déploie sur le VPS »… Ils les ouvrent quand ils en ont besoin.
- Pour lancer une étape, tu tapes une **commande** (`/idee`, `/marche`, `/article`…) ou tu parles normalement.

Tout ce que l'agence produit (études, textes, code) est rangé dans des fichiers, dans le dossier. Rien ne se perd entre deux sessions.

---

## 2. Ce qu'il y a dans le dossier

```
saas-studio/
├─ MODE-EMPLOI.md       ← ce fichier
├─ CLAUDE.md            ← le règlement de l'agence (process, règles, stack, grille de décision)
├─ SOCIETE.md           ← les infos légales d'Hasteria (à remplir une fois)
├─ INFRA.md             ← ton infrastructure (VPS, o2switch, domaines, GitHub, Stripe, Mailjet)
├─ PORTEFEUILLE.md      ← le tableau de bord de toutes tes idées de SaaS
├─ _modele-venture/     ← le modèle copié pour chaque nouvelle idée (n'y touche pas, sauf voix-fondateur.md)
├─ ventures/            ← un sous-dossier par idée de SaaS
│   └─ mon-saas/
│       ├─ STATUT.md    ← où en est cette idée (la page la plus utile à lire)
│       ├─ 0-idee/ 1-analyse/ 2-marche/ 3-bilan/ 4-decision/ 5-cadrage/
│       ├─ marque/      ← nom, ton de voix, messages, charte graphique et logo (marque/charte/)
│       ├─ marketing/   ← articles, posts LinkedIn, emails, campagnes, rapports
│       ├─ livrables/   ← PDF, Word, Excel, présentations, captures d'écran, briefs pour l'appli Claude
│       ├─ produit/     ← le code (créé seulement après ton GO)
│       └─ exploitation/← support, métriques
├─ outils/documents/    ← la boîte à outils Docker qui fabrique PDF, captures, Word, Excel
└─ .claude/             ← la « machinerie » : agents, skills, commandes, réglages
```

**Les 3 fichiers que tu liras vraiment** : `PORTEFEUILLE.md` (vue d'ensemble), le `STATUT.md` de chaque idée, et ce mode d'emploi.

---

## 3. Installation (une seule fois, environ 30 minutes)

### Étape 1 — Vérifier les outils sur ton PC
Il te faut : Docker Desktop, Git, Node.js LTS, la CLI GitHub (`gh`). Si tu as un doute, ouvre Claude Code dans le dossier et dis simplement : *« Vérifie que mon poste a tout ce qu'il faut pour le studio. »* Il te dira ce qui manque.

Une seule action manuelle obligatoire : connecter la CLI GitHub à ton compte. Dans un terminal :
```
gh auth login
```

### Étape 2 — Ouvrir le studio dans Claude Code
- **Appli Claude desktop** : onglet Code → nouvelle session → sélectionne le dossier `saas-studio`.
- **Ou terminal** : `cd saas-studio` puis `claude`.

### Étape 3 — Créer le dépôt GitHub
Dis à Claude : *« Initialise le dépôt Git et crée un dépôt GitHub privé nommé saas-studio. »*
Il fait tout (il te demandera juste de confirmer la création). À partir de là, **tu ne touches plus jamais à Git** : Claude commit, pousse, ouvre et fusionne les PR lui-même.

Bonus : une fois sur GitHub, tu peux aussi ouvrir le studio depuis claude.ai ou ton téléphone en sélectionnant ce dépôt.

### Étape 4 — Remplir les deux fichiers « toi »
1. **`SOCIETE.md`** : SIREN, siège, capital, n° TVA, régime de TVA d'Hasteria. Sert pour les mentions légales, les CGV et les factures.
2. **`_modele-venture/marque/voix-fondateur.md`** : colle 3 à 5 de tes vrais posts LinkedIn et ce que tu aimes/n'aimes pas. Sans ça, les posts signés de ton nom sonneront « génériques ».

### Étape 5 — Vérifier
Tape `/statut`. Claude confirme que les agents, skills et commandes sont chargés et affiche le portefeuille (vide).

---

## 4. Le parcours d'une idée, étape par étape

| Étape | Tu tapes | Ce que fait le studio | Ce que tu fais |
|---|---|---|---|
| **0. Idée** | `/idee un outil qui…` | Crée le dossier, formalise l'idée (problème, cible, promesse), liste les hypothèses risquées | Réponds à 1 à 3 questions |
| **1. Analyse** | `/analyse mon-saas` | Pré-mortem (« pourquoi ça échouerait ? »), faisabilité technique, premier modèle de revenus | Lis la synthèse |
| **2. Marché** | `/marche mon-saas` | Recherche web : taille du marché, concurrents, prix, personas, signaux de demande — tout est sourcé | Vérifie les hypothèses qui te semblent fausses |
| **2b. Pré-lancement** | `/prelancement mon-saas` | Plateforme de marque v0, identité visuelle légère (logo provisoire, couleurs), landing de validation + liste d'attente, 6 posts « build in public », 2 articles, emails, liste de prospects pour des entretiens | **Publies** (ou valides la publication), fais quelques entretiens clients, note les résultats |
| **3. Bilan** | `/bilan mon-saas` | Business model, prévisionnel 36 mois, score sur 100 | Lis le score et les hypothèses fragiles |
| **4. Décision** | `/decision mon-saas` | Mémo d'une page : GO / NO-GO / PIVOT recommandé… **puis il s'arrête** | **Tu décides** : réponds « GO », « NO-GO » ou « PIVOT » |
| **5. Cadrage** | `/lancer mon-saas` | Backlog, règles métier, identité visuelle complète (pistes → logo → charte), maquettes haute fidélité, prototype cliquable, marque finale, architecture, squelette du code qui tourne, plan marketing, premiers documents légaux | Choisis la piste créative et le logo, valides les maquettes, le choix mobile et les plans tarifaires |
| **6. Construction** | `/feature mon-saas inscription des équipes` | Pour chaque fonctionnalité : spec → code → tests → PR → CI → fusion → annonce marketing | Testes en recette quand il te le propose |
| **7. Qualité** | `/qualite mon-saas` | Tests, sécurité, RGPD, accessibilité, éco-conception, SEO | Lis les points bloquants |
| **8. Mise en ligne** | `/deployer mon-saas` | Checklist complète, puis **demande ton accord** | **Tu dis oui** → il déploie |
| **9. Lancement** | `/lancement mon-saas` | Plan de lancement daté + tous les contenus (articles, posts, emails, communiqué, campagne test) | Valides et publies |
| **10. Croissance** | `/calendrier`, `/article`, `/linkedin`, `/rapport`… | La vie marketing et produit au quotidien | Une heure par semaine (voir §7) |

Tu n'es pas obligé de tout faire d'une traite : une idée peut rester des semaines en phase 2 pendant que tu en étudies une autre.

---

## 5. Exemple concret

> **Toi :** `/idee un outil qui aide les petites associations à suivre leurs subventions et leurs échéances de justificatifs`
>
> **Claude :** crée `ventures/suivi-subventions/`, rédige la fiche idée et le lean canvas, puis : « Trois questions : la cible, ce sont plutôt les associations employeuses ou les bénévoles ? Elles utilisent quoi aujourd'hui ? Tu as un réseau dans ce secteur ? »
>
> **Toi :** tu réponds en deux lignes.
>
> **Toi :** `/marche suivi-subventions`
>
> **Claude :** lance en parallèle l'analyste marché et l'analyste concurrence, puis le stratège marketing. 15 minutes plus tard : « 8 concurrents identifiés, dont 3 très orientés grandes structures. Les avis clients se plaignent surtout de la complexité et du prix. Marché estimé à … (sources). Canaux d'acquisition les plus crédibles : réseaux d'accompagnement associatif et LinkedIn. Je te conseille `/prelancement` pour tester la demande avant d'aller plus loin. »

Et ainsi de suite. Tu peux aussi parler sans commande : *« On en est où sur suivi-subventions ? »*, *« Écris-moi 3 posts LinkedIn sur les erreurs de justification de subvention »*, *« Le score te paraît trop optimiste, refais-le en scénario prudent. »*

---

## 6. Tes moments de décision (le studio s'arrête et t'attend)

Le studio est autonome **sauf** à ces moments, où il te demande toujours ton accord :

1. **GO / NO-GO** après `/decision`. Rien ne se construit sans ton GO écrit.
2. **Toute publication** : article, post, email, newsletter, communiqué. Tout est préparé en **brouillon** ; c'est toi qui publies (ou qui dis « publie »).
3. **Tout budget** : campagne publicitaire, achat.
4. **La production** : mise en ligne, modification du serveur ou des DNS.
5. **La création de comptes** : Stripe, Mailjet, domaine, dépôt de marque — Claude prépare tout, tu cliques.

Tout le reste (recherches, rédaction, code, tests, Git), il le fait seul.

---

## 7. Le marketing au quotidien (la routine qui fait vendre)

Une fois le SaaS lancé, la routine conseillée :

**Chaque début de mois (30 min)**
- `/rapport mon-saas` → ce qui a marché, ce qui n'a pas marché, 3 décisions.
- `/calendrier mon-saas` → le calendrier éditorial du mois. Puis : *« Produis tous les contenus de la semaine 1. »*

**Chaque semaine (30 min)**
- Relis et publie les contenus de la semaine (dossier `marketing/`).
- *« Produis les contenus de la semaine prochaine. »*

**À la demande**
- `/article mon-saas <sujet>` → un article SEO + 3 posts LinkedIn dérivés.
- `/linkedin mon-saas <sujet>` → posts avec 3 accroches au choix chacun.
- `/emailing mon-saas onboarding` → séquence d'emails.
- `/campagne mon-saas 50 démos ce trimestre` → campagne d'acquisition (budget plafonné, validé par toi).
- `/contenu mon-saas étude de cas <client>` → étude de cas, newsletter, lead magnet, communiqué…

Règle d'or : **un contenu de fond par semaine, décliné partout** (un article → posts, carrousel, newsletter, email).

---

## 8. Design, maquettes et documents

### L'identité visuelle de chaque marque
Le **directeur artistique** du studio crée l'identité de chaque SaaS, toujours en te laissant choisir :
1. `/charte mon-saas` → **2 à 3 pistes créatives** très différentes (palette, typographies, style, exemples d'application sur une landing, un post LinkedIn, un écran de l'app). Tu ouvres les planches dans ton navigateur et tu choisis — ou tu mixes (« la palette de la piste 2 avec la typo de la 1 »).
2. **3 propositions de logo** dans la piste retenue → tu choisis.
3. La **charte graphique complète** : logo et déclinaisons, couleurs, typographies, icônes, style d'images, règles d'usage, plus le favicon, les icônes d'app, l'avatar et la bannière LinkedIn, et des gabarits de visuels. Elle existe en page web et en PDF.

Tout le reste (l'application, la vitrine, les documents, les visuels) puise dans cette charte : la marque reste cohérente partout.

### Les maquettes
- `/maquettes mon-saas tableau de bord, inscription` → maquettes haute fidélité en HTML (bureau + mobile), contenu réaliste, que tu ouvres dans ton navigateur.
- `/maquettes mon-saas page d'accueil 3 propositions` → trois variantes pour comparer.
- `/maquettes mon-saas prototype du parcours d'inscription` → un **prototype cliquable** pour faire tester par de vrais utilisateurs avant de coder, avec le guide de test.
Un fichier `index.html` liste toutes les maquettes et leur statut.

### Les visuels marketing
`/visuels mon-saas posts de la semaine` → images de posts LinkedIn, carrousels (PDF), bannières, images d'articles, visuels publicitaires, captures annotées, aux couleurs de la marque, rangés dans `marketing/visuels/`.

### Les documents : deux façons de faire
Avec `/document mon-saas <document>`, Claude choisit la bonne méthode (et te le dit) :

**A. Le studio fabrique le fichier directement** — pour les documents qui se refont souvent : guide utilisateur, fiche « nouveautés », rapport mensuel, prévisionnel Excel, proposition commerciale type, CGV en PDF…
- PDF, Word, Excel ou PowerPoint, aux couleurs de la marque, rangés dans `livrables/`.
- Fabriqués par une petite boîte à outils Docker (`outils/documents`) : rien à installer sur Windows ; elle se construit toute seule la première fois.
- Exemples : `/document mon-saas guide-utilisateur pdf`, `/document mon-saas previsionnel excel`.

**B. Le studio prépare un brief, l'appli Claude réalise le document** — pour les documents ponctuels et soignés que tu veux retoucher à la souris ou partager par un lien : présentation commerciale, pitch, plaquette, dossier partenaire.
1. `/document mon-saas presentation-commerciale brief` → Claude crée `livrables/briefs/<date>-presentation-commerciale/` avec un `BRIEF.md` complet (objectif, charte, plan slide par slide, textes, chiffres) et un dossier `images/` (captures d'écran, logo, visuels).
2. Tu ouvres l'**appli Claude** (le chat), tu joins `BRIEF.md` et les images, et tu écris : *« Réalise ce document. »*
3. Tu retouches dans l'éditeur de l'appli, tu exportes en PDF ou PowerPoint, et si tu veux l'archiver, tu déposes l'export dans `livrables/`.

### Les captures d'écran
`/captures mon-saas tableau de bord et facturation` → Claude lance l'application avec un compte de démonstration (jamais de vraies données clients), la parcourt et capture les écrans en version bureau et mobile. Elles servent au guide utilisateur, aux briefs, aux articles, aux posts et aux fiches des stores. À chaque nouvelle version, les captures du guide sont refaites automatiquement.

---

## 9. Git : ce que Claude fait pour toi

Tu ne tapes **aucune** commande Git. Claude :
- **commit et pousse** à la fin de chaque commande (études, contenus, statuts) ;
- pour le **code**, crée une branche par fonctionnalité, ouvre une **pull request** sur GitHub, attend que la **CI** (les tests automatiques) passe au vert, corrige si besoin, puis **fusionne** et nettoie ;
- crée les **versions** (tags + releases GitHub) à chaque mise en production.

Ce qu'il ne fera jamais : forcer un push, réécrire l'historique, fusionner avec des tests en échec, committer un secret. Il ne lit pas non plus tes fichiers de secrets (`.env.local`) : c'est toi qui y mets tes clés Stripe/Mailjet.

Tu peux suivre tout ça sur GitHub (onglets *Pull requests* et *Actions*) si tu en as envie — mais ce n'est pas nécessaire.

---

## 10. Reprendre le travail d'une session à l'autre

Claude ne se souvient pas de la conversation précédente, **mais tout est dans les fichiers**. Pour reprendre :

- `/statut` → le portefeuille de toutes les idées.
- `/statut mon-saas` → où en est cette idée et la prochaine commande conseillée.

Astuce : **une session par grande tâche**. Quand une session devient très longue (beaucoup d'échanges), ouvre-en une nouvelle et tape `/statut mon-saas` : Claude repart proprement.

---

## 11. Bonnes pratiques

- **Une seule idée en construction à la fois.** Les autres peuvent rester en étude. `/portefeuille` t'aide à arbitrer.
- **Vérifie les hypothèses avant de dire GO.** Les chiffres sont sourcés ou marqués « hypothèse » ; ce sont les hypothèses qui font les mauvaises surprises.
- **Teste la demande avant de coder.** Le pré-lancement (landing + liste d'attente + entretiens) coûte quelques jours et peut t'éviter des mois de développement inutile.
- **Personnalise `CLAUDE.md`** quand une règle ne te convient pas (grille de décision, stack, ton) : c'est le règlement de l'agence, il s'applique à tout.
- **Dis-le quand ça ne te plaît pas.** *« Trop corporate, réécris plus direct »*, *« Ce concurrent n'en est pas un »* : il corrige et applique pour la suite.

---

## 12. Questions fréquentes

**Je dois utiliser les commandes ou je peux parler normalement ?**
Les deux. Les commandes garantissent que toutes les étapes sont faites dans l'ordre ; le langage naturel est parfait pour les demandes ponctuelles.

**Je peux sauter une étape ?**
Oui, sauf la décision GO avant `/lancer`. Si tu sautes `/marche` ou `/prelancement`, le score de décision sera moins fiable, et Claude te le dira.

**Claude va publier sur LinkedIn ou envoyer des emails tout seul ?**
Non. Sans connecteur branché, il ne peut pas ; et même avec, les règles du studio lui imposent ta validation.

**Comment j'abandonne une idée ?**
Réponds « NO-GO » à la décision, ou dis *« Archive cette idée »*. Le dossier est conservé (on peut y revenir), il sort juste du portefeuille actif.

**Ça coûte cher en usage ?**
Les étapes avec beaucoup d'agents en parallèle (`/marche`, `/lancer`, `/lancement`) consomment le plus. Le reste est raisonnable. Si besoin, demande moins de livrables (« seulement l'étude de marché, pas les personas »).

**Le logo créé par le studio est-il « définitif » ?**
Il est original et utilisable tel quel pour lancer. Si la marque décolle, un graphiste peut l'affiner à partir de la charte. Le dépôt de marque (INPI) protège d'abord le nom.

**Où regarder les maquettes et les planches ?**
Ce sont des fichiers HTML : double-clique dessus, ils s'ouvrent dans ton navigateur. Les captures PNG sont à côté.

**Je peux ajouter un agent ou une skill ?**
Oui : *« Crée un agent spécialiste des appels d'offres publics »* ou *« Crée une skill pour nos devis »*. Claude écrit le fichier dans `.claude/`.

**Et si je veux changer de stack pour un SaaS précis ?**
Dis-le au moment de `/lancer` : l'architecte rédige un ADR (une décision d'architecture documentée) et s'adapte.

---

## 13. Aide-mémoire des commandes

**Le parcours**
| Commande | À quoi ça sert |
|---|---|
| `/idee <description>` | Créer une nouvelle idée |
| `/analyse <slug>` | Risques, faisabilité, premier modèle de revenus |
| `/marche <slug>` | Étude de marché, concurrence, prix, personas |
| `/prelancement <slug>` | Landing de validation, liste d'attente, premiers contenus |
| `/bilan <slug>` | Business model, prévisionnel, score |
| `/decision <slug>` | Mémo GO / NO-GO / PIVOT (attend ta réponse) |
| `/lancer <slug>` | Après un GO : cadrage, marque, architecture, squelette |
| `/feature <slug> <description>` | Une fonctionnalité de bout en bout |
| `/qualite <slug>` | Tests, sécurité, RGPD, accessibilité, SEO |
| `/deployer <slug>` | Mise en production (avec ton accord) |
| `/lancement <slug>` | Plan et contenus de lancement |

**Marketing et communication**
| Commande | À quoi ça sert |
|---|---|
| `/marque <slug>` | Plateforme de marque, ton de voix, noms |
| `/calendrier <slug> [mois]` | Calendrier éditorial du mois |
| `/article <slug> <sujet>` | Article de blog SEO + posts dérivés |
| `/linkedin <slug> <sujet>` | Posts LinkedIn (fondateur ou page) |
| `/emailing <slug> <type>` | Séquence d'emails |
| `/campagne <slug> <objectif>` | Campagne d'acquisition |
| `/contenu <slug> <type> <sujet>` | Tout autre contenu (newsletter, étude de cas, communiqué…) |

**Design et documents**
| Commande | À quoi ça sert |
|---|---|
| `/charte <slug>` | Pistes créatives, logo, charte graphique |
| `/maquettes <slug> <écrans>` | Maquettes, propositions, prototype cliquable |
| `/visuels <slug> <besoin>` | Visuels marketing (posts, carrousels, bannières, pubs) |
| `/document <slug> <document> [format\|brief]` | Un PDF, Word, Excel, PowerPoint, ou un brief pour l'appli Claude |
| `/captures <slug> <écrans>` | Captures d'écran de l'application |

**Pilotage**
| Commande | À quoi ça sert |
|---|---|
| `/statut [slug]` | Où on en est |
| `/portefeuille` | Arbitrer entre les idées |
| `/rapport <slug> [mois]` | Rapport mensuel produit + marketing |
