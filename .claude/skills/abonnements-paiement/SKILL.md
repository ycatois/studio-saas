---
name: abonnements-paiement
description: Intégrer les abonnements B2B sur le compte Stripe unique d'Hasteria (multi-marques, mensuel + annuel −20 %, HT + TVA, factures conformes, facturation électronique).
---

# Abonnements B2B — Stripe Billing (compte unique Hasteria, multi-marques)

## Principe multi-marques
- **Un seul compte Stripe : Hasteria SASU facture pour toutes les marques.**
- Chaque *Product*, *Price*, *Customer*, *Subscription* et session Checkout porte la métadonnée `marque=<slug>` ; noms de produits préfixés par la marque (« <Marque> — Plan Pro »).
- Les clés API sont partagées par toutes les ventures : n'en mettre que dans `.env.local` et les secrets GitHub ; préférer des **clés restreintes** (droits minimum) par venture.
- **Webhooks** : un endpoint par venture ; chaque handler ignore tout événement dont la marque n'est pas la sienne (lecture de la métadonnée sur l'abonnement, la facture ou le client). Un même client B2B peut être client de deux marques : un Customer Stripe par marque, rattaché au tenant de la venture.
- **Ce qui reste commun à toutes les marques** (réglage au niveau du compte) : logo et couleurs de Checkout et des factures, descripteur bancaire, configuration du Customer Portal. Prévoir donc une identité « Hasteria » sobre sur ces écrans et faire apparaître la marque dans le nom du produit, la description de la facture et le pied de page (« <Marque> est une marque d'Hasteria SASU »). Le descripteur bancaire doit rester reconnaissable par les clients (ex. préfixe HASTERIA + suffixe court de la marque si la fonction de suffixe dynamique est disponible sur le compte — à vérifier).
- Reporting par marque : chiffre d'affaires, MRR et churn calculés en filtrant sur `marque` (export ou requête API).

## Catalogue
- Pour chaque plan : un *Product* et deux *Prices* récurrents HT — mensuel et annuel (= 12 × mensuel × 0,8, arrondi proprement, ex. 49 €/mois → 470 €/an).
- Essai gratuit si la stratégie tarifaire le prévoit ; coupons de lancement en option (préfixés par la marque).

## Parcours
- Stripe Checkout (mode abonnement) avec collecte de la raison sociale, de l'adresse de facturation et du **numéro de TVA intracommunautaire** ; Customer Portal pour changer de plan, passer en annuel, mettre à jour le moyen de paiement, télécharger les factures, résilier.
- Moyens de paiement : carte ; **prélèvement SEPA** recommandé en B2B.
- Un abonnement par organisation (tenant) ; nombre de sièges si la tarification est par utilisateur.

## TVA et factures (Hasteria est assujettie)
- Prix affichés HT ; TVA 20 % pour les clients en France ; client professionnel d'un autre pays de l'UE avec numéro de TVA valide : autoliquidation (mention « Autoliquidation » sur la facture) ; hors UE : selon les règles applicables. Stripe Tax ou taux configurés à la main — paramétrage à valider avec l'expert-comptable.
- Factures émises par Hasteria SASU avec les mentions obligatoires (SIREN, n° TVA, adresse, numérotation continue unique pour toutes les marques, date, désignation, HT/TVA/TTC, pénalités de retard et indemnité forfaitaire de 40 € en B2B) ; la marque apparaît comme nom commercial.
- **Facturation électronique** : émission obligatoire pour Hasteria au 1er septembre 2027 → prévoir l'export ou la connexion des factures Stripe vers une plateforme agréée ; à intégrer dans la roadmap.

## Technique
- Webhooks signés et idempotents : `checkout.session.completed`, `customer.subscription.created/updated/deleted`, `invoice.paid`, `invoice.payment_failed`, `customer.subscription.trial_will_end` — filtrés par `marque`.
- Droits d'accès dérivés de l'état de l'abonnement (actif, essai, impayé avec période de grâce, résilié en fin de période).
- Relances d'impayés (Smart Retries + emails Mailjet aux couleurs de la marque), mode test complet avant la prod, puis un vrai paiement de faible montant.
