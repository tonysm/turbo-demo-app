<x-app-layout>
    <x-slot name="title">New Reaction</x-slot>

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
                    <div class="relative">
                        <form x-data class="sticky top-0" x-data @click.stop action="{{ route('entries.reactions.create', $entry) }}" method="GET" data-turbo-frame="@domid($entry, 'create_reaction')">
                            <x-jet-label class="sr-only">Type to search...</x-jet-label>
                            <x-jet-input name="search" value="{{ old('search', request('search')) }}" placeholder="Type to search..." class="w-full p-2 my-2 text-base border rounded-full sm:border-transparent" autofocus autocomplete="off" />
                            <button type="submit" hidden>Submit</button>
                        </form>
                        <div class="grid grid-cols-7 gap-2 py-2 mt-2 overflow-y-auto border-t sm:max-h-40 group-busy:opacity-50" x-data x-on:click.stop>
                            @forelse ($emojis as $emoji)
                                <form x-data x-on:turbo:submit-end="$dispatch('close')" action="{{ route('entries.reactions.store', $entry) }}" method="POST" class="block mx-auto">
                                    <input type="hidden" name="emoji" value="{{ $emoji['short_name'] }}" />
                                    <button class="px-1.5 pt-1 bg-white border rounded-full" title="React with {{ $emoji['short_name'] }}">
                                        <x-emoji :name="$emoji['short_name']" :for-current-user="true" />
                                    </button>
                                </form>
                            @empty
                                <p class="col-span-7 text-center text-gray-400">No emojis found.</p>
                            @endforelse
                        </div>

                        <div class="bottom-0 hidden w-full pt-2 border-t md:block md:sticky md:bg-gray-100" x-data @click.stop>
                            @include('user_skin_tones._update_skin_tone_trigger')
                        </div>
                    </div>
                </turbo-frame>
            </div>
        </div>
    </div>
</x-app-layout>
