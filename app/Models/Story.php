<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Events\StoryCreated;
use App\Events\StoryUpdated;
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

    // Model events - life cycle hooks

    protected static function booted() {
        static::created(function($story) {
            event(new StoryCreated($story->title));
        });

        static::updated(function($story) {
            event(new StoryUpdated($story->title));
        });
    }

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

    // Local Scopes

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeWhereCreatedThisMonth($query)
    {
        $startDate = \Carbon\Carbon::now()->startOfMonth();
        $endDate = \Carbon\Carbon::now()->endOfMonth();
        return $query->whereBetween('created_at', [$startDate, $endDate]);
    }

    // Relationships

    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }
    
    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class);
    }

}
