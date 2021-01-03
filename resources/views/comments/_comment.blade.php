<div class="bg-white p-4 rounded shadow">
    <p class="flex justify-between text-xs">
        <span>{{ $comment->user->name }} said:</span>
        <time datetime="{{ $comment->created_at->toDateTimeString() }}" class="text-gray-500">
            {{ $comment->created_at->toFormattedDateString() }}
        </time>
    </p>
    <p class="mt-3 text-sm text-gray-600">
        {{ $comment->content }}
    </p>
</div>
