@extends('layouts.app')

@section('content')
<h2 class="mb-4 text-center" style="color: #d4af37;">📦 Мои заказы</h2>

@if($orders->isEmpty())
    <div class="alert alert-info text-center">У вас пока нет заказов.</div>
@else
    <div class="table-responsive">
        <table class="table table-custom">
            <thead>
                <tr>
                    <th>№ заказа</th>
                    <th>Дата</th>
                    <th>Статус</th>
                    <th>Сумма (BYN)</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d.m.Y') }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ number_format($order->items->sum(fn($i) => $i->quantity * $i->price), 2) }}</td>
                    <td><a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-tea">Детали</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection 