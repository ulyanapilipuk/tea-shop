@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center" style="color: #d4af37;">🛒 Корзина</h2>
    @if($cartItems->isEmpty())
        <div class="alert alert-info text-center">Корзина пуста.</div>
    @else
        <div class="table-responsive">
            <table class="table table-dark table-striped" style="background: rgba(44,58,43,0.9); border-radius: 16px;">
                <thead style="background: #1e2a1f;">
                    <tr><th>Товар</th><th>Цена (BYN)</th><th>Количество</th><th>Сумма</th><th></th></tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ number_format($item->product->price, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item) }}" method="POST" class="d-flex gap-2">
                                @csrf @method('PATCH')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control form-control-sm" style="width:70px; background:#3a4a38; color:white; border-color:#d4af37;">
                                <button type="submit" class="btn btn-sm btn-tea">Обновить</button>
                            </form>
                         </td>
                        <td>{{ number_format($item->quantity * $item->product->price, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                            </form>
                         </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr><th colspan="3" class="text-end">Итого:</th><th>{{ number_format($total, 2) }} BYN</th><th></th></tr>
                </tfoot>
            </table>
        </div>
        <div class="mt-4 d-flex justify-content-end gap-3">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-tea">Оформить заказ</button>
            </form>
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Очистить корзину</button>
            </form>
        </div>
    @endif
</div>
@endsection