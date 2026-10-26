<?php
declare(strict_types=1);

namespace Lanternis\Prelancement;

/**
 * Validation et normalisation du formulaire (validation.md § 7.1 ; autodiagnostic.md § 5).
 * Renvoie ['ok' => true, 'donnees' => [...]] ou ['ok' => false, 'code' => 'email'|'champs'].
 * Tout champ inattendu est ignoré ; toute valeur non chaîne est refusée.
 */
final class Formulaire
{
    public const TYPES = ['entreprise', 'ess'];
    public const EFFECTIFS = ['moins-20', '20-49', '50-99', '100-249', '250-plus'];
    public const DOULEURS = ['depart-referent', 'couts', 'renouvellements', 'acces', 'rendre-compte', 'autre'];
    public const VARIANTES = ['a', 'b', 'ess'];
    public const PUBLICS = ['pme', 'ess'];
    /** Paliers de la grille D (validation.md v2 § 7.1). */
    public const PALIERS = ['essentiel', 'pilotage', 'pilotage-plus', 'ne-sait-pas'];
    public const SOURCES = ['reseau', 'prospection', 'ess-relais', 'webinaire', 'autodiag', 'blog', 'facebook', 'confirmation', 'direct'];

    /** Messageries grand public : acceptées mais marquées (validation.md § 7.1). */
    public const DOMAINES_GENERIQUES = [
        'gmail.com', 'googlemail.com', 'orange.fr', 'wanadoo.fr', 'free.fr', 'laposte.net', 'sfr.fr',
        'neuf.fr', 'bbox.fr', 'numericable.fr', 'aliceadsl.fr', 'club-internet.fr', 'icloud.com', 'me.com',
        'mac.com', 'aol.com', 'aol.fr', 'msn.com', 'proton.me', 'protonmail.com', 'gmx.fr', 'gmx.com',
        'gmx.net', 'yandex.com', 'mail.com', 'zoho.com', 'tutanota.com',
    ];
    /** Premiers libellés de domaine génériques quel que soit le suffixe (hotmail.fr, outlook.com…). */
    public const PREFIXES_GENERIQUES = ['hotmail', 'outlook', 'live', 'yahoo', 'ymail'];

    /** Lecture d'un champ : chaîne ou null si absent ; false si type invalide ou UTF-8 invalide. */
    private static function lire(array $post, string $cle): string|null|false
    {
        if (!array_key_exists($cle, $post)) {
            return null;
        }
        $v = $post[$cle];
        if (!is_string($v) || strlen($v) > 2000 || preg_match('//u', $v) !== 1) {
            return false;
        }
        return $v;
    }

    /** Texte libre : balises retirées, caractères de contrôle et de direction neutralisés, espaces réduits. */
    public static function nettoyerTexte(string $v): string
    {
        $v = strip_tags($v);
        $v = preg_replace('/[\x{0000}-\x{001F}\x{007F}-\x{009F}\x{00AD}\x{200B}-\x{200F}\x{202A}-\x{202E}\x{2060}-\x{2064}\x{2066}-\x{2069}\x{FEFF}]/u', ' ', $v) ?? '';
        $v = preg_replace('/\s+/u', ' ', $v) ?? '';
        return trim($v);
    }

    public static function longueur(string $v): int
    {
        return (int) preg_match_all('/./su', $v);
    }

    public static function emailGenerique(string $email): bool
    {
        $domaine = substr($email, (int) strrpos($email, '@') + 1);
        if (in_array($domaine, self::DOMAINES_GENERIQUES, true)) {
            return true;
        }
        $premier = explode('.', $domaine)[0];
        return in_array($premier, self::PREFIXES_GENERIQUES, true);
    }

