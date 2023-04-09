const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
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

    daisyui: {
        themes: [
            {
                mytheme: {
                    "primary": "#fcd1c4",

                    "secondary": "#990fbf",

                    "accent": "#5ce0b6",

                    "neutral": "#19151E",

                    "base-100": "#EFE9F1",

                    "info": "#3662E7",

                    "success": "#1D9571",

                    "warning": "#F0B375",

                    "error": "#FC6355",
                },
            },
            "dark",
            "winter",
        ]
    },

    plugins: [require('@tailwindcss/forms'), require('daisyui')],
};
