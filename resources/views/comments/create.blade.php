<x-app-layout>
    <x-slot name="title">New Comment on {{ $post->title }}</x-slot>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="{{ route('posts.index') }}" class="text-cool-gray-500">Posts</a> / <a
                href="{{ route('posts.show', $post) }}"
                class="text-cool-gray-500">{{ $post->title }}</a> / New Comment
        </h2>
    </x-slot>

    <div class="flex-1 h-screen md:h-auto md:py-12">
        <div class="h-full mx-auto space-y-12 max-w-7xl sm:px-6 lg:px-8">
            <div class="h-full p-2 bg-white rounded-lg shadow md:p-8 lg:p-16">
                <turbo-frame id="new_comment" target="_top">
                    @include('comments._form', ['post' => $post, 'comment' => $newComment])
                </turbo-frame>
            </div>
        </div>
    </div>
</x-app-layout>
