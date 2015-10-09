/*
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Date: 08.06.2015
 * Time: 23:05
 * 
 * Created by IntelliJ IDEA
 *
 */


define(['jquery'], function ($) {
    'use strict';
    //noinspection UnnecessaryLocalVariableJS
    var DeleteSnippetManager = function () {
        var constructor,
            myPublic = {},
            $btnDelete;
        /*  */

        constructor = function () {


            $btnDelete = $('.btnSnippetDelete');

            $btnDelete.on('click', function () {

                var id = $(this).attr('data-fieldSetID');

                document.formAction.action.value = 'deleteSnippet';
                document.formAction.actionValue.value = id;

                document.formAction.submit();

            });

            return myPublic;
        };

        return constructor.apply(null, arguments);
    };

    return DeleteSnippetManager;

});
