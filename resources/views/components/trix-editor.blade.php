@props(['id' => '', 'toolbar' => ''])

<div class="relative">
    <x-trix-toolbar id="{{ $id }}_toolbar" />

    <input id="{{ $id }}" {{ $attributes->except(['class', 'style']) }} type="hidden">

    <trix-editor input="{{ $id }}" toolbar="{{ $id }}_toolbar"
        {{ $attributes->merge(['style' => '', 'class' => 'trix-content form-input mt-2']) }} data-controller="trix"
        data-action="
            click->trix#prevent
            trix-attachment-add->trix#upload
            tribute-replaced->trix#tributeReplaced
        "></trix-editor>
</div>
