---
venture: lanternis
phase: 2b Pré-lancement
commande: /prelancement
auteur: cro-conversion
date: 2026-10-26
statut: brouillon
skills: landing-validation-waitlist, landing-page, copywriting-frameworks, lead-magnet, ab-test
fichiers: validation.html (page), autodiagnostic.md (lead magnet)
---

# Landing de validation : stratégie, textes, mesure

> **Statut : brouillon. Rien n'est publié.** La mise en ligne, l'envoi des emails et la diffusion des liens passent par la validation explicite du fondateur (règle 2 de `CLAUDE.md`).
> **Sources internes :** `marque/plateforme-de-marque.md`, `marque/messages-par-persona.md`, `marque/noms-et-taglines.md`, `marque/charte/` (tokens, logo, page 12 de la charte), `2-marche/synthese.md`, `acquisition.md` (amendement du 2026-10-26 : pas de LinkedIn), `prix.md`, `personas.md`, `signaux-demande.md`.
> **(H)** = hypothèse non vérifiée. Les seuls chiffres externes affichés sur la page sont sourcés (S2 : offres HelloWork et Insee, voir § 5.12).

---

## 1. Ce que la page doit prouver

**But unique :** mesurer la demande réelle avant de coder, en convertissant un visiteur en **inscrit qualifié** sur la liste d'attente.

**Hypothèses de `STATUT.md` testées par la page**

| Hypothèse (`STATUT.md`) | Ce que la page mesure | Limite |
|---|---|---|
| **H5 Acquisition** : ≥ 80 inscrits qualifiés et ≥ 12 entretiens en 8 semaines | Inscriptions confirmées et qualifiées, par source ; accords pour un échange de 30 min | La page ne crée pas le trafic : elle dépend des canaux C1, C2, C4 (§ 6.2) |
| **H1 Douleur SI** (déclencheur : départ du référent) | Répartition des réponses « ce qui vous préoccupe le plus » ; taux d'inscription selon le titre A ou B | Déclaratif ; à recouper en entretien |
| **H3 Volonté de payer** (≥ 149 € HT/mois) | Indirect : le prix est affiché **avant** le formulaire, donc chaque inscrit a pu le voir ; clics « Voir les tarifs » | Une inscription n'est pas un achat. La vraie preuve reste les lettres d'intention en entretien |
| **H2 Pas déjà résolu** | Part des inscrits qui choisissent « Autre chose » ou qui se désinscrivent après la question ouverte | Faible ; surtout qualitatif via la question ouverte (§ 9) |

**Ce que la page ne prouve pas :** la volonté de payer, la rétention, la faisabilité des connecteurs. Elle ne remplace pas les 12 à 15 entretiens.

## 2. Cibles

- **P1 (principal), Marc, dirigeant d'une PME de 50 à 249 salariés sans DSI**, priorité aux 100 à 249. Version par défaut de la page. Déclencheur mis en avant : le départ du référent informatique (S2).
- **P2 (variante ESS), Nadia, DAF d'une association médico-sociale de 20 à 249 salariés.** Même page, appelée avec `?public=ess` : titre et sous-titre propres, type « ESS » présélectionné dans le formulaire. Les liens diffusés par les relais ESS (C4) utilisent cette variante.
- **P3 (office manager)** : pas de version dédiée. Elle peut transmettre la page à sa direction ; elle reste sensible au bloc « Ce qui arrive à échéance » et aux départs de salariés.

## 3. Promesse et test des 5 secondes

**Promesse (plateforme de marque § 4) :** « Vous savez ce que vous avez, ce que vous payez et ce qui arrive à échéance. Et votre informatique ne part pas avec la personne qui la connaissait. »

| En 5 secondes, le visiteur doit comprendre | Où sur la page |
|---|---|
| **Quoi** : un registre de tout le SI, avec des alertes avant les échéances | Titre + sous-titre + aperçu du tableau de bord |
| **Pour qui** : PME de 50 à 249 salariés et associations de 20 à 249, sans DSI | Sous-titre + ligne sous les boutons |
| **Où en est le produit** : en préparation, liste d'attente | Étiquette au-dessus du titre |
| **Quoi faire** : rejoindre la liste d'attente | Bouton principal (un seul objectif de conversion) |

Test à faire avant la mise en ligne : montrer la page 5 secondes à 5 personnes de la cible (réseau Tecnoo), leur demander « c'est quoi, pour qui, que feriez-vous ? ». Seuil : 4 sur 5 répondent juste sur les trois points (H).

## 4. Structure (cadre PAS puis AIDA)

