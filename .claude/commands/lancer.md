---
description: Après un GO : cadrage, marque, architecture et squelette du produit
argument-hint: <slug>
---

Venture concernée : déduis-la de `$ARGUMENTS` (premier mot = slug) ; s'il n'y a qu'une venture active, prends-la ; sinon demande.

Vérifie d'abord que STATUT.md contient un GO de l'utilisateur. Sinon, stop.
1. **product-owner** : périmètre MVP, backlog, roadmap → `5-cadrage/`.
2. **analyste-metier** : règles de gestion, glossaire.
3. **directeur-artistique** : identité visuelle si elle n'existe pas (comme `/charte` : pistes → choix de l'utilisateur → logo → charte). Puis **ux-designer** (parcours, wireframes) et **ui-designer** (design system dérivé de la charte, maquettes haute fidélité des écrans clés, prototype cliquable du parcours principal).
4. **brand-manager** : plateforme de marque et ton de voix finalisés, puis checklist nouvelle-marque-hasteria (nom, domaine, Stripe, Mailjet, réseaux).
5. **architecte** : ADR de stack, modèle de données, `openapi.yaml`, puis skill scaffold-monorepo dans `produit/`.
6. **strategiste-marketing** : plan marketing complet et plan de lancement daté → `marketing/plan-marketing.md`.
7. **juriste-rgpd** : premiers projets de mentions, confidentialité, registre.
Livrable final : un squelette qui tourne de bout en bout + backlog priorisé + plan marketing.
À la fin : mets à jour `STATUT.md` de la venture et `PORTEFEUILLE.md`, puis donne à l'utilisateur une synthèse courte (5–10 lignes) et la prochaine commande conseillée.
