<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Story extends Model
{
    use SoftDeletes, HasFactory;

    // check mass assignments
    protected $fillable = ['title', 'body', 'type', 'status'];
    
    // dont check mass assignments
    // protected $guarded = [];

    // Accessors

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getTypeAttribute($value)
    {
        return ucfirst($value);
    }

    public function getFootNoteAttribute()
    {
        return ucfirst($this->type) . ' type created at ' . date('Y-m-d', strtotime($this->created_at));
    }

    public function getThumbnailAttribute()
    {
        return $this->image ? asset('storage/stories/' . $this->image) : asset('storage/stories/default.jpg');
    }

    // Mutators

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // Relationships

    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }
    
    /**
     * The tags that belong to the Story
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class);
    }

}
