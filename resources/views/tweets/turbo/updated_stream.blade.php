<turbo-stream target="@domid($tweet)" action="replace">
    <template>
        <div>
            @include('tweets._tweet', ['tweet' => $tweet])
            <span style="display: none;" x-data x-init="$dispatch('close-flyout-modal-{{ $tweet->id }}')"></span>
        </div>
    </template>
</turbo-stream>
