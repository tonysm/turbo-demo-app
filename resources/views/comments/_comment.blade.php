<turbo-frame id="@domid($comment)">
    <div class="bg-white p-4 rounded shadow my-4">
        <p class="flex justify-between text-xs">
            <span>{{ $comment->user->name }} said:</span>
            <span class="space-x-2 text-gray-500 flex items-center">
                <a href="{{ route('comments.edit', $comment) }}">
                    <svg class="w-4 h-4 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                    </svg>
                </a>

                <button type="submit" form="delete_comment_{{ $comment->id }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>

                <time datetime="{{ $comment->created_at->toDateTimeString() }}">
                    {{ $comment->created_at->toFormattedDateString() }}
                </time>
            </span>
        </p>

        <p class="mt-3 text-sm text-gray-600">
            {{ $comment->content }}
        </p>

        <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="hidden"
              onsubmit="return confirm('Are you sure you want to delete it?')"
              data-turbo-target="_top"
              id="delete_comment_{{ $comment->id }}">
            @csrf
            @method('DELETE')
        </form>
    </div>
</turbo-frame>
