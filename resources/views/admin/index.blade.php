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
        <hr>

        <h4>Users</h4>

        <p><a href="{{ URL::to('admin/u/l') }}">List Users</a></p>
        <hr>
        <h2>Schedule</h2>

        <div class="panel-body">
            <ul>
                <li><a href="admin/time/c">Book a Show</a></li>
                <li>{!! Html::Link('admin/time/l','List Schedule') !!}</li>
            </ul>
        </div>

        <h2>Users</h2>

        <div class="panel-body">
            <ul>
                <li>{!! Html::Link('admin/u/l','List Users') !!}</li>
            </ul>
        </div>
        <h2>Application</h2>

        <div class="panel-body">
            <ul>
                <li>{!! Html::Link('admin/application/l','List Applications') !!}</li>
            </ul>
        </div>
    </div>
@endsection
