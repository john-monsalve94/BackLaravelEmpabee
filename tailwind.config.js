// tailwind.config.js

const defaultTheme = require('tailwindcss/defaultTheme'); // Importa el tema por defecto de Tailwind

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'), // Agrega el plugin de forms
    ],
};
