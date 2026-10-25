---
venture: lanternis
phase: 2 Marché
auteur: analyste-marche
date: 2026-10-25
statut: brouillon
méthode: skill personas
---

# Lanternis : personas

> **Fondement.** Chaque trait renvoie à un signal de `signaux-demande.md` (S1 à S12) ou à `tendances.md`. Ce qui n'est appuyé par aucun signal est marqué **(H)**. Aucun entretien n'a encore eu lieu : ces personas sont des **hypothèses de ciblage**, à réécrire avec les verbatims des 10 à 15 entretiens (`script-interview.md`).
> **Vocabulaire :** les « mots qu'il emploie » viennent des offres d'emploi et des baromètres cités. Aucun verbatim spontané de forum n'a été trouvé (voir `signaux-demande.md` § 3).

## Vue d'ensemble
| | P1 : Marc, dirigeant de PME | P2 : Nadia, DAF d'une association médico-sociale | P3 : Sophie, office manager « informaticienne par défaut » |
|---|---|---|---|
| Structure | PME de services ou d'industrie, 50 à 150 salariés | Association gestionnaire d'ESMS, 60 à 200 salariés | PME ou association de 20 à 60 salariés |
| Rôle dans l'achat | **Décide et paie** | **Prescrit, porte le budget** ; le directeur général et le bureau valident | **Utilise** ; influence ; ne décide pas |
| Segment SAM | PME 50–249 (≈ 16 400 sans DSI, H) | ESS 50–249 (≈ 3 300, H) et ESS 20–49 (≈ 8 350, H) | Hors SAM marchand (PME 20–49) ; dans le SAM pour l'ESS 20–49 |
| Solidité des signaux | Moyenne à forte (S1, S2, S4) | Moyenne (S3, S10, S11, tendance 6) | **Faible** (S12, sources anciennes) |
| Priorité de test | 1 | 2 | 3 (à confirmer ou supprimer) |

---

## P1. Marc, dirigeant d'une PME de 50 à 150 salariés sans DSI
**Identité de travail.** Gérant ou PDG d'une PME de services B2B ou d'industrie légère. L'informatique est confiée à un **prestataire d'infogérance** et, parfois, à un technicien interne ou à un salarié « qui s'y connaît ». Il n'est pas technicien. (S1, S2)

**Contexte déclencheur typique.** Son responsable informatique **part à la retraite** ou démissionne, et il découvre que la connaissance du SI partait avec lui. Les offres d'octobre 2026 décrivent exactement ce cas (S2 : « dans le cadre du départ à la retraite de son Responsable Informatique » ; « Entreprise industrielle de 150 collaborateurs »).

**Objectifs**
- Ne plus dépendre d'une seule personne ni d'un seul prestataire (job 1 de `jtbd.md`).
- Savoir combien coûte l'informatique et supprimer le superflu (job 2).
- Pouvoir répondre à un assureur, à un client grand compte ou à la banque sur la sécurité (job 3).

**Frustrations (avec signaux)**
- Se sait exposé sans savoir l'évaluer : 44 % des dirigeants se jugent fortement exposés, près de 6 sur 10 ne sauraient pas évaluer les conséquences d'une attaque (S1).
- S'en remet au prestataire, juge et partie : 39 % s'adressent d'abord à lui (S1).
- Recruter un profil informatique est long et cher : 54 % des 50–249 qui cherchent ont des difficultés ; salaires de 45 à 75 k€ (S2).
- Petites structures surreprésentées parmi les victimes de rançongiciels (S4).

**Jobs-to-be-done :** jobs 1, 2, 3 et 4 de `jtbd.md` ; job 6 (arrivées et départs) pour la récurrence.

**Déclencheurs d'achat (H sauf mention)**
- Départ du référent informatique (S2).
- Incident ou quasi-incident chez lui ou chez un voisin (S1, S4).
- Questionnaire de sécurité d'un client ou d'un assureur (H).
- Changement de prestataire ou renouvellement du contrat d'infogérance (H).
- Revue des outils de facturation imposée par la réforme de septembre 2027 (tendance 4, H).

