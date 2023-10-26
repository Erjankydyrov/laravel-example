<head>
    <link rel="stylesheet" href="{{ asset('css/categories_admin.css') }}">
</head>

@extends('layouts.app')

@section('main')
    <h1 class="admin-categories-title">Список категорий</h1>
    <div class="category-cards-admin">
        @foreach ($categories as $category)
            <div class="category-card-admin">
                <div class="category-image-container-admin">
                    @if ($category->image)
                        <img src="{{ asset('images/categories/' . $category->image) }}" alt="{{ $category->name }}"
                            class="category-image-admin">
                    @endif
                </div>
                <div class="category-title-admin">{{ $category->name }}</div>
                <div class="category-actions-admin">
                    <a href="{{ route('categories.edit', $category->id) }}" class="edit-link-admin">Редактировать</a>
                    <form method="post" action="{{ route('categories.destroy', $category->id) }}"
                        class="admin-category-delete-form">
                        @csrf
                        @method('delete')
                        <button type="submit" class="delete-button-admin">Удалить</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="category-add-box">
        <a href="{{ route('categories.create') }}" class="add-category-link-admin">Добавить категорию</a>
    </div>
@endsection
