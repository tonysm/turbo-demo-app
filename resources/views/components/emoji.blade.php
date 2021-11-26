@props(['name', 'skinTones' => [], 'forCurrentUser' => false])
@inject('emojis', \App\Models\Reactions\EmojiRepository::class)

<div
    class="inline-flex items-center justify-start"
    data-controller="emoji"
    data-emoji-skin-tones-value="{{ implode(',', $skinTones) }}"
    data-emoji-for-current-user-value="{{ $forCurrentUser ? 1 : 0 }}"
    data-action="
        skinToneSync@window->emoji#sync
        reload->emoji#reload
    "
    {{ $attributes }}
>
    @php
        $emoji = $emojis->findByName($name);
    @endphp

    <img
        src="{{ $emojis->urlFor($emoji['image']) }}"
        alt="{{ $name }} Reaction"
        data-emoji-target="image"
        data-skin-tone=""
        loading="lazy"
        {{ $attributes->merge(['class' => 'w-4 h-4 hidden']) }}
    />

    @isset ($emoji['skin_variations'])
        @foreach ($emoji['skin_variations'] as $skinTone => $emojiData)
            <img
                src="{{ $emojis->urlFor($emojiData['image']) }}"
                alt="{{ $name }} Reaction"
                data-emoji-target="image"
                data-skin-tone="{{ $skinTone }}"
                loading="lazy"
                {{ $attributes->merge(['class' => 'w-4 h-4 hidden']) }}
            />
        @endforeach
    @endisset
</div>
