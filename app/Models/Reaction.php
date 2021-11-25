<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tonysm\TurboLaravel\Models\Broadcasts;

class Reaction extends Model
{
    use HasFactory;
    use Broadcasts;

    public static function booted()
    {
        static::created(function (Reaction $reaction) {
            if (! static::$isBroadcasting) {
                return true;
            }

            $reaction->broadcastBeforeTo($reaction->entry->entryableStreamableForReactions(), dom_id($reaction->entry, 'create_reaction_trigger'))
                ->toOthers()
                ->later();
        });

        static::updated(function (Reaction $reaction) {
            if (! static::$isBroadcasting) {
                return true;
            }

            $reaction->broadcastReplaceTo($reaction->entry->entryableStreamableForReactions())
                ->toOthers()
                ->later();
        });

        static::deleted(function (Reaction $reaction) {
            if (! static::$isBroadcasting) {
                return true;
            }

            $reaction->broadcastRemoveTo($reaction->entry->entryableStreamableForReactions())
                ->toOthers()
                ->later();
        });
    }

    public function entry()
    {
        return $this->belongsTo(Entry::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps()
            ->using(ReactionUser::class);
    }
}
