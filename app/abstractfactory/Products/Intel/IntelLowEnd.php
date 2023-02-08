<?php

namespace Rizal\DesignPattern\abstractfactory\Products\Intel;

class IntelLowEnd implements Intel
{
    public function result(): string
    {
        return "Intel Low End";
    }
}
