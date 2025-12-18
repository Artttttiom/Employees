<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'age',
        'gender'
    ];

    public function UserBusinessTrips() {
        return $this->hasMany(UserBusinessTrips::class);
    }

    public function playlists() {
        return $this->hasMany(Playlists::class);
    }
}
