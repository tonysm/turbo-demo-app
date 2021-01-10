<form
    @if($comment->exists)
    action="{{ route('comments.update', $comment) }}"
    @else
    action="{{ route('posts.comments.store', $post) }}"
    @endif
    method="POST"
    class="space-y-4 p-4 bg-white rounded"
>
    @csrf
    @if($comment->exists)
        @method('PUT')
    @endif

    <div class="block">
        <label class="text-gray-700">Comment</label>

        <x-trix-editor
            :id="\Tonysm\TurboLaravel\NamesResolver::resourceIdFor($comment, 'content')"
            value="{!! $comment->content !!}"
            name="content"
        />

        @error('content')
        <span class="text-gray-700">{{ $message }}</span>
        @enderror
    </div>


    <div class="flex justify-between items-center">
        <x-jet-button data-controller="loading-button">
            {{ __('Save') }}
        </x-jet-button>

        <a
            @if($comment->exists)
            href="{{ route('comments.show', $comment) }}"
            @else
            href="{{ route('posts.show', $post) }}"
            @endif
            class="text-base text-gray-500"
        >
            Cancel
        </a>
    </div>
</form>
