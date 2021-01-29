<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('orders.index') }}">{{ __('Orders') }}</a> / #{{ $order->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium">Payment Info.</h3>

                            <p class="mt-1">Payment Option: {{ $order->payment_option }}</p>

                            <p class="mt-1">{{ $order->created_at->toRfc822String() }}</p>
                        </div>
                    </div>

                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                            <div class="space-y-6">
                                @foreach($order->items as $orderItem)
                                    @include('order_items._order_item', ['orderItem' => $orderItem])
                                @endforeach

                                <div class="p-4 text-lg font-semibold">
                                    Total: {{ $order->total_price_for_display }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
