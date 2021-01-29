<?php

namespace App\Policies;

use App\Models\CartItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CartItemPolicy
{
    use HandlesAuthorization;

    public function update(User $user, CartItem $cartItem)
    {
        return $user->id === $cartItem->cart->user_id;
    }

    public function delete(User $user, CartItem $cartItem)
    {
        return $user->id === $cartItem->cart->user_id;
    }
}
