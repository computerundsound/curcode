/*
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Date: 12.06.2015
 * Time: 00:53
 * 
 * Created by IntelliJ IDEA
 *
 */

define(['jquery'], function ($) {
    'use strict';
    //noinspection UnnecessaryLocalVariableJS
    var SnippetUpdateManager = function (editorEdit) {
        var constructor,
            myPublic = {},
            myPrivate = {};

        /*  */

        constructor = function () {

            $('.editSnippet').on('click', function () {
                var snippetID = $(this).attr('data-fieldSetID');

                /* insert content */

                $.getJSON("_ajax/getSnippetData.php?snippet_id=" + snippetID, function (data) {

                    $('#cuEditMask').modal('show');

                    $('input[name="snippetdata[snippet_name]"]').val(data.name);
                    $('textarea[name="snippetdata[snippet_information]"]').val(data.information);
                    $('textarea[name="snippetdata[snippet_tags]"]').val(data.tags);
                    $('select[name="snippetdata[snippet_language]"] option[value="' + data.language_id + '"]').attr('selected',
                        true);
                    editorEdit.setValue('');
                    editorEdit.insert(data.code);
                    $('input[name="snippetdata[snippet_id]"]').val(data.snippet_id);

                });

            });

            return myPublic;
        };

        return constructor.apply(null, arguments);
    };

    return SnippetUpdateManager;

});
