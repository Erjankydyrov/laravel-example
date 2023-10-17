@extends('layouts.app')

@section('main')
    <h1>Список продуктов</h1>
    <ul>
        @foreach ($categories as $category)
            <li>
                <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection
