@props(['value'])
<textarea type="text"
    class="block w-full p-0 py-1 text-5xl text-center border-0 outline-none"
    {{ $attributes }}
>{!! $value !!}</textarea>
