<div class="col-lg-4 col-md-10 mx-auto">
    <div class="sidebar-section">
        
        <h6>Popular Posts</h6>

        @foreach($popularPosts as $key=>$post)
        <p>
        <a href="/posts/{{$post->id}}">
            {{$post->title}}
            @if ($key < 3)
            <i class="far fa-thumbs-up"></i>
            @endif
        </a>
        </p>
        @endforeach
    </div>

    <div class="sidebar-section">
        <h6>Tags</h6>
        @foreach($tags as $tag)
        <a href="/posts/tags/{{$tag->tag}}" class="badge badge-light tag">#{{$tag->tag}}({{$tag->total}})</a>
        @endforeach
    </div>
</div>