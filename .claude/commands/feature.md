---
description: Réaliser une fonctionnalité de bout en bout (spec → code → tests → annonce)
argument-hint: <slug> <description de la fonctionnalité>
---

Venture concernée : déduis-la de `$ARGUMENTS` (premier mot = slug) ; s'il n'y a qu'une venture active, prends-la ; sinon demande.

Fonctionnalité : $ARGUMENTS
1. **product-owner** : user story + critères d'acceptation ; **analyste-metier** : règles de gestion.
2. **architecte** : impact contrat d'API / données (ADR si structurant).
3. Développement en parallèle selon le besoin : **dev-back**, **dev-web**, **dev-mobile**, **dev-integrations**.
4. **qa-testeur** : vérifie chaque critère ; **reviewer-code** : revue.
5. **release-manager** : changelog + note client + brief marketing.
6. Si l'interface change : captures à jour (skill captures-ecran) et mise à jour du guide utilisateur (agent redacteur-documentation).
6b. Si l'impact marketing est oui : **linkedin-social-manager** (post d'annonce), **email-marketer** (email), mise à jour vitrine/FAQ.
7. Git (skill workflow-git) : branche `feat/<slug>/…`, commits, push, PR, CI verte, fusion squash.
Ne déclare la feature terminée que si la CI est verte et la PR fusionnée.
À la fin : mets à jour `STATUT.md` de la venture et `PORTEFEUILLE.md`, puis donne à l'utilisateur une synthèse courte (5–10 lignes) et la prochaine commande conseillée.
