@extends('app')

@section('content')
    <div class="full-content site-dashboard">
        <h1 style="text-align: center;">Admin Dashboard</h1>
        <hr>


        <h4>Blog</h4>

        <p><a href="{{ URL::to('admin/b/c') }}">Create Post</a></p>

        <p><a href="{{ URL::to('admin/b/l') }}">List Posts</a></p>
        <hr>

        <h4>Shows</h4>

        <p><a href="{{ URL::to('admin/s/c') }}">Create Show</a></p>

        <p><a href="{{ URL::to('admin/s/l') }}">List Shows</a></p>

        <p><a href="{{ URL::to('admin/time/c') }}">Book Show</a></p>

        <p><a href="{{ URL::to('admin/time/l') }}">Show Schedule</a></p>

        <p><a href="{{ URL::to('admin/shout/l') }}">ShoutIRC Admin</a></p>
        <hr>

        <h4>Users</h4>

        <p><a href="{{ URL::to('admin/u/l') }}">List Users</a></p>
        <hr>
        <h4>Schedule</h4>

        <div class="panel-body">
            <ul>
                <li><a href="admin/time/c">Book a Show</a></li>
                <li>{!! Html::Link('admin/time/l','List Schedule') !!}</li>
            </ul>
        </div>
        <hr/>
        <h4>Applications</h4>

        <div class="panel-body">
            <ul>
                <li>{!! Html::Link('admin/application/staff/l','List Staff Applications') !!}</li>
                <li>{!! Html::Link('admin/application/show/l','List SHOW Applications') !!}</li>
            </ul>
        </div>

    </div>
@endsection
