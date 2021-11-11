<form
    @if($comment->exists)
    action="{{ route('comments.update', $comment) }}"
    @else
    action="{{ route('posts.comments.store', $post) }}"
    @endif
    method="POST"
    class=""
    x-data="{ sending: false }"
    x-init="$refs.contentField.focus()"
    @turbo:submit-start="sending = true"
    @turbo:submit-end="sending = false"
>
    @csrf
    @if($comment->exists)
        @method('PUT')
    @endif

    <div class="block">
        <label class="text-gray-700 sr-only">
            {{ $comment->exists ? 'Edit Comment' : 'New Comment' }}
        </label>

        <div class="mt-2">
            <x-trix-editor
                :id="\Tonysm\TurboLaravel\dom_id($comment, 'content')"
                value="{{ $comment->content->toTrixHtml() }}"
                name="content"
                x-ref="contentField"
                placeholder="Say something nice..."
            />
        </div>

        @error('content')
        <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>


    <div class="flex items-center justify-end mt-4 space-x-4">
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

        <x-jet-button x-bind:disabled="sending" data-controller="loading-button">
            <span x-show="sending">{{ __('Saving...') }}</span>
            <span x-show="!sending">{{ __('Save') }}</span>
        </x-jet-button>
    </div>
</form>
