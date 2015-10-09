/*
 * Copyright Jörg Wrase www.computer-und-sound.de
 * 30.11.14 01:53
 *
 * Created by IntelliJ IDEA
 *
 * D:/_SERVER/_SELF/web208-cusp/domains/_SUBS_cusp/domainabrechnungen/htdocs/inc/bootstrap/js/_main.js
 */

/**
 * Jörg Wrase www.computer-und-sound.de
 * Date: 2014-11-20
 * Time: 21:43
 *
 * Created by IntelliJ IDEA
 *
 */
'use strict';
/*jshint globalstrict: true*/
/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, noarg:true, noempty:true, nonew:true, undef:true, strict:true, browser:true */
/*global $:false, alert:false, confirm:false, prompt:false, Shop_handler:true, cu_date_format:false;  */

var CuMsg = (function () {

    var elem,
        hideHandler,
        that = {};

    that.init = function (options) {
        elem = $(options.selector);
    };

    that.show = function (text) {
        clearTimeout(hideHandler);

        elem.find("span").html(text);
        elem.delay(200).fadeIn().delay(3000).fadeOut();
    };

    return that;
}());

$(function () {
    CuMsg.init({
        "selector": ".bb-alert"
    });
});


$(".datepicker").datetimepicker({
    format: cu_date_format,
    dayOfWeekStart: 1
});

