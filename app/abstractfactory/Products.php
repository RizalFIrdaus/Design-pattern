<?php

namespace Rizal\DesignPattern\abstractfactory;

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
