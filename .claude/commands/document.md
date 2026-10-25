---
description: Produire un document (PDF, Word, Excel, PowerPoint) ou son brief pour l'appli Claude
argument-hint: <slug> <document> [pdf|word|excel|pptx|brief]
---

Venture concernée : déduis-la de `$ARGUMENTS` (premier mot = slug) ; s'il n'y a qu'une venture active, prends-la ; sinon demande.
Demande : $ARGUMENTS
1. Identifie le document, son public et le format. Si le format n'est pas précisé : régénérable (guide, rapport, prévisionnel, nouveautés) → fichier généré ; ponctuel et à retoucher (présentation commerciale, pitch, plaquette) → **brief** pour l'appli Claude. Annonce ton choix en une ligne.
2. **redacteur-documentation** (avec l'agent métier concerné : analyste-finance pour un prévisionnel Excel, strategiste-marketing pour une plaquette, etc.) rassemble le contenu à partir des fichiers du projet ; captures si nécessaire (skill captures-ecran).
3. Fichier : skill documents-generes → `livrables/<format>/`. Brief : skill brief-document → `livrables/briefs/<date>-<document>/`.
4. Contrôle visuel, puis indique à l'utilisateur où est le fichier (ou, pour un brief, quoi joindre dans l'appli Claude).
À la fin : mets à jour `STATUT.md` de la venture et `PORTEFEUILLE.md`, commit + push (skill workflow-git), puis donne à l'utilisateur une synthèse courte et la prochaine commande conseillée.
