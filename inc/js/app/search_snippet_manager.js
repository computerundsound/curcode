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
    var SearchSnippetManager = function () {
        var constructor,
            myPublic = {},
            $formSubmitBtn = $('.searchSnippetBtn'),
            $selectLanguage = $('select[name="snippet_language"]');


        constructor = function () {

            $selectLanguage.on('change', function(){

                $formSubmitBtn.trigger('click');

            });



            return myPublic;
        };

        return constructor.apply(null, arguments);
    };

    return SearchSnippetManager;

});
