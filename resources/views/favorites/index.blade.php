@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Избранное</h1>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    @if($favorites->isEmpty())
        <p>Нет избранных товаров</p>
    @else
        <div class="row">
            @foreach($favorites as $fav)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ $fav->product->image ? asset('storage/'.$fav->product->image) : 'https://via.placeholder.com/200' }}" class="card-img-top">
                    <div class="card-body">
                        <h5>{{ $fav->product->name }}</h5>
                        <p>{{ number_format($fav->product->price, 2) }} руб.</p>
                        <a href="{{ route('products.show', $fav->product) }}" class="btn btn-primary">Подробнее</a>
                        <form action="{{ route('favorite.toggle', $fav->product) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection