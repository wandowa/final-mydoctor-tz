import colors from 'tailwindcss/colors'

export default {
  content: [
    './resources/**/*.blade.php',
    './vendor/filament/**/*.blade.php',
  ],
  theme: {
    extend: {
      colors: {
        primary: colors.blue,  // Blue for primary elements (e.g., buttons)
        success: colors.green, // Green for success states
        danger: colors.red,
        warning: colors.yellow,
        gray: colors.gray,
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}