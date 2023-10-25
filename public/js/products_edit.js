/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************************!*\
  !*** ./resources/js/products/products_edit.js ***!
  \************************************************/
document.addEventListener('DOMContentLoaded', function () {
  var imageInput = document.querySelector('.edit-input-product');
  var imagePreview = document.querySelector('#product-preview-edit');
  imageInput.addEventListener('change', function () {
    if (imageInput.files && imageInput.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        imagePreview.src = e.target.result;
      };
      reader.readAsDataURL(imageInput.files[0]);
    }
  });
});
/******/ })()
;