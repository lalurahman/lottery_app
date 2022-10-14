/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      height:{
        '100': '32rem',
        '120': '45rem',
      }
    },
  },
  plugins: [],
}
