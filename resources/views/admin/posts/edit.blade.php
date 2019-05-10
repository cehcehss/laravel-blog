@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>編輯文章</h1>
            {{-- 用引用的方式 --}}
            {{--@include('errors')--}}

            {{-- 直接寫 --}}
            @if (count($errors) > 0)
                <!-- 表單錯誤清單 -->
                <div class="alert alert-danger">
                    <strong>哎呀！出了些問題！</strong>
                    <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <!-- 編輯的表單 -->
                <form action="{{route('admin.post.update', [$post->id])}}" method="POST" class="form-horizontal">
                    @csrf

                    <div class="form-group">
                        <label for="title">標題</label>
                        <input type="text" name="title" id="title" class="form-control" required value="{{$post->title}}">
                    </div>

                    <div class="form-group">
                        <label for="image">圖片網址</label>
                        <input type="text" name="image" id="image" class="form-control" value="{{$post->image}}">
                    </div>

                    <div class="form-group">
                        <label for="content">內容</label>
                        <textarea name="content" class="form-control" id="content" rows="10" required>{{$post->content}}</textarea>
                    </div>

                    <div class="form-group">
                        <label class='mr-3'>分類標籤</label>
                        @foreach($all_tags as $tag_id => $tag_obj)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="{{$tag_obj->tag}}" value="{{$tag_obj->id}}" name="tags[]" {{ ($tag_obj->isChecked) ? "checked" : "" }}>
                            <label class="form-check-label" for="{{$tag_obj->tag}}">{{$tag_obj->tag}}</label>
                        </div>
                        @endforeach
                    </div>

                    <!-- 增加文章按鈕-->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">更新</button>
                        <a href="{{route('admin.posts')}}" class="btn btn-outline-primary">取消</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection