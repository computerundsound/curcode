/*
 * Copyright Jörg Wrase www.computer-und-sound.de
 * 30.11.14 01:53
 *
 * Created by IntelliJ IDEA
 *
 * D:/_SERVER/_SELF/web208-cusp/domains/_SUBS_cusp/domainabrechnungen/htdocs/inc/bootstrap/js/CuLoader.js
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
/*global $:false, alert:false, confirm:false, prompt:false*/

var CuLoader = {};
(function CuLoaderSrc() {

    function CuLoaderObj() {
        var is_running = false;

        this.cuShow = function (delay_in_ms) {

            if (is_running === false) {
                if (delay_in_ms === undefined) {
                    delay_in_ms = 0;
                }
                is_running = true;
                $('#CuLoader').fadeIn(delay_in_ms);
            }
        };
        this.cuHide = function () {
            is_running = false;
            $('#CuLoader').fadeOut();
        };
    }

    CuLoader = new CuLoaderObj();

})();
