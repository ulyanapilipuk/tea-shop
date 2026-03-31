@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Мои заказы</h1>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    @if($orders->isEmpty())
        <p>У вас пока нет заказов.</p>
    @else
        <table class="table">
            <thead><tr><th>№ заказа</th><th>Дата</th><th>Статус</th><th>Сумма</th><th></th></tr></thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d.m.Y') }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ number_format($order->items->sum(fn($i)=>$i->quantity*$i->price), 2) }} руб.</td>
                    <td><a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info">Детали</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection