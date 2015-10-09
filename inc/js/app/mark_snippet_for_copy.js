/**
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Date: 29.12.2014
 * Time: 06:35
 *
 * Created by IntelliJ IDEA
 *
 */

define(['jquery', 'bootbox'], function ($, bootbox) {
    'use strict';
    //noinspection UnnecessaryLocalVariableJS
    var CopySnippet = function () {
        var constructor,
            myPublic = {},
            myPrivate = {},
            $btnAction,
            $modal = $('#copyCodeModal'),
            $textArea,
            snippetCode;

        /*  */

        constructor = function () {

            var mainMessage,
                mainTitle = 'Press STRG-C to copy to clippboard';

            $btnAction = $('.copySnippetToClipboard');

            $btnAction.on('click', function () {

                snippetCode = $(this).parent().find('[name="snippedCode"]').val();

                $modal.modal('show');
                $textArea = $modal.find('textarea');
                $textArea.val(snippetCode);

                $modal.on('shown.bs.modal', function(){
                    $textArea.select();
                });

            });

            return myPublic;
        };

        return constructor.apply(null, arguments);
    };

    return CopySnippet;

});
