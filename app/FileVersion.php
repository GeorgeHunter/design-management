<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileVersion extends Model
{

    protected $appends = ['commentCount'];

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function getCommentCountAttribute()
    {
        return $this->comments->count();
    }
}
