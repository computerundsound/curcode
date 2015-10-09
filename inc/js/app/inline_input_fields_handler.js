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
    var InlineInputFieldsHandler = function (cuEditorAdd, cuEditorEdit) {
        var that = {},
            constructor,
            dataAttribute,
            $snippetInputHiddenFields = $('.snippetContentHiddenField'),
            codeSnippet;
        /*  */

       constructor = function () {

            $(document).ready(function () {

                $('.saveSnippet').on('click', function () {
                    dataAttribute = $(this).attr('data-action');

                    switch(dataAttribute) {
                        case 'edit':
                            //noinspection JSLint
                            codeSnippet = cuEditorEdit.getSession().getValue();
                            $snippetInputHiddenFields.val(codeSnippet);

                            document.formSnippetEdit.submit();
                            break;
                        case 'add':
                            //noinspection JSLint
                            codeSnippet = cuEditorAdd.getSession().getValue();
                            $snippetInputHiddenFields.val(codeSnippet);
                            document.formSnippetAdd.submit();
                            break;
                        default :
                            break;
                    }
                });

            });



            return that;
        };

        return constructor.apply(null, arguments);
    };

    return InlineInputFieldsHandler;

});
