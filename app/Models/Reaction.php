<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reaction extends Model
{
    use HasFactory;

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
