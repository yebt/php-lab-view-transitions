<?php

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
        "description" => "There some features that make this product unique.",
    ],
    [
        "name" => "Product 5",
        "price" => 59.99,
        "description" =>
        "This is a brief description of the product to showcase its features and benefits.",
    ],
]; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>VT3 - Products</title>
        <!-- favicon -->
        <link rel="icon" type="image/png" href="/favicon.png">
        <!-- js -->
        <script src="./assets/js/script.js"></script>
        <!-- css -->
        <link rel="stylesheet" href="./assets/css/styles.css">
    </head>

    <body class="bg-gray-100 p-6 min-h-screen">

        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Product List</h1>
            <div class="grid grid-cols-1 xs:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">

                <?php foreach ($productsToRender as $index => $product): ?>

                <!-- Product Card -->
                <a
                    href="/products/<?= $index +1 ?>"
                    class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition-shadow group">
                    <div class="w-full h-48 overflow-hidden">
                        <img
                            src="./assets/img/products/product<?= $index +1 ?>.jpeg"
                            alt="Product Image"
                            class="w-full h-full transition-transform duration-75 ease-in-out object-cover group-hover:scale-110">
                    </div>
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-900">
                            <?=$product['name']?>
                        </h2>
                        <p class="text-sm text-gray-600 mb-2">
                            $<?= $product['price'] ?>
                        </p>
                        <p class="text-sm text-gray-700">
                            <?= $product['description'] ?>
                        </p>
                    </div>
                </a>

                <?php endforeach; ?>

            </div>
        </div>
    </body>
</html>


