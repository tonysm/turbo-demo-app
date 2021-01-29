<turbo-stream target="cart_total" action="update">
    <template>
        Total: {{ $cartItem->cart->total_price_for_display }}
    </template>
</turbo-stream>
