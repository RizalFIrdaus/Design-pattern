<?php

namespace Rizal\DesignPattern\bridge;

abstract class AnimalEarth implements Animal
{

    public function getSeaHabit(): bool
    {
        return false;
    }

    public function getEarthHabit(): bool
    {
        return true;
    }
    public abstract function getFeet():int;


}