---
description: Rapport mensuel produit + marketing et décisions
argument-hint: <slug> [AAAA-MM]
---

Venture concernée : déduis-la de `$ARGUMENTS` (premier mot = slug) ; s'il n'y a qu'une venture active, prends-la ; sinon demande.
**analyste-produit** (rapport-metriques-produit) + **strategiste-marketing** (rapport-marketing) ; puis rétro (retro-iteration). Si les données ne sont pas accessibles, demande à l'utilisateur de les coller ou de brancher un connecteur. Livrables dans `exploitation/metriques/` et `marketing/rapports/`.
À la fin : mets à jour `STATUT.md` de la venture et `PORTEFEUILLE.md`, puis donne à l'utilisateur une synthèse courte (5–10 lignes) et la prochaine commande conseillée.
