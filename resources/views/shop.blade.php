<x-app-layout>
    <x-slot name="header">
        <div class="relative">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Shop') }}
            </h2>

            <div class="sm:z-10 sm:absolute sm:top-0 sm:-mt-2 sm:right-0">
                <x-turbo-frame id="carts" :src="route('carts.index')" />
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="sm:grid sm:gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                @foreach($products as $product)
                    @include('products._product_card', ['product' => $product])
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
