<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['biography', 'phone', 'address', 'website'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
