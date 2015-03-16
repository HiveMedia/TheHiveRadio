@extends('app')

@section('content')
    <div class="container">
        <div class="panel-heading">Edit Blog Post</div>
        <hr/>

        <div class="panel-body">
            {!! Form::open(array('files'=>1)) !!}


            {!! Form::label('title') !!}
            {!! Form::text('title', $postdata['title'], ['class' => 'imacssclass']) !!}
            <br/>
            {!! Form::label('description') !!}
            {!! Form::textarea('description',$postdata['description']) !!}
            <br/>
            {!! Form::label('description_short') !!}
            {!! Form::text('description_short',$postdata['description_short']) !!}
            <br/>
            {!! Form::label('icon_url') !!}
            {!! Form::text('icon_url',$postdata['icon_url']) !!}
            {!! Form::file('icon') !!}
            <br/>
            {!! Form::label('banner_url') !!}
            {!! Form::text('banner_url',$postdata['banner_url']) !!}
            {!! Form::file('banner') !!}
            <br/>
            {!! Form::label('Private') !!}
            {!! Form::checkbox('public',1,$postdata['public']) !!}
            <br/>
            {!! Form::submit('submit') !!}


            {!! Form::close() !!}
        </div>
    </div>
@endsection
