<div class="bg-white p-4 my-4 rounded shadow hover:shadow-md">
    <a href="{{ route('posts.show', $post) }}" class="block">
        <h2 class="text-xl text-gray-900">
            {{ $post->title }}
        </h2>
        <small class="space-x-2">
            <span>{{ $post->user->name }}</span>
            <time datetime="{{ $post->created_at->toDateTimeString() }}" class="text-gray-600">
                {{ $post->created_at->toFormattedDateString() }}
            </time>
        </small>
        <p class="mt-3 text-base text-gray-500">
            {!! \Illuminate\Support\Str::limit(html_entity_decode($post->content), 180) !!}
        </p>
    </a>
    <div class="mt-3">
        <a
            href="{{ route('posts.show', $post) }}"
            class="text-base font-semibold underline text-cool-gray-600 hover:text-cool-gray-500"
        >
            See more
        </a>
    </div>
</div>
