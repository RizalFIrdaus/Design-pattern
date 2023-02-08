<?php

namespace Rizal\DesignPattern\abstractfactory;

class IntelHighEnd implements Intel
{
    public function result(): string
    {
        return "Intel High End";
    }
}
