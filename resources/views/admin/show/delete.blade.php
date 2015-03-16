@extends('app')

@section('content')
    <div class="container">
                    <div class="panel-heading">Delete Post: {{ $postdata['title'] }}</div>
                    <div class="panel-body">
                    <ul>
                        <li>{!! Html::link('/admin/s/dc/'.$postdata['id'], 'Click to Delete') !!}</li>
                    </ul>
                    </div>
    </div>
@endsection
