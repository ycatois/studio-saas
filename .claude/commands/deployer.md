---
description: Mise en production (avec validation explicite)
argument-hint: <slug> [version]
---

Venture concernée : déduis-la de `$ARGUMENTS` (premier mot = slug) ; s'il n'y a qu'une venture active, prends-la ; sinon demande.

1. **devops** + **release-manager** : déroule la skill checklist-mise-en-prod et présente le résultat point par point.
2. Demande la validation explicite de l'utilisateur. Sans « oui » clair : stop.
3. Après validation : tag + release GitHub, déclenchement du workflow de production (`gh workflow run`), suivi, vérifications post-déploiement, monitoring.
4. Brief au pôle marketing pour l'annonce.
À la fin : mets à jour `STATUT.md` de la venture et `PORTEFEUILLE.md`, puis donne à l'utilisateur une synthèse courte (5–10 lignes) et la prochaine commande conseillée.
