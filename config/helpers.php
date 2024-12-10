<?php

/**
 * Helpers
 *
 * This file contains all the helpers you need to use in your application.
 */

function getMemProducts(): array
{
    $productsToRender = [
        [
            "name" => "Product 1",
            "price" => 19.99,
            "description" =>
                "This is a brief description of the product to showcase its features and benefits.",
        ],
        [
            "name" => "Product 2",
            "price" => 29.99,
            "description" =>
                "Description of this amazing product that users will love.",
        ],
        [
            "name" => "Product 3",
            "price" => 39.99,
            "description" => "The best product ever created.",
        ],
        [
            "name" => "Product 4",
            "price" => 49.99,
            "description" =>
                "There some features that make this product unique.",
        ],
        [
            "name" => "Product 5",
            "price" => 59.99,
            "description" =>
                "This is a brief description of the product to showcase its features and benefits.",
        ],
    ];
    return $productsToRender;
}
