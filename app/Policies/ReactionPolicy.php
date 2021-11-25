<?php

namespace App\Policies;

use App\Models\Reaction;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReactionPolicy
{
    use HandlesAuthorization;

    public function toggle(User $user, Reaction $reaction)
    {
        return $reaction->entry->belongsToTeam($user);
    }
}
