<?php

namespace Rizal\DesignPattern\abstractfactory;


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
