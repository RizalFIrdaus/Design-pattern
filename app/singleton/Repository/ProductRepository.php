<?php

namespace Rizal\DesignPattern\singleton\Repository;

use Rizal\DesignPattern\singleton\Connection\Database;
use Rizal\DesignPattern\singleton\Domain\Product;

class ProductRepository
{
    private \PDO $connnection;

    public function __construct(\PDO $connection)
    {
        $this->connnection = $connection;
    }

    public function save(Product $product = null): ?Product
    {
        if ($product == null) return null;
        $statement = $this->connnection->prepare("INSERT INTO products (id,name,category,price)  VALUE (?,?,?,?)");
        $statement->execute([$product->id, $product->name, $product->category, $product->price]);
        return $product;
    }

    public function deleteAll(): bool
    {
        $this->connnection->exec("DELETE FROM products");
        return true;
    }
}
