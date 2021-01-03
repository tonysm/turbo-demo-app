<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\ValidationException;

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

        try {
            $comment = $post->comments()->create(
                $this->commentParams() + ['user_id' => request()->user()->id]
            );
        } catch (ValidationException $exception) {
            throw $exception->redirectTo(route('posts.comments.create', $post));
        }

        if (request()->wantsTurboStream()) {
            return response()->turboStreamView(view('post_comments.create_turbo_stream', ['comment' => $comment]));
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
