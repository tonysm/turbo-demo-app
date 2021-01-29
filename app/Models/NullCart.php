<?php

namespace App\Models;

class NullCart
{
    public $items = [];
    public $total_price_for_display = "$ 0.00";
    public $exists = false;
}
