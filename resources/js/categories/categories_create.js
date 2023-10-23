document.addEventListener("DOMContentLoaded", function () {
    const imageCreateInput = document.querySelector(".image-create");
    const imagePreview = document.getElementById("image-preview");

    // Слушатель изменения значения input типа "file"
    imageCreateInput.addEventListener("change", function () {
        if (imageCreateInput.files.length > 0) {
            const file = imageCreateInput.files[0];
            const reader = new FileReader();

            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        } else {
            imagePreview.src = "";
        }
    });
});
