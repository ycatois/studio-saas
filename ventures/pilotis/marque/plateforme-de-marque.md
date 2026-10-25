---
venture: pilotis
phase: Marque (prérequis de 2b Pré-lancement)
auteur: brand-manager
date: 2026-10-25
statut: brouillon
skills: plateforme-de-marque, messages-par-persona
---

# Plateforme de marque — Lanternis

> **Règle de lecture.** « Lanternis » est un **nom de travail** : l'évaluation et les noms alternatifs sont dans [noms-et-taglines.md](noms-et-taglines.md). Les chiffres viennent des études de la phase 2 (renvois entre parenthèses, sources et URL dans ces fichiers) ; **(H)** = hypothèse non vérifiée. Aucun entretien client n'a encore eu lieu : cette plateforme est à **réviser avec les verbatims** des 12 à 15 entretiens prévus (`2-marche/script-interview.md`).
> **Cadre commercial.** Lanternis est une marque d'Hasteria SASU (voir § 11).
> **Identité visuelle.** Ce document couvre l'identité verbale. L'identité visuelle (`marque/charte/`) relève du directeur-artistique et doit partir de la personnalité décrite au § 7.

---

## 1. Raison d'être (mission)

**Rendre à chaque PME et à chaque association la maîtrise de son informatique, même quand elle n'a pas de DSI.**

Version longue : aujourd'hui, la connaissance du système d'information d'une structure de 50 à 249 salariés tient souvent dans la tête d'une personne ou dans l'outil d'un prestataire (`2-marche/personas.md`, P1 ; `2-marche/benchmark.md` § 2.6). Lanternis existe pour que cette connaissance appartienne à la structure, soit lisible par sa direction et survive aux départs.

## 2. Vision

**Une informatique de PME aussi lisible que ses comptes.** Demain, un dirigeant ou une DAF sait dire, sans appeler personne, ce que possède sa structure, ce qu'elle paie, qui a accès à quoi et ce qui arrive à échéance. Et cette maîtrise ne coûte pas un poste de DSI à temps plein. (Ambition, pas engagement chiffré.)

## 3. Cible prioritaire

- **P1, acheteur principal :** le dirigeant d'une PME de **100 à 249 salariés** sans DSI, souvent confronté au départ (retraite, démission) de son référent informatique. C'est le segment prioritaire retenu en phase Marché (`STATUT.md`, journal du 2026-10-25 ; `2-marche/acquisition.md` § 3.2).
- **P2, second acheteur :** la DAF d'une association médico-sociale, qui a hérité de l'informatique et rend compte à un CA et à des financeurs.
- **P3, utilisatrice relais :** l'office manager ou l'assistante de direction qui tient l'outil au quotidien. Pas de canal dédié ; c'est elle qui évite le « cockpit vide ».

## 4. Promesse

> **Vous savez ce que vous avez, ce que vous payez et ce qui arrive à échéance. Et votre informatique ne part pas avec la personne qui la connaissait.**

Déclinaison mesurable (H, à tenir par le produit et à valider en pilote) :
- un registre du SI complet (matériel, licences et abonnements, contrats, fournisseurs, accès) **mis en place avec vous en 30 jours** (durée du pilote prévue dans `2-marche/prix.md`) ;
- **une alerte avant chaque échéance** (renouvellement, fin de contrat, licence inutilisée, départ non traité), avec un délai par défaut à fixer en cadrage ;
- **un écran lisible en 5 minutes** par un dirigeant non technicien (12 à 15 indicateurs, `1-analyse/synthese.md`).

## 5. Preuves (ce qui rend la promesse crédible)

