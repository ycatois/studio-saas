---
venture: lanternis
phase: 5 Cadrage (préparé en amont) · commande /charte, étape 2 : pistes créatives
auteur: directeur-artistique
date: 2026-10-25
statut: brouillon — aucune piste choisie, choix à faire par l'utilisateur
skills: moodboard-pistes-creatives, captures-ecran (non exécuté, voir § 5)
---

# Lanternis : trois pistes créatives

> **Base :** `marque/plateforme-de-marque.md` (§ 6 ennemi « boîte noire », § 7 valeurs, § 8 personnalité et image de « l'intendant »), `messages-par-persona.md`, `noms-et-taglines.md`, `2-marche/personas.md`, `2-marche/benchmark.md`.
> **Règles suivies :** planches HTML autonomes, aucune ressource tierce (ni CDN, ni police distante, ni image), esquisses de logo en SVG simple (pas des logos finaux), contrastes calculés selon la formule de luminance relative WCAG 2.x, données d'exemple fictives.

## 1. Les planches

| # | Piste | Planche | Esquisse de logo |
|---|---|---|---|
| 1 | **Veilleuse** | [piste-1-veilleuse.html](piste-1-veilleuse.html) | [piste-1-veilleuse-logo.svg](piste-1-veilleuse-logo.svg) |
| 2 | **Registre** | [piste-2-registre.html](piste-2-registre.html) | [piste-2-registre-logo.svg](piste-2-registre-logo.svg) |
| 3 | **Plein jour** | [piste-3-plein-jour.html](piste-3-plein-jour.html) | [piste-3-plein-jour-logo.svg](piste-3-plein-jour-logo.svg) |

Chaque planche contient : concept en une phrase, 5 mots-clés, palette avec rôles et tableau de contrastes, typographies, formes et style d'images, esquisse du logo (version claire et version négative), quatre exemples d'application (en-tête de landing, carte de tableau de bord, carte de visite, post LinkedIn carré), raisons de la piste et risques.

## 2. Les trois concepts

1. **Veilleuse** : une lumière chaude et posée dans la pièce sombre ; la lanterne que l'intendant allume pour que la direction voie ce que contient la maison.
2. **Registre** : la clarté d'un document bien tenu ; tout le SI sur une page, en lignes, en colonnes et en dates, comme le carnet d'un intendant méthodique.
3. **Plein jour** : la boîte noire s'ouvre et la lumière entre ; une informatique transparente et lisible par tous.

## 3. Comparaison

| Critère | 1. Veilleuse | 2. Registre | 3. Plein jour |
|---|---|---|---|
| Univers | Nocturne, chaleureux, humain | Éditorial, documentaire, méthodique | Lumineux, ouvert, géométrique |
| Lien avec le nom « Lanternis » | **Direct** (la lanterne est le pictogramme) | Indirect (la lumière = la lisibilité) | Moyen (le halo de lumière, la boîte ouverte) |
| Lien avec l'ennemi « boîte noire » | La nuit éclairée | Le document qui remplace la boîte | **Direct** (la boîte s'ouvre) |
| Couleur dominante | Nuit `#1B2330` + ambre `#F2B24C` | Vélin `#F4F1E8` + vert registre `#1F5C45` | Blanc + lagon `#0B6E73` + halo `#FFE58A` |
| Couleur d'alerte / échéance | Ambre profond `#8A5300` | Sienne `#A1421B` | Pastille halo + texte ardoise |
| Typographie | Fraunces (titres, 1 webfont OFL) + système | **Aucune webfont** : serif, sans et mono système | Atkinson Hyperlegible (1 famille OFL, 2 graisses) pour tout |
| Poids typographique estimé (H) | 25 à 40 Ko | 0 Ko | 40 à 60 Ko |
| Accessibilité : point fort | Contrastes très élevés en sombre (8,5 à 14,7 : 1) | Contrastes AAA sur presque tout | Police conçue pour la lisibilité ; texte principal AAA |
| Accessibilité : point de vigilance | Ambre interdit sur fond clair (1,7 : 1) | Filets décoratifs à 1,5 : 1 (jamais fonctionnels) | Halo à 1,2 : 1 sur blanc ; lagon sur halo à 4,8 : 1 (juste) |
| Persona le mieux servi (H) | P1 Marc (rassuré, présence humaine) | P2 Nadia (tableaux pour le CA) | P3 Sophie et P1 (compréhension immédiate) |
| Sobriété numérique | Bonne | **Maximale** | Bonne |
| Mémorabilité sur LinkedIn (H) | Forte (fond sombre, contraste) | Faible à moyenne (austère) | Forte (jaune, formes simples) |
| Risque principal | Le fond sombre peut évoquer la cybersécurité anxiogène ; lanterne cliché | Austère, « comptable », vert fréquent en finance et ESS | Peut paraître léger ou « start-up » devant un CA ; turquoise courant dans le médico-social |

