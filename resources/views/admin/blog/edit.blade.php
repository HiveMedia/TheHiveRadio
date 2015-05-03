@extends('app')

@section('content')
    <div class="full-content site-dashboard">
                    <div class="panel-heading"><h1>Edit Blog Post</h1></div>
                    <hr />

                    <div class="panel-body">
                    {!! Form::open(array('files'=>1)) !!}

                        {!! Form::label('title') !!}
                        {!! Form::text('title', $postdata['title'], ['class' => 'imacssclass']) !!}
                        <br />
                        {!! Form::label('Post') !!}
                        {!! Form::textarea('body', $postdata['body']) !!}
                        <br />
                        {!! Form::label('image_url') !!}
                        {!! Form::text('image_url', $postdata['image_url']) !!}
                        {!! Form::file('image') !!}
                        <br />
                        {!! Form::label('Private') !!}
                        {!! Form::checkbox('public', $postdata['public']) !!}
                        <br />
                        {!! Form::submit('submit') !!}

                    {!! Form::close() !!}
                    </div>
    </div>
@endsection
