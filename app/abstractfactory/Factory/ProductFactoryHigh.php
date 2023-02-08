<?php

namespace Rizal\DesignPattern\abstractfactory\Factory;

use Rizal\DesignPattern\abstractfactory\Products\Amd\Amd;
use Rizal\DesignPattern\abstractfactory\Products\Intel\Intel;
use Rizal\DesignPattern\abstractfactory\Products\Amd\AmdHighEnd;
use Rizal\DesignPattern\abstractfactory\Products\Cyrix\Cyrix;
use Rizal\DesignPattern\abstractfactory\Products\Cyrix\CyrixHighEnd;
use Rizal\DesignPattern\abstractfactory\Products\Intel\IntelHighEnd;

class ProductFactoryHigh implements ProductFactory
{
    public function createAmdProduct(): Amd
    {
        return new AmdHighEnd();
    }
    public function createIntelProduct(): Intel
    {
        return new IntelHighEnd();
    }
    public function createCyrixProduct(): Cyrix
    {
        return new CyrixHighEnd();
    }
}
