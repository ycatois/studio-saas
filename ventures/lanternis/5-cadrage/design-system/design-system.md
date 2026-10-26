---
venture: lanternis
phase: 5 Cadrage (anticipé) · commande /charte, étape 4 : design system de l'application
auteur: ui-designer
date: 2026-10-26
statut: brouillon v0.1, à valider par le fondateur
skills: design-system, revue-design
source: marque/charte/tokens.json (v1.0, directeur-artistique)
---

# Design system de l'application Lanternis

Ce document décrit les composants de l'application web (Symfony UX : Twig, Turbo, Stimulus). Il **dérive** de la charte Veilleuse et ne la contredit pas.

| Fichier | Rôle |
|---|---|
| `design-system.md` (ce fichier) | Principes, règles d'usage, états, accessibilité, contenu rédactionnel |
| `components.css` | CSS des composants (38 Ko non compressé, 8 Ko en gzip), sans framework. Importe `../../marque/charte/tokens.css` |
| `demo.html` | Démonstration autonome : chaque composant en thème papier et en thème nuit, plus deux écrans d'exemple (« Tableau de bord », « Registre des actifs »). Données fictives |

Source de vérité des valeurs : `marque/charte/tokens.json`, traduit dans `marque/charte/tokens.css`. **Aucune valeur de couleur, de taille ou d'espacement n'est redéfinie ici** : les composants n'emploient que les rôles `--couleur-*` et les échelles `--taille-*`, `--espace-*`, `--rayon-*`. Les seules variables ajoutées (`--ds-*`) pointent vers la palette de la charte.

---

## 1. Principes

1. **Lisible par un dirigeant non technicien.** Un titre par écran, des mots du métier (« contrats », « licences », « accès », « arrivées et départs »), jamais de jargon (IAM, CMDB, SSO). Les montants sont en euros HT, chiffres tabulaires. Un écran se lit en cinq minutes ; le tableau de bord tient en 12 à 15 indicateurs au plus (plateforme de marque, § 4).
2. **Une alerte = une action.** Chaque alerte contient une phrase (le constat), une date ou un montant (la conséquence) et **un seul** bouton ou lien (l'action). Si deux actions sont possibles, l'action secondaire passe dans la fiche de l'élément. Chaque alerte peut expliquer « Pourquoi vous voyez ceci » (valeur Transparence).
3. **Posé, jamais alarmiste.** Une échéance est en ambre, jamais en rouge. La couleur d'erreur (brique ou corail) est réservée aux vrais échecs : sauvegarde en échec, connexion interrompue, saisie invalide. Pas de clignotement, pas de point d'exclamation, pas de compteur qui s'affole.
4. **Sobriété.** Polices système pour l'interface (Fraunces seulement pour les titres), pictogrammes SVG en ligne, aucun framework CSS, aucune ressource tierce. Les éléments natifs du navigateur sont préférés : `<dialog>`, `<details>`, `<select>`, `<table>`. Le JavaScript (contrôleurs Stimulus) ne sert qu'aux onglets, au tri, aux toasts et au menu replié.
5. **Accessible par construction (RGAA 4.1, niveau AA visé).** Focus visible partout, cibles de 44 × 44 px, information jamais portée par la seule couleur, thème sombre et couleurs forcées respectés.

---

## 2. Fondations (référence, sans duplication)

Toutes les valeurs sont dans `marque/charte/tokens.css`. Rappel des règles d'emploi dans l'application :

| Fondation | Variables | Règle dans l'application |
|---|---|---|
| Couleurs | `--couleur-fond`, `--couleur-surface`, `--couleur-texte`, `--couleur-texte-secondaire`, `--couleur-accent`, `--couleur-mise-en-avant`, `--couleur-bouton-*`, `--couleur-trait`, `--couleur-filet`, `--couleur-focus`, `--couleur-succes/alerte/erreur/info` | N'utiliser **que les rôles** dans les composants, jamais `--lt-*` (sauf dans le bloc de thème). `--couleur-trait` pour toute bordure porteuse de sens (champ, case) ; `--couleur-filet` seulement pour les séparateurs décoratifs |
| Thèmes | `:root` (papier), `[data-theme="nuit"]`, `prefers-color-scheme: dark` | Papier par défaut. Nuit si l'utilisateur le choisit ou si son système est en mode sombre. L'en-tête d'application est toujours nuit (`data-theme="nuit"` posé sur l'en-tête) |
| Typographie | `--police-titre`, `--police-texte`, `--police-mono`, `--taille-xs` à `--taille-5xl` | Texte courant 16 px ; tableaux et interface dense 14 px ; 13 px minimum absolu. Fraunces : h1 à h3 et titre de bandeau de marque seulement, jamais dans un bouton, un tableau ou une valeur d'indicateur |
| Espacements | `--espace-1` (4 px) à `--espace-9` (96 px) | Marges internes des cartes : `--espace-5` ; entre blocs : `--espace-5` à `--espace-8` |
| Rayons | `--rayon-s` à `--rayon-rond` | s : badges, cases ; m : boutons, champs, alertes ; l : cartes, tableaux, modale ; xl : bandeau de marque |
| Ombres | `--ombre-1`, `--ombre-2` | Filet de préférence. `--ombre-2` seulement pour la modale et les toasts (en thème nuit, devient un filet) |
| Mouvement | `--duree-courte`, `--duree-moyenne`, `--courbe` | Ramenées à 0 par `prefers-reduced-motion` ; les animations continues (roue, squelette) ne tournent que sous `prefers-reduced-motion: no-preference` |
| Icônes | règle `icone` de la charte | Contour, trait 2 px, grille 24 px, point de lumière en `--couleur-accent`. Classe `ds-icone` (24 px) ou `ds-icone--petite` (20 px) |
| Logo | `marque/charte/logo/` | En-tête : `logo-horizontal-nuit.svg` à 140 px de large (minimum 120 px). Favicon : `favicon.svg` |

