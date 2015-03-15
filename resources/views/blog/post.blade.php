@extends('app')

@section('content')
    <div class="site-blog">
        <div class="site-blog-post">
            <img class="blog-post-img" src="{{ $post['image_url'] }}">

            <div class="blog-post-content">
                <h1 class="blog-post-title">{{ $post['title'] }}</h1>
                <h3 class="blog-post-posted">Posted By {{ $post['poster_name'] }} - {{ $post['created_at'] }}</h3>
                <div class="blog-post-body">
                    {{ $post['body'] }}
                </div>
            </div>
        </div>
    </div>
@endsection
