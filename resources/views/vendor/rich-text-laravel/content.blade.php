<div class="w-full trix-content">
@if (trim($trixContent = $content->renderWithAttachments()))
    {!! $trixContent !!}
@endif
</div>
