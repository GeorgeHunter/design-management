<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function versions()
    {
        return $this->hasMany('App\FileVersion');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function path()
    {
        return '/files/' . $this->id;
    }
}
