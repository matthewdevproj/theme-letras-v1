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
        // CODICE primarios
        azul:  '#2457A6',
        azuld: '#143B63',
        gold:  '#A8861C',
        'accent-2': '#6E1226',
        success: '#1F8A5B',
        bg:    '#F7F5EF',
        ink:   '#1A2230',
        'bg-dark': '#0C1521',

        // Aliases legacy
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
          gold: '#A8861C',
        },
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
          500: '#A8861C',
          600: '#8F7A18',
          700: '#766512',
          800: '#5C500E',
          900: '#433B0A',
        },
        gray: {
          text: '#34312B',
          light: '#E2E0D8',
          medium: '#9A978E',
          dark: '#6E6B64',
          50: '#F7F5EF',
          100: '#EFEDE6',
          200: '#E2E0D8',
          300: '#C5C2B9',
          400: '#9A978E',
          500: '#6E6B64',
          600: '#4A4740',
          700: '#34312B',
          800: '#1F1C17',
          900: '#0C1521',
        }
      },
      fontFamily: {
        sans: ['Hanken Grotesk', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'sans-serif'],
        serif: ['Newsreader', 'Georgia', 'Times New Roman', 'serif'],
        display: ['Newsreader', 'Georgia', 'Times New Roman', 'serif'],
        body: ['Hanken Grotesk', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'sans-serif'],
      },
      spacing: {
        '1': '4px',
        '2': '8px',
        '3': '12px',
        '4': '16px',
        '6': '24px',
        '8': '32px',
        '12': '48px',
        '16': '64px',
        '18': '4.5rem',
        '88': '22rem',
        '128': '32rem',
      },
      maxWidth: {
        '8xl': '88rem',
        'container': '1300px',
        'reading': '66ch',
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
  darkMode: 'class',
  corePlugins: {
    preflight: false,
  },
  plugins: [],
}
