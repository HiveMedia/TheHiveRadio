@extends('app')

@section('content')
    <div class="container">
        <div class="panel-heading">Thanks</div>
        <h2>Success</h2>

        <div class="panel-body">
            <ul>
                <li>{!! Html::link('/', 'Click to continue') !!}></li>
            </ul>
        </div>


    </div>
@endsection
