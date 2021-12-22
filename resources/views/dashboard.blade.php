<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="space-y-4">
                <x-turbo-frame id="post_cards" :src="route('posts.index')" target="_top">
                    @include('posts._post_card_empty')
                    @include('posts._post_card_empty')
                    @include('posts._post_card_empty')
                    @include('posts._post_card_empty')
                </x-turbo-frame>
            </div>
        </div>
    </div>
</x-app-layout>
