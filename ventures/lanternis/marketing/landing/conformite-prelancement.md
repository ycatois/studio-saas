---
venture: lanternis
phase: 2b Pré-lancement
commande: /prelancement
auteur: juriste-rgpd
date: 2026-10-26
statut: brouillon
skills: registre-rgpd, politique-confidentialite, mentions-legales, cookies-consentement
fichiers liés: mentions-legales.html, confidentialite.html (même dossier)
validation requise: fondateur (arbitrages § 6) ; avocat (avant mise en ligne et avant le premier envoi de prospection)
---

# Conformité du pré-lancement Lanternis : registre, cookies, prospection, clauses, check-list

> **Ce document est un projet.** Il ne remplace pas l'avis d'un avocat. Il doit être relu par un avocat (droit des données personnelles et droit de la consommation) avant la mise en ligne de la landing et avant le premier message de prospection. Les points relevant de la TVA ou de la facturation ne sont pas concernés ici (aucune vente en pré-lancement).
> **Sources internes :** `SOCIETE.md`, `INFRA.md`, `validation.md` (§ 7 et § 10), `validation.html`, `autodiagnostic.md`, `marketing/emails/liste-attente-remerciement.md`, `marketing/campagnes/prospection-entretiens/invitation-entretien.md` (§ 4 à § 6).
> **Sources externes :** consultées le **2026-10-26**, listées au § 7. (H) = hypothèse ou interprétation non confirmée par une source officielle.

---

## 0. Décisions proposées en une page

| Sujet | Décision proposée | Statut |
|---|---|---|
| Base légale liste d'attente | **Consentement** (double opt-in), retirable en un clic | À valider par l'avocat (alternative : mesures précontractuelles, art. 6.1.b) |
| Nouvelles, échange de 30 min | Consentements **distincts**, cases non cochées | Conforme au formulaire actuel |
| Prospection email et téléphone | **Intérêt légitime**, B2B uniquement, lien avec la fonction, information + opposition | Conforme CNIL (§ 3) |
| Autodiagnostic | Calcul **dans le navigateur**, rien n'est transmis ni stocké ; transmission seulement si la case « Joindre mon résultat » est cochée | À vérifier sur la page réalisée par dev-vitrine |
| Cookies | **Aucun cookie, donc pas de bandeau** | À confirmer en recette (§ 2) |
| Pixels dans les emails | **Désactiver** le suivi des ouvertures et des clics Mailjet | Nouveau : recommandation CNIL du 12 mars 2026 (§ 2.3) |
| Mesure d'audience | Aucune aujourd'hui ; si installée : Matomo auto-hébergé en mode exemption CNIL, ou Plausible auto-hébergé sur le VPS OVH | [À CONFIRMER] |
| Opposition | Une seule **liste d'opposition au niveau d'Hasteria**, valable pour toutes ses marques | § 3.6 |
| AIPD | **Non requise** a priori (pas de données sensibles, faible volume, pas de profilage à effet juridique) | (H) à confirmer par l'avocat |

**Points bloquants avant mise en ligne :** domaine non réservé ; hébergeur et compte o2switch à confirmer ; accord de traitement (DPA) Mailjet à accepter et sa liste de sous-traitants ultérieurs à vérifier ; fournisseur de la messagerie `contact@hasteria.net` à identifier ; incohérences entre le formulaire réel et `liste-attente-remerciement.md` (§ 4.3) ; relecture par un avocat.

---

## 1. Registre des traitements du pré-lancement (Hasteria SASU, marque Lanternis)

Responsable du traitement : **Hasteria SASU**, 99 avenue Achille Peretti, 92200 Neuilly-sur-Seine, RCS Nanterre 981 178 429, représentée par Yann Catois (président). Contact : contact@hasteria.net. DPO : aucun désigné (H : non obligatoire pour l'activité actuelle, à confirmer par l'avocat).
Ces fiches s'ajoutent au registre général d'Hasteria (à créer s'il n'existe pas : un seul registre pour toutes les marques, une colonne « marque »).

### T1. Liste d'attente Lanternis

