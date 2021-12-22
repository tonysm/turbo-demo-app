<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserUpdateSkinToneTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** @test */
    public function must_be_authenticated()
    {
        $this->get(route('skin-tones.create'))
            ->assertRedirect(route('login'));

        $this->post(route('skin-tones.store'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function can_see_skin_tones_create_form()
    {
        $user = User::factory()->withPersonalTeam()->create();

        $this->actingAs($user)
            ->get(route('skin-tones.create'))
            ->assertOk();
    }

    /** @test */
    public function must_be_valid_skin_tone()
    {
        $user = User::factory()->withPersonalTeam()->create();

        $this->actingAs($user)
            ->post(route('skin-tones.store'), [
                'skin_tone' => 'invalid',
            ])
            ->assertInvalid(['skin_tone']);
    }

    /** @test */
    public function can_update_skin_tone()
    {
        $user = User::factory()->withPersonalTeam()->create();

        $this->assertNull($user->preferred_skin_tone);

        $skinTone = $this->faker->randomElement(config('turbo-demo.users.skin-tones'));

        $this->actingAs($user)
            ->post(route('skin-tones.store'), [
                'skin_tone' => $skinTone,
            ])
            ->assertRedirect();

        $this->assertEquals($skinTone, $user->refresh()->preferred_skin_tone);
    }
}
