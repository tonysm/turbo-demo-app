<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tweets') }}
        </h2>
    </x-slot>

    <div class="md:py-12 relative">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 md:flex md:space-x-6">
            <div class="w-full md:w-3/12" id="tweets_sidebar" data-turbo-permanent>
                @include('tweets._sidebar')
            </div>
            <div class="w-full md:w-9/12 lg:w-6/12 sm:space-y-4">
                <div class="hidden sm:block shadow">
                    <turbo-frame id="create_tweet">
                        @include('tweets._form', ['tweet' => $newTweet])
                    </turbo-frame>
                </div>
                <div class="flex flex-col divide-y bg-white shadow" id="tweets">
                    @foreach($tweets as $tweet)
                        @include('tweets._tweet', ['tweet' => $tweet])
                    @endforeach

                    @if($tweets->isEmpty())
                        <div class="text-center test-sm p-4" id="empty_tweets">
                            No tweets yet.
                        </div>
                    @endif
                </div>
            </div>
            <div class="hidden lg:block w-3/12" id="whats_happening" data-turbo-permanent>
                @include('tweets._whats_happening')
            </div>
        </div>
    </div>

    <div class="sm:hidden fixed z-10 bottom-10 right-10">
        <a
            href="{{ route('tweets.create') }}"
            class="block p-4 rounded-full bg-blue-500 text-white"
        >
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
        </a>
    </div>
</x-app-layout>
