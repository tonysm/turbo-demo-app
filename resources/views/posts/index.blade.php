<x-app-layout>
    <x-slot name="title">Posts</x-slot>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Posts') }}
            </h2>

            <a class="text-base font-semibold text-indigo-400" href="{{ route('posts.create') }}">New Post</a>
        </div>
    </x-slot>

    <turbo-echo-stream-source
        channel="App.Models.Team.{{ auth()->user()->currentTeam->id }}"
    ></turbo-echo-stream-source>

    <div class="py-4 md:py-12">
        <div class="mx-auto max-w-7xl sm:px-8 lg:px-18">
            <div id="post_cards" class="m-4 space-y-4">
                @foreach($posts as $post)
                    @include('posts._post_card', ['post' => $post])
                @endforeach
            </div>
            @if($posts->isEmpty())
                <div id="empty_posts" class="p-4 text-center text-gray-700 bg-white rounded shadow">
                    <p>Nothing was shared just yet. Create your first post!</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
