<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'content' => implode(PHP_EOL . PHP_EOL, [
                $this->faker->text(300),
                $this->faker->text(240),
                $this->faker->text(300),
                $this->faker->text(150),
                $this->faker->text(300),
                $this->faker->text(200),
            ]),
            'user_id' => User::factory(),
            'published_at' => $this->faker->optional()->dateTime,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            // We're assigning the user's team as the post team.
            $post->team()->associate($post->user->currentTeam)->save();
        });
    }
}
