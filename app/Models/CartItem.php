<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;
    use FormatsPrice;

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

    public function getUnitPriceForDisplayAttribute()
    {
        return $this->priceCentsToDisplayPrice(
            $this->unit_price_cents
        );
    }

    public function getTotalPriceCentsAttribute()
    {
        return $this->unit_price_cents * $this->quantity;
    }

    public function getTotalPriceForDisplayAttribute()
    {
        return $this->priceCentsToDisplayPrice(
            $this->total_price_cents
        );
    }
}
