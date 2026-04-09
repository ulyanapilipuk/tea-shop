@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center" style="color: #d4af37;">🍃 Избранное</h2>
    @if($favorites->isEmpty())
        <div class="alert alert-info text-center">У вас пока нет избранных товаров.</div>
    @else
        <div class="row">
            @foreach($favorites as $fav)
                <div class="col-md-3 mb-4">
                    <div class="card card-tea h-100">
                        <img src="{{ $fav->product->image ? asset($fav->product->image) : 'https://via.placeholder.com/300x200?text=Чай' }}" class="card-img-top" style="height: 180px; object-fit: cover; border-radius: 24px 24px 0 0;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $fav->product->name }}</h5>
                            <p class="card-text small">{{ Str::limit($fav->product->description, 80) }}</p>
                            <p class="mt-auto"><strong>{{ number_format($fav->product->price, 2) }} BYN</strong></p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('products.show', $fav->product) }}" class="btn btn-sm btn-tea">Подробнее</a>
                                <form action="{{ route('favorite.toggle', $fav->product) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection