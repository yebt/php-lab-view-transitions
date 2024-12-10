<?php

declare(strict_types=1);

namespace App\Core\Product\Infrastructure;

use App\Core\Product\Domain\Product;
use App\Core\Product\Domain\ProductRepository;

class MemoryProductRepository implements ProductRepository
{
    private array $products = [
        [
            "id" => 1,
            "name" => "Dru Jacket in Wool and Silk",
            "description" =>
                "Single breasted tailored luxury jacket in structured wool and silk with peak lapels and jetted front pockets.",
            "price" => "1625",
            "images" => ["product1.jpeg"],
        ],
        [
            "id" => 2,
            "name" => "Pants in Wool and Silk",
            "description" =>
                "A pair of pants in structured wool and silk with peak lapels and jetted front pockets.",
            "price" => "1250",
            "images" => ["product2.jpeg"],
        ],
        [
            "id" => 3,
            "name" => "T-Shirt in Wool and Silk",
            "description" =>
                "A t-shirt in structured wool and silk with peak lapels and jetted front pockets.",
            "price" => "1250",
            "images" => ["product3.jpeg"],
        ],
        [
            "id" => 4,
            "name" => "Shorts in Wool and Silk",
            "description" =>
                "A pair of shorts in structured wool and silk with peak lapels and jetted front pockets.",
            "price" => "1250",
            "images" => ["product4.jpeg"],
        ],
        [
            "id" => 5,
            "name" => "Sweater in Wool and Silk",
            "description" =>
                "A sweater in structured wool and silk with peak lapels and jetted front pockets.",
            "price" => "1250",
            "images" => ["product5.jpeg"],
        ],
        [
            "id" => 6,
            "name" => "Cashmere dress",
            "description" =>
                "A casual dress with a fitted bodice and a skirt in a neutral color.",
            "price" => "2344",
            "images" => ["product6.jpeg"],
        ],
    ];

    /**
     * Guarda un producto en el repositorio en memoria.
     *
     * @param Product $product
     * @return void
     */
    public function save(Product $product): void
    {
        $this->products[$product->id] = $product;
    }

    /**
     * Encuentra un producto por su ID.
     *
     * @param string $id
     * @return Product|null
     */
    public function findById(string $id): ?Product
    {
        $filteredProduct = array_filter(
            $this->products,
            fn($product) => $product["id"] . "" == $id
        );
        if (!$filteredProduct) {
            return null;
        }
        $productToReturn = array_values($filteredProduct)[0];
        return Product::factory($productToReturn);
    }

    /**
     * Encuentra todos los productos en el repositorio en memoria.
     *
     * @return Product[]
     */
    public function findAll(): array
    {
        // return array_values($this->products);
        return array_map(function ($product) {
            return Product::factory($product);
        }, $this->products);
    }

    /**
     * Actualiza un producto en el repositorio en memoria.
     *
     * @param Product $product
     * @return void
     */
    public function update(Product $product): void
    {
        if (isset($this->products[$product->id])) {
            $this->products[$product->id] = $product;
        }
    }

    /**
     * Elimina un producto por su ID.
     *
     * @param string $id
     * @return void
     */
    public function delete(string $id): void
    {
        unset($this->products[$id]);
    }

    public function findByIndex(int $index): ?Product
    {
        $productToReturn =
            array_filter(
                $this->products,
                fn($product) => $product["id"] == $index
            )[0] ?? null;
        // $productToReturn = $this->products[$id] ?? null;

        if (!$productToReturn) {
            return null;
        }
        return Product::factory($productToReturn);
    }
}
