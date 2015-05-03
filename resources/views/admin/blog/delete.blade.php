@extends('app')

@section('content')
    <div class="full-content site-dashboard">
                    <div class="panel-heading"><h1>Delete Post: {{ $postdata['title'] }}</h1></div>
                    <div class="panel-body">
                    <ul>
                        <li>{!! Html::link('/admin/b/dc/'.$postdata['id'], 'Click to Delete') !!}</li>
                        <li>{!! Html::link('/admin/', 'Leave Alone') !!}</li>

                    </ul>
                    </div>
    </div>
@endsection
