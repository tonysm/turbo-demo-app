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
                <div class="shadow">
                    <div class="bg-white border-b px-4 py-2 flex items-center space-x-4">
                        <a href="{{ route('tweets.index') }}" data-turbo-frame="_top" class="p-2 rounded-full hover:bg-blue-50">
                            <svg class="text-blue-600 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        </a>
                        <span class="text-lg font-semibold">Tweet</span>
                    </div>
                    <turbo-frame id="@domid($tweet)">
                        @include('tweets._tweet', ['tweet' => $tweet])
                    </turbo-frame>
                </div>
            </div>
            <div class="hidden lg:block w-3/12" id="whats_happening" data-turbo-permanent>
                @include('tweets._whats_happening')
            </div>
        </div>
    </div>
</x-app-layout>
