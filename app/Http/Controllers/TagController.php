<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use DB;

class TagController extends Controller
{
    public function index(Tag $tag){
        $posts=$tag->posts;
        $popularPosts = Post::orderBy('count', 'desc')->get();
        $tags = DB::table('post_tag')
        ->join("tags","post_tag.tag_id","=","tags.id")
        ->select('tag',DB::raw('count(*) as total'))
        ->groupBy('tag')
        ->orderBy('total','desc')
        ->get();
        return view('posts_by_tag',['searched_tag'=>$tag->tag,'posts'=>$posts,'popularPosts'=>$popularPosts,'tags'=>$tags]);
    }
}
