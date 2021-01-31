<div class="hidden sm:block space-y-2">
    @include('tweets._nav')
</div>

<div class="hidden sm:block mt-6">
    <button
        x-data @click="$dispatch('toggle-modal-modal-create-tweet');"
        class="block w-full text-center p-4 sm:px-4 sm:py-2 bg-blue-600 text-white rounded-full text-xl flex justify-center items-center space-x-2"
    >
        <svg class="sm:hidden w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
        <span class="hidden sm:inline-block">Tweet</span>
    </button>
</div>

<x-modal id="modal-create-tweet" width="md">
    <div class="flex flex-col divide-y">
        <div class="p-2 text-lg font-semibold">
            <button @click="show = false" class="rounded-full p-1 hover:bg-blue-50 text-blue-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
        </div>
        <turbo-frame id="modal_tweet" src="{{ route('tweets.create', ['frame' => 'modal']) }}" loading="lazy"></turbo-frame>
    </div>
</x-modal>
