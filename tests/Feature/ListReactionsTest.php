<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListReactionsTest extends TestCase
{
    use RefreshDatabase;

    private function postEntry(array $overrides = []): array
    {
        $post = Post::withoutBroadcasting(function () use ($overrides) {
            return Post::factory()->create($overrides);
        });

        return [$post->entry, $post];
    }

    /** @test */
    public function must_be_authenticated()
    {
        [$entry] = $this->postEntry();

        $this->get(route('entries.reactions.index', $entry))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function must_be_from_same_team()
    {
        $user = User::factory()->withPersonalTeam()->create();
        [$entry] = $this->postEntry();

        $this->actingAs($user)
            ->get(route('entries.reactions.index', $entry))
            ->assertForbidden();
    }

    /** @test */
    public function can_list_reactions_of_an_entry()
    {
    }
}
