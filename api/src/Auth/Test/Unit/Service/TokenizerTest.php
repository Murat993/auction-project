<?php

declare(strict_types=1);

namespace App\Auth\Test\Unit\Service;


use App\Auth\Service\Tokenizer;
use DateInterval;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Auth\Service\Tokenizer
 */
class TokenizerTest extends TestCase
{
    public function testSuccess(): void
    {
        $interval = new DateInterval('PT1H');
        $date = new \DateTimeImmutable();

        $tokenizer = new Tokenizer($interval);

        $token = $tokenizer->generate($date);

        self::assertEquals($date->add($interval), $token->getExpires());
    }
}