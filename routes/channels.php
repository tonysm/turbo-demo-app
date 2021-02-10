<?php

use App\Models\Post;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
use function Tonysm\TurboLaravel\turbo_channel_auth;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel(turbo_channel_auth(User::class, '{id}'), function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel(turbo_channel_auth(Post::class, '{post}'), function (User $user, Post $post) {
    return $user->belongsToTeam($post->team);
});

Broadcast::channel(turbo_channel_auth(Team::class, '{team}'), function (User $user, Team $team) {
    return $user->belongsToTeam($team);
});
