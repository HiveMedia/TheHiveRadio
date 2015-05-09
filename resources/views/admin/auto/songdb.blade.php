@extends('app')

@section('content')
    <div class="full-content site-dashboard">
        <h1 style="text-align: center;">AutoDJ Songs</h1>
        <hr>
        @foreach($Songs as $song)
            <div>
                {{ $song['ID'] }} - {{ $song['Title'] }} - {{ $song['Artist'] }} - {{ $song['Album'] }}
            </div>
            <hr/>
        @endforeach
    </div>
@endsection
