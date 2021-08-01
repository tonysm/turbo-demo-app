<input {{ $attributes->except(['class', 'style']) }} type="hidden">
<trix-editor
    input="{{ $attributes['id'] }}"
    {{ $attributes->merge(['style' => '', 'class' => 'trix-content form-input']) }}
    data-controller="trix"
    data-action="
        click->trix#prevent
        trix-attachment-add->trix#preventStop
        tribute-replaced->trix#tributeReplaced
    "
></trix-editor>
