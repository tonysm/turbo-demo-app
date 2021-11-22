<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="{{ $entry->entrybleIndexRoute() }}" class="text-cool-gray-500">{{ $entry->entryableResourceName() }}</a> / <a
                href="{{ $entry->entruableShowRoute() }}"
                class="text-cool-gray-500">{{ $entry->title }}</a> / Comments
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-12 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-2 bg-white rounded-lg shadow md:p-8 lg:p-16">
                <turbo-frame id="@domid($entry->entryable, 'comments')" class="flex flex-col">
                    @foreach($comments as $comment)
                        @include('comments._comment', ['comment' => $comment])
                    @endforeach
                </turbo-frame>
            </div>
        </div>
    </div>
</x-app-layout>
