<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property-read \App\Models\User $user
 * @property-read int $total_price_cents
 * @property-read int $total_price_for_display
 */
class Cart extends Model
{
    use HasFactory;
    use FormatsPrice;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function addOrIncrementItem(Product $product): CartItem
    {
        $cartItem = $this->items()->firstOrCreate(
            ['product_id' => $product->id],
            ['unit_price_cents' => $product->price_cents, 'quantity' => 1]
        );

        return $cartItem;
    }

    public function getTotalPriceCentsAttribute()
    {
        return $this->items->sum(function ($item) {
            return $item->total_price_cents;
        });
    }

    public function getTotalPriceForDisplayAttribute()
    {
        return $this->priceCentsToDisplayPrice($this->total_price_cents);
    }
}
