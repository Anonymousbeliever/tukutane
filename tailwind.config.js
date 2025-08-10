/** @type {import('tailwindcss').Config} */
const defaultConfig = require("shadcn/ui/tailwind.config")

module.exports = {
  ...defaultConfig,
  content: [
    ...defaultConfig.content,
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.js",
    "*.{js,ts,jsx,tsx,mdx}",
  ],
  theme: {
    ...defaultConfig.theme,
    extend: {
      ...defaultConfig.theme.extend,
      colors: {
        ...defaultConfig.theme.extend.colors,
        "tukutane-teal": "#008080", // Your primary accent color
        "tukutane-white": "#FFFFFF", // Your secondary color
        "tukutane-teal-light": "#00a0a0", // A lighter shade of teal for hover/active states
      },
      borderRadius: {
        ...defaultConfig.theme.extend.borderRadius,
        lg: "0.5rem", // Standard large border radius
        md: "0.375rem", // Standard medium border radius
        sm: "0.25rem", // Standard small border radius
      },
      fontFamily: {
        sans: ["Figtree", "sans-serif"],
      },
    },
  },
  plugins: [...defaultConfig.plugins, require("@tailwindcss/forms"), require("@tailwindcss/typography")],
}
