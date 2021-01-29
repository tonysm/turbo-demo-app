<?php

namespace App\Http\Controllers;

use App\Models\NullCart;

class CartsController extends Controller
{
    public function index()
    {
        return view('carts.index', [
            'cart' => auth()->user()->cart ?: new NullCart,
        ]);
    }
}
