<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

class CartItemsController extends Controller
{
    public function store()
    {
        $cart = auth()->user()->cart()->firstOrCreate();
        $cartItem = $cart->addOrIncrementItem(Product::findOrFail(request()->input('product_id')));

        if (Request::wantsTurboStream()) {
            return Response::turboStream($cartItem);
        }

        return redirect()->route('shop.index');
    }

    public function update(CartItem $cartItem)
    {
        $this->authorize('update', $cartItem);

        $cartItem->update([
            'quantity' => max(intval(request()->input('quantity', 1)), 1),
        ]);

        if (Request::wantsTurboStream()) {
            return Response::turboStream($cartItem);
        }

        return redirect()->route('shop.index');
    }

    public function destroy(CartItem $cartItem)
    {
        $this->authorize('delete', $cartItem);

        $cartItem->delete();

        if (Request::wantsTurboStream()) {
            return Response::turboStream($cartItem);
        }

        return redirect()->route('shop.index');
    }
}
