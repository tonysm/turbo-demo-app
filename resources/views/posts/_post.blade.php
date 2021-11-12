<turbo-frame id="@domid($post)" class="flex flex-col space-y-4">
    <div class="relative">
        <h1 class="px-4 text-2xl font-semibold leading-tight text-center text-gray-800 md:px-8 md:text-4xl lg:text-5xl">{{ $post->title }}</h1>

        @if($showActions ?? true)
            <div
                class="absolute top-0 right-0 bg-white rounded-full"
                data-controller="hide-actions"
                data-hide-actions-owner-id-value="{{ $post->user_id }}"
            >
                @include('posts._post_actions', ['post' => $post, 'deleting' => $deleting ?? false])
            </div>
        @endif
    </div>

    <div class="flex flex-col items-center pb-4">
        <div class="flex flex-col items-center py-2">
            <div class="flex space-x-2">
                <img src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}" class="object-cover w-6 h-6 rounded-full">

                <div class="text-sm text-gray-600">
                    {{ $post->user->name }}
                </div>
            </div>
            <time datetime="{{ $post->created_at->toDateTimeString() }}" class="text-xs text-gray-600">
                {{ $post->created_at->toFormattedDateString() }}
            </time>
        </div>
        <div class="w-2/12 border-b"></div>
    </div>

    <div class="flex justify-between text-sm">
        <div class="text-base md:text-lg trix-content">{!! clean($post->content) !!}</div>
    </div>
</turbo-frame>
