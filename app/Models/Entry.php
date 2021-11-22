<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Entry extends Model
{
    use HasFactory;

    public static $entryableShouldAutoCreate = true;

    public static function withoutEntryableAutoCreation(callable $scope)
    {
        try {
            static::$entryableShouldAutoCreate = false;

            $scope();
        } finally {
            static::$entryableShouldAutoCreate = true;
        }
    }

    public function setEntryableAttribute($model)
    {
        $this->entryable()->associate($model);
    }

    public function entryable()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'parent_entry_id');
    }

    public function entryableResourceName()
    {
        return Str::of($this->entryable->entryableResource())
            ->snake()
            ->split('_')
            ->map(fn ($word) => ucfirst($word))
            ->join(' ');
    }

    public function entryableIndexRoute()
    {
        return $this->entryable->entryableIndexRoute();
    }

    public function entryableShowRoute()
    {
        return $this->entryable->entryableShowRoute();
    }

    public function getTitleAttribute()
    {
        return $this->entryable->entryableTitle();
    }
}
