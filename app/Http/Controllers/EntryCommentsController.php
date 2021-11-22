<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EntryCommentsController extends Controller
{
    public function index(Entry $entry)
    {
        return view('entry_comments.index', [
            'entry' => $entry,
            'comments' => $entry->comments()->oldest()->get(),
        ]);
    }

    public function create(Entry $entry)
    {
        $this->authorize('addComments', $entry);

        return view('entry_comments.create', [
            'entry' => $entry,
            'newComment' => $entry->comments()->make(),
        ]);
    }

    public function store(Entry $entry)
    {
        $this->authorize('addComments', $entry);

        $comment = $entry->comments()->create(
            $this->commentsParams() + ['user_id' => auth()->id()]
        );

        $comment->broadcastAppendTo($entry->entryable)
            ->target(dom_id($entry->entryable, 'comments'))
            ->toOthers()
            ->later();

        $comment->broadcastUpdateTo($entry->entryable)
            ->target(dom_id($entry->entryable, 'comments_count'))
            ->partial('entries._entryable_comments_count', ['entry' => $entry])
            ->later();

        if (Request::wantsTurboStream() && ! Request::wasFromTurboNative()) {
            return Response::turboStreamView('entry_comments.turbo.created_stream', [
                'comment' => $comment,
            ]);
        }
    }
}
