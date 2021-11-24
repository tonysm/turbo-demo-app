<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="{{ $entry->entryableIndexRoute() }}" class="text-cool-gray-500">{{ $entry->entryableResourceName() }}</a> / <a
                href="{{ $entry->entryableShowRoute() }}"
                class="text-cool-gray-500">{{ $entry->title }}</a> / Reactions
        </h2>
    </x-slot>

    <div class="flex-1 h-screen md:h-auto md:py-12">
        <div class="h-full mx-auto space-y-12 max-w-7xl sm:px-6 lg:px-8">
            <div class="h-full p-2 bg-white rounded-lg shadow md:p-8 lg:p-16">
                <turbo-frame id="@domid($entry, 'reactions')" target="_top" class="">
                    @foreach ($reactions as $reaction)
                        @include('reactions._reaction', ['reaction' => $reaction])
                    @endforeach
                </turbo-frame>
            </div>
        </div>
    </div>
</x-app-layout>
