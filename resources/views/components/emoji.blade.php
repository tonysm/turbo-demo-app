@props(['name'])
@inject('emojis', \App\Models\Reactions\EmojiRepository::class)

<img src="{{ $emojis->findSvgImageByName($name) }}" alt="{{ $name }} Reaction"  />
