<div id="@domid($reaction)" class="inline-flex items-center justify-between px-4 py-2 m-2 space-x-2 bg-white border rounded-full">
    <x-emoji :name="$reaction->emoji" />
    <span class="text-xs text-gray-500">{{ $reaction->users()->count() }}</span>
</div>
