<?php

namespace Rizal\DesignPattern\abstractfactory\Products\Amd;

class AmdMidEnd implements Amd
{
    public function result(): string
    {
        return "Amd Mid End";
    }
}
