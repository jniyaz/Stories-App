<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    // check mass assignments
    protected $fillable = ['title', 'body', 'type', 'status'];
    
    // dont check mass assignments
    // protected $guarded = [];

    // Accessors

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getFootNoteAttribute()
    {
        return ucfirst($this->type) . ' type created at ' . date('Y-m-d', strtotime($this->created_at));
    }

    // Relationships

    public function user() {
        return $this->belongsTo(\App\User::class);
    }

}
