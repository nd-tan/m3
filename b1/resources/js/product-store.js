(function($){
    'use strict';
    var ProductStore = function ProductStore(element, option, cb) {
        var productStore = this;
        this.element = element;
        this.$element = $(element);
        this.appUrl = _appUrl;
        this.token = _token;
        this.users = _users;
    };

    ProductStore.prototype = {
        _init: function _init() {
            this.ajaxSetup();
            this.init();
            this.initUserTagify();

        },
        ajaxSetup: function ajaxSetup() {
            $.ajaxSetup({
                header: {
                    'X-CSRF-TOKEN': this.token
                }
            })
        },
        init: function () {

        },

        initUserTagify: function () {
            var el = this;

            function tagTemplate(tagData) {
                return `
                    <tag
                        title="${tagData.value}"
                        contenteditable='false'
                        spellcheck='false'
                        tabIndex="-1"
                        class="tagify__tag ${tagData.class ? tagData.class : ""}"
                        ${this.getAttributes(tagData)}
                    >
                        <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
                        <div>
                            <span class='tagify__tag-text ml-1'>${tagData.value}</span>
                        </div>
                    </tag>
                `
            }

            function suggestionItemTemplate(tagData) {
                return `
                    <div ${this.getAttributes(tagData)}
                        class='tagify__dropdown__item ${tagData.class ? tagData.class : ""}'
                        tabindex="0"
                        role="option"
                    >
                        <span class="ml-1">${tagData.value}</span>
                    </div>
                `
            }

            $('input[name=user]').val(JSON.stringify(el.users));
            var input = document.querySelector('input[name=user]');
            var tagify = new Tagify(input, {
                    tagTextProp: 'value',
                    enforceWhitelist: true,
                    skipInvalid: true,
                    autocomplete: true,
                    editTags: false,
                    originalInputValueFormat: valuesArr => JSON.stringify(valuesArr),
                    whitelist: el.users,
                    templates: {
                        tag: tagTemplate,
                        dropdownItem: suggestionItemTemplate
                    },
                    dropdown: {
                        closeOnSelect: true,
                        enabled: 1,
                        highlightFirst: true,
                        searchKeys: ['value']
                    },
                }), controller;

            // listen to any keystrokes which modify tagify's input
            tagify.on('input', onInput);
            function onInput(e) {
                var value = e.detail.value;

                // reset white list
                tagify.settings.whitelist.length = 0;
                controller && controller.abort();
                controller = new AbortController();

                // show loading animation and hide the suggestions dropdown
                tagify.loading(true);
                var href = '/autocomplete';
                fetch(el.appUrl + href + '?type=&&term=' + value, {signal: controller.signal, method: "GET"})
                    .then(RES => RES.json())
                    .then((res) => {
                        tagify.loading(true);
                        if (res) {
                            tagify.settings.whitelist = res.data;
                            tagify.dropdown.show.call(tagify, value);
                        }
                    })
                    .catch((error) => {
                        tagify.settings.whitelist.length = 0;
                        tagify.loading(false);
                        tagify.dropdown.hide();
                    })
            }
        }
    }

     /* Execute main function */
     $.fn.productStore = function (options, cb) {
        this.each(function () {
            var el = $(this);
            if (!el.data('productStore')) {
                var productStore = new ProductStore(el, options, cb);
                el.data('productStore', ProductStore);
                productStore._init();
            }
        });
        return this;
    };
})(jQuery);

$(document).ready(function () {
    $('body').productStore();
});
