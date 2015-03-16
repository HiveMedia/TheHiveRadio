@extends('app')

@section('content')
    <div class="full-content header-center">
    <h2>Show Application</h2>

    <div class="panel-body">
        {!! Form::open() !!}

        {!! Form::label('Show Name: ') !!}
        {!! Form::text('title', $application['title'], ['class' => 'imacssclass']) !!}
        <br />
        {!! Form::label('Type:') !!}
        @if($application['type'])
            {!! Form::text('type', $application['type']) !!}
        @else
            {!! Form::text('type', 'Talk Show/Live DJ/Other') !!}
        @endif
        <br />
        {!! Form::label('Will this be a Live Broadcast:') !!}
        {!! Form::checkbox('live', 1, $application['live']) !!}
        <br />
        <p>The Hive Radio helps to promote new and shows which may already have a presence online such as iTunes, Soundcloud, Youtube, etc</p>
        {!! Form::label('Do you already have a presence?') !!}
        {!! Form::checkbox('existence', 1, $application['existence']) !!}

        <br/>
        <p>The Hive Radio helps aims to have an audience of around the age of 16-25years but may have persons under the age of 15, due to this we need to know what your target is.</p>
        {!! Form::label('Classification:') !!}
        @if($application['classifications'])
            {!! Form::text('classifications', $application['classifications']) !!}
        @else
            {!! Form::text('classifications', 'PG - 15') !!}
        @endif
        <br />
        {!! Form::label('Requested Time slot for show:') !!}
        @if($application['classifications'])
            {!! Form::text('timeslot', $application['timeslot']) !!}
        @else
            {!! Form::text('timeslot', '20:00 Sunday UTC + 11') !!}
        @endif
        <br />
        {!! Form::label('Shows length') !!}
        {!! Form::text('length', $application['length']) !!}
        <br />
        <p>The Hive Radio is an Online Radio due to this we will require your shows to be uploaded to us which means we will need to know your speed, this can be found out simply by visiting <a href="http://www.speedtest.net/"> Speedtest.net </a>.</p>
        {!! Form::label('Speedtest Share URL:') !!}
        {!! Form::url('speedtest', $application['speedtest']) !!}
        <br />
        {!! Form::label('Shows Public Description:') !!}
        {!! Form::textarea('description', $application['description']) !!}
        <br />
        {!! Form::label('Shows Public Short Description') !!}
        {!! Form::text('description_short', $application['description_short']) !!}
        <br />
        {!! Form::label('Other Information:') !!}
        {!! Form::textarea('other', $application['other']) !!}
        <br />

        <div>
            <h2>Terms & Conditions</h2>
            <p>By submitting this form you are agreeing with the following terms & conditions.</p>
            <ul>
                <li>You have read The Hive Radio's acceptable behavior policy located <a href="{{URL::to('/ABP')}}">here</a>. </li>
                <li>You have filled in all required boxes with the correct information. Incorrect or falsified information will result in your application being denied.</li>
                <li>You are at least 15 years of age or older.</li>
                <li>If you are planing to be a show host, you must have a stable internet connection that can handle a broadcast stream of 320kb/s.</li>
            </ul>
            <p>In accordance with the Australian Privacy Act (1988), all information provided via this form will be kept private and only the people required to view this information will have access to it. This information will not be shared with any other person(s) or 3rd parties.</p>

            <p>The Hive Radio is a production of Hive Media Productions. The Hive Radio is a non-for-profit online radio station. All work is unpaid and all profits made by ads is used for keeping the station online and up to date.</p>

        </div>


        {!! Form::label('I Agree to all Terms and Conditions') !!}
        {!! Form::checkbox('tos', 1, $application['tos']) !!}
        <br />
        @if(isset($read) != true)
        {!! Form::submit('submit') !!}
        @endif
        {!! Form::close() !!}
    </div>
</div>
@endsection
