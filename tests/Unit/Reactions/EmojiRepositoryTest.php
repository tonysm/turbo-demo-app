<?php

namespace Tests\Unit\Reactions;

use App\Models\Reactions\EmojiRepository;
use Tests\TestCase;

class EmojiRepositoryTest extends TestCase
{
    /** @test */
    public function can_list_emojis()
    {
        $emojis = $this->repository()->get(50);

        $this->assertCount(50, $emojis);
    }

    /** @test */
    public function cannot_search_more_than_limit()
    {
        $emojis = $this->repository()->get(500);

        $this->assertCount(EmojiRepository::MAX_COUNT, $emojis);
    }

    /** @test */
    public function can_search()
    {
        $emojis = $this->repository()->get(500, query: 'ok');

        $this->assertEquals('SQUARED OK', $emojis->first()['name']);
    }

    /** @test */
    public function can_offset_emojis()
    {
        $firstOne = $this->repository()->get(1);
        $emojis = $this->repository()->get(50, offset: 1);

        $this->assertCount(50, $emojis);
        // The first one does was skipped in the offset.
        $this->assertNull(
            $emojis->first(fn ($emoji) => $emoji['unified'] === $firstOne->first()['unified'])
        );
    }

    private function repository()
    {
        return new EmojiRepository();
    }
}
