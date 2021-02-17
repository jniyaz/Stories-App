<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['biography', 'phone', 'address', 'website'];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
