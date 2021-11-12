<div id="@domid($post, 'card')" class="p-2 bg-white rounded shadow md:p-8 lg:p-16 hover:shadow-md">
    <a href="{{ route('posts.show', $post) }}" class="block group">
        <h2 class="px-4 mb-8 text-2xl font-semibold text-center text-gray-900 md:px-8 md:text-4xl lg:text-5xl">
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

        <div class="px-2 mt-3 text-base md:px-0 md:text-lg">
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
