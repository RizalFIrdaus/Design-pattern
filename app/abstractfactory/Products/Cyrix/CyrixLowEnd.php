<?php

namespace Rizal\DesignPattern\abstractfactory\Products\Cyrix;

class CyrixLowEnd implements Cyrix
{
    public function result(): string
    {
        return "Cyrix Low End";
    }
}
