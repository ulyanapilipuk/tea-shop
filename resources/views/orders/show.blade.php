@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Заказ №{{ $order->id }}</h1>
    <p>Статус: {{ $order->status }}</p>
    <p>Дата: {{ $order->created_at->format('d.m.Y H:i') }}</p>
    <h3>Товары</h3>
    <table class="table">
        <thead><tr><th>Наименование</th><th>Цена</th><th>Количество</th><th>Сумма</th></tr></thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ number_format($item->price, 2) }} руб.</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->quantity * $item->price, 2) }} руб.</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p><strong>Итого: {{ number_format($order->items->sum(fn($i)=>$i->quantity*$i->price), 2) }} руб.</strong></p>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Назад к заказам</a>
</div>
@endsection