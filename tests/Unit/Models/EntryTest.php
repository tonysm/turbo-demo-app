<?php

namespace Tests\Unit\Models;

use App\Actions\Jetstream\AddTeamMember;
use App\Models\Comment;
use App\Models\Entry;
use App\Models\Model;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class EntryTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** @test */
    public function can_set_entryable_as_attribute()
    {
        [$entry, $post] = $this->postEntry();

        $this->assertEquals($post->getMorphClass(), $entry->entryable_type);
        $this->assertEquals($post->getKey(), $entry->entryable_id);
    }

    /** @test */
    public function entryable_resource_name()
    {
        [$postEntry] = $this->postEntry();
        [$commentEntry] = $this->commentEntry($postEntry);

        $this->assertEquals('Posts', $postEntry->entryableResourceName());
        $this->assertEquals('Comments', $commentEntry->entryableResourceName());
    }

    /** @test */
    public function entryable_index_route()
    {
        [$postEntry] = $this->postEntry();
        [$commentEntry] = $this->commentEntry($postEntry);

        $this->assertEquals(route('posts.index'), $postEntry->entryableIndexRoute());
        $this->assertEquals(route('entries.comments.index', $postEntry), $commentEntry->entryableIndexRoute());
    }

    /** @test */
    public function entryable_show_route()
    {
        [$postEntry] = $this->postEntry();
        [$commentEntry] = $this->commentEntry($postEntry);

        $this->assertEquals(route('posts.show', $postEntry->entryable), $postEntry->entryableShowRoute());
        $this->assertEquals(route('comments.show', $commentEntry->entryable), $commentEntry->entryableShowRoute());
    }

    /** @test */
    public function entryable_title_attribute()
    {
        [$postEntry, $post] = $this->postEntry();
        [$commentEntry, $comment] = $this->commentEntry($postEntry);

        $this->assertEquals($post->title, $postEntry->title);
        $this->assertEquals(Str::limit($comment->content->toPlainText(), 100), $commentEntry->title);
    }

    /** @test */
    public function can_have_comments()
    {
        [$postEntry] = $this->postEntry();
        [$commentEntry] = $this->commentEntry($postEntry);

        $this->assertTrue($postEntry->entryableHasComments());
        $this->assertFalse($commentEntry->entryableHasComments());
    }

    /** @test */
    public function belongs_to_team()
    {
        [$postEntry, $post] = $this->postEntry();
        [$commentEntry] = $this->commentEntry($postEntry);

        $userFromPostTeam  = User::factory()->create();
        (new AddTeamMember)->add($post->team->owner, $post->team, $userFromPostTeam->email, 'editor');
        $anotherUser = User::factory()->create();

        $this->assertTrue($postEntry->belongsToTeam($userFromPostTeam->refresh()), 'Could not determine that post entry was from same team as user.');
        $this->assertTrue($commentEntry->belongsToTeam($userFromPostTeam->refresh()), 'Could not determine that comment entry was from the same team as user.');
        $this->assertFalse($postEntry->belongsToTeam($anotherUser), 'Could not determine that post entry was NOT from same team as user.');
        $this->assertFalse($commentEntry->belongsToTeam($anotherUser), 'Could not determine that comment entry was NOT from the same team as user.');
    }

    /** @test */
    public function entry_comments()
    {
        [$postEntry, $post] = $this->postEntry();
        [, $comment] = $this->commentEntry($postEntry);

        $this->assertCount(1, $postEntry->comments);
        $this->assertCount(1, $post->comments);

        $this->assertTrue($postEntry->comments->contains($comment));
        $this->assertTrue($post->comments->contains($comment));
    }

    private function postEntry()
    {
        return Model::withoutEvents(function () {
            return Entry::withoutEntryableAutoCreation(function () {
                $entry = Entry::create([
                    'entryable' => $post = Post::factory()->create(),
                ]);

                return [$entry, $post];
            });
        });
    }

    private function commentEntry(Entry $parent)
    {
        return Model::withoutEvents(function () use ($parent) {
            return Entry::withoutEntryableAutoCreation(function () use ($parent) {
                $entry = Entry::create([
                    'entryable' => $comment = Comment::factory()->for($parent, 'parent')->create(),
                ]);

                return [$entry, $comment];
            });
        });
    }
}
