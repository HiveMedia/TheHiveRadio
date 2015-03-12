@extends('app')

@section('content')
    <div class="container">
        <div class="panel-heading">Edit User {{$user['name']}}</div>
        <hr/>

        <div class="panel-body">
            {!! Form::open() !!}

            {!! Form::label('name') !!}
            {!! Form::text('name', $user['name'], ['class' => 'imacssclass']) !!}
            <br/>
            {!! Form::label('email') !!}
            {!! Form::text('email', $user['email']) !!}
            <br/>
            {!! Form::label('role') !!}
            {!! Form::text('role', $user['role']) !!}
            <br/>
            <br/>
            {!! Form::submit('submit') !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection
