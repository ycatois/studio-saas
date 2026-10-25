---
venture: lanternis
phase: 0 Idée
auteur: challenger
date: 2026-10-25
statut: brouillon
note: première version du pré-mortem, à reprendre et approfondir en phase 1 dans 1-analyse/pre-mortem.md
---

# Lanternis — avocat du diable (objections, pré-mortem, tests)

(H) = hypothèse non vérifiée. Sources : voir `fiche-idee.md` (consultées le 2026-10-25).

## Reformulation en une phrase
Pour le dirigeant d'une société de services B2B de 15 à 100 salariés sans DAF, qui consolide à la main des chiffres éparpillés, Lanternis promet une vue hebdomadaire fiable de la santé de l'entreprise (trésorerie, marge, équipe, commandes) sans projet BI.

> Remarque : l'idée brute (« SI, financier, RH et autre, pour une PME ») est une **catégorie de produit**, pas encore une proposition. Le premier risque est de construire un « Databox français » générique, sans client précis.

## Les 10 objections les plus fortes
| # | Axe | Objection | Gravité |
|---|---|---|---|
| 1 | Usage | **Nice to have, pas une douleur.** Un tableau de bord ne résout aucune obligation et ne fait pas gagner d'argent directement ; on l'ouvre trois semaines puis on l'oublie. L'alternative « rien » gagne souvent (H). | Forte |
| 2 | Marché | **Marché encombré et financé** : Pennylane (compta + tableau de bord, 300+ connecteurs revendiqués par un partenaire), Agicap/Fygr/TurboPilot (trésorerie), Databox (KPI multi-sources, offre gratuite), Fathom (reporting via comptables), Power BI à 14 $/utilisateur. | Forte |
| 3 | Marché | **Risque de plateforme** : Pennylane, PayFit ou Lucca peuvent enrichir leurs propres tableaux de bord ou couper/renchérir l'accès API ; on construit sur le terrain d'autrui (H). | Forte |
| 4 | Technique | **Coût de maintenance des connecteurs** : chaque API change, expire (PayFit ne renvoie pas de refresh token selon Nango, donc réautorisations régulières), limite les volumes. Pour un fondateur seul, 10 connecteurs peuvent consommer l'essentiel du temps (H). | Forte |
| 5 | Technique / légal | **Accès aux logiciels français de paie et de compta** : Silae accessible selon un modèle où le cabinet de paie peut facturer l'accès (Lucca) ; intégration Silae d'Apideck en bêta, salariés seulement ; Cegid « en observation » chez Apideck ; Sage 100 souvent installé localement, donc agent local (Chift). Beaucoup de PME ont une paie externalisée chez leur comptable, donc des données hors de portée (H). | Forte |
| 6 | Usage | **Qualité des données** : un tableau de bord n'a de valeur que si la compta est à jour et catégorisée. Si le comptable saisit au trimestre, Lanternis affiche des chiffres faux ou vides, et la confiance s'effondre (H). | Moyenne à forte |
| 7 | Acquisition | **Pas de canal évident** : le dirigeant de PME est sur-sollicité, l'achat est peu urgent, donc cycle long et CAC élevé. Le meilleur prescripteur (l'expert-comptable) a souvent déjà son outil (Pennylane, Fathom) ou sa propre offre de tableau de bord (H). | Forte |
| 8 | Prix | **Plafond de prix bas** : Databox gratuit jusqu'à 3 sources, Pennylane TPE dès 49 €/mois avec tableau de bord, Looker Studio gratuit. Difficile de justifier 149 € HT/mois sans valeur métier forte (H). | Moyenne |
| 9 | Légal / RGPD | **Données de paie = données personnelles sensibles par nature** (salaires nominatifs, absences, éventuellement arrêts maladie). Exige agrégation, minimisation, sous-traitance RGPD, sécurité de haut niveau ; un incident serait fatal (H). | Moyenne |
| 10 | Fondateur / timing | **Avantage du fondateur non identifié** et produit à large périmètre (SI + finance + RH + autre) : risque de dispersion. Le « pourquoi maintenant » (facturation électronique, API unifiées, LLM) profite aussi, et d'abord, aux acteurs installés. | Forte |

## Pré-mortem : « nous sommes en avril 2028, Lanternis a échoué. Pourquoi ? »
### Scénario 1 — Marché : « joli, mais on n'en a pas besoin »
40 entreprises inscrites en bêta gratuite, 3 converties. Les dirigeants trouvent l'outil joli, puis reviennent à leur Excel ou à l'appli Pennylane. Le tableau de bord n'était pas branché sur une décision récurrente.
- Signaux précoces : en entretien, personne ne cite d'épisode coûteux ; ouverture hebdomadaire < 30 % dès le premier mois.
- Probabilité : **forte** · Impact : fatal.

### Scénario 2 — Acquisition : CAC impayable
LinkedIn et SEO apportent des curieux, pas des acheteurs ; les cabinets comptables refusent de recommander un outil concurrent de leur propre offre. Un client coûte plusieurs mois d'abonnement en temps commercial du fondateur (H).
- Signaux précoces : < 50 inscrits qualifiés en liste d'attente après 6 semaines ; aucun cabinet partenaire après 10 rendez-vous.
- Probabilité : **forte** · Impact : fatal.

