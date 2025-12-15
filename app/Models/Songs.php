<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    protected  $fillable = [
        'title',
        'description',
        'performer'
    ];

   public function playlistsSongs() {
        return $this->hasMany(related: PlaylistsSongs::class);
    }
}
