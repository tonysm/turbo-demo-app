@props(['id', 'maxWidth'])

@php
    switch ($maxWidth ?? '2xl') {
        case 'sm':
            $maxWidth = 'sm:max-w-sm';
            break;
        case 'md':
            $maxWidth = 'sm:max-w-md';
            break;
        case 'lg':
            $maxWidth = 'sm:max-w-lg';
            break;
        case 'xl':
            $maxWidth = 'sm:max-w-xl';
            break;
        case '2xl':
        default:
            $maxWidth = 'sm:max-w-2xl';
            break;
    }
@endphp

<div
    data-controller="modal"
    data-action="
        close->modal#close
        keydown->modal#handleKeydown
        toggle-modal-{{ $id }}@window->modal#toggle
        close-modal-{{ $id }}@window->modal#close
    "
    id="{{ $id }}"
    class="fixed inset-x-0 top-0 px-4 pt-6 z-50 sm:px-0 sm:flex sm:items-top sm:justify-center hidden"
>
    <div data-modal-target="backdrop" class="fixed inset-0 transition-all transform hidden" data-action="click->modal#close" data-transition-enter="ease-out duration-300"
         data-transition-enter-start="opacity-0"
         data-transition-enter-end="opacity-100"
         data-transition-leave="ease-in duration-200"
         data-transition-leave-start="opacity-100"
         data-transition-leave-end="opacity-0">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div data-modal-target="box" class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full {{ $maxWidth }} hidden"
         data-transition-enter="ease-out duration-300"
         data-transition-enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         data-transition-enter-end="opacity-100 translate-y-0 sm:scale-100"
         data-transition-leave="ease-in duration-200"
         data-transition-leave-start="opacity-100 translate-y-0 sm:scale-100"
         data-transition-leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
        {{ $slot }}
    </div>
</div>
