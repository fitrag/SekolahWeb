import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        tailwindcss(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            $: 'jquery', // Alias jQuery untuk memastikan akses global
            jquery: 'jquery', // Jika perlu
          },
      },
      define: {
        'global': 'window',  // Vite perlu mendefinisikan 'global' ke window
      },
});
