<head>
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">
</head>

@extends('layouts.app')

@section('main')
    <h1>Список категорий</h1>
    <div class="category-cards">
        @foreach ($categories as $category)
            <div class="category-card">
                <div class="category-image-container">
                    @if ($category->image)
                        <img src="{{ asset('images/categories/' . $category->image) }}" alt="{{ $category->name }}"
                            class="category-image">
                    @endif
                </div>
                <h2 class="category-title">{{ $category->name }}</h2>
                <p class="category-description">{{ $category->description }}</p>
                <a href="{{ route('categories.show', $category->id) }}" class="category-link">Подробнее</a>
            </div>
        @endforeach
    </div>
@endsection
