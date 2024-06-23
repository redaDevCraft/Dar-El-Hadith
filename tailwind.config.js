import preset from './vendor/filament/support/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        "./node_modules/flowbite/**/*.js",

    ],
     theme: {
      extend: {
         maxWidth: {
        '70vw': '70vw',
      },
       keyframes: {
        popUp: {
          '0%': { opacity: 0, transform: 'scale(0.5)' },
          '100%': { opacity: 1, transform: 'scale(1)' },
        },
      },
      animation: {
        popUp: 'popUp 0.5s ease-out forwards',
      },

      },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}

