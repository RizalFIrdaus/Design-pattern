<?php

namespace Rizal\DesignPattern\abstractfactory\Products\Intel;

class IntelHighEnd implements Intel
{
    public function result(): string
    {
        return "Intel High End";
    }
}
