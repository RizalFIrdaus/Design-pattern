<?php

namespace Rizal\DesignPattern\abstractfactory;

class IntelMidEnd implements Intel
{
    public function result(): string
    {
        return "Intel Mid End";
    }
}
