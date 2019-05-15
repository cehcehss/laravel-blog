<!DOCTYPE html>
<html lang="en">
<head>
@include('shared.head')
</head>
<body>
@include('shared.nav')
 <!-- Page Header -->
 <header class="masthead" style="background-image: url('{{asset('images/post-4.jpg')}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{{$post->title}}</h1>
            @foreach($post->tags as $tag_obj)
             <a href="/posts/tags/{{$tag_obj->tag}}" class="badge tag">#{{$tag_obj->tag}}</a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto pb-5">
            <a href="/" class="back-to-home">
              <i class="fas fa-chevron-circle-left mr-3"></i>Back
            </a>
            <span class="post-created-date">{{explode(" ",$post->created_at)[0]}}</span>
                @if ($post->image !== NULL)
                    <p>
                        <img src="{{$post->image}}" alt="" class="w-100">
                    </p>
                @endif
            <p>
                {!! nl2br($post->content) !!}
            </p>
      </div>
    </div>
  </div>
  <hr>
  @include('shared.footer')
  </body>
</html>
