<?php

namespace App\Models\Entries;

use App\Models\Reaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Reactionable
{
    public function reactions(): HasMany
    {
        return $this->hasMany(Reaction::class);
    }

    public function entryableHasReactions()
    {
        return $this->entryable->canHaveReactions();
    }

    public function addReaction(User $user, string $emoji): Reaction
    {
        $reaction = $this->findReactionByEmojiNameOrCreate($emoji);

        $reaction->users()->syncWithoutDetaching($user);

        return $reaction;
    }

    private function findReactionByEmojiNameOrCreate(string $emoji): Reaction
    {
        return $this->reactions()->firstOrCreate([
            'emoji' => $emoji,
        ]);
    }
}
