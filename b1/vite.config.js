import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel([
            'resources/js/login.js',
            'resources/js/app.js',
            'resources/js/datepicker.js',
            'resources/sass/datepicker.css',
            'resources/sass/login.css',
        ]),
    ],
    resolve: {
        alias: {
            '~bootstrap-datepicker': path.resolve(__dirname, 'node_modules/bootstrap-datepicker'),
            '~jquery-datetimepicker': path.resolve(__dirname, 'node_modules/jquery-datetimepicker'),
        },
    },
});
