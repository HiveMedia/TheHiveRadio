@extends('app')

@section('content')
    <div class="container">
                    <div class="panel-heading">Our Admin Panel</div>
                    <h2>Success</h2>
                    <div class="panel-body">
                    <ul>
                        <li>{!! Html::link('/admin', 'Click to continue') !!}></li>
                    </ul>
                    </div>



    </div>
@endsection
