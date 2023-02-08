<?php

namespace Rizal\DesignPattern\abstractfactory;

class AmdLowEnd implements Amd
{
    public function result(): string
    {
        return "Amd Low End";
    }
}
