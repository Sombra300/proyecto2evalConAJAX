<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    public function likes():HasMany{
        return $this->hasMany(Like::class);
    }

    public function likedByUser($userId): bool
    {
        return $this->likes->where('user_id', $userId)->isNotEmpty();
    }
}
