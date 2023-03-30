import './bootstrap';

import jquery from 'jquery';
try {
    window._ = _;
    window.$ = window.jQuery = jquery;
} catch (e) {}
