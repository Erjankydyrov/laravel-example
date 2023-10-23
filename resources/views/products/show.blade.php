<head>
    <link rel="stylesheet" href="{{ asset('css/products_show.css') }}">
</head>

@extends('layouts.app')

@section('main')
    <div class="product-details">
        <div class="product-details-image">
            <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
        </div>
        <div class="product-text">
            <h1 class="product-title">{{ $product->name }}</h1>
            <p class="product-description">{{ $product->description }}</p>
            <p class="product-price">Цена: ${{ $product->price }}</p>
            <a href="{{ route('products.index') }}" class="back-link">Назад к списку продуктов</a>
        </div>
    </div>
@endsection
