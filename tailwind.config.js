/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        container: {
            center: true,
        },
        fontFamily: {
          sans: ['montserrat', 'Arial', 'sans-serif']
        },
        extend: {
            colors: {
                "logo-blue": "#10275B",
                "logo-dark-blue": "#050B1A",
                "logo-light-blue": "#005FAC",
                "logo-yellow": "#ECD012",
                "logo-brown": "#402508",
            }
        },
    },
    plugins: [],
}

