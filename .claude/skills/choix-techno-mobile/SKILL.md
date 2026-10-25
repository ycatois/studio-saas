---
name: choix-techno-mobile
description: Choisir entre PWA, Flutter et natif Android pour l'application mobile d'une venture, et consigner l'ADR.
---

# Choix mobile : PWA, Flutter ou natif Android
Réponds d'abord à ces questions (avec l'utilisateur si besoin) :
1. Faut-il être présent sur l'App Store / le Play Store (découverte, crédibilité, exigence client) ?
2. Fonctions natives nécessaires : notifications fiables sur iOS, accès Bluetooth/NFC, arrière-plan, capteurs, hors-ligne lourd ?
3. Cible iOS, Android ou les deux ? Terrain (usage mobile majoritaire) ou bureau ?
4. Capacité de maintenance : une seule base de code ou deux ?
Grille par défaut :
- **PWA** (recommandé pour un MVP) : même code que l'app web, installation depuis le navigateur, mises à jour instantanées, aucun frais de store, le plus sobre. Limites : notifications et intégration iOS plus restreintes, pas de présence en store (sauf emballage type TWA sur le Play Store).
- **Flutter** : une base de code iOS + Android, présence en store, accès natif ; coût : une deuxième base de code et la publication sur les stores.
- **Natif Android** (Kotlin) : uniquement si la cible est Android et qu'un besoin natif précis l'impose.
Sortie : ADR `produit/docs/adr/NNNN-mobile.md` avec la décision, ce qui la ferait changer, et l'impact sur l'arborescence (`apps/mobile` créé ou non).
