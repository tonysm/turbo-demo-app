<turbo-stream target="tweets" action="prepend">
    <template>
        @include('tweets._tweet', ['tweet' => $tweet])
    </template>
</turbo-stream>

@if($tweet->wasRecentlyCreated)
    <turbo-stream target="create_tweet" action="update">
        <template>
            @include('tweets._form', ['tweet' => new \App\Models\Tweet()])
        </template>
    </turbo-stream>

    <turbo-stream target="create_tweet_modal" action="update">
        <template>
            <span x-data x-init="$dispatch('close-modal-modal-create-tweet')"></span>
            @include('tweets._form', ['tweet' => new \App\Models\Tweet(), 'frame' => 'modal'])
        </template>
    </turbo-stream>
@endif
