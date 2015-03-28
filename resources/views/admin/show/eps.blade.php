@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Episodes for {{$show['title']}}</div>

                    <div class="panel-body">
                        <table border="1"><tr><th>Ep Name</th><th> Deets </th></tr>
                        @foreach($eps as $ep)

                                <tr><td>{{$ep['title']}}</td>
                                <td>
                                    {{$ep['description']}}<br>
                                    {{$ep['releasedate']}}<br>
                                    <a href="{{URL::to($ep['URL'])}}">URL{{$ep['URL']}}</a>
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
