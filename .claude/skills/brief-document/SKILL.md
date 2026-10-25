---
name: brief-document
description: Rédiger un brief autonome (prompt complet + pièces jointes) pour faire réaliser un document soigné dans l'appli Claude (Docs, Slides, Design) à partir des données du studio.
---

# Brief de document pour l'appli Claude
Quand l'utiliser : documents ponctuels et soignés à retoucher à la main ou à partager par lien (présentation commerciale, pitch, dossier partenaire, plaquette, proposition client, one-pager). Pour les documents qui se régénèrent à chaque version, préférer documents-generes.

## Livrable
Dossier `livrables/briefs/AAAA-MM-JJ-<document>/` contenant :
- `BRIEF.md` (ci-dessous), **entièrement autonome** : l'appli ne voit pas le dépôt.
- `images/` : captures (skill captures-ecran), logo et visuels (PNG/SVG de `marque/charte/`).
- `donnees/` si utile : CSV ou tableaux.

## Structure de `BRIEF.md`
```
# Brief — <document> (<marque>)
## À coller dans l'appli Claude
« Réalise le document décrit ci-dessous, au format <Slides | document | design>, en respectant strictement la charte et le contenu fournis. Utilise les images jointes. Pose-moi des questions seulement si une information bloquante manque. »
## Objectif et public
## Format attendu (type, nombre de pages/slides, orientation, export prévu PDF/Word/PPTX)
## Charte (couleurs hex, typographies, logo à utiliser, style, à éviter)
## Plan détaillé (section par section ou slide par slide : titre, message clé, contenu, visuel à utiliser)
## Contenus et chiffres (textes prêts à l'emploi, chiffres sourcés avec date)
## Mentions obligatoires (« <Marque> est une marque d'Hasteria SASU », confidentialité, sources)
## Liste des pièces jointes (nom de fichier → où l'utiliser)
## Critères de réussite
```
Ensuite, indique à l'utilisateur : ouvrir l'appli Claude, joindre `BRIEF.md` et le dossier `images/`, et écrire « Réalise ce document ». Une fois le document validé, il peut déposer l'export final dans `livrables/` pour l'archiver.
