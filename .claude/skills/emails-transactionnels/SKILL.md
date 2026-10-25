---
name: emails-transactionnels
description: Mettre en place les emails transactionnels avec Mailjet (domaine authentifié par marque, gabarits, webhooks).
---

# Emails transactionnels — Mailjet
- **Par marque** : expéditeur `notifications@<domaine>` (ou sous-domaine `mail.<domaine>`), domaine authentifié dans Mailjet (SPF + DKIM), DMARC publié (skill dns-domaines-ovh). Sous-compte Mailjet par marque recommandé pour séparer réputation et statistiques.
- **Intégration Symfony** : Mailer avec le transport Mailjet (`symfony/mailjet-mailer`, DSN dans `.env.local`), envoi asynchrone via Messenger ; Mailpit en dev.
- **Gabarits** (Twig, texte brut + HTML sobre et accessible, aux couleurs de la marque) : bienvenue, vérification d'email, mot de passe oublié, invitation d'un membre, reçu / facture disponible, échec de paiement, fin d'essai, carte expirant, résiliation confirmée.
- **Webhooks Mailjet** (rebonds, plaintes, désinscriptions) → mise à jour du statut de l'adresse ; ne plus écrire à une adresse en rebond définitif.
- Pied de chaque email : « <Marque> est une marque d'Hasteria SASU » + adresse (`SOCIETE.md`).
- Emails marketing (newsletter, nurturing) : séparés des transactionnels (liste de contacts avec consentement, désinscription en un clic) ; contenus fournis par l'email-marketer.
