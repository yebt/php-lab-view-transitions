<?php

use App\Core\Product\Infrastructure\MemoryProductRepository;

$repository = new MemoryProductRepository();
$productsToRender = $repository->findAll();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>VT3 - Products</title>
        <!-- favicon -->
        <link rel="icon" type="image/png" href="/favicon.png" />
        <!-- js -->
        <script src="/assets/js/script.js"></script>
        <!-- css -->
        <link rel="stylesheet" href="/assets/css/styles.css" />
    </head>

    <body class="bg-gray-100 p-6 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Product List</h1>
            <div
                class="grid grid-cols-1 xs:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6"
            >
                <?php foreach ($productsToRender as $product): ?>
                <!-- Product Card -->
                <a
                    id="product-<?= $product->id ?>"
                    href="/product/<?= $product->id ?>"
                    class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition-shadow group"
                >
                    <div class="w-full h-48 overflow-hidden">
                        <img
                            src="/assets/img/products/product<?= $product->id ?>.jpeg"
                            alt="Product Image"
                            class="w-full h-full transition-transform duration-75 ease-in-out object-cover group-hover:scale-110"
                        />
                    </div>
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-900">
                            <?= $product->name ?>
                        </h2>
                        <p class="text-sm text-gray-600 mb-2">
                            $<?= number_format($product->price, 2) ?>
                        </p>
                        <p class="text-sm text-gray-700">
                            <?= $product->description ?>
                        </p>
                    </div>
                </a>

                <?php endforeach; ?>
            </div>
        </div>
    </body>
</html>

