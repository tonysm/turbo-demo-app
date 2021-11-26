<form
    action="{{ route('reactions.update', $reaction) }}"
    method="POST"
    class="inline-block"
    id="@domid($reaction)"
    title="{{ $reaction->users->pluck('name')->join(', ') }}"
    data-controller="user-reaction bridge"
    data-user-reaction-users-value="{{ json_encode($reaction->users->map(fn ($user) => $user->only(['id', 'preferred_skin_tone']))->all()) }}"
    data-target-on-native="_top"
    data-action="
        init-turbo-native@window->bridge#changeFrameTargetOnNative
        skinToneSync@window->user-reaction#syncCurrentUser
    "
>
    @method('PUT')

    <button type="submit" data-user-reaction-target="button" class="inline-flex items-center justify-center px-4 py-2 m-1 space-x-2 bg-white border rounded-full">
        <x-emoji data-user-reaction-target="emoji" :name="$reaction->emoji" :for-current-user="false" :skin-tones="$reaction->users->pluck('preferred_skin_tone')->unique()->all()" />
        <span class="text-xs text-gray-500">{{ $reaction->users()->count() }}</span>
    </button>
</form>
