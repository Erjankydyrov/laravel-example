@extends('layouts.app')

@section('main')
    <h1>Список продуктов (Административная часть)</h1>
    <ul>
        @foreach ($products as $product)
            <li>
                {{ $product->name }}
                <a href="{{ route('products.edit', $product->id) }}">Редактировать</a>
                <form method="post" action="{{ route('products.destroy', $product->id) }}">
                    @csrf
                    @method('delete')
                    <button type="submit">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('products.create') }}">Добавить продукт</a>
@endsection
