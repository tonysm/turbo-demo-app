<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Tony Messias',
            'email' => 'tonysm@hey.com',
        ]);

        $posts = Post::factory()->count(2)->create(['user_id' => $user->id]);

        Comment::factory()->count(2)->create(['post_id' => $posts->first()]);
        Comment::factory()->count(3)->create(['post_id' => $posts->last()]);

        Post::factory()
            ->times(10)
            ->has(Comment::factory()->count(5))
            ->create();
    }
}
