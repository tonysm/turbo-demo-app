<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tweets') }}
        </h2>
    </x-slot>

    <div class="md:py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 md:flex md:space-x-6">
            <div class="hidden w-3/12 md:block" id="tweets_sidebar" data-turbo-permanent>
                @unless(request()->has('frame'))
                    @include('tweets._sidebar')
                @endunless
            </div>
            <div class="w-full md:w-9/12 lg:w-6/12 sm:space-y-4">
                <div class="shadow">
                    <div class="flex items-center px-4 py-2 space-x-4 bg-white border-b">
                        <a href="{{ route('tweets.index') }}" data-turbo-frame="_top" class="p-2 rounded-full hover:bg-blue-50">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        </a>
                        <span class="text-lg font-semibold">Tweet</span>
                    </div>
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
