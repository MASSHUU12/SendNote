/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/cConsent.js ***!
  \**********************************/
$(function () {
  if (getCookie("cConsentRead") != "true") $("#c-container").delay(500).fadeIn(350);
});
$("#c-btn").click(function () {
  $("#c-container").fadeOut();
  document.cookie = "cConsentRead=true";
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