Contrastes : rapports calculés à la main sur les codes hexadécimaux (formule WCAG 2.x), détaillés dans chaque planche. **À recontrôler avec un outil (par exemple l'analyseur de contraste de la revue design) au stade charte.**

## 4. Différenciation vis-à-vis des concurrents

Les trois pistes évitent les codes qui me semblent dominants chez les éditeurs SaaS et IT : bleus « tech », violets et dégradés vifs, interfaces denses de techniciens. Elles s'appuient sur des univers moins attendus pour un logiciel informatique (nuit et ambre, registre papier, lumière du jour).
**Hypothèse non vérifiée :** je n'ai pas fait de relevé visuel des sites de Primo, Corma, Cledara, GLPI ou Freshservice (pas de capture possible dans cette session, et `benchmark.md` ne décrit pas leur identité visuelle). À faire avant de figer la piste : une capture de la page d'accueil de chaque concurrent, pour vérifier qu'aucune piste ne s'en approche (couleurs, pictogrammes).

## 5. Captures PNG : non produites

Je n'ai pas pu lancer l'outillage du skill captures-ecran : cette session n'avait pas d'exécution de commandes (ni shell ni Docker). Je n'ai pas cherché à contourner. Le fichier de parcours est prêt : [parcours-captures.json](parcours-captures.json). Pour générer les captures, lancer depuis `C:\saas-studio` :

```
docker compose -f outils/documents/compose.yaml run --rm docs python /outils/capture.py ventures/lanternis/marque/charte/pistes/parcours-captures.json ventures/lanternis/marque/charte/pistes/captures
```

Sortie attendue : `pistes/captures/piste-1-veilleuse-bureau.png`, `piste-2-registre-bureau.png`, `piste-3-plein-jour-bureau.png` (pleine page, 1440 px de large).
**Remarque :** l'image Docker n'embarque probablement ni Fraunces ni Atkinson Hyperlegible (H). Les captures montreront alors les polices de repli. Pour un rendu fidèle, il faudra auto-héberger les fichiers woff2 (licence OFL) dans `marque/charte/` au stade charte, puis les déclarer en `@font-face` local.

## 6. Hypothèses et points ouverts

1. Poids des webfonts (Fraunces, Atkinson Hyperlegible) : ce sont des estimations, à mesurer après sous-ensemble.
2. Pictogrammes (lanterne, page de registre, boîte ouverte) : formes génériques dessinées pour l'occasion. **Aucune recherche d'antériorité graphique n'a été faite** ; elle sera à faire au stade logo (bases INPI et EUIPO, en recherche par image).
3. Les licences OFL de Fraunces et d'Atkinson Hyperlegible sont à reconfirmer sur la page de chaque police au moment du téléchargement.
4. Perception des pistes par la cible : idéalement, montrer les 3 en-têtes de landing en fin d'entretien (en même temps que le test du nom prévu dans `noms-et-taglines.md`).

## 7. À vous de choisir

Quelle piste retenez-vous : **Veilleuse**, **Registre** ou **Plein jour** ? Vous pouvez aussi en mixer deux (par exemple le pictogramme de lanterne de Veilleuse sur la sobriété typographique de Registre). Une fois la piste choisie, l'étape suivante est la charte complète (skill identite-visuelle), puis les propositions de logo (skill logo).
