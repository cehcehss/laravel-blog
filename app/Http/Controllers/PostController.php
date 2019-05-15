<?php

namespace App\Http\Controllers;
use App\Post;
use App\Tag;
use DB;
class PostController{

    protected $post;

    public function __construct(){
        $this->post = new Post;
    }

    public function index(){
        $posts = $this->post->getAllPostsWithTags();
        return view('index',$posts);
    }

    public function show($id){
        $post = $this->post->show($id);
        return view('post',compact('post'));
    }

}