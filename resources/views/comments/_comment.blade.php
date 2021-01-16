<turbo-frame id="@domid($comment)">
    <div class="bg-white p-4 rounded shadow my-4">
        <p class="flex justify-between text-sm">
            <span>{{ $comment->user->name }} said:</span>
            <span class="space-x-2 text-gray-500 flex items-center">
                <span
                    class="flex items-center space-x-2 transform transition-all duration-75 ease-out scale-0"
                    data-controller="replace-class"
                    data-replace-class-remove-class-value="scale-0"
                    data-replace-class-add-class-value="scale-100"
                >
                    @if($deleting ?? false)
                        <strong class="transition delay-150 duration-300 ease-in-out">Are you sure?</strong>
                        <a href="{{ route('comments.show', $comment) }}"
                           data-controller="hide-actions"
                           data-hide-actions-owner-id-value="{{ $comment->user_id }}"
                           class="underline"
                        >
                            No, cancel
                        </a>

                        <button
                            form="@domid($comment, 'delete_form')"
                            data-controller="hide-actions loading-button"
                            data-hide-actions-owner-id-value="{{ $comment->user_id }}"
                            class="px-2 py-1 -my-1 text-white bg-indigo-500 rounded"
                        >
                            Yes, delete it!
                        </button>
                    @else
                        <a href="{{ route('comments.edit', $comment) }}"
                           data-controller="hide-actions"
                           data-hide-actions-owner-id-value="{{ $comment->user_id }}"
                        >
                            <svg class="w-4 h-4 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                        </a>

                        <a href="{{ route('comments.delete', $comment) }}"
                           data-controller="hide-actions"
                           data-hide-actions-owner-id-value="{{ $comment->user_id }}"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </a>
                    @endif
                </span>

                <time datetime="{{ $comment->created_at->toDateTimeString() }}">
                    {{ $comment->created_at->toFormattedDateString() }}
                </time>
            </span>
        </p>

        <div class="mt-3 trix-content">
            {!! $comment->content !!}
        </div>

        @if($deleting ?? false)
            <form id="@domid($comment, 'delete_form')" action="{{ route('comments.destroy', $comment) }}" method="POST"
                  hidden="true">
                @csrf
                @method('DELETE')
                <div class="flex items-center justify-center space-x-1">
                    <a class="text-cool-gray-600" href="{{ route('comments.show', $comment) }}">Cancel</a>
                    <button class="px-2 py-1 bg-red-500 text-white rounded shadow hover:shadow-lg">Delete</button>
                </div>
            </form>
        @endif
    </div>
</turbo-frame>
