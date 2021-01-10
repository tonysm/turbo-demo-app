<?php

namespace App\Listeners\Posts;

use App\Events\PostCreated;
use App\Notifications\NewPostNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NotifyTeamMembers implements ShouldQueue
{
    public $afterCommit = true;

    public function handle(PostCreated $event)
    {
        $teamMembers = $event->post->team->users->except($event->post->user);

        Notification::send($teamMembers, new NewPostNotification($event->post));
    }
}
