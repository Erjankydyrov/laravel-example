@extends('layouts.app')

@section('main')
    <h1>Создание нового продукта</h1>
    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Название продукта:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="description">Описание продукта:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="price">Цена продукта:</label>
            <input type="text" id="price" name="price" required>
        </div>
        <div>
            <label for="categories">Категории продукта:</label>
            @foreach ($categories as $category)
                <div>
                    <input type="checkbox" id="category_{{ $category->id }}" name="category_ids[]"
                        value="{{ $category->id }}">
                    <label for="category_{{ $category->id }}">{{ $category->name }}</label>
                </div>
            @endforeach
        </div>
        <div>
            <label for="image">Изображение продукта:</label>
            <input type="file" id="image" name="image" required>
        </div>
        <button type="submit">Создать продукт</button>
    </form>
    <a href="{{ route('products.index') }}">Назад к списку продуктов</a>
@endsection
