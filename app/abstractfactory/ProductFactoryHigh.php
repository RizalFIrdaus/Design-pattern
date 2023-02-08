<?php

namespace Rizal\DesignPattern\abstractfactory;

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
}
