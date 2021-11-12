<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="{{ route('posts.index') }}" class="text-cool-gray-500">Posts</a> / <a
                href="{{ route('posts.show', $post) }}"
                class="text-cool-gray-500">{{ $post->title }}</a> / Comments
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-12 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-16 bg-white rounded-lg shadow">
                <turbo-frame id="@domid($post, 'comments')" class="flex flex-col">
                    @foreach($comments as $comment)
                        @include('comments._comment', ['comment' => $comment])
                    @endforeach
                </turbo-frame>
            </div>
        </div>
    </div>
</x-app-layout>
