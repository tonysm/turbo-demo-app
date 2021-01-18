<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;

class CartItemsController extends Controller
{
    public function store()
    {
        $cart = auth()->user()->cart()->firstOrCreate();
        $cartItem = $cart->addOrIncrementItem(Product::findOrFail(request()->input('product_id')));

        if (request()->wantsTurboStream()) {
            return response()->turboStream($cartItem);
        }

        return redirect()->route('shop.index');
    }

    public function update(CartItem $cartItem)
    {
        $cartItem->update([
            'quantity' => max(intval(request()->input('quantity', 1)), 1),
        ]);

        if (request()->wantsTurboStream()) {
            return response()->turboStream($cartItem);
        }

        return redirect()->route('shop.index');
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();

        if (request()->wantsTurboStream()) {
            return response()->turboStream($cartItem);
        }

        return redirect()->route('shop.index');
    }
}
