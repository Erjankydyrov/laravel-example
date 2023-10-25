/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************************!*\
  !*** ./resources/js/products/products_create.js ***!
  \**************************************************/
document.addEventListener('DOMContentLoaded', function () {
  var imageInput = document.querySelector('.create-input-product');
  var imagePreview = document.querySelector('#product-preview-create');
  imageInput.addEventListener('change', function () {
    if (imageInput.files && imageInput.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        imagePreview.src = e.target.result;
        imagePreview.style.display = 'block';
      };
      reader.readAsDataURL(imageInput.files[0]);
    }
  });
});
/******/ })()
;