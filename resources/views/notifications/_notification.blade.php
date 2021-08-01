<turbo-frame id="@domid($notification)">
    @include('notifications._' . Str::of(class_basename($notification->type))->snake(), [
        'notification' => $notification,
    ])
</turbo-frame>
