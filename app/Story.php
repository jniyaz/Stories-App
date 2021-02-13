<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    // check mass assignments
    protected $fillable = ['title', 'body', 'type', 'status'];
    
    // dont check mass assignments
    // protected $guarded = [];

    // relationship with user model
    public function user() {
        return $this->belongsTo(\App\User::class);
    }

}
