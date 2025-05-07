import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
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
            colors: {
                status: {
                    pending: '#FFF3CD',   // Light yellow
                    confirmed: '#D4EDDA', // Light green
                    completed: '#D1ECF1', // Light blue
                    cancelled: '#F8D7DA', // Light red
                },
            },
        },
    },

    plugins: [forms],
};
