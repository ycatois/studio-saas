---
name: visuels-marketing
description: Créer les visuels marketing aux couleurs de la marque (posts LinkedIn, carrousels, bannières, images Open Graph et d'articles, visuels publicitaires) via des gabarits HTML rendus en PNG/PDF.
---

# Visuels marketing
Principe : des **gabarits HTML** paramétrables dans `marque/charte/gabarits/` (tokens de la charte), rendus en PNG ou PDF par la boîte à outils (`outils/documents`, skill documents-generes).
Gabarits à créer au lancement de la marque :
- Post LinkedIn carré 1080×1080 et portrait 1080×1350 (citation, chiffre clé, annonce, avant/après).
- Carrousel LinkedIn 1080×1350 multipage → PDF.
- Bannière LinkedIn page et profil, image Open Graph 1200×630, image d'en-tête d'article de blog.
- Visuels publicitaires (formats LinkedIn Ads / Meta) et captures produit annotées (flèches, encadrés).
Règles : un message par visuel, texte court et lisible sur mobile, contraste AA, logo discret, pas d'images sous licence incompatible. Chaque visuel est livré avec son texte alternatif.
Sortie : `marketing/visuels/AAAA-MM/<slug-contenu>.png` (+ source HTML).
