---
venture: lanternis
phase: 5 Cadrage · commande /charte, étape 3c : iconographie et illustrations
auteur: directeur-artistique
date: 2026-10-26
statut: version 1.0, à valider par le fondateur
skills: iconographie-illustrations, identite-visuelle
---

# Iconographie et illustrations Lanternis

Planche de référence : `planche-iconographie.html` (autonome, s'ouvre dans un navigateur). Source des couleurs : `../tokens.json`.

## 1. Règles de dessin des icônes

| Règle | Valeur |
|---|---|
| Grille | 24 × 24 unités (`viewBox="0 0 24 24"`), zone utile 20 × 20, marge interne 2 |
| Trait | 2 unités, uniforme ; il suit l'agrandissement (1,33 px à 16 px, 4 px à 48 px) |
| Terminaisons et jonctions | arrondies (`stroke-linecap` et `stroke-linejoin` : `round`) ; coins de rectangle en rayon 1,5 ou 2 |
| Remplissage | aucun (contour seul), sauf le point de lumière |
| Point de lumière | disque de rayon 2, sans trait, **réservé à `echeance` et `alerte`** (ce qui demande une décision) |
| Tailles | 16 px minimum, 20 px en tableau, 24 px par défaut, 32 px en liste, 48 px pour les pictos de la landing ; au-delà, une illustration |
| Zone cliquable | 44 × 44 px pour une icône seule cliquable |

### Usage de l'ambre

| Fond | Trait | Point de lumière | Contraste (seuil composant 3 : 1) |
|---|---|---|---|
| Papier `#FAF6EE`, blanc | nuit `#1B2330` | ambre profond `#8A5300` | trait 14,65 / 15,79 ; point 5,87 / 6,33 |
| Nuit `#1B2330` | papier `#FAF6EE` | ambre `#F2B24C` | trait 14,65 ; point 8,46 |
| Nuit douce `#2A3444` | papier `#FAF6EE` | ambre `#F2B24C` | trait 11,64 ; point 6,72 |

Rapports repris de `../tokens.json` (calcul WCAG 2.x à la main, **à recontrôler** avec l'analyseur de la revue design). Interdits : ambre vif sur fond clair (1,7 : 1), icône entièrement ambre, point de lumière décoratif sur une autre icône.

## 2. Fichiers

| Dossier / fichier | Contenu |
|---|---|
| `icones/*.svg` (20) | `tableau-de-bord`, `registre`, `actif`, `poste`, `licence`, `abonnement`, `contrat`, `fournisseur`, `echeance`, `alerte`, `arrivee`, `depart`, `acces`, `securite`, `sauvegarde`, `domaine`, `cout`, `export`, `import`, `parametres`. Environ 300 à 600 octets chacune (estimation, à mesurer). |
| `icones/sprite.svg` | Les 20 icônes en `<symbol id="lt-…">`, pour l'application et la vitrine |
| `illustrations/etat-vide.svg` | Registre ouvert aux pages blanches et lanterne : listes vides de l'application |
| `illustrations/onboarding.svg` | Un tableur devient un registre en trois colonnes : mise en place, landing, articles |
| `illustrations/erreur.svg` | Feuille déchirée éclairée par la lanterne : erreur d'import, page introuvable (ton posé, ni rouge ni point d'exclamation) |
| `planche-iconographie.html` | Planche : règles, jeu complet sur papier et sur nuit, tailles, exemple d'interface, illustrations dans les deux thèmes |
| `parcours-captures.json` | Capture PNG de la planche |

## 3. Intégration

**Sprite (recommandé dans l'application Symfony UX et la vitrine Astro)** : copier `icones/sprite.svg` dans les assets, servi depuis la même origine que la page.

```html
<svg class="icone" aria-hidden="true"><use href="/assets/icones/sprite.svg#lt-echeance"/></svg>
```
```css
.icone { width: 24px; height: 24px; color: inherit; }
[data-theme="nuit"] { --icone-lumiere: #F2B24C; } /* point de lumière sur fond sombre */
```
Le trait suit `currentColor` (donc la couleur du texte et le mode contraste élevé) ; le point de lumière lit `--icone-lumiere` (ambre profond par défaut).

**Fichier individuel** : chaque SVG porte `color="#1B2330"` pour s'afficher en nuit dans une balise `<img>`. En SVG inline, appliquer la couleur voulue par CSS (`color`) sur l'élément `svg`, ou retirer l'attribut `color` pour hériter du texte.

**Illustrations** : en SVG inline, les couleurs se règlent par variables (`--illu-trait`, `--illu-aplat`, `--illu-surface`, `--illu-interieur`). Thème nuit : `#FAF6EE`, `#2A3444`, `#1B2330`, `#2A3444`. Le foyer reste ambre `#F2B24C` dans tous les cas (toujours posé sur l'intérieur sombre de l'arche). En `<img>`, seule la version papier s'affiche : réservée aux fonds clairs.

## 4. Accessibilité

- Icône à côté d'un texte : `aria-hidden="true"`. Icône seule cliquable : `aria-label` explicite sur le bouton (« Exporter le registre (CSV) »).
- Jamais la couleur seule : chaque état a un mot (« Renouvellement dans 45 jours »). Une échéance est ambre (on prévient), pas brique (réservé à ce qui a échoué).
- Illustrations : décoratives quand un texte les accompagne (`alt=""` ou `aria-hidden`), sinon texte alternatif :
  - `etat-vide` : « Un registre ouvert aux pages encore blanches, à côté d'une petite lanterne allumée »
  - `onboarding` : « Un tableur devient un registre en trois colonnes, sous une petite lanterne allumée »
  - `erreur` : « Une feuille déchirée en bas, éclairée calmement par une petite lanterne »

## 5. Licences et originalité

Les 20 icônes et les 3 illustrations ont été **dessinées pour Lanternis** (tracés écrits à la main sur la grille) ; aucune bibliothèque ni aucun visuel tiers n'a été repris. Plusieurs pictogrammes sont des formes communes (calendrier, globe, bouclier, clé, cylindre de stockage) : leur tracé est propre à ce jeu, mais leur silhouette générique n'est pas protégeable par nous non plus. Neuf icônes reprennent les esquisses de la page 10 de la charte (registre, échéance, contrat, abonnement, accès, matériel devenu « poste », fournisseur, alerte, export), légèrement reprises (sol du fournisseur, anneau de l'alerte).

Le skill prévoit un fichier `marque/charte/licences.md` : **non créé ici** (consigne : écrire seulement dans `iconographie/` et `gabarits/`). À créer par l'orchestrateur avec : icônes et illustrations « création Lanternis, propriété d'Hasteria SASU » ; Fraunces « SIL OFL 1.1, à reconfirmer au téléchargement ». Si une bibliothèque libre complète un jour le jeu (par exemple Lucide, licence ISC, ou Tabler Icons, licence MIT : **licences à reconfirmer**), la consigner dans ce fichier et ne pas mélanger deux styles dans un même écran.

## 6. Capture PNG de la planche

Depuis `C:\saas-studio` :

```
docker compose -f outils/documents/compose.yaml run --rm docs python /outils/capture.py ventures/lanternis/marque/charte/iconographie/parcours-captures.json ventures/lanternis/marque/charte/iconographie/export
```
Sortie : `export/planche-iconographie-bureau.png` (pleine page, 2 560 px de large, facteur 2).

## 7. Points ouverts

- Rendu non vérifié visuellement (pas d'exécution possible lors de la rédaction) : contrôler la planche après capture, en particulier la lisibilité à 16 px de `licence`, `cout` et `parametres`.
- Test de compréhension des icônes `alerte` (petite lanterne) et `actif` (étiquette) auprès de 3 ou 4 utilisateurs de la cible : toujours les accompagner d'un libellé d'ici là.
- Poids des fichiers : estimations, à mesurer.