| Rubrique | Contenu |
|---|---|
| Finalité | Informer les inscrits de l'ouverture de Lanternis ; mesurer la demande (statistiques agrégées : inscrits qualifiés, par source, par variante, préoccupations) |
| Base légale | Consentement (art. 6.1.a RGPD), prouvé par le double opt-in (date d'envoi, date de confirmation, `version_mention`). Alternative à faire trancher par l'avocat : mesures précontractuelles à la demande de la personne (art. 6.1.b) |
| Personnes | Dirigeants, DAF, responsables administratifs de PME et de structures de l'ESS ; toute personne qui remplit le formulaire |
| Données | `email`, `structure`, `type`, `effectif`, `douleur`, `douleur_autre` (≤ 200 caractères, texte libre : risque de données inattendues, à surveiller), `variante`, `public`, `source`, `email_generique`, `qualifie`, `cree_le`, `confirme_le`, jetons de confirmation et de désinscription, `version_mention` |
| Destinataires | Président d'Hasteria uniquement. Sous-traitants : o2switch (hébergement), Mailjet (envoi) |
| Durée | Non confirmée : 30 jours. Confirmée : jusqu'au retrait, au plus 3 ans après le dernier contact émanant de la personne (aligné sur le référentiel CNIL « gestion des activités commerciales », S7). Abandon du projet (NO-GO) : suppression dans les 3 mois. Jetons de confirmation : 7 jours |
| Sécurité | Base hors racine web (`public_html`), requêtes préparées, HTTPS (AutoSSL), en-tête `Origin`/`Referer` vérifié, limitation de débit, champ piège, export CSV protégé par authentification et sans IP, exports chiffrés et supprimés après usage, aucune donnée dans Git |
| Sauvegardes | Sauvegardes de l'hébergement o2switch [À CONFIRMER : fréquence et durée] ; aucune copie sur le NAS ni sur le VPS en pré-lancement (si le fondateur exporte, fichier chiffré, supprimé après usage). À la migration vers le VPS OVH : sauvegardes chiffrées VPS / o2switch / NAS selon `INFRA.md`, durée de rétention à fixer (skill sauvegardes) |
| Transferts hors UE | Aucun volontaire. Mailjet : [À CONFIRMER] (§ 1, T8) |
| AIPD | Non |

### T2. Nouvelles de Lanternis (case `nouvelles`)

| Rubrique | Contenu |
|---|---|
| Finalité | Envoi de nouvelles et de conseils (au plus 1 par mois selon le libellé actuel de la case) |
| Base légale | Consentement distinct (case non cochée), horodaté avec la version du libellé |
| Données | Celles de T1 + `nouvelles`, date et version du libellé |
| Destinataires | Président ; Mailjet |
| Durée | Jusqu'au retrait, au plus 3 ans après le dernier contact émanant de la personne. Preuve du consentement : conservée tant que le consentement est utilisé (H : durée de conservation de la preuve après retrait à fixer avec l'avocat) |
| AIPD | Non |

### T3. Échanges de 30 minutes (case `echange`, demande depuis l'autodiagnostic) et étude

| Rubrique | Contenu |
|---|---|
| Finalité | Organiser et mener des entretiens de découverte (Mom Test) ; produire une synthèse anonymisée |
| Base légale | Consentement (case cochée ou demande d'échange) ; résultat de l'autodiagnostic transmis seulement si la case « Joindre mon résultat » est cochée |
| Données | T1 (ou email, structure, type, effectif) + `echange` horodaté ; `score`, `profil`, `reponses` si joints ; échanges d'emails, téléphone si fourni, notes d'entretien |
| Destinataires | Président uniquement. Sous-traitants : o2switch, Mailjet, messagerie d'Hasteria [À CONFIRMER], outil de visio [À CONFIRMER] |
| Durée | Demande sans suite : 12 mois. Notes nominatives et résultat joint : suppression ou anonymisation au plus tard 6 mois après l'entretien (proposition). Synthèse anonymisée : sans limite (plus de donnée personnelle). Notes **hors du dépôt Git** |
| AIPD | Non |

### T4. Autodiagnostic

| Rubrique | Contenu |
|---|---|
| Finalité | Afficher un profil et trois actions à l'écran |
| Traitement de données personnelles | **Aucun** si le calcul se fait dans le navigateur sans envoi ni stockage local (`autodiagnostic.md` § 1). Événements d'audience `Fin autodiagnostic` (profil, axe) : statistiques anonymes, voir T7 |
| Si dev-vitrine calcule côté serveur (à éviter) | Alors : informer avant la première question ; n'envoyer que les réponses, sans identifiant ni IP en clair ; ne rien conserver au-delà du calcul (ou seulement des agrégats anonymes) ; base légale à définir (intérêt légitime pour des statistiques agrégées) ; mettre à jour la section 5 de `confidentialite.html` avant la mise en ligne |
| Contrôle à faire | En recette : vérifier dans les outils de développement du navigateur qu'aucune requête n'emporte les réponses et que rien n'est écrit dans `localStorage`, `sessionStorage` ou les cookies |

### T5. Prospection et étude B2B par email et téléphone

| Rubrique | Contenu |
|---|---|
| Finalité | Inviter des professionnels à un entretien de 30 minutes ; suivi des contacts (3 messages au plus) ; gestion des oppositions |
| Base légale | Intérêt légitime (art. 6.1.f RGPD) ; message en rapport avec la fonction (S1, S2). Pour l'email : art. L34-5 CPCE, régime B2B rappelé par la CNIL (S1) |
| Personnes | Dirigeants de PME, DAF / RAF / directeurs d'associations (salariés) ; standards |
| Données | Civilité, nom, fonction, structure, email professionnel, téléphone professionnel, **source** de la donnée, dates et résultats des contacts, opposition, notes d'entretien si accepté |
| Source | Site de la structure, offre d'emploi publiée par la structure, standard, recommandation ; réseau Tecnoo [À CONFIRMER : modalités, § 3.7] |
| Destinataires | Président uniquement. Sous-traitants : messagerie d'Hasteria [À CONFIRMER], tableur de suivi [À CONFIRMER : outil et lieu de stockage, **hors Git**], opérateur téléphonique |
| Durée | Sans réponse : 12 mois après le dernier message (plus sobre que les 3 ans du référentiel CNIL, S7) ; réponse favorable : 3 ans après le dernier contact émanant de la personne ; adresses reconstituées : voir § 3.2 |
| Liste d'opposition | Empreintes hachées (email, numéro) au niveau d'**Hasteria**, finalité exclusive, **3 ans minimum** (S8) |
| Sécurité | Tableur chiffré ou dans un espace à accès restreint, pas de partage, pas d'outil d'enrichissement, pas de pixel ni de lien traqué |
| AIPD | Non (faible volume : quelques dizaines de contacts) |

### T6. Sécurité du site : limitation de débit et journaux

| Rubrique | Contenu |
|---|---|
| Finalité | Lutter contre les abus du formulaire ; sécurité de l'hébergement |
| Base légale | Intérêt légitime (Hasteria) ; obligations légales de l'hébergeur pour ses propres journaux |
| Données | IP hachée avec sel (jamais en clair) ; journaux d'accès du serveur (IP, horodatage, URL, agent utilisateur) tenus par o2switch |
| Durée | IP hachée : 24 h au plus ; journaux o2switch : [À CONFIRMER] |

### T7. Mesure d'audience (non active)

| Rubrique | Contenu |
|---|---|
| État | **Aucun outil installé** ; `validation.html` contient seulement des points d'accroche inactifs |
| Si activée | Finalité strictement limitée à la mesure d'audience pour le compte exclusif d'Hasteria ; statistiques anonymes ; pas de recoupement avec la liste d'attente ; pas de suivi multi-sites ; conservation 25 mois au plus ; information dans la politique (conditions d'exemption CNIL, S6) |
| Base légale | Exemption de consentement (art. 82 loi Informatique et Libertés) si les conditions sont remplies ; à défaut, consentement et bandeau |
| Options | (a) Matomo auto-hébergé sur o2switch en « mode conformité CNIL » (S6b) ; (b) Plausible Community Edition sur le VPS OVH. Offre hébergée de Plausible : localisation non vérifiée [À CONFIRMER] |

