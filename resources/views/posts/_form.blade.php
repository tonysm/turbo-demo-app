<form
    @if($post->exists)
    action="{{ route('posts.update', $post) }}"
    @else
    action="{{ route('posts.store') }}"
    @endif
    method="POST"
    class="relative space-y-4"
>
    @csrf
    @if($post->exists)
        @method('PUT')
    @endif

    <label class="block">
        <span class="text-gray-700 sr-only">Title</span>
        <input type="text"
               class="block w-full text-2xl border-0 outline-none"
               placeholder="Enter a title..."
               value="{!! old('title', $post->title) !!}"
               name="title"
        />
        @error('title')
            <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
        @enderror
    </label>

    <div class="block mt-2">
        <label class="mb-2 text-gray-700 sr-only">Content</label>
        <x-trix-editor
            id="{{ dom_id($post, 'content') }}"
            value="{{ old('content', $post->content->toTrixHtml()) }}"
            name="content"
            style="min-height: 300px"
        ></x-trix-editor>
        @error('content')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex items-center justify-between">
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
