<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostCommentsController extends Controller
{
    public function create(Post $post)
    {
        $this->authorize('addComment', $post);

        return view('comments.create', [
            'post' => $post,
        ]);
    }

    public function store(Post $post)
    {
        $this->authorize('addComment', $post);

        $post->comments()->create(
            $this->commentParams() + ['user_id' => request()->user()->id]
        );

        return redirect()->route('posts.show', $post);
    }

    private function commentParams(): array
    {
        return request()->validate([
            'content' => 'required|min:1|string',
        ]);
    }
}
