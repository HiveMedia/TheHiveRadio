@extends('app')

@section('content')
    <div class="container">
        <div class="panel-heading">Our Admin Panel</div>


        <h2>Blog</h2>
            <div class="panel-body">
            <ul>
                <li><a href="admin/b/c">Create Post</a></li>
                <li>{!! Html::Link('admin/b/l','List PostS') !!}</li>
            </ul>
        </div>


        <h2>Shows</h2>
        <div class="panel-body">
            <ul>
                <li><a href="admin/s/c">Create Show</a></li>
                <li>{!! Html::Link('admin/s/l','List ShowS') !!}</li>
            </ul>
        </div>


        <h2>Schedule</h2>
        <div class="panel-body">
            <ul>
                <li><a href="admin/time/c">Book a Show</a></li>
                <li>{!! Html::Link('admin/time/l','List Schedule') !!}</li>
            </ul>
        </div>

    </div>
@endsection
