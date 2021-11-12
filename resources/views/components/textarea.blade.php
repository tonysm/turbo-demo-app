@props(['value'])
<textarea
    {{ $attributes->merge(['class' => 'block w-full p-0 py-1 text-5xl text-center border-0 outline-none']) }}
>{!! $value !!}</textarea>
