<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function path()
    {
        return '/' . $this->team->id . '/projects/' . $this->id;
    }
}
