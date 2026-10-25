---
name: environnement-local-windows
description: Préparer ou vérifier l'environnement de développement local (Windows 11 + Docker Desktop/WSL2, WAMP en secours) pour une venture.
---

# Environnement local
1. Vérifie : `docker version`, `docker compose version`, `git --version`, `node -v`, `gh --version` ; `php -v`, `composer -V` et `symfony -V` pour les commandes hors conteneur.
2. **Référence : Docker Compose** dans `produit/compose.yaml` : `php` (PHP-FPM 8.3+ avec pdo_pgsql, intl, opcache), `web` (Caddy ou Nginx), `db` (PostgreSQL, même version majeure que la prod), `mailer` (Mailpit pour voir les emails sans rien envoyer).
3. Code dans le système de fichiers WSL2 de préférence (performances de Docker Desktop) ; sinon montages Windows, plus lents.
4. Scripts Composer : `check` (lint + PHPStan + tests), `test`, `db:reset` ; exécution via `docker compose exec php composer check`.
5. `.env` versionné sans secret ; `.env.local` ignoré (clés de test Stripe, Mailjet en mode bac à sable).
6. `.gitattributes` (`* text=auto eol=lf`) pour éviter les écarts Windows/Linux.
WAMP reste possible pour un prototype rapide, mais tout ce qui part en recette doit tourner dans Docker.
