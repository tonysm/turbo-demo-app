<x-turbo-stream target="tweets" action="prepend">
    @include('tweets._tweet', ['tweet' => $tweet])
</x-turbo-stream>

<x-turbo-stream target="empty_tweets" action="remove" />

@if($tweet->wasRecentlyCreated)
    <x-turbo-stream target="create_tweet" action="update">
        @include('tweets._form', ['tweet' => new \App\Models\Tweet()])
    </x-turbo-stream>

    <x-turbo-stream target="modal_tweet" action="update">
        <div>
            <span style="display: none;" x-data x-init="$dispatch('close-modal-modal-create-tweet')"></span>
            @include('tweets._form', ['tweet' => new \App\Models\Tweet(), 'frame' => 'modal'])
        </div>
    </x-turbo-stream>
@endif
