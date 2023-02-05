<?php

namespace Rizal\DesignPattern\singleton\Repository;

use Rizal\DesignPattern\singleton\Connection\Database;
use Rizal\DesignPattern\singleton\Domain\Product;

class ProductRepository
{
    private \PDO $connnection;

    public function __construct()
    {
        $this->connnection = Database::getConnection();
    }

    public function save(Product $product = null): ?Product
    {
        if ($product == null) return null;
        $statement = $this->connnection->prepare("INSERT (id,name,category,price) INTO products VALUE (?,?,?,?)");
        $statement->execute([$product->id, $product->name, $product->category, $product->price]);
        return $product;
    }
}
