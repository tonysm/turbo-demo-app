<?php

namespace App\Models\Entries;

use App\Models\Comment;

trait Commentable
{
    public function comments()
    {
        return $this->hasMany(Comment::class, 'parent_entry_id');
    }

    public function entryableHasComments()
    {
        return $this->entryable->canHaveComments();
    }
}
