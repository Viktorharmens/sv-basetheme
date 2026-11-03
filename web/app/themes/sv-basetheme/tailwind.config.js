/** @type {import('tailwindcss').Config } **/
module.exports = {
    mode: 'jit',
    content: [
        "!./node_modules/**/*",
        "./blocks/**/*.twig",
        "./assets/**/*.js",
        "./views/**/*.twig",
    ],
    theme: {
        container: {
            center: true,
            padding: "1rem",
        },
        extend: {
            colors: {
                primary: {
                    100: "#fce6da",
                    200: "#f9ccb5",
                    300: "#f6b390",
                    400: "#f3996b",
                    500: "#f08046",
                    600: "#c06638",
                    700: "#904d2a",
                    800: "#60331c",
                    900: "#301a0e",
                },
            },
        },
    },

    plugins: [
        require("@tailwindcss/typography"),
    ],
};