### 2.1 Variables propres aux composants

| Variable | Papier | Nuit | Pourquoi |
|---|---|---|---|
| `--ds-bouton-survol` | nuit douce | ambre pâle | Survol du bouton principal (texte 11,6 : 1 et 13,5 : 1) |
| `--ds-champ-fond` | blanc | nuit | Un champ reste distinct d'une carte nuit douce (bordure 4,4 : 1) |
| `--ds-voile` | nuit à 60 % | idem | Fond derrière la modale |
| `--ds-cible` | 44 px | idem | Zone tactile minimale de la charte |
| `--ds-bord-etat` | 4 px | idem | Liseré gauche des alertes, toasts et indicateurs à traiter |

`components.css` réaffirme aussi le thème papier sur `[data-theme="papier"]` (pour un volet clair dans une page sombre), en ne référençant que la palette `--lt-*` de la charte.

### 2.2 Contrastes ajoutés par le design system

Calculés avec la formule de luminance relative WCAG 2.x (script, valeurs hexadécimales de la charte). Les autres couples sont ceux de `tokens.json > contrastes`.

| Couple | Rapport | Usage |
|---|---|---|
| Ambre profond sur ambre pâle | 5,39 : 1 | Badge d'échéance proche (≤ 30 j), texte des liens dans un bandeau |
| Ardoise sur ambre pâle | 6,71 : 1 | Texte secondaire dans un bandeau |
| Mousse / brique / lac sur ambre pâle | 5,43 / 5,96 / 6,82 : 1 | Badges dans un bandeau |
| Trait sur ambre pâle | 3,38 : 1 | Bordure de champ dans un bandeau (≥ 3 : 1) |
| Papier sur brique (bouton danger, papier) | 6,48 : 1 | Bouton « Retirer » |
| Nuit sur corail (bouton danger, nuit) | 6,50 : 1 | Idem en thème nuit |
| Nuit sur ambre pâle (survol bouton, nuit) | 13,46 : 1 | Survol du bouton principal |
| Mousse / brique / lac sur blanc | 6,37 / 6,99 / 8,01 : 1 | Badges et alertes sur carte |

