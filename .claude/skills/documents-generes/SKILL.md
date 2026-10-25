---
name: documents-generes
description: Produire directement des documents PDF, Word (.docx), Excel (.xlsx) ou PowerPoint (.pptx) aux couleurs de la marque avec la boîte à outils Docker du studio.
---

# Documents générés par le studio
Outil : conteneur `outils/documents` (le construire s'il n'existe pas : `docker compose -f outils/documents/compose.yaml build`). Aucune installation sur Windows.

## Méthode par format
- **PDF** : écrire le document en HTML + CSS d'impression (`@page` A4, marges, numéros de page, sauts de page, couverture) avec `marque/charte/tokens.css` et le logo, puis `python /outils/html2pdf.py`. C'est la méthode par défaut (meilleur rendu).
- **Word (.docx)** : Markdown → `pandoc --reference-doc=marque/charte/gabarits/modele.docx` (modèle aux styles de la marque, à créer une fois avec python-docx), ou script python-docx pour les documents très structurés (tableaux, en-têtes/pieds).
- **Excel (.xlsx)** : script openpyxl — vraies formules (pas de valeurs figées), onglet « Hypothèses » séparé, mise en forme sobre aux couleurs de la marque, figer les volets, formats numériques (€, %).
- **PowerPoint (.pptx)** : script python-pptx avec un gabarit aux couleurs de la marque ; pour une présentation soignée à retoucher à la main, préférer un brief pour l'appli Claude (skill brief-document).
- **Conversions** : `soffice --headless --convert-to pdf` pour obtenir le PDF d'un .docx/.xlsx/.pptx.

## Règles
- Sources (HTML, Markdown, scripts) dans `livrables/sources/`, résultats dans `livrables/pdf/`, `livrables/word/`, `livrables/excel/`, `livrables/presentations/` ; nommage `AAAA-MM-JJ-<document>-v<n>.<ext>`.
- Données toujours tirées des fichiers du projet (prévisionnel, specs, études) : le document se régénère quand elles changent.
- Mentions : « <Marque> est une marque d'Hasteria SASU » en pied ; mention « Confidentiel » si interne.
- Vérification avant livraison : ouvrir/rendre le résultat (convertir en PNG la première page pour contrôle visuel), vérifier pagination, polices, images, chiffres.
- Fichiers binaires volumineux : ne versionner que les versions livrées (pas chaque essai).
