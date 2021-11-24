<?php

namespace App\Http\Controllers;

use App\Models\Entry;

class EntryReactionsController extends Controller
{
    public function index(Entry $entry)
    {
        $this->authorize('viewReactions', $entry);

        return view('entry_reactions.index', [
            'entry' => $entry,
            'reactions' => $entry->reactions()->oldest()->get(),
        ]);
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
