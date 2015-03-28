@extends('app')

@section('content')
    <div class="full-content site-create-show header-center">
        <h1 class="create-show-title">Upload Ep - {{$show['title']}}</h1>

        {!! Form::open(array('files'=>1)) !!}

        {!! Form::label('Title:') !!}
        {!! Form::text('title', null, ['class' => 'imacssclass']) !!}
        <br />
        {!! Form::label('Description:') !!}<br />
        {!! Form::textarea('description') !!}
        <br />
        {!! Form::label('Release Dat/Time (N/A)') !!}
        {!! Form::text('releasedate','8:00 - 20 Mar 15') !!}
        <br />
        {!! Form::label('ep') !!}
        {!! Form::file('ep') !!}
        <br />
        {!! Form::hidden('show_id',$show['id']) !!}
        <br />
        {!! Form::label('Private') !!}
        {!! Form::checkbox('public',1) !!}

        <br />
        {!! Form::submit('submit') !!}

        {!! Form::close() !!}
    </div>
@endsection
