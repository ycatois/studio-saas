---
venture: lanternis
phase: 5 Cadrage · commande /charte, étape 3b : charte complète
auteur: directeur-artistique
date: 2026-10-26
statut: version 1.0, à valider par le fondateur
skills: logo, identite-visuelle
---

# Logo Lanternis : fichiers et règles d'usage

Logo retenu par le fondateur le 2026-10-26 : **proposition 1, « Lanterne-arche »** (piste Veilleuse). Les propositions d'origine restent dans `propositions/`, sans modification.

## 1. Ce qui a changé par rapport à la proposition 1

Le dessin reste le même (anneau, arche, socle, foyer ambre, lettrage monoline). Il a été affiné pour répondre aux risques notés sur la planche des propositions :

| Risque noté | Affinage | Effet |
|---|---|---|
| Lecture parasite « porte, niche, stèle » | L'**anneau ne touche plus l'arche** : il la chevauchait de 2 unités (sur 64), il en est maintenant séparé de 2,5 unités. Son trait passe de 5 à 4. | L'anneau se lit comme un anneau de suspension : une porte ou une stèle n'en ont pas. |
| Foyer un peu petit et décentré | Foyer agrandi (rayon 8 → 8,5) et placé au centre optique de l'arche. | La lumière domine l'intérieur sombre. |
| Écart entre le symbole et le favicon | Création d'un **symbole compact officiel** (même arche, même socle, même foyer, sans anneau, trait 6) pour les tailles de 16 à 24 px. Le favicon est ce symbole compact sur un carré nuit. | Une seule famille de formes, de 16 px à l'affiche. |
| Socle et nom mal alignés | La ligne de base du nom est **exactement alignée** sur le bas du socle (écart de 2,5 unités corrigé). | Le socle porte vraiment le nom, comme annoncé dans le concept. |

**Risque de ressemblance non levé.** La silhouette reste celle d'une lanterne archétypale. La recherche d'antériorité (bases INPI, EUIPO eSearch plus, WIPO Global Brand Database, classes 9, 35 et 42, recherche par image) et la comparaison avec le logiciel Lantern (Brave New Software) **n'ont pas été faites** : à faire avant tout dépôt du logo et avant la mise en ligne de la landing (skill nouvelle-marque-hasteria). Aucun logo existant n'a servi de modèle.

## 2. Fichiers

| Fichier | Usage | Fond prévu |
|---|---|---|
| `logo-horizontal-papier.svg` | Logo principal : site, application, documents, factures | Papier `#FAF6EE` ou blanc |
| `logo-horizontal-nuit.svg` | En-têtes sombres, landing, réseaux | Nuit `#1B2330` ou nuit douce `#2A3444` |
| `logo-noir.svg` | Impression une couleur, tampon, fax, documents administratifs | Blanc ou clair ; le foyer est un vrai trou (couleur du support) |
| `logo-blanc.svg` | Impression en réserve, gravure, fond photo très sombre | Noir ou très sombre |
| `symbole.svg` / `symbole-nuit.svg` | Avatar, en-tête d'application réduit, filigrane | Clair / sombre, à partir de 25 px |
| `symbole-compact.svg` | Petites tailles : onglets, listes, boutons | Clair, de 16 à 24 px |
| `favicon.svg` | Favicon du site et de l'application | Carré nuit intégré (tous fonds) |
| `icone-app-512.svg` | Icône PWA (« any » et « maskable »), apple-touch-icon, avatar Facebook | Carré nuit plein bord |
| `og-image.html` | Source de l'image de partage Open Graph 1200 × 630 | Nuit |
| `parcours-og.json` | Parcours de capture pour produire `og-image-1200x630.png` | — |

Tous les fichiers sont des SVG à couleurs fixes (valeurs de `../tokens.json`), sans police : le nom est **dessiné en tracés**. Poids estimé : 0,4 à 2 Ko par fichier (à mesurer).

## 3. Construction

