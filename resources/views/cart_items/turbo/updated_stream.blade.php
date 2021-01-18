<turbo-stream target="@domid($cartItem)" action="replace">
    <template>
        @include('cart_items._cart_item', ['cartItem' => $cartItem])
    </template>
</turbo-stream>

<turbo-stream target="cart_total" action="update">
    <template>
        Total: {{ $cartItem->cart->total_price_for_display }}
    </template>
</turbo-stream>
