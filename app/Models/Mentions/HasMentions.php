<?php

namespace App\Models\Mentions;

use App\Models\Mention;
use App\Models\User;
use Tonysm\RichTextLaravel\Casts\AsRichTextContent;

use function Illuminate\Events\queueable;

trait HasMentions
{
    public static function bootHasMentions()
    {
        static::saved(queueable(function ($model) {
            $model->syncMentions();
        }));
    }

    public function mentions()
    {
        return $this->morphMany(Mention::class, 'record');
    }

    public function syncMentions(): void
    {
        foreach ($this->casts as $field => $caster) {
            if ($caster !== AsRichTextContent::class) {
                continue;
            }

            $mentionedUsers = $this->{$field}->attachables()
                ->unique()
                ->filter(fn ($attachable) => $attachable instanceof User)
                ->values()
                ->pluck('id');

            $this->mentions
                ->filter(fn (Mention $mention) => ! $mentionedUsers->contains($mention->mentionee_id))
                ->each->delete();

            $newMentions = $mentionedUsers
                ->filter(fn ($mentioneeId) => ! $this->mentions->pluck('mentionee_id')->contains($mentioneeId))
                ->map(fn ($mentioneeId) => $this->mentions()->make(['mentionee_id' => $mentioneeId]));

            if ($newMentions->count() > 0) {
                $this->mentions()->saveMany($newMentions);
            }

            $this->load('mentions');
        }
    }
}
