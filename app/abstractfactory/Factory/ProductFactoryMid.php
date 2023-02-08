<?php

namespace Rizal\DesignPattern\abstractfactory\Factory;

use Rizal\DesignPattern\abstractfactory\Products\Amd\Amd;
use Rizal\DesignPattern\abstractfactory\Products\Intel\Intel;
use Rizal\DesignPattern\abstractfactory\Products\Amd\AmdMidEnd;
use Rizal\DesignPattern\abstractfactory\Products\Cyrix\Cyrix;
use Rizal\DesignPattern\abstractfactory\Products\Cyrix\CyrixMidEnd;
use Rizal\DesignPattern\abstractfactory\Products\Intel\IntelMidEnd;

class ProductFactoryMid implements ProductFactory
{
    public function createAmdProduct(): Amd
    {
        return new AmdMidEnd();
    }
    public function createIntelProduct(): Intel
    {
        return new IntelMidEnd();
    }
    public function createCyrixProduct(): Cyrix
    {
        return new CyrixMidEnd();
    }
}
