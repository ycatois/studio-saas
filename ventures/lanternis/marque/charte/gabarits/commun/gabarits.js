/* ==========================================================================
   Lanternis · moteur des gabarits de visuels marketing · v1.0 · 2026-10-26
   Aucun appel réseau. Chaque page de gabarit appelle :
     LT.rendre("<format>", LT.donnees({ ...valeurs par défaut... }));
   LT.donnees() fusionne les valeurs par défaut de la page avec les paramètres d'URL
   (?titre=...&theme=papier...). Tous les textes sont insérés en textContent (pas de HTML).
   Formats : article (1200×630), carre (1080×1080), couverture (1640×624),
             email (1200×400), citation-carre (1080×1080), citation-paysage (1200×630).
   Quand le rendu est prêt (police chargée, textes ajustés) : #toile reçoit data-pret="1".
   ========================================================================== */
(() => {
  "use strict";

  const FORMATS = {
    "article": [1200, 630],
    "carre": [1080, 1080],
    "couverture": [1640, 624],
    "email": [1200, 400],
    "citation-carre": [1080, 1080],
    "citation-paysage": [1200, 630]
  };
  const ILLUSTRATIONS = ["etat-vide", "onboarding", "erreur"];

  /* ---------- Logo et symbole (tracés de ../../logo/, couleurs fixes de la charte) ---------- */
  const MOT = '<path d="M2.5 4v33.5H20"/><path transform="translate(27)" d="M21.5 18.5v19M2.5 28a9.5 9.5 0 1 0 19 0a9.5 9.5 0 1 0-19 0"/><path transform="translate(56)" d="M2.5 18.5v19M2.5 28a9.5 9.5 0 0 1 19 0v9.5"/><path transform="translate(84)" d="M7.5 6v26q0 5.5 5.5 5.5h2M2.5 18.5H15"/><path transform="translate(105)" d="M2.5 28h19a9.5 9.5 0 1 0-2.78 6.72"/><path transform="translate(134)" d="M2.5 18.5v19M2.5 28a9.5 9.5 0 0 1 9.5-9.5h3"/><path transform="translate(155)" d="M2.5 18.5v19M2.5 28a9.5 9.5 0 0 1 19 0v9.5"/><path transform="translate(184)" d="M2.5 18.5v19"/><path transform="translate(194)" d="M17.5 21.5Q15 18.5 10 18.5Q2.5 18.5 2.5 23.25Q2.5 28 10 28Q17.5 28 17.5 32.75Q17.5 37.5 10 37.5Q4.5 37.5 2.5 34.5"/>';
  const couleurs = (theme) => theme === "papier"
    ? { trait: "#1B2330", interieur: "#1B2330" }
    : { trait: "#FAF6EE", interieur: "#2A3444" };
  const corpsSymbole = (c) =>
    '<g fill="none" stroke="' + c.trait + '" stroke-linecap="round" stroke-linejoin="round"><circle cx="32" cy="9" r="4" stroke-width="4"/><path d="M16 58V36a16 16 0 0 1 32 0v22z" fill="' + c.interieur + '" stroke-width="5"/><path d="M10 58h44" stroke-width="5"/>';
  const logo = (theme) => {
    const c = couleurs(theme);
    return '<svg viewBox="0 0 298 64" aria-hidden="true">' + corpsSymbole(c) +
      '<g transform="translate(76 20.5)" stroke-width="5">' + MOT +
      '<circle cx="186.5" cy="8" r="3" fill="' + c.trait + '" stroke="none"/></g></g><circle cx="32" cy="40" r="8.5" fill="#F2B24C"/></svg>';
  };
  const symbole = (theme) =>
    '<svg viewBox="0 0 64 64" aria-hidden="true">' + corpsSymbole(couleurs(theme)) + '</g><circle cx="32" cy="40" r="8.5" fill="#F2B24C"/></svg>';

  /* ---------- Outils ---------- */
  const donnees = (defauts) => {
    const d = Object.assign({}, defauts);
    new URLSearchParams(location.search).forEach((v, k) => { d[k] = v; });
    d.theme = d.theme === "papier" ? "papier" : "nuit";
    return d;
  };
  const el = (tag, cls, texte) => {
    const e = document.createElement(tag);
    if (cls) e.className = cls;
    // Typographie française : espace fine insécable avant ? ! ; et insécable avant :, pour éviter une ponctuation seule en début de ligne.
    if (texte) e.textContent = String(texte).replace(/ ([?!;])/g, " $1").replace(/ :/g, " :");
    return e;
  };
  /* contenu constant uniquement (SVG de la marque), jamais un texte saisi */
  const svgMarque = (cls, contenu) => { const e = el("div", cls); e.innerHTML = contenu; return e; };
  const halo = (toile, cx, cy, diametre) => {
    const h = el("div", "halo");
    Object.assign(h.style, { left: (cx - diametre / 2) + "px", top: (cy - diametre / 2) + "px", width: diametre + "px", height: diametre + "px" });
    toile.prepend(h); /* sous les textes ; jamais derrière un texte (positions choisies par format) */
  };
  const titre = (d) => {
    const h = el("h1", "titre");
    if (d.titre) h.appendChild(el("span", "principal", d.titre));
    if (d.titre && d.accent) h.appendChild(document.createTextNode(" "));
    if (d.accent) h.appendChild(el("span", "accent", d.accent));
    return h;
  };
  const photo = (src, cls) => {
    const v = el("div", cls);
    const i = el("img"); i.src = src; i.alt = ""; i.decoding = "sync";
    v.appendChild(i);
    return v;
  };
  const visuel = (d) => {
    if (d.image) return photo(d.image, "visuel v-photo");
    if (d.illustration && ILLUSTRATIONS.includes(d.illustration))
      return photo("../iconographie/illustrations/" + d.illustration + ".svg", "visuel v-illu");
    if (d.symbole !== "non") return svgMarque("visuel v-symbole", symbole(d.theme));
    return null;
  };
  const bas = (d, avecSignature) => {
    const b = el("div", "bas");
    b.appendChild(svgMarque("logo", logo(d.theme)));
    if (avecSignature && d.signature) b.appendChild(el("p", "signature", d.signature));
    return b;
  };

  /* ---------- Formats ---------- */
  const article = (t, d) => {
    const tx = el("div", "texte");
    tx.appendChild(svgMarque("logo", logo(d.theme)));
    const zone = el("div", "zone"), aj = el("div", "ajuste");
    if (d.surtitre) aj.appendChild(el("p", "surtitre", d.surtitre));
    const h = titre(d); aj.appendChild(h);
    if (d.sous) aj.appendChild(el("p", "sous", d.sous));
    zone.appendChild(aj); tx.appendChild(zone);
    if (d.pied) tx.appendChild(el("p", "pied", d.pied));
    t.appendChild(tx);
    const v = visuel(d);
    if (v) {
      t.appendChild(v);
      if (d.theme === "nuit" && v.classList.contains("v-symbole")) halo(t, 948, 315, 600);
    } else t.classList.add("sans-visuel");
    return [{ zone, aj, cible: h, max: 64, min: 40 }];
  };

  const carre = (t, d) => {
    if (d.theme === "nuit") halo(t, 1080, 0, 760);
    const tx = el("div", "texte");
    if (d.image) tx.appendChild(photo(d.image, "photo v-photo"));
    if (d.surtitre) tx.appendChild(el("p", "surtitre", d.surtitre));
    const zone = el("div", "zone"), aj = el("div", "ajuste");
    const h = titre(d); aj.appendChild(h);
    if (d.sous) aj.appendChild(el("p", "sous", d.sous));
    zone.appendChild(aj); tx.appendChild(zone);
    tx.appendChild(bas(d, true));
    t.appendChild(tx);
    return [{ zone, aj, cible: h, max: d.image ? 60 : 76, min: 44 }];
  };

  const couverture = (t, d) => {
    if (d.symbole !== "non") {
      if (d.theme === "nuit") halo(t, 1250, 306, 640);
      t.appendChild(svgMarque("v-symbole", symbole(d.theme)));
    }
    const tx = el("div", "texte");
    const zone = el("div", "zone"), aj = el("div", "ajuste");
    if (d.surtitre) aj.appendChild(el("p", "surtitre", d.surtitre));
    const h = titre(d); aj.appendChild(h);
    if (d.sous) aj.appendChild(el("p", "sous", d.sous));
    zone.appendChild(aj); tx.appendChild(zone);
    t.appendChild(tx);
    if (d.guides === "1") {
      /* Repères approximatifs (dimensions Meta à reconfirmer) : zone visible sur mobile, zone de la photo de profil */
      const g1 = el("div", "guide"); Object.assign(g1.style, { left: "265px", top: "0", width: "1110px", height: "624px" });
      g1.appendChild(el("span", "", "Zone sûre (visible sur mobile, estimation)"));
      const g2 = el("div", "guide"); Object.assign(g2.style, { left: "0", top: "400px", width: "400px", height: "224px" });
      g2.appendChild(el("span", "", "Photo de profil (approx.)"));
      t.append(g1, g2);
    }
    return [{ zone, aj, cible: h, max: 76, min: 48 }];
  };

  const email = (t, d) => {
    if (d.theme === "nuit") halo(t, 1200, 0, 700);
    t.appendChild(svgMarque("logo", logo(d.theme)));
    const tx = el("div", "texte");
    const zone = el("div", "zone"), aj = el("div", "ajuste");
    if (d.surtitre) aj.appendChild(el("p", "surtitre", d.surtitre));
    const h = titre(d); aj.appendChild(h);
    zone.appendChild(aj); tx.appendChild(zone);
    t.appendChild(tx);
    return [{ zone, aj, cible: h, max: 56, min: 40 }];
  };

  const citation = (paysage) => (t, d) => {
    if (d.theme === "nuit") halo(t, paysage ? 1200 : 1080, 0, paysage ? 640 : 760);
    const tx = el("div", "texte");
    const zone = el("div", "zone"), aj = el("div", "ajuste");
    if (d.surtitre) aj.appendChild(el("p", "surtitre", d.surtitre));
    let cible, max, min;
    if (d.type === "chiffre") {
      cible = el("p", "chiffre", d.chiffre || "");
      aj.appendChild(cible);
      if (d.legende) aj.appendChild(el("p", "legende", d.legende));
      [max, min] = paysage ? [150, 80] : [180, 96];
    } else {
      const g = el("p", "guillemet", "«"); g.setAttribute("aria-hidden", "true");
      aj.appendChild(g);
      cible = el("p", "citation", d.texte || "");
      aj.appendChild(cible);
      if (d.attribution) aj.appendChild(el("p", "attribution", d.attribution));
      [max, min] = paysage ? [54, 34] : [64, 40];
    }
    zone.appendChild(aj); tx.appendChild(zone);
    if (d.type === "chiffre" && d.source) tx.appendChild(el("p", "source", d.source));
    tx.appendChild(bas(d, true));
    t.appendChild(tx);
    return [{ zone, aj, cible, max, min }];
  };

  const CONSTRUCTEURS = {
    "article": article, "carre": carre, "couverture": couverture, "email": email,
    "citation-carre": citation(false), "citation-paysage": citation(true)
  };

  /* ---------- Ajustement automatique de la taille du texte principal ---------- */
  const ajuster = ({ zone, aj, cible, max, min }) => {
    let taille = max;
    cible.style.fontSize = taille + "px";
    const deborde = () => aj.offsetHeight > zone.clientHeight + 1 || aj.scrollWidth > aj.clientWidth + 1;
    while (deborde() && taille > min) { taille -= 2; cible.style.fontSize = taille + "px"; }
    if (deborde()) console.warn("Lanternis : texte trop long pour ce gabarit, à raccourcir.");
  };

  const texteAlternatif = (d) =>
    [d.surtitre, d.titre, d.accent, d.sous, d.chiffre, d.legende, d.texte, d.attribution, d.source]
      .filter(Boolean).join(" ").replace(/\s*\n\s*/g, " ");

  const rendre = (format, d) => {
    const dims = FORMATS[format];
    if (!dims) throw new Error("Format inconnu : " + format);
    const [l, h] = dims;
    const t = document.getElementById("toile");
    t.className = "toile f-" + format + " theme-" + d.theme;
    t.style.width = l + "px";
    t.style.height = h + "px";
    document.documentElement.style.background = document.body.style.background = d.theme === "papier" ? "#FAF6EE" : "#1B2330";
    const ajustements = CONSTRUCTEURS[format](t, d);

    const alt = d.alt || texteAlternatif(d);
    t.setAttribute("role", "img");
    t.setAttribute("aria-label", alt);
    t.dataset.alt = alt;

    const echelle = () => { t.style.transform = "scale(" + (window.innerWidth / l) + ")"; };
    echelle();
    window.addEventListener("resize", echelle);

    const police = document.fonts ? document.fonts.load('600 40px "Fraunces"').catch(() => null) : Promise.resolve();
    const images = Array.from(t.querySelectorAll("img")).map((i) =>
      i.complete ? null : new Promise((ok) => { i.onload = ok; i.onerror = ok; }));
    Promise.all([police, ...images]).then(() => {
      ajustements.forEach(ajuster);
      t.dataset.pret = "1";
      console.log("Texte alternatif : " + alt);
    });
  };

  window.LT = { donnees, rendre, FORMATS };
})();
