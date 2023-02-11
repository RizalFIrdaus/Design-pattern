<?php

namespace Rizal\DesignPattern\templatemethod;

use PHPUnit\Framework\TestCase;

class TemplateMethodTest extends TestCase
{
    public function testSquere()
    {
        $squere = new Squere();
        $squere->start();
        $this->expectOutputRegex("[Blok Game 1\r\nOOOOOOOOO\r\nOOOOOOOOO\r\nOOOOOOOOO\r\nOOOOOOOOO\r\nEnd Blok Game 1\r\n]");
    }
}
