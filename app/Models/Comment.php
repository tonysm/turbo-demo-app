<?php

namespace App\Models;

use App\Models\Mentions\HasMentions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tonysm\RichTextLaravel\Attachables\RemoteImage;
use Tonysm\RichTextLaravel\Attachment;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;
use Tonysm\TurboLaravel\Models\Broadcasts;

class Comment extends Model
{
    use HasFactory;
    use Broadcasts;
    use HasMentions;
    use HasRichText;
    use Entryable;

    protected $richTextFields = [
        'content',
    ];

    public function prune()
    {
        $this->content->attachments()->each(function (Attachment $attachment) {
            if ($attachment->attachable instanceof RemoteImage) {
                Storage::disk('public')->delete(str_replace(
                    Storage::disk('public')->url(''),
                    '',
                    $attachment->attachable->url,
                ));
            }
        });

        $this->entry->prune();
        $this->delete();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTeamAttribute()
    {
        return $this->parent->entryable->team;
    }

    public function parent()
    {
        return $this->belongsTo(Entry::class, 'parent_entry_id');
    }

    public function entryableTeam()
    {
        return $this->parent->entryableTeam();
    }

    public function entryableTitle()
    {
        return Str::limit($this->content->toPlainText(), 100, '...');
    }

    public function entryableIndexRoute()
    {
        return route('entries.comments.index', $this->parent);
    }

    public function entryableRedirectAfterReaction()
    {
        return $this->parent->entryableShowRoute();
    }

    public function entryableStreamableForReactions()
    {
        return $this->parent->entryableStreamableForReactions();
    }
}
