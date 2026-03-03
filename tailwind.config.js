/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './**/*.php',
    './src/js/**/*.js',
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
  plugins: [],
}