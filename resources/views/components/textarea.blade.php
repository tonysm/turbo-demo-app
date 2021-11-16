@props(['value'])
<textarea
    {{ $attributes->merge(['class' => 'block w-full p-4 rounded-md border border-gray-300 shadow outline-none']) }}
>{!! $value !!}</textarea>
