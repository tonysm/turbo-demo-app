<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Reactions\EmojiRepository;

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

    public function create(Entry $entry, EmojiRepository $emojis)
    {
        $this->authorize('addReactions', $entry);

        return view('entry_reactions.create', [
            'entry' => $entry,
            'emojis' => $emojis->get(query: request('search', null)),
            'newReaction' => $entry->reactions()->make(),
        ]);
    }

    public function store(Entry $entry)
    {
        $this->authorize('addReactions', $entry);

        $reaction = $entry->addReaction(auth()->user(), request('emoji'));

        if (request()->wantsTurboStream() && ! request()->wasFromTurboNative()) {
            if ($reaction->wasRecentlyCreated) {
                return response()->turboStream()->before($reaction, dom_id($entry, 'create_reaction_trigger'));
            }

            return response()->turboStream()->replace($reaction);
        }

        return redirect($entry->entryableRedirectAfterReaction());
    }
}
