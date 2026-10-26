/* GÉNÉRÉ par build.php depuis marketing/landing/validation.html : ne pas modifier ce fichier, modifier la source puis relancer php build.php. */
/* Lanternis · landing de validation · script facultatif (la page fonctionne sans).
   1. Variante du titre (?v=a|b) et public (?public=ess) ; 2. source du lien (?src=) ;
   3. simulateur de prix (grille D, validation.md § 5.10) ; 4. présélection du palier depuis les cartes d'offre ;
   5. messages de retour de waitlist.php (?inscription=ok | ?erreur=...) ;
   6. points d'accroche des événements, inactifs tant qu'aucun outil sans cookie n'est installé.
   Aucun stockage local, aucun cookie. */
(function () {
  var q = new URLSearchParams(location.search);
  var variante = q.get("v") === "b" ? "b" : "a";
  var publicCible = q.get("public") === "ess" ? "ess" : "pme";
  var source = (q.get("src") || "direct").toLowerCase().replace(/[^a-z0-9-]/g, "").slice(0, 30) || "direct";
  var h1 = document.getElementById("titre-principal");
  var st = document.getElementById("sous-titre");

  if (publicCible === "ess") {
    h1.textContent = h1.dataset.titreEss;
    st.textContent = st.dataset.sousTitreEss;
    var typeEss = document.getElementById("type-ess");
    if (typeEss) typeEss.checked = true;
    var simEss = document.getElementById("sim-ess");
    if (simEss) simEss.checked = true;
  } else if (variante === "b") {
    h1.textContent = h1.dataset.titreB;
  }
  document.getElementById("champ-variante").value = publicCible === "ess" ? "ess" : variante;
  document.getElementById("champ-public").value = publicCible;
  document.getElementById("champ-source").value = source;

  function suivre(nom, props) {
    props = props || {};
    props.variante = publicCible === "ess" ? "ess" : variante;
    props.source = source;
    if (typeof window.plausible === "function") window.plausible(nom, { props: props });
    else if (window._paq) window._paq.push(["trackEvent", "landing", nom, JSON.stringify(props)]);
  }

  /* --- Simulateur de prix : grille D (propositions-tarifs.md § 11.2) ---
     Prix de départ jusqu'à 49 personnes, puis un montant fixe par tranche de 50 personnes.
     Annuel : -20 %. ESS : -15 % sur le mensuel, non cumulable avec l'annuel (la meilleure remise s'applique).
     Au-delà de 499 personnes : « Écrivez-nous ». */
  var GRILLE = { essentiel: { base: 49, pas: 30 }, pilotage: { base: 99, pas: 60 } };
  var sim = document.getElementById("simulateur");
  var formSim = document.getElementById("form-simulateur");
  var champPersonnes = document.getElementById("sim-personnes");
  var simUtilise = false;

  function euros(x) {
    var arrondi = Math.round(x * 100) / 100;
    var entier = Math.abs(arrondi - Math.round(arrondi)) < 0.001;
    return arrondi.toLocaleString("fr-FR", { minimumFractionDigits: entier ? 0 : 2, maximumFractionDigits: entier ? 0 : 2 }) + " €";
  }
  function tranche(n) {
    if (n <= 49) return { indice: 0, libelle: "jusqu'à 49 personnes" };
    var i = Math.floor((n - 50) / 50) + 1;
    var bas = 50 * i, haut = bas + 49;
    return { indice: i, libelle: "de " + bas + " à " + haut + " personnes" };
  }
  function valeurRadio(nom) {
    var r = formSim.querySelector('input[name="' + nom + '"]:checked');
    return r ? r.value : "";
  }
  function calculer() {
    var n = parseInt(champPersonnes.value, 10);
    var ess = valeurRadio("sim-type") === "ess";
    var annuel = valeurRadio("sim-periode") === "annuel";
    var elE = document.getElementById("sim-essentiel"), elP = document.getElementById("sim-pilotage");
    var dE = document.getElementById("sim-essentiel-detail"), dP = document.getElementById("sim-pilotage-detail");
    var note = document.getElementById("sim-note");
    if (!n || n < 1) {
      elE.textContent = elP.textContent = "—";
      dE.textContent = dP.textContent = "";
      note.textContent = "Indiquez un nombre de personnes (1 ou plus).";
      return null;
    }
    if (n >= 500) {
      elE.textContent = elP.textContent = "Écrivez-nous";
      dE.textContent = dP.textContent = "";
      note.textContent = "À partir de 500 personnes, écrivez-nous à contact@hasteria.net : la même règle de prix s'applique.";
      return { tranche: "500-plus", ess: ess, annuel: annuel };
    }
    var t = tranche(n);
    var facteur = annuel ? 0.8 : (ess ? 0.85 : 1);
    function afficher(offre, elPrix, elDetail) {
      var catalogue = GRILLE[offre].base + GRILLE[offre].pas * t.indice;
      var mensuel = catalogue * facteur;
      elPrix.textContent = euros(mensuel) + " HT/mois";
      var detail = [];
      if (facteur !== 1) detail.push("au lieu de " + euros(catalogue));
      if (annuel) detail.push("soit " + euros(mensuel * 12) + " HT par an");
      detail.push("environ " + euros(mensuel / n) + " par personne et par mois");
      elDetail.textContent = detail.join(" ; ") + ".";
    }
    afficher("essentiel", elE, dE);
    afficher("pilotage", elP, dP);
    var phrases = ["Tranche " + t.libelle + ", prix hors taxes, TVA en sus."];
    if (annuel && ess) phrases.push("La remise annuelle (−20 %) est plus avantageuse que la remise ESS (−15 %) : c'est elle qui s'applique, les deux ne se cumulent pas.");
    else if (annuel) phrases.push("Engagement annuel : −20 %, facturé à l'année.");
    else if (ess) phrases.push("Remise associative de 15 % appliquée, sous réserve d'éligibilité.");
    phrases.push("Tarifs de lancement envisagés ; essai gratuit d'un mois sans carte à l'ouverture.");
    note.textContent = phrases.join(" ");
    return { tranche: t.indice === 0 ? "1-49" : (50 * t.indice) + "-" + (50 * t.indice + 49), ess: ess, annuel: annuel };
  }
  if (sim && formSim) {
    sim.hidden = false;
    formSim.addEventListener("submit", function (e) { e.preventDefault(); calculer(); });
    formSim.addEventListener("input", function () {
      var r = calculer();
      if (r && !simUtilise) {
        simUtilise = true;
        suivre("Simulateur", { tranche: r.tranche, type: r.ess ? "ess" : "entreprise", periode: r.annuel ? "annuel" : "mensuel" });
      }
    });
    formSim.addEventListener("change", function () { calculer(); });
    calculer();
  }

  /* --- Cartes d'offre : présélection du palier dans le formulaire --- */
  document.querySelectorAll("[data-palier]").forEach(function (lien) {
    lien.addEventListener("click", function () {
      var radio = document.querySelector('input[name="palier"][value="' + lien.dataset.palier + '"]');
      if (radio) radio.checked = true;
    });
  });

  document.querySelectorAll("[data-evenement]").forEach(function (el) {
    el.addEventListener("click", function () {
      suivre(el.dataset.evenement, el.dataset.palier ? { palier: el.dataset.palier } : {});
    });
  });
  var form = document.querySelector("form.formulaire");
  var debut = false;
  form.addEventListener("focusin", function () {
    if (!debut) { debut = true; suivre(form.dataset.evenementDebut); }
  });
  form.addEventListener("submit", function () {
    var f = new FormData(form);
    suivre("Envoi formulaire", {
      effectif: f.get("effectif") || "", type: f.get("type") || "", douleur: f.get("douleur") || "",
      palier: f.get("palier") || "aucun", essai: f.get("essai") === "oui" ? "oui" : "non"
    });
  });
  document.querySelectorAll("details").forEach(function (d) {
    d.addEventListener("toggle", function () { if (d.open) suivre("Ouverture FAQ", { question: d.querySelector("summary").textContent.slice(0, 60) }); });
  });

  var erreurs = {
    email: "L'adresse email semble incorrecte. Vérifiez le champ « Votre email professionnel ».",
    champs: "Un ou plusieurs champs obligatoires sont vides : email, nom de la structure, type, effectif et préoccupation principale.",
    technique: "Un incident technique nous empêche d'enregistrer votre demande. Réessayez dans quelques minutes ou écrivez à contact@hasteria.net."
  };
  var zone = document.getElementById("zone-message");
  if (q.get("inscription") === "ok") {
    document.getElementById("message-succes").hidden = false;
    form.hidden = true;
    suivre("Inscription");
    zone.focus();
  } else if (q.get("erreur")) {
    document.getElementById("texte-erreur").textContent = erreurs[q.get("erreur")] || erreurs.champs;
    document.getElementById("message-erreur").hidden = false;
    zone.focus();
  }
})();

/* Ajouté par build.php : signale au serveur que le script de la page s'exécute. */
(function () {
  var f = document.querySelector('form[action="waitlist.php"]');
  if (!f) return;
  var i = document.createElement('input');
  i.type = 'hidden'; i.name = 'js'; i.value = '1';
  f.appendChild(i);
})();
