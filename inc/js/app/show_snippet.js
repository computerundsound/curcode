/**
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Date: 29.12.2014
 * Time: 06:35
 *
 * Created by IntelliJ IDEA
 *
 */

define(['jquery'], function ($) {
    'use strict';
    //noinspection UnnecessaryLocalVariableJS
    var ShowSnippet = function () {
        var constructor,
            that = {},
            $btnSwitch;

        constructor = function () {

            $btnSwitch = $('.switchSnippetBlockWrapper');

            $(document).ready(function () {

                var maxHeight;
                var textOn  = "Show Snipped";
                var textOff = "Show Small"

                $btnSwitch.on('click', function () {

                    var $shownElement = $(this).parent().find('pre');
                    var className     = 'showComplete';
                    var $button       = $(this);

                    if (maxHeight === undefined) {

                        maxHeight = $shownElement.css('max-height');
                    }

                    if ($shownElement.hasClass(className)) {
                        $shownElement.removeClass(className);
                        $shownElement.css('max-height', maxHeight);

                        $button.html(textOn);
                    } else {
                        $shownElement.addClass(className);
                        $shownElement.css('max-height', 'none');

                        $button.html(textOff);

                    }

                });
            });

            return that;
        };

        return constructor.apply(null, arguments);
    };

    return ShowSnippet;

});
