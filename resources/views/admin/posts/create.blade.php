@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>新增文章</h1>
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
                <!-- 新文章的表單 -->
                <form action="/admin/post" method="POST" class="form-horizontal">
                    @csrf

                    <div class="form-group">
                        <label for="title">標題</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="image">圖片網址</label>
                        <input type="text" name="image" id="image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="content">內容</label>
                        <textarea name="content" class="form-control" id="content" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class='mr-3'>分類標籤</label>
                    @foreach($tags as $tag_id=>$tag_name)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="{{$tag_name}}" value="{{$tag_id}}" name="tags[]">
                            <label class="form-check-label" for="{{$tag_name}}">{{$tag_name}}</label>
                        </div>
                    @endforeach
                    </div>

                    <!-- 增加文章按鈕-->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">新增</button>
                        <a href="{{route('admin.posts')}}" class="btn btn-outline-primary">取消</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection