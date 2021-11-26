<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tonysm\TurboLaravel\Testing\AssertableTurboStream;
use Tonysm\TurboLaravel\Testing\InteractsWithTurbo;
use Tonysm\TurboLaravel\Testing\TurboStreamMatcher;

class ToggleReactionTest extends TestCase
{
    use RefreshDatabase;
    use InteractsWithTurbo;

    /** @test */
    public function must_be_authenticated()
    {
        $post = Post::withoutBroadcasting(fn () => Post::factory()->create());
        $reaction = $post->entry->addReaction(User::factory()->create(), 'ok');

        $this->put(route('reactions.update', $reaction))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function must_be_from_same_team()
    {
        $post = Post::withoutBroadcasting(fn () => Post::factory()->create());
        $reaction = $post->entry->addReaction(User::factory()->create(), 'ok');

        $this->actingAs(User::factory()->withPersonalTeam()->create())
            ->put(route('reactions.update', $reaction))
            ->assertForbidden();
    }

    /** @test */
    public function redirects_when_non_turbo_requests()
    {
        $user = User::factory()->withPersonalTeam()->create();

        $post = Post::withoutBroadcasting(fn () => Post::factory()->create([
            'team_id' => $user->current_team_id,
            'user_id' => $user->id,
        ]));

        $reaction = $post->entry->addReaction(User::factory()->create(), 'ok');

        $this->actingAs($user)
            ->put(route('reactions.update', $reaction))
            ->assertRedirect(route('posts.show', $post));

    }

    /** @test */
    public function adding_reaction_to_existing_reaction_should_return_update_when_using_turbo()
    {
        $user = User::factory()->withPersonalTeam()->create();

        $post = Post::withoutBroadcasting(fn () => Post::factory()->create([
            'team_id' => $user->current_team_id,
            'user_id' => $user->id,
        ]));

        $reaction = $post->entry->addReaction(User::factory()->create(), 'ok');

        $this->actingAs($user)
            ->turbo()
            ->put(route('reactions.update', $reaction))
            ->assertOk()
            ->assertTurboStream(fn (AssertableTurboStream $streams) => (
                $streams->has(1)->hasTurboStream(fn (TurboStreamMatcher $stream) => (
                    $stream->where('target', dom_id($reaction))
                        ->where('action', 'replace')
                ))
            ));

    }

    /** @test */
    public function removing_reaction_should_return_replace_turbo_stream_when_there_are_other_users_in_reaction()
    {
        $user = User::factory()->withPersonalTeam()->create();

        $post = Post::withoutBroadcasting(fn () => Post::factory()->create([
            'team_id' => $user->current_team_id,
            'user_id' => $user->id,
        ]));

        $post->entry->addReaction(User::factory()->create(), 'ok');

        // Current user already has reaction, so it will be removed...
        $reaction = $post->entry->addReaction($user, 'ok');

        $this->actingAs($user)
            ->turbo()
            ->put(route('reactions.update', $reaction))
            ->assertOk()
            ->assertTurboStream(fn (AssertableTurboStream $streams) => (
                $streams->has(1)->hasTurboStream(fn (TurboStreamMatcher $stream) => (
                    $stream->where('target', dom_id($reaction))
                        ->where('action', 'replace')
                ))
            ));

    }

    /** @test */
    public function removing_reaction_should_return_remove_turbo_stream_when_no_other_users_left()
    {
        $user = User::factory()->withPersonalTeam()->create();

        $post = Post::withoutBroadcasting(fn () => Post::factory()->create([
            'team_id' => $user->current_team_id,
            'user_id' => $user->id,
        ]));

        // Only the current user has left here, so this reaction will be removed...
        $reaction = $post->entry->addReaction($user, 'ok');

        $this->actingAs($user)
            ->turbo()
            ->put(route('reactions.update', $reaction))
            ->assertOk()
            ->assertTurboStream(fn (AssertableTurboStream $streams) => (
                $streams->has(1)->hasTurboStream(fn (TurboStreamMatcher $stream) => (
                    $stream->where('target', dom_id($reaction))
                        ->where('action', 'remove')
                ))
            ));

        $this->assertModelMissing($reaction);
    }
}
