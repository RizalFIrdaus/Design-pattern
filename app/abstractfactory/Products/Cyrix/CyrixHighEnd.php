<?php

namespace Rizal\DesignPattern\abstractfactory\Products\Cyrix;

class CyrixHighEnd implements Cyrix
{
    public function result(): string
    {
        return "Cyrix High End";
    }
}
