<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('posts.index') }}" class="text-cool-gray-500">Posts</a> / <a
                href="{{ route('posts.show', $post) }}"
                class="text-cool-gray-500">{{ $post->title }}</a> / New Comment
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            <div>
                <turbo-frame id="new_comment">
                    <div class="rounded-lg shadow">
                        @include('comments._form', ['post' => $post, 'comment' => $newComment])
                    </div>
                </turbo-frame>
            </div>
        </div>
    </div>
</x-app-layout>
