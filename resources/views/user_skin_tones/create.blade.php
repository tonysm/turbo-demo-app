<x-app-layout>
    <x-slot name="title">Change Skin Tone</x-slot>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Change Skin Tone
        </h2>
    </x-slot>

    <div class="flex-1 h-screen md:h-auto md:py-12">
        <div class="h-full mx-auto space-y-12 max-w-7xl sm:px-6 lg:px-8">
            <div class="h-full p-2 bg-white rounded-lg shadow md:p-8 lg:p-16">
                <turbo-frame id="@domid(auth()->user(), 'change_skin_tone')" target="_top">
                    <div class="flex items-center justify-start space-x-2">
                        @foreach (config('turbo-demo.users.skin-tones') as $skinTone)
                            <form action="{{ route('skin-tones.store') }}" method="POST">
                                <input type="hidden" name="skin_tone" value="{{ $skinTone }}" />
                                <button class="px-1.5 pt-1 bg-white border rounded-full">
                                    <x-emoji name="+1" :skin-tones="[$skinTone]" />
                                </button>
                            </form>
                        @endforeach
                    </div>
                </turbo-frame>
            </div>
        </div>
    </div>
</x-app-layout>
