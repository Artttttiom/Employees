<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserBusinessTrips extends Model
{
    protected $fillable = [
        'name',
        'description',
        'asset_id',
        'user_id'
    ];

    public function asset(): BelongsTo {
        return $this->belongsTo(Assets::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(Users::class);
    }
}
