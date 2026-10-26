<?php
declare(strict_types=1);

namespace Lanternis\Prelancement;

/** Réponse HTTP construite par les traitements (testable sans serveur). */
final class Reponse
{
    /** @param array<string,string> $entetes */
    public function __construct(
        public readonly int $statut,
        public readonly array $entetes = [],
        public readonly string $corps = '',
    ) {
    }

    public static function redirection(string $url): self
    {
        return new self(303, ['Location' => $url]);
    }

    public static function html(int $statut, string $html, array $entetes = []): self
    {
        return new self($statut, ['Content-Type' => 'text/html; charset=utf-8'] + $entetes, $html);
    }

    public static function texte(int $statut, string $texte, array $entetes = []): self
    {
        return new self($statut, ['Content-Type' => 'text/plain; charset=utf-8'] + $entetes, $texte);
    }
}

final class Http
{
    /** Mêmes en-têtes que le .htaccess (les scripts PHP les posent eux-mêmes). */
    public const ENTETES_SECURITE = [
        'Content-Security-Policy' => "default-src 'none'; script-src 'self'; style-src 'self'; img-src 'self'; font-src 'self'; connect-src 'self'; form-action 'self'; base-uri 'none'; frame-ancestors 'none'",
        'X-Content-Type-Options' => 'nosniff',
        'Referrer-Policy' => 'strict-origin-when-cross-origin',
        'X-Frame-Options' => 'DENY',
        'Cross-Origin-Opener-Policy' => 'same-origin',
        'Permissions-Policy' => 'camera=(), microphone=(), geolocation=(), payment=(), usb=(), interest-cohort=()',
        'Cache-Control' => 'no-store',
        'X-Robots-Tag' => 'noindex, nofollow',
    ];

    public static function emettre(Reponse $r): void
    {
        http_response_code($r->statut);
        header_remove('X-Powered-By');
        foreach (array_merge(self::ENTETES_SECURITE, $r->entetes) as $nom => $valeur) {
            header($nom . ': ' . str_replace(["\r", "\n"], '', $valeur), true);
        }
        echo $r->corps;
    }

    /** « scheme://hôte[:port] » en minuscules, port par défaut omis ; null si invalide. */
    public static function origine(string $url): ?string
    {
        $p = parse_url($url);
        if (!is_array($p) || !isset($p['scheme'], $p['host'])) {
            return null;
        }
        $schema = strtolower($p['scheme']);
        if (!in_array($schema, ['http', 'https'], true)) {
            return null;
        }
        $o = $schema . '://' . strtolower($p['host']);
        if (isset($p['port']) && !(($schema === 'https' && $p['port'] === 443) || ($schema === 'http' && $p['port'] === 80))) {
            $o .= ':' . $p['port'];
        }
        return $o;
    }

    /**
     * Contrôle d'origine (protection CSRF d'un formulaire statique, sans session) :
     * Sec-Fetch-Site « cross-site » refusé ; Origin, sinon Referer, doit appartenir aux
     * origines autorisées ; une requête sans aucun des deux est refusée.
     */
    public static function origineAutorisee(array $server, array $config): bool
    {
        $autorisees = [];
        foreach (array_merge([$config['BASE_URL']], (array) $config['ORIGINES_AUTORISEES']) as $u) {
            $o = self::origine((string) $u);
            if ($o !== null) {
                $autorisees[] = $o;
            }
        }
        $sfs = $server['HTTP_SEC_FETCH_SITE'] ?? null;
        if (is_string($sfs) && strtolower($sfs) === 'cross-site') {
            return false;
        }
        $origin = $server['HTTP_ORIGIN'] ?? '';
        if (is_string($origin) && $origin !== '') {
            $o = self::origine($origin);
            return $o !== null && in_array($o, $autorisees, true);
        }
        $referer = $server['HTTP_REFERER'] ?? '';
        if (is_string($referer) && $referer !== '') {
            $o = self::origine($referer);
            return $o !== null && in_array($o, $autorisees, true);
        }
        return false;
    }

    /**
     * Adresse utilisée pour la limitation de débit : REMOTE_ADDR uniquement (aucun en-tête
     * X-Forwarded-For, falsifiable). En IPv6, le préfixe /64 (une box = un /64).
     */
    public static function ipPourLimite(array $server): string
    {
        $ip = (string) ($server['REMOTE_ADDR'] ?? '');
        $bin = @inet_pton($ip);
        if ($bin === false) {
            return 'inconnue';
        }
        if (strlen($bin) === 16) {
            return bin2hex(substr($bin, 0, 8)) . '::/64';
        }
        return $ip;
    }
}
