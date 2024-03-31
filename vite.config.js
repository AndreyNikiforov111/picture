import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    base:'./',
    //publicDir: '/public/',
    plugins: [
        laravel({
            //assetsDir: 'public/build', // Set the assetsDir to reflect the public directory

            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
