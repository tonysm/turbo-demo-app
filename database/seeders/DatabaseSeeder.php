<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Model;
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
        Model::withoutEvents(function () {
            $user = User::factory()->create([
                'name' => 'Tony Messias',
                'email' => 'tonysm@hey.com',
            ]);

            Post::factory()
                ->times(5)
                ->has(Comment::factory()->times(4))
                ->create(['user_id' => $user->id]);

            Post::factory()
                ->times(10)
                ->has(Comment::factory()->times(5))
                ->create();
        });
    }
}
