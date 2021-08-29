<a class="space-x-1 no-underline" data-turbo-frame="_top" href="{{ route('posts.index') }}">
    <img
        class="inline-block object-cover w-4 h-4 rounded-full"
        src="{{ $user->profile_photo_url }}"
        alt="{{ $user->name }}"
    /><span>{{ $user->name }}</span>
</a>
