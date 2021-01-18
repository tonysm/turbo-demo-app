<?php

namespace App\Http\Controllers;

class CartsController extends Controller
{
    public function index()
    {
        return view('carts.index', [
            'cart' => auth()->user()->cart,
        ]);
    }
}
