const isProductPage = (url) => url.pathname.startsWith('/product/');
const isProductsListPage = (url) => url.pathname === '/products/';
const extractProductIdFromUrl = (url) => url.pathname.split('/')[2];

// OLD PAGE LOGIC
window.addEventListener('pageswap', async (e) => {
  if (e.viewTransition) {
    const targetUrl = new URL(e.activation.entry.url);

    // Navigating to a profile page
    if (isProductPage(targetUrl)) {
      const profile = extractProductIdFromUrl(targetUrl);

      // Set view-transition-name values on the clicked row
      // document.querySelector(`#product-${profile} span`).style.viewTransitionName = 'name';
      document.querySelector(`#product-${profile} img`).style.viewTransitionName = 'avatar';

      // Remove view-transition-names after snapshots have been taken
      // (this to deal with BFCache)
      await e.viewTransition.finished;
      document.querySelector(`#product-${profile} img`).style.viewTransitionName = 'none';
    }
  }
});


// NEW PAGE LOGIC
window.addEventListener('pagereveal', async (e) => {
  if (e.viewTransition) {
    const fromURL = new URL(navigation.activation.from.url);
    const currentURL = new URL(navigation.activation.entry.url);

    // Navigating from a profile page back to the homepage
    if (isProductPage(fromURL) && isProductsListPage(currentURL)) {
      const profile = extractProductIdFromUrl(fromURL);

      // Set view-transition-name values on the elements in the list
      // document.querySelector(`#${profile} span`).style.viewTransitionName = 'name';
      document.querySelector(`#product-${profile} img`).style.viewTransitionName = 'avatar';

      // Remove names after snapshots have been taken
      // so that we're ready for the next navigation
      await e.viewTransition.ready;
      // document.querySelector(`#${profile} span`).style.viewTransitionName = 'none';
      document.querySelector(`#product-${profile} img`).style.viewTransitionName = 'none';
    }
  }
});

