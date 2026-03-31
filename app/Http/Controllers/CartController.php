<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')
            ->where('user_id', auth()->id())
            ->get();
        $total = $cartItems->sum(fn($item) => $item->quantity * $item->product->price);
        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Product $product)
    {
        $cartItem = CartItem::firstOrCreate(
            ['user_id' => auth()->id(), 'product_id' => $product->id],
            ['quantity' => 0]
        );
        $cartItem->increment('quantity');
        return redirect()->back()->with('success', 'Товар добавлен в корзину');
    }

    public function update(CartItem $cartItem, Request $request)
    {
        if ($cartItem->user_id !== auth()->id()) abort(403);
        $request->validate(['quantity' => 'required|integer|min:1']);
        $cartItem->update(['quantity' => $request->quantity]);
        return redirect()->route('cart.index');
    }

    public function remove(CartItem $cartItem)
    {
        if ($cartItem->user_id !== auth()->id()) abort(403);
        $cartItem->delete();
        return redirect()->route('cart.index');
    }

    public function clear()
    {
        CartItem::where('user_id', auth()->id())->delete();
        return redirect()->route('cart.index');
    }
}