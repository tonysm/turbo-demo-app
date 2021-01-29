<turbo-stream target="empty_cart_items" action="remove"></turbo-stream>

<turbo-stream target="cart_items" action="append">
    <template>
        @include('cart_items._cart_item', ['cartItem' => $cartItem])
    </template>
</turbo-stream>

<turbo-stream target="cart_items_counter" action="update">
    <template>{{ $cartItem->cart->items()->count() }}</template>
</turbo-stream>

<turbo-stream target="cart_total" action="update">
    <template>
        Total: {{ $cartItem->cart->total_price_for_display }}
    </template>
</turbo-stream>
