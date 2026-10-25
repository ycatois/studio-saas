---
name: deploiement-o2switch
description: Construire et déployer le site vitrine + blog statique sur o2switch, avec le formulaire de liste d'attente.
---

# Déploiement vitrine sur o2switch
- Build local ou CI : `npm run build` → dossier `dist/`.
- Déploiement : `rsync -az --delete dist/ <utilisateur>@<hôte o2switch>:<dossier du domaine>/` via SSH (ou Git de cPanel). Le dossier cible et la méthode sont dans `INFRA.md`.
- Domaine pointé depuis OVH (skill dns-domaines-ovh), SSL via AutoSSL.
- **Pré-lancement** : formulaire de liste d'attente traité par un petit script PHP sur o2switch (MySQL fourni par l'hébergement) : validation, anti-spam (champ piège + limitation), consentement RGPD explicite, double opt-in par email, export CSV. Mot de passe de base hors de la racine web.
- **Après lancement** : le formulaire appelle l'API du VPS (CORS limité au domaine vitrine) ; migrer les inscrits.
- `.htaccess` : redirections www/non-www et HTTPS, cache longue durée des assets, compression.
- Vérifier après chaque mise en ligne : pages clés, formulaire, sitemap, Core Web Vitals.
