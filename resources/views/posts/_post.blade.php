<div class="flex justify-between text-sm">
    <div class="trix-content">{!! $post->content !!}</div>
    <div class="space-x-2 text-gray-500 flex items-center">
        <span
            class="flex items-center space-x-2 transform transition-all duration-75 ease-out scale-0"
            data-controller="replace-class"
            data-replace-class-remove-class-value="scale-0"
            data-replace-class-add-class-value="scale-100"

        >
            @if($deleting ?? false)
                <strong class="transition delay-150 duration-300 ease-in-out">Are you sure?</strong>
                <a href="{{ route('posts.show', $post) }}"
                   data-controller="hide-actions"
                   data-hide-actions-owner-id-value="{{ $post->user_id }}"
                   class="underline"
                >
                    No, cancel
                </a>

                <form
                      method="post"
                      action="{{ route('posts.destroy', $post) }}"
                      data-turbo="false"
                      data-turbo-frame="_top"
                      data-turbo-action="replace"
                >
                    @csrf
                    @method('delete')
                    <button
                        data-controller="hide-actions loading-button"
                        data-hide-actions-owner-id-value="{{ $post->user_id }}"
                        class="px-2 py-1 -my-1 text-white bg-indigo-500 rounded"
                    >
                        Yes, delete it!!
                    </button>
                </form>
            @else
                <a href="{{ route('posts.edit', $post) }}"
                   data-controller="hide-actions"
                   data-hide-actions-owner-id-value="{{ $post->user_id }}"
                >
                    <svg class="w-4 h-4 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                    </svg>
                </a>

                <a href="{{ route('posts.delete', $post) }}"
                   data-controller="hide-actions"
                   data-hide-actions-owner-id-value="{{ $post->user_id }}"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </a>
            @endif
        </span>

        <time datetime="{{ $post->created_at->toDateTimeString() }}">
            {{ $post->created_at->toFormattedDateString() }}
        </time>
    </div>
</div>