### T8. Sous-traitants (art. 28 RGPD)

| Sous-traitant | Rôle | Localisation (déclarée) | Contrat art. 28 | À faire |
|---|---|---|---|---|
| o2switch SAS (Clermont-Ferrand) | Hébergement site, base, journaux | France (site o2switch, S10) | CGV, section IV : o2switch « agit [...] en tant que sous-traitant du Client » (S10) | Confirmer le compte et l'offre ; relever la durée des journaux et des sauvegardes |
| Mailjet (groupe Sinch) | Emails transactionnels et nouvelles | UE : Google Cloud, Francfort et Saint-Ghislain (S9) | DPA standard Sinch (lien donné par Mailjet, S9) | Accepter le DPA ; vérifier la liste des sous-traitants ultérieurs et les éventuels accès hors UE ; désactiver le suivi d'ouverture et de clic ; n'envoyer à Mailjet que email + structure + indicateurs utiles |
| Messagerie de `contact@hasteria.net` | Réponses, prospection, droits | [À CONFIRMER] | [À CONFIRMER] | Identifier le fournisseur et son DPA |
| Outil de visio pour les entretiens | Entretiens | [À CONFIRMER] | [À CONFIRMER] | Préférer un outil hébergé dans l'UE ; pas d'enregistrement sans accord explicite |
| GitHub | Code uniquement | — | — | **Aucune donnée personnelle** : pas d'export, pas de tableau de suivi, pas de notes (`.gitignore` déjà en place pour la prospection) |

---

## 2. Cookies et traceurs : position

### 2.1 Position
**Aucun cookie ni autre traceur n'est déposé ou lu par les pages de pré-lancement : aucun bandeau de consentement n'est nécessaire.** L'obligation de consentement de l'article 82 de la loi Informatique et Libertés porte sur les opérations de lecture ou d'écriture sur le terminal ; en leur absence, il n'y a rien à consentir. **À confirmer** par un contrôle en recette (§ 6) et par l'avocat.

Constat sur les brouillons (lecture du code, 2026-10-26) :
- `validation.html` : aucune ressource externe, script sans cookie ni `localStorage`, variante portée par l'URL (`?v=`), événements d'audience inactifs (aucun outil chargé).
- `mentions-legales.html`, `confidentialite.html` : aucun script.

### 2.2 Ce qui ferait tomber la position (à surveiller par dev-vitrine)
1. `session_start()` dans `waitlist.php`, `confirm.php` ou `desinscription.php` : dépose un cookie `PHPSESSID`. Ne pas utiliser de session côté visiteur. Le cookie de session de l'espace d'export du fondateur est strictement nécessaire (exempté) et ne concerne que lui.
2. Une protection anti-robots ou un cache de l'hébergeur qui ajouterait un cookie [À CONFIRMER en recette].
3. Une police, une vidéo, une carte, un bouton social ou un captcha tiers.
4. Un outil d'audience qui ne remplit pas les conditions d'exemption de la CNIL (S6).
5. Le stockage de la progression de l'autodiagnostic dans le navigateur.

