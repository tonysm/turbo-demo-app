<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium text-gray-900">My Orders</h3>

                            <p class="mt-1 text-sm text-gray-600">
                                All the orders you have made.
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                            <div class="space-y-6">
                                @foreach($orders as $order)
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="ml-4 space-x-2">
                                            <span>#{{$order->id}}</span>
                                            <span>{{ $order->total_price_for_display }}</span>
                                            <span>{{ $order->created_at->toFormattedDateString() }}</span>
                                        </div>
                                    </div>

                                    <div class="flex items-center">
                                        <a href="{{ route('orders.show', $order) }}" class="ml-2 text-sm text-gray-400 underline">
                                            View more
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
