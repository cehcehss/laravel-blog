<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','image','content'];
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