Si l'un de ces cas survient : retirer la phrase « Cette page ne dépose aucun cookie » (landing, pied de page, politique) et, si le traceur n'est pas exempté, mettre en place un bandeau conforme (refuser aussi simple qu'accepter, choix conservé 6 mois, preuve du consentement).

### 2.3 Emails : pixels de suivi (nouveau, à intégrer dans les brouillons d'emails)
La CNIL a adopté le **12 mars 2026** une recommandation sur les pixels de suivi dans les courriels (délibération n° 2026-042, publiée le 14 avril 2026) : le consentement est la règle ; l'exemption vise la mesure individuelle de la délivrabilité d'emails rattachés à un service demandé, avec des données limitées au strict nécessaire (S5). **Décision proposée :** désactiver le suivi des ouvertures (et, par sobriété, des clics) dans Mailjet pour tous les envois Lanternis ; garder seulement les paramètres de provenance dans les liens, lus de façon agrégée par l'outil d'audience. Cela tranche le point « Mesure » ouvert dans `liste-attente-remerciement.md` § 5. Les emails de prospection, envoyés à la main sans pixel, sont déjà conformes.

---

## 3. Réponses aux points « à trancher » de `invitation-entretien.md` § 6

> Interprétations argumentées à partir des sources officielles du § 7, **à valider par l'avocat**. Remarque préalable : la page CNIL sur la prospection téléphonique affiche la date du 10 juin 2026 tout en décrivant le régime « depuis le 11 août 2026 » (incohérence déjà relevée) ; le régime du 11 août 2026 est confirmé par Légifrance et service-public.gouv.fr (S3, S4).

### 3.1 Portable professionnel communiqué par le standard
**Réponse : autorisé, aux mêmes conditions qu'une ligne fixe professionnelle.**
- Le critère n'est pas la technologie (fixe ou mobile) mais la **qualité de la personne appelée** : un professionnel contacté au sujet de sa fonction relève du régime B2B (intérêt légitime, information, opposition simple et gratuite, S2). Le consentement préalable instauré le 11 août 2026 ne vise que le **consommateur** (art. L223-1 du code de la consommation, réécrit par l'article 13 de la loi n° 2025-594 du 30 juin 2025 : interdiction de démarcher par téléphone un consommateur sans son consentement préalable, S3).
- Un numéro donné **par le standard** de la structure, pour joindre la personne dans ses fonctions, est un numéro professionnel au sens pratique (H).
- **Limites :** ne jamais utiliser un portable trouvé ailleurs (annuaire, réseau social, outil d'enrichissement) ni un numéro qui paraît personnel ; ne pas appeler les bénévoles d'association (président, trésorier) sur un numéro personnel : agissant hors activité professionnelle rémunérée, ils risquent d'être qualifiés de consommateurs, ce qui exige désormais leur consentement préalable (H, à confirmer par l'avocat).
- Noter dans le tableau de suivi : « portable professionnel, communiqué par le standard le {date} ».

### 3.2 Adresses email reconstituées (prenom.nom@structure)
**Réponse : possible juridiquement sous conditions, mais la règle par défaut de Lanternis reste « pas d'adresse reconstituée ». Exception encadrée autorisée.**
- La CNIL a publié le **16 octobre 2026** une fiche « Reconstitution d'adresses électroniques professionnelles : dans quel cadre est-ce autorisé ? » (S11) : l'intérêt légitime peut fonder la pratique, au cas par cas (intérêt réel, absence d'atteinte disproportionnée, attentes raisonnables de la personne) ; les personnes **sans présence professionnelle identifiable en ligne** ou qui ont protégé leurs coordonnées ne peuvent a priori pas s'y attendre ; toute opposition entraîne l'**exclusion immédiate** ; conservation strictement limitée, l'adresse n'étant gardée que si un **premier contact effectif** est établi dans un délai raisonnable.
- **Règle proposée pour Lanternis :**
  1. Premier choix : standard ou adresse générique (non soumise aux règles de prospection des personnes, S1), puis adresse nominative publiée ou communiquée.
  2. Reconstitution permise seulement si : la personne est nommée publiquement dans sa fonction par la structure elle-même (site, offre d'emploi, rapport d'activité) ; le format d'adresse est vérifiable sur une adresse publiée par la même structure ; aucun outil de devinette ou d'enrichissement n'est utilisé.
  3. Le premier email l'indique : « Votre adresse a été déduite du format des adresses de {Structure} et de votre nom publié sur {source}. »
  4. Sans réponse à l'issue de la relance 2 : **suppression de l'adresse** (pas de conservation 12 mois). Opposition : exclusion immédiate et empreinte dans la liste d'opposition.

### 3.3 Horaires d'appel
**Réponse : aucune plage légale n'est imposée pour les appels aux professionnels ; adopter une règle interne.**
- L'article D223-9 du code de la consommation (version du 11 août 2026) fixe, pour **le consommateur**, les plages du lundi au vendredi, 10 h – 13 h et 14 h – 20 h, hors jours fériés, et au plus 4 sollicitations en 30 jours (S3b). Il ne vise pas les professionnels.
- **Règle interne proposée :** jours ouvrés, hors jours fériés, **10 h – 12 h 30 et 14 h – 18 h** (heures de bureau ; 20 h est inadapté en B2B) ; au plus **2 tentatives d'appel et 1 message vocal** par interlocuteur et par séquence, dans la limite des 3 messages de la séquence (§ 0 d'`invitation-entretien.md`) ; aucun rappel pendant au moins 3 mois après un refus non assorti d'opposition, et jamais après une opposition.

