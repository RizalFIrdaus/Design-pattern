<?php

namespace Rizal\DesignPattern\singleton\Repository;

use PHPUnit\Framework\TestCase;
use Rizal\DesignPattern\singleton\Connection\Database;
use Rizal\DesignPattern\singleton\Domain\Product;

class ProductRepositoryTest extends TestCase
{
    private ProductRepository $productRepository;
    public function setUp(): void
    {
        $this->productRepository = new ProductRepository(Database::getConnection());
        $this->productRepository->deleteAll();
    }

    public function testSaveSuccess()
    {
        $product = new Product();
        $product->id = "Makanan";
        $product->name = "Indomie Goreng";
        $product->category = "Makanan Cepat Saji";
        $product->price = 3500;

        $response = $this->productRepository->save($product);
        self::assertNotNull($response);
        self::assertEquals($product->id, $response->id);
        self::assertEquals($product->name, $response->name);
        self::assertEquals($product->category, $response->category);
        self::assertEquals($product->price, $response->price);
    }
    public function testSaveFailed()
    {
        $response = $this->productRepository->save();
        self::assertNull($response);
    }

    public function testDeleteAll()
    {
        $response = $this->productRepository->deleteAll();
        self::assertTrue($response);
    }
}
