<div class="hidden space-y-2 sm:block">
    @include('tweets._nav')
</div>

<div class="hidden mt-6 sm:block">
    <button
        x-data @click="$dispatch('toggle-modal-modal-create-tweet');"
        class="flex items-center justify-center block w-full p-4 space-x-2 text-xl text-center text-white bg-blue-600 rounded-full sm:px-4 sm:py-2"
    >
        <svg class="w-8 h-8 sm:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
        <span class="hidden sm:inline-block">Tweet</span>
    </button>
</div>

<x-modal id="modal-create-tweet" width="md">
    <div class="flex flex-col divide-y">
        <div class="p-2 text-lg font-semibold">
            <button data-action="modal#close" class="p-1 text-blue-500 rounded-full hover:bg-blue-50"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
        </div>
        <x-turbo-frame id="modal_tweet" :src="route('tweets.create', ['frame' => 'modal'])" loading="lazy" />
    </div>
</x-modal>
