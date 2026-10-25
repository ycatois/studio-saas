---
description: Créer des visuels marketing aux couleurs de la marque
argument-hint: <slug> <besoin : posts de la semaine, carrousel, bannière, pub…>
---

Venture concernée : déduis-la de `$ARGUMENTS` (premier mot = slug) ; s'il n'y a qu'une venture active, prends-la ; sinon demande.
Demande : $ARGUMENTS
**directeur-artistique** (skill visuels-marketing) à partir des gabarits de `marque/charte/gabarits/` (les créer s'ils manquent), rendu PNG/PDF par la boîte à outils documents ; textes fournis par le contenu concerné (posts, articles, campagne). Livrables dans `marketing/visuels/AAAA-MM/` avec textes alternatifs.
À la fin : mets à jour `STATUT.md` de la venture et `PORTEFEUILLE.md`, commit + push (skill workflow-git), puis donne à l'utilisateur une synthèse courte et la prochaine commande conseillée.
