/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        container: {
            center: true,
            padding: "0",
            screens: {
              'ss': '480px',
              // => @media (min-width: 480px) { ... }
              'sm': '640px',
              // => @media (min-width: 640px) { ... }
        
              'md': '768px',
              // => @media (min-width: 768px) { ... }
        
              'lg': '1024px',
              // => @media (min-width: 1024px) { ... }
        
              'xl': '1280px',
              // => @media (min-width: 1280px) { ... }
        
              '2xl': '1536px',
              // => @media (min-width: 1536px) { ... }
            },
          },
        extend: { },
    },
    plugins: [require("flowbite/plugin")],
};
