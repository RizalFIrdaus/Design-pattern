<?php

namespace Rizal\DesignPattern\abstractfactory\Factory;

use Rizal\DesignPattern\abstractfactory\Products\Amd\Amd;
use Rizal\DesignPattern\abstractfactory\Products\Intel\Intel;

interface ProductFactory
{
    function createAmdProduct(): Amd;
    function createIntelProduct(): Intel;
}
