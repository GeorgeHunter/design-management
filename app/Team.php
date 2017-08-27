<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    public function path()
    {
        return '/teams/' . $this->id;
    }

    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    public function clients()
    {
        return $this->hasMany('App\Client');
    }
}
