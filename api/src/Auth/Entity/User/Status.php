<?php

declare(strict_types=1);

namespace App\Auth\Entity\User;


class Status
{
    private const WAIT = 'wait';
    private const ACTIVE = 'active';

    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function wait(): self
    {
        return new self(self::WAIT);
    }

    public static function active(): self
    {
        return new self(self::ACTIVE);
    }

    public function isWait(): bool
    {
        return $this->name === Status::WAIT;
    }

    public function isActive(): bool
    {
        return $this->name === self::ACTIVE;
    }
}