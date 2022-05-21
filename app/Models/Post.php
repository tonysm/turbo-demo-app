<?php

namespace App\Models;

use App\Events\PostCreated;
use App\Models\Attachment as AttachmentModel;
use App\Models\Mentions\HasMentions;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Support\Facades\Storage;
use Tonysm\GlobalId\Models\HasGlobalIdentification;
use Tonysm\RichTextLaravel\Attachables\RemoteImage;
use Tonysm\RichTextLaravel\Attachment;
use Tonysm\RichTextLaravel\Content;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;
use Tonysm\TurboLaravel\Models\Broadcasts;

use function Tonysm\TurboLaravel\dom_id;

/**
 * @property \App\Models\Team $team
 * @property \App\Models\User $user
 * @property Content $content
 */
class Post extends Model
{
    use HasFactory;
    use Broadcasts;
    use HasMentions;
    use HasRichText;
    use HasGlobalIdentification;
    use Entryable;
    use Prunable;

    protected $allowCommentsOnEntry = true;

    protected $dispatchesEvents = [
        'created' => PostCreated::class,
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected $richTextFields = [
        'content',
    ];

    public static function booted()
    {
        static::created(function (Post $post) {
            if (! static::$isBroadcasting) {
                return true;
            }

            $post->broadcastPrependTo($post->team)
                ->target('post_cards')
                ->partial('posts._post_card', ['post' => $post])
                ->toOthers()
                ->later();

            $post->broadcastRemove()
                ->target('empty_posts')
                ->toOthers()
                ->later();
        });

        static::updated(function (Post $post) {
            if (! static::$isBroadcasting) {
                return true;
            }

            $post->broadcastReplaceTo($post->team)
                ->target(dom_id($post, 'card'))
                ->partial('posts._post_card', ['post' => $post])
                ->later();

            $post->broadcastReplace()->later();
        });

        static::deleted(function (Post $post) {
            if (! static::$isBroadcasting) {
                return true;
            }

            $post->broadcastRemoveTo($post->team)
                ->target(dom_id($post, 'card'));
        });
    }

    public function syncAttachmentsMeta()
    {
        $this->content->attachments()
            ->filter(fn ($attachment) => $attachment->attachable instanceof AttachmentModel)
            ->each(function ($attachment) {
                $attachment->attachable->update([
                    'record' => $this,
                    'verified_at' => now(),
                    'caption' => $attachment->node->getAttribute('caption'),
                ]);
            });
    }

    public function prunable()
    {
        return static::where('created_at', '<=', now()->subDays(2));
    }

    public function pruning()
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
    }

    public function scopePublished(Builder $query)
    {
        $query->whereNotNull('published_at');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function attachments()
    {
        return $this->morphMany(AttachmentModel::class, 'record');
    }

    public function entryableTitle()
    {
        return $this->title;
    }
}
