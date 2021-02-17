<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Relationships
    
    /**
     * The stories that belong to the Tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function stories()
    {
        return $this->belongsToMany(\App\Story::class);
    }
}
