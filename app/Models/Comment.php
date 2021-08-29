<?php

namespace App\Models;

use App\Models\Mentions\HasMentions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;
use Tonysm\TurboLaravel\Models\Broadcasts;

class Comment extends Model
{
    use HasFactory;
    use Broadcasts;
    use HasMentions;
    use HasRichText;

    protected $richTextFields = [
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
