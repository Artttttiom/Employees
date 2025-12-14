<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Playlists extends Model
{
    protected $fiillable = [
        'name'
    ];

    public function playlistsSongs() {
        return $this->hasMany(PlaylistsSongs::class);
    }
}
