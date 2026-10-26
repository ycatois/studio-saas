---
venture: lanternis
phase: 2b Pré-lancement
auteur: lifecycle-emailing
date: 2026-10-26
statut: brouillon
skills: sequence-nurturing, copywriting-frameworks, ab-test
envoi: Mailjet (API appelée par le script PHP de liste d'attente sur o2switch) — RIEN N'EST ENVOYÉ, validation explicite de l'utilisateur requise avant toute activation
---

# Liste d'attente : emails de confirmation d'inscription

> **Sources de ton et de fond :** `marque/plateforme-de-marque.md` (vouvoiement, posé, pas de vente par la peur, mots interdits § 10.4), `marque/messages-par-persona.md` (P1, P2), `2-marche/acquisition.md` § 4.2 (objectif : ≥ 40 % d'inscrits qui complètent l'autodiagnostic), `2-marche/script-interview.md` (entretien de 30 minutes, « je ne vends rien »).
> **Signature :** la marque (« L'équipe Lanternis »), conformément à la décision du 2026-10-26 (pas de voix fondateur).
> **Aucun chiffre** n'apparaît dans ces emails, hormis la durée de l'entretien et le nombre de questions de l'autodiagnostic (20, repris de `acquisition.md` C8 ; à aligner sur l'outil réel).

---

## 1. Logique d'envoi

Le formulaire de la landing collecte le minimum (RGPD by design) :
- email (obligatoire) ;
- prénom (facultatif) ;
- type de structure : entreprise / association, fondation ou coopérative / autre (obligatoire, sert à la segmentation P1 / P2) ;
- tranche d'effectif : moins de 20 / 20 à 49 / 50 à 99 / 100 à 249 / 250 et plus (obligatoire, sert à qualifier l'inscrit) ;
- **case non pré-cochée** : « Je souhaite recevoir les conseils de Lanternis : un email par semaine environ pendant un mois, puis les nouvelles du lancement. Désinscription en un clic. »

| Case « conseils » | Email envoyé | Contenu | Suite |
|---|---|---|---|
| **Non cochée** | **E0-B « Inscription confirmée »** (immédiat) | Confirme la liste d'attente, invite à l'autodiagnostic, propose l'entretien | Aucun autre email que l'annonce de l'ouverture (finalité pour laquelle la personne s'est inscrite). Pas de nurturing. |
| **Cochée** | **E0-A « Confirmez votre adresse »** (immédiat, double opt-in) | Un seul bouton : confirmer | Sans clic : **une seule** relance à J+3, puis rien ; l'inscription aux conseils est abandonnée (la liste d'attente reste). |
| Cochée, puis lien cliqué | **E0-C « Bienvenue »** (immédiat après confirmation) | Confirme, invite à l'autodiagnostic, propose l'entretien | Entrée dans `sequence-nurturing-preLancement.md` (J0 = date de confirmation). |

Segments posés à l'inscription : **P1** = entreprise ; **P2** = association, fondation ou coopérative ; « autre » (prestataire, étudiant, curieux) = aucun nurturing, revue manuelle (un prestataire peut relever de l'entretien prestataire, `script-interview.md` § 8).
Effectif « moins de 20 » ou « 250 et plus » : confirmation envoyée normalement, mais pas de proposition d'entretien (hors cible ; Lanternis dit quand il n'est pas adapté, plateforme § 7).

---

## 2. E0-A « Confirmez votre adresse » (double opt-in)

