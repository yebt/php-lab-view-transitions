<?php

declare(strict_types=1);

namespace App\Core\Product\Infrastructure;

use App\Core\Product\Domain\Product;
use App\Core\Product\Domain\ProductRepository;
use PDO;

class SQLiteProductRepository implements ProductRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Product $product): void
    {
        $query = "INSERT INTO products (id, name, description, price, images) VALUES (:id, :name, :description, :price, :images)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([
            ':id' => $product->id,
            ':name' => $product->name,
            ':description' => $product->description,
            ':price' => $product->price,
            ':images' => json_encode($product->images),
        ]);
    }

    public function findById(string $id): ?Product
    {
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([':id' => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }

        return Product::factory($row);
    }

    public function findAll(): array
    {
        $query = "SELECT * FROM products";
        $stmt = $this->connection->query($query);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map([Product::class, 'factory'], $rows);
    }

    public function update(Product $product): void
    {
        $query = "UPDATE products SET name = :name, description = :description, price = :price, images = :images WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([
            ':id' => $product->id,
            ':name' => $product->name,
            ':description' => $product->description,
            ':price' => $product->price,
            ':images' => json_encode($product->images),
        ]);
    }

    public function delete(string $id): void
    {
        $query = "DELETE FROM products WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([':id' => $id]);
    }

}
