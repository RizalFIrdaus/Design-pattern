<?php


namespace Rizal\DesignPattern\templatemethod;


class Squere extends BlokTemplate
{
    public function getStartTitle(): string
    {
        return "Blok Game 1";
    }

    public function getWidth(): int
    {
        return 10;
    }
    public function getHeight(): int
    {
        return 5;
    }
    public function getSymbol(): string
    {
        return "O";
    }
    public function getEndTitle(): string
    {
        return "End Blok Game 1";
    }
}
