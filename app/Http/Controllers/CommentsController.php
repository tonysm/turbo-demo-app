<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class CommentsController extends Controller
{
    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);

        return view('comments.edit', [
            'comment' => $comment,
        ]);
    }

    public function update(Comment $comment)
    {
        $this->authorize('update', $comment);

        $comment->update(request()->validate([
            'content' => 'required|min:1|string',
        ]));

        return redirect()->route('posts.index');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('destroy', $comment);

        $comment->delete();

        return redirect()->route('posts.show', $comment->post);
    }
}
