<turbo-frame id="@domid($tweet)">
    <div class="bg-white flex px-4 pb-2 pt-4 space-x-4 hover:bg-gray-50">
        <div>
            <img class="h-8 w-8 rounded-full object-cover" src="{{ $tweet->user->profile_photo_url }}" alt="{{ $tweet->user->name }}" />
        </div>
        <div class="flex-1 space-y-1">
            <a href="{{ route('tweets.show', $tweet) }}" class="block space-y-1" data-turbo-frame="_top">
                <div class="px-2 space-x-1">
                    <span class="font-semibold whitespace-no-wrap">{{ $tweet->user->name }}</span>
                    <span class="text-gray-500">@WeDontHaveHandles</span>
                    <span class="text-gray-500"><time data-timestamp="{{ $tweet->created_at }}">{{ $tweet->created_at->diffForHumans() }}</time></span>
                </div>

                <div class="px-2">
                    {{ $tweet->content }}
                </div>
            </a>

            <div class="flex items-center justify-between text-gray-500">
                <button href="#" class="p-2 rounded-full hover:bg-blue-100 hover:text-blue-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                </button>

                <button href="#" class="p-2 rounded-full hover:bg-green-100 hover:text-green-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                </button>

                <button href="#" class="p-2 rounded-full hover:bg-red-100 hover:text-red-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </button>

                <div>
                    <x-jet-dropdown align="right" width="60">
                        <x-slot name="trigger">
                            <button type="button" class="p-2 rounded-full hover:bg-blue-100 hover:text-blue-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="w-40">
                                <a
                                    href="{{ route('tweets.edit', $tweet) }}"
                                    class="block w-full px-4 py-2 text-gray-500 flex items-center space-x-2"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    <span>Edit</span>
                                </a>
                                <button
                                    @click="$dispatch('toggle-flyout-modal-{{ $tweet->id }}')"
                                    class="block w-full px-4 py-2 text-gray-500 flex items-center space-x-2"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                                    <span>Edit in Flyout</span>
                                </button>
                            </div>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>
        </div>
    </div>
    <x-flyout id="modal-{{ $tweet->id }}">
        <div class="p-4 border-b">
            <span class="text-lg font-semibold">Edit Tweet</span>
        </div>
        <turbo-frame id="@domid($tweet, 'flyout')" src="{{ route('tweets.edit', ['tweet' => $tweet, 'frame' => 'flyout']) }}" loading="lazy">
            <div class="">
                <div class="p-8 w-full">
                    <div class="w-6 h-6 bg-gray-300 rounded-full animate-ping mx-auto"></div>
                    <p class="sr-only">Loading...</p>
                </div>
            </div>
        </turbo-frame>
    </x-flyout>
</turbo-frame>
