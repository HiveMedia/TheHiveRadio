@extends('app')

@section('content')
    <div class="site-blog">
        <ul class="site-blog-nav">
            @if($pagination['Last'] != 0)
                <a class="nav-item nav-back" href="{{URL::to('/b/page').'/'.$pagination['Last']}}">Back</a>
            @endif

            @if($pagination['Next'] != 0)
                <a class="nav-item nav-next" href="{{URL::to('/b/page').'/'.$pagination['Next']}}">Next</a>
            @endif
        </ul>

        @foreach($postsdata as $post)
            <div class="site-blog-post">
                <img class="blog-post-img" src="{{ $post['image_url'] }}">

                <div class="blog-post-content">
                    <a href="{{ URL::to('b') }}/{{ $post['id'] }}"><h1 class="blog-post-title">{{ $post['title'] }}</h1></a>
                    <h3 class="blog-post-posted">Posted By {{ $post['poster_name'] }} - {{ $post['created_at'] }}</h3>
                    <div class="blog-post-body">
                        {{ $post['body'] }}
                    </div>
                </div>
            </div>
        @endforeach

        <ul class="site-blog-nav">
            @if($pagination['Last'] != 0)
                <a class="nav-item nav-back" href="{{URL::to('/b/page').'/'.$pagination['Last']}}"><li>Back</li></a>
            @endif

            @if($pagination['Next'] != 0)
                <a class="nav-item nav-next" href="{{URL::to('/b/page').'/'.$pagination['Next']}}"><li>Next</li></a>
            @endif
        </ul>
    </div>
@endsection