### 3.4 Bloctel
**Réponse : sans objet.**
- Bloctel était une liste d'opposition au démarchage des **consommateurs**. Le service **a cessé d'exister le 11 août 2026**, remplacé par le principe du consentement préalable du consommateur (S4).
- En B2B, aucune liste publique à consulter : la seule liste à tenir est la **liste d'opposition interne d'Hasteria** (§ 3.6).

### 3.5 Réforme du démarchage téléphonique (11 août 2026)
**Réponse : la prospection B2B de Lanternis n'est pas soumise au consentement préalable ; elle reste soumise au RGPD.**
- Depuis le 11 août 2026, il est interdit de démarcher par téléphone un **consommateur** qui n'a pas exprimé son consentement préalable (art. L223-1 réécrit, S3) ; le décret n° 2026-662 du 23 juillet 2026 fixe les modalités de recueil, de conservation et de retrait de ce consentement du consommateur (S3c). La CNIL confirme que les professionnels peuvent seulement s'opposer (S2).
- **Risque résiduel :** appeler une personne qui n'agit pas à titre professionnel (numéro personnel, bénévole, très petite association sans salarié). Règle : en cas de doute sur la qualité professionnelle de la personne ou du numéro, **ne pas appeler** ; passer par l'email générique de la structure.
- Le script d'appel (§ 4.2 d'`invitation-entretien.md`) satisfait l'information et l'opposition ; ajouter la phrase sur la source du numéro (§ 5.3 ci-dessous).

### 3.6 Une opposition vaut-elle pour toutes les marques d'Hasteria ?
**Réponse : oui.**
- La CNIL indique qu'une personne qui s'est opposée à la prospection d'un **organisme** « ne doit pas être sollicitée à nouveau par celui-ci » (S8). L'organisme, et le responsable du traitement, est **Hasteria SASU** : Lanternis et les futures marques ne sont pas des personnes morales distinctes. Une opposition reçue au nom de Lanternis s'impose donc à toute prospection d'Hasteria, quelle que soit la marque (interprétation prudente, H à confirmer par l'avocat).
- **Mise en œuvre :** une seule liste d'opposition pour Hasteria (empreintes hachées des emails et numéros), consultée avant toute prospection, quelle que soit la marque ; finalité exclusive ; conservation **3 ans minimum** (S8). Les messages disent : « vaut pour Lanternis et toutes les marques d'Hasteria SASU ».
- Cela ne vaut pas désinscription automatique d'une liste d'attente à laquelle la personne s'est inscrite elle-même ensuite (demande émanant d'elle) ; dans le doute, lui demander.

