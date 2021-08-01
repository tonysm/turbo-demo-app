<?php

namespace App\Models;

use App\Notifications\NewMentionNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function Illuminate\Events\queueable;

class Mention extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function booted()
    {
        static::created(queueable(function (Mention $mention) {
            $mention->mentionee->notify(new NewMentionNotification($mention));
        }));

        static::deleting(function (Mention $mention) {
            $mention->mentionee
                ->notifications()
                ->where('data->mention_id', $mention->id)
                ->get()
                ->each->delete();
        });
    }

    public function record()
    {
        return $this->morphTo();
    }

    public function mentionee()
    {
        return $this->belongsTo(User::class);
    }

    public function mentionNotificationText()
    {
        return match ($this->record::class) {
            Comment::class => 'You were mentioned in a comment.',
            Post::class => 'You were mentioned in a post.',
        };
    }
}
