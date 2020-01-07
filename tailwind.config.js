module.exports = {
  theme: {
    colors: {
      transparent: 'transparent',
      black: '#39393a',
      white: '#FFF',
      gray: {
        900: '#6c757d',
        700: '#dae4e9',
        600: '#f9fafd',
        500: '#cfd9e2',
        300: '#dae4e9',
        100: '#fafbfe'
      },
      blue: {
        900: '#0f4b8f',
        600: '#0f7ec2',
        300: '#6095c5cc',
        100: '#a5d9f5'
      },
      red: {
        900: '#f9375e',
        600: '#fa5c7c'
      },
      yellow:  {
        900: '#d9a000',
        600: '#ffbc00'
      },
      green:  {
        900: '#08ab7c',
        600: '#0acf97'
      }
    },
  },
  variants: {
    borderColor: ['responsive', 'hover', 'focus', 'group-hover'],
    visibility: ["responsive", "group-hover"]
  },
  plugins: []
}