| Preuve | Statut | Source |
|---|---|---|
| Un fondateur avec 25 ans de SI (support, projets, pilotage de prestataires), cofondateur et directeur technique d'une ESN (Tecnoo) | Vérifié (déclaratif fondateur) | `0-idee/reponses-fondateur.md` § 1 |
| Un prototype existant de gouvernance du SI (« Cockpit DSI » : actifs, contrats, fournisseurs, jalons), dans la stack prévue | Existe ; réutilisation à confirmer après revue | `0-idee/reponses-fondateur.md` ; `1-analyse/synthese.md` |
| Un service humain : mise en place assistée, état des lieux SI, DSI à temps partagé | Offre prévue (H) | `2-marche/prix.md` |
| Des prix publiés, forfaitaires par structure, HT, remise ESS | Grille à tester (H) | `2-marche/prix.md` ; `benchmark.md` § 4, angle 2 |
| Hébergement en France (VPS OVH), données minimales, export libre | Prévu par l'architecture du studio ; à démontrer | `CLAUDE.md` (stack) ; `benchmark.md` § 4, angle 4 |
| Le problème est réel : 80 % des dirigeants se disent non préparés ou incertains face au risque cyber | Sourcé (baromètre Cybermalveillance 2025) | `2-marche/signaux-demande.md` (S1) |
| Le coût de l'alternative : un responsable informatique coûte 45 à 75 k€ brut par an | Sourcé (offres d'emploi d'octobre 2026) | `2-marche/signaux-demande.md` (S2) |
| Témoignages, études de cas | **Aucun à ce jour** : à collecter pendant les pilotes, avec accord écrit | — |

**Règle :** on n'utilise pas une preuve « prévue » comme si elle était acquise. Sur la landing, on écrit « hébergé en France » seulement quand l'hébergement est en place, et on n'affiche aucun logo client sans autorisation.

## 6. Ennemi : l'informatique en boîte noire

L'ennemi n'est **ni le prestataire informatique** (il peut contribuer au registre et prescrire Lanternis : `acquisition.md` § 1.2), **ni un concurrent nommé**. C'est une informatique dont personne dans la structure n'a la carte :
- le savoir qui tient dans la tête d'une seule personne ;
- les abonnements pris par carte bancaire sans que personne ne les voie ;
- les contrats reconduits sans décision ;
- les comptes d'anciens salariés encore ouverts (H, à confirmer en entretien).

Formule de travail : **« Votre informatique ne doit pas être une boîte noire : ni pour vous, ni pour votre CA, ni pour votre assureur. »** (H, à tester)

## 7. Valeurs (3) et comportements visibles

| Valeur | Ce qu'elle veut dire chez nous | Comportements visibles (preuves au quotidien) |
|---|---|---|
| **Transparence** | Le contraire de la boîte noire, appliqué à nous-mêmes. | Prix publics HT sur le site, sans « contactez-nous » ; ce que fait le produit et ce qu'il ne fait pas, écrit noir sur blanc ; chiffres sourcés ou signalés comme estimations ; alertes expliquées (« pourquoi vous voyez ceci ») ; pas de reconduction tacite piégeuse. |
| **Souveraineté** | Vos données et la carte de votre SI vous appartiennent. | Hébergement en France ; aucune donnée de personnes accompagnées (ESS) ni contenu métier collecté ; export complet à tout moment (CSV) ; pas de revente ni d'exploitation publicitaire des données ; sous-traitants listés publiquement. |
| **Sobriété** | Le juste nécessaire, pour vous comme pour la planète. | 12 à 15 indicateurs, pas 80 ; des alertes rares et utiles plutôt qu'un flux de notifications ; pages légères ; collecte minimale (RGPD by design) ; on vous aide aussi à **supprimer** des abonnements inutiles, pas à en ajouter. |

L'**éthique** irrigue les trois : on ne vend pas par la peur (cyber), on ne critique pas le prestataire du client, on dit quand Lanternis n'est pas adapté.

## 8. Personnalité

| Nous sommes | … mais pas |
|---|---|
| **Clairs** : on parle la langue du dirigeant (coûts, échéances, risques, décisions) | simplistes ni infantilisants |
| **Experts** : 25 ans de SI derrière chaque recommandation | jargonneux ni donneurs de leçons |
| **Posés** : on rassure par les faits et on propose une action | alarmistes ni anxiogènes |

