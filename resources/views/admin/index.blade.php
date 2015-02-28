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



    </div>
@endsection
