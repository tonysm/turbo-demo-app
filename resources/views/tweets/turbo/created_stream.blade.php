<turbo-stream target="tweets" action="prepend">
    <template>
        @include('tweets._tweet', ['tweet' => $tweet])
    </template>
</turbo-stream>

<turbo-stream target="empty_tweets" action="remove"></turbo-stream>

@if($tweet->wasRecentlyCreated)
    <turbo-stream target="create_tweet" action="update">
        <template>
            @include('tweets._form', ['tweet' => new \App\Models\Tweet()])
        </template>
    </turbo-stream>

    <turbo-stream target="modal_tweet" action="update">
        <template>
            <div>
                <span style="display: none;" x-data x-init="$dispatch('close-modal-modal-create-tweet')"></span>
                @include('tweets._form', ['tweet' => new \App\Models\Tweet(), 'frame' => 'modal'])
            </div>
        </template>
    </turbo-stream>
@endif
