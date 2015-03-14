@extends('app')

@section('content')
    <div class="site-shows">
        @foreach($showsdata as $show)
            <div class="full-content shows-show text-center">

                <img src="{{$show['icon_url']}}"/>
                <h2><a href='/s/{{ $show['id'] }}'>{{$show['title']}}</a></h2>
                <p>
                {{$show['description_short']}}
                </p>
            </div>

            <br />
        @endforeach
	</div>
@endsection
