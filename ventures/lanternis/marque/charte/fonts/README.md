---
venture: lanternis
auteur: directeur-artistique
date: 2026-10-26
statut: à faire (aucun fichier téléchargé)
---

# Polices auto-hébergées : Fraunces

Lanternis ne charge **qu'une seule webfont** : Fraunces, graisse 600, sous-ensemble latin, pour les titres. Le texte courant utilise les polices du système (0 Ko). Aucune police n'est chargée depuis un CDN (ni Google Fonts, ni autre) : pas de requête vers un tiers, pas de transfert d'adresse IP des visiteurs.

## 1. Fichier à placer ici

| Fichier attendu dans ce dossier | Contenu | Poids |
|---|---|---|
| `fraunces-latin-600.woff2` | Fraunces, normal, graisse 600, sous-ensemble « latin » | 25 à 40 Ko (hypothèse, à mesurer) |
| `OFL.txt` | Texte de la licence SIL Open Font License 1.1, copié du dépôt officiel | 4 Ko environ |

Le sous-ensemble « latin » de Google Fonts couvre le français : lettres accentuées, œ et Œ (U+0152-0153), € (U+20AC), guillemets, espaces fines insécables (plage U+2000-206F). C'est la plage déclarée dans `../tokens.css` (`unicode-range`).

Fichiers **non** nécessaires : les autres graisses, l'italique, les sous-ensembles latin-ext et vietnamese, la version variable (plus lourde).

## 2. Où le télécharger (une seule des deux voies)

**Voie A, la plus simple : google-webfonts-helper**
1. Ouvrir <https://gwfh.mranftl.com/fonts/fraunces?subsets=latin>.
2. Cocher uniquement le style **600** (pas 600italic), jeu de caractères **latin**.
3. Choisir « Modern browsers » (woff2) et télécharger l'archive.
4. Dans l'archive, prendre le fichier nommé `fraunces-v38-latin-600.woff2` (le numéro de version peut avoir changé) et le **renommer** `fraunces-latin-600.woff2` dans ce dossier.

Vérifié le 2026-10-26 sur l'API de ce service (<https://gwfh.mranftl.com/api/fonts/fraunces?subsets=latin>) : Fraunces v38, variante `600` disponible en woff2, sous-ensembles latin, latin-ext et vietnamese.

**Voie B : sources officielles**
- Page de la police : <https://fonts.google.com/specimen/Fraunces> (bouton « Get font »).
- Dépôt des auteurs (Undercase Type) : <https://github.com/undercasetype/Fraunces>, licence OFL-1.1 dans `OFL.txt` (vérifié le 2026-10-26).
- Ces sources livrent des TTF : il faut alors produire le woff2 sous-ensemble, par exemple avec `pyftsubset` (paquet fonttools + brotli, **non installé** dans la boîte à outils documents à ce jour) :
  `pyftsubset Fraunces_72pt-SemiBold.ttf --flavor=woff2 --layout-features='*' --unicodes="U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD" --output-file=fraunces-latin-600.woff2`
  (le nom exact du TTF statique dépend de la version téléchargée : choisir la graisse SemiBold 600, taille optique « 72pt » pour les titres ou « 9pt » si l'on préfère un dessin plus robuste ; hypothèse à trancher en voyant les deux).

## 3. Licence

Fraunces est publiée sous **SIL Open Font License 1.1** (dépôt officiel, vérifié le 2026-10-26) : usage commercial, auto-hébergement et intégration dans un site ou une application autorisés ; pas de vente de la police seule ; conserver la licence avec les fichiers (d'où `OFL.txt` ici). **À reconfirmer au moment du téléchargement.**

## 4. Qui l'utilise

- `../charte-graphique.html` et `../logo/og-image.html` lisent ce fichier en chemin relatif. S'il est absent, ils s'affichent avec la police de repli (Iowan Old Style, Palatino, Georgia ; dans le conteneur Docker de la boîte à outils, probablement DejaVu Serif ou Liberation Serif : hypothèse).
- L'application et la vitrine copieront ce woff2 dans leurs propres dossiers d'assets et reprendront la déclaration `@font-face` de `../tokens.css` (chemin à adapter), avec `font-display: swap`.
- Le logo n'utilise **aucune** police : le nom y est dessiné en tracés.
- Les emails n'utilisent pas Fraunces (support des webfonts trop inégal) : titres en Georgia, texte en Arial.
