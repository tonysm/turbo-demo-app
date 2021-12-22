<x-turbo-stream target="cart_total" action="update">
    Total: {{ $cartItem->cart->total_price_for_display }}
</x-turbo-stream>