**Freins et objections typiques (H, issues de `jtbd.md` § 5)**
- « Mon prestataire s'en occupe. »
- « Encore un outil à remplir : qui va le tenir à jour ? »
- « Je préfère recruter quelqu'un. » Réponse : Lanternis + 0,5 j/mois de DSI à temps partagé coûte une fraction d'un poste à 45–75 k€ (S2), à valider.
- « Confier la carte de mon SI à une petite structure ? » (`pre-mortem.md`, R10).

**Où il s'informe (H, à vérifier en entretien)**
- Réseaux patronaux qui co-signent le baromètre Cybermalveillance : CPME, MEDEF, U2P (S1).
- Son expert-comptable, son banquier, son assureur.
- LinkedIn, presse économique régionale, clubs de dirigeants.
- Dispositifs publics : Cybermalveillance.gouv.fr, MonAideCyber, 17Cyber (S1).

**Mots qu'il emploie (sources : offres S2 et baromètre S1)** : « mon prestataire », « l'infogérance », « les sauvegardes », « la sécurité », « PRA/PCA », « piloter les prestataires », « les contrats », « le budget informatique », « on est exposés ». **(H)** pour : « je ne sais pas ce que je paie », « on dépend de lui ».

**Qui décide, qui paie, qui utilise :** Marc décide et paie ; l'assistante de direction ou le RAF utilise (P3, P2) ; le prestataire contribue ou freine (`pre-mortem.md`, R8).

**Offre la plus adaptée (H) :** palier Pilotage ou Pilotage+ (249 à 399 €/mois) avec mise en place payante ; option DSI à temps partagé de 0,5 à 1 j/mois.

---

