const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: 'class', // or 'media' or 'class'
    theme: {
        extend: {
            fontFamily: {
              'inter': ['Inter'],
              'cinzel': ['Cinzel Decorative'],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
