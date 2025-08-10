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
        "tukutane-red": "#DC2626", // Your primary accent color (a strong red)
        "tukutane-red-light": "#EF4444", // A lighter shade for hover/active
        "tukutane-white": "#FFFFFF", // Your secondary color
        // Re-mapping primary/accent to use your red for consistency with shadcn/ui concepts
        primary: {
          DEFAULT: "var(--color-tukutane-red)",
          foreground: "var(--color-tukutane-white)",
        },
        secondary: {
          DEFAULT: "hsl(var(--secondary))",
          foreground: "hsl(var(--secondary-foreground))",
        },
        destructive: {
          DEFAULT: "hsl(var(--destructive))",
          foreground: "hsl(var(--destructive-foreground))",
        },
        muted: {
          DEFAULT: "hsl(var(--muted))",
          foreground: "hsl(var(--muted-foreground))",
        },
        accent: {
          DEFAULT: "var(--color-tukutane-red-light)", // A lighter shade for hover/active
          foreground: "var(--color-tukutane-white)",
        },
        popover: {
          DEFAULT: "hsl(var(--popover))",
          foreground: "hsl(var(--popover-foreground))",
        },
        card: {
          DEFAULT: "hsl(var(--card))",
          foreground: "hsl(var(--card-foreground))",
        },
        border: "hsl(var(--border))", // Default border color
        input: "hsl(var(--input))", // Default input border
        ring: "var(--color-tukutane-red)", // Focus ring
        background: "hsl(var(--background))",
        foreground: "hsl(var(--foreground))",
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
