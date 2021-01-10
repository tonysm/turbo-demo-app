<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tonysm\TurboLaravel\Models\Broadcasts;

class Comment extends Model
{
    use HasFactory;
    use Broadcasts;

    public $broadcastsTo = [
        'post',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function setContentAttribute(string $content = "")
    {
        $this->attributes['content'] = clean($content);
    }
}
