<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('posts.index') }}" class="text-cool-gray-500">Posts</a> / <a
                href="{{ route('posts.show', $post) }}"
                class="text-cool-gray-500">{{ $post->title }}</a> / Delete Post Confirmation
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            <div class="bg-white rounded shadow p-8">
                <turbo-frame id="@domid($post)">
                    <form action="{{ route('posts.destroy', $post) }}" method="post"
                          data-turbo-frame="_top"
                          class="inline-block mx-auto text-center p-4 rounded shadow-lg border border-gray-200 bg-gray-100">
                        @csrf
                        @method('DELETE')

                        <div class="space-y-4">
                            <p class="p-0 m-0">Are you sure you want to delete this post?</p>

                            <div
                                class="space-x-4"
                            >
                                <a
                                    href="{{ route('posts.show', $post) }}"
                                    class="px-2 py-1 underline"
                                >Nevermind</a>
                                <button
                                    type="submit"
                                    class="px-2 py-1 -my-1 text-white bg-indigo-500 rounded"
                                >Yes, delete it
                                </button>
                            </div>
                        </div>
                    </form>

                    @include('posts._post', ['post' => $post, 'showActions' => false])
                </turbo-frame>
            </div>
        </div>
    </div>
</x-app-layout>
