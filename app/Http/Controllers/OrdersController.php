<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
    {
        return view('orders.index', [
            'orders' => auth()->user()->orders()->latest()->get(),
        ]);
    }

    public function show(Order $order)
    {
        $this->authorize('view', $order);

        return view('orders.show', [
            'order' => $order,
        ]);
    }
}
