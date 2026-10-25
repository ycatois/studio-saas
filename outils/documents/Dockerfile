# Boîte à outils documents du studio : PDF (Chromium), captures d'écran, Word, Excel, PowerPoint, conversions.
# Construite automatiquement par : docker compose -f outils/documents/compose.yaml build
FROM mcr.microsoft.com/playwright/python:v1.48.0-jammy

RUN apt-get update \
 && apt-get install -y --no-install-recommends pandoc libreoffice-writer-nogui libreoffice-calc-nogui libreoffice-impress-nogui fonts-dejavu fonts-liberation fonts-noto-color-emoji \
 && rm -rf /var/lib/apt/lists/*

RUN pip install --no-cache-dir python-docx==1.1.2 openpyxl==3.1.5 python-pptx==1.0.2 markdown==3.7 pypdf==5.1.0

COPY scripts/ /outils/
WORKDIR /studio
