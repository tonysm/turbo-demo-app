<form
    action="{{ route('posts.store') }}"
    method="POST"
    class="space-y-4 p-4"
>
    @csrf

    <label class="block">
        <span class="text-gray-700">Title</span>
        <input type="text"
               class="mt-1 block w-full form-input"
               placeholder="Share something cool..."
               name="title"
        />
        @error('title')
        <span class="text-gray-700">{{ $message }}</span>
        @enderror
    </label>

    <label class="block">
        <span class="text-gray-700 {{ $comment ?? false ? 'sr-only' : '' }}">Content</span>
        <textarea name="content" class="form-textarea mt-1 block w-full" rows="3"
                  placeholder="Write your story...">{{ old('content') }}</textarea>
        @error('content')
        <span class="text-gray-700">{{ $message }}</span>
        @enderror
    </label>

    <div class="flex justify-between items-center">
        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>

        <a
            href="{{ route('posts.index') }}"
        >
            Cancel
        </a>
    </div>
</form>
