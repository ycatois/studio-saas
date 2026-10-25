---
name: docker-environnements
description: Organiser les environnements dev / recette / prod en Docker (poste Windows, VPS OVH Ubuntu).
---

# Environnements Docker
- **Images** : un `Dockerfile` multi-étapes (dépendances → build des assets → image finale minimale, utilisateur non-root, `APP_ENV=prod`, opcache). Même image en recette et en prod, seule la configuration change.
- **Compose** : `compose.yaml` (base), `compose.override.yaml` (dev : montages, Mailpit, Xdebug), `compose.prod.yaml` (prod : image GHCR, `restart: unless-stopped`, healthchecks, limites mémoire, volumes nommés pour PostgreSQL et les uploads, réseau externe `proxy`).
- **Recette** : `recette-app.<domaine>`, base séparée, données anonymisées, accès protégé (auth basique Caddy).
- **Prod** : `app.<domaine>` derrière le Caddy partagé.
- Variables via `.env` côté serveur (droits 600), jamais dans l'image ni dans le dépôt.
