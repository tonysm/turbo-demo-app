<?php

use App\Models\Comment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MoveCommentsContentToRichTextsFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $alias = (new Comment())->getMorphClass();

        DB::table('comments')
            ->oldest('id')
            ->cursor()
            ->each(function ($comment) use ($alias) {
                DB::table('rich_texts')
                    ->insert([
                        'field' => 'content',
                        'body' => $comment->content,
                        'record_id' => $comment->id,
                        'record_type' => $alias,
                        'created_at' => $comment->created_at,
                        'updated_at' => $comment->updated_at,
                    ]);
            });

        Schema::dropColumns('comments', 'content');
    }
}
