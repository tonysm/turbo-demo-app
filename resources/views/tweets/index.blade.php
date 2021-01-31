<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex space-x-6">
            <div class="w-3/12" id="tweets_sidebar" data-turbo-permanent>
                @include('tweets._sidebar')
            </div>
            <div class="w-6/12 space-y-4">
                <div class="shadow">
                    <turbo-frame id="create_tweet">
                        @include('tweets._form', ['tweet' => $newTweet])
                    </turbo-frame>
                </div>
                <div class="flex flex-col divide-y bg-white shadow" id="tweets">
                    @foreach($tweets as $tweet)
                        @include('tweets._tweet', ['tweet' => $tweet])
                    @endforeach

                    <div class="p-4">
                        {{ $tweets->links() }}
                    </div>
                </div>
            </div>
            <div class="w-3/12" id="whats_happening" data-turbo-permanent>
                @include('tweets._whats_happening')
            </div>
        </div>
    </div>
</x-app-layout>
