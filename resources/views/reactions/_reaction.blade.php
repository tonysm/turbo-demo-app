<div id="@domid($reaction)" class="flex items-center px-4 py-2 space-x-2 rounded-full">
    <x-emoji :name="$reaction->emoji" />
    <span>{{ $reaction->users()->count() }}</span>
</div>
