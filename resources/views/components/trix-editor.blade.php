<input {{ $attributes->except(['class', 'style']) }} type="hidden">
<trix-editor input="{{ $attributes['id'] }}" {{ $attributes->merge(['style' => '', 'class' => 'trix-content prose-sm form-input']) }} @trix-attachment-add.prevent.stop></trix-editor>
