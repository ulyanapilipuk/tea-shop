@extends('layouts.app')

@section('content')
<div class="hero">
    <div class="container">
        <h1>🍃 Чайный путь</h1>
        <p class="lead">Изысканные сорта чая из Китая, Японии, Индии и Цейлона</p>
        <div style="font-size: 2rem; letter-spacing: 8px;">茶</div>
    </div>
</div>

<div class="container">
    <h2 class="mb-4 text-center" style="color: #d4af37;">Наше собрание</h2>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card card-tea h-100">
                    <img src="{{ $product->image ? asset($product->image) : 'https://via.placeholder.com/300x200?text=Чай' }}" class="card-img-top" style="height: 180px; object-fit: cover; border-radius: 12px 12px 0 0;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text small">{{ Str::limit($product->description, 80) }}</p>
                        <p class="mt-auto"><strong>{{ number_format($product->price, 2) }} byn / 100 г</strong></p>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-tea mt-2">Подробнее</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>
@endsection