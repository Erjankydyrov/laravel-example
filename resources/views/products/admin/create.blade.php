<head>
    <link rel="stylesheet" href="{{ asset('css/products_create.css') }}">
</head>

@extends('layouts.app')

@section('main')
    <h1 class="create-form-title">Создание нового продукта</h1>
    <form class="create-product-form" method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="create-form-group">
            <label for="name">Название продукта:</label>
            <input type="text" id="name" name="name" required class="create-form-control">
        </div>
        <div class="create-form-group">
            <label for="description">Описание продукта:</label>
            <textarea id="description" name="description" required class="create-form-control"></textarea>
        </div>
        <div class="create-form-group">
            <label for="price">Цена продукта:</label>
            <input type="text" id="price" name="price" required class="create-form-control">
        </div>
        <div class="create-form-group">
            <label for="categories">Категории продукта:</label>
            @foreach ($categories as $category)
                <div class="create-checkbox">
                    <input type="checkbox" id="category_{{ $category->id }}" name="category_ids[]"
                        value="{{ $category->id }}" class="create-form-check-input">
                    <label for="category_{{ $category->id }}" class="create-form-check-label">{{ $category->name }}</label>
                </div>
            @endforeach
        </div>
        <div class="create-form-group">
            <label for="image">Изображение продукта:</label>
            <input type="file" id="image" name="image" required class="create-form-control create-input-product">
            <img id="product-preview-create" src="#" alt="product preview create">
        </div>
        <button type="submit" class="create-btn">Создать продукт</button>
    </form>
    <a href="{{ route('products.index') }}" class="create-back-link">Назад к списку продуктов</a>
@endsection

<script src="{{ asset('js/products_create.js') }}"></script>