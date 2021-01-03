<form
    action="{{ route('posts.comments.store', $post) }}"
    method="POST"
    class="space-y-4"
>
    @csrf

    <label class="block">
        <span class="text-gray-700">Comment</span>
        <textarea name="content" class="form-textarea mt-1 block w-full" rows="3"
                  placeholder="Say something nice..."></textarea>
        @error('content')
        <span class="text-gray-700">{{ $message }}</span>
        @enderror
    </label>

    <x-jet-button>
        {{ __('Save') }}
    </x-jet-button>
</form>
