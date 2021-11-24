<div id="@domid($reaction)" class="flex items-center justify-between px-4 py-2 space-x-2 bg-white rounded-full">
    <x-emoji :name="$reaction->emoji" />
    <span class="text-sm text-gray-800">{{ $reaction->users()->count() }}</span>
</div>
