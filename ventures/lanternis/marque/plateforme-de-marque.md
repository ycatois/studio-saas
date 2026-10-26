---
venture: lanternis
phase: Marque (prérequis de 2b Pré-lancement)
auteur: brand-manager
version: 1.1
date: 2026-10-26
date_v1_0: 2026-10-25
statut: brouillon
skills: plateforme-de-marque, messages-par-persona
---

# Plateforme de marque — Lanternis

> **Note de version v1.1 (2026-10-26).** Mise à jour après les décisions du fondateur du 2026-10-26 (`STATUT.md`, journal) : vente en libre-service, essai gratuit d'un mois sans carte, grille D validée (`2-marche/propositions-tarifs.md` § 11), aucun service humain inclus, périmètre « tout le SI centré sur les personnes » en lecture seule sans mot de passe stocké (`1-analyse/perimetre-produit.md`).
> **Ce qui change :**
> - **légitimité** : « mis en place avec vous par un DSI » est retiré partout et remplacé par **« conçu par un DSI »** (25 ans d'expérience du SI, méthodes et modèles de check-lists de DSI intégrés au produit) ;
> - **promesse** (§ 4) : l'arrivée et le départ des personnes deviennent le bénéfice phare ; la mise en place en 30 jours est remplacée par l'objectif « opérationnel en une heure, sans rendez-vous » (H, à mesurer) ;
> - **preuves** (§ 5) : retrait du prototype Cockpit DSI (abandonné), du service humain et de la mise en place assistée ; ajout de la lecture seule, de l'essai, des prix publics de la grille D, chacun avec son statut réel (décidé, prévu, à démontrer) ;
> - **cible** (§ 3) : P1 recentré sur les structures de **20 à 99 personnes** (cœur), 100 à 249 en secondaire ;
> - **positionnement, messages clés, on dit / on ne dit pas** (§ 9, 10.2, 10.5, 11) réécrits en conséquence ; nouveau § 10.6 « phrases interdites depuis la v1.1 » ; hypothèses (§ 13) mises à jour.
> **Inchangés :** le nom, la piste visuelle Veilleuse, les valeurs, la personnalité et le ton.

> **Règle de lecture.** Les chiffres viennent des études des phases 1 et 2 (renvois entre parenthèses, sources et URL dans ces fichiers) ; **(H)** = hypothèse non vérifiée. Aucun entretien client n'a encore eu lieu : cette plateforme est à **réviser avec les verbatims** des 12 à 15 entretiens prévus (`2-marche/script-interview.md`). **Le produit n'existe pas encore** : tout ce qui le décrit est « prévu », jamais « disponible », tant qu'il n'est pas livré.
> **Cadre commercial.** Lanternis est une marque d'Hasteria SASU (voir § 12).
> **Identité visuelle.** Ce document couvre l'identité verbale. L'identité visuelle (`marque/charte/`, piste Veilleuse v1.0) relève du directeur-artistique.

---

## 1. Raison d'être (mission)

**Rendre à chaque PME et à chaque association la maîtrise de son informatique, même quand elle n'a pas de DSI.**

Version longue : aujourd'hui, la connaissance du système d'information d'une structure de 20 à 249 personnes tient souvent dans la tête d'une personne ou dans l'outil d'un prestataire (`2-marche/personas.md` ; `2-marche/benchmark.md` § 2.6). Lanternis existe pour que cette connaissance appartienne à la structure, soit lisible par sa direction et survive aux arrivées et aux départs.

## 2. Vision

**Une informatique de PME aussi lisible que ses comptes.** Demain, un dirigeant ou une DAF sait dire, sans appeler personne, qui a quoi, ce que sa structure paie, qui a accès à quoi et ce qui arrive à échéance ; et chaque départ se clôt sans accès oublié. Cette maîtrise ne coûte ni un poste de DSI ni un rendez-vous commercial. (Ambition, pas engagement chiffré.)

## 3. Cible prioritaire

- **P1, acheteur principal, cœur de cible :** le dirigeant d'une PME de **20 à 99 personnes** sans DSI, qui gère l'informatique avec un prestataire, un salarié « qui s'y connaît » ou lui-même. C'est le cœur de l'acquisition en libre-service (`propositions-tarifs.md` § 11.6, point 1). (H : la douleur à cette taille reste à confirmer en entretien ; la décision du 2026-10-25 qui excluait les PME marchandes de 20 à 49 du SAM reposait sur le coût de la vente directe, qui n'existe plus.)
- **P1, segment secondaire :** le dirigeant ou le directeur général d'une structure de **100 à 249 personnes**, souvent confronté au départ de son référent informatique. Atteignable en libre-service « en partie seulement » (devis, questionnaire de sécurité, contrat de sous-traitance : `propositions-tarifs.md` § 11.6).
- **P2, second acheteur :** la DAF d'une association médico-sociale, qui a hérité de l'informatique et rend compte à un CA et à des financeurs.
- **P3, utilisatrice relais :** l'office manager ou l'assistante de direction qui prépare les arrivées et les départs et tient l'outil au quotidien. C'est elle qui évite le « cockpit vide ».

