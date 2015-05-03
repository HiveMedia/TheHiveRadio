@extends('app')

@section('content')
    <div class="full-content site-dashboard">

        <div class="panel-heading"><h1>Episodes for {{$show['title']}}</h1></div>

        <div class="panel-body">
            <table border="0">
                <tr>
                    <th>Episode</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
                @foreach($eps as $ep)
                    <tr>
                        <td>{{$ep['title']}}</td>
                        <td>
                            {{$ep['description']}}<br>
                            Release Date: {{$ep['releasedate']}}<br>
                            <hr/>
                            <a href="{{URL::to($ep['URL'])}}">Link to Track</a>
                        </td>
                        <td>
                            <a href="{{URL::to('/')}}/admin/shout/bot/ShowRelay/{{base64_encode($ep['URL'])}}"> Relay Now </a><br/>
                            <a href="{{URL::to('/')}}/admin/shout/bot/ShowQueue/{{base64_encode(URL::to($ep['URL']))}}"> Queue Now </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
