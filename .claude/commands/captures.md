---
description: Faire les captures d'écran de l'application ou des maquettes
argument-hint: <slug> <écrans ou parcours> [bureau|mobile|les deux]
---

Venture concernée : déduis-la de `$ARGUMENTS` (premier mot = slug) ; s'il n'y a qu'une venture active, prends-la ; sinon demande.
Demande : $ARGUMENTS
Skill captures-ecran : vérifie que l'application tourne (locale ou recette), prépare un compte et des données de démonstration, écris le `parcours.json`, lance les captures, contrôle-les, range-les dans `livrables/captures/<sujet>/`.
À la fin : mets à jour `STATUT.md` de la venture et `PORTEFEUILLE.md`, commit + push (skill workflow-git), puis donne à l'utilisateur une synthèse courte et la prochaine commande conseillée.
