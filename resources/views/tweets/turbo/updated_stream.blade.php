<x-turbo-stream :target="$tweet" action="replace">
    <div>
        @include('tweets._tweet', ['tweet' => $tweet])
        <span style="display: none;" x-data x-init="$dispatch('close-flyout-modal-{{ $tweet->id }}')"></span>
    </div>
</x-turbo-stream>
