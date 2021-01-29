<?php

namespace App\Http\Controllers;

use App\Models\NullCart;
use App\Models\Order;

class CheckoutsController extends Controller
{
    public function index()
    {
        return view('checkouts.index', [
            'cart' => auth()->user()->cart ?: new NullCart(),
        ]);
    }

    public function store()
    {
        request()->validate(['payment_option' => 'required|in:free']);

        $cart = auth()->user()->cart;

        if (! $cart) {
            return redirect()->route('checkout.index');
        }

        $order = Order::createFromCart(
            request()->input('payment_option'),
            $cart
        );

        $cart->items->each->delete();
        $cart->delete();

        return redirect()->route('orders.show', $order);
    }
}
