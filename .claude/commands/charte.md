---
description: Créer l'identité visuelle d'une marque : pistes créatives, puis logo et charte graphique
argument-hint: <slug> [piste choisie]
---

Venture concernée : déduis-la de `$ARGUMENTS` (premier mot = slug) ; s'il n'y a qu'une venture active, prends-la ; sinon demande.

1. Vérifie que `marque/plateforme-de-marque.md` existe ; sinon lance d'abord **brand-manager** (skill plateforme-de-marque).
2. Si aucune piste n'est choisie : **directeur-artistique** → skill moodboard-pistes-creatives (2 à 3 pistes, planches HTML + captures). Présente-les et **arrête-toi** : demande à l'utilisateur laquelle retenir (ou quoi mixer).
3. Piste choisie : **directeur-artistique** → skill logo (3 propositions, attendre le choix), puis identite-visuelle (charte complète, tokens, charte PDF), iconographie-illustrations, gabarits de visuels-marketing.
4. **ui-designer** : met à jour le design system à partir des tokens.
À la fin : mets à jour `STATUT.md` de la venture et `PORTEFEUILLE.md`, commit + push (skill workflow-git), puis donne à l'utilisateur une synthèse courte et la prochaine commande conseillée.
