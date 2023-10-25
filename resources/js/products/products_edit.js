document.addEventListener('DOMContentLoaded', function () {
  const imageInput = document.querySelector('.edit-input-product')
  const imagePreview = document.querySelector('#product-preview-edit');

  imageInput.addEventListener('change', function () {
      if (imageInput.files && imageInput.files[0]) {
          const reader = new FileReader();

          reader.onload = function (e) {
              imagePreview.src = e.target.result;
          };

          reader.readAsDataURL(imageInput.files[0]);
      }
  });
});