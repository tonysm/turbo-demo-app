<form
    @if($post->exists)
    action="{{ route('posts.update', $post) }}"
    @else
    action="{{ route('posts.store') }}"
    @endif
    method="POST"
    class="relative"
>
    @csrf
    @if($post->exists)
        @method('PUT')
    @endif

    <div class="space-y-4">
        <label class="block">
            <span class="text-gray-700 sr-only">Title</span>
            <x-textarea class="px-8 text-2xl md:text-4xl lg:text-5xl" :value="old('title', $post->title)" name="title" placeholder="Enter a title..." />
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
                placeholder="Write something here..."
            ></x-trix-editor>
            @error('content')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex items-center justify-end space-x-4">
            <a
                @if($post->exists)
                href="{{ route('posts.show', $post) }}"
                @else
                href="{{ route('posts.index') }}"
                @endif
                class="text-base text-gray-500"
            >
                Cancel
            </a>

            <x-jet-button data-controller="loading-button">
                <span>{{ __('Save') }}</span>
            </x-jet-button>
        </div>
    </div>
</form>
