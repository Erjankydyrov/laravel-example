<head>
    <link rel="stylesheet" href="{{ asset('css/categories_show.css') }}">
</head>

@extends('layouts.app')

@section('main')
    <div class="category-details">
        <div class="category-description">
            <h1 class="category-title">{{ $category->name }}</h1>
            <p>{{ $category->description }}</p>
        </div>
        <img src="{{ asset('images/categories/' . $category->image) }}" alt="{{ $category->name }}" class="category-image">
    </div>

    <h2 class="list-title">Продукты в этой категории:</h2>

    @if (count($category->products) > 0)
        <div class="product-list">
            @foreach ($category->products as $product)
                <a href="{{ route('products.show', ['category' => $category->id, 'id' => $product->id]) }}"
                    class="product-item">
                    <div class="product-box-image">
                        <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}"
                            class="product-image">
                    </div>
                    <h3 class="product-title">{{ $product->name }}</h3>
                </a>
            @endforeach
        </div>
    @else
        <p>В этой категории нет продуктов.</p>
    @endif
    </div>
@endsection
