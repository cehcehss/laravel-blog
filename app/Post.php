<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Post extends Model
{

    protected $fillable = ['title','image','content'];

    public function getAllPosts(){
        return $this->all();
    }

    public function getAllPostsWithTags(){
        $posts = $this->with('tags')->orderBy('created_at', 'desc')->paginate(3);
        $popularPosts = $this->orderBy('count', 'desc')->limit(4)->get();
        $tags = DB::table('post_tag')
                ->join("tags","post_tag.tag_id","=","tags.id")
                ->select('tag',DB::raw('count(*) as total'))
                ->groupBy('tag')
                ->orderBy('total','desc')
                ->get();
        // $tags = Tag::pluck('tag');
        return compact('posts','popularPosts','tags');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function show($id){
        $post = $this->with('tags')->find($id);
        $post->increment('count'); 
        return $post;
    }

}
