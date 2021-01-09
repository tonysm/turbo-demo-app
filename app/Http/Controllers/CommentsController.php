<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class CommentsController extends Controller
{
    public function show(Comment $comment)
    {
        $this->authorize('view', $comment);

        return view('comments.show', [
            'comment' => $comment,
        ]);
    }

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
            'content' => 'required|min:10|string',
        ]));

        if (request()->wantsTurboStream()) {
            return response()->turboStream($comment);
        }

        return redirect()->route('posts.show', $comment->post);
    }

    public function delete(Comment $comment)
    {
        $this->authorize('destroy', $comment);

        return view('comments.delete', [
            'comment' => $comment,
        ]);
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('destroy', $comment);

        $comment->delete();

        if (request()->wantsTurboStream()) {
            return response()->turboStreamView(view('comments.turbo.deleted_stream', ['comment' => $comment]));
        }

        return redirect()->route('posts.show', $comment->post);
    }
}
