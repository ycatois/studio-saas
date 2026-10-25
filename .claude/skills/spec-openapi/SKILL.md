---
name: spec-openapi
description: Écrire ou faire évoluer le contrat OpenAPI partagé.
---

# OpenAPI
- Fichier `produit/packages/shared/openapi.yaml`, version 3.1.
- Ressources au pluriel, codes HTTP corrects, erreurs normalisées (RFC 9457), pagination, auth bearer, exemples.
- Toute modification incompatible = nouvelle version + note pour web/mobile.
- Générer les clients web et mobile à partir du contrat.
