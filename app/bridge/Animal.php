<?php

namespace Rizal\DesignPattern\bridge;

interface Animal
{
    public function getName():string;
    public function getSeaHabit():bool;
    public function getEarthHabit():bool;

}