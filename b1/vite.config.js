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
            'resources/js/ckeditor-demo.js',
            'resources/js/datepicker.js',
            'resources/js/tooltil.js',
            'resources/js/laravel-sort.js',
            'resources/js/product-store.js',
            'resources/sass/datepicker.css',
            'resources/sass/login.css',
            'resources/sass/toastr.css',
            'resources/sass/user.css',
            'resources/sass/product.css',
            'resources/sass/tagify.css',
        ]),
        ckeditor5( { theme: require.resolve( '@ckeditor/ckeditor5-theme-lark' ) } )
    ],
    resolve: {
        alias: {
            '~bootstrap-datepicker': path.resolve(__dirname, 'node_modules/bootstrap-datepicker'),
            '~jquery-datetimepicker': path.resolve(__dirname, 'node_modules/jquery-datetimepicker'),
            '~ckeditor': path.resolve(__dirname, 'node_modules/@ckeditor'),
            '~~ckeditor': path.resolve(__dirname, 'node_modules/ckeditor5'),
            '~toastr': path.resolve(__dirname, 'node_modules/toastr'),
            '~coreui': path.resolve(__dirname, 'node_modules/@coreui'),
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            '~js-url': path.resolve(__dirname, 'node_modules/js-url'),
            '~tagify': path.resolve(__dirname, 'node_modules/@yaireo/tagify'),
        },
    },
});
