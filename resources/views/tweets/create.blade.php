<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-4">
                <turbo-frame id="create_tweet{{ $frame }}">
                    @include('tweets._form', ['tweet' => $tweet, 'frame' => request()->input('frame')])
                </turbo-frame>
            </div>
        </div>
    </div>
</x-app-layout>
