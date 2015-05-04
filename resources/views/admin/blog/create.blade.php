@extends('app')

@section('content')
    <div class="full-content site-dashboard">
                    <div class="panel-heading"><h1>New Blog Post</h1></div>
                    <hr />

                    <div class="panel-body">
                    {!! Form::open(array('files'=>1)) !!}

                        {!! Form::label('title') !!}
                        {!! Form::text('title', null, ['class' => 'imacssclass']) !!}
                        <br />
                        {!! Form::label('Post') !!}
                        {!! Form::textarea('body') !!}
                        <br />
                        {!! Form::label('image:') !!}
                        {!! Form::file('image') !!}
                        <br />
                        {!! Form::label('Private') !!}
                        {!! Form::checkbox('public') !!}
                        <br />
                        {!! Form::submit('submit') !!}

                    {!! Form::close() !!}
                    </div>
    </div>
@endsection
