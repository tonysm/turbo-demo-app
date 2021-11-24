<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ToggleReactionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function must_be_authenticated()
    {
    }

    /** @test */
    public function must_be_from_same_team()
    {
    }

    /** @test */
    public function redirects_when_non_turbo_requests()
    {
    }

    /** @test */
    public function adding_reaction_to_existing_reaction_should_return_update_when_using_turbo()
    {
    }

    /** @test */
    public function removing_reaction_should_return_replace_turbo_stream_when_there_are_other_users_in_reaction()
    {
    }

    /** @test */
    public function removing_reaction_should_return_remove_turbo_stream_when_no_other_users_left()
    {
    }
}
