<?php

namespace Rizal\DesignPattern\abstractfactory\Products\Cyrix;

class CyrixMidEnd implements Cyrix
{
    public function result(): string
    {
        return "Cyrix Mid End";
    }
}
