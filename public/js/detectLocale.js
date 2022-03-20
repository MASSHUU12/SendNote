/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/detectLocale.js ***!
  \**************************************/
/*
\ Checks user's language only once
\ and takes him to the page in his language
\ (as long as his language is Polish or English)
*/
$(function () {
  if (getCookie("localeChecked") != "true") {
    var lang = navigator.language || navigator.userLanguage;
    var l = lang.slice(0, 2);
    document.cookie = "localeChecked=true";
    if (l == "pl" || l == "en") window.location.replace("/language/" + l);
  }
}); // A function to search for a cookie and return its contents

function getCookie(cname) {
  var name = cname + "=";
  var ca = decodeURIComponent(document.cookie).split(";");

  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];

    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }

    if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
  }

  return "";
}
/******/ })()
;