/*
 * Copyright Jörg Wrase www.computer-und-sound.de
 * 30.11.14 01:53
 *
 * Created by IntelliJ IDEA
 *
 * D:/_SERVER/_SELF/web208-cusp/domains/_SUBS_cusp/domainabrechnungen/htdocs/inc/bootstrap/js/CuCheckboxworker.js
 */

/**
 * Jörg Wrase
 * Date: 08.01.14
 * Time: 14:46
 *
 * Created by PhpStorm
 *
 */

'use strict';
/*jshint globalstrict: true*/
/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, noarg:true, noempty:true, nonew:true, undef:true, strict:true, browser:true */
/*global $:false, alert:false */



function CuCheckboxWorker (nameFromMasterCheckbox, nameOfCheckboxes){

    var thiz = this;

    this.masterCheckerJQ = $('[name="' + nameFromMasterCheckbox + '"]');
    this.nameOfCheckboxes = nameOfCheckboxes;

    var checkboxesNamesJQ = $("input[name='" + nameOfCheckboxes + "[]']");

    this.masterCheckerJQ.prop('checked', false);
    checkboxesNamesJQ.prop('checked', false);

    this.masterCheckerJQ.click(function(){
        if($(this).prop('checked') === true){
            checkboxesNamesJQ.prop('checked', true);
        } else {
            checkboxesNamesJQ.prop('checked', false);
        }
    });

    checkboxesNamesJQ.click(function (){
        thiz.testeCheckboxen();
    });
}

CuCheckboxWorker.prototype.masterCheckerJQ = '';
CuCheckboxWorker.prototype.nameOfCheckboxes = '';


CuCheckboxWorker.prototype.allOnes = true;

CuCheckboxWorker.prototype.testeCheckboxen = function() {
    var containingClass = this;
    this.allOnes = true;

    $.each($("input[name='" + this.nameOfCheckboxes + "[]']"), function(index, myElement){
        if($(myElement).prop('checked') === false){
            containingClass.allOnes = false;
        }
    });

    if(this.allOnes){
        this.masterCheckerJQ.prop('checked', true);
    } else {
        this.masterCheckerJQ.prop('checked', false);
    }
};