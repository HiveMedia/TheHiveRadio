@extends('app')

@section('content')
    <div class="full-content header-center">

    <div class="home-blog">
    @foreach($postsdata as $post)
        <article>
            <img src="{{$post['image_url']}}" class="blog-image"/>
            <h1 class="blog-title">{{$post['title']}}</h1>
            <div class="blog-body">
                {{$post['body']}}
            </div>
        </article>
    @endforeach
    </div>
</div>
@endsection
