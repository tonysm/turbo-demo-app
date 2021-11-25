<?php

namespace App\Http\Controllers;

use App\Models\Reaction;

class ReactionsController extends Controller
{
    public function update(Reaction $reaction)
    {
        $this->authorize('toggle', $reaction);

        $reaction->users()->toggle(auth()->user());

        if ($reaction->users()->count() === 0) {
            $reaction->delete();
        }

        if (request()->wantsTurboStream() && ! request()->wasFromTurboNative()) {
            if ($reaction->exists) {
                return response()->turboStream()->replace($reaction);
            }

            return response()->turboStream()->remove($reaction);
        }

        return redirect($reaction->entry->entryableShowRoute());
    }
}
