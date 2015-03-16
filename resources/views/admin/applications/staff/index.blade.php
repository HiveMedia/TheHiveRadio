@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Our Staff Applications</div>

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
            </div>
        </div>
    </div>
@endsection
