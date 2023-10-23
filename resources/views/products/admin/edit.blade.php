@extends('layouts.app')

@section('main')
    <h1>Редактирование продукта: {{ $product->name }}</h1>
    <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label for="name">Название продукта:</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div>
            <label for="description">Описание продукта:</label>
            <textarea id="description" name="description" required>{{ $product->description }}</textarea>
        </div>
        <div>
            <label for="price">Цена продукта:</label>
            <input type="text" id="price" name="price" value="{{ $product->price }}" required>
        </div>
        <div>
            <label for="categories">Категории продукта:</label>
            @foreach ($categories as $category)
                <div>
                    <input type="checkbox" id="category_{{ $category->id }}" name="category_ids[]"
                        value="{{ $category->id }}" {{ in_array($category->id, $selectedCategoryIds) ? 'checked' : '' }}>
                    <label for="category_{{ $category->id }}">{{ $category->name }}</label>
                </div>
            @endforeach
        </div>
        <div>
            <label for="image">Изображение продукта:</label>
            <input type="file" id="image" name="image">
        </div>
        <button type="submit">Обновить продукт</button>
    </form>
    <a href="{{ route('products.index') }}">Назад к списку продуктов</a>
@endsection
