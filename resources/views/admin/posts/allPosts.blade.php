@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a class="btn btn-primary mb-4 float-right" href="{{route('admin.post.create')}}" role="button">新增文章</a>
            <table class="table table-bordered table-hover text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Date</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>
                                <form action="{{route('admin.post.edit', [$post->id])}}" method="GET">
                                    @csrf
                                    {{ method_field('GET') }}

                                    <button class="btn btn-outline-primary btn-sm"><i class="far fa-edit"></i></button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('admin.post.delete', [$post->id])}}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}

                                    <button class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
