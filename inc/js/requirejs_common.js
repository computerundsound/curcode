/**
 * Copyright by Jörg Wrase - www.Computer-Und-Sound.de
 * Date: 29.12.2014
 * Time: 05:32
 *
 * Created by IntelliJ IDEA
 *
 */

/*global */

requirejs.config({
    //By default load any module IDs from js/lib
    baseUrl: '/inc/js/app',
    shim   : {
        "bootstrap": {"deps": ['jquery']}
    },
    //except, if the module ID starts with "app",
    //load it from the js/app directory. paths
    //config is relative to the baseUrl, and
    //never includes a ".js" extension since
    //the paths config could be for a directory.
    paths  : {
        bootstrap: "../../bootstrap/js/bootstrap.min",
        bootbox  : "../../bootstrap/js/bootbox.min",
        jquery   : '../jquery/jquery',
        hljs   : '../highlight/highlight.pack'
    }
});

requirejs(['jquery', 'bootstrap'], function ($) {
    'use strict';

    $(document).ready(function () {

        //noinspection MagicNumberJS
        $('body').fadeIn(500);

        $('code').each(function (i, block) {
            hljs.highlightBlock(block);
        });

    });

});


