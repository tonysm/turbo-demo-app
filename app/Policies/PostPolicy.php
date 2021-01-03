<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function addComment(User $user, Post $post)
    {
        return $user->allTeams()->contains($post->team);
    }
}
