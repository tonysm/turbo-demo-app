<x-jet-dropdown align="right" width="48" contentClasses="py-1 bg-gray-100">
    <x-slot name="trigger">
        <button
            class="flex text-sm text-gray-500 transition duration-150 ease-in-out border-2 border-transparent rounded-full hover:text-gray-700 focus:outline-none focus:border-gray-300"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </button>
    </x-slot>

    <x-slot name="content">
        <div class="flex flex-col w-full divide-y">
            <a
                href="{{ route('posts.edit', $post) }}"
                data-controller="hide-actions"
                data-hide-actions-owner-id-value="{{ $post->user_id }}"
                class="flex items-center p-2 space-x-2"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                </svg>
                <span>Edit</span>
            </a>
            <a
                href="{{ route('posts.delete', $post) }}"
                data-controller="hide-actions"
                data-hide-actions-owner-id-value="{{ $post->user_id }}"
                class="flex items-center p-2 space-x-2"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
                <span>Delete</span>
            </a>
        </div>
    </x-slot>
</x-jet-dropdown>
