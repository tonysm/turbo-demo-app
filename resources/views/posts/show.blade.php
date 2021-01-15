<x-app-layout>
    <turbo-echo-stream-source
        channel="App.Models.Post.{{ $post->id }}"
    />
    <turbo-echo-stream-source
        channel="App.Models.Team.{{ auth()->user()->currentTeam->id }}"
    />

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('posts.index') }}" class="text-cool-gray-500">Posts</a> /
            <turbo-frame id="@domid($post, 'title')">{{ $post->title }}</turbo-frame>
        </h2
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            <div class="bg-white p-4 shadow rounded-lg">
                <turbo-frame id="@domid($post)">
                    @include('posts._post', ['post' => $post])
                </turbo-frame>
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
