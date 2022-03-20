/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/showOptions.js ***!
  \*************************************/
$("#with_password").click(function () {
  $("#label-pass").slideToggle(300, function () {
    if ($("#label-pass").css("display") == "block") $("#label-pass").css("display", "flex");
  });
});
$("#with_notification").click(function () {
  $("#label-notif").slideToggle(300, function () {
    if ($("#label-notif").css("display") == "block") $("#label-notif").css("display", "flex");
  });
});
$("#with_views").click(function () {
  $("#label-views").slideToggle(300, function () {
    if ($("#label-views").css("display") == "block") $("#label-views").css("display", "flex");
  });
});
/******/ })()
;