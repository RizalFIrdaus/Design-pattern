<?php

namespace Rizal\DesignPattern\builder;

use PHPUnit\Framework\TestCase;

class HouseBuilderTest extends TestCase
{

    public function testHouseBuild()
    {
        $house1 = (new HouseBuilder())
            ->setWindows(2)
            ->setGerage(true)
            ->setRooms(2)
            ->setDoors(1)
            ->build();
        $house2 = (new HouseBuilder())
            ->setDoors(2)
            ->setWindows(4)
            ->setRooms(1)
            ->build();
        $house3 = (new HouseBuilder())
            ->setDoors(1)
            ->build();
        $house4 = (new HouseBuilder())->build();
        self::assertNotNull($house1);
        self::assertNotNull($house2);
        self::assertNotNull($house3);
        self::assertNotNull($house4);
    }
}
