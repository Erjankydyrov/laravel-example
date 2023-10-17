@extends('layouts.app')

@section('main')
    <h1>Создание новой категории</h1>
    <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Название категории:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="description">Описание категории:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="image">Изображение категории:</label>
            <input type="file" id="image" name="image" required>
        </div>
        <button type="submit">Создать категорию</button>
    </form>
    <a href="{{ route('categories.adminIndex') }}">Назад к списку категорий</a>
@endsection
