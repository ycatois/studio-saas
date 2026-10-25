"""Convertit une page HTML (fichier local ou URL) en PDF avec Chromium.

Usage : python html2pdf.py <entrée.html|URL> <sortie.pdf> [--format A4|Letter] [--paysage]
Le CSS @page du document (marges, en-têtes) est respecté ; les fonds/couleurs sont imprimés.
"""
import argparse
from pathlib import Path
from playwright.sync_api import sync_playwright


def main():
    ap = argparse.ArgumentParser()
    ap.add_argument("entree")
    ap.add_argument("sortie")
    ap.add_argument("--format", default="A4")
    ap.add_argument("--paysage", action="store_true")
    a = ap.parse_args()

    url = a.entree if a.entree.startswith(("http://", "https://")) else Path(a.entree).resolve().as_uri()
    Path(a.sortie).parent.mkdir(parents=True, exist_ok=True)
    with sync_playwright() as p:
        nav = p.chromium.launch()
        page = nav.new_page()
        page.goto(url, wait_until="networkidle")
        page.emulate_media(media="print")
        page.pdf(path=a.sortie, format=a.format, landscape=a.paysage,
                 print_background=True, prefer_css_page_size=True)
        nav.close()
    print(f"PDF créé : {a.sortie}")


if __name__ == "__main__":
    main()
