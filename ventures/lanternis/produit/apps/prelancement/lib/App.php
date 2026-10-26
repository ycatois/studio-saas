<?php
declare(strict_types=1);

namespace Lanternis\Prelancement;

final class App
{
    /** @var \Closure():int */
    private \Closure $horloge;

    public function __construct(
        public readonly array $config,
        public readonly \PDO $db,
        public readonly Mailer $mailer,
        ?callable $horloge = null,
    ) {
        $this->horloge = $horloge !== null ? \Closure::fromCallable($horloge) : static fn(): int => time();
    }

    public static function depuisConfiguration(?array $config = null): self
    {
        $config ??= Config::charger();
        $mailer = $config['MAIL_MODE'] === 'mailjet'
            ? new MailerMailjet($config)
            : new MailerJournal((string) $config['MAIL_LOG_PATH']);
        return new self($config, Base::ouvrir((string) $config['DB_PATH']), $mailer);
    }

    public function maintenant(): int
    {
        return ($this->horloge)();
    }

    public function url(string $chemin): string
    {
        return $this->config['BASE_URL'] . '/' . ltrim($chemin, '/');
    }

    /** Jeton aléatoire de 32 octets (256 bits), en hexadécimal. */
    public static function jeton(): string
    {
        return bin2hex(random_bytes(32));
    }

    public static function jetonValide(mixed $jeton): bool
    {
        return is_string($jeton) && preg_match('/^[a-f0-9]{64}$/', $jeton) === 1;
    }

    public static function hacherJeton(string $jeton): string
    {
        return hash('sha256', $jeton);
    }
}
