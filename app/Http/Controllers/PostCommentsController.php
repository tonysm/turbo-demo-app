<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

use function Tonysm\TurboLaravel\dom_id;

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
            'newComment' => new Comment(),
        ]);
    }

    public function store(Post $post)
    {
        $this->authorize('addComment', $post);

        $comment = $post->comments()->create(
            $this->commentParams() + ['user_id' => request()->user()->id]
        );

        $comment->broadcastAppendTo($comment->post)
            ->target(dom_id($comment->post, 'comments'))
            ->toOthers()
            ->later();

        $comment->broadcastUpdateTo($comment->post)
            ->target(dom_id($comment->post, 'comments_count'))
            ->partial('posts._post_comments_count', ['post' => $comment->post])
            ->later();

        if (Request::wantsTurboStream() && ! Request::wasFromTurboNative()) {
            return Response::turboStreamView('comments.turbo.created_stream', [
                'comment' => $comment,
            ]);
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
