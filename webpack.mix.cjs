const mix = require("laravel-mix");

mix.js("resources/js/app.mjs", "public/js")
    .js("resources/js/categories/categories.js", "public/js")
    .js("resources/js/categories/categories_create.js", "public/js")
    .js("resources/js/products/products_create.js", "public/js")
    .js("resources/js/products/products_edit.js", "public/js")
    .css("resources/css/app.css", "public/css")
    .css("resources/css/nav.css", "public/css")
    .css("resources/css/footer.css", "public/css")
    .css("resources/css/categories/categories.css", "public/css")
    .css("resources/css/categories/categories_admin.css", "public/css")
    .css("resources/css/categories/categories_edit.css", "public/css")
    .css("resources/css/categories/categories_create.css", "public/css")
    .css("resources/css/categories/categories_show.css", "public/css")
    .css("resources/css/products/products_admin.css", "public/css")
    .css("resources/css/products/products_show.css", "public/css")
    .css("resources/css/products/products_create.css", "public/css")
    .css("resources/css/products/products_edit.css", "public/css");
