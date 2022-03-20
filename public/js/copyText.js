/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/copyText.js ***!
  \**********************************/
/*
|* When the button is clicked,
|* it creates a <input> to which it passes the link
|* and then calls the copy-to clipboard function
*/
$("#btn_copy").click(function () {
  var temp = $("<input>");
  $("body").append(temp);
  temp.val($("#text_copy").text()).select();
  document.execCommand("copy");
  temp.remove();
});
/******/ })()
;