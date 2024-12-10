<?php

use App\Core\Product\Infrastructure\MemoryProductRepository;

$productId  = $id;
$repository = new MemoryProductRepository();
$product    = $repository->findById($productId);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>VT3 - Product - <?=$product->name?></title>
        <!-- favicon -->
        <link rel="icon" type="image/png" href="/favicon.png" />
        <!-- js -->
        <script src="/assets/js/script.js"></script>
        <!-- css -->
        <link rel="stylesheet" href="/assets/css/styles.css" />

        <script>
            // NEW PAGE LOGIC
            window.addEventListener("pagereveal", async (e) => {
                if (e.viewTransition) {
                    const fromURL = new URL(navigation.activation.from.url);
                    const currentURL = new URL(navigation.activation.entry.url);

                    // Navigating from a profile page back to the homepage
                    if (
                        isProductPage(fromURL) &&
                        isProductsListPage(currentURL)
                    ) {
                        const profile = extractProductIdFromUrl(fromURL);

                        // Set view-transition-name values on the elements in the list
                        // document.querySelector(`#${profile} span`).style.viewTransitionName = 'name';
                        document.querySelector(
                            `#product-${profile} img`,
                        ).style.viewTransitionName = "avatar";

                        // Remove names after snapshots have been taken
                        // so that we're ready for the next navigation
                        await e.viewTransition.ready;
                        // document.querySelector(`#${profile} span`).style.viewTransitionName = 'none';
                        document.querySelector(
                            `#product-${profile} img`,
                        ).style.viewTransitionName = "none";
                    }
                }
            });
        </script>
    </head>

    <body
        class="min-h-screen bg-gray-100 flex flex-col items-center justify-center p-8 font-mono relative"
    >
        <div class="absolute top-1 left-1">
            <a
                href="/products/"
                class="text-2xl font-bold text-black hover:text-gray-800"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="lucide lucide-arrow-left h-6 w-6"
                >
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                Back to Home
            </a>
        </div>
        <!---->
        <div
            id="product-<?=$product->id?>"
            class="max-w-4xl mx-auto p-4 bg-white rounded-lg shadow-lg"
        >
            <div class="grid md:grid-cols-2 gap-8">
                <div class="relative aspect-square">
                    <img
                        alt="Product Image"
                        loading="lazy"
                        decoding="async"
                        data-nimg="fill"
                        class="rounded-lg absolute inset-0 object-cover w-full h-full text-transparent"
                        src="/assets/img/products/<?=$product->images[0]?>"
                    />
                </div>
                <div class="flex flex-col justify-between">
                    <div>
                        <h1 class="text-3xl font-bold mb-2">
                            <?=$product->name?>
                        </h1>
                        <p class="text-2xl font-semibold mb-4">
                            $ <?=number_format($product->price, 2)?>
                        </p>
                        <p class="text-gray-600 mb-6">
                            <?=$product->description?>
                        </p>
                    </div>
                    <button
                        class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-black text-slate-50 hover:bg-black/90 h-10 px-4 py-2 w-full md:w-auto"
                    >
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>

        <!---->
    </body>
</html>

