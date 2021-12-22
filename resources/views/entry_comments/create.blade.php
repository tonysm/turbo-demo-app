<x-app-layout>
    <x-slot name="title">New Comment on {{ $entry->title }}</x-slot>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="{{ $entry->entryableIndexRoute() }}" class="text-cool-gray-500">{{ $entry->entryableResourceName() }}</a> / <a
                href="{{ $entry->entryableShowRoute() }}"
                class="text-cool-gray-500">{{ $entry->title }}</a> / New Comment
        </h2>
    </x-slot>

    <div class="flex-1 h-screen md:h-auto md:py-12">
        <div class="h-full mx-auto space-y-12 max-w-7xl sm:px-6 lg:px-8">
            <div class="h-full p-2 bg-white rounded-lg shadow md:p-8 lg:p-16">
                <x-turbo-frame :id="[$entry, 'create_comment']" target="_top">
                    @include('comments._form', ['entry' => $entry, 'comment' => $newComment])
                </x-turbo-frame>
            </div>
        </div>
    </div>
</x-app-layout>
