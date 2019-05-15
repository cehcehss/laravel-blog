<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Post;
class Tag extends Model
{
    public function posts(){
        return $this->belongsToMany(POST::class);
    }
    public function getRouteKeyName(){
        return 'tag';
    }
    public function getPostsByTag($tag){
        $searched_tag = $tag->tag;
        $posts=$tag->posts;
        $popularPosts = Post::orderBy('count', 'desc')->get();
        $tags = DB::table('post_tag')
        ->join("tags","post_tag.tag_id","=","tags.id")
        ->select('tag',DB::raw('count(*) as total'))
        ->groupBy('tag')
        ->orderBy('total','desc')
        ->get();
        return compact('searched_tag','posts','popularPosts','tags');
    }
}
