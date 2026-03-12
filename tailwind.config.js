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
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
                'libre-baskerville': ['Libre Baskerville', 'serif'],
            },
            colors: {
                saffron: {
                    DEFAULT: 'var(--color-saffron)',
                    deep: 'var(--color-saffron-deep)',
                    tint: 'var(--color-saffron-tint)',
                },
                'india-green': {
                    DEFAULT: 'var(--color-india-green)',
                    deep: 'var(--color-green-deep)',
                    tint: 'var(--color-green-tint)',
                },
                navy: {
                    DEFAULT: 'var(--color-ashoka-navy)',
                    deep: 'var(--color-navy-deep)',
                    tint: 'var(--color-navy-tint)',
                },
            },
        },
    },

    plugins: [forms],
};
