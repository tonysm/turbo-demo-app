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

    <div class="py-2 md:py-12">
        <div class="mx-auto max-w-7xl sm:px-8 lg:px-18">
            <div class="m-4">
                <p class="hidden p-2 text-sm text-center text-gray-900 border rounded shadow-sm bg-yellow-50 md:block">
                    ⚠️ Since this is a demo app, Posts and Comments will automatically be deleted after a couple of days. ⚠️
                </p>
            </div>

            <div id="post_cards" class="m-4 space-y-4">
                @foreach($posts as $post)
                    @include('posts._post_card', ['post' => $post])
                @endforeach
            </div>
            @if($posts->isEmpty())
                <div id="empty_posts" class="p-2 m-4 text-center text-gray-700 bg-white rounded shadow">
                    <p>Nothing was shared just yet. Create your first post!</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
