<x-turbo-stream target="empty_cart_items" action="remove" />

<x-turbo-stream target="cart_items" action="append">
    @include('cart_items._cart_item', ['cartItem' => $cartItem])
</x-turbo-stream>

<x-turbo-stream target="cart_items_counter" action="update">
    {{ $cartItem->cart->items()->count() }}
</x-turbo-stream>

<x-turbo-stream target="cart_total" action="update">
    Total: {{ $cartItem->cart->total_price_for_display }}
</x-turbo-stream>
