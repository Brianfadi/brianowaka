import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // Enable dark mode with class strategy
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    safelist: [
        // Dynamic gradient classes used in hero offer feature grid
        { pattern: /^from-(blue|green|purple|orange|pink|red|yellow|teal|cyan|indigo|emerald|violet|rose|sky|lime|amber|fuchsia|slate|gray)-(400|500|600)$/ },
        { pattern: /^to-(blue|green|purple|orange|pink|red|yellow|teal|cyan|indigo|emerald|violet|rose|sky|lime|amber|fuchsia|slate|gray)-(400|500|600)$/ },
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Custom dark mode colors
                'dark-primary': '#0f172a',      // slate-900
                'dark-secondary': '#1e1b4b',    // indigo-950
                'dark-accent': '#312e81',       // indigo-900
                'dark-surface': '#1e293b',      // slate-800
                'dark-border': '#4338ca',       // indigo-700
            },
            backgroundImage: {
                'dark-gradient': 'linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #1e293b 100%)',
                'dark-gradient-radial': 'radial-gradient(circle at top right, #1e1b4b, #0f172a)',
            },
            boxShadow: {
                'dark-glow': '0 0 20px rgba(99, 102, 241, 0.3)',
                'dark-glow-lg': '0 0 40px rgba(99, 102, 241, 0.4)',
            },
        },
    },

    plugins: [forms],
};
