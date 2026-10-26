<?php
declare(strict_types=1);

namespace Lanternis\Prelancement;

/**
 * Base SQLite (PDO), hors de la racine web.
 *
 * Minimisation : seuls les champs du formulaire (validation.md § 7.1) et les champs calculés
 * sont conservés. Aucune adresse IP, aucun user-agent. Les IP ne servent qu'à la limitation
 * de débit, hachées avec un sel secret (HMAC-SHA256) et supprimées après une heure.
 * Le jeton de confirmation n'est stocké que haché (SHA-256).
 * Dates en UTC, format « AAAA-MM-JJ HH:MM:SS ».
 */
final class Base
{
    public const VERSION_SCHEMA = 1;

    public static function ouvrir(string $chemin): \PDO
    {
        if ($chemin !== ':memory:') {
            $dossier = dirname($chemin);
            if (!is_dir($dossier) && !mkdir($dossier, 0700, true) && !is_dir($dossier)) {
                throw new \RuntimeException('Impossible de créer le dossier de la base');
            }
            if (!is_file($chemin)) {
                touch($chemin);
                @chmod($chemin, 0600);
            }
        }
        $pdo = new \PDO('sqlite:' . $chemin, null, null, [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ]);
        $pdo->exec('PRAGMA busy_timeout = 5000');
        if ($chemin !== ':memory:') {
            $pdo->exec('PRAGMA journal_mode = WAL');
        }
        $pdo->exec('PRAGMA secure_delete = ON'); // les données supprimées sont écrasées
        self::migrer($pdo);
        return $pdo;
    }

    public static function migrer(\PDO $pdo): void
    {
        $version = (int) $pdo->query('PRAGMA user_version')->fetchColumn();
        if ($version >= self::VERSION_SCHEMA) {
            return;
        }
        $pdo->exec(<<<'SQL'
            CREATE TABLE IF NOT EXISTS inscriptions (
                id                     INTEGER PRIMARY KEY,
                email                  TEXT NOT NULL UNIQUE,
                email_generique        INTEGER NOT NULL DEFAULT 0 CHECK (email_generique IN (0, 1)),
                structure              TEXT NOT NULL,
                type                   TEXT NOT NULL CHECK (type IN ('entreprise', 'ess')),
                effectif               TEXT NOT NULL CHECK (effectif IN ('moins-20', '20-49', '50-99', '100-249', '250-plus')),
                douleur                TEXT NOT NULL CHECK (douleur IN ('depart-referent', 'couts', 'renouvellements', 'acces', 'rendre-compte', 'autre')),
                douleur_autre          TEXT,
                nouvelles              INTEGER NOT NULL DEFAULT 0 CHECK (nouvelles IN (0, 1)),
                nouvelles_le           TEXT,
                nouvelles_version      TEXT,
                echange                INTEGER NOT NULL DEFAULT 0 CHECK (echange IN (0, 1)),
                echange_le             TEXT,
                echange_origine        TEXT CHECK (echange_origine IN ('landing', 'autodiag')),
                variante               TEXT NOT NULL CHECK (variante IN ('a', 'b', 'ess')),
                public                 TEXT NOT NULL CHECK (public IN ('pme', 'ess')),
                source                 TEXT NOT NULL,
                score                  INTEGER CHECK (score BETWEEN 0 AND 30),
                profil                 TEXT CHECK (profil IN ('boite-noire', 'penombre', 'carte-a-completer', 'bien-eclaire')),
                reponses               TEXT,
                statut                 TEXT NOT NULL CHECK (statut IN ('en_attente', 'confirme')),
                qualifie               INTEGER NOT NULL DEFAULT 0 CHECK (qualifie IN (0, 1)),
                version_mention        TEXT NOT NULL,
                ajouts_en_attente      TEXT,
                jeton_confirmation     TEXT UNIQUE,
                jeton_confirmation_expire TEXT,
                jeton_desinscription   TEXT NOT NULL UNIQUE,
                cree_le                TEXT NOT NULL,
                confirme_le            TEXT,
                dernier_contact_le     TEXT NOT NULL,
                dernier_envoi_confirmation_le TEXT
            );
            CREATE INDEX IF NOT EXISTS idx_inscriptions_purge ON inscriptions (statut, cree_le, dernier_contact_le);
            CREATE TABLE IF NOT EXISTS limites (
                cle TEXT NOT NULL,
                ts  INTEGER NOT NULL
            );
            CREATE INDEX IF NOT EXISTS idx_limites ON limites (cle, ts);
            SQL);
        $pdo->exec('PRAGMA user_version = ' . self::VERSION_SCHEMA);
    }

    public static function date(int $ts): string
    {
        return gmdate('Y-m-d H:i:s', $ts);
    }
}
