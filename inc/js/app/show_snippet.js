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

        /*  */

        constructor = function () {

            $btnSwitch = $('.switchSnippetBlockWrapper');

            $(document).ready(function () {

                $btnSwitch.on('click', function () {

                    var $shownElement = $(this).parent().find('pre');
                    $shownElement.css('max-height', 'none');

                });
            });

            return that;
        };

        return constructor.apply(null, arguments);
    };

    return ShowSnippet;

});