**Écarté :** fond de survol `lin-nuit` en thème nuit (corail dessus : 3,98 : 1, insuffisant). Le survol d'une ligne de tableau utilise `--couleur-fond` (papier ou nuit), sur lequel tous les couples sont validés, plus un liseré d'accent de 3 px.

---

## 3. Composants

Convention de nommage : préfixe `ds-`, sous-élément `__`, variante `--` (exemple : `ds-alerte__titre`, `ds-bouton--secondaire`). Les états sont portés par des attributs HTML ou ARIA (`disabled`, `aria-invalid`, `aria-selected`, `aria-current`, `aria-busy`, `aria-sort`), pas par des classes : le style suit la sémantique.

### 3.1 Boutons — `ds-bouton`

| Variante | Classe | Usage |
|---|---|---|
| Principal | `ds-bouton` | **Une seule action principale par écran ou par bloc** (« Enregistrer », « Ajouter un élément ») |
| Secondaire | `ds-bouton--secondaire` | Actions d'appoint, action unique d'une alerte (« Décider », « Fermer les accès ») |
| Tertiaire | `ds-bouton--tertiaire` | Action discrète, aspect de lien (« Plus tard », « Annuler » dans un toast) |
| Danger | `ds-bouton--danger` | Action destructrice, toujours précédée d'une modale de confirmation |
| Icône seule | `ds-bouton-icone` | Fermer, menu. **`aria-label` obligatoire** |

États : repos, survol (fond `--ds-bouton-survol`), focus (anneau 3 px), actif (enfoncé de 1 px), désactivé (`disabled` ou `aria-disabled="true"` : fond transparent, bordure en **tirets**, texte secondaire), en cours (`aria-busy="true"` : roue + libellé au participe, « Enregistrement… »).

Règles : verbe à l'infinitif qui dit le résultat (« Retirer du registre », pas « Valider » ni « OK ») ; pas de bouton désactivé sans explication à côté (préférer laisser cliquer et afficher l'erreur) ; un lien qui navigue est un `<a>`, une action est un `<button>`.

### 3.2 Champs — `ds-champ`, `ds-saisie`