## P2. Nadia, directrice administrative et financière d'une association médico-sociale de 60 à 200 salariés
**Identité de travail.** DAF ou responsable administrative et financière d'une association gestionnaire d'établissements (handicap, protection de l'enfance, aide à domicile). Elle a « hérité » de l'informatique : dans la majorité des PME-PMI, la DSI est confiée à la direction administrative et financière (S10). Elle rend compte au directeur général, au bureau et au conseil d'administration, ainsi qu'aux financeurs (ARS, département).

**Contexte**
- Le SI grossit sous contrainte : dossier usager informatisé référencé Ségur, financé jusqu'à 21 k€ par établissement dans « ESMS numérique », dernière campagne en 2026 (S3).
- Une ARS relève des fragilités cyber et RGPD dans les ESSMS (S3) ; les données des personnes accompagnées sont sensibles.
- Le budget est sous tension : emploi associatif en recul, plus d'un tiers des associations employeuses jugent leur situation préoccupante (tendance 6).

**Objectifs**
- Justifier chaque euro devant le conseil d'administration et les financeurs (job 2, dimension sociale).
- Sécuriser les données des personnes accompagnées (job 3).
- Ne pas laisser d'accès ouverts aux départs : le turnover est fort dans le secteur (job 6 ; turnover non sourcé, H).

**Frustrations (avec signaux)**
- Pas de poste dédié : les associations de cette taille recrutent rarement un responsable informatique (S3, § 3 de `signaux-demande.md`) ; le poste se crée plutôt vers 400 à 500 salariés (exemple ASEA 43, S3).
- Les solutions sont pensées pour des techniciens (S8) ou pour des entreprises (S6).
- Cherche déjà à réduire le coût du SI via des programmes solidaires (Solidatech, plus de 45 000 associations inscrites, S11).

**Jobs-to-be-done :** jobs 2 et 3 en priorité, puis 1 et 6.

**Déclencheurs d'achat (H)**
- Projet de dossier usager informatisé ou changement de logiciel métier (S3).
- Incident cyber ou violation de données à déclarer.
- Demande du CA, du commissaire aux comptes ou du financeur.
- Départ d'un salarié qui « savait ».

**Freins et objections (H)**
- « Nous n'avons pas de budget » ; décision collégiale et longue (`pre-mortem.md`, R6 et R11).
- « Il nous faut un tarif associatif » → remise ESS de 15 % (H).
- « Où sont hébergées nos données ? » → hébergement en France, aucune donnée de personnes accompagnées stockée (R10).

**Où elle s'informe (H sauf mention)**
- Fédérations du secteur (Nexem, Fehap, Uniopss ; à confirmer), réseaux ESS régionaux (CRESS).
- Solidatech (S11), Recherches & Solidarités, Associathèque.
- Son ARS (appels à projets « ESMS numérique », S3).

**Mots qu'elle emploie (sources : S3, S10, tendance 6)** : « ESMS », « DUI », « Ségur », « RGPD », « financeurs », « conseil d'administration », « budget contraint ». **(H)** pour : « on ne sait pas qui a accès à quoi », « mutualiser ».

**Qui décide, qui paie, qui utilise :** Nadia prescrit et porte la ligne budgétaire ; le directeur général décide, le bureau ou le CA valide au-delà d'un seuil (H) ; Nadia et son équipe administrative utilisent.

**Offre la plus adaptée (H) :** Pilotage avec remise ESS (≈ 212 €/mois) ; état des lieux SI vendu comme livrable à présenter au CA.

---

## P3. Sophie, office manager ou assistante de direction devenue « informaticienne par défaut »
> **Persona fragile :** les signaux sont anciens, étrangers ou commerciaux (S12). À confirmer en entretien ou à supprimer.

**Identité de travail.** Office manager, assistante de direction ou responsable administrative dans une PME ou une association de 20 à 60 salariés. Elle gère les abonnements, les arrivées et les départs, les relations avec le prestataire, « parce qu'il fallait bien que quelqu'un le fasse » (S12 : « in most small businesses, the office manager is also the accidental IT person », source commerciale).

**Objectifs (H)**
- Que les nouveaux arrivants aient leurs accès le premier jour, et que les partants les perdent le dernier.
- Ne plus être interrompue pour chaque question informatique.
- Avoir une liste fiable des abonnements et des échéances.

**Frustrations (H, cohérentes avec S5 et S12)**
- Des abonnements souscrits par des collègues avec une carte bancaire (shadow IT, S5).
- Un Excel jamais à jour ; personne ne la prévient des nouveaux outils.
- Un temps passé sur l'informatique important et invisible (plus de 150 h/an pour un tiers des « accidental IT managers » selon une étude Microsoft Irlande de 2013, S12).

**Jobs-to-be-done :** job 6 (arrivées et départs) et job 2 (liste des abonnements).

**Déclencheurs (H) :** une vague de recrutements, un oubli d'accès au départ d'un salarié, une facture de renouvellement inattendue.

**Freins (H) :** n'a pas le pouvoir d'achat ; crainte d'un outil de plus ; peur de « mal faire ».

**Où elle s'informe (H) :** LinkedIn, communautés d'office managers et d'assistantes, webinaires d'éditeurs SIRH (Lucca, PayFit).

**Mots qu'elle emploie (H) :** « les accès », « les licences Microsoft », « l'onboarding », « le prestataire », « les abonnements ».

**Qui décide, qui paie, qui utilise :** elle utilise et remplit l'outil ; le dirigeant (P1) ou la DAF (P2) décide et paie. **Rôle clé contre le « cockpit vide »** (R1) : si elle n'adopte pas l'outil, il reste vide.

**Offre la plus adaptée (H) :** Essentiel ; la check-list arrivées et départs comme porte d'entrée.

---

## Conséquences pour le marketing et le produit (H)
1. **Message principal pour P1 :** « Quand votre référent informatique part, votre SI ne part pas avec lui. » (S2)
2. **Message principal pour P2 :** « Présentez à votre CA un SI maîtrisé et chiffré, données hébergées en France. » (S3, S10)
3. **Pour P3 :** la valeur passe par les **alertes** et la check-list arrivées et départs, pas par la saisie.
4. **Canaux à tester en priorité :** réseau Tecnoo (P1), CRESS et fédérations médico-sociales (P2), partenariat Solidatech (P2, P3), réseaux CPME et MEDEF locaux (P1).
5. **À supprimer si les entretiens ne le confirment pas :** P3 comme persona distinct (il pourrait n'être qu'un rôle d'utilisateur dans P1 et P2).
