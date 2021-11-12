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
            <div class="p-2 bg-white rounded shadow md:p-8 lg:p-16">
                @include('posts._post', ['post' => $post])

                <div class="w-2/12 mx-auto mt-8 border-b"></div>

                <div class="pt-8">
                    <h3 class="flex items-center justify-center mb-8 space-x-1 text-xl font-semibold leading-tight text-gray-800">
                        <div>Comments</div>
                        <div id="@domid($post, 'comments_count')">
                            @include('posts._post_comments_count', ['post' => $post])
                        </div>
                    </h3>

                    <turbo-frame id="@domid($post, 'comments')" src="{{ route('posts.comments.index', $post) }}" class="flex flex-col">
                    </turbo-frame>

                    <div class="">
                        <turbo-frame id="new_comment">
                            <a
                                class="block px-2 py-10 text-gray-500 bg-white border-t border-b rounded md:px-8 lg:px-16"
                                href="{{ route('posts.comments.create', $post) }}"
                            >
                                <span class="text-lg text-gray-500">Add a comment here...</span>
                            </a>
                        </turbo-frame>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
