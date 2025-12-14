<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'age'
    ];

    public function UserBusinessTrips() {
        return $this->hasMany(UserBusinessTrips::class);
    }


}