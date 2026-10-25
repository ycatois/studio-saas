---
venture: pilotis
phase: 1 Analyse
auteur: challenger
date: 2026-10-25
statut: brouillon
sources: voir fin de document (consultées le 2026-10-25)
---

# Lanternis : pré-mortem (phase 1)

> Ce document reprend et approfondit l'ébauche de `0-idee/avocat-du-diable.md` en tenant compte du cadrage du fondateur (`0-idee/reponses-fondateur.md`) : volet SI « DSI de poche » comme différenciateur, cible PME et ESS d'environ 20 à 250 salariés sans DSI, vente directe avec remise ESS.
> **(H)** = hypothèse non vérifiée. Aucun chiffre de marché nouveau n'est avancé sans source.

## 1. Reformulation en une phrase (nouveau cadrage)
**Pour** le dirigeant (et son responsable administratif et financier) d'une PME ou d'une structure de l'ESS de 20 à 250 salariés **qui n'a ni DSI ni directeur technique**, **qui** ne sait pas vraiment ce que son système d'information contient, ce qu'il coûte, qui le maîtrise ni s'il est protégé, **Lanternis promet** un « DSI de poche » : un cockpit qui recense actifs, contrats, abonnements, fournisseurs, échéances et niveau de sécurité, avec les rituels de pilotage d'un DSI expérimenté, puis le relie aux chiffres clés de la finance et des RH.

### Ce qui change par rapport à l'ébauche de phase 0
| Sujet | Phase 0 (fiche idée) | Phase 1 (après réponses du fondateur) | Effet sur le risque |
|---|---|---|---|
| Différenciation | Indicateurs croisés finance/RH pour sociétés de services | Volet SI de gouvernance, porté par 25 ans d'expérience du fondateur | Concurrence frontale avec Pennylane/Agicap réduite **si** le SI est au cœur ; elle reste entière si la finance l'est |
| Avantage fondateur | Non identifié | DSI/CTO expérimenté, prototype « Cockpit DSI » sur la stack du studio, vivier de clients Dolibarr de Tecnoo | Le risque « pourquoi toi » baisse fortement sur le SI, pas sur la finance |
| Cible | Services B2B, 15–100 salariés | PME + ESS, 20–250 salariés, sans DSI | Cible plus large et plus hétérogène : risque de dispersion accru |
| Canal | Experts-comptables envisagés | Vente directe, remise ESS | Pas de dépendance aux cabinets, mais CAC entièrement porté par le fondateur |
| Données | Surtout via API (compta, paie, banque) | Volet SI largement **déclaratif** (contrats, actifs, échéances) + quelques API | Moins de risque « enfer des connecteurs », plus de risque « saisie fastidieuse, base vite périmée » |

