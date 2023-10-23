/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************************!*\
  !*** ./resources/js/categories/categories.js ***!
  \***********************************************/
// Загрузить DOM после полной загрузки страницы
document.addEventListener("DOMContentLoaded", function () {
  var imageInput = document.querySelector(".image-edit");

  // Обработчик события для выбора файла
  imageInput.addEventListener("change", function () {
    var selectedFile = this.files[0];
    if (selectedFile) {
      var imageURL = URL.createObjectURL(selectedFile);
      var imageElement = document.querySelector(".category-image-edit");
      imageElement.src = imageURL;
    }
  });
});
/******/ })()
;