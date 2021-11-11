<x-app-layout>
    <turbo-echo-stream-source channel="App.Models.Post.{{ $post->id }}"></turbo-echo-stream-source>

    <x-slot name="header">
        <a href="{{ route('posts.index') }}"
           class="flex items-center space-x-1 text-xl font-semibold leading-tight text-gray-800">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span>back</span>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-12 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-8 bg-white rounded shadow">
                @include('posts._post', ['post' => $post])
            </div>

            <div class="space-y-4">
                <h3 class="text-lg font-semibold leading-tight text-gray-800">Comments
                    <turbo-frame id="@domid($post, 'comments_count')">
                        @include('posts._post_comments_count', ['post' => $post])
                    </turbo-frame>
                </h3>

                <turbo-frame id="@domid($post, 'comments')" src="{{ route('posts.comments.index', $post) }}" class="flex flex-col space-y-2">
                    <p>Loading comments...</p>
                </turbo-frame>

                <div class="mt-4">
                    <turbo-frame id="new_comment">
                        <a
                            class="block p-4 text-base text-center text-gray-500 bg-white rounded shadow"
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
