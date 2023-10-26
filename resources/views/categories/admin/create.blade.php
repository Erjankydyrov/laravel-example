<head>
    <link rel="stylesheet" href="{{ asset('css/categories_create.css') }}">
</head>

@extends('layouts.app')

@section('main')
    <h1 class="create-category-title">Создание новой категории</h1>
    <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data" class="category-create-form">
        @csrf
        <div class="form-group">
            <label for="name">Название категории:</label>
            <input type="text" id="name" name="name" class="create-form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Описание категории:</label>
            <textarea id="description" name="description" class="create-form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Изображение категории:</label>
            <input type="file" id="image" name="image" class="image-create" class="create-form-control" required>
            <img id="image-preview" class="image-preview" src="" alt="">
        </div>
        <button type="submit" class="create-button">Создать категорию</button>
    </form>
    <div class="create-back-link-box">
        <a href="{{ route('categories.adminIndex') }}" class="back-link">Назад к списку категорий</a>
    </div>
@endsection

<script src="{{ asset('js/categories_create.js') }}"></script>
