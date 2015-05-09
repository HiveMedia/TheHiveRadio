@extends('app')

@section('content')
    <div class="full-content site-dashboard">
        <h1 style="text-align: center;">AutoDJ Dashboard</h1>
        <hr>
        <p><a href="{{ URL::to('admin/chrissy/sdb') }}">Song Database</a></p>
    </div>
@endsection
