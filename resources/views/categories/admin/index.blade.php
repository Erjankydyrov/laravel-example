@extends('layouts.app')

@section('main')
    <h1>Список категорий (Административная часть)</h1>
    <ul>
        @foreach ($categories as $category)
            <li>
                {{ $category->name }}
                <a href="{{ route('categories.edit', $category->id) }}">Редактировать</a>
                <form method="post" action="{{ route('categories.destroy', $category->id) }}">
                    @csrf
                    @method('delete')
                    <button type="submit">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('categories.create') }}">Добавить категорию</a>
@endsection
