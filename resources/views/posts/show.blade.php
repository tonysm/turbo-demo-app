<x-app-layout>
    <turbo-echo-stream-source channel="App.Models.Post.{{ $post->id }}"></turbo-echo-stream-source>

    <x-slot name="header">
        <a href="{{ route('posts.index') }}"
           class="font-semibold text-xl text-gray-800 leading-tight flex space-x-1 items-center">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span>back</span>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            <div class="bg-white rounded shadow p-8">
                @include('posts._post', ['post' => $post])
            </div>

            <div class="space-y-4">
                <h3 class="font-semibold text-lg text-gray-800 leading-tight">Comments
                    <turbo-frame id="@domid($post, 'comments_count')">
                        @include('posts._post_comments_count', ['post' => $post])
                    </turbo-frame>
                </h3>

                <turbo-frame id="@domid($post, 'comments')" src="{{ route('posts.comments.index', $post) }}">
                    <p>Loading comments...</p>
                </turbo-frame>

                <div class="mt-4">
                    <turbo-frame id="new_comment">
                        <a
                            class="block bg-white p-4 text-base text-gray-500 text-center rounded shadow"
                            href="{{ route('posts.comments.create', $post) }}"
                        >
                            New Comment
                        </a>
                    </turbo-frame>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
