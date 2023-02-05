<?php

namespace Rizal\DesignPattern\singleton\Connection;

use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    public function testSingleton()
    {
        $connection1 = Database::getConnection();
        $connection2 = Database::getConnection();
        $connection3 = Database::getConnection();
        self::assertSame($connection1, $connection2);
        self::assertSame($connection3, $connection2);
        self::assertSame($connection1, $connection3);
    }
}
