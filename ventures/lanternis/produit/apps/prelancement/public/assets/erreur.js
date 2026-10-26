/* Lanternis · erreur.html : affiche le message correspondant au code renvoyé par waitlist.php
   (textes repris de la landing, validation.html). Sans JavaScript, toutes les causes possibles restent listées. */
(function () {
  "use strict";
  var messages = {
    email: "L'adresse email semble incorrecte. Vérifiez le champ « Votre email professionnel ».",
    champs: "Un ou plusieurs champs obligatoires sont vides : email, nom de la structure, type, effectif et préoccupation principale.",
    technique: "Un incident technique nous empêche d'enregistrer votre demande. Réessayez dans quelques minutes ou écrivez à contact@hasteria.net."
  };
  document.addEventListener("DOMContentLoaded", function () {
    var q = new URLSearchParams(location.search);
    var code = q.get("code");
    if (Object.prototype.hasOwnProperty.call(messages, code)) {
      document.getElementById("texte-erreur").textContent = messages[code];
      document.getElementById("causes").hidden = true;
    }
    if (q.get("retour") === "autodiag") {
      var lien = document.getElementById("retour");
      lien.textContent = "Revenir à l'autodiagnostic";
      lien.href = "autodiagnostic.html#echange";
      // Retour arrière : le navigateur conserve en général le résultat et les champs saisis.
      lien.addEventListener("click", function (e) {
        if (history.length > 1) { e.preventDefault(); history.back(); }
      });
    }
  });
})();
