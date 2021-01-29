<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use FormatsPrice;

    protected $guarded = [];

    public static function createFromCart(string $paymentOption, Cart $cart)
    {
        $order = static::create([
            'user_id' => $cart->user_id,
            'payment_option' => $paymentOption,
            'total_price_cents' => $cart->total_price_cents,
        ]);

        $orderItems = $cart->items->map(function (CartItem $item) {
            return new OrderItem([
                'product_id' => $item->product_id,
                'unit_price_cents' => $item->unit_price_cents,
                'quantity' => $item->quantity,
            ]);
        });

        $order->items()->saveMany($orderItems);

        return $order;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getTotalPriceForDisplayAttribute()
    {
        return $this->priceCentsToDisplayPrice($this->total_price_cents);
    }
}
