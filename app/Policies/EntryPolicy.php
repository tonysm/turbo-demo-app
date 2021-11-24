<?php

namespace App\Policies;

use App\Models\Entry;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EntryPolicy
{
    use HandlesAuthorization;

    public function addComments(User $user, Entry $entry)
    {
        return $entry->entryableHasComments() && $entry->belongsToTeam($user);
    }

    public function addReactions(User $user, Entry $entry)
    {
        return $entry->entryableHasReactions() && $entry->belongsToTeam($user);
    }

    public function viewReactions(User $user, Entry $entry)
    {
        return $entry->entryableHasReactions() && $entry->belongsToTeam($user);
    }
}