## 2. Les 10 objections les plus fortes (mises à jour)
| # | Axe | Objection | Gravité |
|---|---|---|---|
| 1 | Usage | **Le dirigeant sans DSI ne veut pas un outil, il veut que quelqu'un s'en occupe.** Un cockpit SI suppose que quelqu'un le remplisse et le tienne à jour ; dans une PME sans DSI, cette personne n'existe pas, par définition. Risque d'un outil vide au bout de 2 mois (H). | Forte |
| 2 | Produit | **Deux produits en un.** « DSI de poche » et « tableau de bord financier/RH » ont des acheteurs, des concurrents, des données et des rythmes d'usage différents. Les faire ensemble dans un MVP de fondateur seul double l'effort et brouille le message (H). | Forte |
| 3 | Usage | **Fréquence d'usage faible du volet SI.** Contrats, licences et échéances bougent au trimestre ou à l'année. Un outil ouvert 4 fois par an se résilie facilement (H) ; la valeur doit venir des **alertes** (échéance, renouvellement tacite, domaine qui expire, sauvegarde non testée), pas de la consultation. | Forte |
| 4 | Concurrence | **Le prestataire informatique (infogéreur) détient déjà la connaissance** et parfois un outil (GLPI, RMM). Il peut voir Lanternis comme une menace (transparence sur ses coûts) et le freiner, ou au contraire le proposer lui-même. Alternatives publiques : GLPI Network Cloud à 19 € HT par agent IT et par mois, utilisateurs finaux gratuits (glpi-project.org) ; DSI à temps partagé, 800 à 1 500 €/jour selon un article du Monde Informatique (date de l'article non visible) ; diagnostic cyber gratuit MonAideCyber de l'ANSSI. | Moyenne à forte |
| 5 | Acquisition | **Vente directe = CAC porté par le seul fondateur.** Sans prescripteur, chaque client demande prospection, démo, onboarding. Le fondateur est aussi CTO de Tecnoo SAS : la disponibilité pour vendre **et** construire n'est pas établie (H). | Forte |
| 6 | Prix | **ESS : budget serré, décision collégiale, remise.** Les associations décident souvent en bureau ou conseil d'administration, avec un cycle long ; la remise ESS réduit l'ARPU sur un segment déjà peu solvable (H). | Moyenne |
| 7 | Marché | **« 20 à 250 salariés sans DSI » recouvre deux réalités.** Vers 20–50 salariés, l'informatique est souvent entièrement externalisée ; vers 150–250, il existe souvent un responsable informatique ou un technicien interne, qui devient l'utilisateur, voire l'acheteur (H). Le segment réel du « sans DSI » est à mesurer. | Moyenne à forte |
| 8 | Technique | **Le prototype « Cockpit DSI » a été conçu pour l'usage interne d'une ESN.** Multi-locataire, droits, isolation des données, onboarding en libre-service, RGPD : la réutilisabilité n'est pas démontrée (H). Il peut aussi orienter le produit vers le besoin d'un DSI, pas celui d'un dirigeant non technicien. | Moyenne |
| 9 | Légal / confiance | **Un inventaire SI est une carte d'attaque.** Liste des actifs, fournisseurs, comptes d'administration, failles connues : une fuite serait fatale à Lanternis et au client. Il ne faut **jamais** stocker de secrets (mots de passe, clés) et il faut un niveau de sécurité supérieur au client moyen (H). Données de paie : mêmes réserves qu'en phase 0 (agrégats uniquement). | Moyenne à forte |
| 10 | Timing / légal | **La pression réglementaire cyber est réelle mais incertaine.** La transposition française de NIS2 (projet de loi « résilience ») n'était pas promulguée selon les sources consultées ; elle était annoncée à l'Assemblée nationale à partir d'octobre 2026 (next.ink), et la Commission européenne aurait saisi la CJUE contre la France pour défaut de transposition le 8 juillet 2026 (relais de recherche, non vérifié sur source primaire). Le périmètre exact pour les PME (secteurs, seuils) est à vérifier sur le texte final (H). Construire le récit commercial sur NIS2 est donc un pari de timing. | Moyenne |

**Objection retirée ou affaiblie depuis la phase 0 :** « avantage fondateur non identifié » (objection 10 de l'ébauche) ne tient plus pour le volet SI. Elle tient toujours pour la finance : rien dans le profil ne donne un avantage sur Pennylane, Agicap ou Fathom, hormis l'expérience du contrôle de gestion chez Renault.

## 3. Pré-mortem : « nous sommes en avril 2028, Lanternis a échoué. Pourquoi ? »

### Scénario 1 (produit / usage) : le cockpit vide
Les 15 premiers clients, souvent issus du réseau Tecnoo, ont été enthousiastes à la démo. Trois mois plus tard, la moitié des inventaires sont incomplets : personne en interne n'a le temps ni la compétence de saisir contrats, licences et actifs, et le prestataire informatique ne joue pas le jeu. Sans données, pas d'alertes ; sans alertes, pas de raison d'ouvrir l'outil. Les résiliations arrivent au premier renouvellement annuel.
- **Signaux précoces :** temps d'onboarding > 1 journée de travail du client ; < 50 % des comptes ont ≥ 20 éléments saisis à J+30 ; le fondateur remplit lui-même les inventaires « pour dépanner ».
- **Probabilité :** forte · **Impact :** fatal.
- **Parade à tester :** onboarding « fait pour vous » (import d'un Excel, relevés bancaires, factures fournisseurs pour détecter les abonnements), session de cadrage d'une demi-journée vendue ou incluse ; inventaire minimal viable (20 éléments qui comptent, pas 500).

### Scénario 2 (marché / positionnement) : le produit à deux têtes
Pour tenir la promesse initiale « SI, financier, RH et autre », le MVP a livré un volet SI correct **et** un tableau de bord financier moyen. Le message commercial (« DSI de poche + pilotage global ») n'a convaincu personne : les dirigeants comparaient la partie finance à Pennylane, qu'ils avaient déjà via leur comptable, et ne voyaient pas l'intérêt de payer deux fois. Le volet SI, vraiment différenciant, était noyé.
- **Signaux précoces :** en entretien, les dirigeants citent spontanément des douleurs SI **ou** finance, rarement les deux ; les démos dérivent sur « mon comptable me fait déjà ça » ; la feuille de route contient plus de connecteurs finance que de fonctions SI.
- **Probabilité :** forte si rien n'est tranché · **Impact :** élevé.
- **Parade à tester :** deux landings ou deux accroches A/B (« DSI de poche » contre « tableau de bord du dirigeant ») sur la même audience ; garder la finance limitée au **coût du SI** et à quelques agrégats en MVP.

### Scénario 3 (acquisition) : le fondateur ne peut pas être partout
Le vivier Tecnoo a apporté 10 à 20 clients, puis plus rien. La vente directe aux PME et à l'ESS demandait de la prospection, des salons, des réseaux (fédérations ESS, CPME, clubs de dirigeants) que le fondateur, par ailleurs CTO de Tecnoo, n'avait pas le temps de faire. Le CAC réel, en heures de fondateur, dépassait plusieurs mois d'abonnement (H).
- **Signaux précoces :** < 30 % de réponses positives aux demandes d'entretien dans le réseau Tecnoo ; aucun relais (fédération, réseau ESS, prestataire informatique partenaire) après 2 mois ; plus de 3 rendez-vous nécessaires par vente.
- **Probabilité :** forte · **Impact :** fatal.
- **Parade à tester :** quantifier le temps hebdomadaire réellement disponible ; tester 1 ou 2 relais collectifs (réseaux ESS, prestataires informatiques indépendants qui revendraient l'outil à leurs clients) avant de coder.

### Scénario 4 (modèle économique) : un service déguisé en SaaS
Les clients qui restent sont ceux à qui le fondateur consacre une demi-journée par mois : revue des contrats, conseil sur un projet, arbitrage fournisseur. Lanternis est devenu un cabinet de DSI à temps partagé outillé, rentable par client mais non scalable, et en concurrence avec les offres de DSI à temps partagé facturées à la journée. L'abonnement logiciel seul (prix H) ne couvre pas ce temps ; la remise ESS aggrave l'écart.
- **Signaux précoces :** les prospects demandent « qui va le remplir ? », « vous pouvez venir faire le point ? » ; le temps passé par client et par mois dépasse 2 h (H) ; churn faible chez les clients accompagnés, fort chez les autres.
- **Probabilité :** moyenne à forte · **Impact :** élevé (pas fatal : c'est peut-être un pivot viable, mais ce n'est plus un SaaS).
- **Parade à tester :** offre explicite en deux étages (abonnement logiciel + forfait d'accompagnement optionnel) testée en entretien ; décider tôt si l'hybride service + logiciel est assumé.

### Scénario 5 (exécution / technique) : la base réutilisée devient un boulet
Le prototype « Cockpit DSI » a été repris pour gagner du temps. Son modèle de données, pensé pour une ESN qui gère son propre SI, ne supportait ni le multi-locataire propre, ni des utilisateurs non techniciens, ni les exigences de sécurité d'un service hébergé contenant la cartographie SI de dizaines de clients. Six mois ont été perdus à refondre, et un audit sécurité a révélé des faiblesses qui ont fait fuir deux clients ESS sensibles (données de bénéficiaires dans le périmètre).
- **Signaux précoces :** revue d'architecture qui conclut « réécriture > 50 % » ; absence de tests automatisés sur le prototype (H) ; questions de sécurité des prospects auxquelles on ne sait pas répondre (hébergement, chiffrement, sauvegardes, journalisation).
- **Probabilité :** moyenne · **Impact :** élevé.
- **Parade à tester :** revue du prototype par l'architecte (1 à 2 jours) avant toute décision de réutilisation ; règle produit « aucun secret stocké » ; hébergement France sur VPS OVH (cadre du studio) comme argument, à condition d'être irréprochable.

### Scénario 6 (bonus, plateforme / timing) : le pari NIS2 tombe à plat
Le marketing a misé sur « mettez-vous en conformité NIS2 ». La loi a été adoptée plus tard que prévu, avec un périmètre qui exclut la majorité de la cible (H), et les PME concernées sont parties chez des cabinets cyber ou vers les dispositifs publics gratuits (MonAideCyber, ReCyF de l'ANSSI publié le 17 mars 2026 selon les sources consultées).
- **Signaux précoces :** < 20 % des interviewés connaissent NIS2 ou se pensent concernés (H) ; les prospects comparent Lanternis à un diagnostic gratuit.
- **Probabilité :** moyenne · **Impact :** moyen (le récit commercial change, le produit survit).
- **Parade :** s'appuyer sur MonAideCyber et le ReCyF comme **référentiels importés** dans Lanternis (suivi des 6 mesures du diagnostic MonAideCyber), pas comme concurrents ; ne pas faire de NIS2 l'argument principal.

## 4. Tableau des risques
Probabilité et impact : estimations qualitatives du challenger **(H)**. Coûts : temps du fondateur, sauf mention.

| # | Risque | Proba. | Impact | Test pour le lever | Coût | Délai | Critère de réussite |
|---|---|---|---|---|---|---|---|
| R1 | Le dirigeant sans DSI ne remplira pas l'outil (cockpit vide) | Forte | Fatal | 5 entretiens « inventaire en direct » : demander au dirigeant ou au RAF de lister en 30 min ses contrats, abonnements, fournisseurs et échéances informatiques ; mesurer ce qu'il sait et où sont les infos | 0 € | 2 semaines | ≥ 3/5 ne peuvent pas lister plus de la moitié **et** veulent qu'on les aide à le faire ; les sources (factures, relevés, prestataire) sont identifiables |
| R2 | Douleur SI trop faible ou trop rare pour payer | Forte | Fatal | 10 entretiens JTBD (voir `jtbd.md`) centrés sur le dernier incident : renouvellement subi, domaine expiré, départ d'un salarié « qui savait », sauvegarde absente, cyberattaque, dépendance au prestataire | 0 € | 2–3 semaines | ≥ 6/10 citent un épisode des 12 derniers mois avec un coût estimable (argent, temps, risque) |
| R3 | Produit à deux têtes : SI et finance dilués | Forte | Élevé | Test d'accroche A/B : deux versions de la landing (« DSI de poche » / « tableau de bord du dirigeant ») sur la même audience LinkedIn et réseau Tecnoo ; en entretien, faire classer 6 promesses | < 150 € (H) (annonces test) | 3–4 semaines | Une accroche obtient nettement plus d'inscrits qualifiés (seuil à fixer avec le strategiste-marketing) ; classement cohérent en entretien |
| R4 | Acquisition directe trop coûteuse en temps fondateur | Forte | Fatal | (a) Le fondateur déclare par écrit ses heures hebdomadaires disponibles pour Lanternis sur 12 mois ; (b) 20 demandes d'entretien au vivier Tecnoo ; (c) 3 contacts avec des relais collectifs (réseau ESS régional, club de dirigeants, prestataires informatiques indépendants) | 0 € | 3 semaines | (a) ≥ 2 jours/semaine (H, seuil à valider) ; (b) ≥ 10 entretiens obtenus ; (c) ≥ 1 relais prêt à diffuser ou co-organiser un atelier |
| R5 | Service déguisé en SaaS (marge et scalabilité) | Moyenne à forte | Élevé | Proposer en fin d'entretien 2 offres chiffrées (logiciel seul / logiciel + accompagnement trimestriel), prix en (H) ; noter laquelle est choisie et pourquoi | 0 € | avec R2 | Si ≥ 70 % choisissent l'accompagnement : assumer un modèle hybride et le modéliser avec l'analyste-finance avant le bilan |
| R6 | Fréquence d'usage trop faible (outil ouvert 4 fois par an) | Forte | Élevé | Dans les entretiens : lister les événements SI d'une année (échéances, renouvellements, arrivées/départs, incidents) ; prototype papier d'un email d'alerte mensuel | 0 € | avec R2 | ≥ 1 événement actionnable par mois en moyenne (H) chez la majorité des interviewés |
| R7 | Segment « sans DSI » mal découpé (20–50 externalisé, 150–250 avec technicien) | Moyenne à forte | Élevé | Grille de qualification dans les entretiens : effectif, qui s'occupe de l'informatique, prestataire, budget SI connu ou non ; viser au moins 3 entretiens par tranche (20–50, 50–150, 150–250) | 0 € | avec R2 | Une tranche montre une douleur nettement plus forte : elle devient la cible du MVP |
| R8 | Prestataire informatique bloquant (ou concurrent) | Moyenne | Élevé | 3 entretiens avec des infogéreurs / prestataires de PME : « verriez-vous ça comme une menace, un outil, une offre à revendre ? » | 0 € | 2 semaines | ≥ 1 sur 3 prêt à tester avec un client ; aucun ne le juge bloquant par nature |
| R9 | Prototype « Cockpit DSI » non réutilisable | Moyenne | Élevé | Revue d'architecture par l'agent architecte : multi-locataire, droits, tests, sécurité, modèle de données dirigeant vs DSI | 0 € (1–2 jours) | 1 semaine | Réutilisation ≥ 50 % estimée, ou décision explicite de réécrire avec le prototype comme maquette fonctionnelle |
| R10 | Sécurité et confiance : l'inventaire SI comme carte d'attaque | Moyenne | Fatal en cas d'incident | Revue juriste-rgpd + securite : liste des données interdites (secrets, mots de passe, données de bénéficiaires), modèle de menace, engagements affichables (hébergement France, chiffrement, sauvegardes) ; demander à 5 prospects ESS leurs exigences | 0 € | 1–2 semaines | Périmètre MVP sans aucun secret stocké ; réponses prêtes aux 10 questions de sécurité les plus posées |
| R11 | Solvabilité ESS et effet de la remise | Moyenne | Moyen | 5 entretiens avec des directeurs ou trésoriers d'associations employeuses : ligne budgétaire informatique, qui décide, cycle de décision, financements mobilisables (H) | 0 € | 3 semaines | ≥ 3/5 ont une ligne budgétaire identifiable et une décision possible en < 3 mois |
| R12 | Pari NIS2 / timing réglementaire | Moyenne | Moyen | Suivre l'état du projet de loi sur le site de l'Assemblée nationale et Légifrance ; question NIS2 dans chaque entretien | 0 € | continu | Ne pas faire de NIS2 l'argument principal tant que le texte n'est pas promulgué et le périmètre PME vérifié |
| R13 | Finance déjà résolue (Pennylane, comptable) | Moyenne | Moyen (si la finance reste secondaire) | Repris de la phase 0 : faire montrer l'outil financier actuel en entretien | 0 € | avec R2 | Si < 50 % jugent leur outil suffisant, la finance peut redevenir un axe ; sinon, finance limitée au coût du SI |

### Ordre recommandé des tests (4 à 6 semaines, avant tout développement)
1. **Semaine 1 :** R4a (disponibilité fondateur), R9 (revue du prototype), R12 (veille), préparation du script d'entretien à partir de `jtbd.md`.
2. **Semaines 1–4 :** 10 à 15 entretiens dirigeants/RAF (R1, R2, R5, R6, R7, R11, R13), dont 3 à 5 ESS ; 3 entretiens prestataires (R8).
3. **Semaines 3–6 :** landing de validation avec deux accroches (R3), uniquement en brouillon tant que l'utilisateur n'a pas validé la publication.

## 5. Recommandation du challenger sur le cœur du MVP
**Le volet SI doit être le cœur du MVP ; la finance doit y entrer seulement par la porte du coût du SI.**
- C'est là que se trouve l'avantage déloyal (expérience du fondateur, prototype, vivier Tecnoo), et là que la concurrence directe est la plus faible pour un dirigeant non technicien (GLPI et les outils de parc visent les techniciens ; les tableaux de bord financiers sont nombreux et financés).
- La finance « complète » (trésorerie, marge, masse salariale) recrée le scénario 2 et l'enfer des connecteurs de la phase 0 sans avantage particulier.
- Le pont naturel entre les deux est **« combien me coûte mon SI, et qu'est-ce que je paie pour rien »** : abonnements SaaS, contrats, renouvellements, rapportés à l'effectif. C'est un chiffre que le dirigeant comprend, que le comptable ne fournit pas sous cette forme (H), et qui donne une raison financière d'acheter.
- **Condition :** le MVP ne vaut que si l'onboarding est assisté (import, détection depuis factures ou relevés, accompagnement initial) et si la valeur passe par des **alertes et une revue périodique**, pas par la consultation d'un tableau de bord. À valider par R1, R2 et R6 avant toute ligne de code.
- **Point ouvert pour l'utilisateur :** le modèle hybride logiciel + accompagnement (scénario 4) est-il acceptable, voire souhaité, compte tenu du lien avec Tecnoo ? Cela change le prix, la marge et la nature de la venture.

## 6. Hypothèses non vérifiées signalées
- Toutes les probabilités et impacts du tableau sont des jugements qualitatifs (H).
- Disponibilité du fondateur, réutilisabilité du prototype, existence de tests automatisés : non connues (H).
- Statut NIS2 : issu de résultats de recherche (articles de presse et trackers), non vérifié sur Légifrance ni sur le site de l'Assemblée nationale.
- Tarif DSI à temps partagé : article du Monde Informatique dont la date n'est pas visible, donc à considérer comme ancien.
- Seuils de réussite des tests (2 jours/semaine, 1 événement par mois, 70 %) : proposés par le challenger (H), à ajuster avec l'utilisateur.

## Sources (consultées le 2026-10-25)
- GLPI Network Cloud, tarifs : https://glpi-project.org/pricing ; FAQ cloud vs auto-hébergé : https://help.glpi-project.org/faq/fr/glpi/cloud_vs_self-hosted
- DSI à temps partagé, fourchette 800–1 500 €/jour : https://www.lemondeinformatique.fr/actualites/lire-l-avenir-du-dsi-passe-t-il-par-le-temps-partage-67793.html (date de publication non visible)
- MonAideCyber (diagnostic gratuit ANSSI, 6 mesures, suivi à 6 mois), relais : https://www.economie.gouv.fr/entreprises/cybersecurite-des-dispositifs-publics-gratuits-pour-vous-accompagner ; https://www.fiducial.fr/Articles-et-dossiers/MonAideCyber-Diagnostic-gratuit-pour-proteger-les-TPE-PME
- NIS2, transposition française : https://next.ink/brief-article/alleluia-la-transposition-de-nis2-est-enfin-a-lordre-du-jour-de-lassemblee-nationale/ ; https://www.banquedesterritoires.fr/cybersecurite-la-csnp-presse-le-parlement-dexaminer-sans-delai-le-projet-de-loi-de-resilience ; tracker : https://www.risidata.com/de/regulations/nis2/countries/fr
- Sources de phase 0 (Pennylane, Agicap, Databox, Fathom, Chift, Apideck, PayFit, Silae) : voir `0-idee/fiche-idee.md`.
