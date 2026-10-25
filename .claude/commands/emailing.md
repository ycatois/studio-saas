---
description: Concevoir une séquence email (onboarding, nurturing, conversion, réactivation)
argument-hint: <slug> <type de séquence>
---

Venture concernée : déduis-la de `$ARGUMENTS` (premier mot = slug) ; s'il n'y a qu'une venture active, prends-la ; sinon demande.
Demande : $ARGUMENTS
**email-marketer** : séquence complète (déclencheurs, objets en 2 variantes, corps, CTA, métriques) → `marketing/emails/`. **dev-integrations** : note technique d'implémentation si besoin.
À la fin : mets à jour `STATUT.md` de la venture et `PORTEFEUILLE.md`, puis donne à l'utilisateur une synthèse courte (5–10 lignes) et la prochaine commande conseillée.
