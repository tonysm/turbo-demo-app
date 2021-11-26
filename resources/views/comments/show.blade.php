<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="{{ $comment->parent->entryableIndexRoute() }}" class="text-cool-gray-500">{{ $comment->parent->entryableResourceName() }}</a> / <a
                href="{{ $comment->parent->entryableShowRoute() }}"
                class="text-cool-gray-500">{{ $comment->parent->title }}</a> / Comment #{{ $comment->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-12 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white rounded-lg shadow">
                @include('comments._comment', ['comment' => $comment])
            </div>
        </div>
    </div>
</x-app-layout>
