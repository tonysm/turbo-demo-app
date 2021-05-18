<div>
    @if ($showField)
    <div>
        <p>Input Value: {{ $field }}</p>
        <x-jet-button wire:click="clearInput">Clear</x-jet-button>
    </div>
    @else
        <form wire:submit.prevent="showInput" data-turbo="false" method="POST">
            <x-jet-input id="testField" type="text" wire:model="field" />

            <x-jet-button type="submit">Send</x-jet-button>
        </form>
    @endif
</div>
