import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    corePlugins: {
        // Bootstrap (frontend template) defines `.collapse` as `display:none`.
        // Tailwind's `visibility` core plugin emits `.collapse { visibility:collapse }`
        // which conflicts and makes the Bootstrap navbar-collapse invisible.
        // These utilities are not used anywhere in this project, so disable them.
        visibility: false,
    },

    plugins: [forms],
};
