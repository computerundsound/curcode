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
    var AddSnippetManager = function () {
        var constructor,
            myPublic = {},
            $btnSwitch,
            $insertMask;

        /*  */

        constructor = function () {


            $btnSwitch = $('.addSnippetButton');
            $insertMask = $('#cuAddNewMask');

            $btnSwitch.on('click', function () {

                $insertMask.modal('show');

            });

            return myPublic;
        };

        return constructor.apply(null, arguments);
    };

    return AddSnippetManager;

});
