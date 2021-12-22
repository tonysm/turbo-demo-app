<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Livewire Integration Example') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 mx-4 space-y-4 bg-white rounded shadow">
                <p>The counter state here will be updated using Turbo Streams dispatched by Livewire.</p>
                <div class="mb-2">
                    <div class="inline-block px-4 py-2 text-xl font-semibold border border-gray-200 rounded shadow-lg">
                        <div id="counter">0</div>
                    </div>
                </div>

                <turbo-livewire-stream-source />

                <div class="mt-4">
                    <livewire:counter />
                </div>

                <div class="mt-8">
                    <p>This form is ignored by Turbo and handled only in Livewire:</p>
                    <livewire:test-form />

                    <br>

                    <p>It should work even when it is inside a Turbo Frame:</p>
                    <x-turbo-frame id="test-form">
                        <livewire:test-form />
                    </x-turbo-frame>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
