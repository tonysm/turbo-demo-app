<x-jet-dropdown align="left" class="inline-block m-1" id="{{ dom_id(auth()->user(), 'change_skin_tone') }}" contentClasses="py-1 bg-gray-100">
    <x-slot name="trigger">
        <button
            class="inline-flex items-center justify-between p-1 space-x-1 text-gray-500 transition duration-150 ease-in-out bg-white border rounded-full hover:text-gray-700 focus:outline-none focus:border-gray-300"
            title="Change Skin Tone"
        >
            <x-emoji name="+1" :skin-tones="[auth()->user()->preferred_skin_tone]" />
        </button>
    </x-slot>
    <x-slot name="content">
        <div class="px-2">
            <turbo-frame
                id="@domid(auth()->user(), 'change_skin_tone')"
                src="{{ route('skin-tones.create') }}"
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
