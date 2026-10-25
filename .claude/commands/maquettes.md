---
description: Proposer des maquettes (app, landing, emails) ou un prototype cliquable
argument-hint: <slug> <écrans ou parcours> [nombre de propositions]
---

Venture concernée : déduis-la de `$ARGUMENTS` (premier mot = slug) ; s'il n'y a qu'une venture active, prends-la ; sinon demande.
Demande : $ARGUMENTS
- Si la charte n'existe pas encore : propose `/charte` d'abord (ou travaille en version neutre si l'utilisateur le souhaite).
- Écrans de l'app : **ux-designer** (wireframes si absents) → **ui-designer** (skill maquette-haute-fidelite ; 2 à 3 propositions si demandé).
- Landing / vitrine : **cro-conversion** (structure et textes) → **ui-designer** ou **dev-vitrine** (maquette).
- Parcours complet : skill prototype-cliquable + guide de test utilisateur.
- Skill revue-design sur le résultat, captures bureau + mobile (skill captures-ecran), puis présente l'index des maquettes et demande les retours.
À la fin : mets à jour `STATUT.md` de la venture et `PORTEFEUILLE.md`, commit + push (skill workflow-git), puis donne à l'utilisateur une synthèse courte et la prochaine commande conseillée.
