<div id="@domid($post, 'card')" class="p-16 bg-white rounded shadow hover:shadow-md">
    <a href="{{ route('posts.show', $post) }}" class="block group">
        <h2 class="mb-8 text-5xl text-center text-gray-900">
            {{ $post->title }}
        </h2>
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

        <div class="mt-3 text-lg">
            {{ Str::limit($post->content->toPlainText(), 600) }}
        </div>
    </a>
    <div class="flex flex-col mt-3 space-y-4">
        <div class="text-center">
            <a
                href="{{ route('posts.show', $post) }}"
                class="text-base font-semibold underline text-cool-gray-600 hover:text-cool-gray-500"
            >
                See more
            </a>
        </div>
    </div>
</div>
