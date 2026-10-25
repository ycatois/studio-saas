---
name: scaffold-monorepo
description: Créer le squelette du produit d'une venture (Symfony + Docker, vitrine Astro, mobile éventuel, shared, deploy).
---

# Scaffold
- `produit/apps/api` : Symfony (`--webapp`, inclut l'interface web en Symfony UX), PostgreSQL via `DATABASE_URL`, PHPStan, PHP-CS-Fixer, PHPUnit, scripts Composer `check`/`test`/`db:reset`, endpoint `/health`.
- `produit/apps/vitrine` : Astro, blog en Markdown (`src/content/blog/`), formulaire liste d'attente.
- `produit/apps/mobile` : uniquement si l'ADR mobile retient Flutter ou natif.
- `produit/packages/shared/openapi.yaml`.
- `produit/compose.yaml`, `compose.override.yaml`, `compose.prod.yaml`, `Dockerfile` (skill docker-environnements).
- `produit/deploy/` : bloc Caddy, notes de déploiement ; workflows GitHub Actions (skill ci-cd).
- `.gitattributes`, `.editorconfig`, `.env` sans secret, README avec les commandes (`docker compose up -d`, `docker compose exec php composer check`).
- Intégrations prêtes en mode test : Stripe (clés test), Mailjet (bac à sable / Mailpit en dev).
- Un « hello world » de bout en bout (vitrine → inscription → app → email reçu dans Mailpit) avant toute feature.
