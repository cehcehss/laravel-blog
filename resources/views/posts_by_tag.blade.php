<!DOCTYPE html>
<html lang="en">
<head>
@include('shared.head')
</head>
<body>
@include('shared.nav')
 <!-- Page Header -->
 <header class="masthead" style="background-image: url('{{asset('images/home-bg-2.jpg')}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h2><span class="tag-span">#{{$searched_tag}}</span></h2>
            <!-- <span class="subheading">laragirl</span> -->
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      @include('shared.sidebar')

      <div class="col-lg-8 col-md-10 mx-auto">
        <a href="/" class="back-to-home">
          <i class="fas fa-chevron-circle-left mr-3"></i>Back
        </a>
        @php
            $postsLength = count($posts);
        @endphp
        @foreach($posts as $key=>$post)
            <div class="post-preview">
                <a href="/posts/{{$post->id}}">
                    <h4 class="post-title">
                        {{$post->title}}
                    </h4>
                    <h5 class="post-subtitle">
                      {{$post->content}}
                    </h5>
                </a>
                <p class="post-meta">
                    at {{$post->created_at}}
                    @foreach($post->tags as $tag)
                    <a href="/posts/tags/{{$tag->tag}}" class="badge badge-light tag">#{{$tag->tag}}</a>
                    @endforeach
                    
                    <span>{{$post->count}} views</span>
                </p>
            </div>
            @if ($key !== $postsLength-1)
                <hr>
            @endif
        @endforeach
        
      </div>
      
    </div>
  </div>
  <hr>
  @include('shared.footer')
  </body>
</html>