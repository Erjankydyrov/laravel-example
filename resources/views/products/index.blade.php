@extends('layouts.app')

@section('main')
    <h1>Список продуктов</h1>
    <ul>
        @foreach ($products as $product)
            <li>
                <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('products.create') }}">Добавить продукт</a>
    
@endsection
