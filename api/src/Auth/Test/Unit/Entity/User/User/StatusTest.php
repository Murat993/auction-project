<?php

declare(strict_types=1);

namespace App\Auth\Test\Unit\Entity\User;


use App\Auth\Entity\User\Status;
use PHPUnit\Framework\TestCase;

/**
 * @covers Status
 */
class StatusTest extends TestCase
{
    public function testActive(): void
    {
        $status = Status::active();

        $this->assertTrue($status->isActive());
        $this->assertFalse($status->isWait());
    }

    public function testWait(): void
    {
        $status = Status::wait();

        $this->assertFalse($status->isActive());
        $this->assertTrue($status->isWait());
    }
}