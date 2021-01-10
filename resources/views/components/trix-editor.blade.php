<input {{ $attributes }} type="hidden">
<trix-editor input="{{ $attributes['id'] }}" class="trix-content" @trix-attachment-add.prevent.stop></trix-editor>
