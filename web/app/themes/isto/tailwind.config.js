module.exports = {
  mode: 'jit',
  purge: [
    './resources/views/**/*.php',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily: {
        'body': ['Poppins', 'sans-serif'],
        'headings': ['Roboto', 'sans-serif'],
      },
      colors: {
        'gray': {
          1: '#f5f5f5',
        },
      },
      fontSize: {
        '13px': '0.812rem',
        '14px': '0.875rem',
        '16px': '1rem',
        '18px': '1.125rem',
        '22px': '1.375rem',
        '35px': '2.187rem',
        '50px': '3.125rem',
      },
      spacing: {
        '1px': '1px',
        '2px': '2px',
        '10px': '10px',
        '30px': '30px',
        '40px': '40px',
        '50px': '50px',
        '70px': '70px',
      },
    },
  },
  variants: {},
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