- Grille du symbole : **64 × 64 unités**. Anneau : cercle de rayon 4 (trait 4) centré en (32 ; 9). Arche : largeur 32, rayon 16, de y = 20 à y = 58 (trait 5). Socle : de x = 10 à x = 54 sur y = 58. Foyer : disque de rayon 8,5 centré en (32 ; 40).
- Logo horizontal : **298 × 64 unités** ; le nom (214 × 40) commence à x = 76, sa ligne de base est celle du socle.
- Unité de mesure **X = diamètre du foyer** (17 unités sur 64, soit environ 27 % de la hauteur du logo).

## 4. Zone de protection

Laisser **1 X de vide** tout autour du logo (au-dessus de l'anneau, sous le socle, à gauche du socle et à droite du « s »). Exemple : logo affiché à 40 px de haut → X ≈ 11 px de marge minimale. Aucun texte, bord de page, pictogramme ou autre logo dans cette zone.

## 5. Tailles minimales

| Version | Écran | Impression |
|---|---|---|
| Logo horizontal | 120 px de large (environ 26 px de haut) | 30 mm de large |
| Symbole complet (avec anneau) | 25 px | 8 mm |
| Symbole compact / favicon | 16 px | 5 mm |

Sous 120 px de large, utiliser le symbole seul et écrire « Lanternis » en texte à côté si nécessaire.

## 6. Fonds autorisés

- **Papier, blanc, clairs neutres** : `logo-horizontal-papier.svg`. Le foyer ambre reste posé sur la nuit de l'arche (8,5 : 1) : c'est la seule façon autorisée d'avoir de l'ambre vif sur un document clair.
- **Nuit, nuit douce** : `logo-horizontal-nuit.svg`.
- **Photo** : seulement sur une zone calme et assez sombre ou claire ; sinon poser le logo sur un aplat papier ou nuit.
- **Couleurs d'état ou de tiers** (rouge, vert, bleu, etc.) : interdites comme fond du logo.

## 7. Interdits

1. Déformer (étirer, comprimer, incliner) ou faire pivoter le logo.
2. Recolorer (autre couleur que nuit, papier, nuit douce, ambre, noir, blanc), ajouter un dégradé.
3. Ajouter une ombre portée, un contour, un effet lumineux ou un halo derrière le logo.
4. Mettre le foyer en ambre sur fond clair sans l'arche remplie de nuit (1,7 : 1, invisible).
5. Remplacer le lettrage dessiné par une police (y compris Fraunces), modifier l'espacement des lettres.
6. Séparer l'anneau, supprimer le socle ou le foyer (hors symbole compact, réservé aux petites tailles).
7. Utiliser le symbole complet sous 25 px, ou le logo horizontal sous 120 px de large.
8. Poser le logo sur une photo chargée ou dans un cadre décoratif.

## 8. Dérivés PNG à générer (boîte à outils documents)

- **Image Open Graph 1200 × 630** : prête, voir la commande ci-dessous.
- **favicon-32.png, apple-touch-icon.png (180), icônes PWA 192 et 512 (+ maskable), avatar 400 × 400** : à produire depuis `favicon.svg` et `icone-app-512.svg` (même principe : une page HTML qui affiche le SVG plein cadre, un parcours par taille, fenêtre à la moitié de la taille cible car `capture.py` capture à l'échelle 2). Non préparés ici.

Commande (depuis `C:\saas-studio`) :

```
docker compose -f outils/documents/compose.yaml run --rm docs python /outils/capture.py ventures/lanternis/marque/charte/logo/parcours-og.json ventures/lanternis/marque/charte/logo/export
```

Sortie : `logo/export/og-image-1200x630.png` (1200 × 630 px).

## 9. Points ouverts

- Recherche d'antériorité graphique : **non faite** (voir § 1).
- Équilibre optique et crénage réglés à l'œil sur la grille ; un graphiste peut affiner la version finale si la marque décolle. Le dépôt de marque protège d'abord le nom ; le logo peut être déposé ensuite.
- Test de lecture du symbole (lanterne, et non porte ou stèle) auprès de 3 ou 4 personnes de la cible : à faire pendant les entretiens.
