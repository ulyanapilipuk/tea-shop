@extends('layouts.app')

@section('content')
<h2 class="mb-4 text-center" style="color: #d4af37;">📄 Заказ №{{ $order->id }}</h2>

<p><strong>Статус:</strong> {{ $order->status }}</p>
<p><strong>Дата:</strong> {{ $order->created_at->format('d.m.Y H:i') }}</p>

<h3 class="mt-4">Состав заказа</h3>
<div class="table-responsive">
    <table class="table table-custom">
        <thead>
            <tr><th>Наименование</th><th>Цена (BYN)</th><th>Количество</th><th>Сумма</th></tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ number_format($item->price, 2) }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->quantity * $item->price, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr><th colspan="3" class="text-end">Итого:</th><th>{{ number_format($order->items->sum(fn($i)=>$i->quantity*$i->price), 2) }} BYN</th></tr>
        </tfoot>
    </table>
</div>

<a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">← Назад к заказам</a>
@endsection