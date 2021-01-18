<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function getNameForDisplayAttribute()
    {
        return $this->product->name;
    }

    public function getPriceForDisplayAttribute()
    {
        $priceCents = $this->unit_price_cents * $this->quantity;

        return sprintf('$ %s', number_format($priceCents / 100, 2));
    }
}
