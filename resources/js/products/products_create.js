document.addEventListener('DOMContentLoaded', function () {
  const imageInput = document.querySelector('.create-input-product')
  const imagePreview = document.querySelector('#product-preview-create');

  imageInput.addEventListener('change', function () {
      if (imageInput.files && imageInput.files[0]) {
          const reader = new FileReader();

          reader.onload = function (e) {
              imagePreview.src = e.target.result;
              imagePreview.style.display = 'block';
          };

          reader.readAsDataURL(imageInput.files[0]);
      }
  });
});