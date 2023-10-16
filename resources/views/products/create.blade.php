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
            <label for="image">Изображение продукта:</label>
            <input type="file" id="image" name="image" required>
        </div>
        <button type="submit">Создать продукт</button>
    </form>
    <a href="{{ route('products.index') }}">Назад к списку продуктов</a>
@endsection
