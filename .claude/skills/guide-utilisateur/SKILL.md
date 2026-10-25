---
name: guide-utilisateur
description: Rédiger et régénérer à chaque version le guide utilisateur (PDF + pages d'aide), captures à jour incluses.
---

# Guide utilisateur
- Sources : user stories livrées, changelog, FAQ ; écrit pour l'utilisateur final (tâches, pas fonctionnalités) : démarrer, tâches courantes pas à pas, réglages, facturation et abonnement, questions fréquentes, contact support.
- Source unique en Markdown dans `produit/docs/guide/` → publiée en pages d'aide (vitrine ou app) **et** générée en PDF aux couleurs de la marque (skill documents-generes).
- Captures régénérées automatiquement à chaque version (skill captures-ecran, `parcours.json` versionné).
- À chaque release : mise à jour du guide + PDF « Nouveautés de la version » d'une page.
