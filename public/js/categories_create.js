/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************************!*\
  !*** ./resources/js/categories/categories_create.js ***!
  \******************************************************/
document.addEventListener("DOMContentLoaded", function () {
  var imageCreateInput = document.querySelector(".image-create");
  var imagePreview = document.getElementById("image-preview");

  // Слушатель изменения значения input типа "file"
  imageCreateInput.addEventListener("change", function () {
    if (imageCreateInput.files.length > 0) {
      var file = imageCreateInput.files[0];
      var reader = new FileReader();
      reader.onload = function (e) {
        imagePreview.src = e.target.result;
      };
      reader.readAsDataURL(file);
    } else {
      imagePreview.src = "";
    }
  });
});
/******/ })()
;