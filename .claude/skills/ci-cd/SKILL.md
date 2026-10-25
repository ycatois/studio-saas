---
name: ci-cd
description: Mettre en place GitHub Actions : tests, build d'image GHCR, déploiement recette/prod sur le VPS et vitrine sur o2switch.
---

# CI/CD GitHub Actions
Workflows dans `.github/workflows/` (à la racine du dépôt studio, filtrés par chemin `ventures/<slug>/**`) :
- **ci-<slug>.yml** (PR) : `composer check` dans l'image de dev, audit des dépendances (`composer audit`, `npm audit`), build de la vitrine.
- **build-<slug>.yml** (fusion sur main) : build multi-étapes → push `ghcr.io/...:<sha>` et `:recette` → déploiement recette par SSH.
- **deploy-prod-<slug>.yml** (déclenchement manuel `workflow_dispatch`, environnement GitHub `production` avec approbation requise) : retag `:<version>` → SSH sur le VPS → pull, migrations, up, tests de fumée.
- **vitrine-<slug>.yml** : build Astro → rsync vers o2switch.
Secrets : par environnement GitHub (clé SSH dédiée au déploiement, hôte, utilisateur). Jamais de secret dans les logs.
