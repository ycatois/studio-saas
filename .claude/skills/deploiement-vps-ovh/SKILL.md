---
name: deploiement-vps-ovh
description: Préparer le VPS OVH Ubuntu et déployer une venture en Docker derrière le reverse proxy Caddy partagé.
---

# Déploiement sur le VPS OVH (Ubuntu + Docker)
Lis `INFRA.md` d'abord. Chaque commande serveur est proposée, expliquée, puis exécutée seulement après accord de l'utilisateur.

## Préparation du serveur (une seule fois)
- Utilisateur `deploy` (groupe docker), SSH par clé uniquement, root désactivé, UFW (22/80/443), fail2ban, `unattended-upgrades`.
- Docker Engine + plugin Compose (dépôt officiel Docker).
- `/srv/proxy/` : Caddy en conteneur, réseau Docker externe `proxy`, un bloc par hôte (`app.<domaine> { reverse_proxy <slug>-web:80 }`) — certificats automatiques.
- Sauvegardes : conteneur ou cron de `pg_dump` quotidien par venture, rotation, copie hors VPS ; restauration testée.

## Ajout d'une venture
- `/srv/<slug>/` : `compose.prod.yaml`, `.env` (600), volumes.
- Enregistrements DNS créés (skill dns-domaines-ovh), bloc Caddy ajouté, rechargement du proxy.

## Déploiement d'une version (depuis GitHub Actions ou à la main)
1. Image `ghcr.io/<compte>/<slug>:<version>` construite et testée en CI.
2. Sur le VPS : `docker compose -f compose.prod.yaml pull` → migrations Doctrine (`docker compose run --rm php bin/console doctrine:migrations:migrate --no-interaction`) → `docker compose up -d` → tests de fumée (healthcheck, page de connexion, endpoint `/health`).
3. Retour arrière : redéployer le tag précédent ; migrations écrites en expand/contract pour le permettre.
Rien en production sans validation explicite de l'utilisateur.
