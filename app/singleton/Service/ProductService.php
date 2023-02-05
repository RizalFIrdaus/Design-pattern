<?php

namespace Rizal\DesignPattern\singleton\Service;

use Rizal\DesignPattern\singleton\Repository\ProductRepository;
use Rizal\DesignPattern\singleton\Domain\Product;

class ProductService
{

    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function create(): Product
    {
        $product = new Product();
        $product->id = "indomie";
        $product->name = "Indomie Goreng";
        $product->category = "Makanan Instan";
        $product->price = 3500;
        return $this->productRepository->save($product);
    }
}
