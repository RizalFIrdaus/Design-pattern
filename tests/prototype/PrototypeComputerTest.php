<?php

namespace Rizal\DesignPattern\prototype;

use PHPUnit\Framework\TestCase;

class PrototypeComputerTest extends TestCase
{
    public function testPrototype()
    {
        $intel = new Computer("144Hz", "Intel Core I5-12001", "GT 1630", 8, "SSD");
        $amd = new Computer("144Hz", "AMD Ryzen 5", "Vega 8", 8, "SSD");

        $pcIntelLowEnd = $intel->clone();
        $pcIntelLowEnd->setVga("Intel UHD Gen 12");
        $pcIntelLowEnd->setRam(4);
        $pcIntelHighEnd = $intel->clone();
        $pcIntelHighEnd->setProcessor("Intel Core I9-8099");
        $pcAmdHighEnd = $amd->clone();
        $pcAmdHighEnd->setProcessor("AMD Ryzern 9");
        $pcAmdHighEnd->setVga("Vega 9 ");

        self::assertEquals($intel->getMonitor(), $pcIntelHighEnd->getMonitor());
        self::assertNotEquals($amd->getProcessor(), $pcAmdHighEnd->getProcessor());
    }
}