    public static function valider(array $post): array
    {
        // Palier : facultatif ; absent, non chaîne ou hors liste -> null, sans rejeter le formulaire.
        $palier = $post['palier'] ?? null;
        $palier = is_string($palier) && in_array($palier, self::PALIERS, true) ? $palier : null;

        $champs = [];
        foreach (['email', 'structure', 'type', 'effectif', 'douleur', 'douleur_autre', 'nouvelles', 'echange', 'essai',
                     'variante', 'public', 'source', 'joindre_resultat', 'score', 'profil', 'reponses'] as $cle) {
            $v = self::lire($post, $cle);
            if ($v === false) {
                return ['ok' => false, 'code' => 'champs'];
            }
            $champs[$cle] = $v;
        }

        // Email : espaces retirés, minuscules, ≤ 254 caractères, syntaxe valide, domaine avec un point.
        $email = strtolower(preg_replace('/\s+/u', '', (string) $champs['email']) ?? '');
        if ($email === '') {
            return ['ok' => false, 'code' => 'champs'];
        }
        if (strlen($email) > 254 || filter_var($email, FILTER_VALIDATE_EMAIL) === false
            || !str_contains(substr($email, (int) strrpos($email, '@') + 1), '.')) {
            return ['ok' => false, 'code' => 'email'];
        }

        $structure = self::nettoyerTexte((string) $champs['structure']);
        $n = self::longueur($structure);
        if ($n < 2 || $n > 120) {
            return ['ok' => false, 'code' => 'champs'];
        }
        $type = (string) $champs['type'];
        $effectif = (string) $champs['effectif'];
        $douleur = (string) $champs['douleur'];
        if (!in_array($type, self::TYPES, true) || !in_array($effectif, self::EFFECTIFS, true)
            || !in_array($douleur, self::DOULEURS, true)) {
            return ['ok' => false, 'code' => 'champs'];
        }
        $douleurAutre = null;
        if ($douleur === 'autre' && $champs['douleur_autre'] !== null) {
            $douleurAutre = self::nettoyerTexte($champs['douleur_autre']);
            if (self::longueur($douleurAutre) > 200) {
                return ['ok' => false, 'code' => 'champs'];
            }
            if ($douleurAutre === '') {
                $douleurAutre = null;
            }
        }

        // Cases à cocher : « oui » ou absentes ; toute autre valeur est refusée.
        $cases = [];
        foreach (['nouvelles', 'echange', 'essai', 'joindre_resultat'] as $cle) {
            $v = $champs[$cle];
            if ($v !== null && $v !== '' && $v !== 'oui') {
                return ['ok' => false, 'code' => 'champs'];
            }
            $cases[$cle] = $v === 'oui';
        }

        // Champs techniques : valeurs inconnues ramenées à la valeur par défaut.
        $variante = in_array($champs['variante'], self::VARIANTES, true) ? $champs['variante'] : 'a';
        $public = in_array($champs['public'], self::PUBLICS, true) ? $champs['public'] : 'pme';
        $source = strtolower(trim((string) $champs['source']));
        if ($source === '') {
            $source = 'direct';
        } elseif (preg_match('/^[a-z0-9-]{1,30}$/', $source) !== 1 || !in_array($source, self::SOURCES, true)) {
            $source = 'autre';
        }

        // Résultat de l'autodiagnostic : seulement si la case « Joindre mon résultat » est cochée,
        // et cohérent (10 réponses de 0 à 3, score = somme, profil = celui du score).
        $score = $profil = $reponses = null;
        if ($cases['joindre_resultat']) {
            $reponses = (string) $champs['reponses'];
            $profil = (string) $champs['profil'];
            $scoreTxt = (string) $champs['score'];
            if (preg_match('/^[0-3]{10}$/', $reponses) !== 1 || preg_match('/^\d{1,2}$/', $scoreTxt) !== 1) {
                return ['ok' => false, 'code' => 'champs'];
            }
            $score = (int) $scoreTxt;
            if ($score !== Autodiag::score($reponses) || $profil !== Autodiag::profil($score)) {
                return ['ok' => false, 'code' => 'champs'];
            }
        }

        return ['ok' => true, 'donnees' => [
            'email' => $email,
            'email_generique' => self::emailGenerique($email) ? 1 : 0,
            'structure' => $structure,
            'type' => $type,
            'effectif' => $effectif,
            'douleur' => $douleur,
            'douleur_autre' => $douleurAutre,
            'nouvelles' => $cases['nouvelles'],
            'echange' => $cases['echange'],
            'palier' => $palier,
            'essai' => $cases['essai'],
            'variante' => $variante,
            'public' => $public,
            'source' => $source,
            'score' => $score,
            'profil' => $profil,
            'reponses' => $reponses,
        ]];
    }

    /** Tranches d'effectif du cœur de cible : 20 à 249 personnes. */
    public const EFFECTIFS_CIBLE = ['20-49', '50-99', '100-249'];

    /**
     * Inscrit qualifié, calculé à la confirmation : entreprise OU structure de l'ESS de 20 à 249 personnes
     * (cible élargie aux entreprises de 20 à 49 après la validation de la grille D ; avant : entreprises 50 à 249).
     */
    public static function qualifie(string $type, string $effectif): bool
    {
        return in_array($type, self::TYPES, true) && in_array($effectif, self::EFFECTIFS_CIBLE, true);
    }
}
