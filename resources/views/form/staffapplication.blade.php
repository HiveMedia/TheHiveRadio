@extends('app')

@section('content')
    <div class="full-content header-center">
    <h2>Staff Application</h2>

    <div class="panel-body">
        {!! Form::open() !!}

        {!! Form::label('First Name') !!}
        {!! Form::text('firstname', $application['firstname'], ['class' => 'imacssclass']) !!}
        <br />
        {!! Form::label('Last Name') !!}
        {!! Form::text('lastname', $application['firstname']) !!}
        <br />
        {!! Form::label('Date of Birth') !!}
        @if($application['dob'])
            {!! Form::text('dob', $application['dob']) !!}
        @else
            {!! Form::text('dob', 'DD/MM/YY') !!}
        @endif
        <br />
        {!! Form::label('Current Country of Residence') !!}
        {!! Form::text('country', $application['country']) !!}
        <br />
        {!! Form::label('Primary Contact E-Mail address') !!}
        {!! Form::text('email', $application['email']) !!}
        <br />
        {!! Form::label('Primary Skype Contact Name') !!}
        {!! Form::text('skype', $application['skype']) !!}
        <br />
        {!! Form::label('Screen Name') !!}
        {!! Form::text('handle', $application['handle']) !!}
        <br />
        {!! Form::label('References of Past Work') !!}
        {!! Form::textarea('references', $application['references']) !!}
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
        {!! Form::checkbox('tos',1, $application['tos']) !!}
        <br />
        @if(isset($read) != true)
        {!! Form::submit('submit') !!}
        @endif
        {!! Form::close() !!}
    </div>
</div>
@endsection
