<x-turbo-frame :id="$notification">
    @include('notifications._' . Str::of(class_basename($notification->type))->snake(), [
        'notification' => $notification,
    ])
</x-turbo-frame>
