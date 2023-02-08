<?php

namespace Rizal\DesignPattern\adapter;

use PHPUnit\Framework\TestCase;

class AdapterTest extends TestCase
{
    public function testAdapter()
    {
        $CatalogBook = new BookCatalogAdapter(new Book("Rizal", "Design Pattern", 224));
        $CatalogScreencase = new ScreencaseCatalogAdapter(new Screencase("Esan", "Tutorial Laravel Framework", 12));
        self::assertEquals("Design Pattern Covered by 224 Pages", $CatalogBook->getCatalogTitle());
        self::assertEquals("Tutorial Laravel Framework Set Duration by 12 Hours", $CatalogScreencase->getCatalogTitle());
    }
}
