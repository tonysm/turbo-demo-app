<turbo-stream target="@domid($cartItem)" action="remove"></turbo-stream>

<turbo-stream target="cart_items_counter" action="update">
    <template>{{ $cartItem->cart->items()->count() }}</template>
</turbo-stream>

@if($cartItem->cart->items()->count() === 0)
    <turbo-stream target="cart_items" action="append">
        <template>
            @include('cart_items._empty_items')
        </template>
    </turbo-stream>
@endif

<turbo-stream target="cart_total" action="update">
    <template>
        Total: {{ $cartItem->cart->total_price_for_display }}
    </template>
</turbo-stream>
