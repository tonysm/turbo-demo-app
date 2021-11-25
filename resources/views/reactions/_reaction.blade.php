<form
    action="{{ route('reactions.update', $reaction) }}"
    method="POST"
    class="inline-block"
    id="@domid($reaction)"
    title="{{ $reaction->users->pluck('name')->join(', ') }}"
    data-controller="user-reaction bridge"
    data-user-reaction-users-value="{{ $reaction->users->pluck('id')->join(',') }}"
    data-action="init-turbo-native@window->bridge#changeFrameTargetOnNative"
    data-target-on-native="_top"
>
    @method('PUT')

    <button type="submit" data-user-reaction-target="button" class="inline-flex items-center justify-center px-4 py-2 m-1 space-x-2 bg-white border rounded-full">
        <x-emoji :name="$reaction->emoji" />
        <span class="text-xs text-gray-500">{{ $reaction->users()->count() }}</span>
    </button>
</form>
