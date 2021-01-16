<form
    @if($post->exists)
    action="{{ route('posts.update', $post) }}"
    @else
    action="{{ route('posts.store') }}"
    @endif
    method="POST"
    class="space-y-4 p-4"
>
    @csrf
    @if($post->exists)
        @method('PUT')
    @endif

    <label class="block">
        <span class="text-gray-700">Title</span>
        <input type="text"
               class="mt-1 block w-full form-input"
               placeholder="Share something cool..."
               value="{!! old('title', $post->title) !!}"
               name="title"
        />
        @error('title')
            <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
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
            <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex justify-between items-center">
        <x-jet-button data-controller="loading-button">
            {{ __('Save') }}
        </x-jet-button>

        <a

            @if($post->exists)
            href="{{ route('posts.show', $post) }}"
            @else
            href="{{ route('posts.index') }}"
            @endif
        >
            Cancel
        </a>
    </div>
</form>
