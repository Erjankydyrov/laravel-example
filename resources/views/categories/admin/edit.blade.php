@extends('layouts.app')

@section('main')
    <h1>Редактирование категории: {{ $category->name }}</h1>
    <form method="post" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label for="name">Название категории:</label>
            <input type="text" id="name" name="name" value="{{ $category->name }}" required>
        </div>
        <div>
            <label for="description">Описание категории:</label>
            <textarea id="description" name="description" required>{{ $category->description }}</textarea>
        </div>
        <div>
            <label for="image">Изображение категории:</label>
            <input type="file" id="image" name="image">
        </div>
        <button type="submit">Обновить категорию</button>
    </form>
    <a href="{{ route('categories.adminIndex') }}">Назад к списку категорий</a>
@endsection
