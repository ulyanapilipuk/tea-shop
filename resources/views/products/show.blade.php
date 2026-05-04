@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        @if($product->image && file_exists(public_path($product->image)))
            <img src="{{ asset($product->image) }}" class="img-fluid rounded" style="border-radius: 24px; box-shadow: 0 10px 20px rgba(0,0,0,0.3);" alt="{{ $product->name }}">
        @else
            <img src="https://via.placeholder.com/500x400?text=Нет+фото" class="img-fluid rounded" style="border-radius: 24px;" alt="Нет фото">
        @endif
    </div>
    <div class="col-md-6">
        <h1>{{ $product->name }}</h1>
        <p><strong>Цена:</strong> {{ number_format($product->price, 2) }} BYN</p>
        <p><strong>Страна:</strong> {{ $product->origin ?? 'не указана' }}</p>
        <p><strong>Вес:</strong> {{ $product->weight ?? '—' }} г</p>
        <p>{{ $product->description }}</p>

        @auth
            <form action="{{ route('cart.add', $product) }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-tea">🛒 В корзину</button>
            </form>
            <form action="{{ route('favorite.toggle', $product) }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-tea">
                    @if(auth()->user()->favorites()->where('product_id', $product->id)->exists())
                        ❤️ Убрать из избранного
                    @else
                        🤍 В избранное
                    @endif
                </button>
            </form>
        @endauth
    </div>
</div>

<!-- БЛОК ОТЗЫВОВ -->
<div class="mt-5">
    <h3 class="mb-3" style="color: #d4af37;">📝 Отзывы</h3>

    @if($product->comments->count())
        @foreach($product->comments as $comment)
            <div class="card mb-3" style="background: #f8f9fa; color: #212529; border-left: 5px solid #d4af37;">
                <div class="card-body">
                    <strong>{{ $comment->user->name }}</strong> – <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                    <p class="mt-2">{{ $comment->content }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p>Пока нет отзывов. Будьте первым!</p>
    @endif

    @auth
        <div class="mt-4 p-3" style="background: rgba(44,58,43,0.85); border-radius: 16px; backdrop-filter: blur(2px);">
            <h5>Написать отзыв</h5>
            <form action="{{ route('comments.store', $product) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea name="content" class="form-control" rows="3" placeholder="Поделитесь впечатлением о чае..." style="background: rgba(255,255,255,0.9); color: #000;"></textarea>
                </div>
                <button type="submit" class="btn btn-tea">Отправить отзыв</button>
            </form>
        </div>
    @else
        <p class="mt-3">Чтобы оставить отзыв, <a href="{{ route('login') }}" style="color: #d4af37;">войдите</a>.</p>
    @endauth
</div>
@endsection