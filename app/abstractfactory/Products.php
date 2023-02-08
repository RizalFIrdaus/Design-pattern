<?php

namespace Rizal\DesignPattern\abstractfactory;

use Rizal\DesignPattern\abstractfactory\Factory\ProductFactory;

class Products
{
    public function __construct(private ProductFactory $productFactory)
    {
    }

    public function getFactory(): ProductFactory
    {
        return $this->productFactory;
    }
}
