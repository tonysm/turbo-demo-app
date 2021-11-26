<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ReactionUser extends Pivot
{
    protected $touches = [
        'reaction',
        'user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reaction()
    {
        return $this->belongsTo(Reaction::class);
    }
}
