<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('posts.index') }}" class="text-cool-gray-500">Posts</a> / {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            <div class="bg-white p-4 shadow rounded-lg">
                {{ $post->content }}
            </div>

            <div class="space-y-4">
                <h3 class="font-semibold text-lg text-gray-800 leading-tight">Comments
                    <small>({{ $post->comments->count() }})</small></h3>

                <div class="space-y-4">
                    @foreach($post->comments as $comment)
                        @include('comments._comment', ['comment' => $comment])
                    @endforeach
                </div>

                <div class="mt-4">
                    @include('comments._form', ['post' => $post])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
