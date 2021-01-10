@props(['id', 'value', 'name'])
<input id="{{ $id }}" value="{{ $value }}" type="hidden" name="{{ $name }}">
<trix-editor input="{{ $id }}" class="trix-content" @trix-attachment-add.prevent.stop></trix-editor>
