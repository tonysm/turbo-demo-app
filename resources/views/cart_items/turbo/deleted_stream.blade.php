<x-turbo-stream :target="$cartItem" action="remove" />

<x-turbo-stream target="cart_items_counter" action="update">
    {{ $cartItem->cart->items()->count() }}
</x-turbo-stream>

@if($cartItem->cart->items()->count() === 0)
    <x-turbo-stream target="cart_items" action="append">
        @include('cart_items._empty_items')
    </x-turbo-stream>
@endif

<x-turbo-stream target="cart_total" action="update">
    Total: {{ $cartItem->cart->total_price_for_display }}
</x-turbo-stream>
