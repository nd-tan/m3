
(function ($) {
    'use strict';

    var AppMenu = function AppMenu(element, options, cb) {
        var appMenu = this;
        this.element = element;
        this.$element = $(element);
        this.$element.on('click', '#input', function () {
            appMenu.onClickLogout();
        });
    };

    AppMenu.prototype = {
        _init: function _init() {
            this.ajaxSetup();
            this.init();
        },
        ajaxSetup: function () {
            $.ajaxSetup({
                headers: {
                    // 'X-CSRF-TOKEN': _token
                }
            });
        },
        init: function() {
            $(document).ready(function(){
                $('#datepicker').datepicker({
                    language: 'vi',
                    format: 'dd/mm/yyyy',
                    orientation: 'bottom',
                    clearBtn: true,
                    todayHighLight: true,
                    templates: {
                        leftArrow: '&lt;',
                        rightArrow: '&gt;',
                    }
                }).on('changeDate', function (selected){
                    $('#datepicker_2').datepicker('setStartDate', selected.date);
                    $('.datepicker').hide();
                }).on('clearDate', function () {
                    $('#datepicker_2').datepicker('setStartDate', null);
                    $('.datepicker').hide();
                });
                $('#datepicker_2').datepicker({
                    language: 'vi',
                    format: 'dd/mm/yyyy',
                    orientation: 'bottom',
                    clearBtn: true,
                    todayHighLight: true,
                    templates: {
                        leftArrow: '&lt;',
                        rightArrow: '&gt;',
                    }
                }).on('changeDate', function (selected) {
                    $('#datepicker').datepicker('setEndDate', selected.date);
                    $('.datepicker').hide();
                }).on('clearDate', function () {
                    $('#datepicker').datepicker('setEndDate', null);
                    $('.datepicker').hide();
                });
            });
        },
        onClickLogout: function() {
            console.log(123);
        }
    };

    /* Execute main function */
    $.fn.appMenu = function (options, cb) {
        this.each(function () {
            var el = $(this);
            if (!el.data('appMenu')) {
                var appMenu = new AppMenu(el, options, cb);
                el.data('appMenu', AppMenu);
                appMenu._init();
            }
        });
        return this;
    };
})(jQuery);

$(document).ready(function () {
    $('body').appMenu();
});

