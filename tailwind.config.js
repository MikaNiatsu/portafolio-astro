/** @type {import('tailwindcss').Config} */
export default {
  content: ['./src/**/*.{astro,html,js,jsx,md,mdx,svelte,ts,tsx,vue}'],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        primary: {
          light: '#FFB5E8',
          DEFAULT: '#FF9CEE',
          dark: '#FF85E8',
        },
        secondary: {
          light: '#B5DEFF',
          DEFAULT: '#9CC5FF',
          dark: '#85B6FF',
        },
        accent: {
          light: '#FFE5B5',
          DEFAULT: '#FFD89C',
          dark: '#FFCB85',
        },
        purple: {
          light: '#B5B5FF',
          DEFAULT: '#9C9CFF',
          dark: '#8585FF',
        },
      },
      animation: {
        'float': 'float 6s ease-in-out infinite',
        'bubble': 'bubble 20s linear infinite',
      },
      keyframes: {
        float: {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-20px)' },
        },
        bubble: {
          '0%': { transform: 'translateY(100vh) scale(0)' },
          '100%': { transform: 'translateY(-100vh) scale(2)' },
        },
      },
    },
  },
  plugins: [],
}