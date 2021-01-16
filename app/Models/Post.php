<?php

namespace App\Models;

use App\Events\PostCreated;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tonysm\TurboLaravel\Models\Broadcasts;

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

    public function broadcastsTo()
    {
        return [$this->team, $this];
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
