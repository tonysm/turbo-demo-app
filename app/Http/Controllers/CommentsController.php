<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Validation\ValidationException;

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

        try {
            $comment->update(request()->validate([
                'content' => 'required|min:1|string',
            ]));
        } catch (ValidationException $exception) {
            throw $exception->redirectTo(route('comments.edit', $comment));
        }

        if (request()->wantsTurboStream()) {
            return response()->turboStream($comment);
        }

        return redirect()->route('posts.show', $comment->post);
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
