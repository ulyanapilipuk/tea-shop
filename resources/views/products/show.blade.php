@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $product->image ? asset('storage/'.$product->image) : 'https://via.placeholder.com/400' }}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p><strong>Цена:</strong> {{ number_format($product->price, 2) }} руб.</p>
            <p><strong>Страна:</strong> {{ $product->origin ?? 'не указана' }}</p>
            <p><strong>Вес:</strong> {{ $product->weight ?? '—' }} г</p>
            <p>{{ $product->description }}</p>

            @auth
                <form action="{{ route('cart.add', $product) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-success">В корзину</button>
                </form>

                <form action="{{ route('favorite.toggle', $product) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        {{ auth()->user()->favorites()->where('product_id', $product->id)->exists() ? 'Убрать из избранного' : 'В избранное' }}
                    </button>
                </form>
            @endauth
        </div>
    </div>

    <!-- Комментарии -->
    <div class="mt-5">
        <h3>Отзывы</h3>
        @foreach($product->comments as $comment)
            <div class="card mb-2">
                <div class="card-body">
                    <strong>{{ $comment->user->name }}</strong> – {{ $comment->created_at->diffForHumans() }}
                    <p>{{ $comment->content }}</p>
                </div>
            </div>
        @endforeach

        @auth
            <form action="{{ route('comments.store', $product) }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="content" class="form-control" rows="3" placeholder="Ваш отзыв..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Добавить отзыв</button>
            </form>
        @else
            <p>Чтобы оставить отзыв, <a href="{{ route('login') }}">войдите</a>.</p>
        @endauth
    </div>
</div>
@endsection