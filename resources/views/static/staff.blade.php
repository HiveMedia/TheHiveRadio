@extends('app')

@section('content')
<div class="site-staff">

    @foreach($staff as $s)
    <div class="full-content staff-item text-center">
        <img class="left" src="{{URL::to('/')}}{{$s['avatar']}}"/>
        <h2>{{$s['name']}} <small>{{$s['title']}}</small></h2>
        <h4>{{$s['job']}}</h4>
        @if($s['public_email'])
            <p><a href="mailto:{{$s['email']}}">{{$s['email']}}</a></p>
        @endif
    </div>
                    
    <br />
    @endforeach
</div>
@endsection
