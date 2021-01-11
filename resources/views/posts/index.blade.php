<x-app-layout>
    <turbo-echo-stream-source
        channel="App.Models.Team.{{ auth()->user()->currentTeam->id }}"
    />

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts') }}
            </h2>

            <a class="text-base font-semibold text-indigo-400" href="{{ route('posts.create') }}">New Post</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-8">
                <turbo-frame id="post_cards" target="_top" class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 sm:gap-2 md:gap-3 lg:gap-4">
                    @foreach($posts as $post)
                        @include('posts._post_card', ['post' => $post])
                    @endforeach
                </turbo-frame>
            </div>

            @if($posts->isEmpty())
                <turbo-frame id="empty_posts">
                    <div class="bg-white rounded shadow p-4 text-gray-700 text-center">
                        <p>Nothing was shared just yet. Create your first post!</p>
                    </div>
                </turbo-frame>
            @endif
        </div>
    </div>
</x-app-layout>
