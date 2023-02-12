<?php

namespace Rizal\DesignPattern\bridge;

class Koi extends AnimalSea
{
    public function getName(): string
    {
        return "Koi";
    }

    public function getBreath(): string
    {
        return "Insang";
    }
}

