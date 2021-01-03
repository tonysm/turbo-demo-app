<div class="bg-white p-4 rounded shadow hover:shadow-md">
    <small>
        <time datetime="{{ $comment->created_at->toDateTimeString() }}">
            {{ $comment->created_at->toFormattedDateString() }}
        </time>
    </small>
    <p class="mt-3 text-base text-gray-500">
        {{ $comment->content }}
    </p>
</div>
