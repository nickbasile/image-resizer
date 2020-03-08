const plugin = require('tailwindcss/plugin');

module.exports = {
  theme: {
    extend: {},
  },
  variants: {
      opacity: ['group-hover'],
  },
  plugins: [
      plugin(function({ addUtilities }) {
          const newUtilities = {
              '.bg-overlay': {
                  background: 'rgba(74, 85, 104, .6)',
              },
          };

          addUtilities(newUtilities, ['responsive', 'hover']);
      })
  ],
}
