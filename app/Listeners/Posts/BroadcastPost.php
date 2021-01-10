<?php

namespace App\Listeners\Posts;

use App\Events\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Tonysm\TurboLaravel\Events\TurboStreamModelCreated;

class BroadcastPost implements ShouldQueue
{
    public $afterCommit = true;

    public function handle(PostCreated $event)
    {
        event(new TurboStreamModelCreated($event->post));
    }
}
