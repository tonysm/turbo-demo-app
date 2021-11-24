<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="{{ $entry->entryableIndexRoute() }}" class="text-cool-gray-500">{{ $entry->entryableResourceName() }}</a> / <a
                href="{{ $entry->entryableShowRoute() }}"
                class="text-cool-gray-500">{{ $entry->title }}</a> / New Reactions
        </h2>
    </x-slot>

    <div class="flex-1 h-screen md:h-auto md:py-12">
        <div class="h-full mx-auto space-y-12 max-w-7xl sm:px-6 lg:px-8">
            <div class="h-full p-2 bg-white rounded-lg shadow md:p-8 lg:p-16">
                <turbo-frame id="@domid($entry, 'create_reaction')" target="_top">
                    <form action="{{ route('entries.reactions.create', $entry) }}" method="GET">
                        <x-jet-label class="sr-only">Type to search...</x-jet-label>
                        <x-jet-input name="search" value="{{ old('search', request('search')) }}" placeholder="Type to search..." class="w-full p-2 my-2 text-lg rounded-full" />
                        <button type="submit" hidden>Submit</button>
                    </form>

                    <div class="mt-4">
                        @forelse ($emojis as $emoji)
                            <form action="{{ route('entries.reactions.store', $entry) }}" method="POST" class="inline-block m-2">
                                @csrf
                                <input type="hidden" name="emoji" value="{{ $emoji['short_name'] }}" />
                                <button class="p-2 bg-white border rounded-full">
                                    <x-emoji :name="$emoji['short_name']" />
                                </button>
                            </form>
                        @empty
                            <p class="text-center text-gray-400">No emojis found.</p>
                        @endforelse
                    </div>
                </turbo-frame>
            </div>
        </div>
    </div>
</x-app-layout>
