@extends('app')

@section('content')
<div class="site-show">
    <img src="{{$showdata['banner_url']}}"/>

    <div class="show-content">
        <h1>{{$showdata['title']}}</h1>

        <p class="show-content-body">
            {{$showdata['description']}}
        </p>
    </div>
</div>
@endsection
