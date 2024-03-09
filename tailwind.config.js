/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    safelist:[
        'border-r-2',
        'border-r-4',
        'bg-logo-blue/75',
        'bg-logo-blue',
        'text-logo-blue'
    ],
    theme: {
        container: {
            center: true,
        },
        fontFamily: {
            sans: ['montserrat', 'Arial', 'sans-serif'],
            serif: ["baka-too", "serif"]
        },
        extend: {
            dropShadow: {
                logo: '9px 10px 10px #050B1A'
            },
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

