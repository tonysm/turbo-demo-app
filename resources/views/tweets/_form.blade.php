<div class="flex p-4 space-x-4 bg-white">
    <div>
        <img class="object-cover w-8 h-8 rounded-full" src="{{ ($tweet->user ?: auth()->user())->profile_photo_url }}" alt="{{ ($tweet->user ?: auth()->user())->name }}" />
    </div>
    <form
        class="flex-1"
        @if($tweet->exists)
            action="{{ route('tweets.update', ['tweet' => $tweet, 'frame' => $frame ?? '']) }}"
        @else
            action="{{ route('tweets.store', ['frame' => $frame ?? '']) }}"
        @endif
        method="post"
    >
        @csrf
        @if($tweet->exists)
            @method('PUT')
        @endif

        <div class="block">
            <label for="content" class="sr-only">Tweet</label>
            <textarea class="w-full form-textarea" name="content" id="" rows="2" placeholder="What's happening?">{{ old('content', $tweet->content) }}</textarea>
            @error('content')
            <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-1 space-y-4 sm:flex sm:justify-between sm:items-center sm:space-y-0">
            <div class="flex items-center space-x-4 text-blue-600">
                <a href="#">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </a>
                <a href="#">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                </a>
                <a href="#">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </a>
                <a href="#">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </a>
            </div>
            <div class="space-x-1">
                @if($tweet->exists)
                    <a x-data @click="$dispatch('close')" href="{{ route('tweets.show', $tweet) }}" class="px-4 py-2 text-sm font-semibold text-gray-500 rounded-full hover:bg-gray-100">
                        Cancel
                    </a>
                    <button class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-full">
                        Update
                    </button>
                @else
                    <button class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-full">
                        Tweet
                    </button>
                @endif
            </div>
        </div>
    </form>
</div>
