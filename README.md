# SaaS Studio — kit Claude Code

> **Première fois ? Lis `MODE-EMPLOI.md`.**

Prérequis sur le poste : Docker Desktop (WSL2), Git, Node.js LTS, GitHub CLI ; Composer et Symfony CLI pratiques hors conteneur. Comptes : GitHub, Stripe, Mailjet, OVH, o2switch.

Une usine à SaaS dans un seul dépôt : de l'idée brute jusqu'à l'application en ligne qui vend, pilotée depuis une seule session Claude Code.

## Installation
1. Dézippe le dossier `saas-studio/` où tu veux (ou pousse-le sur un dépôt GitHub privé pour l'utiliser aussi depuis le web ou le mobile).
2. `git init` à la racine si ce n'est pas déjà un dépôt.
3. Ouvre une session Claude Code **sur ce dossier** (terminal : `cd saas-studio && claude` ; appli desktop : sélectionne le dossier ; web/mobile : sélectionne le dépôt GitHub).
4. Tape `/statut` pour vérifier que tout est chargé.

## Le parcours type
```
/idee Un outil qui …            → crée ventures/<slug>/ et la fiche idée
/analyse <slug>                 → faisabilité, risques, pré-mortem
/marche <slug>                  → étude de marché, concurrence, prix, personas
/prelancement <slug>            → landing de validation + liste d'attente + 1ers contenus
/bilan <slug>                   → business model, prévisionnel, scoring
/decision <slug>                → mémo GO / NO-GO / PIVOT … et ça s'arrête : à toi de dire GO
/lancer <slug>                  → cadrage, marque, specs, archi, squelette du produit
/feature <slug> <description>   → une fonctionnalité de bout en bout (spec → code → tests → changelog)
/qualite <slug>                 → tests, sécurité, RGPD, accessibilité, éco-conception
/deployer <slug>                → mise en ligne (avec ta validation)
/lancement <slug>               → plan et contenus de lancement
/calendrier, /article, /linkedin, /emailing, /campagne, /rapport → la vie marketing au quotidien
```

## Contenu
- `CLAUDE.md` : le process, les portes, la grille de décision, la stack par défaut. **Personnalise-le en premier** (grille, stack, valeurs).
- `.claude/agents/` : 37 rôles (découverte, produit, **design** dont un directeur artistique, tech, qualité, ops, **11 rôles marketing & communication**, documentation, exploitation).
- `.claude/skills/` : 102 savoir-faire, chargés seulement quand c'est utile.
- `.claude/commands/` : les commandes du pipeline.
- `SOCIETE.md` : les informations légales d'Hasteria SASU (à compléter une fois) et la liste des marques.
- `INFRA.md` : ton infrastructure (Docker en local et sur le VPS OVH, o2switch, domaines OVH, GitHub, Stripe, Mailjet). **À compléter** : Claude te demandera les champs manquants au premier déploiement.
- `outils/documents/` : la boîte à outils Docker pour fabriquer PDF, captures d'écran, Word, Excel, PowerPoint.
- `_modele-venture/` : l'arborescence copiée pour chaque nouvelle idée.

## Personnaliser
- **Grille GO/NO-GO** : section dédiée de `CLAUDE.md`.
- **Ta voix sur LinkedIn** : remplis `_modele-venture/marque/voix-fondateur.md` (ou celui de la venture) avec 3 à 5 de tes vrais posts ; l'agent LinkedIn s'en servira.
- **Hooks** (optionnel) : une fois le produit créé, ajoute dans `.claude/settings.json` un hook `PostToolUse` qui lance tes tests/lint, par ex. :
```json
{ "hooks": { "PostToolUse": [ { "matcher": "Edit|Write",
  "hooks": [ { "type": "command", "command": "cd ventures/<slug>/produit && docker compose exec -T php composer check" } ] } ] } }
```
- **Connecteurs MCP** (optionnel) : analytics, CMS, emailing, CRM… Sans connecteur, Claude prépare tout en brouillon et c'est toi qui publies.

## Bon usage
- Une venture à la fois en construction ; les autres peuvent rester en phase d'étude.
- Les chiffres de marché sont sourcés ou marqués « hypothèse » : vérifie les hypothèses avant de dire GO.
- Le noyau d'agents suffit souvent ; supprime ou fusionne ceux qui ne te servent pas.