- **Déclencheur :** soumission du formulaire avec la case « conseils » cochée.
- **Délai :** immédiat. Relance unique à J+3 si pas de clic (même texte, objet « Votre inscription n'est pas encore confirmée »).
- **Expéditeur :** Lanternis <bonjour@lanternis.fr> (H : adresse à créer) ; réponse possible à la même adresse.
- **Objet A :** Confirmez votre adresse pour recevoir les conseils Lanternis
- **Objet B :** Un clic pour confirmer votre inscription
- **Pré-en-tête :** Sans confirmation, vous ne recevrez que l'annonce de l'ouverture.
- **CTA unique :** bouton « Confirmer mon adresse » → `{{lien_confirmation}}` (jeton unique, valable 7 jours, H).
- **Métrique suivie :** taux de confirmation (confirmés / cases cochées). Repère interne à fixer après 2 semaines de données (pas de chiffre de référence sourcé).

**Corps**

> Bonjour{{var:prenom:""}},
>
> Merci pour votre inscription à la liste d'attente de Lanternis.
>
> Vous avez aussi demandé à recevoir nos conseils : un email par semaine environ pendant un mois, avec une méthode ou une check-list pour mieux connaître l'informatique de votre structure. Pour que nous puissions vous les envoyer, merci de confirmer votre adresse.
>
> **[Confirmer mon adresse]**
>
> Si vous n'êtes pas à l'origine de cette demande, ignorez simplement ce message : vous ne recevrez rien d'autre.
>
> L'équipe Lanternis

---

## 3. E0-C « Bienvenue » (après confirmation) et E0-B « Inscription confirmée » (case non cochée)

Même corps pour les deux, à une phrase près (marquée **[E0-C seulement]**). Variante de paragraphe selon le segment.

- **Déclencheur :** E0-C = clic sur le lien de confirmation ; E0-B = soumission du formulaire sans la case.
- **Délai :** immédiat.
- **Objet A :** Vous êtes sur la liste d'attente de Lanternis
- **Objet B :** Votre informatique en 20 questions : par où commencer
- **Pré-en-tête :** Un autodiagnostic de 20 questions pour voir où vous en êtes, sans rien installer.
- **Segment :** P1 et P2 (paragraphe variable), effectif 20 à 249.
- **CTA principal (bouton) :** « Faire l'autodiagnostic » → `{{lien_autodiagnostic}}?utm_source=mailjet&utm_medium=email&utm_campaign=lanternis-prelancement&utm_content=e0`.
- **Proposition d'entretien :** en post-scriptum, sous forme de lien texte vers `{{lien_prise_rdv}}`. **Écart assumé** à la règle « un email = un CTA » : le brief demande les deux. L'autodiagnostic reste la seule action mise en avant ; le test A/B ci-dessous mesure si le post-scriptum fait baisser le clic principal.
- **Métriques suivies :** taux de complétion de l'autodiagnostic dans les 7 jours (objectif ≥ 40 % des inscrits, `acquisition.md` § 4.2, H) ; entretiens réservés depuis E0 (objectif : à fixer, H).

**Corps**

> Bonjour{{var:prenom:""}},
>
> Votre inscription est confirmée. Nous vous écrirons à l'ouverture de Lanternis, avec les conditions réservées aux premières structures inscrites.
>
> **[E0-C seulement]** Vous recevrez aussi, une fois par semaine environ, une méthode simple pour reprendre la main sur votre informatique.
>
> En attendant, une première étape utile, avec ou sans Lanternis : savoir où vous en êtes. Notre autodiagnostic pose 20 questions sur ce que vous avez, ce que vous payez, ce qui arrive à échéance et qui détient les accès. Vous obtenez un résultat lisible et trois premières actions.
>
> *[P1]* Il est pensé pour une direction sans DSI : pas de jargon, pas d'installation, aucune donnée technique demandée.
> *[P2]* Il est pensé pour une DAF qui a hérité de l'informatique : le résultat peut servir de base à un point en bureau ou en CA.
>
> **[Faire l'autodiagnostic]**
>
> L'équipe Lanternis
>
> P.S. Nous menons des entretiens de 30 minutes avec des dirigeants et des DAF pour comprendre comment ils gèrent leur informatique sans service dédié. Nous ne vendons rien pendant cet échange ; nous vous enverrons la synthèse anonymisée de l'étude. Si vous êtes partant, [choisissez un créneau]({{lien_prise_rdv}}).

**Variante pour les effectifs hors cible** (moins de 20 ou 250 et plus) : même email **sans le P.S.**, et cette phrase à la place du paragraphe segment : « Lanternis est conçu pour les structures de 20 à 249 salariés sans DSI. Si la vôtre est plus petite ou plus grande, l'autodiagnostic reste utile ; nous vous dirons franchement si Lanternis vous convient. »

### Test A/B prévu
- **Test 1 (objet) :** A « Vous êtes sur la liste d'attente de Lanternis » (confirmation, attendu) contre B « Votre informatique en 20 questions : par où commencer » (bénéfice). Métrique de décision : **clic sur l'autodiagnostic**, pas l'ouverture (les ouvertures sont faussées par le préchargement des messageries, notamment Apple Mail Privacy Protection).
- **Test 2 (P.S. entretien), en second :** avec P.S. contre sans P.S. Si le P.S. ne réduit pas la complétion de l'autodiagnostic et génère des entretiens, on le garde.
- **Limite :** avec un objectif de 80 inscrits qualifiés en 8 semaines (`acquisition.md` § 4.2), aucun test n'atteindra la significativité statistique. Répartition 50/50 et lecture **indicative** ; on ne conclut que sur un écart net et on le note comme tel dans `marketing/rapports/`.

---

## 4. Pied de page commun à tous les emails Lanternis

> Vous recevez cet email parce que vous vous êtes inscrit(e) sur lanternis.fr le {{date_inscription}}{{#si conseils}} et avez demandé à recevoir nos conseils{{/si}}.
> [Se désinscrire en un clic]([[UNSUB_LINK_FR]]) · [Politique de confidentialité]({{lien_confidentialite}})
>
> Lanternis est une marque d'Hasteria SASU, société par actions simplifiée unipersonnelle au capital de 300 €, 99 avenue Achille Peretti, 92200 Neuilly-sur-Seine. RCS Nanterre 981 178 429. TVA FR71981178429. Contact : contact@hasteria.net.

(Coordonnées reprises de `SOCIETE.md`. La syntaxe `{{#si …}}` est indicative : à traduire dans le langage de gabarit Mailjet, ou à remplacer par deux pieds distincts.)

---

## 5. Exigences techniques et RGPD (avant toute activation)

| Exigence | Détail | Statut |
|---|---|---|
| Domaine d'envoi authentifié | `lanternis.fr` n'est pas encore réservé (`SOCIETE.md`). SPF, DKIM Mailjet et DMARC sur la zone OVH avant le premier envoi (`CLAUDE.md`, DNS). **Aucun envoi depuis une adresse gratuite ou un domaine non authentifié.** | À faire |
| Lien de désinscription | Balise Mailjet de désinscription (`[[UNSUB_LINK_FR]]`, H : nom exact à vérifier dans la documentation Mailjet) + en-tête `List-Unsubscribe` en un clic. La désinscription des conseils ne retire pas de la liste d'attente, sauf demande ; un lien « Supprimer toutes mes données » figure dans la politique de confidentialité. | À configurer |
| Consentement | Case non pré-cochée, libellé précis (fréquence, durée, objet) ; horodatage, version du libellé et adresse IP (H : à valider par juriste-rgpd) conservés comme preuve. Double opt-in pour les conseils. | À valider par juriste-rgpd |
| Base légale | Liste d'attente : demande de la personne (annonce de l'ouverture). Conseils : consentement. À confirmer par juriste-rgpd (point déjà ouvert dans `STATUT.md`). | À valider |
| Conservation | Proposition : suppression 3 ans après le dernier contact actif, ou à la désinscription pour les conseils (H, durée à confirmer par juriste-rgpd). | À valider |
| Mentions | Politique de confidentialité en ligne avant la mise en ligne de la landing ; Mailjet listé comme sous-traitant. | À rédiger |
| Mesure | Paramètres UTM sur tous les liens. Suivi d'ouverture Mailjet : à désactiver ou à mentionner dans la politique de confidentialité (pixel de suivi, H : position à faire trancher par juriste-rgpd). Suivi des clics conservé. | À décider |
| Accessibilité et sobriété | Version texte brut systématique ; HTML léger, en-tête image facultatif (gabarit `marque/charte/gabarits/email-entete-600.html`, `alt` renseigné) ; bouton en texte HTML et non en image ; contraste AA (nuit sur papier). | Prévu |

## 6. Variables à remplir avant activation

`{{lien_confirmation}}`, `{{lien_autodiagnostic}}` (l'autodiagnostic n'existe pas encore : conception prévue en S2 de `acquisition.md` § 5), `{{lien_prise_rdv}}` (outil de prise de rendez-vous non choisi : à décider, de préférence hébergé dans l'UE), `{{lien_confidentialite}}`, `{{date_inscription}}`, adresse d'expédition `bonjour@lanternis.fr` (H).
