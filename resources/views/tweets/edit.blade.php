<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tweets') }}
        </h2>
    </x-slot>

    <div class="md:py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 md:flex md:space-x-6">
            <div class="hidden w-3/12 md:block" id="tweets_sidebar" data-turbo-permanent>
                @include('tweets._sidebar')
            </div>
            <div class="w-full md:w-9/12 lg:w-6/12 sm:space-y-4">
                <div class="bg-white shadow">
                    <x-turbo-frame :id="[$tweet, $frame]">
                        @include('tweets._form', ['tweet' => $tweet, 'frame' => $frame])
                    </x-turbo-frame>
                </div>
            </div>
            <div class="hidden w-3/12 lg:block" id="whats_happening" data-turbo-permanent>
                @include('tweets._whats_happening')
            </div>
        </div>
    </div>
</x-app-layout>
