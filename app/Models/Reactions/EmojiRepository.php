<?php

namespace App\Models\Reactions;

use Illuminate\Support\LazyCollection;

class EmojiRepository
{
    const MAX_COUNT = 100;

    private LazyCollection $data;

    public function __construct(?string $sourcePath = null)
    {
        $this->data = lazyJson($sourcePath ?: __DIR__ . '/emoji.json');
    }

    public function get(int $count = 90, int $offset = 0, string $query = null)
    {
        return $this->data
            ->when($query, $this->applySearch($query))
            ->when(!$query, fn ($items) => $items->sortBy('sort_order'))
            ->skip($offset)
            ->take(min($count, static::MAX_COUNT));
    }

    public function findByName(string $emoji, ?string $skinTone = null): ?array
    {
        $emoji = $this->data->firstWhere('short_name', $emoji);

        if (! isset($emoji['skin_variations']) || ! $skinTone) {
            return $emoji;
        }

        return $emoji['skin_variations'][$skinTone];
    }

    public function filter(callable $callback)
    {
        return $this->data->filter($callback);
    }

    public function chunk($size = 100): LazyCollection
    {
        return $this->data->chunk($size);
    }

    private function applySearch(string $query = null)
    {
        return function (LazyCollection $emojis) use ($query) {
            return $emojis
                ->filter(fn ($emoji) => (
                    str_contains(strtolower($emoji['name']), $query)
                    || str_contains(strtolower($emoji['short_name']), $query)
                ))
                ->sortBy(fn ($emoji) => levenshtein(strtolower($emoji['short_name']), $query));
        };
    }

    public function getLazyCollection(): LazyCollection
    {
        return $this->data;
    }

    public function findSvgImageByName(string $emoji, ?string $skinTone = null): string
    {
        $emoji = $this->findByName($emoji, $skinTone);

        return 'https://abs.twimg.com/emoji/v2/svg/' . str_replace('.png', '.svg', $emoji['image']);
    }
}
