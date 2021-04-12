<?php

namespace App\Models;

use App\Events\PostCreated;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tonysm\TurboLaravel\Models\Broadcasts;

use function Illuminate\Events\queueable;
use function Tonysm\TurboLaravel\dom_id;

/**
 * @property \App\Models\Team $team
 * @property \App\Models\User $user
 */
class Post extends Model
{
    use HasFactory;
    use Broadcasts;

    protected $dispatchesEvents = [
        'created' => PostCreated::class,
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public static function booted()
    {
        static::created(function (Post $post) {
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

        static::updated(queueable(function (Post $post) {
            $post->broadcastReplaceTo($post->team)
                ->target(dom_id($post, 'card'))
                ->partial('posts._post_card', ['post' => $post]);

            $post->broadcastReplace();
        }));

        static::deleted(queueable(function (Post $post) {
            $post->broadcastRemoveTo($post->team)
                ->target(dom_id($post, 'card'));
        }));
    }

    public function scopePublished(Builder $query)
    {
        $query->whereNotNull('published_at');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->oldest();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function setContentAttribute(string $content = "")
    {
        $this->attributes['content'] = clean($content);
    }
}
