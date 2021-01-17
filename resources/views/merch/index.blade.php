<x-app-layout>
    <x-slot name="header">
        <div class="relative">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Shop') }}
            </h2>

            <div class="sm:absolute sm:top-0 sm:-mt-2 sm:right-0">
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

                            <span class="rounded-full px-2 text-gray-700">6</span>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-2">
                            <div class="p-8 w-full max-h-1/2 overflow-y-scroll">
                                <div class="w-6 h-6 bg-gray-300 rounded-full animate-ping mx-auto"></div>
                                <p class="sr-only">Loading...</p>
                            </div>

                            <div class="text-center text-gray-500 underline text-xs py-2">
                                <a href="#">Go to Cart</a>
                            </div>
                        </div>
                    </x-slot>
                </x-jet-dropdown>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="sm:grid sm:gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach(range(1, 11) as $i)
                    @include('products._product_card')
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
