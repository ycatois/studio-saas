---
venture: lanternis
phase: 5 Cadrage · commande /charte, étape 3c : gabarits de visuels marketing
auteur: directeur-artistique
date: 2026-10-26
statut: version 1.0, à valider par le fondateur ; tous les exemples sont des brouillons (rien n'est publié ni envoyé)
skills: visuels-marketing, documents-generes
---

# Gabarits de visuels Lanternis

Canaux couverts : blog du site vitrine (images d'articles, Open Graph), page Facebook éventuelle (post carré, post avec lien 1200 × 630, couverture), email (en-tête de newsletter), landing de pré-lancement (image de partage). **Pas de LinkedIn.**

## 1. Principe

- Chaque gabarit est une page HTML qui appelle `LT.rendre("<format>", LT.donnees({...}))`. Les valeurs par défaut sont écrites dans la page ; **tout paramètre d'URL les remplace** (`?titre=...&theme=papier`).
- Mise en page et logique communes : `commun/gabarits.css` et `commun/gabarits.js` (une seule source par format). Aucune ressource externe : seule la police Fraunces est lue dans `../fonts/` (repli Georgia, puis serif du système), les illustrations dans `../iconographie/illustrations/`.
- La toile est dessinée **à la taille finale du PNG** et réduite à la largeur de la fenêtre. `capture.py` capture à l'échelle 2 : la fenêtre du parcours vaut la moitié de la taille finale.
- Le titre (ou le chiffre, ou la citation) est **ajusté automatiquement** : sa taille baisse par pas de 2 px jusqu'à un minimum ; au-delà, un avertissement s'affiche dans la console (« texte trop long ») et il faut raccourcir. Quand le rendu est prêt, `#toile` reçoit `data-pret="1"` (le parcours attend ce signal).
- Le texte alternatif est calculé (ou donné par `alt`), posé en `aria-label` et affiché dans la console : **à recopier avec chaque publication**.

## 2. Gabarits

| Fichier | Format final | Usage | Paramètres principaux |
|---|---|---|---|
| `article-og-1200x630.html` | 1200 × 630 | Open Graph d'un article ou d'une page (thème nuit) ; en-tête d'article dans le blog (thème papier) ; post Facebook avec lien | `theme`, `surtitre`, `titre`, `accent`, `sous`, `pied`, `illustration`, `image`, `symbole`, `alt` |
| `facebook-carre-1080.html` | 1080 × 1080 | Post Facebook carré | `theme`, `surtitre`, `titre`, `accent`, `sous`, `signature`, `image`, `alt` |
| `facebook-couverture.html` | 1640 × 624 | Couverture de la page Facebook | `theme`, `surtitre`, `titre`, `accent`, `sous`, `symbole`, `guides`, `alt` |
| `email-entete-600.html` | 1200 × 400, affiché à 600 × 200 | En-tête de newsletter | `theme`, `surtitre`, `titre`, `accent`, `alt` |
| `citation-chiffre.html` | 1080 × 1080 (`format=carre`) ou 1200 × 630 (`format=paysage`) | Citation ou chiffre clé | `format`, `type` (`citation` ou `chiffre`), `theme`, `surtitre`, `texte`, `attribution`, `chiffre`, `legende`, `source`, `signature`, `alt` |

Valeurs communes : `theme=nuit` (défaut) ou `papier` ; `\n` dans un texte (ou `%0A` dans l'URL) force un retour à la ligne ; `accent` s'affiche en ambre (sur nuit) ou ambre profond (sur papier), sur une nouvelle ligne (sur la même ligne pour l'email) ; `illustration` = `etat-vide`, `onboarding` ou `erreur` ; `image` = chemin d'une image **locale**, relatif à ce dossier (photo dont les droits sont vérifiés et consignés).

Exemple d'appel (navigateur) : `article-og-1200x630.html?theme=papier&surtitre=Contrats&titre=Choisir%20plut%C3%B4t%20que%20subir%20une%20reconduction&illustration=onboarding`.

> **Limite de `capture.py`.** Pour un chemin local, le script transforme l'URL en `file://` et encode le `?` : les paramètres d'URL ne passent pas à la capture. Pour capturer un nouveau visuel, **copier un fichier `exemple-…html`, modifier ses valeurs, l'ajouter au parcours de la bonne taille**. Les paramètres d'URL servent à l'aperçu dans le navigateur (ou à une capture via un serveur local `http://`).

## 3. Exemples remplis (brouillons)

| Fichier | Texte (source) | Texte alternatif |
|---|---|---|
| `exemple-article-og-nuit.html` | Article P1 « Départ du responsable informatique : la check-list de passation » (`messages-par-persona.md`) ; chapeau = message principal (plateforme § 11) | « Lanternis. Départ du responsable informatique : la check-list de passation à faire avant son dernier jour. Ce que vous avez, ce que vous payez, ce qui arrive à échéance. » |
| `exemple-article-entete-papier.html` | Même article, en-tête du blog, illustration `onboarding` ; « liste en trois colonnes » et « première page d'un registre » (plateforme § 10.5) | « Départ du responsable informatique : la check-list de passation à faire avant son dernier jour. Illustration : un tableur devient un registre en trois colonnes, sous une petite lanterne allumée. » |
| `exemple-facebook-carre.html` | Post réécrit de la plateforme (§ 10.5) | « Votre responsable informatique part en juin. Qui sait, chez vous, quand se renouvelle le contrat du serveur ? Lanternis, votre informatique, enfin lisible. » |
| `exemple-facebook-couverture.html` | Message principal (§ 11, message 1) | « Lanternis. Votre informatique, enfin lisible. Ce que vous avez, ce que vous payez, ce qui arrive à échéance. » |
| `exemple-email-entete.html` | Message « Alertes » (§ 11, message 4) ; nom « La lettre Lanternis » = **hypothèse** | « La lettre Lanternis, novembre 2026. Être prévenu avant : renouvellements, licences, accès. » |
| `exemple-citation-carre.html` | « On dit » de la plateforme (§ 10.2), attribué comme **principe de la marque** (aucun témoignage client n'existe) | « « Lanternis ne remplace pas votre prestataire : il vous donne la carte. » Un principe Lanternis. » |
| `exemple-chiffre-cle-paysage.html` | **Chiffre sourcé** : `2-marche/signaux-demande.md`, S2 (voir ci-dessous) ; signature = message « Coût » (§ 11, message 3) | « Le coût d'un poste : 45 à 75 k€ par an, le salaire proposé pour un responsable informatique de PME. Source : deux offres d'emploi publiées sur HelloWork les 12 et 19 octobre 2026. Lanternis, un DSI de poche, pour une fraction du prix d'un poste. » |

**Le seul chiffre** des exemples (hors date de la lettre) : 45 à 75 k€ par an, fourchettes annoncées dans deux offres d'emploi HelloWork, [offre du 19/10/2026](https://www.hellowork.com/fr-fr/emplois/82433859.html) (45 à 70 k€ brut/an) et [offre du 12/10/2026](https://www.hellowork.com/fr-fr/emplois/84330801.html) (65 à 75 k€/an), relevées dans `signaux-demande.md`. Le visuel le dit tel quel (« deux offres d'emploi ») : ce n'est pas une étude de salaires. Le mot « brut » n'est pas repris, la seconde offre ne le précisant pas. **Avant publication** : revérifier que les offres sont consultables, ou remplacer par une étude de rémunération plus large et sourcée.

## 4. Règles de composition (rappel de la charte)

- **Un message par visuel**, texte court ; le message complet va dans la légende du post ou le corps de l'email.
- **Contrastes AA** (repris de `../tokens.json`, à recontrôler) : papier sur nuit 14,65 : 1 ; ambre sur nuit 8,46 : 1 ; brume sur nuit 9,85 : 1 ; nuit sur papier 14,65 : 1 ; ambre profond sur papier 5,87 : 1 ; ardoise sur papier 7,30 : 1. Jamais d'ambre vif sur papier.
- **Halo** : thème nuit uniquement, un seul par visuel, en coin ou derrière le grand symbole, jamais derrière un texte ni derrière le logo horizontal.
- **Logo** : version nuit ou papier selon le fond, discret. Il mesure 224 à 300 px de large sur les toiles (140 px une fois l'en-tête d'email affiché à 600 px), au-dessus du minimum de 120 px. Sur un fil mobile qui réduit l'image, il peut descendre sous ce seuil : le texte porte alors le message, le nom de la page fait le reste. L'image de couverture n'a pas de logo : l'avatar de la page (`../logo/icone-app-512.svg`) le porte déjà.
- **Tailles minimales sur la toile** : 22 à 24 px pour une source ou une mention (paysage), 26 px en carré ; le texte d'un visuel doit rester lisible sur un téléphone.
- **Photos** : seulement des photos réelles avec accord écrit ou des images libres de droits dont la licence est consignée ; pas de banque d'images cliché (cadenas, hacker, salle de serveurs).
- **Chiffres** : sourcés (organisme ou document, date) sur le visuel lui-même, ou absents.
- **Email** : l'en-tête est une image ; le même texte figure dans l'`alt` et dans le corps HTML. Insérer `width="600" height="200"`, fond nuit déclaré sur la cellule (`bgcolor="#1B2330"`) pour que l'en-tête reste lisible si l'image est bloquée.
- **Couverture Facebook** : dimensions et recadrage mobile non confirmés auprès de Meta (sources secondaires divergentes, consultées le 2026-10-26 : [postfa.st](https://postfa.st/sizes/facebook/cover), [sociality.io](https://sociality.io/blog/facebook-cover-photo-size/)). Contenu tenu dans la zone centrale ; coin bas gauche libre pour la photo de profil. `?guides=1` affiche les repères (capture de contrôle prévue dans le parcours).

## 5. Capture des PNG

Les tailles diffèrent par format, or `capture.py` applique chaque format de fenêtre à **tous** les écrans d'un parcours : il y a donc **un parcours par taille**. Depuis `C:\saas-studio` :

```
docker compose -f outils/documents/compose.yaml run --rm docs python /outils/capture.py ventures/lanternis/marque/charte/gabarits/parcours-captures-1200x630.json ventures/lanternis/marque/charte/gabarits/export
docker compose -f outils/documents/compose.yaml run --rm docs python /outils/capture.py ventures/lanternis/marque/charte/gabarits/parcours-captures-1080x1080.json ventures/lanternis/marque/charte/gabarits/export
docker compose -f outils/documents/compose.yaml run --rm docs python /outils/capture.py ventures/lanternis/marque/charte/gabarits/parcours-captures-1640x624.json ventures/lanternis/marque/charte/gabarits/export
docker compose -f outils/documents/compose.yaml run --rm docs python /outils/capture.py ventures/lanternis/marque/charte/gabarits/parcours-captures-1200x400.json ventures/lanternis/marque/charte/gabarits/export
```

Sorties dans `export/` : `exemple-article-og-nuit-1200x630.png`, `exemple-article-entete-papier-1200x630.png`, `exemple-chiffre-cle-paysage-1200x630.png`, `exemple-facebook-carre-1080x1080.png`, `exemple-citation-carre-1080x1080.png`, `exemple-facebook-couverture-1640x624.png`, `controle-facebook-couverture-reperes-1640x624.png` (contrôle, ne pas publier), `exemple-email-entete-1200x400.png`.

Les visuels destinés à une publication réelle iront ensuite dans `marketing/visuels/AAAA-MM/<slug-contenu>.png` avec leur source HTML et leur texte alternatif (skill visuels-marketing), après validation du fondateur.

**Poids** : PNG à aplats, probablement 30 à 120 Ko selon le format (hypothèse, à mesurer). Pour le blog, convertir en WebP ou AVIF (100 Ko au plus, budget de la charte) ; pour l'Open Graph, un PNG ou JPEG de moins de 300 Ko est d'usage courant (à reconfirmer selon les plateformes visées).

## 6. Points ouverts

- **Rendu non vérifié visuellement** (pas d'exécution possible lors de la rédaction) : relire les 8 PNG après capture (ajustement des titres, position du halo, chevauchements).
- Police Fraunces absente de `../fonts/` tant que le fichier n'est pas déposé : les captures sortiront en police de repli (probablement DejaVu Serif dans le conteneur, hypothèse).
- Nom de la newsletter, existence de la page Facebook : à décider par le fondateur.
- Dimensions Facebook (post carré, couverture) : à reconfirmer dans l'aide Meta avant la première publication.
