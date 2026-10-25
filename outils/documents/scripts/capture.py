"""Captures d'écran automatisées d'une application ou de maquettes HTML.

Usage : python capture.py <parcours.json> <dossier-sortie>

parcours.json :
{
  "base_url": "http://host.docker.internal:8000",      (ou chemin d'un dossier de maquettes)
  "formats": {"bureau": [1440, 900], "mobile": [390, 844]},
  "connexion": {"url": "/login", "champ_email": "#email", "champ_mdp": "#password", "bouton": "button[type=submit]"},
  "ecrans": [
    {"nom": "01-tableau-de-bord", "url": "/dashboard", "attendre": "h1", "pleine_page": true},
    {"nom": "02-nouveau-projet", "url": "/projets/nouveau", "cliquer": ["#ouvrir-aide"]}
  ]
}
Identifiants de connexion : variables d'environnement CAPTURE_EMAIL et CAPTURE_PASSWORD (compte de démonstration, jamais un vrai client).
"""
import json, os, sys
from pathlib import Path
from playwright.sync_api import sync_playwright


def url_de(base, chemin):
    if base.startswith(("http://", "https://")):
        return base.rstrip("/") + "/" + chemin.lstrip("/")
    return (Path(base) / chemin.lstrip("/")).resolve().as_uri()


def main():
    conf = json.loads(Path(sys.argv[1]).read_text(encoding="utf-8"))
    sortie = Path(sys.argv[2]); sortie.mkdir(parents=True, exist_ok=True)
    base = conf["base_url"]
    formats = conf.get("formats", {"bureau": [1440, 900], "mobile": [390, 844]})
    with sync_playwright() as p:
        nav = p.chromium.launch()
        for nom_format, (l, h) in formats.items():
            ctx = nav.new_context(viewport={"width": l, "height": h}, device_scale_factor=2, locale="fr-FR")
            page = ctx.new_page()
            cx = conf.get("connexion")
            if cx and os.environ.get("CAPTURE_EMAIL"):
                page.goto(url_de(base, cx["url"]))
                page.fill(cx["champ_email"], os.environ["CAPTURE_EMAIL"])
                page.fill(cx["champ_mdp"], os.environ.get("CAPTURE_PASSWORD", ""))
                page.click(cx["bouton"]); page.wait_for_load_state("networkidle")
            for e in conf["ecrans"]:
                page.goto(url_de(base, e["url"]), wait_until="networkidle")
                if e.get("attendre"):
                    page.wait_for_selector(e["attendre"])
                for sel in e.get("cliquer", []):
                    page.click(sel); page.wait_for_timeout(300)
                fichier = sortie / f"{e['nom']}-{nom_format}.png"
                page.screenshot(path=str(fichier), full_page=e.get("pleine_page", False))
                print(f"Capture : {fichier}")
            ctx.close()
        nav.close()


if __name__ == "__main__":
    main()
