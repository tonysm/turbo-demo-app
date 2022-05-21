<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

use function Tonysm\TurboLaravel\dom_id;

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

        $comment->syncAttachmentsMeta();
        $comment->broadcastReplaceTo($comment->parent->entryable)->toOthers()->later();

        if (Request::wantsTurboStream() && ! Request::wasFromTurboNative()) {
            return Response::turboStream()->replace($comment);
        }

        return redirect()->route('posts.show', $comment->post);
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('destroy', $comment);

        $comment->delete();

        $comment->broadcastRemoveTo($comment->parent->entryable)->toOthers()->later();

        $comment->broadcastUpdateTo($comment->parent->entryable)
            ->target(dom_id($comment->parent, 'comments_count'))
            ->partial('entry_comments._entry_comments_count', ['entry' => $comment->parent])
            ->later();

        if (Request::wantsTurboStream() && ! Request::wasFromTurboNative()) {
            return Response::turboStream()->remove($comment);
        }

        return redirect()->route('posts.show', $comment->post);
    }
}
