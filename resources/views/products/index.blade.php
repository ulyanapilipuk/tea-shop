@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Наш чай</h1>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ $product->image ? asset('storage/'.$product->image) : 'https://via.placeholder.com/200' }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                        <p class="card-text"><strong>{{ number_format($product->price, 2) }} руб.</strong></p>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $products->links() }}
</div>
@endsection