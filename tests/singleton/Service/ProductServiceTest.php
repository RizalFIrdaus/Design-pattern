<?php

namespace Rizal\DesignPattern\singleton\Service;

use PHPUnit\Framework\TestCase;
use Rizal\DesignPattern\singleton\Connection\Database;
use Rizal\DesignPattern\singleton\Repository\ProductRepository;

class ProductServiceTest extends TestCase
{
    private ProductRepository $productRepository;
    private ProductService $productService;

    public function setUp(): void
    {
        $this->productRepository = new ProductRepository(Database::getConnection());
        $this->productService = new ProductService($this->productRepository);
        $this->productRepository->deleteAll();
    }

    public function testCreate()
    {
        $response = $this->productService->create();
        self::assertNotNull($response);
    }
}
