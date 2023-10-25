<head>
    <link rel="stylesheet" href="{{ asset('css/products_admin.css') }}">
</head>

@extends('layouts.app')

@section('main')
    <h1 class="admin-product-title">Список продуктов</h1>
    <div class="admin-product-list">
        @foreach ($products as $product)
            <div class="admin-product-card">
                <div class="admin-product-image-container">
                    @if ($product->image)
                        <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}"
                            class="admin-product-image">
                    @endif
                </div>
                <div class="admin-product-title">{{ $product->name }}</div>
                <div class="admin-product-actions">
                    <a href="{{ route('products.edit', $product->id) }}" class="admin-product-edit">Редактировать</a>
                    <form method="post" class="admin-product-delete-form"
                        action="{{ route('products.destroy', $product->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="admin-product-delete">Удалить</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="btn-add-box">
        <a href="{{ route('products.create') }}" class="btn-add-product">Добавить продукт</a>
    </div>
@endsection
