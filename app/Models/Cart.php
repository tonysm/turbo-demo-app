<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function getTotalPriceForDisplayAttribute()
    {
        $totalPriceCents = $this->items->sum(function (CartItem $cartItem) {
            return $cartItem->unit_price_cents * $cartItem->quantity;
        });

        return sprintf('$ %s', number_format($totalPriceCents / 100, 2));
    }

    public function addOrIncrementItem(Product $product): CartItem
    {
        $cartItem = $this->items()->firstOrCreate(
            ['product_id' => $product->id],
            ['unit_price_cents' => $product->price_cents, 'quantity' => 0]
        );

        $cartItem->increment('quantity');

        return $cartItem;
    }
}
