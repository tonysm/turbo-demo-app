<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tweets') }}
        </h2>
    </x-slot>

    <div class="relative md:py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 md:flex md:space-x-6">
            <div class="w-full md:w-3/12" id="tweets_sidebar" data-turbo-permanent>
                @include('tweets._sidebar')
            </div>
            <div class="w-full md:w-9/12 lg:w-6/12 sm:space-y-4">
                <div class="hidden shadow sm:block">
                    <x-turbo-frame id="create_tweet">
                        @include('tweets._form', ['tweet' => $newTweet])
                    </x-turbo-frame>
                </div>
                <div class="flex flex-col bg-white divide-y shadow" id="tweets">
                    @foreach($tweets as $tweet)
                        @include('tweets._tweet', ['tweet' => $tweet])
                    @endforeach

                    @if($tweets->isEmpty())
                        <div class="p-4 text-center test-sm" id="empty_tweets">
                            No tweets yet.
                        </div>
                    @endif
                </div>
            </div>
            <div class="hidden w-3/12 lg:block" id="whats_happening" data-turbo-permanent>
                @include('tweets._whats_happening')
            </div>
        </div>
    </div>

    <div class="fixed z-10 sm:hidden bottom-10 right-10">
        <a
            href="{{ route('tweets.create') }}"
            class="block p-4 text-white bg-blue-500 rounded-full"
        >
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
        </a>
    </div>
</x-app-layout>
