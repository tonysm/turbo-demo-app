<?php

namespace App\Models;

trait FormatsPrice
{
    public function priceCentsToDisplayPrice(int $priceCents): string
    {
        return sprintf('$ %s', number_format($priceCents / 100, 2));
    }
}
