<?php

namespace App\Http\Controllers;
use App\Post;
use App\Tag;
use DB;
class PostController{
    public function index(){

        $posts = Post::with('tags')->orderBy('created_at', 'desc')->paginate(3);
        $popularPosts = Post::orderBy('count', 'desc')->limit(4)->get();
        // $tags = Tag::pluck('tag');
        $tags = DB::table('post_tag')
                ->join("tags","post_tag.tag_id","=","tags.id")
                ->select('tag',DB::raw('count(*) as total'))
                ->groupBy('tag')
                ->orderBy('total','desc')
                ->get();
        return view('index',['posts'=>$posts,'popularPosts'=>$popularPosts,'tags'=>$tags]);

    }

    public function show($id){
        $post = Post::with('tags')->find($id);
        $post->increment('count'); 
        return view('post',compact('post'));
    }

}