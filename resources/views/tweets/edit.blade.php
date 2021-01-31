<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tweets') }}
        </h2>
    </x-slot>

    <div class="md:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 md:flex md:space-x-6">
            <div class="hidden md:block w-3/12" id="tweets_sidebar" data-turbo-permanent>
                @include('tweets._sidebar')
            </div>
            <div class="w-full md:w-9/12 lg:w-6/12 sm:space-y-4">
                <div class="bg-white shadow">
                    <turbo-frame id="@domid($tweet, $frame)">
                        @include('tweets._form', ['tweet' => $tweet, 'frame' => $frame])
                    </turbo-frame>
                </div>
            </div>
            <div class="hidden lg:block w-3/12" id="whats_happening" data-turbo-permanent>
                @include('tweets._whats_happening')
            </div>
        </div>
    </div>
</x-app-layout>
