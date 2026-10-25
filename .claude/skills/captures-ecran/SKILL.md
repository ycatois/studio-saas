---
name: captures-ecran
description: Faire des captures d'écran automatisées de l'application (recette ou locale) ou des maquettes HTML, en bureau et mobile, pour guides, briefs, marketing et stores.
---

# Captures d'écran
Outil : `outils/documents/scripts/capture.py` dans le conteneur documents.
1. Écrire `livrables/captures/<sujet>/parcours.json` (format décrit en tête du script) : écrans, formats bureau/mobile, connexion éventuelle.
2. Utiliser un **compte et des données de démonstration** réalistes (jamais de vraies données clients) ; créer les données avec une commande de fixtures si nécessaire. Identifiants passés par `CAPTURE_EMAIL` / `CAPTURE_PASSWORD`.
3. Application locale : `base_url` = `http://host.docker.internal:<port>` ; recette : URL de recette ; maquettes : chemin du dossier.
4. Lancer : `docker compose -f outils/documents/compose.yaml run --rm docs python /outils/capture.py <parcours.json> <dossier>`.
5. Contrôler visuellement les images ; annoter si besoin (gabarit « capture annotée » de visuels-marketing).
Usages : guide utilisateur, briefs de documents, articles et posts, fiches des stores, études de cas, relectures de maquettes.
