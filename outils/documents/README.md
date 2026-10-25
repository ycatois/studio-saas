# Boîte à outils documents

Conteneur Docker utilisé par Claude pour fabriquer PDF, captures d'écran, Word, Excel et PowerPoint sans rien installer sur Windows.
- Construction (une fois, automatique au premier besoin) : `docker compose -f outils/documents/compose.yaml build`
- Exemples de commandes : en tête de `compose.yaml`.
- Python dispose de python-docx, openpyxl, python-pptx, pypdf : Claude écrit un script dans `ventures/<slug>/livrables/sources/` puis l'exécute avec `docker compose -f outils/documents/compose.yaml run --rm docs python <script.py>`.
