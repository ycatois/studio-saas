---
venture: pilotis
phase: 1 Analyse
auteur: architecte
date: 2026-10-25
statut: brouillon
---

# Pilotis — étude de faisabilité technique

> Toutes les sources ont été consultées le 2026-10-25 (liste en fin de document). Tout ce qui n'est pas sourcé est marqué **(H)** : hypothèse non vérifiée ou estimation de l'architecte.
> Stack de référence : `CLAUDE.md` et `INFRA.md` (Symfony / PHP 8.3+, PostgreSQL, Symfony UX, Docker sur VPS OVH, Stripe, Mailjet). Aucune dérogation n'est proposée ici ; les choix structurants à acter sont listés en section 8 (ADR).

## 0. Verdict

**Techniquement faisable par un développeur seul, à condition de réduire fortement le périmètre.** Aucune brique n'est un verrou technologique : multi-tenant, synchronisation planifiée, calcul d'indicateurs et tableaux de bord sont maîtrisés avec la stack du studio. La difficulté est ailleurs :

1. **l'accès aux données**, inégal selon les éditeurs : Pennylane, Qonto, Lucca, Microsoft 365, Google Workspace et Dolibarr ont des API publiques documentées ; PayFit impose un statut de partenaire pour l'OAuth ; **Silae n'a pas de documentation publique** et son accès API est payant, activé par Silae à la demande de l'expert-comptable ; les banques autres que Qonto exigent un agrégateur DSP2 agréé, sur devis ;
2. **le coût récurrent de maintenance des connecteurs**, qui croît avec leur nombre ;
3. **la sensibilité des données RH**, qui impose de n'ingérer que des agrégats.

**Effort du MVP minimal : 8 à 10 semaines (H)** à temps plein, avec 3 connecteurs (Pennylane, Qonto, Microsoft 365), l'import CSV/Excel en secours, le référentiel SI repris de Cockpit DSI, une douzaine d'indicateurs, 3 tableaux de bord et des alertes par email. Un MVP « complet » (6 à 7 connecteurs, RH par API) demanderait plutôt **16 à 20 semaines (H)**.

**Faire ou acheter : solution hybride, maison d'abord.** On code soi-même les 5 à 7 connecteurs à API simple, derrière une interface commune qui permettra de brancher plus tard une API unifiée (Chift pour la longue traîne comptable, Kombo pour la paie et Silae) quand le volume de clients absorbera son coût fixe. Les grilles publiques d'Apideck (599 $/mois pour 25 clients et une seule catégorie) et de Merge (65 $ par compte lié et par mois au-delà de 10) sont incompatibles avec un prix visé d'environ 149 € HT/mois (H) dans les premiers mois.

---

## 1. Rappel du contexte et des contraintes

- **Cible** (`0-idee/reponses-fondateur.md`) : PME et structures de l'ESS d'environ 20 à 250 salariés, **sans DSI**, en vente directe. Le volet SI (« DSI de poche ») est le différenciateur pressenti.
- **Conséquence technique (H)** : à la différence des sociétés de services « tout SaaS » de la fiche idée, cette cible a des systèmes plus hétérogènes : paie souvent externalisée chez l'expert-comptable (Silae, logiciels installés), comptabilité tenue par le cabinet, ERP Dolibarr ou Sage installé, parc rarement inventorié. **L'import CSV/Excel et la saisie manuelle ne sont donc pas un « plan B » mais un mode d'alimentation de premier rang.**
- **Contraintes studio** : un seul VPS OVH (une pile Docker par venture, PostgreSQL dédié), sobriété (pas de Kafka, Redis ou base de séries temporelles sans nécessité démontrée), souveraineté des données (hébergement en France, sous-traitants européens de préférence), réversibilité.

---

## 2. Les briques nécessaires

### 2.1 Vue d'ensemble

```
[Sources : API éditeurs | agrégateur DSP2 | CSV/Excel | saisie manuelle]
        │  (connecteurs, jetons chiffrés)
        ▼
[Moteur de synchronisation : Symfony Scheduler + Messenger (transport Doctrine)]
        │  données brutes (JSONB, rétention courte)
        ▼
[Modèle normalisé : écritures, factures, comptes, effectifs agrégés, licences, actifs, contrats]
        │
        ▼
[Calcul des indicateurs : catalogue déclaratif versionné → points de métriques par période]
        │
        ├──► [Tableaux de bord Symfony UX (Twig + Turbo + Stimulus + graphiques)]
        ├──► [Alertes : seuils, tendances, échéances → email Mailjet + in-app]
        └──► [Synthèse mensuelle PDF / export]
```

### 2.2 Détail par brique

