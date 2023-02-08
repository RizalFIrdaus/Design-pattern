<?php

namespace Rizal\DesignPattern\abstractfactory\Products\Intel;

class IntelMidEnd implements Intel
{
    public function result(): string
    {
        return "Intel Mid End";
    }
}
