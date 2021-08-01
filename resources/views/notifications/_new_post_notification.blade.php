<div class="p-4 my-4 bg-white rounded shadow">
    <div class="trix-content">
        New post was published "{{ $notification->data['text'] }}" <time datetime="{{ $notification->created_at }}">{{ $notification->created_at->diffForHumans() }}</time>
    </div>
</div>
