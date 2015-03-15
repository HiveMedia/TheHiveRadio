@extends('app')

@section('content')
    <div class="site-blog">
        @foreach($postsdata as $post)
            <div class="site-blog-post">
                <img class="blog-post-img" src="{{ $post['image_url'] }}">

                <div class="blog-post-content">
                    <a href="{{ URL::to('b/page') }}/{{ $post['id'] }}"><h1 class="blog-post-title">{{ $post['title'] }}</h1></a>
                    <h3 class="blog-post-posted">Posted By {{ $post['poster_name'] }} - {{ $post['created_at'] }}</h3>
                    <div class="blog-post-body">
                        {{ $post['body'] }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
