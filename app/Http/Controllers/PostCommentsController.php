<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostCommentsController extends Controller
{
    public function index(Post $post)
    {
        return view('comments.index', [
            'post' => $post,
            'comments' => $post->comments,
        ]);
    }
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

        $comment = $post->comments()->create(
            $this->commentParams() + ['user_id' => request()->user()->id]
        );

        if (request()->wantsTurboStream()) {
            return response()->turboStreamView(view('post_comments.turbo.created_stream', ['comment' => $comment]));
        }

        return redirect()->route('posts.show', $post);
    }

    private function commentParams()
    {
        return request()->validate([
            'content' => 'required|min:1|string',
        ]);
    }
}
