/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './**/*.php',
    './src/js/**/*.js',
    './js/**/*.js',
    './inc/widgets/**/*.html',
    './template-parts/**/*.php'
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          dark: '#143B63',
          DEFAULT: '#143B63',
        },
        secondary: {
          blue: '#2457A6',
          light: '#69BCE2',
          muted: '#7FA9CC',
          lavender: '#B3B0CC',
        },
        accent: {
          gold: '#A88F1D',
        },
        // Colores para header moderno
        navy: {
          50: '#E6EBF0',
          100: '#CED7E1',
          200: '#9CB0C3',
          300: '#6B88A5',
          400: '#396187',
          500: '#143B63',
          600: '#0F2E4F',
          700: '#0A223B',
          800: '#0A1E3C',
          900: '#051220',
        },
        gold: {
          50: '#F8F6ED',
          100: '#F1EDDB',
          200: '#E3DBB7',
          300: '#D5C993',
          400: '#C7B76F',
          500: '#A88F1D',
          600: '#8F7A18',
          700: '#766512',
          800: '#5C500E',
          900: '#433B0A',
        },
        gray: {
          text: '#3A3A3A',
          light: '#E5E9F0',
          medium: '#CED4DA',
          dark: '#6C757D',
        }
      },
      fontFamily: {
        sans: ['Poppins', 'sans-serif'],
      },
      spacing: {
        '18': '4.5rem',
        '88': '22rem',
        '128': '32rem',
      },
      maxWidth: {
        '8xl': '88rem',
      },
      borderWidth: {
        '3': '3px',
      },
      animation: {
        'fade-in': 'fadeIn 0.6s ease-out forwards',
        'fade-in-up': 'fadeInUp 0.6s ease-out forwards',
        'slide-down': 'slideDown 0.3s ease-out',
        'pulse-slow': 'pulse 3s infinite',
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        fadeInUp: {
          '0%': { opacity: '0', transform: 'translateY(20px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        slideDown: {
          '0%': { transform: 'translateY(-100%)' },
          '100%': { transform: 'translateY(0)' },
        },
      },
    },
  },
  corePlugins: {
    preflight: false,
  },
  plugins: [],
}