| Brique | Rôle | Choix proposé dans la stack | Complexité (H) | MVP minimal ? |
|---|---|---|---|---|
| **Multi-tenant** | Isoler les données de chaque organisation cliente | Base PostgreSQL unique, colonne `organisation_id` sur toutes les tables métier, **Row Level Security PostgreSQL** activée en plus d'un filtre Doctrine (défense en profondeur) ; variable de session `app.current_org` posée à chaque requête et à chaque message Messenger. Un schéma par client est écarté (migrations × N, sobriété) | Moyenne | Oui, dès le jour 1 |
| **Authentification et rôles** | Comptes, organisations, invitations | Symfony Security, connexion email + mot de passe, **MFA TOTP obligatoire pour les rôles admin** (données de paie et jetons), rôles : propriétaire, direction, lecteur, administrateur SI. SSO OpenID Connect Microsoft / Google en v2 | Faible à moyenne | Oui (sans SSO) |
| **Moteur de connecteurs** | Brancher une source, autoriser, synchroniser | Interface PHP `Connector` (`authorize()`, `testConnection()`, `sync(cursor)`, `capabilities()`), une classe par éditeur, client HTTP Symfony, **Symfony RateLimiter** par source et par jeton, reprise exponentielle sur 429/5xx, curseurs incrémentaux, synchronisations idempotentes, journal de synchronisation visible par le client (« dernière synchro OK il y a 2 h ») | Moyenne à forte | Oui |
| **Synchronisation planifiée** | Exécuter les synchros sans surcharger le VPS | **Symfony Scheduler + Messenger avec transport Doctrine** (pas de Redis/RabbitMQ), un conteneur `worker` dédié, fréquence quotidienne par défaut (hebdomadaire suffit pour la plupart des indicateurs : sobriété), synchro manuelle à la demande | Moyenne | Oui |
| **Stockage des données brutes** | Rejouer un calcul, déboguer un connecteur | Table `raw_payload` (JSONB), **rétention courte (H : 30 jours)**, purgée automatiquement ; jamais de données RH nominatives conservées | Faible | Oui |
| **Modèle normalisé** | Vocabulaire commun à toutes les sources | Tables par domaine : `ledger_entry` / `invoice` / `bank_balance` (finance), `headcount_snapshot` / `payroll_aggregate` (RH, agrégats seulement), `licence`, `asset`, `contract`, `supplier`, `domain_name` (SI) | Moyenne | Oui (sous-ensemble) |
| **Stockage des métriques** | Historiser les indicateurs calculés | Table `metric_point` (organisation, indicateur, version de définition, période, dimension, valeur, source, horodatage) ; index composite ; partitionnement mensuel seulement si le volume l'exige (H : inutile en dessous de quelques centaines de clients). TimescaleDB écarté au MVP | Faible | Oui |
| **Calcul des indicateurs** | Transformer les données en indicateurs croisés | **Catalogue déclaratif versionné** (définition, formule en service PHP, sources requises, périodicité, seuils par défaut, explication en français), recalcul après chaque synchro ; **traçabilité** : chaque chiffre affiché renvoie à sa source et à sa date de fraîcheur | Moyenne | Oui (12 à 15 indicateurs) |
| **Tableaux de bord** | Restituer | Symfony UX (Twig, Turbo, Stimulus) + Symfony UX Chart.js ; 3 tableaux **préconfigurés** (Finance, RH, SI) + une page « Santé globale » ; pas d'éditeur libre de tableaux au MVP (c'est le piège Databox) ; accessibilité RGAA : chaque graphique doublé d'un tableau de données | Moyenne | Oui |
| **Alertes** | Prévenir avant le problème | Règles : seuil (trésorerie < X semaines de charges), tendance (masse salariale / CA en hausse sur 3 mois), **échéance** (fin de contrat, renouvellement de licence, expiration de nom de domaine ou de certificat) ; digest hebdomadaire par email (Mailjet) + centre d'alertes ; anti-bruit (regroupement, accusé de lecture) | Faible à moyenne | Oui (échéances + 3 seuils) |
| **Saisie manuelle et import CSV/Excel** | Alimenter quand l'API n'existe pas, est payante ou n'est pas autorisée | PhpSpreadsheet ; **gabarits téléchargeables par domaine** (effectif et masse salariale mensuelle, inventaire du parc, contrats, budget) ; écran de correspondance des colonnes, validation ligne à ligne, historique et annulation d'un import | Moyenne | **Oui, prioritaire** |
| **Secrets et jetons OAuth** | Stocker les accès aux outils des clients | Chiffrement **enveloppe** avec libsodium (`sodium_crypto_secretbox`) : une clé de données par organisation, elle-même chiffrée par une clé maîtresse hors base (secret Docker / variable d'environnement, jamais dans le dépôt ni dans les sauvegardes de la base) ; rafraîchissement proactif des jetons ; scopes **lecture seule** uniquement ; jamais de jeton dans les logs ; révocation et purge à la déconnexion d'une source ou à la résiliation | Moyenne | Oui |
| **Référentiel SI** | Volet « DSI de poche » : actifs, contrats, fournisseurs, licences, domaines, jalons | Reprise du domaine de Cockpit DSI (section 7), alimenté par connecteurs (Microsoft 365, Google Workspace), import CSV et saisie | Faible à moyenne si reprise | Oui |
| **Synthèse mensuelle** | Comité de direction, conseil d'administration (ESS), banquier | Page HTML imprimable en PDF ; génération serveur (H : Dompdf ou Gotenberg, à arbitrer) | Faible | Oui (version simple) |
| **Facturation** | Abonnement | Stripe (compte Hasteria, métadonnée `marque=pilotis`), Stripe Checkout + portail client | Faible | Oui |
| **Observabilité et sauvegardes** | Exploiter seul | Logs structurés, tableau de bord interne des synchros en échec, alertes à l'exploitant ; sauvegardes selon `INFRA.md` (3 copies) | Faible | Oui |
| **API publique Pilotis** | Exposer des données à d'autres outils | Spécification `produit/packages/shared/openapi.yaml` dès le début pour l'API interne ; API publique client en v2 | — | Non |
| **Commentaire automatique par LLM** | « Votre marge baisse parce que… » | Hors MVP ; si un jour : modèle hébergé dans l'UE, sur agrégats uniquement, ADR obligatoire | — | Non |
| **Mobile** | Consultation nomade | Pas d'application au MVP : web responsive + digest email. PWA éventuelle plus tard (skill choix-techno-mobile, ADR) | — | Non |

---

## 3. Faire ou acheter pour les connecteurs

### 3.1 Les options

| Option | Ce que c'est | Couverture française constatée | Tarification constatée | Hébergement / dépendance |
|---|---|---|---|---|
| **Connecteurs maison** | Une classe PHP par éditeur, derrière l'interface `Connector` | Celle qu'on construit | Coût = temps de développement et de maintenance (H : 0,5 à 1,5 semaine par connecteur, puis maintenance continue) | Aucune dépendance tierce ; données chez nous |
| **Chift** (API unifiée, société belge selon TechCrunch) | API unifiée comptabilité, facturation, caisse, e-commerce, paiement, PMS | **La meilleure couverture comptable FR trouvée** : Pennylane, MyUnisoft, Inqom, Horus, ACD, Cegid Loop, Sage 100 FR, Qonto, Axonaut cités par Chift ; partenariat avec Sage France. Le connecteur Pennylane « Firm » impose une certification par Chift **et** par Pennylane avant production. **Pas de paie / SIRH constaté** | **Aucune grille publique trouvée** (sur devis) | Européen (H : localisation exacte des données et DPA à vérifier) |
| **Apideck** | API unifiée multi-catégories (compta, SIRH, CRM…) | Compta FR supportée : Pennylane, Sage Business Cloud (+ Odoo, Business Central, etc.) ; **non supportés** : Cegid, EBP, Quadratus, MyUnisoft, Inqom, Tiime, Dolibarr, Sage 50/100. Silae en **bêta**, ressource « Salaries » seulement | Launch **599 $/mois** pour 25 clients actifs et **1 catégorie** ; 999 $/mois pour 50 ; Scale **1 299 $/mois** pour 100 clients et 3 catégories ; jusqu'à 4 250 $/mois pour 500 ; nouveau connecteur = option payante | H : siège et région des données à vérifier |
| **Merge** | API unifiée (SIRH, compta, CRM…) | Couverture des éditeurs FR **non vérifiée** (H : faible, éditeur orienté marché américain) | Launch : 3 comptes liés gratuits, puis **650 $/mois jusqu'à 10 comptes liés**, **65 $ par compte lié** au-delà ; offres supérieures sous contrat annuel | Éditeur américain (H : exposition au CLOUD Act, région UE à vérifier) |
| **Kombo** (complément trouvé) | API unifiée spécialisée SIRH / paie européens | Connecteurs **Silae, Lucca, PayFit** (Customer, Partner, Legacy) listés dans sa documentation | **Non publique** ; modèle annuel + par client selon un concurrent (Apideck) | H : européen, à vérifier |
| **Nango** (complément trouvé) | Gestion OAuth, stockage et rafraîchissement des jetons, proxy, synchros ; on écrit soi-même la logique | Catalogue d'authentification large (PayFit documenté) ; pas de modèle unifié | Cloud : gratuit jusqu'à 10 connexions (plafonds durs), Pay-as-you-go 50 $/mois + 0,29 $ par connexion ; auto-hébergé gratuit limité à l'authentification et au proxy ; licence Elastic (pas OSI) | Auto-hébergeable (partiellement) |
| **n8n auto-hébergé** | Outil d'automatisation par workflows | Nœuds pour beaucoup d'outils ; pas de modèle de données unifié | Licence « Sustainable Use » : usage permis comme moteur **en arrière-plan** si les clients finaux n'accèdent jamais à l'éditeur de workflows ; les clients peuvent connecter leurs propres comptes à des automatisations construites pour eux ; un éditeur de workflows exposé aux clients, même via une interface maison, n'est pas permis sans licence Enterprise | Auto-hébergé sur le VPS |

### 3.2 Ce que disent les chiffres (ordre de grandeur, H sur le taux de change et le prix Pilotis)

- **Apideck** : 599 $/mois couvrent 25 clients **pour une seule catégorie**. Or Pilotis a besoin d'au moins deux catégories (comptabilité et SIRH), donc du palier Scale à 1 299 $/mois. Avec 10 clients, cela fait environ 130 $ par client et par mois, pour un prix visé d'environ 149 € HT (H) : **intenable avant plusieurs dizaines de clients**. Même à 100 clients (12,99 $ par client, 3 catégories), le coût dépasse 8 % du prix visé et ne couvre pas les éditeurs non supportés (Cegid, EBP, MyUnisoft, Dolibarr).
- **Merge** : un client relié à Pennylane et PayFit compte probablement pour 2 comptes liés (H, selon la définition de Merge), soit environ 130 $/mois au-delà de 10 comptes liés : **incompatible avec le modèle**.
- **Chift et Kombo** : impossible de conclure sans devis. Ce sont pourtant les deux seuls acteurs dont la couverture correspond aux logiciels de la cible (compta tenue par les cabinets, paie Silae). **Demander les deux devis en phase 2.**
- **Critère de bascule proposé (H)** : on achète une API unifiée pour un domaine quand son coût par client devient inférieur à 10 % du revenu par client **et** qu'elle débloque au moins 20 % de prospects qu'on ne peut pas servir autrement.

### 3.3 n8n : pour quoi faire, pour quoi ne pas le faire

- **Oui** : prototyper un connecteur en quelques heures pour valider l'intérêt d'une source auprès d'un pilote ; automatiser l'exploitation interne (alertes à l'exploitant, onboarding). Le fondateur le maîtrise déjà.
- **Non comme cœur du produit (H)** : isolation multi-tenant des identifiants, chiffrement par organisation, journal de synchronisation visible par le client, tests automatisés et versioning des connecteurs sont plus difficiles à garantir dans n8n que dans du code Symfony testé ; la conformité de la licence dépend de l'architecture et devrait être confirmée par écrit auprès de n8n (license@n8n.io).

### 3.4 Recommandation

**Hybride, maison d'abord :**
1. **Maison** pour Pennylane, Qonto, Microsoft 365, Google Workspace, Dolibarr, puis Lucca et PayFit (clé API créée par le client) : API publiques, documentées, gratuites à notre connaissance (H sur l'absence de frais d'accès, à confirmer auprès de chaque éditeur).
2. **Import CSV/Excel** pour tout le reste, en particulier la paie : un gabarit « effectif et masse salariale du mois » rempli par le client ou exporté de son logiciel de paie couvre l'essentiel des indicateurs RH sans connecteur.
3. **Achat ciblé plus tard**, derrière la même interface `Connector` : Chift (longue traîne comptable : MyUnisoft, Cegid Loop, Sage 100) et Kombo (Silae) quand le volume le justifie ; un **agrégateur DSP2 agréé** (Bridge, Powens) pour les banques autres que Qonto, obligatoire car on ne peut pas accéder soi-même aux comptes bancaires sans agrément d'établissement de paiement (H sur la qualification juridique exacte, à confirmer par le juriste-rgpd).
4. Envisager **Nango auto-hébergé** uniquement si la gestion des jetons OAuth devient le principal coût de maintenance (H).

---

## 4. Connecteurs prioritaires par domaine : état réel des API

Légende priorité : **P1** = MVP minimal ; **P2** = MVP complet ; **P3** = après le MVP.

### 4.1 Finance

| Outil | API publique ? | Authentification | Accès éditeur tiers | Coût d'accès | Points d'attention | Priorité |
|---|---|---|---|---|---|---|
| **Pennylane** | Oui, API Company (factures, achats, écritures, rapports) et API Firm (portefeuille de dossiers d'un cabinet) | Jeton d'entreprise créé par le client, ou OAuth 2.0 (code d'autorisation, rafraîchissement, révocation) | OAuth réservé aux **partenaires d'intégration validés par l'équipe Partenariats** ; bac à sable sur demande ; identifiants OAuth non récupérables en cas de perte | Non publié (H : gratuit, à confirmer) | Limite documentée en v1 : 5 requêtes/seconde par jeton (limite v2 non trouvée). **Démarrer avec le jeton d'entreprise** fourni par le client pendant que la demande de partenariat suit son cours. Dépendance : le partenariat peut être refusé (H) | **P1** |
| **Qonto** | Oui, Business API | Clé API (`login:secret_key`) pour un usage propre, ou OAuth 2.0 ; sans le scope `offline_access`, pas de jeton de rafraîchissement et l'intégration s'arrête au bout d'une heure | Les **scopes sensibles nécessitent une validation de Qonto** ; appels obligatoirement côté serveur | Non publié (H : gratuit) | Limites : 1 000 requêtes / 10 s et 10 000 / 10 min par adresse IP. Fournit soldes et transactions : base de l'indicateur de trésorerie | **P1** |
| **Autres banques (DSP2)** | Via agrégateur agréé uniquement | Consentement de l'utilisateur, authentification forte à renouveler **tous les 180 jours** (normes techniques révisées de l'EBA) | Bridge (groupe BPCE actionnaire minoritaire, bac à sable gratuit) ; Powens (ex-Budget Insight, 1 800+ banques européennes revendiquées) | **Sur devis** pour Bridge et Powens ; GoCardless Bank Account Data **n'accepterait plus de nouveaux comptes depuis juillet 2025** (source tierce, non confirmé par GoCardless) | Coût fixe probable et contrat ; renouvellement du consentement = friction pour le client. Alternative au MVP : soldes bancaires via Pennylane (qui agrège déjà les banques du client, H) ou import du relevé | **P2** (devis en phase 2) |
| **Dolibarr** | Oui, module « API REST » à activer par l'administrateur de l'instance | Clé `DOLAPIKEY` par utilisateur Dolibarr | Libre (logiciel open source) ; chaque instance a sa propre URL, souvent auto-hébergée | Gratuit | **Versions et modules hétérogènes** d'une instance à l'autre ; instance parfois inaccessible depuis Internet (H). Atout : expertise du fondateur (Tecnoo) et vivier de clients Dolibarr | **P2** (P1 si les premiers pilotes viennent du réseau Tecnoo) |
| Chift (Sage 100, Cegid Loop, MyUnisoft…) | — | — | — | Sur devis | Voir section 3 | P3 |

### 4.2 RH

**Principe de minimisation (H, à valider par le juriste-rgpd)** : Pilotis n'ingère que des **agrégats** (effectif, entrées et sorties, masse salariale chargée par mois, absentéisme en taux), jamais de salaire nominatif ni de motif d'absence. Les connecteurs RH lisent le minimum et agrègent à la volée ; le brut n'est pas conservé.

| Outil | API publique ? | Authentification | Accès éditeur tiers | Coût d'accès | Points d'attention | Priorité |
|---|---|---|---|---|---|---|
| **PayFit** | Oui | Clé API créée **par un administrateur PayFit du client**, limitée à sa propre entreprise et à des scopes choisis ; ou OAuth 2.0 pour les partenaires | OAuth = **inscription comme partenaire PayFit obligatoire** ; selon Nango, **PayFit ne renvoie pas de jeton de rafraîchissement** : réautorisation du client à chaque expiration | Non publié (H) | Démarrer par la clé API client (pas de partenariat, pas d'expiration documentée). Scopes disponibles non listés publiquement : vérifier qu'on peut lire la masse salariale sans données nominatives (H : probablement pas, donc agrégation côté Pilotis) | **P2** |
| **Lucca** | Oui, « API Lucca » versionnée, avec garantie de support long terme ; anciennes API « legacy » à clé, non versionnées, en cours de remplacement | OAuth 2.0 (API actuelle), clé API (legacy) | Documentation publique, spécification OpenAPI téléchargeable | **Bac à sable payant** ; accès API lui-même non chiffré (H) | Débit et taille limités, pagination systématique, certains endpoints en bêta ou sur demande au support. Lucca est modulaire (temps, absences, paie) : les données disponibles dépendent des modules souscrits par le client | **P2** |
| **Silae** | **Pas de documentation publique trouvée** | Non documenté publiquement | Accès **payant, activé et facturé par Silae**, demandé en général par **l'expert-comptable** via un avenant à son contrat de distribution (API REST, pas l'ancienne SOAP) — guide Kombo ; Apideck : connecteur en bêta, « Salaries » seulement ; Kombo : connecteur listé | Payant, montant non publié | **Le plus gros verrou RH** : il faut l'accord et la démarche du cabinet comptable du client, alors que le canal comptables a été écarté. **Au MVP : import CSV** de l'export de paie mensuel (H : les cabinets fournissent déjà un journal de paie) | **P3** (CSV en P1) |

### 4.3 SI

| Outil | API publique ? | Authentification | Accès éditeur tiers | Coût d'accès | Points d'attention | Priorité |
|---|---|---|---|---|---|---|
| **Microsoft 365** (licences, utilisateurs) | Oui, Microsoft Graph | OAuth 2.0 / application Entra ID multi-locataire, **consentement administrateur** du client | Ouvert à tout éditeur | Gratuit (H : pas de frais Graph pour ces lectures) | Licences achetées et consommées : `subscribedSkus`, permission minimale `LicenseAssignment.Read.All`. **Dernière connexion** (`signInActivity`, utile pour repérer les licences payées mais inutilisées) : exige une **licence Microsoft Entra ID P1 ou P2** et `AuditLog.Read.All`, donc indisponible pour une partie des PME (H : celles sans Business Premium). Repli : rapports d'usage Microsoft 365 (H, à vérifier) | **P1** |
| **Microsoft Intune** (parc) | Oui, Graph `deviceManagement/managedDevices` | Permission `DeviceManagementManagedDevices.Read.All`, consentement administrateur | Ouvert | Exige une **licence Intune active** côté client | Seule une partie de la cible en dispose (H) | **P2** |
| **Google Workspace** (licences, utilisateurs) | Oui : Enterprise License Manager API (licences par produit et SKU) et Directory API (`lastLoginTime` sur chaque utilisateur) | OAuth 2.0 avec consentement d'un super-administrateur (H : ou compte de service avec délégation au niveau du domaine, à arbitrer) | Ouvert | Gratuit (H) | Processus de validation des applications Google pour les scopes d'administration à anticiper (H : délai et éventuel audit) | **P2** |
| **Inventaire du parc** | Dépend de l'outil : **GLPI** a une API REST v2 en OAuth 2.0 (le flux sans utilisateur n'est accepté que pour le scope `inventory`), plus l'API v1 historique ; Intune ci-dessus | Variable | GLPI : instance du client, libre | Gratuit (logiciel libre) | La cible sans DSI n'a souvent **aucun outil d'inventaire** (H) : **import CSV** + saisie (reprise de Cockpit DSI) en P1 ; connecteur GLPI en P3 | CSV **P1**, GLPI P3 |
| **Noms de domaine et certificats** | Données publiques (RDAP, connexion TLS) | Aucune | — | Gratuit | Échéances d'expiration : alertes simples, à forte valeur perçue pour une PME sans DSI (H) | **P1** |
| Sauvegardes, sécurité (antivirus, MFA activée…) | Très variable selon l'outil | — | — | — | Déclaratif (questionnaire / saisie) au MVP ; taux d'utilisateurs Microsoft 365 avec MFA via Graph en P2 (H) | P2–P3 |

### 4.4 Couverture attendue du MVP minimal (H, à mesurer en phase 2)

Pennylane + Qonto + Microsoft 365 + import CSV couvrent la trésorerie, le chiffre d'affaires et les charges, le parc de licences et les échéances SI. Les indicateurs RH reposent sur un import mensuel. **À vérifier lors des 10 entretiens** : part des prospects sous Pennylane (probablement minoritaire dans l'ESS, H) et part dont la paie est chez le cabinet sous Silae (probablement majoritaire, H). Si Pennylane est minoritaire, il faut remplacer ce connecteur prioritaire par Chift ou par l'import du grand livre (FEC).

> Piste à creuser : le **fichier des écritures comptables (FEC)**, format normalisé que tout logiciel comptable français sait produire, pourrait servir de connecteur comptable universel par import, indépendamment de l'éditeur (H, faisabilité et fraîcheur à évaluer).

---

## 5. Risques techniques

| # | Risque | Probabilité (H) | Impact | Parade |
|---|---|---|---|---|
| R1 | **Maintenance des connecteurs** : changements d'API (Lucca remplace ses API legacy, endpoints en bêta), jetons expirés (PayFit sans rafraîchissement, Qonto sans `offline_access`), instances Dolibarr hétérogènes | Forte | Élevé : trous dans les données, perte de confiance, temps du fondateur absorbé | Peu de connecteurs au MVP ; tests de contrat sur réponses enregistrées ; supervision des synchros en échec avec alerte au client **et** à l'exploitant ; fraîcheur affichée à côté de chaque chiffre ; budget de maintenance explicite (H : 20 % du temps de développement) |
| R2 | **Accès refusé ou payant** : partenariat Pennylane ou PayFit refusé, Silae payant via le cabinet, agrégateur DSP2 sur devis, validation Google | Moyenne à forte | Élevé | Démarrer avec les jetons et clés créés par le client (aucun partenariat requis) ; demander les partenariats dès la phase 2 ; CSV comme filet universel |
| R3 | **Sécurité des jetons** : une fuite donnerait accès en lecture à la compta, la banque et la paie de tous les clients | Faible à moyenne | **Fatal** | Chiffrement enveloppe par organisation, clé maîtresse hors base et hors sauvegardes ; scopes lecture seule ; MFA ; RLS PostgreSQL ; journal d'accès ; revue securite avant production ; plan de réponse à incident (révocation en masse) |
| R4 | **RGPD et données RH sensibles** : salaires nominatifs, absences ; un motif d'arrêt maladie serait une donnée de santé (article 9) | Moyenne | Fatal en cas d'incident, bloquant commercialement sinon | Agrégats uniquement, agrégation à la volée, pas de conservation du brut RH ; contrat de sous-traitance (article 28) ; registre ; analyse d'impact probablement nécessaire (H, juriste-rgpd) ; seuil d'anonymat (pas d'agrégat sur moins de N personnes, H : N = 5) |
| R5 | **Quotas et charge** : limites par jeton (Pennylane 5 req/s en v1), par IP (Qonto), toutes les synchros sur un seul VPS partagé avec les autres ventures | Moyenne | Moyen | RateLimiter par source, synchros étalées dans la nuit, incrémentales, fréquence quotidienne par défaut ; un seul worker au début ; mesure de la charge avant d'ajouter des workers |
| R6 | **Souveraineté** : une API unifiée ou un agrégateur devient sous-traitant ultérieur et voit les données ; éditeur américain = transfert hors UE et exposition au CLOUD Act | Moyenne si achat | Moyen à élevé (argument commercial ESS) | Préférer des fournisseurs européens avec DPA et hébergement UE (Chift, Kombo, Bridge, Powens : à vérifier) ; écarter Merge sauf garantie UE ; liste des sous-traitants publique |
| R7 | **Qualité des données source** : comptabilité saisie au trimestre par le cabinet, catégorisation absente | Forte | Élevé (chiffres faux) | Indicateur de fraîcheur et de complétude ; messages explicites (« compta à jour au 30/06 ») ; indicateurs qui ne dépendent pas de la compta (banque, licences, échéances) |
| R8 | **Fuite entre organisations** (bug de filtrage multi-tenant) | Faible | Fatal | RLS PostgreSQL en plus du filtre applicatif ; tests automatisés d'isolation ; le contexte d'organisation est posé dans les workers aussi |
| R9 | **Point unique de défaillance** : un VPS, un fondateur | Moyenne | Moyen | Sauvegardes 3 copies (`INFRA.md`) testées ; procédure de restauration documentée ; un tableau de bord n'est pas critique à la minute (H : engagement de disponibilité modeste) |

---

## 6. Effort du MVP

Hypothèses : un développeur seul, **à temps plein**, assisté par IA ; semaines de 5 jours ; marge d'imprévus incluse. **Toutes les durées sont des estimations (H)**. Le fondateur étant aussi directeur technique de Tecnoo, sa disponibilité réelle est à confirmer : à mi-temps, doubler les durées.

### 6.1 Périmètre minimal proposé (MVP « pilote »)

- **Cible des pilotes** : 3 à 5 organisations du réseau du fondateur (clients Tecnoo, ESS).
- **Connecteurs** : Pennylane (jeton client), Qonto (clé API), Microsoft 365 (licences et utilisateurs) ; RDAP / TLS pour les domaines et certificats.
- **Import CSV/Excel** : effectif et masse salariale mensuelle, inventaire du parc, contrats et fournisseurs, soldes bancaires des autres banques.
- **Référentiel SI** (repris de Cockpit DSI) : actifs, contrats, fournisseurs, licences, domaines, échéances.
- **12 à 15 indicateurs** : trésorerie et semaines de charges couvertes, CA et charges du mois, encours clients, masse salariale / CA, effectif et variations, coût SI par salarié, licences payées et non attribuées, contrats arrivant à échéance, domaines et certificats expirant.
- **3 tableaux de bord** (Finance, RH, SI) + page « Santé globale » + synthèse mensuelle imprimable.
- **Alertes** : échéances SI, trésorerie sous seuil, licences inutilisées ; digest hebdomadaire par email.
- **Socle** : multi-tenant RLS, comptes et rôles, MFA, Stripe (abonnement simple), CI GitHub, déploiement Docker.
- **Hors MVP** : PayFit, Lucca, Silae, agrégateur DSP2, Google Workspace, Dolibarr (sauf si les pilotes l'utilisent), éditeur de tableaux, API publique, LLM, mobile.

### 6.2 Estimation par lot (H)

| Lot | MVP minimal | MVP complet |
|---|---|---|
| Socle : monorepo, Docker, CI, auth, MFA, multi-tenant RLS, rôles, Stripe | 1,5 à 2 sem. | 2 sem. |
| Moteur de connecteurs : interface, Scheduler/Messenger, journal, chiffrement des jetons, OAuth générique | 1 à 1,5 sem. | 1,5 sem. |
| Connecteurs | 2 sem. (Pennylane, Qonto, Microsoft 365, RDAP/TLS) | 5 à 6 sem. (+ Google Workspace, Dolibarr, PayFit, Lucca, agrégateur DSP2) |
| Import CSV/Excel et saisie manuelle | 1 sem. | 1,5 sem. |
| Modèle normalisé, catalogue et calcul des indicateurs | 1 sem. | 2 sem. (25 à 30 indicateurs) |
| Tableaux de bord, synthèse mensuelle | 1 sem. | 2 sem. |
| Alertes et digest email | 0,5 sem. | 1 sem. |
| Référentiel SI (reprise de Cockpit DSI) | 0,5 à 1 sem. si reprise réussie (2 à 3 sinon) | 1 sem. |
| Sécurité, RGPD, tests, recette avec les pilotes | 1 sem. | 2 sem. |
| **Total** | **8 à 10 semaines** | **16 à 20 semaines** |

### 6.3 Option encore plus légère : le pilote « concierge » (2 à 3 semaines, H)

Avant tout connecteur : référentiel SI (Cockpit DSI rendu multi-tenant), import CSV des chiffres finance et RH, 10 indicateurs, synthèse mensuelle. Le fondateur aide les pilotes à remplir les imports. **But : prouver qu'un dirigeant ouvre et utilise le tableau de bord chaque semaine avant d'investir dans les connecteurs** (scénario 1 du pré-mortem). Recommandé si les entretiens de phase 2 laissent un doute sur l'intensité de la douleur.

---

## 7. Réutilisation de Cockpit DSI

> Le code de Cockpit DSI **n'est pas dans le dépôt et n'a pas été lu**. Avis fondé uniquement sur sa description (`0-idee/reponses-fondateur.md`).

**Avis de principe (H)** : Cockpit DSI est un atout réel pour le volet SI, qui est justement le différenciateur pressenti : son domaine (actifs, contrats, fournisseurs, jalons) correspond au référentiel SI de Pilotis, et sa stack (Symfony 7, PostgreSQL 18) est celle du studio. **Je recommande de réutiliser son modèle de domaine et son code métier comme un module de Pilotis, et non d'en faire la base de l'application** : Pilotis doit être multi-tenant, multi-domaines et orienté connecteurs dès le premier jour, et ajouter le multi-tenant à une application mono-organisation coûte souvent plus cher que de réimplanter proprement les entités (H). La décision finale fera l'objet d'un ADR après revue du code.

**Questions à vérifier avant toute reprise :**

1. **Propriété intellectuelle** : à qui appartient le code, à Tecnoo SAS (conçu pour son usage interne, potentiellement par ses salariés) ou au fondateur ? Une **cession ou une licence écrite à Hasteria SASU** est nécessaire avant d'intégrer une ligne au produit. Les associés de Tecnoo sont-ils d'accord ?
2. **Données réelles** : le dépôt contient-il des données de Tecnoo ou de ses clients (fixtures, dumps, captures, `.env`) ? Si oui, nettoyage et réécriture d'historique avant import, sur une copie.
3. **Mono ou multi-organisation** : existe-t-il une notion d'organisation ou de client ? Combien d'entités et de requêtes faudrait-il modifier pour ajouter `organisation_id` et la RLS ?
4. **Versions** : Symfony 7.x exact, PHP ≥ 8.3, dépendances maintenues ? Résultat de `composer audit` ?
5. **Interface** : Twig / Symfony UX (réutilisable tel quel) ou SPA (contraire au choix par défaut du studio) ? Accessibilité ?
6. **Authentification** : mécanisme actuel, rôles, MFA ?
7. **Qualité** : tests automatisés (couverture approximative), analyse statique (PHPStan, niveau), migrations Doctrine propres et rejouables ?
8. **Modèle de données** : les entités couvrent-elles licences SaaS, noms de domaine, certificats, sauvegardes ? Gestion des échéances et des rappels déjà présente ?
9. **Intégrations existantes** : des connecteurs (Microsoft 365, GLPI, n8n) sont-ils déjà écrits ?
10. **Taille et état** : nombre d'entités, de lignes de code, dernière activité, utilisation réelle en production chez Tecnoo (retour d'expérience utile pour les entretiens) ?
11. **Licences des dépendances** : compatibles avec un usage SaaS commercial ?

**Procédure proposée** : le fondateur verse une copie nettoyée dans un emplacement temporaire hors `produit/` (ou donne accès au dépôt) ; l'architecte en fait une revue d'une demi-journée (H) et rédige l'ADR « Reprise de Cockpit DSI » (reprise du module, réécriture ou référence fonctionnelle seulement).

---

## 8. Décisions à acter en ADR (phase 5, Cadrage)

1. Stratégie multi-tenant : base partagée + `organisation_id` + RLS PostgreSQL.
2. Connecteurs : maison derrière une interface commune, critère de bascule vers une API unifiée.
3. Gestion des secrets : chiffrement enveloppe libsodium, emplacement et rotation de la clé maîtresse.
4. File d'attente et planification : Symfony Messenger (transport Doctrine) + Scheduler, sans Redis.
5. Stockage des métriques : PostgreSQL, sans TimescaleDB au MVP.
6. Minimisation des données RH : agrégats uniquement, seuil d'anonymat.
7. Reprise de Cockpit DSI (après revue du code).
8. Mobile : pas d'application au MVP (skill choix-techno-mobile le moment venu).

---

## 9. Hypothèses à vérifier (à reporter dans `STATUT.md`)

| # | Hypothèse | Comment la vérifier | Quand |
|---|---|---|---|
| F1 | Pennylane, Qonto et Microsoft 365 sont présents chez au moins la moitié des prospects | Recenser la stack lors des 10 entretiens | Phase 2 |
| F2 | La paie de la cible est majoritairement chez le cabinet (Silae ou autre) et un export mensuel CSV est obtenable sans effort | Entretiens + demander un export anonymisé à 2 pilotes | Phase 2 |
| F3 | Les API Pennylane, Qonto, PayFit et Lucca sont gratuites pour un éditeur tiers lisant les données de ses clients | Question écrite à chaque éditeur ; lancer la demande de partenariat Pennylane | Phase 2 |
| F4 | Le coût par client de Chift et Kombo est < 10 % du prix de vente à 50 clients | Demander deux devis | Phase 2 |
| F5 | Un agrégateur DSP2 européen (Bridge, Powens) est accessible à un petit éditeur à coût compatible | Deux devis ; confirmer qu'on n'a pas besoin d'agrément propre | Phase 2–3 |
| F6 | Une part suffisante de la cible a Entra ID P1 (pour repérer les licences inutilisées) | Entretiens ; sinon chercher le repli par rapports d'usage | Phase 2 |
| F7 | Cockpit DSI est réutilisable et cessible à Hasteria | Questions de la section 7 + revue de code | Avant la phase 5 |
| F8 | Le FEC peut servir de connecteur comptable universel avec une fraîcheur acceptable | Test sur 2 FEC réels anonymisés | Phase 2–3 |
| F9 | Le fondateur dispose d'un temps plein pour le MVP | Question directe | Phase 3 (prévisionnel) |
| F10 | L'usage de n8n en moteur d'arrière-plan est conforme à la licence | Confirmation écrite de n8n si on l'utilise en production | Si utilisé |

---

## Sources (consultées le 2026-10-25)

**API unifiées et outils d'intégration**
- Apideck, tarifs : https://www.apideck.com/pricing.md
- Apideck, connecteurs comptables France : https://www.apideck.com/integrations/country/france/accounting.md
- Apideck, connecteur Silae : https://www.apideck.com/integrations/silae-fr.md
- Merge, offre Launch : https://help.merge.dev/en/articles/6641605-self-serve-with-merge-launch-plans-faq ; https://merge.dev/pricing
- Chift, documentation de l'API unifiée : https://docs.chift.eu/developer-guides/unified-api/overview
- Chift, connecteurs Pennylane et européens : https://www.chift.eu/blog/pennylane-api-integration ; Pennylane Firm : https://docs.chift.eu/connectors/accounting/pennylane-firm
- Chift, Sage 100 FR : https://www.chift.eu/blog/sage-100-fr-france-integration ; partenariat Sage : https://www.chift.eu/blog/sage-partners-with-chift-to-add-integrations-to-its-products-in-france
- Chift, présentation (TechCrunch) : https://techcrunch.com/2024/06/25/chift-lets-saas-companies-integrate-with-dozens-of-financial-tools-with-a-unified-api
- Kombo, connecteurs SIRH : https://docs.kombo.dev/hris/connectors.md ; tarification décrite par un concurrent : https://apideck.com/alternatives/kombo-dev
- Kombo, mise en place de Silae : https://help.kombo.dev/hc/en-us/articles/16226986373393-Silae-How-do-I-set-up-the-integration-for-one-of-my-customers
- Nango, tarifs : https://www.nango.dev/pricing ; auto-hébergement : https://nango.dev/docs/guides/platform/self-hosting.md ; PayFit : https://nango.dev/docs/integrations/all/payfit.md
- n8n, FAQ de licence : https://docs.n8n.io/n8n-community-license/community-license/license-faq

**Finance**
- Pennylane, OAuth 2.0 : https://pennylane.readme.io/docs/oauth-20-walkthrough ; API disponibles : https://pennylane.readme.io/docs/what-apis-are-available ; jeton d'entreprise : https://pennylane.readme.io/docs/generating-my-api-token ; limites (v1) : https://pennylane.readme.io/v1.0/docs/rate-limiting-1
- Qonto, OAuth : https://docs.qonto.com/get-started/business-api/authentication/oauth/oauth-flow ; clé API : https://docs.qonto.com/get-started/business-api/authentication/api-key.md ; limites : https://docs.qonto.com/get-started/general/rate-limitations
- Bridge : https://docs.bridgeapi.io/v2021.06.01/docs/exposed-resources ; https://openbankingtracker.com/bridgeapi-io ; levée de fonds BPCE : https://newsroom-en.groupebpce.fr/news/bridge-raises-eur20-million-from-truffle-capital-and-groupe-bpce-to-create-the-next-generation-of-payment-solutions-and-accelerate-its-development-in-europe-c656-53927.html
- Powens : https://www.capterra.com/p/247868/Powens/reviews/ ; https://thepaypers.com/payments/company-information/powens
- GoCardless Bank Account Data, fermeture aux nouveaux comptes (source tierce) : https://actualbudget.org/docs/advanced/bank-sync/gocardless/
- EBA, renouvellement de l'authentification forte à 180 jours : https://www.eba.europa.eu/publications-and-media/press-releases/eba-publishes-final-report-amendment-its-technical-standards
- Dolibarr, API REST : https://wiki.dolibarr.org/index.php/Module_Web_Services_REST ; clé utilisateur : https://www.dolibarr.fr/doxygen/dolibarr_17.0/build/html/d6/ddd/class_login.html

**RH**
- PayFit, clé API : https://developers.payfit.io/docs/authentication-via-api-key ; OAuth 2.0 : https://developers.payfit.io/docs/authentication-with-oauth2
- Lucca, API : https://developers.lucca.fr/api-reference/latest ; legacy : https://developers.lucca.fr/api-reference/legacy/introduction.md ; environnements : https://developers.luccasoftware.com/documentation/get-started/environments.md
- Silae, accès API via le cabinet (document Lucca déjà cité en phase 0) : https://support.lucca.fr/hc/fr/article_attachments/16792303498012

**SI**
- Microsoft Graph, licences : https://learn.microsoft.com/graph/api/subscribedsku-list ; dernière connexion : https://learn.microsoft.com/en-us/graph/api/resources/signinactivity et https://learn.microsoft.com/en-us/graph/api/user-list (licence Entra ID P1/P2 et `AuditLog.Read.All`)
- Microsoft Intune, appareils gérés : https://learn.microsoft.com/en-us/graph/api/intune-devices-manageddevice-list
- Google Workspace, licences : https://developers.google.com/admin-sdk/licensing/v1/reference ; utilisateurs (`lastLoginTime`) : https://developers.google.com/admin-sdk/directory/reference/rest/v1/users
- GLPI, API REST v2 : https://help.glpi-project.org/documentation/modules/configuration/general/api/restful-api-v2