## 4. Promesse

> **Vous savez qui a quoi, ce que vous payez et ce qui arrive à échéance. Et chaque arrivée, chaque départ se traite sans rien oublier.**

Formule courte de continuité (inchangée, toujours valable) : « Votre informatique ne part pas avec la personne qui la connaissait. »

Déclinaison mesurable (toutes **H** : cibles produit, à tenir par le MVP et à mesurer pendant les essais) :
- **une check-list de départ générée à partir de ce que la personne a réellement** : son matériel, ses comptes, ses licences, ses accès et ses responsabilités, chaque tâche avec un responsable, une échéance et une preuve (`perimetre-produit.md` § 2.4, US-15) ;
- **une alerte avant chaque échéance** (fin de préavis d'un contrat, renouvellement, domaine, garantie) et **après chaque oubli** (compte encore actif après un départ, licence payée sans utilisateur, matériel non restitué) (`perimetre-produit.md` § 3.1) ;
- **un écran lisible en 5 minutes** par un dirigeant non technicien (12 indicateurs au plus, `perimetre-produit.md` § 3.2) ;
- **opérationnel en une heure, sans rendez-vous** : import du personnel, connexion de Microsoft 365 en lecture seule, premiers constats. **Hypothèse à tester** : à mesurer (temps médian entre l'inscription et le premier écran « Ce que Lanternis a déjà trouvé ») avant d'en faire une affirmation. D'ici là, on écrit « conçu pour être opérationnel en une heure ».

## 5. Preuves (ce qui rend la promesse crédible)

| Preuve | Statut | Source |
|---|---|---|
| **Conçu par un DSI** : un fondateur avec 25 ans d'expérience du SI (support, projets, pilotage de prestataires), cofondateur et directeur technique d'une ESN (Tecnoo) | Vérifié (déclaratif fondateur). **Formulation « 25 ans d'expérience du SI » encore à valider par le fondateur** (`STATUT.md`, arbitrages) | `0-idee/reponses-fondateur.md` § 1 |
| Méthodes et **modèles de check-lists de DSI intégrés au produit** (arrivée, départ, départ d'un référent informatique) | **Prévu** (MVP, US-14 à US-16) : non livré | `perimetre-produit.md` § 2 |
| **Lecture seule, aucun mot de passe stocké** : Lanternis ne crée, ne modifie ni ne supprime aucun compte ; il enregistre le fait qu'un accès existe, jamais un secret | **Décidé** (D1, 2026-10-26) ; à démontrer à l'ouverture (permissions demandées visibles) | `perimetre-produit.md` § 0.3, US-04, US-10 |
| **Essai gratuit d'un mois, sans carte bancaire**, résiliation en deux clics | **Décidé** ; à mettre en place | `propositions-tarifs.md` § 11.4 |
| **Prix publics HT** jusqu'à 499 personnes, sans « contactez-nous » ; bénévoles gratuits ; remise ESS −15 % | **Décidé** (grille D, 2026-10-26) | `propositions-tarifs.md` § 11.2 |
| Aide intégrée : démarrage guidé en 5 étapes, structure d'exemple, vidéos courtes, gabarits Excel | **Prévu** : non livré | `propositions-tarifs.md` § 11.4, étape 3 |
| Services facultatifs achetables en ligne (séance d'aide au démarrage, revue annuelle du SI) | **Hypothèse** (contenu, prix et plafond non validés) | `propositions-tarifs.md` § 11.3 |
| Hébergement en France (VPS OVH), données minimales, export CSV complet dans toutes les offres | Prévu par l'architecture du studio et la grille D ; à démontrer | `CLAUDE.md` (stack) ; `propositions-tarifs.md` § 11.3 |
| Le problème est réel : 80 % des dirigeants se disent non préparés ou incertains face au risque cyber | Sourcé (baromètre Cybermalveillance 2025) | `2-marche/signaux-demande.md` (S1) |
| Le coût de l'alternative : un responsable informatique coûte 45 à 75 k€ brut par an | Sourcé (offres d'emploi d'octobre 2026) | `2-marche/signaux-demande.md` (S2) |
| Témoignages, études de cas, nombre de clients | **Aucun à ce jour** : à collecter pendant les essais, avec accord écrit | — |

**Règles :**
- on n'utilise pas une preuve « prévue » ou « décidée » comme si elle était acquise. Avant l'ouverture, on écrit « Lanternis est conçu pour… », « prévu à l'ouverture », jamais « Lanternis fait… » ;
- « hébergé en France » s'écrit seulement quand l'hébergement est en place ; aucun logo client sans autorisation ;
- le prototype « Cockpit DSI » est **abandonné** (2026-10-26) : il n'est plus cité comme preuve.

## 6. Ennemi : l'informatique en boîte noire

L'ennemi n'est **ni le prestataire informatique** (il peut compléter le registre comme prestataire invité et prescrire Lanternis : `perimetre-produit.md` US-02), **ni un concurrent nommé**. C'est une informatique dont personne dans la structure n'a la carte :
- le savoir qui tient dans la tête d'une seule personne ;
- le salarié parti dont le compte, la licence et le portable sont toujours « quelque part » (H, à confirmer en entretien) ;
- les abonnements pris par carte bancaire sans que personne ne les voie ;
- les contrats reconduits sans décision.

Formule de travail : **« Votre informatique ne doit pas être une boîte noire : ni pour vous, ni pour votre CA, ni pour votre assureur. »** (H, à tester)

## 7. Valeurs (3) et comportements visibles

| Valeur | Ce qu'elle veut dire chez nous | Comportements visibles (preuves au quotidien) |
|---|---|---|
| **Transparence** | Le contraire de la boîte noire, appliqué à nous-mêmes. | Prix publics HT avec simulateur, sans « contactez-nous » sous 500 personnes ; essai sans carte ; résiliation en deux clics ; ce que fait le produit et ce qu'il ne fait pas, écrit noir sur blanc ; chiffres sourcés ou signalés comme estimations ; alertes expliquées (« pourquoi vous voyez ceci ») ; pas de reconduction tacite piégeuse. |
| **Souveraineté** | Vos données et la carte de votre SI vous appartiennent. | Lecture seule ; aucun mot de passe ni secret stocké ; aucun fichier téléversé au MVP ; hébergement en France ; aucune donnée de paie, de santé ni de motif de départ ; export complet à tout moment (CSV) ; pas de revente ni d'exploitation publicitaire ; sous-traitants listés publiquement. |
| **Sobriété** | Le juste nécessaire, pour vous comme pour la planète. | 12 indicateurs au plus ; un digest hebdomadaire plutôt qu'un flux de notifications ; pages légères ; collecte minimale (RGPD by design) ; on vous aide à **supprimer** des licences inutiles et à prolonger la vie du matériel, pas à en ajouter. |

L'**éthique** irrigue les trois : on ne vend pas par la peur (cyber), on ne critique pas le prestataire du client, on dit quand Lanternis n'est pas adapté, on ne pousse pas à l'achat d'un service.

## 8. Personnalité

| Nous sommes | … mais pas |
|---|---|
| **Clairs** : on parle la langue du dirigeant (coûts, échéances, risques, décisions) | simplistes ni infantilisants |
| **Experts** : 25 ans de SI derrière chaque modèle et chaque recommandation | jargonneux ni donneurs de leçons |
| **Posés** : on rassure par les faits et on propose une action | alarmistes ni anxiogènes |

Image de travail pour le directeur-artistique (inchangée) : **un bon intendant** : discret, méthodique, il connaît la maison par cœur et prévient avant que le problème n'arrive. En libre-service, l'intendant ne vient pas chez vous : il vous laisse ses carnets et vous écrit quand il faut agir.

## 9. Positionnement

> **Pour** les dirigeants et les DAF de PME et d'associations de 20 à 249 personnes (cœur : 20 à 99) **qui** n'ont pas de DSI et ne savent plus vraiment qui a quoi, ce que coûte et ce que risque leur informatique, **Lanternis est** un DSI de poche : **un registre de tout le SI, centré sur les personnes, qui prépare chaque arrivée et chaque départ et prévient avant les échéances**. Conçu par un DSI, prêt sans rendez-vous. **Contrairement** au tableur du prestataire ou aux outils pensés pour des techniciens, **nous** écrivons pour la direction, couvrons tout le SI (pas seulement les abonnements), restons en lecture seule, publions nos prix et gardons vos données en France.

Catégorie à installer : **« DSI de poche »** (à tester en entretien : est-elle comprise ? sérieuse pour un CA ? laisse-t-elle croire qu'un humain est inclus ?). Ne **pas** se placer sur la seule gestion des abonnements SaaS, où Corma est moins cher (`benchmark.md` § 3) ; ni sur l'administration des comptes (provisionnement), terrain de Primo (`perimetre-produit.md` § 0.3).

## 10. Ton de voix

### 10.1 Principes
- **Vouvoiement** partout (site, produit, emails, réseaux). Pas de voix fondateur : les contenus sont signés par la marque (décision du 2026-10-26).
- **Niveau de langage :** courant et précis, comme un bon conseil écrit à un dirigeant. Phrases courtes. Un chiffre vaut mieux qu'un adjectif.
- **Humour :** léger et rare, jamais sur le dos d'une victime (cyberattaque, salarié parti) ni du prestataire.
- **Structure type :** constat concret → conséquence pour la structure → action simple.
- **Sigles :** chaque sigle est expliqué à la première occurrence (« le SI, c'est-à-dire tout votre informatique »). On n'en garde que ceux que la cible emploie elle-même (SI, RGPD, ESMS, PRA).
- **Libre-service :** le texte remplace le vendeur. Chaque page, écran et email répond à la question suivante du lecteur et finit par une action qu'il peut faire seul.

### 10.2 On dit / on ne dit pas

| On dit | On ne dit pas |
|---|---|
| « Vous savez ce que vous payez. » | « Optimisez votre stack SaaS. » |
| « Paul part le 30 novembre : 1 portable, 1 téléphone, 2 licences et 3 accès à reprendre. » | « Processus d'offboarding initié. » |
| « 3 comptes d'anciens salariés sont encore actifs. » | « Anomalie IAM détectée sur le périmètre. » |
| « Le contrat de maintenance des copieurs est résiliable jusqu'au 31 décembre. » | « Échéance contractuelle imminente !!! » |
| « Votre prestataire peut compléter le registre avec vous. » | « Votre prestataire vous cache des choses. » |
| « Lanternis ne remplace pas votre prestataire : il vous donne la carte. » | « La solution tout-en-un qui remplace votre informatique. » |
| « Conçu par un DSI : 25 ans de SI dans chaque modèle de check-list. » | « Mis en place avec vous par un DSI. » |
| « Essayez un mois, sans carte bancaire. » | « Réservez votre démonstration. » / « Un conseiller vous rappelle. » |
| « Conçu pour être opérationnel en une heure, sans rendez-vous. » (tant que ce n'est pas mesuré) | « Opérationnel en 5 minutes, garanti. » |
| « Pilotage : 99 € HT par mois jusqu'à 49 personnes, 159 € de 50 à 99. Bénévoles gratuits. » | « Tarifs sur demande. » |
| « Lanternis lit vos comptes Microsoft 365 en lecture seule et ne stocke aucun mot de passe. » | « Sécurité de niveau militaire. » |
| « Si votre référent part, votre SI reste. » | « Ne laissez plus un salarié prendre votre entreprise en otage. » |
| « Une attaque n'est pas une fatalité. Voici trois vérifications simples. » | « 60 % des PME ferment après une cyberattaque. » (chiffre non sourcé, et vente par la peur) |
| « Besoin d'un coup de main ? L'aide intégrée et les modèles couvrent chaque étape. » | « Notre équipe vous accompagne de A à Z. » |
| « Nous ne sommes pas adaptés si vous avez déjà une DSI. » | « Lanternis convient à toutes les entreprises. » |

### 10.3 Mots à privilégier (vocabulaire des personas)
Repris de `2-marche/personas.md` : « votre prestataire », « l'infogérance », « les sauvegardes », « les contrats », « le budget informatique », « les accès », « les licences Microsoft », « les abonnements », « **arrivées et départs** », « qui a quoi », « votre CA », « vos financeurs », « ESMS », « RGPD », « hébergé en France ». Et nos mots : **carte, registre, échéance, alerte, maîtrise, lisible, prévenir, check-list, preuve, lecture seule, sans rendez-vous**.

### 10.4 Mots interdits
- Superlatifs vides : révolutionnaire, innovant, disruptif, leader, ultime, nouvelle génération, « tout-en-un ».
- Jargon technique non expliqué : stack, IAM, SSO, MDM, CMDB, ITAM, shadow IT (dire « abonnements pris sans que personne ne le sache »), onboarding/offboarding (dire « arrivées et départs »), product-led, self-service (dire « en libre-service », « sans rendez-vous »).
- Anglicismes de start-up : game changer, scaler, empower, booster.
- Vocabulaire de la peur : catastrophe, menace imminente, « avant qu'il ne soit trop tard », otage.
- Toute promesse absolue : « zéro risque », « 100 % sécurisé », « conforme NIS2 » (NIS2 n'est pas transposée à ce jour : `2-marche/synthese.md`), « rien ne vous échappera ».

### 10.5 Trois exemples réécrits

**Message d'erreur (import Excel)**
- Avant : « Erreur 422 : format de fichier invalide. »
- Après : « Nous n'avons pas pu lire ce fichier. Lanternis accepte les fichiers .xlsx et .csv. Vérifiez que la première ligne contient les titres des colonnes, ou repartez de notre gabarit : il est déjà au bon format. Aide : « Importer votre personnel » (vidéo de 3 minutes). »

**Post réseau social (marque, brouillon : publication soumise à validation ; Facebook ou blog, LinkedIn suspendu le 2026-10-26)**
- Avant : « 🚀 Découvrez Lanternis, la solution innovante qui révolutionne la gestion IT des PME ! »
- Après : « Un salarié part vendredi. Qui récupère son portable ? Qui bloque son compte de messagerie ? Qui libère sa licence, que vous continuez de payer ? Avant son dernier jour, faites une liste en trois colonnes : ce qu'il a, qui le reprend, quand. C'est la première check-list de départ. »

**Objet d'email**
- Avant : « URGENT : votre entreprise est-elle protégée ?? »
- Après : « 2 départs ce mois-ci : 4 accès restent à fermer »

### 10.6 Phrases interdites depuis la v1.1
Elles décrivaient un service humain qui n'existe plus (décision du 2026-10-26) ou présentaient comme acquis ce qui n'est pas livré :
- « mis en place avec vous par un DSI », « un DSI qui vous accompagne », « pas livré vide : nous le remplissons avec vous » ;
- « nous remplissons le registre avec vous à partir de votre Excel », « nous faisons le premier import ensemble », « envoyez-nous le fichier, nous l'importerons » ;
- « réservez une démonstration », « un conseiller vous rappelle », « pilote de 30 jours », « frais de mise en place » ;
- « DSI à temps partagé », « une demi-journée de DSI par mois », « revue trimestrielle avec un DSI », « état des lieux SI » (comme offre d'entrée) ;
- « opérationnel en une heure » **affirmé** sans mesure (dire « conçu pour… » tant que la mesure n'existe pas) ;
- toute fonction prévue au présent de l'indicatif avant l'ouverture (« Lanternis détecte… ») ; toute fonction P2 présentée comme disponible à l'ouverture (rapport PDF pour le CA, changement de poste, multi-sites, connecteurs bancaires) ;
- « Google Workspace pris en charge » tant que le connecteur n'est pas livré (dire « Google Workspace : bientôt ; en attendant, import Excel »).

## 11. Messages clés

Les trois premiers sont les messages porteurs, dans cet ordre (H, à tester en entretien et sur la landing).

1. **Arrivées et départs (bénéfice phare) :** « Un départ, une check-list faite de ce que la personne a vraiment : matériel, comptes, licences, accès. Rien d'oublié, preuve à l'appui. »
2. **Lisibilité et alertes :** « Qui a quoi, ce que vous payez, ce qui arrive à échéance : votre informatique sur un écran. Et Lanternis vous prévient avant. »
3. **Conçu par un DSI, prêt sans rendez-vous :** « 25 ans de SI dans un outil que vous ouvrez seul : modèles de DSI inclus, essai d'un mois sans carte, prix publics. » (« opérationnel en une heure » : à ajouter seulement une fois mesuré)

Messages d'appui :
4. **Continuité :** « Quand votre référent informatique part, votre SI ne part pas avec lui. » (déclencheur S2 ; prioritaire pour P1 de 100 à 249)
5. **Coût :** « Un DSI de poche, pour une fraction du prix d'un poste. » (45 à 75 k€ brut par an pour un responsable informatique, S2 ; Lanternis de 49 € à 339 € HT par mois jusqu'à 249 personnes avec les deux offres d'ouverture, Essentiel et Pilotage, grille D)
6. **Souveraineté et sécurité :** « Lecture seule, aucun mot de passe stocké, données en France, export à tout moment : la carte de votre SI vous appartient. » (hébergement et export : à afficher une fois en place)
7. **ESS (P2) :** « Une informatique maîtrisée et chiffrée à présenter à votre CA et à vos financeurs, à tarif associatif, bénévoles gratuits. »
8. **Neutralité :** « Lanternis ne remplace pas votre prestataire : il vous donne de quoi piloter avec lui. »

Déclinaison par persona et par étape d'achat : [messages-par-persona.md](messages-par-persona.md). Taglines : [noms-et-taglines.md](noms-et-taglines.md) (non mis à jour en v1.1 ; vérifier qu'aucune tagline retenue ne promet un accompagnement humain).

## 12. Mention légale de marque

**« Lanternis est une marque d'Hasteria SASU. »**
À reprendre dans le pied de page du site, les mentions légales, les CGV, les factures Stripe et les emails Mailjet. Coordonnées légales : `SOCIETE.md`.

## 13. Hypothèses à vérifier

1. **« Conçu par un DSI »** suffit-il à rassurer sans accompagnement humain, face à « mis en place par un DSI » ? (entretiens ; test A/B possible sur la landing)
2. **« Opérationnel en une heure, sans rendez-vous »** : à mesurer pendant les essais (temps médian jusqu'au premier constat) avant toute affirmation.
3. **Douleur chez les 20 à 99 personnes** : l'arrivée et le départ sont-ils un sujet assez fréquent et coûteux à cette taille pour payer 49 à 159 € HT par mois ? (entretiens)
4. L'expression **« DSI de poche »** est-elle comprise, jugée sérieuse, et ne laisse-t-elle pas croire qu'un humain est inclus ?
5. Le **vouvoiement et le ton posé** conviennent-ils aussi à P3 (office manager) ? Probable, à confirmer.
6. La valeur **souveraineté** (et la lecture seule) pèse-t-elle dans l'achat en PME marchande, ou surtout dans l'ESS ? (`benchmark.md` § 4, angle 4)
7. Les associations sous **Google Workspace** acceptent-elles l'import Excel en attendant le connecteur (D4) ? À suivre : part des essais sous Google (`propositions-tarifs.md` § 11.6, point 4).
8. Les **services facultatifs** (séance d'aide, revue annuelle) : contenu, prix et plafond non validés.
9. Formulation **« 25 ans d'expérience du SI »** : à valider par le fondateur.
