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

    public function get(int $count = 50, int $offset = 0, string $query = null)
    {
        return $this->data
            ->when($query, $this->applySearch($query))
            ->skip($offset)
            ->take(min($count, static::MAX_COUNT));
    }

    public function findByName(string $emoji): ?array
    {
        return $this->data->firstWhere('short_name', $emoji);
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

    public function findSvgImageByName(string $emoji): string
    {
        $emoji = $this->data->firstWhere('short_name', $emoji);

        return 'https://abs.twimg.com/emoji/v2/svg/' . str_replace('.png', '.svg', $emoji['image']);
    }
}
