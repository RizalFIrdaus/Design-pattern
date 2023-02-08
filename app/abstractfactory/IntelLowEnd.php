<?php

namespace Rizal\DesignPattern\abstractfactory;

class IntelLowEnd implements Intel
{
    public function result(): string
    {
        return "Intel Low End";
    }
}
