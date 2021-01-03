<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'published_at' => 'datetime',
    ];

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
}