Structure : `ds-champ` > `label.ds-champ__libelle` > `p.ds-champ__aide` (facultatif) > `input.ds-saisie` > `p.ds-champ__erreur` (en cas d'erreur).
- Libellé toujours visible, au-dessus du champ, jamais remplacé par le texte indicatif (`placeholder` = exemple seulement).
- **Obligatoire par défaut** : le formulaire annonce en tête « Tous les champs sont obligatoires, sauf mention « facultatif » » et les champs facultatifs portent « (facultatif) » dans leur libellé. Attribut `required` sur les obligatoires.
- Aide et erreur reliées par `aria-describedby="<id-aide> <id-erreur>"`.
- États : repos (bordure trait, 1 px), survol (bordure texte), focus (anneau), erreur (`aria-invalid="true"` : bordure **2 px** brique ou corail + message), désactivé et lecture seule (bordure en tirets).
- Variantes : `ds-saisie-unite` (montant avec unité « € HT par an », chiffres alignés à droite), `ds-recherche` (loupe), `textarea.ds-saisie`.
- Taille de police 16 px dans les champs (évite le zoom forcé sur mobile). `autocomplete` renseigné pour les champs personnels (nom, email, téléphone : critère RGAA 11.13).

### 3.3 Sélecteurs — `ds-liste`

`<select>` natif enveloppé dans `div.ds-liste` (chevron en CSS, sans image). Première option vide et explicite (« Choisissez une catégorie ») si le choix est obligatoire. Au-delà d'une quinzaine d'options, prévoir un champ avec suggestions (composant à concevoir, hors v0.1).

### 3.4 Cases à cocher et boutons radio — `ds-case`

`<label class="ds-case"><input type="checkbox"> Libellé</label>` : la **zone cliquable est le libellé entier** (hauteur 44 px). Case de 22 px, bordure trait 2 px, cochée en couleur de bouton (nuit sur papier, ambre sur nuit) avec une coche dessinée. Groupe : `fieldset.ds-groupe` + `legend`. En mode couleurs forcées, les cases natives du système reprennent la main.
Variante `ds-segment` : choix exclusif court (thème, période), radios stylés en boutons.

### 3.5 Tableaux de registre — `ds-tableau`

- `<table>` avec `<caption>` (titre + ligne de contexte « Éléments 1 à 8 sur 214 »), `th scope="col"` et, pour la première colonne, `th scope="row"` (le nom de l'élément, lien vers sa fiche).
- Conteneur `ds-tableau-conteneur` avec `role="region"`, `aria-labelledby` (id du caption) et `tabindex="0"` : défilement horizontal au clavier sur petit écran. Variante `ds-tableau--fige` : première colonne figée.
- Montants : classe `ds-num` (alignés à droite, chiffres tabulaires), unité dans l'en-tête ou la légende (« Coûts annuels hors taxes ») plutôt que répétée.
- Tri : `<button class="ds-tri">` dans le `th`, état sur `aria-sort="ascending|descending"`, annonce polie (« Registre trié par coût annuel, ordre croissant »).
- Survol de ligne : fond `--couleur-fond` + liseré d'accent 3 px. Pas de ligne entièrement cliquable (un seul lien, le nom).
- **Six colonnes au plus** (charte : pas de tableau de 20 colonnes) ; le détail est dans la fiche.
- Barre d'outils au-dessus : `ds-barre-outils` (recherche, filtres, case « Seulement les éléments à traiter »). Bouton « Exporter en CSV » toujours présent (valeur Souveraineté).

### 3.6 Cartes d'indicateurs — `ds-indicateur`

Structure : `section.ds-indicateur` (`aria-labelledby` vers le titre) > `h4.ds-indicateur__libelle` (icône + libellé) > `p.ds-indicateur__valeur` (+ `ds-indicateur__unite`) > `p.ds-indicateur__contexte` > `p.ds-indicateur__action` (un lien).
- La valeur est en police système, 31 px, chiffres tabulaires (Fraunces interdite pour les chiffres d'interface).
- Le contexte traduit le chiffre en conséquence (« soit 1 176 € HT par an »).
- Variante `ds-indicateur--a-traiter` : liseré ambre de 4 px + libellé en couleur de texte pleine. Pas de couleur rouge ; si rien n'est à faire, le contexte le dit (« Rien à traiter ce mois-ci »).
- La carte n'est pas un lien géant : un seul lien d'action, libellé explicite hors contexte (« Voir les 7 licences », pas « Voir »).

Indicateurs de l'écran d'exemple : licences inutilisées, échéances à 30 jours, départs non traités, coût mensuel du SI.

### 3.7 Badges d'échéance et d'état — `ds-badge`

Texte court **toujours présent** ; la couleur et la forme de la pastille sont des indices supplémentaires (RGAA 3.1) :

| Variante | Pastille | Couleur | Exemples |
|---|---|---|---|
| `--echeance` | point plein | alerte (ambre) | « dans 45 j » |
| `--echeance` + `--echeance-proche` | point plein, fond ambre pâle | alerte | « dans 12 j » (≤ 30 jours) |
| `--alerte` | point plein | alerte | « À décider », « À récupérer » |
| `--succes` | coche | succès | « À jour » |
| `--erreur` | losange | erreur | « En échec », « dépassée de 3 j » |
| `--info` | anneau | info | « À vérifier » |
| `--neutre` | aucune | texte secondaire | « Archivé », « dans 8 mois » |

Seuils d'échéance proposés (à valider en cadrage produit) : ≤ 30 j proche ; 31 à 90 j échéance ; > 90 j neutre ; dépassée = erreur. Les abréviations (« j ») sont acceptables dans un tableau parce que la date complète est dans la même cellule. `ds-compteur` : petit compteur rond (onglets, navigation), avec `aria-label` si le nombre seul ne suffit pas.

### 3.8 Alertes — `ds-alerte`

Structure : icône (`aria-hidden`) > corps (`ds-alerte__titre`, `ds-alerte__texte`, `details.ds-alerte__pourquoi`) > `ds-alerte__action` (un bouton secondaire ou un lien).
- Variantes : `--alerte` (échéance, décision), `--succes`, `--erreur`, info par défaut. Liseré gauche de 4 px + icône propre à chaque état.
- Rôle ARIA : aucun pour une alerte présente au chargement ; `role="alert"` seulement pour une erreur qui apparaît après une action (import échoué) ; `role="status"` pour une confirmation qui apparaît.
- Liste d'alertes : `ul.ds-liste-alertes`, triées par date de décision.
- Mise en page souple (flex) : l'action passe sous le texte quand la place manque.

### 3.9 Bandeaux — `ds-bandeau`

Pleine largeur, en haut de page ou de section, pour une information qui concerne **tout l'écran** : fin d'essai, connexion interrompue, données d'exemple.
- Par défaut : fond `--couleur-mise-en-avant`. `--erreur` : liseré brique ou corail (connexion interrompue). Bouton de masquage `ds-bouton-icone` (« Masquer ce bandeau ») si l'information n'est pas bloquante.
- `--marque` (avec `data-theme="nuit"`) : message d'encouragement ou d'accueil, halo **en coin uniquement**, jamais derrière le texte (marge droite réservée), un seul par écran.
- Repère : `role="region"` + `aria-label`, ou `role="note"` pour un bandeau purement informatif.

### 3.10 Navigation — `ds-entete`, `ds-nav`, `ds-ariane`

- En-tête toujours sur fond nuit (`data-theme="nuit"`), logo horizontal nuit à 140 px, lien d'évitement `ds-evitement` (« Aller au contenu ») en tout premier.
- `nav aria-label="Menu principal"` ; lien actif : `aria-current="page"` + trait ambre de 3 px + graisse forte (trois indices).
- Cinq entrées au plus : Tableau de bord, Registre, Échéances, Rapports, Réglages (proposition, à confirmer par l'agent ux).
- Sous 960 px : menu replié derrière un bouton « Menu » (`aria-expanded`, `aria-controls`) ; lien actif signalé par un liseré gauche.
- Fil d'Ariane `nav.ds-ariane` dès le deuxième niveau (fiche d'un élément), dernier élément avec `aria-current="page"`.

### 3.11 Onglets — `ds-onglets`

Motif ARIA « tabs » : `role="tablist"` (avec `aria-label`), `role="tab"` + `aria-selected` + `aria-controls`, `role="tabpanel"` + `aria-labelledby` + `tabindex="0"`. Clavier : flèches gauche et droite, Début, Fin ; un seul onglet dans l'ordre de tabulation (`tabindex="-1"` sur les autres). Onglet actif : trait accent de 3 px + graisse forte. Compteur facultatif (`ds-compteur`).
Avec Turbo, si chaque onglet est une URL distincte (filtre du registre), utiliser plutôt une **navigation** (`nav` + liens + `aria-current`) que des onglets ARIA.

### 3.12 Modale — `ds-modale`

Élément natif `<dialog>` ouvert par `showModal()` : piège de focus, fermeture par Échap et fond inerte gérés par le navigateur. `aria-labelledby` (titre) et `aria-describedby` (texte). Titre sous forme de question (« Retirer les copieurs du registre ? »), texte qui dit la conséquence, deux boutons dont les libellés se suffisent : « Garder dans le registre » (secondaire, focus initial pour une action destructrice) et « Retirer du registre » (danger). Réservée aux confirmations et aux saisies courtes ; un formulaire long a sa propre page.

### 3.13 État vide — `ds-vide`

Petite illustration au trait (le symbole de la lanterne, aux couleurs du logo du thème), un titre qui constate (« Aucun contrat pour l'instant »), une phrase qui propose de l'aide (« … nous pouvons aussi le faire avec vous »), **une action principale** et au plus une secondaire (« Importer un fichier »). Un état vide après filtrage dit pourquoi et propose d'effacer les filtres.

### 3.14 Chargement — `ds-chargement`, `ds-roue`, `ds-squelette`

- Moins d'une seconde : rien. Au-delà : `ds-chargement` (roue + texte « Chargement du registre… ») dans un `role="status"`.
- Squelette `ds-squelette` pour un bloc dont la forme est connue, avec `aria-hidden="true"` et le texte de statut à côté. Zone en cours de rechargement : `aria-busy="true"`.
- Animations seulement si `prefers-reduced-motion: no-preference`.
- Avec Turbo : `turbo-frame[busy]` et `aria-busy` sont posés automatiquement ; s'appuyer dessus.

### 3.15 Pagination — `ds-pagination`

`nav aria-label="Pages du registre"`, texte de contexte (« Éléments 41 à 60 sur 214 »), liens de 44 × 44 px, page courante `aria-current="page"` (fond plein), « Précédent » et « Suivant » en toutes lettres (complétés pour les lecteurs d'écran : « Suivant : page 4 »), lien inactif en `aria-disabled="true"` (bordure en tirets), ellipse `aria-hidden`. 20 éléments par page par défaut (proposition).

### 3.16 Toasts — `ds-toasts`, `ds-toast`

- **Confirmations seulement** (« Élément ajouté au registre »). Une erreur n'est jamais un toast : elle s'affiche dans la page, à côté de ce qui l'a provoquée.
- Une seule région par page, présente dès le chargement : `div.ds-toasts aria-live="polite"`.
- Sans action : disparaît après 8 s au moins, **en pause** tant que la souris ou le focus est dessus, et peut être fermé. Avec une action (« Annuler ») : reste jusqu'à sa fermeture (critère WCAG 2.2.1).
- Bouton de fermeture « Fermer ce message ». En bas à droite (bas de l'écran sur mobile).

---

## 4. Accessibilité (RGAA 4.1, niveau AA visé)

| Exigence | Mise en œuvre | Critères RGAA |
|---|---|---|
| Focus visible | `:focus-visible` global : `outline` 3 px `--couleur-focus`, décalage 2 px (visible aussi en couleurs forcées) | 10.7 |
| Contrastes | Texte ≥ 4,5 : 1, composants et bordures porteuses ≥ 3 : 1 (charte + § 2.2) | 3.2, 3.3 |
| Couleur jamais seule | Badges : mot + forme ; erreurs de champ : bordure 2 px + message ; lien actif : trait + graisse + `aria-current` ; désactivé : tirets | 3.1 |
| Cibles | 44 × 44 px (`--ds-cible`) : boutons, liens de navigation, pagination, cases (via le libellé), `summary`, liens de première colonne | 13.x (WCAG 2.5.8 dépassé) |
| Structure | Titres hiérarchisés, `caption` + `scope` dans les tableaux, `fieldset`/`legend` pour les groupes, repères `header`/`nav`/`main` | 5.4, 5.6, 5.7, 9.1, 11.5, 12.6 |
| Formulaires | Libellé visible lié, aide et erreur par `aria-describedby`, `aria-invalid`, mention « facultatif », `autocomplete` | 11.1, 11.10, 11.13 |
| Messages d'état | `role="status"` (chargement, tri), `aria-live="polite"` (toasts), `role="alert"` (erreur après action) | 7.5 |
| Composants scriptés | Onglets ARIA avec clavier, `<dialog>` natif, `aria-expanded` sur le menu, `aria-sort` sur le tri | 7.1, 7.3 |
| Navigation | Lien d'évitement, `aria-current`, fil d'Ariane, ordre de tabulation = ordre visuel | 12.7, 12.8 |
| Mouvement | Durées à 0 et animations coupées si `prefers-reduced-motion` ; rien ne clignote | 13.8 |
| Thèmes | Papier, nuit, mode sombre du système, `forced-colors` (cases natives, soulignement des éléments actifs) | 3.x, 10.x |
| Zoom et recadrage | Unités `rem`, grilles fluides, texte à 200 % sans perte, tableau défilant au clavier | 10.4, 10.11 |
| Icônes | `aria-hidden="true"` à côté d'un texte ; `aria-label` sur le bouton si icône seule ; logo `alt` qui dit la destination | 1.1, 1.2 |

---

## 5. Contenu rédactionnel

Ton de la plateforme de marque (§ 10) : vouvoiement, phrases courtes, un chiffre vaut mieux qu'un adjectif, constat → conséquence → action, pas de peur.

### 5.1 Libellés

| Élément | On écrit | On n'écrit pas |
|---|---|---|
| Bouton principal | « Enregistrer l'élément », « Ajouter un contrat » | « Valider », « OK », « Soumettre » |
| Action d'alerte | « Décider », « Fermer les accès », « Voir les 7 licences » | « En savoir plus », « Cliquez ici » |
| Destruction | « Retirer du registre » / « Garder dans le registre » | « Supprimer ? Oui / Non » |
| Navigation | « Registre », « Échéances », « Arrivées et départs » | « Assets », « Offboarding », « CMDB » |
| Indicateur | « Licences inutilisées », « Coût mensuel du SI » | « Shadow IT », « TCO » |
| Badge | « dans 45 j », « À décider », « À jour » | « Critique », « URGENT », « !!! » |
| Explication | « Pourquoi vous voyez ceci » | « Détails techniques » |

Dates en toutes lettres dans les phrases (« le 24 novembre 2026 »), au format jj/mm/aaaa dans les tableaux. Montants : « 2 160 € HT par an », espace fine insécable (U+202F) avant € et entre les milliers.

### 5.2 Messages d'erreur

Règle : dire ce qui s'est passé, sans code ni reproche, puis ce qu'il faut faire ; proposer l'aide humaine quand c'est utile.

| Situation | Message |
|---|---|
| Champ obligatoire vide | « Indiquez le nom de l'élément, par exemple « Copieurs du 2e étage ». » |
| Date impossible | « Le 31 novembre n'existe pas. Indiquez une date réelle, par exemple 30/11/2026. » |
| Format de date | « Écrivez la date sous la forme jj/mm/aaaa, par exemple 24/11/2026. » |
| Montant | « Indiquez un montant en euros, sans lettres, par exemple 2 160. » |
| Email | « Cette adresse email semble incomplète. Exemple : nadia@structure.fr » |
| Import de fichier | « Nous n'avons pas pu lire ce fichier. Lanternis accepte les fichiers .xlsx et .csv. Vérifiez que la première ligne contient les titres des colonnes, ou envoyez-nous le fichier : nous l'importerons avec vous. » (plateforme de marque, § 10.5) |
| Connexion à un service | « La connexion à votre messagerie est interrompue depuis le 22 octobre. Les licences ne sont plus mises à jour. Reconnecter » |
| Erreur serveur | « Nous n'avons pas pu enregistrer vos modifications. Elles sont conservées sur cette page : réessayez dans un instant. Si cela recommence, écrivez-nous. » |
| Accès refusé | « Cette page est réservée aux administrateurs de votre structure. Demandez l'accès à Nadia, qui gère Lanternis chez vous. » |
| Récapitulatif de formulaire | En tête du formulaire, `role="alert"` : « 2 champs sont à corriger », liste de liens vers chaque champ. |

### 5.3 Confirmations et états vides

- Toast : « Élément ajouté au registre : Copieurs du 2e étage. » / « L'export CSV du registre est prêt : 214 lignes. »
- Succès durable : « Tous les accès de vos anciens salariés sont fermés. Dernière vérification le 26 octobre 2026. »
- État vide : « Aucun contrat pour l'instant. Ajoutez vos contrats un par un, ou importez votre tableau Excel : nous pouvons aussi le faire avec vous. »
- Filtre sans résultat : « Aucun élément ne correspond à « copieur » dans les contrats. Effacer les filtres »

---

## 6. Intégration dans Symfony UX (indications pour dev-web)

- Copier ou référencer `marque/charte/tokens.css` puis `components.css` dans `assets/styles/` (AssetMapper, sans bundler) ; corriger les chemins relatifs (`@import`, police Fraunces).
- Un composant Twig (`symfony/ux-twig-component`) par composant : `Bouton`, `Champ`, `Badge`, `Alerte`, `Indicateur`, `Tableau`, `Pagination`, `Modale`, `EtatVide`… Les attributs ARIA sont dans le gabarit, pas laissés à l'appelant.
- Contrôleurs Stimulus : `onglets`, `tri`, `toast`, `modale`, `menu`, `bandeau`. Le script de `demo.html` montre le comportement attendu (sans dépendance).
- Formulaires Symfony : thème de formulaire Twig qui produit `ds-champ` / `ds-saisie` / `ds-champ__erreur` et les `aria-describedby`.
- Messages flash Symfony → toasts (succès) ou alertes dans la page (erreurs).
- Choix du thème : `data-theme` sur `<html>` (papier, nuit ou absent = système), mémorisé côté serveur dans le profil (pas de cookie tiers).

---

## 7. Budget de poids (objectifs, à mesurer en recette)

| Ressource | Poids mesuré le 2026-10-26 | Objectif |
|---|---|---|
| `tokens.css` + `components.css` | 11 Ko + 38 Ko non compressés ; 4 Ko + 8 Ko en gzip (mesuré, non minifié) | ≤ 15 Ko compressés, CSS minifié en production |
| Police Fraunces | non déposée (`marque/charte/fonts/` vide) | ≤ 40 Ko (charte) |
| Icônes | sprite SVG en ligne, 2 Ko environ | pas de police d'icônes |
| JavaScript | script de démonstration < 7 Ko ; en production, Turbo + Stimulus (poids à mesurer) | ≤ 100 Ko transférés pour une page de l'application (hypothèse de travail) |
| `demo.html` | 50 Ko (page de démonstration, pas une page de production) | — |

---

## 8. Points ouverts et hypothèses

1. **Contrastes** : calculés par script sur les codes hexadécimaux, non mesurés dans un navigateur avec un outil (Colour Contrast Analyser ou analyseur de la revue design). À recontrôler, en particulier les badges sur ambre pâle et le bouton danger.
2. **Tests utilisateurs d'assistance** : non faits (NVDA + Firefox, VoiceOver + Safari, navigation clavier seule, zoom 200 %, mode contraste élevé de Windows). À programmer à la recette (agent accessibilite-ecoconception).
3. **Pictogrammes ajoutés** (info, succès, erreur, fermer, recherche, menu, plus, départ, coût) : dessinés selon les règles de la charte mais **non validés par le directeur-artistique**.
4. **Police Fraunces absente** : la démonstration s'affiche avec la police de repli (Georgia ou Palatino). Le rendu des titres est à revoir une fois le fichier woff2 déposé.
5. **Seuils d'échéance** (30 / 90 jours), **20 éléments par page**, **cinq entrées de navigation**, **délai des toasts (8 s)** : propositions à confirmer par product-owner et ux.
6. **Composants non couverts en v0.1** : champ avec suggestions (autocomplétion), sélecteur de date, téléversement de fichier, menu d'actions par ligne, graphiques (évolution du coût), fiche d'un élément. À ajouter au fil des maquettes.
7. **`:has()`** est utilisé pour griser le libellé d'une case désactivée : sans effet (sans gravité) sur les navigateurs anciens.
8. Les données de `demo.html` (structure, personnes, montants, dates) sont **entièrement fictives**.
