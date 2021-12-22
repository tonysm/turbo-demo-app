<x-turbo-frame id="trending" :src="route('trending')">
    <div class="bg-gray-200 rounded-lg shadow">
        <div class="w-full p-8">
            <div class="w-6 h-6 mx-auto bg-gray-300 rounded-full animate-ping"></div>
            <p class="sr-only">Loading...</p>
        </div>
    </div>
</x-turbo-frame>
