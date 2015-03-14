@extends('app')

@section('content')
    <div class="full-content site-create-show header-center">
        <h1 class="create-show-title">New Radio Show</h1>

        {!! Form::open(array('files'=>1)) !!}

            {!! Form::label('title') !!}
            {!! Form::text('title', null, ['class' => 'imacssclass']) !!}
            <br />
            {!! Form::label('description') !!}
            {!! Form::textarea('description') !!}
            <br />
            {!! Form::label('description_short') !!}
            {!! Form::text('description_short') !!}
            <br />
            {!! Form::label('icon') !!}
            {!! Form::file('icon') !!}
            <br />
            {!! Form::label('banner') !!}
            {!! Form::file('banner') !!}
            <br />
            {!! Form::label('Private') !!}
            {!! Form::checkbox('public') !!}
            <br />
            {!! Form::submit('submit') !!}

        {!! Form::close() !!}
    </div>
@endsection
