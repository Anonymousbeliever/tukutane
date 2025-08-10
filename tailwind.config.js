/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
    "./resources/**/*.{js,jsx,ts,tsx,vue}",
  ],

  safelist: [
    "-translate-x-full",
    "translate-x-0",
    "md:ml-64",
    "ml-0",
    "hidden",
  ],

  theme: {
    extend: {
      colors: {
        "tukutane-teal": "#008080",
        "tukutane-white": "#FFFFFF",
        "tukutane-teal-light": "#00a0a0",
      },
      borderRadius: {
        lg: "0.5rem",
        md: "0.375rem",
        sm: "0.25rem",
      },
      fontFamily: {
        sans: ["Figtree", "sans-serif"],
      },
    },
  },

  plugins: [
    require("@tailwindcss/forms"),
    require("@tailwindcss/typography"),
  ],
}
