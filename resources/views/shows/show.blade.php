@extends('app')

@section('content')
<div class="site-show">
    <img src="{{$showdata['banner_url']}}"/>

    <div class="show-content">
        <h1>{{$showdata['title']}}</h1>

        <p class="show-content-body">
            {{$showdata['description']}}
        </p>
        @if(isset($people[0]))
            <h2>People:</h2>
            <ul>
            @foreach($people as $person)
                <ul><p>{{$person['name']}}</p></ul>
            @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection
