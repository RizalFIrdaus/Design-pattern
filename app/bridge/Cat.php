<?php

namespace Rizal\DesignPattern\bridge;

class Cat extends AnimalEarth
{
    public function getName(): string
    {
        return "Cat";
    }
    public function getFeet(): int
    {
       return 4;
    }
}
