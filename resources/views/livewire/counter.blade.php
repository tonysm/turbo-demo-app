<div>
    <p>
        The state here will be updated using Livewire.
    </p>

    <div class="mt-4 text-xl font-semibold px-4 py-2 border border-gray-200 inline-block rounded shadow-lg">
        {{ $counter }}
    </div>

    <button wire:click.stop="increment" class="px-4 py-2 rounded bg-indigo-300 w-10 hover:bg-indigo-300">+</button>
    <button wire:click.stop="decrement" class="px-4 py-2 rounded bg-indigo-300 w-10 hover:bg-indigo-300">-</button>
</div>
