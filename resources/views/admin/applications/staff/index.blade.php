@extends('app')

@section('content')
    <div class="full-content site-dashboard">

        <div class="panel-heading"><h1>Our Staff Applications</h1></div>

        <div class="panel-body">
            <table border="1">
                <h1> WARNING THERE IS NO CONFIRMATION CHECK </h1>
                STATUS CODES:
                <ul>
                    <li>0 = Null</li>
                    <li>1 = Pending</li>
                    <li>2 = Approved</li>
                    <li>3 = Rejected</li>
                </ul>
                <tr>
                    <th>Topic</th>
                    <th>Action</th>
                </tr>
                @foreach($applicationsdata as $application)

                    <tr>
                        <td>{{$application['handle']}} - {{$application['status']}}</td>
                        <td>
                            {!! Html::link('admin/application/staff/JUDGMENTDAY/'.$application['id'],'View') !!} |
                            {!! Html::link('admin/application/staff/AwwWelcomeDude/'.$application['id'],'Approve') !!} |
                            {!! Html::link('admin/application/staff/DENYFUCKER/'.$application['id'],'Reject') !!}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
