<x-app-layout>
    <x-slot name="title">{{ $post->title }}</x-slot>

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

    <turbo-echo-stream-source channel="App.Models.Post.{{ $post->id }}"></turbo-echo-stream-source>

    <div class="py-2 md:py-12">
        <div class="mx-auto space-y-12 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-2 m-4 bg-white rounded shadow md:p-8 lg:p-16">
                @include('posts._post', ['post' => $post])

                <div class="flex items-center space-x-1">
                    <turbo-frame id="@domid($post->entry, 'reactions')" src="{{ route('entries.reactions.index', $post->entry) }}" class="inline-block mt-4"></turbo-frame>
                    <x-jet-dropdown align="right" width="w-96" class="relative inline-block" contentClasses="py-1 bg-gray-100">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center justify-between px-2 py-2 mt-4 space-x-1 text-gray-500 transition duration-150 ease-in-out border rounded-full hover:text-gray-700 focus:outline-none focus:border-gray-300"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="text-xs">New Reaction</span>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <div class="px-2">
                                <turbo-frame id="@domid($post->entry, 'create_reaction')"
                                             src="{{ route('entries.reactions.create', $post->entry) }}"
                                             loading="lazy">
                                    <div class="w-full p-8">
                                        <div class="w-6 h-6 mx-auto bg-gray-300 rounded-full animate-ping"></div>
                                        <p class="sr-only">Loading...</p>
                                    </div>
                                </turbo-frame>
                            </div>
                        </x-slot>
                    </x-jet-dropdown>
                </div>

                <div class="w-2/12 mx-auto mt-8 border-b"></div>

                <div class="pt-8">
                    <h3 class="flex items-center justify-center mb-8 space-x-1 text-xl font-semibold leading-tight text-gray-800">
                        <div>Comments</div>
                        <div id="@domid($post->entry, 'comments_count')">
                            @include('entry_comments._entry_comments_count', ['entry' => $post->entry])
                        </div>
                    </h3>

                    <turbo-frame id="@domid($post->entry, 'comments')" src="{{ route('entries.comments.index', $post->entry) }}" class="flex flex-col">
                    </turbo-frame>

                    <div>
                        <turbo-frame id="@domid($post->entry, 'create_comment')">
                            @include('entries._create_comment_trigger', ['entry' => $post->entry])
                        </turbo-frame>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
