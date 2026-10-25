---
venture: lanternis
phase: 1 Analyse
date: 2026-10-25
statut: brouillon
---

# Synthèse de l'analyse — Lanternis

Sources : [pre-mortem.md](pre-mortem.md), [jtbd.md](jtbd.md), [faisabilite.md](faisabilite.md), [modele-revenus.md](modele-revenus.md). Tous les chiffres ci-dessous sont des hypothèses (H), sauf mention contraire dans ces documents.

## Recentrage proposé
L'idée de départ était un tableau de bord global (SI, finance, RH). L'analyse converge vers un **« DSI de poche »** pour les PME et structures de l'ESS sans DSI :
- **Cœur du produit : le volet SI** (actifs, licences et abonnements, contrats, fournisseurs, sécurité, arrivées et départs). C'est là que se trouvent l'avantage du fondateur et une concurrence faible pour un dirigeant non technicien.
- **La finance n'y entre que par le coût du SI** : abonnements, renouvellements, coût par salarié. Le tableau de bord financier généraliste est déjà occupé (Pennylane, Agicap, Fathom).
- **La valeur passe par les alertes** (renouvellement, licence inutilisée, départ non traité) plutôt que par la consultation.
- **L'onboarding est assisté** (import de l'Excel existant, détection des abonnements), pour éviter le « cockpit vide ».

## MVP pressenti (H)
- Référentiel SI (repris du module métier de Cockpit DSI, après revue), avec import CSV/Excel.
- Connecteurs Microsoft 365 / Google Workspace (utilisateurs, licences) et Qonto ou Pennylane (détection des abonnements SaaS).
- 12 à 15 indicateurs, 3 tableaux de bord, alertes par email.
- Effort : 8 à 10 semaines à temps plein, à doubler à mi-temps. Variante : pilote « concierge » sans connecteur en 2 à 3 semaines.

## Économie (H)
- Paliers selon le nombre de salariés : 149 / 249 / 399 € HT par mois, annuel −20 %, remise ESS de 15 %.
- Revenu moyen d'environ 210 € par client et par mois ; 48 clients pour 10 k€ de MRR ; marge brute de 67 à 81 %.
- Services en complément (mise en place, état des lieux SI, DSI à temps partagé).

## Les 3 risques à lever en phase Marché
1. **Douleur et volonté de payer pour le volet SI.** Les dirigeants sans DSI ressentent-ils assez la perte de maîtrise de leur informatique pour payer 149 à 249 € HT par mois, alors que le concurrent réel est « rien + le prestataire informatique » ? → 10 à 15 entretiens (méthode Mom Test, à commencer par le réseau Tecnoo et l'ESS), puis landing de validation avec liste d'attente et précommandes.
2. **Cockpit vide et produit hybride.** Le client tiendra-t-il ses données à jour sans aide, ou faut-il vendre un accompagnement (logiciel + service) ? → Dans les entretiens, mesurer l'existant (Excel, rien) et l'appétence pour une mise en place payante ; tester un pilote concierge sur 2 ou 3 structures.
3. **Capacité d'acquisition du fondateur.** Il faut environ 23 h de vente par client et 3 jours par semaine pour 10 k€ de MRR, en plus du rôle de directeur technique de Tecnoo. → Chiffrer le temps réellement disponible ; tester des canaux à moindre effort (réseaux ESS, prestataires informatiques prescripteurs, contenu sur NIS2 et la cybersécurité des PME).

## Questions à trancher par le fondateur
- Temps disponible pour Lanternis par rapport à Tecnoo.
- Propriété du code de Cockpit DSI (Tecnoo ou le fondateur) et cession éventuelle à Hasteria.
- Modèle hybride logiciel + service : qui facture l'accompagnement, Hasteria ou Tecnoo ?
