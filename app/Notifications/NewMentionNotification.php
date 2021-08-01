<?php

namespace App\Notifications;

use App\Models\Mention;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewMentionNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public Mention $mention)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'mention_id' => $this->mention->id,
            'text' => $this->mention->mentionNotificationText(),
        ];
    }
}
