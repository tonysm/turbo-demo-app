@props(['name'])
@inject('emojis', \App\Models\Reactions\EmojiRepository::class)

<img
    src="{{ $emojis->findSvgImageByName($name) }}"
    alt="{{ $name }} Reaction"
    {{ $attributes->merge(['class' => 'w-4 h-4']) }}
/>
