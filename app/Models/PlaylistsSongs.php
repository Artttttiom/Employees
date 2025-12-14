<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaylistsSongs extends Model
{
    public function songs(){
        return $this->belongsTo(Songs::class);
    }

    public function playlists() {
        return $this->belongsTo(Playlists::class);
    }
}
