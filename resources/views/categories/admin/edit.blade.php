<head>
    <link rel="stylesheet" href="{{ asset('css/categories_edit.css') }}">
</head>

@extends('layouts.app')

@section('main')
    <h1 class="edit-title">Редактирование категории: {{ $category->name }}</h1>
    <form method="post" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data"
        class="category-edit-form">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Название категории:</label>
            <input type="text" id="name" name="name" value="{{ $category->name }}" class="edit-form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Описание категории:</label>
            <textarea id="description" name="description" class="edit-form-control" required>{{ $category->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Изображение категории:</label>
            <img src="{{ asset('images/categories/' . $category->image) }}" alt="{{ $category->name }}"
                class="category-image-edit">
            <input type="file" id="image" name="image" class="edit-form-control image-edit">
        </div>
        <button type="submit" class="update-button">Обновить категорию</button>
    </form>
    <div class="edit-back-link-box">
        <a href="{{ route('categories.adminIndex') }}" class="back-link">Назад к списку категорий</a>
    </div>
@endsection

<script src="{{ asset('js/categories.js') }}"></script>
