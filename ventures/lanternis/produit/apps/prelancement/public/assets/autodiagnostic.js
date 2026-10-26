/* Lanternis · autodiagnostic SI en 10 questions.
   Barème, profils, actions et explications : marketing/landing/autodiagnostic.md (§ 2 à 5), repris sans réécriture.
   Même logique que lib/Autodiag.php (contrôle côté serveur d'un résultat joint).
   Aucune transmission, aucun cookie, aucun stockage local : les réponses ne quittent le navigateur que si la
   personne envoie le formulaire d'échange en cochant « Joindre mon résultat ».
   Points d'accroche de mesure d'audience inactifs tant qu'aucun outil sans cookie n'est installé. */
(function () {
  "use strict";

  var AXES = {
    avez: { libelle: "Ce que vous avez", questions: [1, 5, 6] },
    payez: { libelle: "Ce que vous payez", questions: [2, 8] },
    echeance: { libelle: "Ce qui arrive à échéance", questions: [3, 9] },
    continuite: { libelle: "Continuité", questions: [4, 7, 10] }
  };
  var ORDRE_AXES = ["avez", "payez", "echeance", "continuite"];
  var ORDRE_EGALITE = ["continuite", "echeance", "payez", "avez"];
  var DOULEUR_PAR_AXE = { continuite: "depart-referent", payez: "couts", echeance: "renouvellements", avez: "acces" };

  var PROFILS = {
    "boite-noire": {
      nom: "Informatique en boîte noire",
      constat: "Aujourd'hui, la carte de votre informatique n'est pas entre vos mains : elle tient dans une tête, chez un prestataire, ou nulle part. C'est très courant dans une structure sans DSI, et cela se corrige par étapes.",
      actions: [
        "Demandez à votre prestataire, ou à votre référent, la liste écrite de ce qu'il gère pour vous : équipements, logiciels, contrats.",
        "Ouvrez un tableau en trois colonnes : ce que vous avez, ce que vous payez, ce qui arrive à échéance. Remplissez-le avec vos dix plus grosses dépenses informatiques."
      ]
    },
    "penombre": {
      nom: "Pénombre",
      constat: "Vous avez des morceaux de la carte, mais ils sont dispersés ou dépendent d'une personne. Le plus gros du travail est de les rassembler au même endroit, chez vous.",
      actions: [
        "Rassemblez vos contrats informatiques dans un seul dossier et notez, pour chacun, sa date de préavis.",
        "Écrivez la liste des accès à fermer au départ d'un salarié, et utilisez-la au prochain départ."
      ]
    },
    "carte-a-completer": {
      nom: "Carte à compléter",
      constat: "L'essentiel est connu. Ce qui manque, c'est surtout la mise à jour dans le temps et des rappels avant les échéances.",
      actions: [
        "Mettez un rappel deux mois avant chaque préavis de contrat.",
        "Fixez une revue annuelle du coût total de votre informatique, avec votre prestataire."
      ]
    },
    "bien-eclaire": {
      nom: "Bien éclairé",
      constat: "Votre informatique est lisible et documentée. L'enjeu est de le rester : quand les personnes changent, quand les outils s'ajoutent.",
      actions: [
        "Testez une restauration de sauvegarde et gardez le compte rendu.",
        "Pour aller plus loin sur la sécurité, faites le diagnostic gratuit MonAideCyber."
      ]
    }
  };

  var ACTION_AXE = {
    avez: "Faites la liste de vos comptes administrateur (messagerie, nom de domaine, site, sauvegardes) et de qui les détient. Rangez-la en lieu sûr, accessible à la direction.",
    payez: "Exportez de votre comptabilité les dépenses informatiques des 12 derniers mois et classez-les : matériel, logiciels, prestataires, télécoms.",
    echeance: "Listez vos cinq plus gros contrats informatiques avec leur date de préavis, et mettez un rappel deux mois avant chacune.",
    continuite: "Bloquez une heure avec votre référent ou votre prestataire pour écrire ensemble ce que vous avez, ce que vous payez et ce qui arrive à échéance."
  };
  var ACTION_BIEN_ECLAIRE = "Vérifiez que la documentation ne dépend pas d'une seule personne.";

  var POURQUOI = [
    "Sans liste, impossible de savoir ce qui doit être renouvelé, assuré ou rendu au départ d'un salarié.",
    "Les abonnements pris par carte bancaire se cumulent sans que personne ne les voie.",
    "Un préavis manqué, c'est souvent un an de plus au même prix.",
    "Le savoir qui tient dans une seule tête est le premier point fragile d'une petite structure.",
    "Un compte resté ouvert après un départ est un accès que plus personne ne surveille.",
    "Sans ces accès, vous dépendez d'une personne pour reprendre la main sur vos propres outils.",
    "Une sauvegarde jamais restaurée est une promesse, pas une garantie.",
    "Sans coût total, impossible d'arbitrer ou de comparer avec un poste interne ou un autre prestataire.",
    "Ce qui n'est pas écrit au départ se négocie mal à la sortie.",
    "C'est la question que posent de plus en plus de CA, de financeurs, d'assureurs et de clients."
  ];

  var TEXTE_ECHANGE_DEBUT = "Vous voulez savoir par où commencer ? Nous lisons votre résultat avec vous et repartons avec vos trois priorités. Gratuit, par téléphone ou en visio. Ce n'est pas une démonstration commerciale : si Lanternis n'est pas adapté à votre structure, nous vous le dirons.";
  var TEXTE_ECHANGE_AVANCE = "Vous avez déjà une bonne carte. En 30 minutes, nous regardons ensemble comment la garder à jour quand les personnes et les outils changent. Gratuit, par téléphone ou en visio, sans démonstration commerciale.";

  /* --- Calcul (identique à lib/Autodiag.php) --- */
  function profilDe(score) {
    if (score <= 9) return "boite-noire";
    if (score <= 17) return "penombre";
    if (score <= 24) return "carte-a-completer";
    return "bien-eclaire";
  }
  function scoresAxes(rep) {
    var res = {};
    ORDRE_AXES.forEach(function (axe) {
      var s = 0;
      AXES[axe].questions.forEach(function (q) { s += rep[q - 1]; });
      res[axe] = { score: s, max: 3 * AXES[axe].questions.length };
    });
    return res;
  }
  function axePrioritaire(axes) {
    var meilleur = null, taux = Infinity;
    ORDRE_EGALITE.forEach(function (axe) {
      var t = axes[axe].score / axes[axe].max;
      if (t < taux) { taux = t; meilleur = axe; }
    });
    return meilleur;
  }

  /* --- Contexte (URL) --- */
  var q = new URLSearchParams(location.search);
  var publicCible = q.get("public") === "ess" ? "ess" : "pme";
  var source = (q.get("src") || "direct").toLowerCase().replace(/[^a-z0-9-]/g, "").slice(0, 30) || "direct";

  function suivre(nom, props) {
    props = props || {};
    if (typeof window.plausible === "function") window.plausible(nom, { props: props });
    else if (window._paq) window._paq.push(["trackEvent", "autodiagnostic", nom, JSON.stringify(props)]);
  }

  function el(id) { return document.getElementById(id); }
  function vider(n) { while (n.firstChild) n.removeChild(n.firstChild); }
  function ajouterLi(liste, texte) {
    var li = document.createElement("li");
    li.textContent = texte;
    liste.appendChild(li);
    return li;
  }

  document.addEventListener("DOMContentLoaded", function () {
    var form = el("questionnaire");
    var bouton = el("voir-resultat");
    var progression = el("progression");
    bouton.hidden = false;
    progression.hidden = false;

    if (publicCible === "ess") {
      var tiers = el("q10-tiers");
      if (tiers) tiers.textContent = tiers.getAttribute("data-ess");
      el("champ-public").value = "ess";
      el("champ-variante").value = "ess";
      var typeEss = el("type-ess");
      if (typeEss) typeEss.checked = true;
    }

    function reponses() {
      var rep = [];
      for (var i = 1; i <= 10; i++) {
        var choix = form.querySelector('input[name="q' + i + '"]:checked');
        rep.push(choix ? parseInt(choix.value, 10) : null);
      }
      return rep;
    }

    var commence = false;
    form.addEventListener("change", function () {
      if (!commence) { commence = true; suivre("Début autodiagnostic", { source: source, public: publicCible }); }
      var n = reponses().filter(function (r) { return r !== null; }).length;
      progression.textContent = n + (n > 1 ? " questions répondues" : " question répondue") + " sur 10";
      var fs = document.activeElement && document.activeElement.closest ? document.activeElement.closest(".question") : null;
      if (fs) fs.classList.remove("manquante");
    });

    bouton.addEventListener("click", function () {
      var rep = reponses();
      var manquantes = [];
      rep.forEach(function (r, i) {
        var fs = el("question-" + (i + 1));
        fs.classList.toggle("manquante", r === null);
        if (r === null) manquantes.push(i + 1);
      });
      var zone = el("manquantes");
      if (manquantes.length) {
        var liste = el("liste-manquantes");
        vider(liste);
        manquantes.forEach(function (n) {
          var li = document.createElement("li");
          var a = document.createElement("a");
          a.href = "#question-" + n;
          a.textContent = "Question " + n;
          a.addEventListener("click", function (e) {
            e.preventDefault();
            var premier = el("q" + n + "-0");
            el("question-" + n).scrollIntoView();
            if (premier) premier.focus();
          });
          li.appendChild(a);
          liste.appendChild(li);
        });
        zone.hidden = false;
        return;
      }
      zone.hidden = true;
      afficher(rep);
    });

    function afficher(rep) {
      var score = rep.reduce(function (a, b) { return a + b; }, 0);
      var profil = profilDe(score);
      var p = PROFILS[profil];
      var axes = scoresAxes(rep);
      var prioritaire = axePrioritaire(axes);

      el("profil").textContent = p.nom;
      el("score").textContent = score + " sur 30";
      el("constat").textContent = p.constat;

      var listeAxes = el("axes");
      vider(listeAxes);
      ORDRE_AXES.forEach(function (axe) {
        var li = document.createElement("li");
        var nom = document.createElement("span");
        nom.textContent = AXES[axe].libelle;
        nom.id = "axe-" + axe;
        var m = document.createElement("meter");
        m.min = 0; m.max = axes[axe].max; m.value = axes[axe].score;
        m.setAttribute("aria-labelledby", "axe-" + axe);
        m.textContent = axes[axe].score + " sur " + axes[axe].max;
        var v = document.createElement("span");
        v.className = "valeur";
        v.textContent = axes[axe].score + " sur " + axes[axe].max;
        li.appendChild(nom); li.appendChild(m); li.appendChild(v);
        listeAxes.appendChild(li);
      });
      el("axe-prioritaire").textContent = AXES[prioritaire].libelle;

      var premiere = ACTION_AXE[prioritaire];
      if (profil === "bien-eclaire" && axes[prioritaire].score / axes[prioritaire].max >= 0.7) premiere = ACTION_BIEN_ECLAIRE;
      var actions = el("actions");
      vider(actions);
      [premiere].concat(p.actions).forEach(function (t) { ajouterLi(actions, t); });

      var pourquoi = el("pourquoi");
      vider(pourquoi);
      rep.forEach(function (r, i) {
        if (r <= 1) {
          var li = ajouterLi(pourquoi, "");
          var b = document.createElement("strong");
          b.textContent = "Question " + (i + 1) + " : ";
          li.appendChild(b);
          li.appendChild(document.createTextNode(POURQUOI[i]));
        }
      });
      el("bloc-pourquoi").hidden = !pourquoi.children.length;

      el("texte-echange").textContent = (profil === "boite-noire" || profil === "penombre") ? TEXTE_ECHANGE_DEBUT : TEXTE_ECHANGE_AVANCE;
      el("champ-douleur").value = DOULEUR_PAR_AXE[prioritaire];
      el("champ-score").value = String(score);
      el("champ-profil").value = profil;
      el("champ-reponses").value = rep.join("");

      el("resultat").hidden = false;
      el("echange").hidden = false;
      el("annonce").textContent = "Votre résultat est affiché : " + p.nom + ", " + score + " sur 30.";
      el("resultat").focus();
      el("resultat").scrollIntoView();
      suivre("Fin autodiagnostic", { profil: profil, axe: prioritaire, source: source, public: publicCible });
      courant.profil = profil;
    }

    var courant = { profil: "" };
    el("imprimer").addEventListener("click", function () { window.print(); });
    el("modifier").addEventListener("click", function (e) {
      e.preventDefault();
      el("question-1").scrollIntoView();
      var c = form.querySelector('input[name="q1"]:checked') || el("q1-0");
      c.focus();
    });
    el("lien-liste").addEventListener("click", function () { suivre("Clic liste d'attente", { profil: courant.profil }); });

    var formEchange = el("form-echange");
    var debutEchange = false;
    formEchange.addEventListener("focusin", function () {
      if (!debutEchange) { debutEchange = true; suivre("Clic échange", { profil: courant.profil }); }
    });
    formEchange.addEventListener("submit", function () {
      // Le résultat n'est transmis que si la case est cochée : sinon, champs désactivés (non envoyés).
      var joindre = el("joindre").checked;
      ["champ-score", "champ-profil", "champ-reponses"].forEach(function (id) { el(id).disabled = !joindre; });
      suivre("Demande échange", { profil: courant.profil, source: source });
    });
  });
})();
