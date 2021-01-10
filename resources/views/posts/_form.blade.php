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

    <div class="block">
        <label class="text-gray-700 mb-2">Content</label>
        <x-trix-editor
            id="{{ \Tonysm\TurboLaravel\NamesResolver::resourceIdFor($post, 'content') }}"
            value="{!! old('content', $post->content) !!}"
            name="content"
            style="min-height: 300px"
        ></x-trix-editor>
        @error('content')
        <span class="text-gray-700">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex justify-between items-center">
        <x-jet-button data-controller="loading-button">
            {{ __('Save') }}
        </x-jet-button>

        <a
            href="{{ route('posts.index') }}"
        >
            Cancel
        </a>
    </div>
</form>
