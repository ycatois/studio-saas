---
description: Business model, prévisionnel et scoring d'une venture
argument-hint: <slug>
---

Venture concernée : déduis-la de `$ARGUMENTS` (premier mot = slug) ; s'il n'y a qu'une venture active, prends-la ; sinon demande.

1. **analyste-finance** : business model, prévisionnel 36 mois 3 scénarios, unit economics → `3-bilan/`.
2. **comite-decision** : scoring selon la grille de CLAUDE.md, en intégrant les résultats de validation s'ils existent → `3-bilan/scoring.md`.
Indique clairement les hypothèses fragiles qui pèsent le plus sur le score.
À la fin : mets à jour `STATUT.md` de la venture et `PORTEFEUILLE.md`, puis donne à l'utilisateur une synthèse courte (5–10 lignes) et la prochaine commande conseillée.
