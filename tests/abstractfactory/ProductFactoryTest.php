<?php

namespace Rizal\DesignPattern\abstractfactory;

use PHPUnit\Framework\TestCase;


class ProductFactoryTest extends TestCase
{
    public function testFactory()
    {
        $lowSpec = new Products(new ProductFactoryLow());
        $midSpec = new Products(new ProductFactoryMid());
        $highSpec = new Products(new ProductFactoryHigh());
        self::assertEquals("Amd Low End", $lowSpec->getFactory()->createAmdProduct()->result());
        self::assertEquals("Intel Mid End", $midSpec->getFactory()->createIntelProduct()->result());
        self::assertEquals("Intel High End", $highSpec->getFactory()->createIntelProduct()->result());
        self::assertEquals("Amd Mid End", $midSpec->getFactory()->createAmdProduct()->result());
    }
}
