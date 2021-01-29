<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('shop.index') }}">{{ __('Shop') }}</a> / Checkout
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-4 gap-4">
            <div class="col-span-3 bg-white shadow space-y-2 divide-y">
                <h3 class="text-lg font-semibold p-4">Items</h3>

                <turbo-frame id="cart_items" class="flex flex-col space-y-2 p-6 w-full">
                    @foreach($cart->items as $cartItem)
                        @include('cart_items._cart_item', ['cartItem' => $cartItem])
                    @endforeach

                    @if(count($cart->items) === 0)
                        @include('cart_items._empty_items')
                    @endif
                </turbo-frame>

                <div id="cart_total" class="p-4 text-lg font-semibold">
                    Total: {{ $cart->total_price_for_display }}
                </div>
            </div>

            <div class="cols-1">
                <div class="p-4 bg-gray-200 rounded shadow space-y-2">
                    <h3 class="text-lg font-semibold">Payment Info.</h3>

                    <p>Hey, since this is a demo app, you only have one option:</p>

                    <form action="{{ route('checkout.store') }}" method="post" class="space-y-4">
                        @csrf

                        <label for="free" class="block">
                            <input type="radio" id="free" name="payment_option" value="free" required />
                            <span>Free</span>
                        </label>

                        <div class="block">
                            <button
                                type="submit"
                                @if(! $cart->exists) disabled @endif
                                class="block w-full px-4 py-2 rounded bg-indigo-600 hover:bg-indigo-500 text-white disabled:opacity-50"
                            >
                                Complete Checkout
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
