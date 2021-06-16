<?php

use App\Models\Post;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel(User::class, function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel(Post::class, function (User $user, Post $post) {
    return $user->belongsToTeam($post->team);
});

Broadcast::channel(Team::class, function (User $user, Team $team) {
    return $user->belongsToTeam($team);
});
