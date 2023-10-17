@extends('layouts.app')

@section('main')
    <div>
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <p>Цена: ${{ $product->price }}</p>
        <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}">

        <a href="{{ route('products.index') }}">Назад к списку продуктов</a>
    </div>
@endsection
