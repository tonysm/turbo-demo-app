<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('posts.index') }}" class="text-cool-gray-500">Posts</a> / <a
                href="{{ route('posts.show', $comment->post) }}"
                class="text-cool-gray-500">{{ $comment->post->title }}</a> / Delete Comment Confirmation
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            <div class="bg-white p-4 shadow rounded-lg">
                <turbo-frame id="@domid($comment)">
                    @include('comments._comment', ['comment' => $comment, 'deleting' => true])
                </turbo-frame>
            </div>
        </div>
    </div>
</x-app-layout>
