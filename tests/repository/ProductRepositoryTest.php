<?php

namespace Rizal\DesignPattern\repository;

use PHPUnit\Framework\TestCase;
use Rizal\DesignPattern\singleton\Connection\Database;

class ProductRepositoryTest extends TestCase
{
    private ProductRepository $productRepository;
    private Product $product;
    public function setUp(): void
    {
        $this->productRepository = new ProductRepository(Database::getConnection());
        $this->productRepository->deleteAll();
        $this->product = new Product();
        $this->product->setId(uniqid());
        $this->product->setName("Coca Cola");
        $this->product->setCategory("Minuman");
        $this->product->setPrice(7500);
    }

    public function testSave()
    {
        $response = $this->productRepository->save($this->product);
        self::assertEquals($this->product->getId(), $response->getId());
        self::assertEquals($this->product->getName(), $response->getName());
        self::assertEquals($this->product->getCategory(), $response->getCategory());
        self::assertEquals($this->product->getPrice(), $response->getPrice());
    }

    public function testGetById()
    {
        $this->productRepository->save($this->product);
        $product = $this->productRepository->getById($this->product->getId());
        self::assertEquals($this->product->getId(), $product->getId());
    }

    public function testUpdate()
    {
        $this->productRepository->save($this->product);
        $product = $this->productRepository->getById($this->product->getId());
        self::assertEquals("7500", $product->getPrice());
        $product->setPrice(5000);
        self::assertEquals("5000", $product->getPrice());
        $response = $this->productRepository->update($product);
        self::assertEquals("5000", $response->getPrice());
        self::assertEquals("Coca Cola", $response->getName());
    }

    public function testGetAll()
    {
        $this->productRepository->save($this->product);
        $response = $this->productRepository->getAll();
        self::assertIsArray($response);
    }

    public function testDeleteById()
    {
        $response = $this->productRepository->save($this->product);
        self::assertNotNull($response);
        $delete = $this->productRepository->deleteById($response->getId());
        self::assertTrue($delete);
        $res = $this->productRepository->deleteById("WAD");
        self::assertFalse($res);
    }
}
