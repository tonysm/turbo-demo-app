<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public function getPriceForDisplayAttribute()
    {
        return sprintf('$ %s', number_format($this->price_cents / 100, 2));
    }
}
