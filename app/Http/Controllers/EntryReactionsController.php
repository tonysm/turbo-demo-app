<?php

namespace App\Http\Controllers;

use App\Models\Entry;

class EntryReactionsController extends Controller
{
    public function index(Entry $entry)
    {
        $this->authorize('viewReactions', $entry);
    }

    public function create(Entry $entry)
    {
        $this->authorize('addReactions', $entry);
    }

    public function store(Entry $entry)
    {
        $this->authorize('addReactions', $entry);

        $reaction = $entry->addReaction(auth()->user(), request('emoji'));

        if (request()->wantsTurboStream() && ! request()->wasFromTurboNative()) {
            return response()->turboStream($reaction, 'append')->target(dom_id($entry, 'reactions'));
        }

        return redirect($entry->entryableShowRoute());
    }
}
