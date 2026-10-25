---
name: dns-domaines-ovh
description: Configurer domaines et DNS chez OVH pour une venture (vitrine o2switch, app et API sur VPS, emails).
---

# Domaines et DNS (OVH)
Produis la liste exacte des enregistrements à créer dans l'espace client OVH (l'utilisateur les saisit) :
- `@` et `www` → o2switch (A/AAAA ou CNAME selon o2switch).
- `app` et `api` → IP du VPS (A/AAAA).
- Emails : MX du fournisseur de messagerie, **SPF**, **DKIM** (fourni par le prestataire d'emails transactionnels), **DMARC** (`p=none` puis durcissement), éventuellement sous-domaine dédié à l'envoi (`mail.` ou `notif.`).
- TTL bas pendant la mise en place, puis normal.
- Vérifications : propagation, certificats, délivrabilité (test d'envoi).
Consigne le tableau dans `INFRA.md`.
