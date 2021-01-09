<x-app-layout>
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
                <turbo-frame id="post_cards" target="_top">
                    @foreach($posts as $post)
                        @include('posts._post_card', ['post' => $post])
                    @endforeach
                </turbo-frame>

                @if($posts->isEmpty())
                    <turbo-frame id="posts_empty">
                        <div class="bg-white rounded shadow p-4 text-gray-700 text-center">
                            <p>Nothing was shared just yet. Create your first post!</p>
                        </div>
                    </turbo-frame>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
