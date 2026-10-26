/* GÉNÉRÉ par build.php depuis marketing/landing/validation.html : ne pas modifier ce fichier, modifier la source puis relancer php build.php. */
/* Lanternis · landing de validation · script facultatif (la page fonctionne sans).
   1. Variante du titre (?v=a|b) et public (?public=ess) ; 2. source du lien (?src=) ;
   3. messages de retour de waitlist.php (?inscription=ok | ?erreur=...) ;
   4. points d'accroche des événements, inactifs tant qu'aucun outil sans cookie n'est installé.
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
  document.querySelectorAll("[data-evenement]").forEach(function (el) {
    el.addEventListener("click", function () { suivre(el.dataset.evenement); });
  });
  var form = document.querySelector("form.formulaire");
  var debut = false;
  form.addEventListener("focusin", function () {
    if (!debut) { debut = true; suivre(form.dataset.evenementDebut); }
  });
  form.addEventListener("submit", function () {
    var f = new FormData(form);
    suivre("Envoi formulaire", { effectif: f.get("effectif") || "", type: f.get("type") || "", douleur: f.get("douleur") || "" });
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
