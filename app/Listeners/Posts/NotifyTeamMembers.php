<?php

namespace App\Listeners\Posts;

use App\Events\PostCreated;
use App\Notifications\NewPostNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NotifyTeamMembers implements ShouldQueue
{
    public $afterCommit = true;

    public function handle(PostCreated $event)
    {
        $teamMembers = $event->post->team->allUsers()->except($event->post->user_id);

        if ($teamMembers->isEmpty()) return;

        Notification::send($teamMembers, new NewPostNotification($event->post));
    }
}
