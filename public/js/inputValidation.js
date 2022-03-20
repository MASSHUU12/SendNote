/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/inputValidation.js ***!
  \*****************************************/
$("#title").blur(function () {
  validation("#title");
});
$("#note_content").blur(function () {
  validation("#note_content");
});
$("#password").blur(function () {
  validation("#password", "#password_conf");
});
$("#password_conf").blur(function () {
  validation("#password_conf", "#password");
});
$("#email").blur(function () {
  validation("#email");
});
$("#views").blur(function () {
  if ($("#views").val() < 1 || $("#views").val() > 60 || $("#views").val().length <= 0) $("#views").css("border", "solid 1px red");else $("#views").css("border", "solid 1px #ebbb61");
});

function validation(item) {
  var item2 = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "";

  if ($(item).val().length <= 0) {
    $(item).css("border", "solid 1px red"); //createMessage(item, "You need to type something", "red");
  } else {
    $(item).css("border", "solid 1px #ebbb61");

    if (item2 != "") {
      if ($(item).val() == $(item2).val()) {
        $(item).css("border", "solid 1px #ebbb61");
        $(item2).css("border", "solid 1px #ebbb61");
      } else $(item).css("border", "solid 1px red");
    }
  }
} // function createMessage(item, text, color) {
//     let message = $("<span></span>").text(text);
//     message.css("color", color);
//     message.css("position", "relative");
//     message.css("font-size", "12px");
//     message.css("bottom", "-24px");
//     $(item).append(message);
// }
/******/ })()
;