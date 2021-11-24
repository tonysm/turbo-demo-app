<turbo-frame
    id="@domid($comment)"
    data-controller="bridge"
    data-action="init-turbo-native@window->bridge#changeFrameTargetOnNative"
    data-target-on-native="_top"
>
    <div class="px-2 py-8 border-t border-b md:px-8 lg:px-16">
        <div class="flex justify-between text-sm text-gray-600">
            <p>{{ $comment->user->name }} said:</p>
            <div class="flex items-center space-x-2 text-gray-500">
                <div
                    class="flex items-center space-x-2 transition-all duration-75 ease-out transform scale-0"
                    data-controller="replace-class"
                    data-replace-class-remove-class-value="scale-0"
                    data-replace-class-add-class-value="scale-100"
                >
                    @unless ($deleting ?? false)
                        <a href="{{ route('comments.edit', $comment) }}"
                            data-controller="hide-actions"
                            data-hide-actions-owner-id-value="{{ $comment->user_id }}"
                        >
                            <svg class="inline-block w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                        </a>

                        <form
                            action="{{  route('comments.destroy', $comment) }}"
                            method="POST"
                            data-controller="hide-actions"
                            data-hide-actions-owner-id-value="{{ $comment->user_id }}"
                            data-turbo-confirm="Are you sure you want to delete this comment?"
                            class="flex items-center"
                            data-turbo-frame="@domid($comment)"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </form>
                    @endif
                </div>

                <time datetime="{{ $comment->created_at->toDateTimeString() }}">
                    {{ $comment->created_at->toFormattedDateString() }}
                </time>
            </div>
        </div>

        <div class="mt-3 text-base md:text-lg trix-content">
            {!! clean($comment->content) !!}
        </div>

        <div class="mt-4">
            <turbo-frame id="@domid($comment->entry, 'reactions')" src="{{ route('entries.reactions.index', $comment->entry) }}" class="flex flex-wrap items-center justify-start -m-1"></turbo-frame>
        </div>

        @if($deleting ?? false)
            <form id="@domid($comment, 'delete_form')" action="{{ route('comments.destroy', $comment) }}" method="POST"
                    hidden="true">
                @csrf
                @method('DELETE')
                <div class="flex items-center justify-center space-x-1">
                    <a class="text-cool-gray-600" href="{{ route('comments.show', $comment) }}">Cancel</a>
                    <button class="px-2 py-1 text-white bg-red-500 rounded shadow hover:shadow-lg">Delete</button>
                </div>
            </form>
        @endif
    </div>
</turbo-frame>
