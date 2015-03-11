@extends('app')

@section('content')
    <div class="container">
                    <div class="panel-heading">New Radio Show</div>
                    <hr />

                     <div class="panel-body">
                    {!! Form::open() !!}

                        {!! Form::label('title') !!}
                        {!! Form::text('title', null, ['class' => 'imacssclass']) !!}
                        <br />
                        {!! Form::label('description') !!}
                        {!! Form::textarea('description') !!}
                        <br />
                        {!! Form::label('description_short') !!}
                        {!! Form::text('description_short') !!}
                        <br />
                        {!! Form::label('icon_url') !!}
                        {!! Form::url('icon_url') !!}
                        <br />
                        {!! Form::label('banner_url') !!}
                        {!! Form::url('banner_url') !!}
                        <br />
                        {!! Form::label('Private') !!}
                        {!! Form::checkbox('public') !!}
                        <br />
                        {!! Form::submit('submit') !!}

                    {!! Form::close() !!}
                    </div>
    </div>
@endsection
