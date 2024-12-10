/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./**/*.{html,js,php}"],
    theme: {
        extend: {
            screens: {
                xs: "480px",
            },
        },
    },
    plugins: [],
};
