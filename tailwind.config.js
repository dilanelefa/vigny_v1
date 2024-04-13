/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: 'selector',
    theme: {
        extend: {
            fontFamily: {
                'pacifico': ['Pacifico', 'cursive'],
                'poppins': ['Poppins', 'sans-serf']
            },
            colors: {
                'dark': '#151c21'
            }
        },
    },
    plugins: [],
}

