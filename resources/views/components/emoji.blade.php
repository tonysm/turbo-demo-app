@props(['name', 'skinTones' => []])
@inject('emojis', \App\Models\Reactions\EmojiRepository::class)

<div class="inline-flex items-center justify-start">
    @forelse ($skinTones as $skinTone)
        <img
            src="{{ $emojis->findSvgImageByName($name, $skinTone) }}"
            alt="{{ $name }} Reaction"
            {{ $attributes->merge(['class' => 'w-4 h-4']) }}
        />
    @empty
        <img
            src="{{ $emojis->findSvgImageByName($name) }}"
            alt="{{ $name }} Reaction"
            {{ $attributes->merge(['class' => 'w-4 h-4']) }}
        />
    @endforelse
</div>
