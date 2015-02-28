@extends('app')

@section('content')
    <div class="container">
                    <div class="panel-heading">New Blog Post</div>
                    <hr />

                    <div class="panel-body">
                    {!! Form::open() !!}

                        {!! Form::label('title') !!}
                        {!! Form::text('title', null, ['class' => 'imacssclass']) !!}
                        <br />
                        {!! Form::label('Post') !!}
                        {!! Form::textarea('body') !!}
                        <br />
                        {!! Form::label('image_url') !!}
                        {!! Form::url('image_url') !!}
                        <br />
                        {!! Form::label('Private') !!}
                        {!! Form::checkbox('public') !!}
                        <br />
                        {!! Form::submit('submit') !!}

                    {!! Form::close() !!}
                    </div>
    </div>
@endsection