Image de travail pour le directeur-artistique : **un bon intendant** : discret, méthodique, il connaît la maison par cœur et prévient avant que le problème n'arrive.

## 9. Positionnement

> **Pour** les dirigeants et les DAF de PME et d'associations de 50 à 249 salariés **qui** n'ont pas de DSI et ne savent plus vraiment ce que contient, coûte et risque leur informatique, **Lanternis est** un DSI de poche : **un registre de tout le SI qui alerte avant les mauvaises surprises**, mis en place avec vous par un DSI. **Contrairement** au tableur du prestataire ou aux outils pensés pour des techniciens, **nous** écrivons pour la direction, couvrons tout le SI (pas seulement les abonnements), publions nos prix et gardons vos données en France.

Catégorie à installer : **« DSI de poche »** (expression du marché à tester en entretien : est-elle comprise ? est-elle trop familière pour un CA ?). Ne **pas** se placer sur la seule gestion des abonnements SaaS, où Corma est moins cher (`benchmark.md` § 3).

## 10. Ton de voix

### 10.1 Principes
- **Vouvoiement** partout (site, produit, emails, LinkedIn de la marque). Le fondateur peut adapter sur son LinkedIn personnel (à préciser dans `voix-fondateur.md`, encore vide).
- **Niveau de langage :** courant et précis, comme un bon conseil écrit à un dirigeant. Phrases courtes. Un chiffre vaut mieux qu'un adjectif.
- **Humour :** léger et rare, jamais sur le dos d'une victime (cyberattaque, salarié parti) ni du prestataire.
- **Structure type :** constat concret → conséquence pour la structure → action simple.
- **Sigles :** chaque sigle est expliqué à la première occurrence (« le SI, c'est-à-dire tout votre informatique »). On n'en garde que ceux que la cible emploie elle-même (SI, RGPD, ESMS, PRA).

### 10.2 On dit / on ne dit pas

| On dit | On ne dit pas |
|---|---|
| « Vous savez ce que vous payez. » | « Optimisez votre stack SaaS. » |
| « 3 comptes d'anciens salariés sont encore actifs. » | « Anomalie IAM détectée sur le périmètre. » |
| « Le contrat de maintenance des copieurs se renouvelle dans 45 jours. » | « Échéance contractuelle imminente !!! » |
| « Votre prestataire peut compléter le registre avec vous. » | « Votre prestataire vous cache des choses. » |
| « Lanternis ne remplace pas votre prestataire : il vous donne la carte. » | « La solution tout-en-un qui remplace votre informatique. » |
| « 149 € HT par mois pour une structure de 20 à 49 salariés (tarif à confirmer). » | « Tarifs sur demande. » |
| « Si votre référent part, votre SI reste. » | « Ne laissez plus un salarié prendre votre entreprise en otage. » |
| « Une attaque n'est pas une fatalité. Voici trois vérifications simples. » | « 60 % des PME ferment après une cyberattaque. » (chiffre non sourcé, et vente par la peur) |
| « Vos données sont hébergées en France et exportables à tout moment. » | « Sécurité de niveau militaire. » |
| « Nous ne sommes pas adaptés si vous avez déjà une DSI. » | « Lanternis convient à toutes les entreprises. » |

### 10.3 Mots à privilégier (vocabulaire des personas)
Repris de `2-marche/personas.md` : « votre prestataire », « l'infogérance », « les sauvegardes », « les contrats », « le budget informatique », « les accès », « les licences Microsoft », « les abonnements », « arrivées et départs », « votre CA », « vos financeurs », « ESMS », « RGPD », « hébergé en France ». Et nos mots : **carte, registre, échéance, alerte, maîtrise, lisible, prévenir**.

### 10.4 Mots interdits
- Superlatifs vides : révolutionnaire, innovant, disruptif, leader, ultime, nouvelle génération, « tout-en-un ».
- Jargon technique non expliqué : stack, IAM, SSO, MDM, CMDB, ITAM, shadow IT (dire « abonnements pris sans que personne ne le sache »), onboarding/offboarding (dire « arrivées et départs »).
- Anglicismes de start-up : game changer, scaler, empower, booster.
- Vocabulaire de la peur : catastrophe, menace imminente, « avant qu'il ne soit trop tard », otage.
- Toute promesse absolue : « zéro risque », « 100 % sécurisé », « conforme NIS2 » (NIS2 n'est pas transposée à ce jour : `2-marche/synthese.md`).

### 10.5 Trois exemples réécrits

**Message d'erreur (import Excel)**
- Avant : « Erreur 422 : format de fichier invalide. »
- Après : « Nous n'avons pas pu lire ce fichier. Lanternis accepte les fichiers .xlsx et .csv. Vérifiez que la première ligne contient les titres des colonnes, ou envoyez-nous le fichier : nous l'importerons avec vous. »

**Post LinkedIn (marque, brouillon : publication soumise à validation)**
- Avant : « 🚀 Découvrez Lanternis, la solution innovante qui révolutionne la gestion IT des PME ! »
- Après : « Votre responsable informatique part à la retraite en juin. Qui sait, chez vous, quand se renouvelle le contrat du serveur ? Qui ferme ses accès le dernier jour ? Avant son départ, faites avec lui une liste en trois colonnes : ce que vous avez, ce que vous payez, ce qui arrive à échéance. C'est la première page d'un registre du SI. »

**Objet d'email**
- Avant : « URGENT : votre entreprise est-elle protégée ?? »
- Après : « 3 contrats informatiques arrivent à échéance d'ici mars »

## 11. Messages clés

1. **Message principal :** « Votre informatique, enfin lisible : ce que vous avez, ce que vous payez, ce qui arrive à échéance. »
2. **Continuité :** « Quand votre référent informatique part, votre SI ne part pas avec lui. » (déclencheur S2)
3. **Coût :** « Un DSI de poche, pour une fraction du prix d'un poste. » (45 à 75 k€ brut/an pour un responsable informatique, S2 ; prix Lanternis H)
4. **Alertes :** « Lanternis vous prévient avant : renouvellements, licences inutilisées, accès oubliés. »
5. **Humain :** « Mis en place avec vous par un DSI, pas livré vide. »
6. **Souveraineté :** « La carte de votre SI vous appartient. Hébergée en France, exportable à tout moment. »
7. **ESS (P2) :** « Présentez à votre CA et à vos financeurs une informatique maîtrisée et chiffrée, à tarif associatif. »
8. **Neutralité :** « Lanternis ne remplace pas votre prestataire : il vous donne de quoi piloter avec lui. »

Déclinaison par persona et par étape d'achat : [messages-par-persona.md](messages-par-persona.md). Taglines : [noms-et-taglines.md](noms-et-taglines.md).

## 12. Mention légale de marque

**« Lanternis est une marque d'Hasteria SASU. »**
À reprendre (avec le nom définitif) dans le pied de page du site, les mentions légales, les CGV, les factures Stripe et les emails Mailjet. Les coordonnées légales d'Hasteria sont encore « à compléter » dans `SOCIETE.md` : à renseigner avant toute mise en ligne.

## 13. Hypothèses à vérifier

1. L'expression **« DSI de poche »** est-elle comprise et jugée sérieuse par un dirigeant de 100 à 249 salariés et par une DAF associative ? (entretiens)
2. Le **vouvoiement et le ton posé** conviennent-ils aussi à P3 (office manager) ? Probable, à confirmer.
3. La valeur **souveraineté** pèse-t-elle vraiment dans l'achat en PME marchande, ou seulement dans l'ESS ? (`benchmark.md` § 4, angle 4)
4. La **durée de mise en place de 30 jours** et le délai d'alerte sont des cibles produit, pas des faits.
5. Le **nom** : voir `noms-et-taglines.md` ; choix à faire par l'utilisateur.
6. `voix-fondateur.md` est vide : le ton du LinkedIn personnel du fondateur reste à définir avec lui.
