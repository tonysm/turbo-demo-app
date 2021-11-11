<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="{{ route('posts.index') }}" class="text-cool-gray-500">Posts</a> / <a
                href="{{ route('posts.show', $comment->post) }}"
                class="text-cool-gray-500">{{ $comment->post->title }}</a> / Edit Comment
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-12 max-w-7xl sm:px-6 lg:px-8">
            <turbo-frame id="@domid($comment)">
                <div class="p-8 bg-white rounded-lg shadow">
                    @include('comments._form', ['comment' => $comment])
                </div>
            </turbo-frame>
        </div>
    </div>
</x-app-layout>
