<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use DB;

class TagController extends Controller
{
    protected $tag;

    public function __construct(){
        $this->tag = new Tag;
    }

    public function index(Tag $tag){
        $data = $this->tag->getPostsByTag($tag);
        return view('posts_by_tag',$data);
    }
}
