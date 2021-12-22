<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="{{ route('shop.index') }}">{{ __('Shop') }}</a> / Checkout
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-4 gap-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="col-span-3 space-y-2 bg-white divide-y shadow">
                <h3 class="p-4 text-lg font-semibold">Items</h3>

                <x-turbo-frame id="cart_items" class="flex flex-col w-full p-6 space-y-2">
                    @foreach($cart->items as $cartItem)
                        @include('cart_items._cart_item', ['cartItem' => $cartItem])
                    @endforeach

                    @if(count($cart->items) === 0)
                        @include('cart_items._empty_items')
                    @endif
                </x-turbo-frame>

                <div id="cart_total" class="p-4 text-lg font-semibold">
                    Total: {{ $cart->total_price_for_display }}
                </div>
            </div>

            <div class="cols-1">
                <div class="p-4 space-y-2 bg-gray-200 rounded shadow">
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
                                class="block w-full px-4 py-2 text-white bg-indigo-600 rounded hover:bg-indigo-500 disabled:opacity-50"
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
