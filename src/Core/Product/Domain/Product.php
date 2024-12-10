<?php

declare(strict_types=1);

namespace App\Core\Product\Domain;

class Product
{
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
        public string $price = "0",
        public array $images
    ) {
    }

    /**
     * Serialize the product to an array.
     *
     * @return array
     */
    public function serialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "price" => $this->price,
            "images" => $this->images,
        ];
    }

    /**
     * Create a new product from an array.
     *
     * @param array $data
     * @return Product
     */
    public static function factory(array $data): self
    {
        return new self(
            id: $data["id"],
            name: $data["name"],
            description: $data["description"],
            price: $data["price"],
            images: is_string($data["images"])
                ? json_decode($data["images"], true)
                : $data["images"]
        );
    }
}
