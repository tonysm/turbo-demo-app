<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tonysm\TurboLaravel\Testing\InteractsWithTurbo;
use function Tonysm\TurboLaravel\dom_id;

class PostsTest extends TestCase
{
    use RefreshDatabase;
    use InteractsWithTurbo;

    /** @test */
    public function updates_post()
    {
        $user = User::factory()->create();

        $post = Post::factory()->create([
            'title' => 'Old Title',
            'user_id' => $user->id,
            'team_id' => $user->currentTeam->id,
        ]);

        $this
            ->from(route('posts.edit', $post))
            ->actingAs($user)
            ->put(route('posts.update', $post), [
                'title' => 'Updated',
                'content' => $post->content,
            ])
            ->assertRedirect(route('posts.show', $post));
    }

    /** @test */
    public function updates_over_turbo_stream()
    {
        $user = User::factory()->create();

        $post = Post::factory()->create([
            'title' => 'Old Title',
            'user_id' => $user->id,
            'team_id' => $user->currentTeam->id,
        ]);

        $this
            ->turbo()
            ->actingAs($user)
            ->put(route('posts.update', $post), [
                'title' => 'Updated Title',
                'content' => $post->content,
            ])
            ->assertTurboStream()
            ->assertHasTurboStream(dom_id($post), 'replace')
            ->assertSee('Updated Title');
    }
}
