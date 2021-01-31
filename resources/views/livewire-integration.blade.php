<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Livewire Integration Example') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-4 bg-white rounded mx-4 p-4 shadow">
                <p>The counter state here will be updated using Turbo Streams dispatched by Livewire.</p>
                <div class="mb-2">
                    <div class="text-xl font-semibold px-4 py-2 border border-gray-200 inline-block rounded shadow-lg">
                        <turbo-frame id="counter">0</turbo-frame>
                    </div>
                </div>

                <turbo-livewire-stream-source />

                <div class="mt-4">
                    <livewire:counter />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