| # | Section | Rôle | Cadre |
|---|---|---|---|
| 1 | En-tête (logo nuit, ancres) | Repère, navigation interne seulement | — |
| 2 | Hero (fond nuit, halo en coin) : étiquette « En préparation », titre, sous-titre, bouton principal, bouton secondaire « tarifs », aperçu du tableau de bord (maquette fictive, légendée) | Attention, test des 5 secondes | AIDA : A |
| 3 | Problème : « Votre informatique est-elle une boîte noire ? » (3 douleurs) | Nommer l'ennemi, pas le prestataire | PAS : P + A |
| 4 | Solution : 3 bénéfices (ce que vous avez / payez / arrive à échéance) | Bénéfice avant fonctionnalité | PAS : S ; AIDA : I |
| 5 | Comment ça marche (3 étapes) | Lever « encore un outil à remplir » | AIDA : I |
| 6 | Et votre prestataire ? | Lever l'objection n° 1, neutralité | AIDA : D |
| 7 | Bloc autodiagnostic (lead magnet) | Second point d'entrée pour les indécis, sans email obligatoire | AIDA : D |
| 8 | Pour qui / pas pour qui | Qualifier, dire quand Lanternis n'est pas adapté | AIDA : D |
| 9 | Ce que nous pouvons promettre aujourd'hui (déjà vrai / prévu) | Preuves honnêtes, **aucun témoignage ni logo** | AIDA : D |
| 10 | Tarifs envisagés (à partir de 149 € HT/mois, grille, ESS −15 %, annuel −20 %, mise en place) | Transparence (valeur de marque), filtre de qualification | AIDA : D |
| 11 | FAQ (7 objections) | Objections de la matrice de `messages-par-persona.md` | AIDA : D |
| 12 | Formulaire de liste d'attente (CTA final) | Conversion | AIDA : A |
| 13 | Sources des chiffres cités | Zéro chiffre non sourcé | — |
| 14 | Pied de page (mentions Hasteria, liens légaux) | Légal | — |

Un seul objectif de conversion (l'inscription). Le bouton secondaire du hero et le bloc autodiagnostic servent ce même objectif : l'autodiagnostic renvoie vers l'inscription et vers l'échange de 30 min (`autodiagnostic.md` § 5).

## 5. Textes complets (version P1, titre A)

Les textes ci-dessous sont ceux de `validation.html`. Ton : vouvoiement, posé, sans vocabulaire de la peur (plateforme § 10).

### 5.1 Hero
- Étiquette : **En préparation · liste d'attente ouverte**
- Titre (A) : **Votre informatique, enfin lisible.**
- Sous-titre : « Ce que vous avez, ce que vous payez, ce qui arrive à échéance, sur une seule page, avec une alerte avant chaque renouvellement. Un DSI de poche pour les PME et les associations sans DSI, mis en place avec vous. »
- Bouton principal : **Rejoindre la liste d'attente** · bouton secondaire : **Voir les tarifs envisagés**
- Sous les boutons : « Gratuit et sans engagement. Pour les PME de 50 à 249 salariés et les associations de 20 à 249 salariés. »
- Aperçu : « Votre informatique ce mois-ci » ; coût informatique annuel 38 420 € HT ; 4 échéances à 90 jours (à décider) ; 3 accès d'anciens salariés (à fermer) ; maintenance des copieurs dans 45 j, 2 160 € HT/an ; licences Microsoft 365 (38) dans 62 j, 4 560 € HT/an ; nom de domaine dans 80 j, 18 € HT/an ; « Pourquoi vous voyez ceci : le contrat des copieurs se reconduit tacitement le 15 décembre. » Légende : « Maquette de principe du tableau de bord prévu. Exemple fictif : ces montants ne viennent d'aucun client. » (données reprises de la page 12 de la charte, déjà marquées fictives)

### 5.2 Problème
**Votre informatique est-elle une boîte noire ?**
« Sans DSI, la carte de votre système d'information (le SI, c'est-à-dire tout votre informatique) tient souvent dans la tête d'une personne ou dans l'outil de votre prestataire. »
1. **Une seule personne sait.** Si votre référent informatique partait demain, qui saurait ce que vous possédez, ce que vous payez et ce qui se renouvelle le mois prochain ?
2. **Des contrats se reconduisent sans décision.** Abonnements pris par carte bancaire, licences que personne n'utilise, contrats de maintenance renouvelés faute d'avoir vu passer la date de préavis.
3. **On ne sait plus qui a accès à quoi.** Comptes d'anciens salariés, accès de prestataires : la question arrive souvent le jour où un client, un assureur ou votre CA la pose.

### 5.3 Solution
**Lanternis vous donne la carte, et vous prévient avant** — « Un registre de tout votre SI, écrit pour la direction, pas pour des techniciens. »
- **Ce que vous avez** : matériel, logiciels, licences et abonnements, contrats, fournisseurs, accès : un seul registre, lisible en quelques minutes.
- **Ce que vous payez** : chaque abonnement et chaque contrat en euros HT par an, et le coût de votre informatique par salarié. De quoi supprimer ce qui ne sert plus.
- **Ce qui arrive à échéance** : une alerte avant chaque renouvellement, chaque fin de contrat et chaque départ de salarié à traiter. Des alertes rares et utiles, pas un flux de notifications.

