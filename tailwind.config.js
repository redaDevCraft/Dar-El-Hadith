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

      },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}

