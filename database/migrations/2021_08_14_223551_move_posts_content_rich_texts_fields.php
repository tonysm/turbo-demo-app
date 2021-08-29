<?php

use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MovePostsContentRichTextsFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $alias = (new Post())->getMorphClass();

        DB::table('posts')
            ->oldest('id')
            ->cursor()
            ->each(function ($post) use ($alias) {
                DB::table('rich_texts')
                    ->insert([
                        'field' => 'content',
                        'body' => $post->content,
                        'record_id' => $post->id,
                        'record_type' => $alias,
                        'created_at' => $post->created_at,
                        'updated_at' => $post->updated_at,
                    ]);
            });

        Schema::dropColumns('posts', 'content');
    }
}
