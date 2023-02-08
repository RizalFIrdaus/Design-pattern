<?php

namespace Rizal\DesignPattern\abstractfactory\Factory;

use Rizal\DesignPattern\abstractfactory\Products\Amd\AmdLowEnd;
use Rizal\DesignPattern\abstractfactory\Products\Intel\IntelLowEnd;
use Rizal\DesignPattern\abstractfactory\Products\Amd\Amd;
use Rizal\DesignPattern\abstractfactory\Products\Intel\Intel;

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
