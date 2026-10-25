---
name: nouvelle-marque-hasteria
description: Préparer le lancement d'une nouvelle marque SaaS d'Hasteria : nom, disponibilité, domaine, Stripe, Mailjet, réseaux, mentions.
---

# Nouvelle marque d'Hasteria
Checklist à dérouler au GO (ou dès le pré-lancement pour le nom et le domaine) :
1. **Nom** : 5 à 10 propositions (brand-manager) ; vérification indicative de disponibilité : recherche de marques similaires (base INPI et EUIPO) dans les classes 9, 35, 42 ; domaine `.fr`/`.com` ; comptes LinkedIn / réseaux. Signaler qu'un avis de conseil en propriété industrielle est recommandé avant dépôt.
2. **Dépôt de marque** (si GO confirmé) : classes pertinentes, au nom d'Hasteria SASU — action à faire par l'utilisateur.
3. **Domaine** chez OVH + enregistrements DNS (skill dns-domaines-ovh).
4. **Stripe** (compte unique d'Hasteria) : créer les *Products* et *Prices* de la marque avec la métadonnée `marque=<slug>`, un endpoint de webhook dédié à la venture, une clé restreinte pour la venture ; vérifier que le nom de la marque apparaît bien sur Checkout, les factures et les emails.
5. **Mailjet** : sous-compte ou domaine expéditeur authentifié pour la marque.
6. **Réseaux** : page LinkedIn de la marque, éventuellement d'autres canaux selon la cible.
7. **Légal** : mentions légales, CGV, politique de confidentialité au nom d'Hasteria pour la marque ; ligne ajoutée dans `SOCIETE.md` et `INFRA.md`.
Toutes les créations de comptes et achats sont faits par l'utilisateur ; Claude prépare les informations et vérifie.
