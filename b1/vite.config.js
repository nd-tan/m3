import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel([
            'resources/js/login.js',
            'resources/js/app.js',
        ]),
    ],
    resolve: {
        alias: {
        },
    },
});
