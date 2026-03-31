<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Product $product, Request $request)
    {
        $request->validate(['content' => 'required|string|max:1000']);
        Comment::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'content' => $request->content,
        ]);
        return redirect()->back()->with('success', 'Отзыв добавлен');
    }
}