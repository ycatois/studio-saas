---
name: workflow-git
description: Gérer Git et GitHub de bout en bout à la place de l'utilisateur : commits, push, branches, PR, attente de la CI, fusion, tags de version.
---

# Workflow Git (exécuté par Claude, jamais par l'utilisateur)

## Avant chaque commit
- `git status` et `git diff --staged` relus ; aucun secret (`.env.local`, clés, `*.dump`, `*.sql` de prod) — `.gitignore` à jour.
- Code produit : `composer check` (et le build de la vitrine si touchée) doit passer en local.

## Contenus et documents (hors code produit)
`git add` des fichiers concernés → `git commit -m "content(<slug>): 3 posts LinkedIn semaine 46"` → `git push`.

## Code produit
1. `git switch main && git pull --rebase`
2. `git switch -c feat/<slug>/<sujet-court>` (ou `fix/…`, `chore/…`)
3. Commits atomiques et lisibles au fil du travail.
4. `git push -u origin <branche>`
5. `gh pr create --fill --base main` (titre clair, description : quoi, pourquoi, comment tester, story liée).
6. `gh pr checks --watch` — si la CI échoue : lire les logs (`gh run view --log-failed`), corriger, pousser, recommencer.
7. CI verte → `gh pr merge --squash --delete-branch`
8. `git switch main && git pull --rebase`

## Versions
- À chaque mise en production : tag `<slug>-vX.Y.Z` (semver) + release GitHub avec la note client (skill changelog) : `gh release create`.
- Déploiement prod : uniquement après le « oui » explicite de l'utilisateur → `gh workflow run deploy-prod-<slug>.yml -f version=<tag>` puis suivi avec `gh run watch`.

## Premier démarrage du studio
Si le dossier n'est pas encore un dépôt : `git init -b main`, premier commit, `gh repo create <nom> --private --source . --push` (après avoir demandé le nom du dépôt à l'utilisateur). Si `gh` n'est pas authentifié, demander à l'utilisateur de lancer `gh auth login` une fois.

## Interdits
Push forcé sur `main`, réécriture d'historique partagé, fusion avec CI rouge, `--no-verify`, commit de secrets. En cas de doute ou de conflit non trivial : s'arrêter et expliquer.
