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
                    <turbo-frame id="@domid($post, 'comments_count')">
                        @include('posts._post_comments_count', ['post' => $post])
                    </turbo-frame>
                </h3>

                <turbo-frame id="comments">
                    @foreach($post->comments as $comment)
                        @include('comments._comment', ['comment' => $comment])
                    @endforeach
                </turbo-frame>

                <div class="mt-4">
                    <turbo-frame id="new_comment" src="{{ route('posts.comments.create', $post) }}">
                        <a
                            class="text-base font-semibold text-indigo-400"
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
