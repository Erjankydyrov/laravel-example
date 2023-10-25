<head>
    <link rel="stylesheet" href="{{ asset('css/products_edit.css') }}">
</head>

@extends('layouts.app')

@section('main')
    <h1 class="edit-form-title">Редактирование продукта: {{ $product->name }}</h1>
    <form class="edit-product-form" method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="edit-form-group">
            <label for="name">Название продукта:</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" required class="edit-form-control">
        </div>
        <div class="edit-form-group">
            <label for="description">Описание продукта:</label>
            <textarea id="description" name="description" required class="edit-form-control">{{ $product->description }}</textarea>
        </div>
        <div class="edit-form-group">
            <label for="price">Цена продукта:</label>
            <input type="text" id="price" name="price" value="{{ $product->price }}" required class="edit-form-control">
        </div>
        <div class="edit-form-group">
            <label for="categories">Категории продукта:</label>
            @foreach ($categories as $category)
                <div class="edit-checkbox">
                    <input type="checkbox" id="category_{{ $category->id }}" name="category_ids[]"
                        value="{{ $category->id }}" {{ in_array($category->id, $selectedCategoryIds) ? 'checked' : '' }} class="edit-form-check-input">
                    <label for="category_{{ $category->id }}" class="edit-form-check-label">{{ $category->name }}</label>
                </div>
            @endforeach
        </div>
        <div class="edit-form-group">
            <label for="image">Изображение продукта:</label>
            <input type="file" id="image" name="image" class="edit-form-control edit-input-product">
            <img id="product-preview-edit" src="{{ asset('images/products/' . $product->image) }}" alt="product preview edit">
        </div>
        <button type="submit" class="edit-btn">Обновить продукт</button>
    </form>
    <a href="{{ route('products.index') }}" class="edit-back-link">Назад к списку продуктов</a>
@endsection

<script src="{{ asset('js/products_edit.js') }}"></script>