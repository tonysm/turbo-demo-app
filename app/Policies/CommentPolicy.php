<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Comment $comment)
    {
        return $comment->parent->belongsToTeam($user);
    }

    public function update(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id;
    }

    public function destroy(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id;
    }
}
