/*
filename: jobs.js
Author: Karthick Senthil
created: 16/04/2019
last Modified: 16/04/2019
description: Assignment 1 scripts. for jobs page;
*/

"use strict";

function storeLocalData() {
    var appRefNo = this.id;
    sessionStorage.setItem("appRefNo",appRefNo);
}

function init() {
    var applyNow = document.getElementsByClassName("apply-job");
    for(var i =0;i<applyNow.length;i++) {
        applyNow[i].onclick = storeLocalData;
    }
}

window.onload = init;