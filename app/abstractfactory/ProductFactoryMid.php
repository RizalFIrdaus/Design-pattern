<?php

namespace Rizal\DesignPattern\abstractfactory;


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
}
