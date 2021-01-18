<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('shop.index') }}">{{ __('Shop') }}</a> / Cart
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <turbo-frame id="carts" class="space-y-4">
                <x-jet-dropdown align="right" width="w-96" contentClasses="py-1 bg-gray-100">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center px-4 space-x-1 py-2 text-sm border-2 border-transparent rounded-full text-gray-500 hover:text-gray-700 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out border border-gray-300"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <div id="cart_items_counter" class="rounded-full px-2 text-gray-700">
                                {{ count($cart->items) }}
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="p-4 space-y-4">
                            <div id="cart_items" class="space-y-4 max-h-3/4 overflow-y-auto">
                                @foreach($cart->items as $cartItem)
                                    @include('cart_items._cart_item', ['cartItem' => $cartItem])
                                @endforeach

                                @empty($cart->items)
                                    <div class="bg-white text-base rounded py-2 px-4 flex justify-between items-center">
                                        No items on your cart just yet.
                                    </div>
                                @endempty
                            </div>

                            <div class="flex items-center justify-between">
                                <div id="cart_total" class="text-lg font-semibold">
                                    Total: R$ {{ $cart->total_price_for_display }}
                                </div>

                                <div>
                                    <button class="px-4 py-2 rounded bg-indigo-500 text-white">
                                        Proceed to Checkout
                                    </button>
                                </div>
                            </div>
                        </div>
                    </x-slot>
                </x-jet-dropdown>
            </turbo-frame>
        </div>
    </div>
</x-app-layout>
