---
name: identite-visuelle
description: Construire la charte graphique complète d'une marque à partir de la piste choisie (logo, couleurs, typo, grille, iconographie, images, usages, déclinaisons).
---

# Charte graphique
Livrables dans `marque/charte/` :
1. `charte.md` — la référence écrite :
   - **Logo** : versions (principale, horizontale, monogramme/symbole), zone de protection, taille minimale, fonds autorisés, interdits (déformer, recolorer, ombrer…).
   - **Couleurs** : primaire, secondaire, accent, neutres, états (succès, alerte, erreur, info) — hex, RVB ; contrastes texte/fond vérifiés AA ; versions mode sombre.
   - **Typographies** : titres, texte, chiffres/code ; échelle (tailles, graisses, interlignage) web et documents ; polices de secours.
   - **Grille et espacements**, rayons, ombres (ou leur absence).
   - **Iconographie** et **illustrations** (style, épaisseur de trait, sources autorisées).
   - **Images** : style photo / captures produit, traitement, ce qu'on évite (banques d'images clichés).
   - **Ton visuel** en 3 adjectifs + exemples à faire / à ne pas faire.
   - **Applications** : app, vitrine, emails, documents PDF/Word, présentations, réseaux sociaux, factures (rappel : Checkout et factures Stripe affichent l'identité Hasteria commune).
2. `tokens.css` et `tokens.json` — variables de design réutilisées par l'app (design-system), la vitrine, les gabarits de documents et les visuels marketing.
3. `charte.html` — version visuelle de la charte (planche autonome) ; `charte.pdf` généré via la boîte à outils (skill documents-generes).
4. Fichiers du logo (skill logo) et icônes (skill iconographie-illustrations).
Le design system de l'application (agent ui-designer) **dérive** de cette charte : une seule source de vérité, `tokens.json`.
