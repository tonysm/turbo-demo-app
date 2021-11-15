@props(['value'])
<textarea
    {{ $attributes->merge(['class' => 'block w-full p-4 text-center rounded border border-gray-300 shadow outline-none']) }}
>{!! $value !!}</textarea>
