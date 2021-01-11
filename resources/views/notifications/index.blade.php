<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12 -my-4">
            <turbo-frame id="{{ $frame }}">
                @foreach($notifications as $notification)
                    @include('notifications._notification', ['notification' => $notification])
                @endforeach

                @if($notifications->isEmpty())
                    <turbo-frame id="empty_notifications">
                        <div class="bg-white p-2 my-2 rounded shadow">
                            <div class="text-gray-400 text-center">
                                No notifications yet.
                            </div>
                        </div>
                    </turbo-frame>
                @endif
            </turbo-frame>
        </div>
    </div>
</x-app-layout>
