<?php

namespace Rizal\DesignPattern\abstractfactory;

interface ProductFactory
{
    function createAmdProduct(): Amd;
    function createIntelProduct(): Intel;
}
