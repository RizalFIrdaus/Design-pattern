<?php

namespace Rizal\DesignPattern\repository;


class ProductRepository
{
    public function __construct(private \PDO $conenction)
    {
    }

    public function getById(string $id): ?Product
    {
        $statement = $this->conenction->prepare("SELECT * FROM products WHERE id=?");
        $statement->execute([$id]);
        if ($row = $statement->fetch()) {
            $product = new Product();
            $product->setId($row["id"]);
            $product->setName($row["name"]);
            $product->setCategory($row["category"]);
            $product->setPrice($row["price"]);
            return $product;
        } else {
            return null;
        }
    }

    public function save(Product $product): Product
    {
        $statement = $this->conenction->prepare("INSERT INTO products (id,name,category,price) VALUE (?,?,?,?)");
        $statement->execute([$product->getId(), $product->getName(), $product->getCategory(), $product->getPrice()]);
        return $product;
    }
    public function update(Product $product): Product
    {
        $statement = $this->conenction->prepare("UPDATE products SET name=? , category=?, price=? WHERE id = ?");
        $statement->execute([$product->getName(), $product->getCategory(), $product->getPrice(), $product->getId()]);
        return $product;
    }

    public function deleteAll()
    {
        $this->conenction->exec("DELETE FROM products");
    }
    public function getAll(): ?array
    {
        $statement = $this->conenction->prepare("SELECT * FROM products");
        $statement->execute([]);
        if ($data = $statement->fetchAll()) {
            return $products[] = $data;
        } else {
            return null;
        }
    }
    public function deleteById(string $id): bool
    {
        if ($this->getById($id) != null) {
            $statement = $this->conenction->prepare("DELETE FROM products WHERE id=?");
            $statement->execute([$id]);
            return true;
        }
        return false;
    }
}
