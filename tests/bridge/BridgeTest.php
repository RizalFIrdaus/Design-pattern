<?php

namespace Rizal\DesignPattern\bridge;

use PHPUnit\Framework\TestCase;

class BridgeTest extends TestCase
{
    public function testBridge()
    {
        $animal = [
            new Cat(),
            new Koi()
        ];

        foreach ($animal as $data) {
            if ($data instanceof AnimalEarth) {
                self::assertEquals("Cat Merupakan hewan darat", $data->getName() . " Merupakan hewan darat");
            } else if ($data instanceof AnimalSea) {
                self::assertEquals("Koi Merupakan hewan laut", $data->getName() . " Merupakan hewan laut");
            }
        }
    }
}
