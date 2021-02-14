<?php

namespace App;

use Illuminate\Support\Str;
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

    // Mutators

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // Relationships

    public function user() {
        return $this->belongsTo(\App\User::class);
    }

}
