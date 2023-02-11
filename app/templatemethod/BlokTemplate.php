<?php

namespace Rizal\DesignPattern\templatemethod;

abstract class BlokTemplate
{
    public final function start()
    {
        echo $this->getStartTitle() . PHP_EOL;
        for ($i = 1; $i < $this->getHeight(); $i++) {
            for ($j = 1; $j < $this->getWidth(); $j++) {
                echo $this->getSymbol();
            }
            echo PHP_EOL;
        }
        echo $this->getEndTitle() . PHP_EOL;
    }
    public abstract function getWidth(): int;
    public abstract function getHeight(): int;
    public abstract function getSymbol(): string;
    public abstract function getStartTitle(): string;
    public abstract function getEndTitle(): string;
}
