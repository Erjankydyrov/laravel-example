@extends('layouts.app')

@section('main')
    <div>
        <h1>{{ $category->name }}</h1>
        <p>{{ $category->description }}</p>
        <img src="{{ asset('images/categories/' . $category->image) }}" alt="{{ $category->name }}">

        <a href="{{ route('categories.index') }}">Назад к списку категорий</a>
    </div>
@endsection
