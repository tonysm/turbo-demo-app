<x-app-layout>
    <x-slot name="title">Edit Comment</x-slot>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="{{ $comment->parent->entryableIndexRoute() }}" class="text-cool-gray-500">{{ $comment->parent->entryableResourceName() }}</a> / <a
                href="{{ $comment->parent->entryableShowRoute() }}"
                class="text-cool-gray-500">{{ $comment->parent->title }}</a> / Edit Comment
        </h2>
    </x-slot>

    <div class="flex-1 h-screen md:h-auto md:py-12">
        <div class="h-full mx-auto space-y-12 md:h-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="h-full p-2 bg-white rounded-lg shadow md:h-auto md:p-8 lg:p-16">
                <turbo-frame id="@domid($comment)" target="_top">
                        @include('comments._form', ['comment' => $comment])
                </turbo-frame>
            </div>
        </div>
    </div>
</x-app-layout>
