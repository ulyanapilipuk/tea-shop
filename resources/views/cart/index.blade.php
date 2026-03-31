@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Корзина</h1>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
    @if($cartItems->isEmpty())
        <p>Корзина пуста</p>
    @else
        <table class="table">
            <thead><tr><th>Товар</th><th>Цена</th><th>Количество</th><th>Сумма</th><th></th></tr></thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ number_format($item->product->price, 2) }} руб.</td>
                    <td>
                        <form action="{{ route('cart.update', $item) }}" method="POST" style="display:inline;">
                            @csrf @method('PATCH')
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" style="width:70px">
                            <button type="submit" class="btn btn-sm btn-secondary">Обновить</button>
                        </form>
                    </td>
                    <td>{{ number_format($item->quantity * $item->product->price, 2) }} руб.</td>
                    <td>
                        <form action="{{ route('cart.remove', $item) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p><strong>Итого: {{ number_format($total, 2) }} руб.</strong></p>
        <form action="{{ route('orders.store') }}" method="POST" style="display:inline;">
            @csrf <button type="submit" class="btn btn-primary">Оформить заказ</button>
        </form>
        <form action="{{ route('cart.clear') }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger">Очистить корзину</button>
        </form>
    @endif
</div>
@endsection