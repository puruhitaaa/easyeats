import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: "#3B82F6",
                    light: "#60A5FA",
                    dark: "#2563EB",
                },
                background: {
                    light: "#ffffff",
                    dark: "#1a1a1a",
                },
                text: {
                    light: "#171717",
                    dark: "#f3f4f6",
                },
            },
        },
    },
    plugins: [],
};
