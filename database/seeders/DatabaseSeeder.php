<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Model;
use App\Models\Post;
use App\Models\User;
use App\Models\Entry;
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

        Entry::withoutEntryableAutoCreation(function () use ($user) {
            Post::factory()
                ->times(5)
                ->has(Entry::factory()
                    ->has(Comment::factory()
                        ->times(4)
                        ->has(Entry::factory())))
                ->for($user)
                ->create();

            Post::factory()
                ->times(10)
                ->has(Entry::factory()->has(Comment::factory()->times(4)->has(Entry::factory())))
                ->create();
        });
    }
}
