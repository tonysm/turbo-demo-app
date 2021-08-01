<turbo-frame id="@domid($post)" class="flex flex-col space-y-4">
    <div class="flex items-center justify-between space-x-2">
        <h1 class="text-2xl font-semibold leading-tight text-gray-800">{{ $post->title }}</h1>
        @if($showActions ?? true)
            <div data-controller="hide-actions"
                 data-hide-actions-owner-id-value="{{ $post->user_id }}">
                @include('posts._post_actions', ['post' => $post, 'deleting' => $deleting ?? false])
            </div>
        @endif
    </div>

    <div class="flex items-center w-full p-2 space-x-4 text-sm text-gray-500 border-t border-b">
        <img class="inline-block object-cover w-8 h-8 rounded-full"
             src="{{ $post->user->profile_photo_url }}"
             alt="{{ $post->user->name }}"/>
        <div class="flex flex-col">
            <span>Created by {{ $post->user->name }}</span>
            <time datetime="{{ $post->created_at->toDateTimeString() }}">
                {{ $post->created_at->toFormattedDateString() }}
            </time>
        </div>
    </div>

    <div class="flex justify-between text-sm">
        <div class="trix-content">{!! clean($post->content) !!}</div>
    </div>
</turbo-frame>
