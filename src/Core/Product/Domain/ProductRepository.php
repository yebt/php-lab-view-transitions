<?php

declare(strict_types=1);

namespace App\Core\Product\Domain;

interface ProductRepository
{
    /**
     * Save a product to the repository.
     *
     * @param Product $product
     * @return void
     */
    public function save(Product $product): void;

    /**
     * Find a product by its ID.
     *
     * @param string $id
     * @return Product|null
     */
    public function findById(string $id): ?Product;

    /**
     * Find all products.
     *
     * @return Product[]
     */
    public function findAll(): array;

    /**
     * Update an existing product.
     *
     * @param Product $product
     * @return void
     */
    public function update(Product $product): void;

    /**
     * Delete a product by its ID.
     *
     * @param string $id
     * @return void
     */
    public function delete(string $id): void;
}
