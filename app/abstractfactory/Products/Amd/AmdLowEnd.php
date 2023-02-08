<?php

namespace Rizal\DesignPattern\abstractfactory\Products\Amd;

class AmdLowEnd implements Amd
{
    public function result(): string
    {
        return "Amd Low End";
    }
}
