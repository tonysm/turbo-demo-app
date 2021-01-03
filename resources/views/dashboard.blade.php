<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-4">
                <turbo-frame id="post_cards" src="{{ route('posts.index') }}" target="_top">
                    @include('posts._post_card_empty')
                    @include('posts._post_card_empty')
                    @include('posts._post_card_empty')
                    @include('posts._post_card_empty')
                </turbo-frame>
            </div>
        </div>
    </div>
</x-app-layout>
