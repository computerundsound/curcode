/**
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Date: 29.12.2014
 * Time: 06:23
 *
 * Created by IntelliJ IDEA
 *
 */

require(['requirejs_common'], function () {
    'use strict';
    require(['show_snippet', 'inline_input_fields_handler', 'add_snippet_manager', 'ace/ace', 'delete_snippet_manager', 'snippet_update_manager', 'mark_snippet_for_copy', 'hljs', 'search_snippet_manager'],
        function (ShowSnippet,
                  InlineInputFieldsHandler,
                  AddSnippetManager,
                  CuAce,
                  DeleteSnippetManager,
                  SnippetUpdateManager,
                  CopySnippet,
                  hljs,
                  SearchSnippetManager) {

            //noinspection JSLint
            var showSnippet, inlineInputFieldsHandler,
                addSnippetManager, editorEdit,
                editorAdd, deleteSnippetManager,
                snippetUpdateManager, copySnippet, searchSnippetManager;

            hljs.initHighlighting();

            editorEdit = CuAce.edit('cuEditorEdit');

            editorEdit.setTheme("ace/theme/twilight");
            editorEdit.session.setMode("ace/mode/javascript");
            editorEdit.commands.addCommand({
                name: 'myCommand',
                bindKey: {win: 'Ctrl-S', mac: 'Command-S'},
                exec: function (editorEdit) {

                }
                //    readOnly: true // false if this command should not apply in readOnly mode
            });

            editorAdd = CuAce.edit('cuEditorAdd');

            editorAdd.setTheme("ace/theme/twilight");
            editorAdd.session.setMode("ace/mode/javascript");
            editorAdd.commands.addCommand({
                name: 'myCommand',
                bindKey: {win: 'Ctrl-S', mac: 'Command-S'},
                exec: function (editorAdd) {

                }
                //    readOnly: true // false if this command should not apply in readOnly mode
            });

            $(document).ready(function () {
                //var hljs = new myhljs();

                //noinspection JSUnusedAssignment
                showSnippet = new ShowSnippet();
                //noinspection JSUnusedAssignment
                inlineInputFieldsHandler = new InlineInputFieldsHandler(editorAdd, editorEdit);
                //noinspection JSUnusedAssignment
                addSnippetManager = new AddSnippetManager();
                //noinspection JSUnusedAssignment
                deleteSnippetManager = new DeleteSnippetManager();
                //noinspection JSUnusedAssignment
                snippetUpdateManager = new SnippetUpdateManager(editorEdit);
                //noinspection JSUnusedAssignment
                copySnippet = new CopySnippet();
                //noinspection JSUnusedAssignment
                searchSnippetManager = new SearchSnippetManager();

            });

        });
});

