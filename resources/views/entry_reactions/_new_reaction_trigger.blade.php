<x-jet-dropdown align="center" width="w-80" class="hidden m-1 sm:inline-block" id="{{ dom_id($entry, 'create_reaction_trigger') }}" contentClasses="py-1 bg-gray-100">
    <x-slot name="trigger">
        <button
            class="inline-flex items-center justify-between p-2 space-x-1 text-gray-500 transition duration-150 ease-in-out border rounded-full hover:text-gray-700 focus:outline-none focus:border-gray-300"
        >
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="text-xs">New Reaction</span>
        </button>
    </x-slot>
    <x-slot name="content">
        <div class="px-2">
            <turbo-frame
                id="@domid($entry, 'create_reaction')"
                src="{{ route('entries.reactions.create', $entry) }}"
                loading="lazy"
                class="group"
            >
                <div class="w-full p-8">
                    <div class="w-6 h-6 mx-auto bg-gray-300 rounded-full animate-ping"></div>
                    <p class="sr-only">Loading...</p>
                </div>
            </turbo-frame>
        </div>
    </x-slot>
</x-jet-dropdown>

<a
    class="inline-flex items-center justify-between p-2 m-1 space-x-1 text-gray-500 transition duration-150 ease-in-out border rounded-full sm:hidden hover:text-gray-700 focus:outline-none focus:border-gray-300"
    href="{{ route('entries.reactions.create', $entry) }}"
    data-turbo-frame="_top"
>
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    <span class="text-xs">New Reaction</span>
</a>
