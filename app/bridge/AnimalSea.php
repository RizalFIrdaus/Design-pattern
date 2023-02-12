<?php

namespace Rizal\DesignPattern\bridge;

abstract class AnimalSea implements Animal
{

    public function getSeaHabit(): bool
    {
        return true;
    }

    public function getEarthHabit(): bool
    {
        return false;
    }
}