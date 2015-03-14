@extends('app')

@section('content')
    <div class="container">
                    <div class="panel-heading">Edit Blog Post</div>
                    <hr />

                    <div class="panel-body">
                    {!! Form::open() !!}

                        {!! Form::label('title') !!}
                        {!! Form::text('title', $postdata['title'], ['class' => 'imacssclass']) !!}
                        <br />
                        {!! Form::label('Post') !!}
                        {!! Form::textarea('body', $postdata['body']) !!}
                        <br />
                        {!! Form::label('image_url') !!}
                        {!! Form::text('image_url', $postdata['image_url']) !!}
                        <br />
                        {!! Form::label('Private') !!}
                        {!! Form::checkbox('public', $postdata['public']) !!}
                        <br />
                        {!! Form::submit('submit') !!}

                    {!! Form::close() !!}
                    </div>
    </div>
@endsection
