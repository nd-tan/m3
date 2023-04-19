import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import ckeditor5 from '@ckeditor/vite-plugin-ckeditor5';
export default defineConfig({
    plugins: [
        laravel([
            'resources/js/login.js',
            'resources/js/app.js',
            'resources/js/ck-editor.js',
            'resources/js/datepicker.js',
            'resources/js/tooltil.js',
            'resources/sass/datepicker.css',
            'resources/sass/login.css',
            'resources/sass/toastr.css',
        ]),
        ckeditor5( { theme: require.resolve( '@ckeditor/ckeditor5-theme-lark' ) } )
    ],
    resolve: {
        alias: {
            '~bootstrap-datepicker': path.resolve(__dirname, 'node_modules/bootstrap-datepicker'),
            '~jquery-datetimepicker': path.resolve(__dirname, 'node_modules/jquery-datetimepicker'),
            '~ckeditor': path.resolve(__dirname, 'node_modules/@ckeditor'),
            '~toastr': path.resolve(__dirname, 'node_modules/toastr'),
            '~coreui': path.resolve(__dirname, 'node_modules/@coreui'),
        },
    },
});