### 5.4 Comment ça marche
« Lanternis n'est pas livré vide : la mise en place se fait avec vous, par un spécialiste du SI. »
1. **On part de ce que vous avez déjà** : votre fichier Excel, vos factures, la liste de votre prestataire. Nous remplissons le registre avec vous.
2. **On relie vos outils** : Microsoft 365 ou Google Workspace, votre banque ou votre logiciel comptable, pour que le registre reste à jour [connecteurs prévus].
3. **Vous êtes prévenu avant** : des alertes avant les échéances et une synthèse mensuelle d'une page pour la direction.

### 5.5 Et votre prestataire ?
« Il fait marcher vos postes, vos sauvegardes et votre réseau : il continue. Lanternis ne le remplace pas, il vous donne la carte pour piloter avec lui. Votre prestataire peut d'ailleurs compléter le registre avec vous. **Si votre référent part, votre SI reste.** »

### 5.6 Autodiagnostic
**Autodiagnostic SI gratuit : 10 questions, 5 minutes** — « Savez-vous ce que vous avez, ce que vous payez et ce qui arrive à échéance ? Répondez à 10 questions et obtenez votre profil, avec trois actions simples à mener ce mois-ci. Le résultat s'affiche à l'écran : aucune adresse email n'est demandée pour le voir. » Bouton : **Faire l'autodiagnostic** (→ `autodiagnostic.html`, à construire d'après `autodiagnostic.md`).

### 5.7 Pour qui, et pour qui ce n'est pas
- Fait pour vous si : vous dirigez une PME de 50 à 249 salariés, ou une association de 20 à 249 salariés ; vous n'avez pas de DSI, et l'informatique repose sur un prestataire, un référent ou « la personne qui s'y connaît » ; vous voulez savoir ce que vous payez et décider avant les renouvellements ; vous devez rendre des comptes (CA, financeurs, assureur, client).
- Pas pour vous si : vous avez déjà une DSI ou une équipe informatique interne qui tient ce registre ; vous cherchez un dépannage, une infogérance ou un antivirus (c'est le métier de votre prestataire) ; vous cherchez seulement à gérer des abonnements en ligne (des outils plus simples existent).

### 5.8 Ce que nous pouvons vous promettre aujourd'hui
« Lanternis est en préparation : nous n'avons pas encore de clients, donc pas de témoignages. Voici ce qui est déjà vrai, et ce qui est prévu. »
- **Déjà vrai** : des tarifs publics, hors taxes, sans « contactez-nous » ; conçu par un spécialiste du SI : 25 ans de support, de projets et de pilotage de prestataires ; cette page ne dépose aucun cookie et ne charge aucun traceur ; vos réponses ne sont ni revendues ni utilisées à des fins publicitaires.
- **Prévu à l'ouverture** (étiquette « prévu » sur chaque ligne) : hébergement des données en France ; export complet du registre à tout moment ; ni fichiers, ni mots de passe, ni données des personnes accompagnées.

> À valider par le fondateur : la formulation « conçu par un spécialiste du SI : 25 ans… » (preuve déclarative de `0-idee/reponses-fondateur.md`, sans nom ni voix fondateur, conformément à la décision du 2026-10-26). Si l'analyse de mesure d'audience retenue dépose un cookie, la phrase « aucun cookie » doit être retirée.

### 5.9 Tarifs de lancement envisagés
- Phrase phare : **À partir de 149 € HT par mois**
- « Un forfait par structure selon l'effectif, sans facturation par utilisateur. Ces tarifs sont envisagés pour le lancement et peuvent encore évoluer : les inscrits en seront informés avant toute ouverture. »
- Tableau : 20 à 49 salariés **149 € HT/mois** (registre, import Excel, alertes de renouvellement et de départ) ; 50 à 99 **249 € HT/mois** (+ coût du SI par salarié, procédure d'arrivée et de départ, synthèse mensuelle) ; 100 à 249 **à partir de 399 € HT/mois** (+ multi-établissements, revue trimestrielle d'une heure avec un DSI).
- Associations et ESS : « Remise de 15 % sur l'abonnement, cumulable avec l'engagement annuel. Conditions d'éligibilité à préciser à l'ouverture. »
- Engagement annuel : « 20 % de moins que le tarif mensuel. La mise en place accompagnée est facturée une fois, à part (490 à 990 € HT envisagés selon la tranche). »
- « Prix hors taxes ; TVA en sus. Aucun paiement n'est demandé pour rejoindre la liste d'attente. »

Source : grille pressentie de `2-marche/prix.md` § 4 (H). « À partir de 399 € » laisse ouvert le test 399 / 449 € en entretien sans afficher un prix que l'on pourrait ensuite augmenter. Le palier 20 à 49 n'est affiché que parce qu'il concerne les associations (les PME marchandes de 20 à 49 sont hors SAM).

### 5.10 FAQ
1. **Mon prestataire s'en occupe déjà. Pourquoi Lanternis ?** — Il s'occupe de faire marcher votre informatique. Mais la liste de vos contrats, de vos abonnements et de vos accès, avec leurs dates d'échéance, l'avez-vous, vous ? Lanternis vous la donne, et votre prestataire peut y contribuer.
2. **Encore un outil à remplir : qui va le tenir à jour ?** — Nous faisons la mise en place avec vous, à partir de votre Excel. Ensuite, les connecteurs prévus (Microsoft 365 ou Google Workspace, banque ou logiciel comptable) et les alertes font le gros du travail : c'est Lanternis qui vous écrit, pas l'inverse.
3. **Je préfère recruter un responsable informatique.** — C'est une vraie option. Elle coûte de l'ordre de 45 000 à 75 000 € brut par an d'après des offres d'emploi publiées en octobre 2026 [1], et le recrutement peut être long : en 2024, 54 % des entreprises de 50 à 249 salariés qui ont cherché un spécialiste informatique ont eu des difficultés à recruter [2]. Lanternis peut aussi aider une personne recrutée : la carte reste dans l'outil, même quand les gens changent.
4. **Où seront hébergées nos données ?** — L'hébergement est prévu en France. Nous stockerons la liste de vos outils, contrats et fournisseurs, pas vos fichiers, pas vos mots de passe, ni aucune donnée des personnes que vous accompagnez. Les sous-traitants seront listés publiquement avant l'ouverture.
5. **Et si Lanternis s'arrête un jour ?** — L'export complet de votre registre, à tout moment, est prévu dès l'ouverture : la carte de votre SI vous appartient.
6. **Quand Lanternis sera-t-il disponible ?** — Le produit est en préparation. Nous ouvrirons les premiers accès d'abord aux inscrits, par petits groupes, pour faire la mise en place avec chacun. Nous ne donnons pas de date tant qu'elle n'est pas sûre.
7. **Qui est derrière Lanternis ?** — Lanternis est une marque d'Hasteria SASU, société française dont le siège est à Neuilly-sur-Seine. C'est Hasteria qui vous facturera, aux conditions écrites dans nos conditions générales de vente.

### 5.11 Formulaire (CTA final)
**Rejoindre la liste d'attente** — « Soyez parmi les premiers à faire la carte de votre SI avec nous. Cela prend une minute. » Champs : § 7. Mention d'information sous le bouton : « Hasteria SASU, qui exploite la marque Lanternis, utilise ces informations pour vous prévenir de l'ouverture de Lanternis et, si vous l'avez accepté ci-dessus, pour vous envoyer ses nouvelles ou vous proposer un échange. Elles ne sont ni revendues ni cédées. Vous pouvez vous désinscrire à tout moment et exercer vos droits (accès, rectification, effacement) en écrivant à contact@hasteria.net. Détails dans notre politique de confidentialité. »
- Message de succès : « Merci, votre demande est enregistrée. Un email de confirmation vient de vous être envoyé : cliquez sur le lien qu'il contient pour valider votre inscription. Pensez à regarder dans les indésirables. »

### 5.12 Sources affichées
1. Offres HelloWork de responsable informatique (45 à 70 k€ et 65 à 75 k€ brut/an), consultées le 25/10/2026 : https://www.hellowork.com/fr-fr/emplois/82433859.html ; https://www.hellowork.com/fr-fr/emplois/84330801.html (S2). Les offres expirent : **revérifier les liens le jour de la mise en ligne**.
2. Insee, publication du 14/10/2025, consultée le 25/10/2026 : https://www.insee.fr/fr/statistiques/8616805 (S2). Le titre exact de la publication est à recopier depuis la page Insee avant la mise en ligne.

### 5.13 Pied de page
« Lanternis est une marque d'Hasteria SASU. » Hasteria SASU au capital de 300 €, 99 avenue Achille Peretti, 92200 Neuilly-sur-Seine. RCS Nanterre 981 178 429. TVA intracommunautaire FR71981178429. Directeur de la publication : Yann Catois. Contact : contact@hasteria.net. Liens : Mentions légales (`mentions-legales.html`), Politique de confidentialité (`confidentialite.html`), les deux **à rédiger** (juriste-rgpd). L'hébergeur du site (o2switch) doit figurer dans les mentions légales complètes.

## 6. Objectifs et critères de succès ou d'échec

### 6.1 Définitions
- **Inscrit** : formulaire envoyé et email confirmé (double opt-in, § 7.3).
- **Inscrit qualifié** : inscrit dont la structure est dans le SAM : **entreprise de 50 à 249 salariés** ou **structure de l'ESS de 20 à 249 salariés** (décision du 2026-10-25 : PME de 20 à 49 hors SAM).
  - Écart avec `acquisition.md` § 4.2, qui ajoutait « rôle de décideur ou de prescripteur » : le formulaire ne demande pas la fonction (formulaire minimal). Le rôle est vérifié par la question ouverte de l'email de bienvenue et en entretien. **À valider** : ajouter ou non un champ « Votre fonction » (+ 1 champ, friction en plus).
- **Taux de conversion** : inscriptions envoyées / visiteurs uniques de la page, par source et par variante.

### 6.2 Objectifs recalculés sans LinkedIn (8 semaines, 26 oct. – 18 déc. 2026)

L'objectif de 80 inscrits qualifiés de `STATUT.md` (H5) est maintenu. Les 30 inscrits attendus de LinkedIn sont reportés sur les relais ESS et sur l'autodiagnostic, conformément à l'amendement du 2026-10-26. **Répartition (H) :**

| Source (paramètre `src`) | Canal | Inscrits qualifiés visés (H) | Conversion visée (H) | Visiteurs nécessaires (H) |
|---|---|---|---|---|
| `reseau` | C1 réseau Tecnoo et réseau personnel (envois individuels) | 15 | ≥ 25 % (trafic chaud) | ≈ 60 |
| `prospection` | C2 prospection sur déclencheurs, email et téléphone | 10 | ≥ 15 % | ≈ 70 |
| `ess-relais`, `webinaire` | C4 relais ESS (lettre d'information, webinaire) | 40 | ≥ 8 % | ≈ 500 |
| `autodiag` | Inscriptions venues de l'autodiagnostic | 10 | ≥ 10 % des diagnostics terminés | ≈ 100 diagnostics |
| `blog`, `facebook`, `direct` | Blog (SEO naissant), page Facebook éventuelle, accès direct | 5 | ≥ 3 % | ≈ 170 |
| **Total** | | **80** | **≥ 5 % global** | **≈ 800 à 1 000** |

Hypothèse de taux de qualification : ≥ 70 % des inscrits (H), soit environ 115 inscrits pour 80 qualifiés.

**Risque principal :** sans LinkedIn, la moitié de l'objectif repose sur **au moins un relais ESS** qui accepte de diffuser d'ici la semaine 6 (point d'arrêt C4 de `acquisition.md`). Si aucun relais n'accepte, l'objectif de 80 devient hors de portée en 8 semaines ; il faut alors soit prolonger, soit juger la demande sur les entretiens et les lettres d'intention.

### 6.3 Critères (à reporter dans `STATUT.md` et dans le scoring de `/bilan`)

| Indicateur | Succès | Zone grise (approfondir) | Échec | Hypothèse liée |
|---|---|---|---|---|
| Inscrits qualifiés à 8 semaines | **≥ 80** | 40 à 79 | **< 40** | H5 ; éliminatoire « aucun signal de demande vérifiable » |
| Conversion visiteur → inscription (global) | **≥ 5 %** | 2 à 5 % | **< 2 % après ≥ 500 visiteurs** | Qualité du message |
| Part d'inscrits qualifiés | ≥ 70 % | 50 à 70 % | < 50 % | Ciblage des canaux |
| Confirmation du double opt-in | ≥ 70 % | 50 à 70 % | < 50 % | Qualité des emails, délivrabilité |
| Autodiagnostics terminés par les inscrits (lien de l'email de bienvenue) | **≥ 40 %** | 25 à 40 % | < 25 % | Activation (`2-marche/synthese.md`) |
| Inscrits qui acceptent l'échange de 30 min | ≥ 25 % (≈ 20 personnes, de quoi tenir 12 à 15 entretiens avec C1) | 10 à 25 % | < 10 % | H1, alimentation des entretiens |
| Préoccupation « départ du référent » | ≥ 15 % des qualifiés P1 | 5 à 15 % | < 5 % | H1 : le déclencheur choisi est-il le bon ? |

**Lecture :**
- Un échec de conversion (< 2 %) avec un bon trafic signale d'abord un **problème de message** : réécrire le hero (variante C, § 8) avant de conclure à l'absence de demande.
- Un échec en volume (< 40) avec une bonne conversion signale un **problème de trafic** (canaux), pas de demande : à lire avec les points d'arrêt de `acquisition.md` § 4.1.
- La répartition des préoccupations sert à ordonner les messages (et à choisir le titre définitif), pas à valider la douleur seule.
- Rien de tout cela ne remplace le critère H3 : **≥ 3 lettres d'intention** à ≥ 149 € HT/mois, obtenues en entretien.

## 7. Formulaire et script `waitlist.php` (pour dev-vitrine)

### 7.1 Champs envoyés (POST, UTF-8, `action="waitlist.php"`)

| Nom | Type HTML | Obligatoire | Valeurs / validation serveur | Conservé |
|---|---|---|---|---|
| `email` | email | oui | `filter_var(FILTER_VALIDATE_EMAIL)`, ≤ 254 caractères, minuscules, espaces retirés. Les messageries grand public (gmail.com, orange.fr, free.fr, laposte.net, hotmail, outlook, yahoo, sfr.fr, wanadoo.fr…) **ne sont pas refusées** (fréquentes dans les associations) mais marquées `email_generique = 1` | oui |
| `structure` | text | oui | 2 à 120 caractères, balises retirées | oui |
| `type` | radio | oui | `entreprise` \| `ess` | oui |
| `effectif` | select | oui | `moins-20` \| `20-49` \| `50-99` \| `100-249` \| `250-plus` | oui |
| `douleur` | radio | oui | `depart-referent` \| `couts` \| `renouvellements` \| `acces` \| `rendre-compte` \| `autre` | oui |
| `douleur_autre` | text | non | ≤ 200 caractères, balises retirées ; ignoré si `douleur` ≠ `autre` | oui |
| `nouvelles` | checkbox | non | `oui` ou absent. **Consentement distinct**, case décochée par défaut | oui + horodatage + version du texte |
| `echange` | checkbox | non | `oui` ou absent. Accord pour être recontacté pour un échange de 30 min | oui + horodatage |
| `variante` | hidden | — | `a` \| `b` \| `ess` (sinon `a`) | oui |
| `public` | hidden | — | `pme` \| `ess` (sinon `pme`) | oui |
| `source` | hidden | — | `[a-z0-9-]{1,30}` ; liste blanche conseillée : `reseau`, `prospection`, `ess-relais`, `webinaire`, `autodiag`, `blog`, `facebook`, `confirmation`, `direct` (sinon `autre`) | oui |
| `site_web` | text caché (piège) | — | doit être vide ; sinon répondre comme un succès **sans rien enregistrer** | non |

Champs calculés : `qualifie` = email confirmé ET ((`type` = entreprise ET `effectif` ∈ {50-99, 100-249}) OU (`type` = ess ET `effectif` ∈ {20-49, 50-99, 100-249})) ; `cree_le`, `confirme_le`, `jeton_confirmation`, `jeton_desinscription`, `version_mention` (identifiant du texte d'information affiché).

### 7.2 Comportement attendu
1. Accepter uniquement `POST` ; vérifier l'en-tête `Origin` ou `Referer` (même domaine) ; limiter à 5 envois par heure et par adresse IP (IP hachée avec sel, conservée 24 h au plus, jamais en clair dans la base).
2. Valider et normaliser les champs (§ 7.1). En cas d'erreur : **redirection 303** vers `validation.html?erreur=<code>#liste-attente`, codes `email`, `champs` ou `technique` (la page affiche le message correspondant, annoncé aux lecteurs d'écran). Sans JavaScript, prévoir une page d'erreur HTML minimale servie par le script avec un lien de retour.
3. Si l'email existe déjà : ne pas le révéler. Mettre à jour les champs facultatifs (ajout d'un consentement possible, jamais de retrait silencieux), renvoyer l'email de confirmation au plus une fois par 24 h, et répondre comme un succès.
4. Enregistrer l'inscription (statut `en_attente`) puis envoyer l'**email de confirmation** (double opt-in) par Mailjet, en transactionnel, depuis l'adresse de la marque (SPF, DKIM et DMARC configurés, voir `INFRA.md`). Lien `confirm.php?jeton=…` (jeton aléatoire de 32 octets, valable 7 jours).
5. Succès : **redirection 303** vers `validation.html?inscription=ok#liste-attente`.
6. `confirm.php` : passe le statut à `confirme`, calcule `qualifie`, affiche « Votre inscription est confirmée » avec un lien vers `autodiagnostic.html?src=confirmation`, puis déclenche l'email de bienvenue (§ 9).
7. `desinscription.php?jeton=…` (lien présent dans chaque email) : supprime l'inscription en un clic, sans connexion, et affiche une confirmation.
8. Conservation (H, **à valider par juriste-rgpd**) : inscriptions non confirmées supprimées après 30 jours ; inscriptions confirmées conservées jusqu'à 3 ans après le dernier contact de la personne, puis supprimées. Base hors de la racine web (base MySQL o2switch ou fichier hors `public_html`, au choix de dev-vitrine). Aucun outil tiers en dehors de Mailjet.
9. Export CSV pour le fondateur (sans IP) et un compteur par source, variante et qualification, protégés par authentification. Le compteur interne est la **source de vérité** des inscriptions ; l'outil d'audience ne sert qu'aux taux.
10. En pré-lancement, le script tourne sur o2switch ; à la mise en production de l'application, migration vers l'API du VPS (`CLAUDE.md`, stack).

### 7.3 Pourquoi un double opt-in
Il prouve que l'adresse existe et appartient à la personne : c'est ce qui rend le compte des inscrits **vérifiable**, condition du critère éliminatoire « signal de demande vérifiable ». Contrepartie : environ un tiers des inscriptions peuvent se perdre à la confirmation (H) ; d'où l'indicateur de confirmation du § 6.3.

## 8. Test A/B du titre

**Trois variantes de hero (skills landing-page et copywriting) :**

| | Titre | Sous-titre | Angle | Usage |
|---|---|---|---|---|
| **A** (contrôle) | Votre informatique, enfin lisible. | (celui du § 5.1) | Promesse générale de lisibilité (tagline 1) | P1, par défaut |
| **B** | Quand votre référent informatique part, votre informatique reste. | (identique à A) | Déclencheur n° 1, continuité (S2, tagline 3) | P1, `?v=b` |
| **C** (réserve) | Tout votre SI sur une page. Les alertes avant les surprises. | (identique à A) | Produit en deux phrases (tagline 4) | Si A et B convertissent < 2 % |
| **ESS** | Présentez à votre CA une informatique maîtrisée et chiffrée. | « Ce que vous avez, ce que vous payez, ce qui arrive à échéance, sur une seule page. Un DSI de poche pour les associations et les structures de l'ESS de 20 à 249 salariés sans DSI, mis en place avec vous, à tarif associatif. » | Rendre compte au CA et aux financeurs (message 7) | P2, `?public=ess`, hors test A/B |

**Hypothèse :** pour P1, un titre qui nomme le déclencheur (le départ du référent) convertit mieux qu'une promesse générale, parce que le départ est le moment où le besoin devient concret (S2). Si B gagne, le message de continuité devient le message principal de la prospection et du blog.

**Métrique principale :** taux de conversion visiteur unique → inscription envoyée, par variante. Secondaires : début de formulaire, clic sur l'autodiagnostic, part d'inscrits qualifiés.

**Affectation sans cookie :** la variante est portée par le lien (`?v=a` ou `?v=b`), pas par un stockage dans le navigateur. Les liens individuels (C1, C2) alternent A et B d'un contact à l'autre dans l'ordre de la liste ; les liens publics (blog, Facebook) alternent par publication. Le trafic ESS n'entre pas dans le test.

**Taille d'échantillon (calcul à la main, test bilatéral, α = 5 %, puissance 80 %, base 5 %) :**
- détecter un doublement (5 % → 10 %) : **≈ 435 visiteurs par variante**, soit ≈ 870 au total ;
- détecter + 50 % (5 % → 7,5 %) : **≈ 1 470 par variante**, soit ≈ 2 940 au total.

**Réalisme :** le trafic P1 attendu en 8 semaines (C1, C2, blog, direct : ≈ 300 visiteurs, H, § 6.2) **ne suffit pas** à conclure statistiquement. Le test est donc **exploratoire** : règle fixée à l'avance, on garde B seulement si son taux est au moins le double de celui de A sur ≥ 150 visiteurs par variante, et si les entretiens confirment que le départ du référent est le déclencheur le plus cité. Sinon on garde A (cohérent avec la marque). Le test se poursuit après le pré-lancement si le trafic augmente.

## 9. Après l'inscription (brouillons, envoi soumis à validation)

**Email 1 : confirmation (transactionnel, immédiat)**
- Objet : « Confirmez votre inscription à la liste d'attente Lanternis »
- Corps : « Bonjour, vous avez demandé à rejoindre la liste d'attente de Lanternis pour [structure]. Pour confirmer, cliquez sur ce lien : [Confirmer mon inscription]. Si vous n'êtes pas à l'origine de cette demande, ignorez cet email : rien ne sera conservé. — Lanternis est une marque d'Hasteria SASU. »

**Email 2 : bienvenue (après confirmation)**
- Objet : « Votre place est réservée. Une question pour vous »
- Corps : « Merci. Nous ouvrirons Lanternis d'abord aux inscrits, par petits groupes, et nous vous préviendrons avant. En attendant, une question, à laquelle vous pouvez répondre simplement à cet email : **quel est aujourd'hui votre plus gros problème avec votre informatique ?** Et si vous avez 5 minutes : [faire l'autodiagnostic SI en 10 questions] (lien `autodiagnostic.html?src=confirmation`). — Lanternis est une marque d'Hasteria SASU. [Me désinscrire] »
- Les réponses à la question ouverte alimentent `2-marche/script-interview.md` (recrutement d'entretiens) et la vérification du rôle de l'inscrit.

## 10. Événements à mesurer (outil sans cookie, hypothèse)

**Outil (H, à trancher avec devops et juriste-rgpd) :**
- **Option 1 : Matomo en mode sans cookie**, auto-hébergé. Matomo est une application PHP et MySQL, a priori installable sur l'hébergement o2switch (à vérifier) ; souveraineté maximale.
- **Option 2 : Plausible**, qui ne dépose pas de cookie ; version auto-hébergée (Community Edition) sur le VPS, ou offre hébergée (localisation de l'hébergement à vérifier).
- Dans les deux cas : pas de bandeau cookie si la configuration entre dans l'exemption de consentement de la CNIL pour la mesure d'audience (**à faire valider par juriste-rgpd**) ; un seul script, servi depuis notre domaine ; aucune donnée personnelle dans les propriétés d'événement.
- **Aujourd'hui, `validation.html` ne charge aucun outil.** Le script de la page appelle `window.plausible` ou `window._paq` seulement s'ils existent : il suffira d'ajouter le script de l'outil retenu.

| Événement | Déclencheur dans la page | Propriétés (jamais de donnée personnelle) | Sert à |
|---|---|---|---|
| Page vue | Chargement (natif de l'outil) | variante, source (via l'URL) | Dénominateur des taux |
| `CTA hero` | Clic sur « Rejoindre la liste d'attente » du hero | variante, source | Force du hero |
| `Voir tarifs` | Clic sur « Voir les tarifs envisagés » | variante, source | Intérêt prix (H3, indirect) |
| `Clic autodiagnostic` | Clic sur « Faire l'autodiagnostic » | variante, source | Attrait du lead magnet |
| `Ouverture FAQ` | Ouverture d'une question | question (60 premiers caractères) | Objections qui comptent |
| `Début formulaire` | Premier focus dans le formulaire | variante, source | Friction du formulaire (début → envoi) |
| `Envoi formulaire` | Soumission | effectif, type, douleur (valeurs de liste), variante, source | Conversion et qualification par variante |
| `Inscription` | Retour `?inscription=ok` | variante, source | Contrôle croisé avec le compteur de `waitlist.php` |
| Profondeur de défilement | Natif (Plausible) ou suivi de contenu (Matomo) | — | Sections lues avant l'abandon |

Revue chaque quinzaine (calendrier de `acquisition.md` § 5), consignée dans `marketing/rapports/`.

## 11. Conformité, accessibilité, sobriété (contrôles faits sur le brouillon)

- **Aucun chiffre non sourcé** : seuls S2 (HelloWork, Insee) et la grille de prix (marquée « envisagée ») apparaissent ; l'aperçu est légendé « exemple fictif ».
- **Aucun faux témoignage, logo client ou compteur d'inscrits.** Section « déjà vrai / prévu » à la place.
- **Aucune ressource externe ni traceur** : CSS `../../marque/charte/tokens.css`, logos et favicon en SVG locaux (`../../marque/charte/logo/`), icônes en SVG intégrés ; police Fraunces attendue dans `marque/charte/fonts/` (repli système en attendant) ; liens externes seulement dans les sources (aucun chargement).
- **Poids** : HTML ≈ 40 Ko, `tokens.css` ≈ 9 Ko, SVG ≈ 1 à 2 Ko chacun, soit **≈ 55 Ko hors police**, sous le budget de 200 Ko (à mesurer à la recette).
- **RGAA (visé, à auditer par accessibilite-ecoconception)** : `lang="fr"`, liens d'évitement, repères (`header`, `main`, `footer`, `nav` nommée), un seul `h1`, hiérarchie de titres, contrastes issus de `tokens.css` (ambre vif seulement sur nuit), focus visible de 3 px, champs étiquetés, groupes de boutons radio en `fieldset`/`legend`, champs obligatoires signalés en texte, messages de retour en `role="status"` / `role="alert"`, FAQ en `details`/`summary`, cibles de 44 px, `prefers-reduced-motion` et thème sombre respectés, aucune information portée par la couleur seule, page utilisable sans JavaScript (titre A et formulaire classique).
- `noindex` posé tant que la page est un brouillon : **à retirer à la mise en ligne**.

## 12. À faire avant la mise en ligne (bloquants)

1. Validation explicite du fondateur sur les textes, les prix affichés et la mise en ligne.
2. Recherche d'antériorité du nom et du logo, réservation de lanternis.fr (STATUT : en cours).
3. `confidentialite.html` et `mentions-legales.html` (juriste-rgpd), base légale de la liste d'attente et durées de conservation.
4. `waitlist.php`, `confirm.php`, `desinscription.php` (dev-vitrine), Mailjet avec SPF, DKIM et DMARC.
5. `autodiagnostic.html` (dev-vitrine, d'après `autodiagnostic.md`).
6. Choix et installation de l'outil d'audience sans cookie ; sinon retirer la phrase « aucun cookie ».
7. Revérifier les liens sources (offres d'emploi expirables) ; police Fraunces ; image Open Graph ; retrait du `noindex`.
8. Test des 5 secondes auprès de 5 personnes de la cible (§ 3).

## 13. Hypothèses non vérifiées signalées
- Tous les taux de conversion, la répartition par source et le taux de qualification (§ 6.2) sont des hypothèses, sans donnée de référence pour cette cible.
- La grille de prix, la remise ESS et les frais de mise en place sont ceux de `prix.md` (H).
- Les promesses produit (alertes, synthèse mensuelle, connecteurs, hébergement en France, export) sont des cibles, marquées « prévu » quand elles ne sont pas acquises.
- L'éligibilité à la remise ESS et l'exemption CNIL de l'outil d'audience sont à valider juridiquement.
- La faisabilité de Matomo sur o2switch et la localisation d'hébergement de Plausible n'ont pas été vérifiées.
