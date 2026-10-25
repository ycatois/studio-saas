---
name: pwa
description: Transformer l'application web Symfony en PWA installable, sobre et utilisable hors ligne.
---

# PWA
- `manifest.webmanifest` (nom, icônes 192/512 + maskable, couleurs du design system, `display: standalone`, `start_url`).
- Service worker : cache des assets statiques, page hors-ligne, stratégie réseau-d'abord pour les données ; aucune donnée sensible en cache.
- Interface responsive pensée mobile d'abord, cibles tactiles ≥ 44 px.
- Invitation à l'installation discrète, après une première valeur obtenue.
- Notifications push seulement si utiles et consenties.
- Tests : audit PWA (Lighthouse), Android Chrome, iOS Safari.
- Option Play Store : emballage TWA si la présence en store devient nécessaire.
