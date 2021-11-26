<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tonysm\TurboLaravel\Testing\AssertableTurboStream;
use Tonysm\TurboLaravel\Testing\InteractsWithTurbo;
use Tonysm\TurboLaravel\Testing\TurboStreamMatcher;

class CreateReactionsTest extends TestCase
{
    use RefreshDatabase;
    use InteractsWithTurbo;

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

        $this->get(route('entries.reactions.create', $entry))
            ->assertRedirect(route('login'));

        $this->post(route('entries.reactions.store', $entry), [])
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function must_be_from_same_team()
    {
        $user = User::factory()->withPersonalTeam()->create();
        [$entry] = $this->postEntry();

        $this->actingAs($user)
            ->get(route('entries.reactions.create', $entry))
            ->assertForbidden();

        $this->actingAs($user)
            ->post(route('entries.reactions.store', $entry), [])
            ->assertForbidden();
    }

    /** @test */
    public function can_create_without_turbo()
    {
        $user = User::factory()->withPersonalTeam()->create();

        [$entry, $post] = $this->postEntry([
            'user_id' => $user->id,
            'team_id' => $user->current_team_id,
        ]);

        $this->actingAs($user)
            ->post(route('entries.reactions.store', $entry), [
                'emoji' => 'ok',
            ])
            ->assertRedirect(route('posts.show', $post));

        $this->assertCount(1, $entry->refresh()->reactions);
        $this->assertCount(1, $post->refresh()->reactions);
        $this->assertCount(1, $user->refresh()->reactions);
    }

    /** @test */
    public function can_create_with_turbo()
    {
        $user = User::factory()->withPersonalTeam()->create();

        [$entry, $post] = $this->postEntry([
            'user_id' => $user->id,
            'team_id' => $user->current_team_id,
        ]);

        $this->actingAs($user)
            ->turbo()
            ->post(route('entries.reactions.store', $entry), [
                'emoji' => 'ok',
            ])
            ->assertOk()
            ->assertTurboStream(fn (AssertableTurboStream $streams) => (
                $streams->has(1)->hasTurboStream(fn (TurboStreamMatcher $stream) => (
                    $stream->where('target', dom_id($entry, 'create_reaction_trigger'))
                        ->where('action', 'before')
                        ->see('ok')
                ))
            ));

        $this->assertCount(1, $entry->refresh()->reactions);
        $this->assertCount(1, $post->refresh()->reactions);
        $this->assertCount(1, $user->refresh()->reactions);
    }
}
