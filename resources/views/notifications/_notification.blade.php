<turbo-frame id="@domid($notification)">
    <div class="bg-white p-4 rounded shadow my-4">
        <div class="trix-content">
            New post was published "{{ $notification->data['text'] }}" <time datetime="{{ $notification->created_at }}">{{ $notification->created_at->diffForHumans() }}</time>
        </div>
    </div>
</turbo-frame>
