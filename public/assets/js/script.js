const basePath = "/";

const productListPattern = new RegExp(`${basePath}products/`);
const isProductListPage = (url) => url.pathname.match(productListPattern);

const productDetailPattern = new RegExp(`${basePath}product/(\\d+)`);
const isProductDetailPage = (url) => url.pathname.match(productDetailPattern);

const extractProductIdFromUrl = (url) => {
    console.log(url);
    const match = url.pathname.match(productDetailPattern);
    return match[1];
};

const setTemporaryViewTransitionNames = async (entries, vtPromise) => {
    for (const [$el, name] of entries) {
        $el.style.viewTransitionName = name;
    }
    await vtPromise;
    for (const [$el] of entries) {
        $el.style.viewTransitionName = "";
    }
};

const vtProductName = 'pimage';

// When going to a detail page, set `product-image`  vt-names
// on the elements that link to that detail page
window.addEventListener('pageswap', async (e) => {
    if (e.viewTransition) {
        const currentUrl = e.activation.from?.url ? new URL(e.activation.from.url.replace('.html', '')) : null;
        const targetUrl = new URL(e.activation.entry.url.replace('.html', ''));


        // Going from product detail page to product list page
        // ~> The big img and title are the ones!
        if (isProductDetailPage(currentUrl) && isProductListPage(targetUrl)) {
            console.log("go to product list page");
                setTemporaryViewTransitionNames([
                    [document.querySelector(`#product-detail img`), vtProductName],
                ], e.viewTransition.finished);
        }

        // Going to product detail page from product list page
        if (isProductDetailPage(targetUrl)) {
            console.log("got to Product detail page");
            const productId = extractProductIdFromUrl(targetUrl);
            setTemporaryViewTransitionNames([
                [document.querySelector(`#product-${productId} img`), vtProductName]
            ], e.viewTransition.finished);
        }
    }
});

// When going from a detail page to the list page, set `product-image`  vt-names
// on the list item for the profile that was viewed on the detail page.
window.addEventListener('pagereveal', async (e) => {

    if (!navigation.activation.from) return;

    if (e.viewTransition) {
        const fromUrl = new URL(navigation.activation.from.url.replace('.html', ''));
        const currentUrl = new URL(navigation.activation.entry.url.replace('.html', ''));

        // Went from detail page to list page
        // ~> Set VT names on the relevant list item
        if (isProductDetailPage(fromUrl) && isProductListPage(currentUrl)) {
            console.log("enter from product detail page to product list page");
            const productId = extractProductIdFromUrl(fromUrl);

            setTemporaryViewTransitionNames([
                [document.querySelector(`#product-${productId} img`), vtProductName]
            ], e.viewTransition.ready);
        }

        // Went to detail page
        // ~> Set VT names on the main title and image
        if (isProductDetailPage(currentUrl)) {
            console.log("enter to product detail page");
            setTemporaryViewTransitionNames([
                [document.querySelector(`#product-detail img`), vtProductName],
            ], e.viewTransition.ready);
        }
    }
});

