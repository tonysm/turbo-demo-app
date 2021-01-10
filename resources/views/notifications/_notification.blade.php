<turbo-frame id="@domid($notification)">
    <div class="bg-white p-4 rounded shadow my-4">
        <div class="mt-3 trix-content">
            {{ $notification->data['content'] }}
        </div>
    </div>
</turbo-frame>
