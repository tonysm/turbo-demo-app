<turbo-frame id="@domid($post)" class="flex flex-col space-y-4">
    <div class="flex space-x-2 justify-between items-center">
        <h1 class="font-semibold text-2xl text-gray-800 leading-tight">{{ $post->title }}</h1>
        @if($showActions ?? true)
            <div data-controller="hide-actions"
                 data-hide-actions-owner-id-value="{{ $post->user_id }}">
                @include('posts._post_actions', ['post' => $post, 'deleting' => $deleting ?? false])
            </div>
        @endif
    </div>

    <div class="text-sm text-gray-500 flex items-center space-x-4 w-full border-t border-b p-2">
        <img class="inline-block h-8 w-8 rounded-full object-cover"
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
        <div class="trix-content">{!! $post->content !!}</div>
    </div>
</turbo-frame>
