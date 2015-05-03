@extends('app')

@section('content')
    <div class="full-content site-dashboard">
        <div class="panel-heading"><h1>Our Admin Panel</h1></div>
        <h2>Success</h2>

        <div class="panel-body">
            <ul>
                <li>{!! Html::link('/admin', 'Click to continue') !!}</li>
            </ul>
        </div>


    </div>
@endsection
