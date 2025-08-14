/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: ["class"],
  safelist: [
    // Sidebar animations
    "translate-x-0",
    "-translate-x-full",
    "ml-0",
    "ml-64",
    "md:ml-64",
    "hidden",
    "is-open",
    // Button variants
    "btn-primary",
    "btn-secondary", 
    "btn-danger",
    // Alert variants
    "alert-success",
    "alert-error",
    "alert-warning",
    // Form variants
    "form-input",
    "form-textarea",
    // Layout utilities
    "w-full-important",
    "max-w-none-important",
  ],
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/**/*.{js,jsx,ts,tsx,vue}",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./app/View/Components/**/*.php",
  ],
  theme: {
    // Remove or modify the container configuration that's causing centering
    container: {
      center: false, // Changed from true to false
      padding: "0", // Reduced padding
      screens: {
        "sm": "640px",
        "md": "768px",
        "lg": "1024px",
        "xl": "1280px",
        "2xl": "1400px", // Increased from 1400px
      },
    },
    extend: {
      maxWidth: {
        'none': 'none',
        'full': '100%',
        'screen': '100vw',
        '8xl': '1400px',
        '9xl': '1600px',
      },
      width: {
        'screen': '100vw',
      },
      colors: {
        // Your brand colors
        "tukutane-red": "#DC2626",
        "tukutane-red-light": "#EF4444", 
        "tukutane-white": "#FFFFFF",
                
        // Shadcn/UI integration
        border: "hsl(var(--border))",
        input: "hsl(var(--input))",
        ring: "hsl(var(--ring))",
        background: "hsl(var(--background))",
        foreground: "hsl(var(--foreground))",
        primary: {
          DEFAULT: "#DC2626", // Your red color
          foreground: "#FFFFFF",
        },
        secondary: {
          DEFAULT: "hsl(var(--secondary-hsl))",
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
          DEFAULT: "#EF4444", // Your light red color
          foreground: "#FFFFFF",
        },
        popover: {
          DEFAULT: "hsl(var(--popover))",
          foreground: "hsl(var(--popover-foreground))",
        },
        card: {
          DEFAULT: "hsl(var(--card))",
          foreground: "hsl(var(--card-foreground))",
        },
      },
      borderRadius: {
        lg: "var(--radius)",
        md: "calc(var(--radius) - 2px)",
        sm: "calc(var(--radius) - 4px)",
      },
      fontFamily: {
        sans: ["Inter", "Figtree", "sans-serif"],
      },
      keyframes: {
        "accordion-down": {
          from: { height: "0" },
          to: { height: "var(--radix-accordion-content-height)" },
        },
        "accordion-up": {
          from: { height: "var(--radix-accordion-content-height)" },
          to: { height: "0" },
        },
        "slide-in": {
          "0%": { transform: "translateX(-100%)" },
          "100%": { transform: "translateX(0)" },
        },
        "slide-out": {
          "0%": { transform: "translateX(0)" },
          "100%": { transform: "translateX(-100%)" },
        },
      },
      animation: {
        "accordion-down": "accordion-down 0.2s ease-out",
        "accordion-up": "accordion-up 0.2s ease-out",
        "slide-in": "slide-in 0.3s ease-out",
        "slide-out": "slide-out 0.3s ease-out",
      },
    },
  },
  plugins: [
    require("tailwindcss-animate"),
    require("@tailwindcss/forms"),
    require("@tailwindcss/typography"),
  ],
};