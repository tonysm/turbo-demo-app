<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="{{ route('posts.index') }}" class="text-cool-gray-500">Posts</a> / <a
                href="{{ route('posts.show', $post) }}"
                class="text-cool-gray-500">{{ $post->title }}</a> / Delete Post Confirmation
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-12 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-8 bg-white rounded shadow">
                <x-turbo-frame :id="$post">
                    <form action="{{ route('posts.destroy', $post) }}" method="post"
                          data-turbo-frame="_top"
                          class="inline-block p-4 mx-auto text-center bg-gray-100 border border-gray-200 rounded shadow-lg">
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
                                    data-turbo-frame="@domid($post)"
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
                </x-turbo-frame>
            </div>
        </div>
    </div>
</x-app-layout>
