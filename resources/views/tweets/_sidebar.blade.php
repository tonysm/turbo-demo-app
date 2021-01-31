<div class="space-y-2">
    @include('tweets._nav')
</div>

<div class="mt-6">
    <button x-data @click="$dispatch('toggle-modal-modal-create-tweet');" class="block w-full p-2 bg-blue-600 text-white rounded-full text-xl">Tweet</button>
</div>

<x-modal id="modal-create-tweet" width="md">
    <div class="flex flex-col divide-y">
        <div class="p-2 text-lg font-semibold">
            <button @click="show = false" class="rounded-full p-1 hover:bg-blue-50 text-blue-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
        </div>
        <turbo-frame id="create_tweet_modal" src="{{ route('tweets.create', ['frame' => 'modal']) }}" loading="lazy"></turbo-frame>
    </div>
</x-modal>
