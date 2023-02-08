<?php

namespace Rizal\DesignPattern\abstractfactory\Products\Amd;

class AmdHighEnd implements Amd
{
    public function result(): string
    {
        return "Amd High End";
    }
}
