<?php

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MigratePostsAndCommentsToEntries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach (DB::table('posts')->oldest('id')->cursor() as $post) {
            $postEntryId = DB::table('entries')->insertGetId([
                'entryable_id' => $post->id,
                'entryable_type' => (new Post())->getMorphClass(),
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
            ]);

            DB::table('comments')
                ->where('post_id', $post->id)
                ->update(['parent_entry_id' => $postEntryId]);

            foreach (DB::table('comments')->where('post_id', $post->id)->oldest('id')->cursor() as $comment) {
                DB::table('entries')->insert([
                    'entryable_id' => $comment->id,
                    'entryable_type' => (new Comment())->getMorphClass(),
                    'created_at' => $comment->created_at,
                    'updated_at' => $comment->updated_at,
                ]);
            }
        }

        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
            $table->dropColumn(['post_id']);
        });
    }
}
