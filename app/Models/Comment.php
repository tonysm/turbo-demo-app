<?php

namespace App\Models;

use App\Models\Mentions\HasMentions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function entryableTitle()
    {
        return Str::limit($this->content->toPlainText(), 100, '...');
    }

    public function parent()
    {
        return $this->belongsTo(Entry::class, 'parent_entry_id');
    }
}