### 3.7 Autres points ouverts du § 6
- **Durée de conservation des prospects** (§ 6.4) : retenir **12 mois sans réponse** (plus sobre que le référentiel, écart justifié par le caractère exploratoire de l'étude) et **3 ans** après le dernier contact émanant de la personne (S7).
- **Pixels dans les emails de prospection** (§ 6.5.3) : tranché par la recommandation CNIL de mars 2026 (§ 2.3) : aucun pixel.
- **Associations** (§ 6.5.8) : le DAF, le RAF ou le directeur **salarié** contacté sur ses coordonnées professionnelles relève du régime B2B (S1, S2 : rapport avec la fonction) ; les bénévoles, non (voir § 3.1).
- **Réseau Tecnoo** (§ 6.5.7) : si les coordonnées viennent des fichiers de Tecnoo, Tecnoo est un tiers : il faut que les personnes aient été informées par Tecnoo d'une possible transmission (S1, « coordonnées obtenues auprès de tiers ») et indiquer la source dans le premier message. Plus simple : ne contacter que des personnes connues personnellement du fondateur (source « réseau professionnel du fondateur ») ou présentées par une recommandation explicite. Décision du fondateur attendue (déjà dans `STATUT.md`).
- **Registre** (§ 6.5.4) : fait (T5 ci-dessus).

---

## 4. Clauses d'information

### 4.1 Sous le formulaire de la liste d'attente (remplace le paragraphe `.mention-form` de `validation.html`)
> Hasteria SASU, qui exploite la marque Lanternis, utilise ces informations, avec votre accord, pour vous prévenir de l'ouverture de Lanternis et mesurer l'intérêt pour le projet, et, si vous avez coché les cases ci-dessus, pour vous envoyer ses nouvelles ou vous proposer un échange. Vos données sont hébergées en France (site) et dans l'Union européenne (envoi des emails), ne sont ni vendues ni cédées, et sont supprimées au plus tard 3 ans après votre dernier contact avec nous (30 jours si vous ne confirmez pas votre inscription). Vous pouvez vous désinscrire en un clic, et accéder à vos données, les rectifier, les effacer ou vous opposer à leur utilisation en écrivant à contact@hasteria.net. Vous pouvez aussi saisir la CNIL. Détails dans notre politique de confidentialité.

Mettre à jour `version_mention` dans `waitlist.php` à chaque changement de ce texte. À reprendre par cro-conversion / dev-vitrine (ce document ne modifie pas `validation.html`).

### 4.2 Formulaire de demande d'échange de l'autodiagnostic
> Hasteria SASU (marque Lanternis) utilise ces informations pour vous recontacter et organiser l'échange que vous demandez. Votre résultat n'est transmis que si vous cochez la case prévue. Données supprimées 12 mois après votre demande si l'échange n'a pas lieu ; notes d'échange supprimées ou rendues anonymes au plus tard 6 mois après. Droits et contact : contact@hasteria.net ; réclamation possible auprès de la CNIL. Détails dans notre politique de confidentialité.

### 4.3 Pied des emails automatiques (liste d'attente, nouvelles)
> Vous recevez cet email parce que vous vous êtes inscrit(e) à la liste d'attente de Lanternis le {date_inscription}. [Me désinscrire en un clic] · [Politique de confidentialité]
> Lanternis est une marque d'Hasteria SASU, SASU au capital de 300 €, 99 avenue Achille Peretti, 92200 Neuilly-sur-Seine, RCS Nanterre 981 178 429. Contact : contact@hasteria.net.

**Incohérences à corriger dans `marketing/emails/liste-attente-remerciement.md` (non modifié ici) :** ce brouillon décrit un autre formulaire (prénom facultatif, type « autre », case « conseils » hebdomadaire, double opt-in seulement si la case est cochée, autodiagnostic en 20 questions, outil de prise de rendez-vous) que celui de `validation.html` et `validation.md` § 7 (pas de prénom, double opt-in pour tous, nouvelles au plus mensuelles, 10 questions, pas d'outil de rendez-vous). La politique de confidentialité suit le formulaire réel. **Le libellé de la case et la fréquence réelle des envois doivent être identiques**, sinon le consentement n'est pas éclairé. Ne pas utiliser d'outil de prise de rendez-vous tiers sans l'ajouter aux sous-traitants.

### 4.4 Pied des emails de prospection (remplace le § 5 d'`invitation-entretien.md`)
> Vous recevez ce message d'Hasteria SASU (projet Lanternis), 99 avenue Achille Peretti, 92200 Neuilly-sur-Seine, en raison de vos fonctions de {Fonction} chez {Structure}, au sujet de l'organisation informatique de votre structure. Nous utilisons vos coordonnées professionnelles (nom, fonction, structure, email, téléphone professionnel), obtenues {source : sur le site de {Structure} / auprès du standard de {Structure} / par {recommandation de …} / déduites du format des adresses de {Structure} et de votre nom publié sur {source}}, sur la base de notre intérêt légitime, pour vous proposer un échange de 30 minutes. Sans réponse, elles sont supprimées au plus tard 12 mois après notre dernier message. Pour ne plus être contacté(e) par Hasteria, pour Lanternis comme pour ses autres marques, répondez « Stop ». Vous pouvez accéder à vos données, les faire rectifier ou effacer en écrivant à contact@hasteria.net, et saisir la CNIL. Détails : {lien confidentialité}.

(≈ 130 mots : il contient les mentions de l'article 14 du RGPD exigées lors du premier contact, dont **la source et les catégories de données**. Pour les relances dans le même fil, une version courte suffit : « Pour ne plus être contacté(e), répondez "Stop". Vos données et vos droits : {lien confidentialité}. »)

### 4.5 Au téléphone (complète le § 4.2 d'`invitation-entretien.md`)
> « Je vous ai joint {par le standard / sur votre ligne professionnelle publiée sur le site de {Structure}}. Je note uniquement votre nom, votre fonction et vos coordonnées professionnelles pour cette étude ; si vous préférez que je ne vous recontacte plus, je le note tout de suite, pour Hasteria et toutes ses marques. Je vous envoie par email les informations détaillées. »

Puis envoyer l'email d'information (§ 4.4) **le jour même**, et au plus tard dans le mois (art. 14 RGPD, S12). Si la personne s'oppose : inscrire l'opposition et ne pas envoyer d'email (sauf demande).

---

## 5. Points de vigilance sur les traitements réels

1. **`douleur_autre` (texte libre)** : peut contenir une donnée inattendue (nom d'un salarié qui part, incident). Afficher sous le champ : « N'indiquez pas de nom de personne. » (à proposer à cro-conversion).
2. **Événement d'audience `Envoi formulaire`** (effectif, type, douleur) : acceptable seulement si l'outil reste en exemption (statistiques anonymes, aucun recoupement avec la base). Ne jamais y mettre l'email ni la structure.
3. **Données envoyées à Mailjet** : email, structure (personnalisation), indicateurs `nouvelles`, `segment`. Pas de `douleur`, pas de `source`.
4. **Variante P1-D de la prospection** : ne jamais nommer ni enregistrer la personne qui quitte la structure (déjà prévu, à maintenir).
5. **Phrase « Hébergement des données en France »** de la landing : vraie pour le site (o2switch) ; pour les emails, l'hébergement est dans l'UE (Mailjet) : ne pas écrire « toutes vos données restent en France ».
6. **Formulaire « Votre fonction »** (arbitrage ouvert du fondateur) : s'il est ajouté, mettre à jour T1, la politique (section 2) et la clause 4.1.

---

## 6. Check-list avant mise en ligne

**Bloquants juridiques et administratifs**
- [ ] Relecture de `mentions-legales.html`, `confidentialite.html` et de ce document par un **avocat** ; base légale de la liste d'attente tranchée.
- [ ] Domaine réservé (lanternis.fr pressenti) et remplacé partout ; marqueurs `[À CONFIRMER]` tous levés ou les phrases retirées.
- [ ] Hébergeur confirmé (compte o2switch, offre) ; adresse du siège o2switch revérifiée ; durée des journaux et des sauvegardes relevée.
- [ ] DPA Mailjet accepté ; liste des sous-traitants ultérieurs lue ; mention de la section 12 de la politique ajustée.
- [ ] Fournisseur de la messagerie `contact@hasteria.net` identifié et ajouté à la section 11 ; boîte relevée au moins 2 fois par semaine (délai d'un mois pour les droits).
- [ ] Registre général d'Hasteria créé ou complété avec T1 à T8.
- [ ] Ne pas écrire « marque déposée » avant l'enregistrement INPI.

**Technique (dev-vitrine, avec recette)**
- [ ] Aucun cookie, aucun `localStorage` / `sessionStorage`, aucune requête vers un domaine tiers sur toutes les pages (outils de développement du navigateur, onglets Réseau et Application), y compris après envoi du formulaire et sur `confirm.php` / `desinscription.php`.
- [ ] Autodiagnostic : aucune réponse transmise sans la case « Joindre mon résultat » ; rien stocké dans le navigateur.
- [ ] `waitlist.php` : base hors `public_html`, IP hachée 24 h, pas de session visiteur, `version_mention` à jour, purge automatique des non-confirmés à 30 jours, purge à 3 ans.
- [ ] Lien de désinscription en un clic fonctionnel dans chaque email + en-tête `List-Unsubscribe`.
- [ ] Mailjet : suivi des ouvertures et des clics **désactivé** ; SPF, DKIM, DMARC configurés.
- [ ] HTTPS actif (AutoSSL), redirection HTTP vers HTTPS.
- [ ] Liens « Mentions légales » et « Politique de confidentialité » présents dans le pied de toutes les pages et de tous les emails.

**Contenus**
- [ ] Clause 4.1 intégrée sous le formulaire ; clause 4.2 sous le formulaire d'échange.
- [ ] Brouillons d'emails alignés sur le formulaire réel (§ 4.3) ; libellé de la case « nouvelles » = fréquence réelle.
- [ ] Section 8 (audience) complétée si un outil est installé, ou laissée « aucune mesure ».
- [ ] Adresse postale de la CNIL revérifiée.
- [ ] Bandeaux « Brouillon » et balises `noindex` retirés des trois pages au moment de la publication (et seulement à ce moment).
- [ ] **Validation explicite du fondateur** pour la mise en ligne (règle 2 de `CLAUDE.md`).

**Avant le premier message de prospection**
- [ ] Réponses du § 3 validées (fondateur, puis avocat).
- [ ] Pied de message 4.4 et phrase téléphonique 4.5 intégrés aux modèles d'`invitation-entretien.md` (par l'agent commercial).
- [ ] Liste d'opposition Hasteria créée (empreintes hachées), consultée avant chaque message.
- [ ] Tableau de suivi hors Git, colonne « source » obligatoire.
- [ ] Politique de confidentialité en ligne (le lien du pied de message doit fonctionner).
- [ ] Décision sur le réseau Tecnoo (§ 3.7).

---

## 7. Sources (consultées le 2026-10-26)

| Réf. | Source | URL | Utilisée pour |
|---|---|---|---|
| S1 | CNIL, « La prospection commerciale par courrier électronique » (date affichée : 10 juin 2026) | https://www.cnil.fr/fr/la-prospection-commerciale-par-courrier-electronique | B2B : intérêt légitime, lien avec la profession, adresses génériques, identification, opposition, tiers |
| S2 | CNIL, « Prospection commerciale par téléphone (hors automate d'appel) : quelles sont les règles ? » (date affichée : 10 juin 2026, contenu postérieur au 11 août 2026) | https://www.cnil.fr/fr/prospection-commerciale-par-telephone-hors-automate-dappel-quelles-sont-les-regles | Téléphone B2B : intérêt légitime, information, opposition ; plages horaires réservées aux consommateurs |
| S3 | Légifrance, loi n° 2025-594 du 30 juin 2025, article 13 (réécriture de l'art. L223-1 du code de la consommation, entrée en vigueur le 11 août 2026) | https://www.legifrance.gouv.fr/eli/loi/2025/6/30/ECOX2432287L/jo/article_13 | Consentement préalable du consommateur |
| S3b | Légifrance, code de la consommation, art. D223-9 (version du 11 août 2026) | https://www.legifrance.gouv.fr/codes/article_lc/LEGIARTI000046422695 | Plages horaires et fréquence (consommateur) |
| S3c | Légifrance, décret n° 2026-662 du 23 juillet 2026 (JORF du 25 juillet 2026) | https://www.legifrance.gouv.fr/jorf/id/JORFTEXT000054483939 | Modalités du consentement du consommateur |
| S4 | Service-public.gouv.fr, actualité A19003 (publiée le 21 juillet 2026, mise à jour le 11 août 2026) | https://www.service-public.gouv.fr/particuliers/actualites/A19003 | Fin de Bloctel le 11 août 2026 ; horaires |
| S5 | CNIL, recommandation sur les pixels de suivi dans les courriels (délibération n° 2026-042 du 12 mars 2026, publiée le 14 avril 2026) | https://www.cnil.fr/fr/recommandation-pixel-suivi-courriels | Consentement aux pixels ; exemption délivrabilité |
| S6 | CNIL, « Cookies : solutions pour les outils de mesure d'audience » (4 juillet 2025) | https://www.cnil.fr/fr/cookies-solutions-pour-les-outils-de-mesure-daudience | Conditions d'exemption ; 13 mois / 25 mois |
| S6b | Matomo, « How do I configure Matomo without tracking consent for French visitors (CNIL exemption) » (source éditeur) | https://matomo.org/faq/how-do-i-configure-matomo-without-tracking-consent-for-french-visitors-cnil-exemption/ | Mode conformité CNIL de Matomo |
| S7 | CNIL, référentiel « gestion des activités commerciales » (délibération n° 2021-131) et questions-réponses | https://www.cnil.fr/sites/cnil/files/atoms/files/referentiel_traitements-donnees-caractere-personnel_gestion-activites-commerciales.pdf ; https://www.cnil.fr/fr/questions-reponses-sur-les-referentiels-relatifs-la-gestion-des-activites-commerciales-et-des | 3 ans après le dernier contact émanant du prospect (repris d'`invitation-entretien.md`) |
| S8 | CNIL, « Comment utiliser une liste repoussoir pour respecter l'opposition à la prospection ? » (10 juin 2026) | https://cnil.fr/fr/comment-utiliser-une-liste-repoussoir-pour-respecter-lopposition-la-prospection | Opposition opposable à l'organisme ; empreintes ; 3 ans minimum ; finalité exclusive |
| S9 | Mailjet, « Sécurité et confidentialité » (source éditeur) | https://www.mailjet.com/fr/legal/securite-confidentialite/ | Hébergement Google Cloud Francfort et Saint-Ghislain ; DPA ; DPO dpo@sinch.com |
| S9b | Sinch, Data Protection Agreement (lien donné par Mailjet, non lu en détail) | https://sinch.com/legal/terms-and-conditions/other-sinch-terms-conditions/data-protection-agreement/ | À lire : sous-traitants ultérieurs, transferts |
| S10 | o2switch, conditions générales de vente (source éditeur) et page d'accueil | https://www.o2switch.fr/cgv/ ; https://www.o2switch.fr/ | Identité (SAS, 100 000 €, Chemin des Pardiaux, Clermont-Ferrand, SIRET 510 909 807 00032, 04 44 44 60 40) ; statut de sous-traitant ; hébergement en France |
| S11 | CNIL, « Reconstitution d'adresses électroniques professionnelles : dans quel cadre est-ce autorisé ? » (16 octobre 2026) | https://cnil.fr/fr/node/169044 | Conditions de la reconstitution d'adresses |
| S12 | CNIL, « Conformité RGPD : comment informer les personnes et assurer la transparence ? » | https://www.cnil.fr/fr/conformite-rgpd-information-des-personnes-et-transparence | Collecte indirecte : source, catégories, délai d'un mois (art. 14 RGPD) |

**Limites de la recherche :** la page Légifrance de l'article L223-1 consolidé et la page DGCCRF « Les règles du démarchage téléphonique s'imposant aux entreprises » n'ont pas pu être chargées (erreur 403/404) : le texte de l'article est lu dans la loi de 2025 (S3). Aucune source officielle ne traite expressément du « portable professionnel » ni de l'opposition « par marque » : les réponses 3.1 et 3.6 sont des interprétations. Des sources secondaires (blogdumoderateur.com, 31 juillet 2026 : « La prospection entre professionnels, elle, n'est pas concernée par le nouveau régime ») vont dans le même sens, sans valeur officielle.

## 8. Hypothèses non vérifiées signalées
1. Consentement retenu comme base légale de la liste d'attente (alternative 6.1.b possible).
2. Absence d'obligation de désigner un DPO pour Hasteria.
3. Absence d'AIPD.
4. Durées proposées : 12 mois (prospects sans réponse, demandes d'échange sans suite), 6 mois (notes d'entretien nominatives), 3 mois (suppression après NO-GO).
5. Localisation réelle et sous-traitants ultérieurs de Mailjet ; localisation de l'offre hébergée de Plausible ; possibilité d'installer Matomo sur l'offre o2switch.
6. Absence de cookie déposé par l'infrastructure d'o2switch.
7. Qualification de consommateur pour un bénévole d'association contacté sur un numéro personnel.
