# Infrastructure du studio

Référence pour les agents architecte, devops, dev-* et release-manager. **Aucun secret ici** (mots de passe, clés API, jetons) : ils vont dans les fichiers `.env.local` non versionnés et dans les secrets GitHub Actions.

## Poste local
- Windows 11 Pro, Docker Desktop (WSL2) — environnement de référence
- Aussi disponibles : WAMP (PHP toutes versions, MySQL, MariaDB), PostgreSQL 18 natif
- Outils : Git, Composer, Symfony CLI, Node.js LTS, GitHub CLI (`gh`) recommandé
- Dossier des projets : à compléter

## VPS OVH (applications web + API)
- Système : Ubuntu (version : à compléter)
- Docker + Docker Compose : à installer/vérifier lors du premier `/deployer`
- Reverse proxy partagé : Caddy (HTTPS automatique), dans `/srv/proxy`
- Une pile par venture dans `/srv/<slug>/` (compose, `.env`, volumes), PostgreSQL dédié par venture
- Accès : SSH par clé, utilisateur de déploiement `deploy` (à créer), pare-feu UFW (22, 80, 443)
- Sauvegardes : dump PostgreSQL quotidien par venture + uploads, chiffrés ; 3 copies — VPS (local, courte rétention), **o2switch** (envoyé par le VPS) et **NAS Synology** au domicile (récupéré par le NAS) ; snapshots OVH en complément (skill sauvegardes)

## o2switch (vitrines + blogs)
- Accès : cPanel + SSH
- Déploiement : rsync via SSH depuis GitHub Actions
- Dossier cible par domaine : à compléter à chaque venture
- SSL : AutoSSL

## Domaines (OVH)
| Domaine | Marque | Vitrine (o2switch) | app (VPS) | api (VPS) | Mailjet SPF/DKIM | DMARC |
|---|---|---|---|---|---|---|
| | | | | | | |

## Code et CI — GitHub
- Dépôt du studio : à compléter (privé)
- GitHub Actions : tests sur PR ; build image → GHCR ; déploiement recette automatique ; production manuelle (environnement GitHub protégé)
- Secrets Actions par venture : clé SSH de déploiement, hôte VPS, accès o2switch

## Services tiers
- Paiement : Stripe — **un seul compte (Hasteria) pour toutes les marques**, séparation par métadonnée `marque=<slug>`
- Emails transactionnels : Mailjet (un sous-compte ou un domaine expéditeur authentifié par marque)
- Facturation électronique (émission obligatoire au 1er septembre 2027) : plateforme agréée à choisir
- Mesure d'audience : à compléter (sans cookie de préférence)
