@extends('layouts.app')

@section('main')
    <div>
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <p>Цена: ${{ $product->price }}</p>
        <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}">

        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Изменить</a>
        <a href="{{ route('products.index') }}">Назад к списку продуктов</a>
    </div>
    <form method="post" action="{{ route('products.destroy', $product->id) }}">
        @csrf
        @method('delete')
        <button type="submit">Удалить продукт</button>
    </form>
@endsection
