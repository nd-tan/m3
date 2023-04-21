(function ($) {
    'use strict'
    var LaravelSort = function (element, option, cb) {
        var laravelSort = this;
        this.element = element;
        this.$element = $(element);
    };

    LaravelSort.prototype = {
        _init: function () {
            this.Sort();
        },
        Sort: function () {
            var fieldSort = this.element.data('field');
            var sortBy = typeof url('?sort_by') != 'undefined' ? url('?sort_by') : 'asc';
            var orderBy = typeof url('?order_by') != 'undefined' ? url('?order_by') : '';
            var worigin = window.location.origin;
            var wpathname = window.location.pathname;
            var wsearch = window.location.search;

            if (sortBy === 'asc') {
                sortBy = 'desc'
            }
            else if (sortBy === 'desc') {
                sortBy = 'asc'
            }

            var urlParams = new URLSearchParams(wsearch);
            urlParams.set('sort_by', sortBy);
            urlParams.set('order_by', fieldSort);

            var href = worigin + wpathname + '?' + urlParams;
            this.element.attr('href', href);
            if (this.element.data('field') === orderBy) {
                this.element.addClass(sortBy);
            }
        },
    };
    $.fn.laravelSort = function (options, cb) {
        this.each(function () {
            var el = $(this);
            if (!el.data('laravelSort')) {
                var laravelSort = new LaravelSort(el, options, cb);
                el.data('laravelSort', laravelSort);
                laravelSort._init();
            }
        });
        return this;
    };
})(jQuery);

$(document).ready(function(){
    $('.laravel-sort').laravelSort();
})
