@extends('app')

@section('content')
    <div class="full-content site-dashboard">
        <div class="panel-heading"><h1>Edit User {{$user['name']}}</h1></div>
        <hr/>

        <div class="panel-body">
            {!! Form::open(array('files'=>1)) !!}

            {!! Form::label('name') !!}
            {!! Form::text('name', $user['name'], ['class' => 'imacssclass']) !!}
            <br/>
            {!! Form::label('email') !!}
            {!! Form::text('email', $user['email']) !!}
            <br/>
            {!! Form::label('role') !!}
            {!! Form::text('role', $user['role']) !!}
            <br/>
            {!! Form::label('Hide on Public Pages') !!}
            {!! Form::checkbox('public', 1, $user['public']) !!}
            <br/>
            {!! Form::label('Show Email') !!}
            {!! Form::checkbox('public_email', 1, $user['public_email']) !!}
            <br/>
            {!! Form::label('avatar') !!}
            {!! Form::text('avatar', $user['avatar']) !!}
            {!! Form::file('image') !!}
            <br/>
            {!! Form::label('title') !!}
            {!! Form::text('title', $user['title']) !!}
            <br/>
            {!! Form::label('job') !!}
            {!! Form::text('job', $user['job']) !!}

            <br/>
            {!! Form::submit('submit') !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection
