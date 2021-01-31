<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex space-x-6">
            <div class="w-3/12" data-turbo-permanent id="tweets_sidebar">
                @include('tweets._sidebar')
            </div>
            <div class="w-6/12 space-y-4">
                <div class="bg-white shadow">
                    <turbo-frame id="@domid($tweet)">
                        @include('tweets._form', ['tweet' => $tweet, 'frame' => request()->input('frame')])
                    </turbo-frame>
                </div>
            </div>

            <div class="w-3/12" id="whats_happening" data-turbo-permanent>
                @include('tweets._whats_happening')
            </div>
        </div>
    </div>
</x-app-layout>