### Scénario 3 — Produit : l'enfer des connecteurs
Le fondateur passe 70 % de son temps à réparer des connecteurs (jetons expirés, changement d'API, PME sous Sage installé ou paie chez le comptable). La feuille de route stagne, les clients voient des trous dans les données et résilient (H).
- Signaux précoces : plus de 30 % des prospects ont un outil non couvert ; tickets support majoritairement « données manquantes ».
- Probabilité : **moyenne à forte** · Impact : élevé.

### Scénario 4 — Concurrence / plateforme : Pennylane mange le segment
Pennylane (ou Agicap) sort un module « pilotage dirigeant » incluant RH et CRM, inclus dans l'abonnement. La proposition de Lanternis devient une fonctionnalité gratuite de l'outil déjà payé (H).
- Signaux précoces : annonces produit des acteurs installés ; prospects qui répondent « mon comptable me le fait dans Pennylane ».
- Probabilité : **moyenne** · Impact : élevé.

### Scénario 5 — Finances / exécution : trop large, trop tôt
Pour plaire à « toutes les PME », le MVP couvre SI, finance, RH, commercial avec 15 connecteurs ; 9 mois de développement avant le premier euro, la marge des clients ne couvre ni l'API unifiée ni l'hébergement, et le studio arrête faute de traction (H).
- Signaux précoces : MVP > 3 mois estimé ; coût API unifiée par client > 15 % du prix ; aucun client payant au mois 6.
- Probabilité : **moyenne** · Impact : élevé.

## Tableau des tests rapides
| Risque | Test rapide | Coût | Délai | Critère de réussite |
|---|---|---|---|---|
| Nice to have (obj. 1, scén. 1) | 10 entretiens dirigeants cible, questions sur le dernier épisode concret (pas de démo) | 0 € (temps) | 2–3 semaines | ≥ 6/10 citent un épisode coûteux récent et ≥ 3 h/mois de consolidation |
| Déjà résolu par Pennylane / comptable (obj. 2-3, scén. 4) | Dans les entretiens : faire montrer l'outil actuel ; benchmark des tableaux de bord Pennylane, Agicap, Databox | 0 € | 1 semaine | < 50 % jugent leur outil actuel « suffisant » ; un manque nommé et récurrent |
| Volonté de payer (obj. 8) | Landing avec prix affiché + offre « pilote fondateur » avec lettre d'intention ou acompte remboursable | < 100 € (H) (domaine + annonce test) | 3–4 semaines | ≥ 3 LOI/acomptes ou ≥ 5 % de conversion visiteurs qualifiés vers liste d'attente |
| Connecteurs et accès API FR (obj. 4-5, scén. 3) | Recenser la stack des interviewés ; prototype de lecture Pennylane + Qonto + PayFit (clé client) ; demande de devis Chift et Apideck ; question écrite à Silae sur l'accès partenaire | 0 € à quelques jours de dev | 2 semaines | 5 connecteurs couvrent ≥ 80 % des stacks ; coût API unifiée < 15 % du prix ; Silae accessible sans frais bloquants |
| Qualité des données (obj. 6) | Demander à 5 interviewés la fréquence de mise à jour de leur compta | 0 € | avec les entretiens | ≥ 60 % ont une compta à jour au mois (sinon recentrer sur banque + CRM + RH) |
| Canal comptables (obj. 7, scén. 2) | 5 rendez-vous avec des cabinets (dont Pennylane-partenaires) : « recommanderiez-vous / revendriez-vous ? » | 0 € | 3 semaines | ≥ 1 cabinet prêt à tester sur 3 dossiers clients |
| Canal direct (obj. 7) | 4 semaines de posts LinkedIn ciblés + 1 article SEO + landing | 0 à 200 € (H) | 4–6 semaines | ≥ 50 inscrits qualifiés (taille et secteur conformes) |
| RGPD paie (obj. 9) | Revue juriste-rgpd : n'importer que des agrégats (masse salariale, effectif) en MVP, jamais de salaires nominatifs | 0 € | 1 semaine | Périmètre MVP sans donnée nominative de paie |
| Avantage fondateur / dispersion (obj. 10, scén. 5) | Répondre aux 3 questions de la fiche ; périmètre MVP limité à 3 connecteurs + 10 indicateurs | 0 € | immédiat | Avantage nommé ; MVP estimé ≤ 8 semaines |

## Angles morts à garder en tête
- **« SI » n'est pas défini** : coûts SaaS ? parc ? sécurité ? Selon la réponse, c'est un autre produit (gestion des dépenses SaaS) avec d'autres concurrents.
- **Le vrai concurrent est peut-être l'expert-comptable**, pas un logiciel. Le transformer en canal (modèle Fathom) peut être la seule voie d'acquisition viable : à tester avant d'écrire une ligne de code.
- **Un tableau de bord sans action est un écran de veille** : la valeur se situe probablement dans l'alerte et la recommandation (« relancez ces 3 clients », « ce recrutement fait passer la trésorerie sous zéro en mars »), pas dans le graphique.
