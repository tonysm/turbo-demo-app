<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto -my-4 space-y-12 max-w-7xl sm:px-6 lg:px-8">
            <x-turbo-frame :id="$frame">
                @foreach($notifications as $notification)
                    @include('notifications._notification', ['notification' => $notification])
                @endforeach

                @if($notifications->isEmpty())
                    <x-turbo-frame id="empty_notifications">
                        <div class="p-2 my-2 bg-white rounded shadow">
                            <div class="text-center text-gray-400">
                                No notifications yet.
                            </div>
                        </div>
                    </x-turbo-frame>
                @endif
            </x-turbo-frame>
        </div>
    </div>
</x-app-layout>
