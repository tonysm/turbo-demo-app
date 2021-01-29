<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;
    use FormatsPrice;

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
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

    public function getPriceForDisplayAttribute()
    {
        return $this->priceCentsToDisplayPrice(
            $this->total_price_cents
        );
    }
}
