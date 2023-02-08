<?php

namespace Rizal\DesignPattern\abstractfactory;

use Rizal\DesignPattern\abstractfactory\Amd;

class ProductFactoryLow implements ProductFactory
{
    public function createAmdProduct(): Amd
    {
        return new AmdLowEnd();
    }
    public function createIntelProduct(): Intel
    {
        return new IntelLowEnd();
    }
}
