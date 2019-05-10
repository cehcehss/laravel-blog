<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){
        return $this->belongsToMany(POST::class);
    }
    public function getRouteKeyName(){
        return 'tag';
    }
}
