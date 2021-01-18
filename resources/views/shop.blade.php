<x-app-layout>
    <x-slot name="header">
        <div class="relative">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Shop') }}
            </h2>

            <div class="sm:absolute sm:top-0 sm:-mt-2 sm:right-0">
                <turbo-frame id="carts" src="{{ route('carts.index') }}"></turbo-frame>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="sm:grid sm:gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                @foreach($products as $product)
                    @include('products._product_card', ['product' => $product])
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
