@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Our Schedule</div>

                    <div class="panel-body">
                        <table border="1"><tr><th>Topic</th><th> Action </th></tr>
                        @foreach($showsdata as $show)

                                <tr><td>{{$show['title']}}</td>
                                <td>
                                    {!! Html::link('admin/time/d/'.$post['id'],'Delete') !!} |
                                    {!! Html::link('admin/time/e/'.$post['id'],'Edit') !!} |
                                    {!! Html::link('admin/time/h/'.$post['id'],'Toggle Publicity') !!}
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
