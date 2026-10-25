---
name: sauvegardes
description: Mettre en place les sauvegardes chiffrées 3-2-1 (VPS → o2switch, NAS Synology qui récupère depuis le VPS) et tester la restauration.
---

# Sauvegardes — 3 copies, 2 lieux hors VPS
**Quoi** : pour chaque venture, dump PostgreSQL quotidien (`pg_dump -Fc` depuis le conteneur), volume des fichiers déposés par les clients, fichiers `.env` de prod (chiffrés à part), configuration Caddy. Le code est déjà sur GitHub.

**Chiffrement obligatoire** avant de quitter le VPS : outil de sauvegarde dédupliquée et chiffrée (ex. restic ou BorgBackup), mot de passe du dépôt conservé hors serveur (gestionnaire de mots de passe de l'utilisateur). Jamais de dump en clair hors du VPS.

**Les trois copies**
1. **VPS** : dumps locaux sur 7 jours (restauration rapide).
2. **o2switch** (le VPS pousse) : dépôt chiffré via SFTP/SSH avec une clé dédiée, rétention 7 quotidiennes + 4 hebdomadaires + 6 mensuelles ; surveiller le quota d'espace et l'usage autorisé par l'hébergeur.
3. **NAS Synology au domicile** (le NAS **tire** depuis le VPS) : le NAS se connecte en SSH au VPS avec une clé en lecture seule limitée au dossier de sauvegarde (aucune ouverture de port vers le domicile, le VPS ne détient aucun accès au NAS). Tâche planifiée sur le NAS (rsync des dépôts déjà chiffrés, ou Hyper Backup), rétention longue ; idéalement instantanés du NAS activés contre la suppression ou le chiffrement malveillant.

**Surveillance** : alerte si une sauvegarde manque ou si sa taille varie anormalement (email Mailjet ou notification).

**Restauration testée** : avant la mise en prod, puis chaque trimestre — restaurer un dump sur une base de recette depuis o2switch ET depuis le NAS, chronométrer, consigner le résultat dans `produit/docs/qualite/restauration-<date>.md`.

**RGPD** : les sauvegardes contiennent des données de clients ; les lieux de stockage (OVH, o2switch, NAS d'Hasteria en France) et la durée de conservation figurent au registre et dans l'accord de sous-traitance.
