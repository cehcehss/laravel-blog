<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use DB;
use Alert;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin.posts.allPosts',['posts'=>$posts]);
    }

    public function create(){
        // 取得目前所有的tags array
        $tags = Tag::pluck('tag','id');
        return view('admin.posts.create',['tags'=>$tags]);
    }


    public function store(Request $request){
        // $request儲存表單傳送的資料
        // 驗證表單內容

        $request->validate([
            'title'=>'required|max:255',
            'content'=>'required'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->image = $request->image;
        $post->content = $request->content;
        $post->save();
        // 新文章的id
        $lastId = $post->id;
        // checkbox值
        $selected_tags = $request->input('tags');

        foreach ($selected_tags as $tags) {

            // 確認此tag是否已存在
            $tag = Tag::where('id', '=', $tags)->first();

            // 如果存在，同步新增至post_tag表
            // 否則在tags表新建一個tag
            if ($tag != null) {
                $post->tags()->sync($tag->id);
            } else {
                $tag = new Tag();
                $tag->tag = $tags;
                $tag->save();
                $post->tags()->sync($tag->id);
            }
        }
        
        Alert::success('新增成功!');
        return redirect('admin/post');
    }
   
    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        Alert::success('刪除成功!');
        return redirect('admin/post');
    }
    
    public function edit($id){
        $post = Post::find($id);
        // 所有標籤用來建立input
        $all_tags = Tag::select('id','tag')->get()->keyBy('id');
        // 此文章有的標籤 checked
        $tags = Post::find($id)->tags;
        foreach($tags as $tag_obj){
            $id = $tag_obj['id'];
            $all_tags[$id]['isChecked'] = true;
        }
        return view('admin.posts.edit',compact('post','all_tags','tags'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'title'=>'required|max:255',
            'content'=>'required'
        ]);

        $post = POST::find($id);
        $post->update(['title'=>$request->title,'image'=>$request->image,'content'=>$request->content]);
        $selected_tags = $request->input('tags');
        $post->tags()->sync($selected_tags);

        Alert::success('更新成功!');
        return redirect('admin/post');
    }
}
