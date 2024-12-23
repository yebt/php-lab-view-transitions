# PHP LAB - View Transitions

This is a simple experiment to render a list of products and implement view
transitions between the product detail page and the product list page.

## Setup

Use Composer to install the dependencies and run the PHP built-in web server:

```bash
composer install
php -S localhost:8080 -t public
```

For changes in the CSS, you can use the `npm run dev` command to compile the
CSS and watch for changes, this project use [Tailwind CSS](https://tailwindcss.com/).

```bash
npm run dev
```

## View Transitions

The view transitions are implemented using the `pagereveal` and `pageswap`
events.
